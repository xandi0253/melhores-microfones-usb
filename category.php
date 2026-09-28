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

$category_slug = isset( $category->slug )
    ? $category->slug
    : '';
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

        <!-- COMO ESCOLHER -->
    <?php if ( 'microfone-usb-para-streaming' === $category_slug ) : ?>

        <section class="mmu-category-guide">

            <div class="mmu-container">

                <header class="mmu-category-heading">

                    <span class="mmu-eyebrow">
                        COMO ESCOLHER
                    </span>

                    <h2>
                        Como escolher um microfone USB para streaming
                    </h2>

                    <p>
                        Alguns pontos fazem diferença na qualidade da voz
                        durante lives, games e transmissões.
                    </p>

                </header>


                <div class="mmu-category-guide-grid">

                    <div class="mmu-category-guide-item">
                        <h3>Qualidade de captação</h3>
                        <p>
                            Priorize uma reprodução clara da voz, com bom nível
                            de detalhes e baixo ruído.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Padrão polar</h3>
                        <p>
                            O padrão cardioide costuma funcionar bem para
                            captar a voz e reduzir sons vindos de outras direções.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Controle de ganho</h3>
                        <p>
                            O ajuste de ganho no próprio microfone facilita
                            controlar rapidamente a sensibilidade da captação.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Monitoramento</h3>
                        <p>
                            Uma saída para fone de ouvido permite acompanhar
                            sua voz durante a transmissão.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Compatibilidade</h3>
                        <p>
                            Verifique a compatibilidade com computador,
                            sistema operacional e programas utilizados nas lives.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Ambiente</h3>
                        <p>
                            Considere ruídos, teclado, ventiladores e a acústica
                            do espaço onde você fará as transmissões.
                        </p>
                    </div>

                </div>

            </div>

        </section>

    <?php endif; ?>


    <?php if ( 'microfone-usb-para-podcast' === $category_slug ) : ?>

    <section class="mmu-category-guide">

        <div class="mmu-container">

            <header class="mmu-category-heading">

                <span class="mmu-eyebrow">
                    COMO ESCOLHER
                </span>

                <h2>
                    Como escolher um microfone USB para podcast
                </h2>

                <p>
                    Veja os principais pontos para conseguir uma voz clara,
                    natural e consistente em gravações de podcast.
                </p>

            </header>

            <div class="mmu-category-guide-grid">

                <div class="mmu-category-guide-item">
                    <h3>Qualidade da voz</h3>
                    <p>
                        Procure um microfone que reproduza a voz com clareza,
                        definição e baixo nível de ruído.
                    </p>
                </div>

                <div class="mmu-category-guide-item">
                    <h3>Padrão polar</h3>
                    <p>
                        Para gravações individuais, o cardioide costuma ajudar
                        a priorizar a voz e reduzir sons ao redor.
                    </p>
                </div>

                <div class="mmu-category-guide-item">
                    <h3>Monitoramento</h3>
                    <p>
                        A saída para fone permite acompanhar a gravação
                        e perceber problemas de volume ou ruído.
                    </p>
                </div>

                <div class="mmu-category-guide-item">
                    <h3>Controle de ganho</h3>
                    <p>
                        Ajustes de ganho acessíveis facilitam encontrar um nível
                        adequado para diferentes vozes e distâncias.
                    </p>
                </div>

                <div class="mmu-category-guide-item">
                    <h3>Suporte e posicionamento</h3>
                    <p>
                        Considere a compatibilidade com pedestal ou braço
                        articulado para posicionar o microfone corretamente.
                    </p>
                </div>

                <div class="mmu-category-guide-item">
                    <h3>Ambiente de gravação</h3>
                    <p>
                        Ruídos externos e reflexões do ambiente também
                        influenciam bastante o resultado da gravação.
                    </p>
                </div>

            </div>

        </div>

    </section>

<?php endif; ?>


    <!-- COMO ESCOLHER - MICROFONE DE MESA -->
    <?php if ( 'microfone-de-mesa' === $category_slug ) : ?>

        <section class="mmu-category-guide">

            <div class="mmu-container">

                <header class="mmu-category-heading">

                    <span class="mmu-eyebrow">
                        COMO ESCOLHER
                    </span>

                    <h2>
                        Como escolher um microfone de mesa
                    </h2>

                    <p>
                        Avalie os principais recursos para reuniões, aulas,
                        chamadas, estudos e trabalho no computador.
                    </p>

                </header>

                <div class="mmu-category-guide-grid">

                    <div class="mmu-category-guide-item">
                        <h3>Clareza da voz</h3>
                        <p>
                            Priorize modelos que mantenham a fala clara e
                            inteligível durante chamadas e reuniões.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Captação direcional</h3>
                        <p>
                            Uma captação mais direcionada pode ajudar a reduzir
                            sons de teclado e outros ruídos do ambiente.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Facilidade de uso</h3>
                        <p>
                            Microfones USB plug and play são práticos para
                            conectar ao computador e começar a utilizar.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Controle de volume</h3>
                        <p>
                            Controles acessíveis facilitam ajustes durante
                            reuniões, aulas e chamadas.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Tamanho e posicionamento</h3>
                        <p>
                            Considere o espaço disponível na mesa e a distância
                            adequada entre o microfone e sua voz.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Compatibilidade</h3>
                        <p>
                            Verifique o funcionamento com seu sistema operacional
                            e aplicativos de videoconferência.
                        </p>
                    </div>

                </div>

            </div>

        </section>

    <?php endif; ?>


        <!-- COMO ESCOLHER - COMPARATIVOS -->
    <?php if ( 'comparativo-melhores-microfones-usb' === $category_slug ) : ?>

        <section class="mmu-category-guide">

            <div class="mmu-container">

                <header class="mmu-category-heading">

                    <span class="mmu-eyebrow">
                        COMO COMPARAR
                    </span>

                    <h2>
                        Como comparar microfones USB
                    </h2>

                    <p>
                        Compare os modelos considerando o tipo de uso,
                        os recursos disponíveis e as características que
                        realmente fazem diferença para você.
                    </p>

                </header>

                <div class="mmu-category-guide-grid">

                    <div class="mmu-category-guide-item">
                        <h3>Qualidade de áudio</h3>
                        <p>
                            Observe as características de captação e a proposta
                            de cada modelo para voz, gravações e transmissões.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Recursos disponíveis</h3>
                        <p>
                            Compare controles de ganho, mute, monitoramento
                            por fone e outros recursos oferecidos.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Padrão polar</h3>
                        <p>
                            O padrão de captação influencia quais sons o
                            microfone prioriza e quais tende a reduzir.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Construção</h3>
                        <p>
                            Considere materiais, base, suporte e possibilidades
                            de posicionamento na sua configuração.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Compatibilidade</h3>
                        <p>
                            Verifique conexões, sistemas operacionais e
                            equipamentos compatíveis com cada modelo.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Preço e proposta</h3>
                        <p>
                            Compare o preço com os recursos oferecidos e com
                            a finalidade para a qual o microfone será utilizado.
                        </p>
                    </div>

                </div>

            </div>

        </section>

    <?php endif; ?>

        <!-- COMO ESCOLHER - GUIA DE COMPRAS -->
    <?php if ( 'guia-de-compras-melhores-microfones' === $category_slug ) : ?>

        <section class="mmu-category-guide">

            <div class="mmu-container">

                <header class="mmu-category-heading">

                    <span class="mmu-eyebrow">
                        ANTES DE COMPRAR
                    </span>

                    <h2>
                        O que avaliar antes de comprar um microfone USB
                    </h2>

                    <p>
                        Entenda os principais critérios para escolher um
                        microfone adequado ao seu uso, ambiente e orçamento.
                    </p>

                </header>

                <div class="mmu-category-guide-grid">

                    <div class="mmu-category-guide-item">
                        <h3>Finalidade de uso</h3>
                        <p>
                            Defina primeiro se o microfone será utilizado para
                            podcast, streaming, reuniões, aulas ou gravações.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Orçamento</h3>
                        <p>
                            Determine quanto pretende investir para comparar
                            modelos dentro de uma faixa de preço adequada.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Ambiente</h3>
                        <p>
                            Considere ruídos, acústica e o espaço disponível
                            para posicionar o microfone corretamente.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Recursos essenciais</h3>
                        <p>
                            Avalie se você precisa de controle de ganho, mute,
                            monitoramento por fone ou diferentes padrões polares.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Compatibilidade</h3>
                        <p>
                            Confirme conexões, sistema operacional e compatibilidade
                            com os programas que pretende utilizar.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Custo-benefício</h3>
                        <p>
                            Compare preço, recursos e finalidade para evitar
                            pagar por funções que você não pretende utilizar.
                        </p>
                    </div>

                </div>

            </div>

        </section>

    <?php endif; ?>

        <!-- COMO ANALISAMOS - REVIEWS -->
    <?php if ( 'melhores-reviews' === $category_slug ) : ?>

        <section class="mmu-category-guide">

            <div class="mmu-container">

                <header class="mmu-category-heading">

                    <span class="mmu-eyebrow">
                        NOSSAS ANÁLISES
                    </span>

                    <h2>
                        O que consideramos em nossos reviews
                    </h2>

                    <p>
                        Nossos conteúdos consideram características técnicas,
                        recursos, proposta de uso e informações relevantes
                        para ajudar na comparação entre os modelos.
                    </p>

                </header>

                <div class="mmu-category-guide-grid">

                    <div class="mmu-category-guide-item">
                        <h3>Qualidade de captação</h3>
                        <p>
                            Analisamos as características de captação e a
                            proposta do microfone para diferentes tipos de uso.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Facilidade de uso</h3>
                        <p>
                            Consideramos instalação, configuração e controles
                            disponíveis para o usuário.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Recursos e controles</h3>
                        <p>
                            Verificamos recursos como ganho, mute,
                            monitoramento e padrões de captação disponíveis.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Construção</h3>
                        <p>
                            Consideramos materiais, formato, suporte e
                            possibilidades de posicionamento do microfone.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Compatibilidade</h3>
                        <p>
                            Avaliamos conexões, sistemas operacionais e
                            equipamentos indicados pelo fabricante.
                        </p>
                    </div>

                    <div class="mmu-category-guide-item">
                        <h3>Relação custo-benefício</h3>
                        <p>
                            Comparamos preço, recursos e proposta para entender
                            em quais situações cada modelo pode fazer sentido.
                        </p>
                    </div>

                </div>

            </div>

        </section>

    <?php endif; ?>


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


            <d<div class="mmu-category-links">



    <?php if ( 'microfone-usb-para-podcast' !== $category_slug ) : ?>

        <a href="<?php echo esc_url( home_url( '/category/microfone-usb-para-podcast/' ) ); ?>">
            Podcast
        </a>

    <?php endif; ?>


    <?php if ( 'microfone-usb-para-streaming' !== $category_slug ) : ?>

        <a href="<?php echo esc_url( home_url( '/category/microfone-usb-para-streaming/' ) ); ?>">
            Streaming
        </a>

    <?php endif; ?>


    <?php if ( 'microfone-de-mesa' !== $category_slug ) : ?>

        <a href="<?php echo esc_url( home_url( '/category/microfone-de-mesa/' ) ); ?>">
            Microfone de mesa
        </a>

    <?php endif; ?>


    <?php if ( 'comparativo-melhores-microfones-usb' !== $category_slug ) : ?>

        <a href="<?php echo esc_url( home_url( '/category/comparativo-melhores-microfones-usb/' ) ); ?>">
            Comparativos
        </a>

    <?php endif; ?>


    <?php if ( 'guia-de-compras-melhores-microfones' !== $category_slug ) : ?>
        <a href="<?php echo esc_url( home_url( '/category/guia-de-compras-melhores-microfones/' ) ); ?>">
            Guia de compras
        </a>

    <?php endif; ?>


    <?php if ( 'melhores-reviews' !== $category_slug ) : ?>

        <a href="<?php echo esc_url( home_url( '/category/melhores-reviews/' ) ); ?>">
            Reviews
        </a>

    <?php endif; ?>

</div>

        </div>

    </section>

</main>

<?php
get_footer();