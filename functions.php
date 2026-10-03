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
 * [mmu_produto nome="FIFINE AM8" descricao="Microfone dinâmico com USB e XLR" url="https://..."]
 */
function mmu_product_shortcode( $atts ) {

    $atts = shortcode_atts(
        array(
            'nome'      => '',
            'descricao' => '',
            'url'       => '',
            'botao'     => 'Ver preço atual',
        ),
        $atts,
        'mmu_produto'
    );

    $nome      = sanitize_text_field( $atts['nome'] );
    $descricao = sanitize_text_field( $atts['descricao'] );
    $url       = esc_url( $atts['url'] );
    $botao     = sanitize_text_field( $atts['botao'] );

    if ( empty( $nome ) ) {
        return '';
    }

    ob_start();
    ?>

    <aside class="mmu-buy-box">

        <h3>
            <?php echo esc_html( $nome ); ?>
        </h3>

        <?php if ( ! empty( $descricao ) ) : ?>

            <p>
                <?php echo esc_html( $descricao ); ?>
            </p>

        <?php endif; ?>

        <?php if ( ! empty( $url ) ) : ?>

            <div class="mmu-buy-actions">

                <a
                    class="mmu-buy-button"
                    href="<?php echo esc_url( $url ); ?>"
                    target="_blank"
                    rel="nofollow sponsored noopener"
                >
                    <?php echo esc_html( $botao ); ?>
                </a>

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