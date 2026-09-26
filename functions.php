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