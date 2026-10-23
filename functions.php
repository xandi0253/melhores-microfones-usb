<?php
/**
 * Theme Functions
 *
 * Melhores Microfones USB
 * GeneratePress Child Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


/**
 * Carrega o CSS principal do tema filho.
 */
function mmu_enqueue_styles() {

    wp_enqueue_style(
        'mmu-child-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get( 'Version' )
    );
}

add_action( 'wp_enqueue_scripts', 'mmu_enqueue_styles' );


/**
 * Carrega o CSS exclusivo da página inicial.
 */
function mmu_enqueue_home_assets() {

    if ( is_front_page() ) {

        $home_css_path = get_stylesheet_directory() . '/assets/css/home.css';

        $home_css_version = file_exists( $home_css_path )
            ? filemtime( $home_css_path )
            : wp_get_theme()->get( 'Version' );

        wp_enqueue_style(
            'mmu-home-style',
            get_stylesheet_directory_uri() . '/assets/css/home.css',
            array( 'mmu-child-style' ),
            $home_css_version
        );
    }
}

add_action( 'wp_enqueue_scripts', 'mmu_enqueue_home_assets', 20 );


/**
 * Recursos utilizados pelo tema.
 */
function mmu_theme_setup() {

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'responsive-embeds' );

    add_theme_support( 'automatic-feed-links' );
}

add_action( 'after_setup_theme', 'mmu_theme_setup' );


/**
 * Define o tamanho padrão dos resumos dos artigos.
 */
function mmu_excerpt_length( $length ) {

    if ( is_admin() ) {
        return $length;
    }

    return 24;
}

add_filter( 'excerpt_length', 'mmu_excerpt_length', 20 );


/**
 * Define o final dos resumos dos artigos.
 */
function mmu_excerpt_more( $more ) {

    if ( is_admin() ) {
        return $more;
    }

    return '...';
}

add_filter( 'excerpt_more', 'mmu_excerpt_more' );

/**
 * Carrega o CSS das páginas de categoria.
 */
function mmu_enqueue_category_assets() {

    if ( is_category() ) {

        $category_css_path = get_stylesheet_directory() . '/assets/css/category.css';

        $category_css_version = file_exists( $category_css_path )
            ? filemtime( $category_css_path )
            : wp_get_theme()->get( 'Version' );

        wp_enqueue_style(
            'mmu-category-style',
            get_stylesheet_directory_uri() . '/assets/css/category.css',
            array( 'mmu-child-style' ),
            $category_css_version
        );
    }
}

add_action( 'wp_enqueue_scripts', 'mmu_enqueue_category_assets', 20 );

/**
 * Carrega o CSS dos artigos individuais.
 */
function mmu_enqueue_single_assets() {

    if ( is_single() ) {

        $review_css_path = get_stylesheet_directory() . '/assets/css/review.css';

        $review_css_version = file_exists( $review_css_path )
            ? filemtime( $review_css_path )
            : wp_get_theme()->get( 'Version' );

        wp_enqueue_style(
            'mmu-review-style',
            get_stylesheet_directory_uri() . '/assets/css/review.css',
            array( 'mmu-child-style' ),
            $review_css_version
        );
    }
}

add_action( 'wp_enqueue_scripts', 'mmu_enqueue_single_assets', 20 );

/**
 * Shortcode para bloco de produto / afiliado.
 *
 * Uso:
 * [mmu_produto id="123"] para reutilizar um Produto MMU publicado.
 * O formato antigo com nome, descricao e links continua funcionando.
 */
function mmu_product_shortcode( $atts ) {

    $atts = shortcode_atts(
        array(
            'id'            => 0,
            'nome'          => '',
            'descricao'     => '',
            'amazon'        => '',
            'mercado_livre' => '',
            'shopee'        => '',
        ),
        $atts,
        'mmu_produto'
    );

    $product_id = absint( $atts['id'] );
    $product_image = '';
    if ( $product_id ) {
        if ( 'mmu_produto_item' !== get_post_type( $product_id ) || 'publish' !== get_post_status( $product_id ) ) {
            return '';
        }
        $atts['nome'] = get_the_title( $product_id );
        $atts['descricao'] = wp_trim_words(
            wp_strip_all_tags( strip_shortcodes( (string) get_post_field( 'post_content', $product_id ) ) ),
            35
        );
        $atts['amazon'] = get_post_meta( $product_id, 'mmu_product_amazon', true );
        $atts['mercado_livre'] = get_post_meta( $product_id, 'mmu_product_mercado', true );
        $atts['shopee'] = get_post_meta( $product_id, 'mmu_product_shopee', true );
        if ( has_post_thumbnail( $product_id ) ) {
            $product_image = get_the_post_thumbnail( $product_id, 'medium', array( 'loading' => 'lazy' ) );
        }
    }

    $nome          = sanitize_text_field( $atts['nome'] );
    $descricao     = sanitize_text_field( $atts['descricao'] );
    $amazon        = esc_url( $atts['amazon'] );
    $mercado_livre = esc_url( $atts['mercado_livre'] );
    $shopee        = esc_url( $atts['shopee'] );

    if ( empty( $nome ) ) {
        return '';
    }

    ob_start();
    ?>

    <aside class="mmu-buy-box">

        <?php if ( $product_image ) : ?>
            <div class="mmu-buy-image"><?php echo wp_kses_post( $product_image ); ?></div>
        <?php endif; ?>

        <h3>
            <?php echo esc_html( $nome ); ?>
        </h3>

        <?php if ( ! empty( $descricao ) ) : ?>

            <p>
                <?php echo esc_html( $descricao ); ?>
            </p>

        <?php endif; ?>

        <?php if ( $amazon || $mercado_livre || $shopee ) : ?>

            <div class="mmu-buy-actions">

                <?php if ( $amazon ) : ?>

                    <a
                        class="mmu-buy-button"
                        href="<?php echo esc_url( $amazon ); ?>"
                        target="_blank"
                        rel="nofollow sponsored noopener"
                    >
                        Ver na Amazon
                    </a>

                <?php endif; ?>

                <?php if ( $mercado_livre ) : ?>

                    <a
                        class="mmu-buy-button"
                        href="<?php echo esc_url( $mercado_livre ); ?>"
                        target="_blank"
                        rel="nofollow sponsored noopener"
                    >
                        Ver no Mercado Livre
                    </a>

                <?php endif; ?>

                <?php if ( $shopee ) : ?>

                    <a
                        class="mmu-buy-button"
                        href="<?php echo esc_url( $shopee ); ?>"
                        target="_blank"
                        rel="nofollow sponsored noopener"
                    >
                        Ver na Shopee
                    </a>

                <?php endif; ?>

            </div>

        <?php endif; ?>

        <p class="mmu-affiliate-disclosure">
            Divulgação: podemos receber uma comissão por compras realizadas
            através dos links desta página, sem custo adicional para você.
        </p>

    </aside>

    <?php

    return ob_get_clean();
}

add_shortcode( 'mmu_produto', 'mmu_product_shortcode' );

/**
 * MMU Comparativos: cadastro administrativo de produtos.
 * Mantido em arquivo separado para preservar os shortcodes existentes.
 */
$mmu_products_module = get_stylesheet_directory() . '/inc/mmu-produtos.php';
if ( file_exists( $mmu_products_module ) ) {
    require_once $mmu_products_module;
}


/** MMU Comparativos: cadastro editorial de rankings. */
$mmu_rankings_module = get_stylesheet_directory() . '/inc/mmu-rankings.php';
if ( file_exists( $mmu_rankings_module ) ) {
    require_once $mmu_rankings_module;
}


/** MMU Comparativos: renderização dos cards e shortcode. */
$mmu_comparativo_render = get_stylesheet_directory() . '/inc/mmu-comparativo-render.php';
if ( file_exists( $mmu_comparativo_render ) ) {
    require_once $mmu_comparativo_render;
}

/**
 * Estilos do cabeçalho; não altera a configuração de menus no WordPress.
 */
function mmu_enqueue_header_styles() {
    $path = get_stylesheet_directory() . '/assets/css/header.css';
    if ( file_exists( $path ) ) {
        wp_enqueue_style(
            'mmu-header-style',
            get_stylesheet_directory_uri() . '/assets/css/header.css',
            array( 'mmu-child-style' ),
            filemtime( $path )
        );
    }
}
add_action( 'wp_enqueue_scripts', 'mmu_enqueue_header_styles', 30 );
