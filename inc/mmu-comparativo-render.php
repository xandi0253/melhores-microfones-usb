<?php
/**
 * MMU Comparativos — exibição pública dos rankings.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'wp_enqueue_scripts', 'mmu_comparativo_enqueue_styles', 20 );
function mmu_comparativo_enqueue_styles() {
    $path = get_stylesheet_directory() . '/assets/css/comparativos.css';
    if ( file_exists( $path ) ) {
        wp_enqueue_style(
            'mmu-comparativos',
            get_stylesheet_directory_uri() . '/assets/css/comparativos.css',
            array( 'mmu-child-style' ),
            filemtime( $path )
        );
    }
}

add_shortcode( 'mmu_comparativo', 'mmu_comparativo_shortcode' );
function mmu_comparativo_shortcode( $atts ) {
    $atts = shortcode_atts( array( 'id' => 0 ), $atts, 'mmu_comparativo' );
    $ranking_id = absint( $atts['id'] );

    if ( ! $ranking_id || 'mmu_ranking' !== get_post_type( $ranking_id ) || 'publish' !== get_post_status( $ranking_id ) ) {
        return '';
    }

    $ids = get_post_meta( $ranking_id, '_mmu_ranking_product_ids', true );
    if ( ! is_array( $ids ) || count( $ids ) < 5 || count( $ids ) > 8 ) {
        return '';
    }
    $ids = array_map( 'absint', $ids );
    if ( count( array_unique( $ids ) ) !== count( $ids ) ) {
        return '';
    }
    foreach ( $ids as $id ) {
        if ( 'mmu_produto_item' !== get_post_type( $id ) || 'publish' !== get_post_status( $id ) ) {
            return '';
        }
    }

    $featured = absint( get_post_meta( $ranking_id, '_mmu_ranking_featured_id', true ) );
    $heading_id = 'mmu-ranking-' . $ranking_id;
    ob_start();
    ?>
    <section class="mmu-comparativo" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
        <div class="mmu-comparativo__header">
            <h2 id="<?php echo esc_attr( $heading_id ); ?>"><?php echo esc_html( get_the_title( $ranking_id ) ); ?></h2>
            <p>Seleção editorial baseada nas características e nas necessidades de uso. Confira as especificações antes de comprar.</p>
        </div>
        <div class="mmu-comparativo__grid">
            <?php foreach ( $ids as $index => $id ) : ?>
                <?php
                $connection = get_post_meta( $id, 'mmu_product_connection', true );
                $use = get_post_meta( $id, 'mmu_product_use', true );
                $pros = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', (string) get_post_meta( $id, 'mmu_product_pros', true ) ) ) );
                $cons = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', (string) get_post_meta( $id, 'mmu_product_cons', true ) ) ) );
                $stores = array(
                    'Amazon' => get_post_meta( $id, 'mmu_product_amazon', true ),
                    'Mercado Livre' => get_post_meta( $id, 'mmu_product_mercado', true ),
                    'Shopee' => get_post_meta( $id, 'mmu_product_shopee', true ),
                );
                ?>
                <article class="mmu-comparativo__card">
                    <div class="mmu-comparativo__badges">
                        <span class="mmu-comparativo__rank"><?php echo esc_html( ( $index + 1 ) . 'º lugar' ); ?></span>
                        <?php if ( $featured === $id ) : ?>
                            <span class="mmu-comparativo__featured">Destaque editorial</span>
                        <?php endif; ?>
                    </div>
                    <?php if ( has_post_thumbnail( $id ) ) : ?>
                        <div class="mmu-comparativo__image"><?php echo get_the_post_thumbnail( $id, 'medium', array( 'loading' => 'lazy' ) ); ?></div>
                    <?php endif; ?>
                    <h3><?php echo esc_html( get_the_title( $id ) ); ?></h3>
                    <?php if ( $connection || $use ) : ?>
                        <p class="mmu-comparativo__specs">
                            <?php echo esc_html( implode( ' • ', array_filter( array( $connection, $use ) ) ) ); ?>
                        </p>
                    <?php endif; ?>
                    <?php
                    $description = get_post_field( 'post_content', $id );
                    if ( $description ) :
                    ?>
                        <p class="mmu-comparativo__description"><?php echo esc_html( wp_trim_words( wp_strip_all_tags( strip_shortcodes( $description ) ), 35 ) ); ?></p>
                    <?php endif; ?>
                    <?php if ( $pros ) : ?>
                        <div class="mmu-comparativo__details"><strong>Pontos positivos</strong><ul>
                            <?php foreach ( $pros as $pro ) : ?><li><?php echo esc_html( $pro ); ?></li><?php endforeach; ?>
                        </ul></div>
                    <?php endif; ?>
                    <?php if ( $cons ) : ?>
                        <div class="mmu-comparativo__details mmu-comparativo__cons"><strong>Limitações</strong><ul>
                            <?php foreach ( $cons as $con ) : ?><li><?php echo esc_html( $con ); ?></li><?php endforeach; ?>
                        </ul></div>
                    <?php endif; ?>
                    <div class="mmu-comparativo__actions">
                        <?php foreach ( $stores as $store => $url ) : ?>
                            <?php if ( $url && wp_http_validate_url( $url ) ) : ?>
                                <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="nofollow sponsored noopener noreferrer" class="mmu-comparativo__button">Ver na <?php echo esc_html( $store ); ?></a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <p class="mmu-comparativo__disclosure">Publicidade: podemos receber comissão por compras realizadas pelos links de afiliados, sem custo adicional para você. A classificação é editorial e não representa teste prático de todos os produtos.</p>
    </section>
    <?php
    return ob_get_clean();
}
