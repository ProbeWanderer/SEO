<?php
/**
 * Template part for displaying a recipe card in loops
 *
 * @package PGRasoi
 */

$post_id         = get_the_ID();
$cost_serving    = get_post_meta( $post_id, '_pgrasoi_cost_per_serving', true ) ?: '25';
$prep_time       = get_post_meta( $post_id, '_pgrasoi_prep_time', true ) ?: '5';
$cook_time       = get_post_meta( $post_id, '_pgrasoi_cook_time', true ) ?: '10';
$total_time      = intval( $prep_time ) + intval( $cook_time );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'recipe-card' ); ?>>
    <div class="recipe-card-media">
        <!-- Diet Indicator Badge -->
        <?php pgrasoi_render_diet_badge( $post_id ); ?>

        <!-- Appliance Badge -->
        <?php pgrasoi_render_appliance_badge( $post_id ); ?>

        <!-- Featured Image -->
        <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'pgrasoi-card', array(
                    'class' => 'recipe-card-img',
                    'alt'   => the_title_attribute( array( 'echo' => false ) ),
                    'loading' => 'lazy',
                ) ); ?>
            <?php else : ?>
                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #F6F2EC, #EAE4DC); display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                    🍲
                </div>
            <?php endif; ?>
        </a>
    </div>

    <div class="recipe-card-content">
        <h3 class="recipe-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="recipe-card-excerpt">
            <?php echo wp_trim_words( get_the_excerpt(), 14, '...' ); ?>
        </div>

        <div class="recipe-card-meta">
            <div class="recipe-time-badge">
                <?php echo pgrasoi_svg( 'clock' ); ?>
                <span><?php echo esc_html( $total_time . 'm' ); ?></span>
                <span style="margin-left: 8px; color: var(--color-text-subtle);">★ [ADD RATING]</span>
            </div>

            <div class="recipe-cost-badge">
                ₹<?php echo esc_html( $cost_serving ); ?> / plate
            </div>
        </div>
    </div>
</article>
