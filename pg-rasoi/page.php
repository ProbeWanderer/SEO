<?php
/**
 * Default Page Template for PG Rasoi
 *
 * @package PGRasoi
 */

get_header();
?>

<div class="container container-narrow" style="padding-top: var(--space-xl); padding-bottom: var(--space-3xl);">
    
    <!-- Breadcrumbs -->
    <?php pgrasoi_breadcrumbs(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header style="margin-bottom: var(--space-lg); border-bottom: 1px solid var(--color-border); padding-bottom: var(--space-md);">
                <h1 style="margin-bottom: var(--space-xs);"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content" style="line-height: 1.8; font-size: var(--font-size-base);">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>

</div>

<?php
get_footer();
