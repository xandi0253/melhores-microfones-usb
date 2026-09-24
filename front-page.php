<?php
/**
 * Front Page
 *
 * Homepage for Melhores Microfones USB.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="mmu-home">

    <!-- HERO -->
    <section class="mmu-hero">

        <div class="mmu-container mmu-hero-grid">

            <div class="mmu-hero-content">

                <span class="mmu-eyebrow">
                    GUIDES • REVIEWS • COMPARISONS
                </span>

                <h1>
                    Find the ideal USB microphone for you
                </h1>

                <p class="mmu-hero-description">
                    Reviews, comparisons and buying guides to help you
                    choose the right USB microphone for podcasts,
                    streaming, meetings, recordings and content creation.
                </p>

                <div class="mmu-hero-actions">

                    <a
                        href="#highlights"
                        class="mmu-btn mmu-btn-primary"
                    >
                        View microphones
                    </a>

                    <a
                        href="#guides"
                        class="mmu-btn mmu-btn-secondary"
                    >
                        Explore guides
                    </a>

                </div>

            </div>


            <aside class="mmu-hero-card">

                <span class="mmu-card-label">
                    START HERE
                </span>

                <h2>
                    What are you looking for?
                </h2>

                <div class="mmu-quick-links">

                    <a
                        href="<?php echo esc_url( home_url( '/category/microfone-de-mesa/' ) ); ?>"
                    >
                        <strong>
                            Desktop microphones
                        </strong>

                        <span>
                            For meetings, study and work
                        </span>
                    </a>


                    <a
                        href="<?php echo esc_url( home_url( '/category/microfone-usb-para-podcast/' ) ); ?>"
                    >
                        <strong>
                            Podcasts and content
                        </strong>

                        <span>
                            For recording, videos and streaming
                        </span>
                    </a>


                    <a
                        href="<?php echo esc_url( home_url( '/category/comparativo/' ) ); ?>"
                    >
                        <strong>
                            Comparisons
                        </strong>

                        <span>
                            Compare models before buying
                        </span>
                    </a>

                </div>

            </aside>

        </div>

    </section>


    <!-- BENEFITS -->
    <section class="mmu-benefits">

        <div class="mmu-container mmu-benefits-grid">

            <div class="mmu-benefit">

                <strong>
                    Objective comparisons
                </strong>

                <span>
                    Understand the main differences between models.
                </span>

            </div>


            <div class="mmu-benefit">

                <strong>
                    Buying guides
                </strong>

                <span>
                    Learn what to consider before choosing.
                </span>

            </div>


            <div class="mmu-benefit">

                <strong>
                    USB microphone focus
                </strong>

                <span>
                    Specialized content focused on this market.
                </span>

            </div>

        </div>

    </section>


    <!-- LATEST ARTICLES -->
    <section
        id="highlights"
        class="mmu-section"
    >

        <div class="mmu-container">

            <header class="mmu-section-heading">

                <div>

                    <span class="mmu-eyebrow">
                        FEATURED CONTENT
                    </span>

                    <h2>
                        Latest guides and reviews
                    </h2>

                </div>

                <p>
                    Explore our latest articles about USB microphones,
                    comparisons, buying guides and product reviews.
                </p>

            </header>


            <div class="mmu-post-grid">

                <?php
                $mmu_posts = new WP_Query(
                    array(
                        'post_type'           => 'post',
                        'post_status'         => 'publish',
                        'posts_per_page'      => 6,
                        'ignore_sticky_posts' => true,
                    )
                );

                if ( $mmu_posts->have_posts() ) :

                    while ( $mmu_posts->have_posts() ) :

                        $mmu_posts->the_post();

                        $categories = get_the_category();
                        ?>

                        <article
                            id="post-<?php the_ID(); ?>"
                            <?php post_class( 'mmu-post-card' ); ?>
                        >

                            <a
                                class="mmu-post-image"
                                href="<?php the_permalink(); ?>"
                                aria-label="<?php echo esc_attr( get_the_title() ); ?>"
                            >

                                <?php if ( has_post_thumbnail() ) : ?>

                                    <?php
                                    the_post_thumbnail(
                                        'medium_large',
                                        array(
                                            'loading' => 'lazy',
                                            'alt'     => esc_attr( get_the_title() ),
                                        )
                                    );
                                    ?>

                                <?php else : ?>

                                    <div class="mmu-image-placeholder">

                                        <span>
                                            USB Microphones
                                        </span>

                                    </div>

                                <?php endif; ?>

                            </a>


                            <div class="mmu-post-content">

                                <?php if ( ! empty( $categories ) ) : ?>

                                    <div class="mmu-post-meta">

                                        <?php
                                        echo esc_html(
                                            $categories[0]->name
                                        );
                                        ?>

                                    </div>

                                <?php endif; ?>


                                <h3>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php the_title(); ?>

                                    </a>

                                </h3>


                                <p>

                                    <?php
                                    echo esc_html(
                                        wp_trim_words(
                                            get_the_excerpt(),
                                            22,
                                            '...'
                                        )
                                    );
                                    ?>

                                </p>


                                <a
                                    class="mmu-read-more"
                                    href="<?php the_permalink(); ?>"
                                >
                                    Read article →
                                </a>

                            </div>

                        </article>

                        <?php

                    endwhile;

                    wp_reset_postdata();

                else :
                    ?>

                    <div class="mmu-no-posts">

                        <h3>
                            New content coming soon
                        </h3>

                        <p>
                            We are preparing new guides,
                            comparisons and USB microphone reviews.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </section>


    <!-- GUIDES -->
    <section
        id="guides"
        class="mmu-section mmu-section-soft"
    >

        <div class="mmu-container">

            <header class="mmu-section-heading">

                <div>

                    <span class="mmu-eyebrow">
                        LEARN BEFORE YOU BUY
                    </span>

                    <h2>
                        Explore our content
                    </h2>

                </div>

                <p>
                    Find information to help you understand
                    specifications, features and differences
                    between USB microphones.
                </p>

            </header>


            <div class="mmu-guide-grid">

                <a
                    class="mmu-guide-card"
                    href="<?php echo esc_url( home_url( '/category/guia-de-compras/' ) ); ?>"
                >

                    <span class="mmu-guide-number">
                        01
                    </span>

                    <div>

                        <h3>
                            Buying guides
                        </h3>

                        <p>
                            Understand the specifications,
                            features and details that matter
                            before purchasing.
                        </p>

                        <strong>
                            Explore guides →
                        </strong>

                    </div>

                </a>


                <a
                    class="mmu-guide-card"
                    href="<?php echo esc_url( home_url( '/category/comparativo/' ) ); ?>"
                >

                    <span class="mmu-guide-number">
                        02
                    </span>

                    <div>

                        <h3>
                            Comparisons
                        </h3>

                        <p>
                            Compare different microphones
                            and understand their main
                            differences.
                        </p>

                        <strong>
                            View comparisons →
                        </strong>

                    </div>

                </a>


                <a
                    class="mmu-guide-card"
                    href="<?php echo esc_url( home_url( '/category/reviews/' ) ); ?>"
                >

                    <span class="mmu-guide-number">
                        03
                    </span>

                    <div>

                        <h3>
                            Reviews
                        </h3>

                        <p>
                            Discover features, advantages,
                            limitations and possible uses
                            for each model.
                        </p>

                        <strong>
                            View reviews →
                        </strong>

                    </div>

                </a>

            </div>

        </div>

    </section>


    <!-- METHODOLOGY -->
    <section class="mmu-method">

        <div class="mmu-container mmu-method-grid">

            <div class="mmu-method-content">

                <span class="mmu-eyebrow">
                    OUR APPROACH
                </span>

                <h2>
                    Information to help you make a better choice
                </h2>

                <p>
                    We organize specifications, features,
                    differences between models and usage
                    scenarios to make your research easier.
                </p>

            </div>


            <div class="mmu-method-box">

                <div>

                    <strong>
                        01
                    </strong>

                    <span>
                        Features and specifications
                    </span>

                </div>


                <div>

                    <strong>
                        02
                    </strong>

                    <span>
                        Comparison between alternatives
                    </span>

                </div>


                <div>

                    <strong>
                        03
                    </strong>

                    <span>
                        Recommendations by type of use
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!-- FINAL CTA -->
    <section class="mmu-final-cta">

        <div class="mmu-container">

            <div class="mmu-final-cta-box">

                <span class="mmu-eyebrow">
                    MELHORES MICROFONES USB
                </span>

                <h2>
                    Start your search for the right microphone
                </h2>

                <p>
                    Explore our latest guides, comparisons
                    and reviews before making your choice.
                </p>

                <a
                    href="#highlights"
                    class="mmu-btn mmu-btn-primary"
                >
                    Explore content
                </a>

            </div>

        </div>

    </section>

</main>

<?php
get_footer();