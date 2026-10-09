<?php
/**
 * Archive & Taxonomy Template for PG Rasoi
 *
 * @package PGRasoi
 */

get_header();
?>

<div class="container" style="padding-top: var(--space-xl); padding-bottom: var(--space-3xl);">
    
    <!-- Breadcrumbs -->
    <?php pgrasoi_breadcrumbs(); ?>

    <!-- Archive Title & Description -->
    <header style="margin-bottom: var(--space-xl); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-md);">
        <?php
        the_archive_title( '<h1 style="margin-bottom: var(--space-xs);">', '</h1>' );
        the_archive_description( '<div style="color: var(--color-text-muted); font-size: var(--font-size-md);">', '</div>' );
        ?>

        <!-- Filter Shortcut Chips -->
        <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-top: var(--space-md);">
            <span style="font-size: var(--font-size-xs); font-weight: 700; color: var(--color-text-subtle); align-self: center;">QUICK FILTER:</span>
            <a href="<?php echo esc_url( home_url( '/appliance/electric-kettle/' ) ); ?>" class="btn btn-secondary btn-sm">🫖 Kettle</a>
            <a href="<?php echo esc_url( home_url( '/appliance/rice-cooker/' ) ); ?>" class="btn btn-secondary btn-sm">🍚 Rice Cooker</a>
            <a href="<?php echo esc_url( home_url( '/appliance/induction/' ) ); ?>" class="btn btn-secondary btn-sm">🍳 Induction</a>
            <a href="<?php echo esc_url( home_url( '/appliance/no-flame/' ) ); ?>" class="btn btn-secondary btn-sm">🥗 No-Flame</a>
            <a href="<?php echo esc_url( home_url( '/diet/pure-veg/' ) ); ?>" class="btn btn-secondary btn-sm">🟢 Pure Veg</a>
        </div>
    </header>

    <!-- Recipes Grid -->
    <?php if ( have_posts() ) : ?>
        <div class="recipe-grid">
            <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content-card' );
            endwhile;
            ?>
        </div>

        <!-- Pagination -->
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
            <h3>No recipes found in this category yet.</h3>
            <p style="color: var(--color-text-muted);">Try searching for specific ingredients or checking another appliance.</p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary" style="margin-top: var(--space-sm);">
                Browse All Recipes
            </a>
        </div>
    <?php endif; ?>

</div>

<?php
get_footer();
