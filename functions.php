<?php

function mmu_enqueue_styles() {
    wp_enqueue_style(
        'generatepress-parent',
        get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'mmu-child',
        get_stylesheet_uri(),
        array('generatepress-parent'),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'mmu_enqueue_styles');