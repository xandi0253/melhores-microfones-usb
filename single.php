<?php
/**
 * Template para artigos individuais
 *
 * Melhores Microfones USB
 * GeneratePress Child Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="mmu-single-page">

    <?php
    while ( have_posts() ) :
        the_post();
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'mmu-single-article' ); ?>>

            <header class="mmu-single-header">

                <div class="mmu-single-container">

                    <span class="mmu-single-eyebrow">
                        REVIEW
                    </span>

                    <h1 class="mmu-single-title">
                        <?php the_title(); ?>
                    </h1>

                    <div class="mmu-single-meta">
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>
                    </div>

                </div>

            </header>

            <div class="mmu-single-content">

                <div class="mmu-single-container">

                    <?php the_content(); ?>

                </div>

            </div>

        </article>

    <?php
    endwhile;
    ?>

</main>

<?php
get_footer();