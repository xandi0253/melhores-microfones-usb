<?php
/**
 * Category Template
 *
 * Template das páginas de categorias
 * Melhores Microfones USB.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

$category = get_queried_object();

$category_name = single_cat_title( '', false );
$category_description = category_description();

?>

<main id="primary" class="mmu-category-page">

    <!-- CABEÇALHO DA CATEGORIA -->
    <section class="mmu-category-hero">

        <div class="mmu-container">

            <span class="mmu-eyebrow">
                CATEGORIA
            </span>

            <h1>
                <?php echo esc_html( $category_name ); ?>
            </h1>

            <?php if ( ! empty( $category_description ) ) : ?>

                <div class="mmu-category-description">
                    <?php echo wp_kses_post( $category_description ); ?>
                </div>

            <?php endif; ?>

        </div>

    </section>


    <!-- ARTIGOS DA CATEGORIA -->
    <section class="mmu-category-content">

        <div class="mmu-container">

            <header class="mmu-category-heading">

                <span class="mmu-eyebrow">
                    CONTEÚDOS
                </span>

                <h2>
                    Artigos sobre <?php echo esc_html( $category_name ); ?>
                </h2>

            </header>


            <?php if ( have_posts() ) : ?>

                <div class="mmu-category-grid">

                    <?php while ( have_posts() ) : ?>

                        <?php the_post(); ?>

                        <article <?php post_class( 'mmu-category-card' ); ?>>

                            <a
                                class="mmu-category-card-image"
                                href="<?php the_permalink(); ?>"
                                aria-label="<?php echo esc_attr( get_the_title() ); ?>"
                            >

                                <?php if ( has_post_thumbnail() ) : ?>

                                    <?php
                                    the_post_thumbnail(
                                        'medium_large',
                                        array(
                                            'loading' => 'lazy',
                                        )
                                    );
                                    ?>

                                <?php endif; ?>

                            </a>


                            <div class="mmu-category-card-content">

                                <div class="mmu-category-card-meta">

                                    <span>
                                        <?php echo esc_html( get_the_date() ); ?>
                                    </span>

                                </div>


                                <h3>

                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>

                                </h3>


                                <div class="mmu-category-card-excerpt">

                                    <?php the_excerpt(); ?>

                                </div>


                                <a
                                    class="mmu-category-card-link"
                                    href="<?php the_permalink(); ?>"
                                >
                                    Ler conteúdo →
                                </a>

                            </div>

                        </article>

                    <?php endwhile; ?>

                </div>


                <!-- PAGINAÇÃO -->
                <div class="mmu-category-pagination">

                    <?php
                    the_posts_pagination(
                        array(
                            'mid_size'  => 2,
                            'prev_text' => '← Anterior',
                            'next_text' => 'Próxima →',
                        )
                    );
                    ?>

                </div>


            <?php else : ?>

                <div class="mmu-category-empty">

                    <h2>
                        Nenhum conteúdo encontrado
                    </h2>

                    <p>
                        Ainda não existem artigos publicados nesta categoria.
                    </p>

                </div>

            <?php endif; ?>

        </div>

    </section>


    <!-- NAVEGAÇÃO ENTRE CATEGORIAS -->
    <section class="mmu-category-explore">

        <div class="mmu-container">

            <header class="mmu-category-heading">

                <span class="mmu-eyebrow">
                    EXPLORE TAMBÉM
                </span>

                <h2>
                    Outros conteúdos sobre microfones USB
                </h2>

            </header>


            <div class="mmu-category-links">

                <a href="<?php echo esc_url( home_url( '/category/microfone-usb-para-podcast/' ) ); ?>">
                    Podcast
                </a>

                <a href="<?php echo esc_url( home_url( '/category/microfone-usb-para-streaming/' ) ); ?>">
                    Streaming
                </a>

                <a href="<?php echo esc_url( home_url( '/category/microfone-de-mesa/' ) ); ?>">
                    Microfone de mesa
                </a>

                <a href="<?php echo esc_url( home_url( '/category/comparativo-melhores-microfones-usb/' ) ); ?>">
                    Comparativos
                </a>

                <a href="<?php echo esc_url( home_url( '/category/guia-de-compras-melhores-microfones/' ) ); ?>">
                    Guia de compras
                </a>

                <a href="<?php echo esc_url( home_url( '/category/melhores-reviews/' ) ); ?>">
                    Reviews
                </a>

            </div>

        </div>

    </section>

</main>

<?php
get_footer();