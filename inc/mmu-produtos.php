<?php
/**
 * MMU Comparativos — cadastro de produtos (módulo isolado).
 *
 * Será carregado pelo functions.php somente após revisão.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', 'mmu_register_product_post_type' );
function mmu_register_product_post_type() {
    register_post_type( 'mmu_produto_item', array(
        'labels' => array(
            'name'          => 'Produtos MMU',
            'singular_name' => 'Produto MMU',
            'add_new_item'  => 'Adicionar produto',
            'edit_item'     => 'Editar produto',
        ),
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => false,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'menu_icon'          => 'dashicons-microphone',
        'capability_type'    => 'post',
        'map_meta_cap'       => true,
    ) );
}

add_action( 'add_meta_boxes_mmu_produto_item', 'mmu_product_add_meta_boxes' );
function mmu_product_add_meta_boxes() {
    add_meta_box(
        'mmu_product_details',
        'Detalhes e links de afiliados',
        'mmu_product_details_box',
        'mmu_produto_item',
        'normal',
        'high'
    );
}

function mmu_product_details_box( $post ) {
    wp_nonce_field( 'mmu_save_product_details', 'mmu_product_nonce' );

    $fields = array(
        'mmu_product_connection' => array( 'Conexão (ex.: USB/XLR)', 'text' ),
        'mmu_product_use'        => array( 'Indicado para (ex.: Podcast e streaming)', 'text' ),
        'mmu_product_pros'       => array( 'Pontos positivos (um por linha)', 'textarea' ),
        'mmu_product_cons'       => array( 'Limitações (uma por linha)', 'textarea' ),
        'mmu_product_amazon'     => array( 'Link de afiliado Amazon', 'url' ),
        'mmu_product_mercado'    => array( 'Link de afiliado Mercado Livre', 'url' ),
        'mmu_product_shopee'     => array( 'Link de afiliado Shopee', 'url' ),
    );

    echo '<p>Use o título como nome do produto, a imagem destacada como foto autorizada e o editor para a descrição editorial.</p>';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<p><label for="' . esc_attr( $key ) . '"><strong>' . esc_html( $field[0] ) . '</strong></label></p>';
        if ( 'textarea' === $field[1] ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="4" style="width:100%">' . esc_textarea( $value ) . '</textarea>';
        } else {
            echo '<input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field[1] ) . '" value="' . esc_attr( $value ) . '" style="width:100%">';
        }
    }
}

add_action( 'save_post_mmu_produto_item', 'mmu_product_save_details' );
function mmu_product_save_details( $post_id ) {
    if (
        ! isset( $_POST['mmu_product_nonce'] ) ||
        ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mmu_product_nonce'] ) ), 'mmu_save_product_details' ) ||
        ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ||
        wp_is_post_revision( $post_id ) ||
        ! current_user_can( 'edit_post', $post_id )
    ) {
        return;
    }

    $text_fields = array( 'mmu_product_connection', 'mmu_product_use' );
    $area_fields = array( 'mmu_product_pros', 'mmu_product_cons' );
    $url_fields  = array( 'mmu_product_amazon', 'mmu_product_mercado', 'mmu_product_shopee' );

    foreach ( array_merge( $text_fields, $area_fields, $url_fields ) as $key ) {
        if ( ! isset( $_POST[ $key ] ) || ! is_string( $_POST[ $key ] ) ) {
            continue;
        }
        $raw = wp_unslash( $_POST[ $key ] );
        if ( in_array( $key, $url_fields, true ) ) {
            $value = esc_url_raw( $raw, array( 'http', 'https' ) );
        } elseif ( in_array( $key, $area_fields, true ) ) {
            $value = sanitize_textarea_field( $raw );
        } else {
            $value = sanitize_text_field( $raw );
        }
        if ( '' === $value ) {
            delete_post_meta( $post_id, $key );
        } else {
            update_post_meta( $post_id, $key, $value );
        }
    }
}
