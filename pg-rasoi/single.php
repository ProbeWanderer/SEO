<?php
/**
 * Single Recipe / Post Template for PG Rasoi
 *
 * @package PGRasoi
 */

get_header();

while ( have_posts() ) : the_post();
    $post_id         = get_the_ID();
    $is_recipe       = get_post_meta( $post_id, '_pgrasoi_is_recipe', true ) ?: '1';
    $cost_serving    = get_post_meta( $post_id, '_pgrasoi_cost_per_serving', true ) ?: '22';
    $total_cost      = get_post_meta( $post_id, '_pgrasoi_total_cost', true ) ?: '44';
    $prep_time       = get_post_meta( $post_id, '_pgrasoi_prep_time', true ) ?: '5';
    $cook_time       = get_post_meta( $post_id, '_pgrasoi_cook_time', true ) ?: '10';
    $servings        = get_post_meta( $post_id, '_pgrasoi_servings', true ) ?: '1-2 roomies';
    $hostel_hack     = get_post_meta( $post_id, '_pgrasoi_hostel_hack', true );
    $ingredients_raw = get_post_meta( $post_id, '_pgrasoi_ingredients_raw', true );
    $steps_raw       = get_post_meta( $post_id, '_pgrasoi_steps_raw', true );
    $faqs_raw        = get_post_meta( $post_id, '_pgrasoi_faqs_raw', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'recipe-article' ); ?>>
    <div class="container container-narrow">
        
        <!-- Breadcrumbs Navigation -->
        <?php pgrasoi_breadcrumbs(); ?>

        <!-- Recipe Post Header -->
        <header class="recipe-header">
            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: var(--space-xs);">
                <?php pgrasoi_render_diet_badge( $post_id ); ?>
                <?php pgrasoi_render_appliance_badge( $post_id ); ?>
            </div>

            <h1 class="recipe-post-title"><?php the_title(); ?></h1>

            <div style="display: flex; align-items: center; gap: 12px; font-size: var(--font-size-xs); color: var(--color-text-subtle); margin-bottom: var(--space-md);">
                <span>By <strong><?php the_author(); ?></strong></span>
                <span>•</span>
                <span>Updated: <?php echo get_the_modified_date(); ?></span>
                <span>•</span>
                <span class="recipe-cost-badge">₹<?php echo esc_html( $cost_serving ); ?> / plate</span>
                <span>•</span>
                <span>★ [ADD RATING]</span>
            </div>

            <div class="recipe-lead-intro">
                <?php the_excerpt(); ?>
            </div>

            <!-- Fast Action Bar: Jump to Recipe & Print -->
            <div class="recipe-action-bar">
                <a href="#recipe-box" id="jump-to-recipe-btn" class="btn btn-primary btn-sm">
                    ↓ Jump to Recipe
                </a>
                <button type="button" class="btn btn-secondary btn-sm print-recipe-btn">
                    <?php echo pgrasoi_svg( 'print' ); ?> Print Recipe
                </button>
                <button type="button" id="share-recipe-btn" class="btn btn-secondary btn-sm">
                    ↗ Share Recipe
                </button>
            </div>
        </header>

        <!-- Featured Image -->
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="recipe-featured-media">
                <?php the_post_thumbnail( 'pgrasoi-hero', array(
                    'alt' => the_title_attribute( array( 'echo' => false ) ),
                    'loading' => 'eager',
                ) ); ?>
            </div>
        <?php endif; ?>

        <!-- Post Content (Intro, Hostel Context, Background) -->
        <div class="entry-content" style="margin-bottom: var(--space-2xl); font-size: var(--font-size-base); line-height: 1.8;">
            <?php the_content(); ?>
        </div>

        <!-- THE MAIN RECIPE BOX CARD (Jump Destination) -->
        <section id="recipe-box" class="recipe-box-card" aria-label="Recipe Card Details">
            
            <div class="recipe-box-header">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: var(--space-md); flex-wrap: wrap;">
                    <div>
                        <h2 class="recipe-box-title"><?php the_title(); ?></h2>
                        <p style="color: var(--color-text-muted); margin-bottom: 0; font-size: var(--font-size-sm);">
                            Hostel &amp; PG Room Tested Recipe
                        </p>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm print-recipe-btn">
                        <?php echo pgrasoi_svg( 'print' ); ?> Print
                    </button>
                </div>
            </div>

            <!-- Quick Facts Grid (6 Metrics) -->
            <div class="recipe-facts-grid">
                <div class="fact-item">
                    <span class="fact-label">Prep Time</span>
                    <span class="fact-value"><?php echo esc_html( $prep_time ); ?>m</span>
                </div>
                <div class="fact-item">
                    <span class="fact-label">Cook Time</span>
                    <span class="fact-value"><?php echo esc_html( $cook_time ); ?>m</span>
                </div>
                <div class="fact-item">
                    <span class="fact-label">Total Time</span>
                    <span class="fact-value"><?php echo esc_html( intval($prep_time) + intval($cook_time) ); ?>m</span>
                </div>
                <div class="fact-item">
                    <span class="fact-label">Servings</span>
                    <span class="fact-value"><?php echo esc_html( $servings ); ?></span>
                </div>
                <div class="fact-item is-cost">
                    <span class="fact-label">Cost / Plate</span>
                    <span class="fact-value">₹<?php echo esc_html( $cost_serving ); ?></span>
                </div>
                <div class="fact-item">
                    <span class="fact-label">Total Cost</span>
                    <span class="fact-value">₹<?php echo esc_html( $total_cost ); ?></span>
                </div>
            </div>

            <!-- Hostel Rule & Safety Alert (If set) -->
            <?php if ( ! empty( $hostel_hack ) ) : ?>
                <div class="hostel-rule-callout" role="note">
                    <h4>⚠️ Hostel Room Rule &amp; Cooking Safety Tip</h4>
                    <p><?php echo esc_html( $hostel_hack ); ?></p>
                </div>
            <?php endif; ?>

            <!-- Interactive Checklist Ingredients -->
            <div class="ingredients-section">
                <div class="section-subhead">
                    <h3>Ingredients</h3>
                    <span class="subhead-hint">Tap checkbox as you prep</span>
                </div>
                
                <ul class="ingredient-checklist">
                    <?php
                    if ( ! empty( $ingredients_raw ) ) :
                        $lines = explode( "\n", str_replace( "\r", "", $ingredients_raw ) );
                        foreach ( $lines as $line ) :
                            $trimmed = trim( $line );
                            if ( empty( $trimmed ) ) continue;
                            ?>
                            <li class="ingredient-item">
                                <input type="checkbox" class="ingredient-checkbox" aria-label="Mark ingredient as ready" />
                                <span class="ingredient-text"><?php echo esc_html( $trimmed ); ?></span>
                            </li>
                            <?php
                        endforeach;
                    else :
                        ?>
                        <li class="ingredient-item">
                            <input type="checkbox" class="ingredient-checkbox" />
                            <span class="ingredient-text">1 cup Poha (flattened rice) - approx ₹10</span>
                        </li>
                        <li class="ingredient-item">
                            <input type="checkbox" class="ingredient-checkbox" />
                            <span class="ingredient-text">2 tbsp Roasted Peanuts - approx ₹5</span>
                        </li>
                        <li class="ingredient-item">
                            <input type="checkbox" class="ingredient-checkbox" />
                            <span class="ingredient-text">1/2 tsp Mustard seeds &amp; pinch of Turmeric</span>
                        </li>
                        <li class="ingredient-item">
                            <input type="checkbox" class="ingredient-checkbox" />
                            <span class="ingredient-text">1 Green chilli, chopped + 1/2 Lemon</span>
                        </li>
                        <?php
                    endif;
                    ?>
                </ul>
            </div>

            <!-- Step by Step Instructions -->
            <div class="instructions-section">
                <div class="section-subhead">
                    <h3>Step-by-Step Instructions</h3>
                </div>

                <ol class="instruction-steps">
                    <?php
                    if ( ! empty( $steps_raw ) ) :
                        $lines = explode( "\n", str_replace( "\r", "", $steps_raw ) );
                        foreach ( $lines as $line ) :
                            $trimmed = trim( $line );
                            if ( empty( $trimmed ) ) continue;
                            ?>
                            <li class="instruction-step">
                                <div class="step-text"><?php echo esc_html( $trimmed ); ?></div>
                            </li>
                            <?php
                        endforeach;
                    else :
                        ?>
                        <li class="instruction-step">
                            <div class="step-text">Rinse the poha in drinking water using a stainless steel tea strainer and drain well. Let it rest for 2 minutes to soften.</div>
                        </li>
                        <li class="instruction-step">
                            <div class="step-text">Plug in the electric kettle, add 1 tsp oil, and toss in the mustard seeds and roasted peanuts. Press down the boil switch for 45 seconds until they crackle.</div>
                        </li>
                        <li class="instruction-step">
                            <div class="step-text">Switch kettle off. Add drained poha, turmeric, salt, and green chilli. Stir gently with a wooden or silicone spoon to avoid scratching the kettle coil.</div>
                        </li>
                        <li class="instruction-step">
                            <div class="step-text">Close the lid, let the residual steam warm the poha for 3 minutes. Squeeze fresh lemon juice on top and serve hot right away!</div>
                        </li>
                        <?php
                    endif;
                    ?>
                </ol>
            </div>

        </section><!-- #recipe-box -->

        <!-- FAQ Accordion (Schema & User Experience) -->
        <?php if ( ! empty( $faqs_raw ) ) : ?>
            <section class="faq-section" aria-label="Frequently Asked Questions">
                <h3 style="margin-bottom: var(--space-md);">Frequently Asked Hostel Questions</h3>
                <div class="faq-list">
                    <?php
                    $faq_lines = explode( "\n", str_replace( "\r", "", $faqs_raw ) );
                    foreach ( $faq_lines as $faq_line ) :
                        $parts = explode( '|', $faq_line, 2 );
                        if ( count( $parts ) === 2 ) :
                            $q = trim( $parts[0] );
                            $a = trim( $parts[1] );
                            if ( empty( $q ) || empty( $a ) ) continue;
                            ?>
                            <div class="faq-item">
                                <button type="button" class="faq-question" aria-expanded="false">
                                    <span><?php echo esc_html( $q ); ?></span>
                                    <?php echo pgrasoi_svg( 'down' ); ?>
                                </button>
                                <div class="faq-answer">
                                    <p><?php echo esc_html( $a ); ?></p>
                                </div>
                            </div>
                            <?php
                        endif;
                    endforeach;
                    ?>
                </div>
            </section>
        <?php endif; ?>

        <!-- Related Recipes -->
        <section class="related-recipes" style="margin-top: var(--space-3xl); border-top: 1px solid var(--color-border); padding-top: var(--space-2xl);">
            <h3 style="margin-bottom: var(--space-md);">You Might Also Like In Your Room</h3>
            <div class="recipe-grid" style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));">
                <?php
                $related = new WP_Query( array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post__not_in'   => array( $post_id ),
                    'orderby'        => 'rand',
                ) );

                if ( $related->have_posts() ) :
                    while ( $related->have_posts() ) : $related->the_post();
                        get_template_part( 'template-parts/content-card' );
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

    </div>
</article>

<?php
endwhile;

get_footer();
