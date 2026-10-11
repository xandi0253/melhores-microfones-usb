<?php
/**
 * MMU Comparativos — cadastro editorial de rankings.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', 'mmu_register_ranking_post_type' );
function mmu_register_ranking_post_type() {
    register_post_type( 'mmu_ranking', array(
        'labels' => array(
            'name'          => 'Rankings MMU',
            'singular_name' => 'Ranking MMU',
            'add_new_item'  => 'Adicionar ranking',
            'edit_item'     => 'Editar ranking',
        ),
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => false,
        'supports'            => array( 'title', 'editor' ),
        'menu_icon'           => 'dashicons-chart-bar',
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'exclude_from_search' => true,
    ) );
}

add_action( 'add_meta_boxes_mmu_ranking', 'mmu_ranking_add_meta_box' );
function mmu_ranking_add_meta_box() {
    add_meta_box(
        'mmu_ranking_products',
        'Produtos e ordem do comparativo',
        'mmu_ranking_products_box',
        'mmu_ranking',
        'normal',
        'high'
    );
}

function mmu_ranking_products_box( $post ) {
    wp_nonce_field( 'mmu_save_ranking', 'mmu_ranking_nonce' );
    $selected = get_post_meta( $post->ID, '_mmu_ranking_product_ids', true );
    $selected = is_array( $selected ) ? array_map( 'absint', $selected ) : array();
    $featured = absint( get_post_meta( $post->ID, '_mmu_ranking_featured_id', true ) );

    $products = get_posts( array(
        'post_type'      => 'mmu_produto_item',
        'post_status'    => 'publish',
        'posts_per_page' => 200,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );
    echo '<p>Escolha entre 5 e 8 produtos publicados. Informe a posição editorial de cada produto (1 = primeiro). Posições repetidas não serão aceitas.</p>';
    echo '<table class="widefat striped"><thead><tr><th>Produto</th><th>Posição (1–8)</th><th>Destaque editorial</th></tr></thead><tbody>';
    foreach ( $products as $product ) {
        $position = array_search( (int) $product->ID, $selected, true );
        $position = false === $position ? '' : (string) ( $position + 1 );
        echo '<tr><td>' . esc_html( $product->post_title ) . '</td><td><input type="number" min="1" max="8" style="width:80px" name="mmu_ranking_positions[' . esc_attr( $product->ID ) . ']" value="' . esc_attr( $position ) . '"></td>';
        echo '<td><input type="radio" name="mmu_ranking_featured" value="' . esc_attr( $product->ID ) . '"' . checked( $featured, (int) $product->ID, false ) . '></td></tr>';
    }
    echo '</tbody></table>';
    if ( ! $products ) {
        echo '<p>Cadastre e publique produtos em Produtos MMU antes de montar um ranking.</p>';
    }
    echo '<p><label><input type="radio" name="mmu_ranking_featured" value="0"' . checked( $featured, 0, false ) . '> Nenhum destaque</label></p>';
    echo '<p><strong>Shortcode após salvar:</strong> <code>[mmu_comparativo id="' . esc_html( $post->ID ) . '"]</code> (a renderização será implementada na próxima etapa).</p>';
}

add_action( 'save_post_mmu_ranking', 'mmu_ranking_save_products' );
function mmu_ranking_save_products( $post_id ) {
    if (
        ! isset( $_POST['mmu_ranking_nonce'] ) ||
        ! is_string( $_POST['mmu_ranking_nonce'] ) ||
        ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mmu_ranking_nonce'] ) ), 'mmu_save_ranking' ) ||
        ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ||
        wp_is_post_revision( $post_id ) ||
        ! current_user_can( 'edit_post', $post_id )
    ) {
        return;
    }

    $raw = isset( $_POST['mmu_ranking_positions'] ) && is_array( $_POST['mmu_ranking_positions'] )
        ? wp_unslash( $_POST['mmu_ranking_positions'] )
        : array();
    $ordered = array();
    foreach ( $raw as $product_id => $position ) {
        if ( ! is_scalar( $position ) || '' === trim( (string) $position ) ) {
            continue;
        }
        $position = filter_var( $position, FILTER_VALIDATE_INT );
        $product_id = absint( $product_id );
        if (
            false === $position || $position < 1 || $position > 8 ||
            isset( $ordered[ $position ] ) ||
            'publish' !== get_post_status( $product_id ) ||
            'mmu_produto_item' !== get_post_type( $product_id )
        ) {
            set_transient( 'mmu_ranking_error_' . get_current_user_id(), 'Confira as posições: use números de 1 a 8, sem repetições, e somente produtos publicados.', 60 );
            return;
        }
        $ordered[ $position ] = $product_id;
    }
    ksort( $ordered, SORT_NUMERIC );
    $count = count( $ordered );
    if ( $count < 5 || $count > 8 || array_keys( $ordered ) !== range( 1, $count ) ) {
        set_transient( 'mmu_ranking_error_' . get_current_user_id(), 'O ranking precisa de 5 a 8 produtos, com posições consecutivas começando em 1.', 60 );
        return;
    }

    $ids = array_values( $ordered );
    $featured = isset( $_POST['mmu_ranking_featured'] ) ? absint( $_POST['mmu_ranking_featured'] ) : 0;
    if ( $featured && ! in_array( $featured, $ids, true ) ) {
        set_transient( 'mmu_ranking_error_' . get_current_user_id(), 'O destaque editorial deve ser um dos produtos selecionados.', 60 );
        return;
    }
    update_post_meta( $post_id, '_mmu_ranking_product_ids', $ids );
    update_post_meta( $post_id, '_mmu_ranking_featured_id', $featured );
}

add_action( 'admin_notices', 'mmu_ranking_admin_notice' );
function mmu_ranking_admin_notice() {
    if ( ! is_admin() || ! current_user_can( 'edit_posts' ) ) {
        return;
    }
    $key = 'mmu_ranking_error_' . get_current_user_id();
    $message = get_transient( $key );
    if ( $message ) {
        delete_transient( $key );
        echo '<div class="notice notice-error is-dismissible"><p>' . esc_html( $message ) . '</p></div>';
    }
}
