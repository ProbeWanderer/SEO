<?php
/**
 * Search Results Template for PG Rasoi
 *
 * @package PGRasoi
 */

get_header();
?>

<div class="container" style="padding-top: var(--space-xl); padding-bottom: var(--space-3xl);">
    
    <!-- Breadcrumbs -->
    <?php pgrasoi_breadcrumbs(); ?>

    <header style="margin-bottom: var(--space-xl); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-md);">
        <h1 style="margin-bottom: var(--space-xs);">
            Search Results for: <span style="color: var(--color-primary);">&ldquo;<?php echo esc_html( get_search_query() ); ?>&rdquo;</span>
        </h1>
        <p style="color: var(--color-text-muted); margin-bottom: 0;">
            Found <?php echo esc_html( $wp_query->found_posts ?? 0 ); ?> recipe(s) matching your query.
        </p>
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
        <div style="text-align: center; padding: var(--space-3xl) var(--space-md); background: var(--color-surface); border-radius: var(--radius-lg); border: 1px solid var(--color-border); max-width: 600px; margin: 0 auto;">
            <div style="font-size: 3rem; margin-bottom: var(--space-xs);">🔍</div>
            <h3>No recipes matched your search.</h3>
            <p style="color: var(--color-text-muted); margin-bottom: var(--space-md);">Try searching with broader terms like "kettle", "oats", "maggi", or "poha".</p>
            
            <form role="search" method="get" class="hero-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" style="max-width: 400px; margin: 0 auto;">
                <input type="search" class="hero-search-input" placeholder="Search again..." value="" name="s" />
                <button type="submit" class="btn btn-primary hero-search-btn">Search</button>
            </form>
        </div>
    <?php endif; ?>

</div>

<?php
get_footer();
