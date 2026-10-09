<?php
/**
 * Main Index Fallback Template for PG Rasoi
 *
 * @package PGRasoi
 */

get_header();
?>

<div class="container" style="padding-top: var(--space-xl); padding-bottom: var(--space-3xl);">
    
    <!-- Breadcrumbs -->
    <?php pgrasoi_breadcrumbs(); ?>

    <header style="margin-bottom: var(--space-xl); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-md);">
        <h1 style="margin-bottom: var(--space-xs);"><?php esc_html_e( 'Latest Recipes & Guides', 'pg-rasoi' ); ?></h1>
        <p style="color: var(--color-text-muted); margin-bottom: 0;">Fresh room cooking ideas for hostels and PGs across India.</p>
    </header>

    <?php if ( have_posts() ) : ?>
        <div class="recipe-grid">
            <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content-card' );
            endwhile;
            ?>
        </div>

        <div style="margin-top: var(--space-2xl); text-align: center;">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '&larr; Previous', 'pg-rasoi' ),
                'next_text' => __( 'Next &rarr;', 'pg-rasoi' ),
            ) );
            ?>
        </div>
    <?php else : ?>
        <div style="text-align: center; padding: var(--space-3xl) var(--space-md); background: var(--color-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
            <h3>No posts found yet.</h3>
            <p style="color: var(--color-text-muted);">Check back soon for new recipes.</p>
        </div>
    <?php endif; ?>

</div>

<?php
get_footer();
