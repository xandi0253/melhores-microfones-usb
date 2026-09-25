<?php
/**
 * Front Page
 *
 * Página inicial do site Melhores Microfones USB.
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
                    GUIAS • REVIEWS • COMPARATIVOS
                </span>

                <h1>
                    Encontre o microfone USB ideal para você
                </h1>

                <p class="mmu-hero-description">
                    Comparativos, análises e guias para ajudar você a escolher
                    o melhor microfone USB para podcast, streaming, reuniões,
                    gravações e criação de conteúdo.
                </p>

                <div class="mmu-hero-actions">

                    <a
                        href="#destaques"
                        class="mmu-btn mmu-btn-primary"
                    >
                        Ver microfones
                    </a>

                    <a
                        href="#guias"
                        class="mmu-btn mmu-btn-secondary"
                    >
                        Explorar guias
                    </a>

                </div>

            </div>


            <aside class="mmu-hero-card">

                <span class="mmu-card-label">
                    COMECE POR AQUI
                </span>

                <h2>
                    O que você procura?
                </h2>

                <div class="mmu-quick-links">

                    <a
                        href="<?php echo esc_url( home_url( '/category/microfone-de-mesa/' ) ); ?>"
                    >
                        <strong>
                            Microfone de mesa
                        </strong>

                        <span>
                            Para reuniões, estudos e trabalho
                        </span>
                    </a>


                    <a
                        href="<?php echo esc_url( home_url( '/category/microfone-usb-para-podcast/' ) ); ?>"
                    >
                        <strong>
                            Podcast e criação de conteúdo
                        </strong>

                        <span>
                            Para gravações, vídeos e streaming
                        </span>
                    </a>


                    <a
                        href="<?php echo esc_url( home_url( '/category/comparativo-melhores-microfones-usb/' ) ); ?>"
                        <strong>
                            Comparativos
                        </strong>

                        <span>
                            Compare modelos antes de comprar
                        </span>
                    </a>

                </div>

            </aside>

        </div>

    </section>

        <!-- ESCOLHA POR FINALIDADE -->
    <section class="mmu-use-cases">

        <div class="mmu-container">

            <header class="mmu-use-cases-heading">

                <span class="mmu-eyebrow">
                    ESCOLHA POR FINALIDADE
                </span>

                <h2>
                    Qual microfone USB você procura?
                </h2>

                <p>
                    Encontre conteúdos e recomendações de acordo
                    com a forma como você pretende usar seu microfone.
                </p>

            </header>


            <div class="mmu-use-cases-grid">

                <a
                    class="mmu-use-case-card"
                    href="<?php echo esc_url( home_url( '/category/microfone-usb-para-podcast/' ) ); ?>"
                >
                    <span class="mmu-use-case-icon">
                        🎙️
                    </span>

                    <h3>
                        Podcast
                    </h3>

                    <p>
                        Microfones para voz, entrevistas,
                        podcasts e gravações.
                    </p>

                    <strong>
                        Ver opções →
                    </strong>
                </a>


                <a
                    class="mmu-use-case-card"
                    href="<?php echo esc_url( home_url( '/category/microfone-usb-para-streaming/' ) ); ?>"
                >
                    <span class="mmu-use-case-icon">
                        🎧
                    </span>

                    <h3>
                        Streaming
                    </h3>

                    <p>
                        Modelos para lives, games,
                        transmissões e criação de conteúdo.
                    </p>

                    <strong>
                        Ver opções →
                    </strong>
                </a>


                <a
                    class="mmu-use-case-card"
                    href="<?php echo esc_url( home_url( '/category/microfone-de-mesa/' ) ); ?>"
                >
                    <span class="mmu-use-case-icon">
                        💻
                    </span>

                    <h3>
                        Reuniões e trabalho
                    </h3>

                    <p>
                        Microfones para chamadas,
                        aulas, reuniões e home office.
                    </p>

                    <strong>
                        Ver opções →
                    </strong>
                </a>


                <a
                    class="mmu-use-case-card"
                href="<?php echo esc_url( home_url( '/category/guia-de-compras-melhores-microfones/' ) ); ?>"                >
                    <span class="mmu-use-case-icon">
                        ⭐
                    </span>

                    <h3>
                        Custo-benefício
                    </h3>

                    <p>
                        Encontre modelos equilibrados
                        entre preço, qualidade e recursos.
                    </p>

                    <strong>
                        Ver opções →
                    </strong>
                </a>

            </div>

        </div>

    </section>


    <!-- BENEFÍCIOS -->

    <section class="mmu-benefits">

        <div class="mmu-container mmu-benefits-grid">

            <div class="mmu-benefit">

                <strong>
                    Comparações objetivas
                </strong>

                <span>
                    Entenda as principais diferenças entre os modelos.
                </span>

            </div>


            <div class="mmu-benefit">

                <strong>
                    Guias de compra
                </strong>

                <span>
                    Saiba o que considerar antes de escolher.
                </span>

            </div>


            <div class="mmu-benefit">

                <strong>
                    Especialistas em microfones USB
                </strong>

                <span>
                    Conteúdo focado exclusivamente neste segmento.
                </span>

            </div>

        </div>

    </section>


    <!-- CONTEÚDOS EM DESTAQUE -->
    <section
        id="destaques"
        class="mmu-section"
    >

        <div class="mmu-container">

            <header class="mmu-section-heading">

                <div>

                    <span class="mmu-eyebrow">
                        CONTEÚDOS EM DESTAQUE
                    </span>

                    <h2>
                        Guias e análises recentes
                    </h2>

                </div>

                <p>
                    Confira nossos conteúdos mais recentes sobre microfones USB,
                    comparativos, guias de compra e análises de produtos.
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
                                            Melhores Microfones USB
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
                                    Ler conteúdo →
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
                            Novos conteúdos em breve
                        </h3>

                        <p>
                            Estamos preparando novos guias,
                            comparativos e análises de microfones USB.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </section>

        <!-- MAIS PROCURADOS -->
    <section class="mmu-popular">

        <div class="mmu-container">

            <header class="mmu-popular-heading">

                <div>

                    <span class="mmu-eyebrow">
                        MAIS PROCURADOS
                    </span>

                    <h2>
                        Encontre o melhor microfone para cada necessidade
                    </h2>

                </div>

                <p>
                    Atalhos para alguns dos conteúdos mais úteis
                    na hora de comparar e escolher um microfone USB.
                </p>

            </header>


            <div class="mmu-popular-grid">

                <a
                    class="mmu-popular-card"
                    href="<?php echo esc_url( home_url( '/category/microfone-usb-para-podcast/' ) ); ?>"
                >

                    <span>
                        PODCAST
                    </span>

                    <h3>
                        Melhores microfones USB para podcast
                    </h3>

                    <p>
                        Opções para gravação de voz, entrevistas
                        e produção de podcasts.
                    </p>

                    <strong>
                        Ver recomendações →
                    </strong>

                </a>


                <a
                    class="mmu-popular-card"
                    href="<?php echo esc_url( home_url( '/category/microfone-usb-para-streaming/' ) ); ?>"
                >

                    <span>
                        STREAMING
                    </span>

                    <h3>
                        Melhores microfones para streaming
                    </h3>

                    <p>
                        Modelos para lives, games,
                        transmissões e criação de conteúdo.
                    </p>

                    <strong>
                        Ver recomendações →
                    </strong>

                </a>


                <a
                    class="mmu-popular-card"
                    href="<?php echo esc_url( home_url( '/category/microfone-de-mesa/' ) ); ?>"
                >

                    <span>
                        HOME OFFICE
                    </span>

                    <h3>
                        Melhores microfones de mesa
                    </h3>

                    <p>
                        Para reuniões, aulas online,
                        chamadas e trabalho remoto.
                    </p>

                    <strong>
                        Ver recomendações →
                    </strong>

                </a>


                <a
                    class="mmu-popular-card"
                    href="<?php echo esc_url( home_url( '/category/guia-de-compras-melhores-microfones/'  ) ); ?>"
                >

                    <span>
                        CUSTO-BENEFÍCIO
                    </span>

                    <h3>
                        Como escolher um bom microfone USB
                    </h3>

                    <p>
                        Entenda quais características realmente
                        importam antes de comprar.
                    </p>

                    <strong>
                        Ver guia →
                    </strong>

                </a>

            </div>

        </div>

    </section>


    <!-- GUIAS -->
    <section
        id="guias"
        class="mmu-section mmu-section-soft"
    >

        <div class="mmu-container">

            <header class="mmu-section-heading">

                <div>

                    <span class="mmu-eyebrow">
                        APRENDA ANTES DE COMPRAR
                    </span>

                    <h2>
                        Explore nossos conteúdos
                    </h2>

                </div>

                <p>
                    Encontre informações para entender especificações,
                    recursos e diferenças entre os principais microfones USB.
                </p>

            </header>


            <div class="mmu-guide-grid">

                <a
                    class="mmu-guide-card"
                    href="<?php echo esc_url( home_url( '/category/guia-de-compras-melhores-microfones/' ) ); ?>"
                >

                    <span class="mmu-guide-number">
                        01
                    </span>

                    <div>

                        <h3>
                            Guias de compra
                        </h3>

                        <p>
                            Entenda características, especificações e recursos
                            importantes antes de escolher seu microfone.
                        </p>

                        <strong>
                            Explorar guias →
                        </strong>

                    </div>

                </a>


                <a
                    class="mmu-guide-card"
                    href="<?php echo esc_url( home_url( '/category/comparativo-melhores-microfones-usb/') ); ?>"
                >

                    <span class="mmu-guide-number">
                        02
                    </span>

                    <div>

                        <h3>
                            Comparativos
                        </h3>

                        <p>
                            Compare diferentes microfones USB e descubra
                            as principais diferenças entre os modelos.
                        </p>

                        <strong>
                            Ver comparativos →
                        </strong>

                    </div>

                </a>


                <a
                    class="mmu-guide-card"
                    href="<?php echo esc_url( home_url( '/category/melhores-reviews/' ) ); ?>"
                >

                    <span class="mmu-guide-number">
                        03
                    </span>

                    <div>

                        <h3>
                            Reviews
                        </h3>

                        <p>
                            Conheça características, recursos, vantagens
                            e limitações dos modelos analisados.
                        </p>

                        <strong>
                            Ver reviews →
                        </strong>

                    </div>

                </a>

            </div>

        </div>

    </section>


    <!-- METODOLOGIA -->
    <section class="mmu-method">

        <div class="mmu-container mmu-method-grid">

            <div class="mmu-method-content">

                <span class="mmu-eyebrow">
                    NOSSA ABORDAGEM
                </span>

                <h2>
                    Informação para ajudar você a escolher
                </h2>

                <p>
                    Organizamos especificações, recursos, diferenças entre
                    modelos e situações de uso para tornar sua pesquisa
                    mais simples antes da compra.
                </p>

            </div>


            <div class="mmu-method-box">

                <div>

                    <strong>
                        01
                    </strong>

                    <span>
                        Características e especificações
                    </span>

                </div>


                <div>

                    <strong>
                        02
                    </strong>

                    <span>
                        Comparação entre alternativas
                    </span>

                </div>


                <div>

                    <strong>
                        03
                    </strong>

                    <span>
                        Indicação para diferentes tipos de uso
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!-- CTA FINAL -->
    <section class="mmu-final-cta">

        <div class="mmu-container">

            <div class="mmu-final-cta-box">

                <span class="mmu-eyebrow">
                    MELHORES MICROFONES USB
                </span>

                <h2>
                    Encontre o microfone certo para sua necessidade
                </h2>

                <p>
                    Explore nossos guias, comparativos e análises para
                    conhecer melhor os modelos antes de fazer sua escolha.
                </p>

                <a
                    href="#destaques"
                    class="mmu-btn mmu-btn-primary"
                >
                    Explorar conteúdos
                </a>

            </div>

        </div>

    </section>

</main>

<?php
get_footer();