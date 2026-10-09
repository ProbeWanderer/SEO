<?php
/**
 * PG Rasoi - Theme Functions & Definitions
 *
 * @package PGRasoi
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define( 'PGRASOI_VERSION', '1.0.0' );
define( 'PGRASOI_DIR', get_template_directory() );
define( 'PGRASOI_URI', get_template_directory_uri() );

/* ==========================================================================
   1. THEME SETUP & FEATURES
   ========================================================================== */
function pgrasoi_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'pg-rasoi', PGRASOI_DIR . '/languages' );

    // Let WordPress manage document title
    add_theme_support( 'title-tag' );

    // Enable Featured Images
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 400, 250, true );
    add_image_size( 'pgrasoi-card', 600, 375, true ); // 16:10 ratio
    add_image_size( 'pgrasoi-hero', 1200, 675, true ); // 16:9 ratio

    // Register primary & footer navigation
    register_nav_menus( array(
        'primary' => __( 'Primary Header Menu', 'pg-rasoi' ),
        'footer'  => __( 'Footer Navigation', 'pg-rasoi' ),
    ) );

    // HTML5 semantic tags support
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Responsive embedded content (YouTube, etc.)
    add_theme_support( 'responsive-embeds' );

    // Custom site logo
    add_theme_support( 'custom-logo', array(
        'height'      => 48,
        'width'       => 160,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
add_action( 'after_setup_theme', 'pgrasoi_setup' );

/* ==========================================================================
   2. ENQUEUE STYLES & SCRIPTS (Core Web Vitals Optimized)
   ========================================================================== */
function pgrasoi_enqueue_assets() {
    // Preconnect to Google Fonts
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap">' . "\n";

    // Main Theme Stylesheet
    wp_enqueue_style( 'pgrasoi-main-style', PGRASOI_URI . '/assets/css/main.css', array(), PGRASOI_VERSION );
    wp_enqueue_style( 'pgrasoi-root-style', get_stylesheet_uri(), array('pgrasoi-main-style'), PGRASOI_VERSION );

    // Lightweight Vanilla JavaScript (Deferred for INP & TBT optimization)
    wp_enqueue_script( 'pgrasoi-main-js', PGRASOI_URI . '/assets/js/main.js', array(), PGRASOI_VERSION, true );
    wp_script_add_data( 'pgrasoi-main-js', 'defer', true );
}
add_action( 'wp_enqueue_scripts', 'pgrasoi_enqueue_assets' );

/* ==========================================================================
   3. CUSTOM TAXONOMIES FOR HOSTEL ROOM COOKING
   ========================================================================== */
function pgrasoi_register_taxonomies() {
    // 1. Appliance / Equipment Taxonomy
    register_taxonomy( 'appliance', array( 'post' ), array(
        'labels' => array(
            'name'          => __( 'Appliances', 'pg-rasoi' ),
            'singular_name' => __( 'Appliance', 'pg-rasoi' ),
            'add_new_item'  => __( 'Add New Appliance', 'pg-rasoi' ),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'appliance' ),
    ) );

    // 2. Diet Preference Taxonomy (Veg, Egg, Non-Veg)
    register_taxonomy( 'diet_type', array( 'post' ), array(
        'labels' => array(
            'name'          => __( 'Diet Types', 'pg-rasoi' ),
            'singular_name' => __( 'Diet Type', 'pg-rasoi' ),
            'add_new_item'  => __( 'Add New Diet Type', 'pg-rasoi' ),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'diet' ),
    ) );
}
add_action( 'init', 'pgrasoi_register_taxonomies' );

/* ==========================================================================
   4. CUSTOM RECIPE METABOX (Cost in ₹, Times, Servings, Room Rules)
   ========================================================================== */
function pgrasoi_add_recipe_meta_box() {
    add_meta_box(
        'pgrasoi_recipe_meta',
        __( 'PG Rasoi - Hostel Recipe Details & Budget', 'pg-rasoi' ),
        'pgrasoi_render_recipe_meta_box',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'pgrasoi_add_recipe_meta_box' );

function pgrasoi_render_recipe_meta_box( $post ) {
    wp_nonce_field( 'pgrasoi_save_recipe_meta', 'pgrasoi_recipe_meta_nonce' );

    $is_recipe       = get_post_meta( $post->ID, '_pgrasoi_is_recipe', true );
    $cost_serving    = get_post_meta( $post->ID, '_pgrasoi_cost_per_serving', true );
    $total_cost      = get_post_meta( $post->ID, '_pgrasoi_total_cost', true );
    $prep_time       = get_post_meta( $post->ID, '_pgrasoi_prep_time', true );
    $cook_time       = get_post_meta( $post->ID, '_pgrasoi_cook_time', true );
    $servings        = get_post_meta( $post->ID, '_pgrasoi_servings', true );
    $hostel_hack     = get_post_meta( $post->ID, '_pgrasoi_hostel_hack', true );
    $ingredients_raw = get_post_meta( $post->ID, '_pgrasoi_ingredients_raw', true );
    $steps_raw       = get_post_meta( $post->ID, '_pgrasoi_steps_raw', true );
    $faqs_raw        = get_post_meta( $post->ID, '_pgrasoi_faqs_raw', true );
    ?>
    <style>
        .pgrasoi-field-group { margin-bottom: 14px; }
        .pgrasoi-field-group label { display: block; font-weight: 600; margin-bottom: 4px; }
        .pgrasoi-row { display: flex; gap: 16px; flex-wrap: wrap; }
        .pgrasoi-col { flex: 1; min-width: 140px; }
        .pgrasoi-textarea { width: 100%; min-height: 90px; font-family: monospace; }
        .pgrasoi-hint { font-size: 12px; color: #666; margin-top: 3px; }
    </style>

    <div class="pgrasoi-field-group">
        <label>
            <input type="checkbox" name="pgrasoi_is_recipe" value="1" <?php checked( $is_recipe, '1' ); ?> />
            <strong>Enable Recipe Layout & Rich Snippet Schema for this post</strong>
        </label>
    </div>

    <div class="pgrasoi-row">
        <div class="pgrasoi-col pgrasoi-field-group">
            <label for="pgrasoi_cost_per_serving">Cost Per Serving (₹)</label>
            <input type="number" step="0.5" id="pgrasoi_cost_per_serving" name="pgrasoi_cost_per_serving" value="<?php echo esc_attr( $cost_serving ); ?>" style="width:100%;" placeholder="e.g. 25" />
            <div class="pgrasoi-hint">Calculated per plate cost</div>
        </div>
        <div class="pgrasoi-col pgrasoi-field-group">
            <label for="pgrasoi_total_cost">Total Batch Cost (₹)</label>
            <input type="number" step="1" id="pgrasoi_total_cost" name="pgrasoi_total_cost" value="<?php echo esc_attr( $total_cost ); ?>" style="width:100%;" placeholder="e.g. 50" />
            <div class="pgrasoi-hint">Full recipe budget</div>
        </div>
        <div class="pgrasoi-col pgrasoi-field-group">
            <label for="pgrasoi_prep_time">Prep Time (mins)</label>
            <input type="number" id="pgrasoi_prep_time" name="pgrasoi_prep_time" value="<?php echo esc_attr( $prep_time ); ?>" style="width:100%;" placeholder="5" />
        </div>
        <div class="pgrasoi-col pgrasoi-field-group">
            <label for="pgrasoi_cook_time">Cook Time (mins)</label>
            <input type="number" id="pgrasoi_cook_time" name="pgrasoi_cook_time" value="<?php echo esc_attr( $cook_time ); ?>" style="width:100%;" placeholder="10" />
        </div>
        <div class="pgrasoi-col pgrasoi-field-group">
            <label for="pgrasoi_servings">Servings / Portions</label>
            <input type="text" id="pgrasoi_servings" name="pgrasoi_servings" value="<?php echo esc_attr( $servings ); ?>" style="width:100%;" placeholder="1 student (or 2 roomies)" />
        </div>
    </div>

    <div class="pgrasoi-field-group">
        <label for="pgrasoi_hostel_hack">Hostel Room Hack & Safety Rule Notice</label>
        <textarea id="pgrasoi_hostel_hack" name="pgrasoi_hostel_hack" class="pgrasoi-textarea" style="min-height:60px;" placeholder="e.g. Kettle Hack: Keep lid slightly cracked with a wooden spoon so it boils steadily without tripping the auto shut-off switch."><?php echo esc_textarea( $hostel_hack ); ?></textarea>
        <div class="pgrasoi-hint">Crucial safety, odor-control, or electrical tip for tiny PG rooms.</div>
    </div>

    <div class="pgrasoi-field-group">
        <label for="pgrasoi_ingredients_raw">Ingredients List (One item per line, with optional cost)</label>
        <textarea id="pgrasoi_ingredients_raw" name="pgrasoi_ingredients_raw" class="pgrasoi-textarea" placeholder="1 cup Rolled Oats (approx ₹12)
1.5 cups Milk or Water
1 tbsp Peanut butter (approx ₹8)
1 Banana, sliced"><?php echo esc_textarea( $ingredients_raw ); ?></textarea>
        <div class="pgrasoi-hint">Each line will become an interactive checklist item with a checkbox.</div>
    </div>

    <div class="pgrasoi-field-group">
        <label for="pgrasoi_steps_raw">Cooking Instructions (One step per line)</label>
        <textarea id="pgrasoi_steps_raw" name="pgrasoi_steps_raw" class="pgrasoi-textarea" placeholder="Pour milk into electric kettle and hit boil for 2 minutes.
Stir in oats and unplug kettle immediately to let it cook with residual heat.
Cover with lid for 3 minutes until creamy.
Top with sliced banana and peanut butter. Enjoy warm!"><?php echo esc_textarea( $steps_raw ); ?></textarea>
        <div class="pgrasoi-hint">Each line renders as a numbered step with prominent step counters.</div>
    </div>

    <div class="pgrasoi-field-group">
        <label for="pgrasoi_faqs_raw">Hostel FAQs (Question | Answer format, one per line)</label>
        <textarea id="pgrasoi_faqs_raw" name="pgrasoi_faqs_raw" class="pgrasoi-textarea" placeholder="Can I make this without milk? | Yes! You can use plain warm water and add 1 tbsp of milk powder or peanut butter for creaminess.
Will this trip the hostel MCB circuit? | No, electric kettles use standard 1000W-1200W which runs on normal 6A/16A hostel wall sockets."><?php echo esc_textarea( $faqs_raw ); ?></textarea>
        <div class="pgrasoi-hint">Format: <code>Question | Answer</code>. Automatically generates Schema.org FAQPage JSON-LD.</div>
    </div>
    <?php
}

function pgrasoi_save_recipe_meta( $post_id ) {
    if ( ! isset( $_POST['pgrasoi_recipe_meta_nonce'] ) || ! wp_verify_nonce( $_POST['pgrasoi_recipe_meta_nonce'], 'pgrasoi_save_recipe_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $is_recipe = isset( $_POST['pgrasoi_is_recipe'] ) ? '1' : '0';
    update_post_meta( $post_id, '_pgrasoi_is_recipe', $is_recipe );

    $fields = array(
        'pgrasoi_cost_per_serving' => '_pgrasoi_cost_per_serving',
        'pgrasoi_total_cost'       => '_pgrasoi_total_cost',
        'pgrasoi_prep_time'        => '_pgrasoi_prep_time',
        'pgrasoi_cook_time'        => '_pgrasoi_cook_time',
        'pgrasoi_servings'         => '_pgrasoi_servings',
        'pgrasoi_hostel_hack'      => '_pgrasoi_hostel_hack',
        'pgrasoi_ingredients_raw'  => '_pgrasoi_ingredients_raw',
        'pgrasoi_steps_raw'        => '_pgrasoi_steps_raw',
        'pgrasoi_faqs_raw'         => '_pgrasoi_faqs_raw',
    );

    foreach ( $fields as $input_key => $meta_key ) {
        if ( isset( $_POST[ $input_key ] ) ) {
            if ( in_array( $input_key, array( 'pgrasoi_hostel_hack', 'pgrasoi_ingredients_raw', 'pgrasoi_steps_raw', 'pgrasoi_faqs_raw' ) ) ) {
                update_post_meta( $post_id, $meta_key, sanitize_textarea_field( $_POST[ $input_key ] ) );
            } else {
                update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $input_key ] ) );
            }
        }
    }
}
add_action( 'save_post', 'pgrasoi_save_recipe_meta' );

/* ==========================================================================
   5. SEO & JSON-LD STRUCTURED DATA (Rank Math Compatible)
   ========================================================================== */
function pgrasoi_output_schema_jsonld() {
    // If Rank Math is active and handling schema, we do not double-inject unless missing
    $rank_math_active = class_exists( 'RankMath' );

    // Homepage Organization & WebSite Schema
    if ( is_front_page() && ! $rank_math_active ) {
        $schema = array(
            '@context'    => 'https://schema.org',
            '@type'       => 'WebSite',
            'name'        => get_bloginfo( 'name' ),
            'url'         => home_url( '/' ),
            'description' => get_bloginfo( 'description' ),
            'potentialAction' => array(
                '@type'       => 'SearchAction',
                'target'      => home_url( '/?s={search_term_string}' ),
                'query-input' => 'required name=search_term_string',
            ),
        );
        echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
    }

    // Single Recipe Post Schema
    if ( is_singular( 'post' ) ) {
        global $post;
        $is_recipe = get_post_meta( $post->ID, '_pgrasoi_is_recipe', true );

        if ( '1' === $is_recipe && ! $rank_math_active ) {
            $prep_time = get_post_meta( $post->ID, '_pgrasoi_prep_time', true ) ?: '5';
            $cook_time = get_post_meta( $post->ID, '_pgrasoi_cook_time', true ) ?: '10';
            $servings  = get_post_meta( $post->ID, '_pgrasoi_servings', true ) ?: '1';
            $cost      = get_post_meta( $post->ID, '_pgrasoi_cost_per_serving', true );

            // Ingredients array
            $ingredients_raw = get_post_meta( $post->ID, '_pgrasoi_ingredients_raw', true );
            $ingredients = array();
            if ( $ingredients_raw ) {
                $lines = explode( "\n", str_replace( "\r", "", $ingredients_raw ) );
                foreach ( $lines as $line ) {
                    $trimmed = trim( $line );
                    if ( ! empty( $trimmed ) ) {
                        $ingredients[] = $trimmed;
                    }
                }
            }

            // Steps array
            $steps_raw = get_post_meta( $post->ID, '_pgrasoi_steps_raw', true );
            $step_items = array();
            if ( $steps_raw ) {
                $lines = explode( "\n", str_replace( "\r", "", $steps_raw ) );
                $idx = 1;
                foreach ( $lines as $line ) {
                    $trimmed = trim( $line );
                    if ( ! empty( $trimmed ) ) {
                        $step_items[] = array(
                            '@type' => 'HowToStep',
                            'position' => $idx++,
                            'text'  => $trimmed,
                        );
                    }
                }
            }

            $image_url = get_the_post_thumbnail_url( $post->ID, 'full' );

            $recipe_schema = array(
                '@context'         => 'https://schema.org',
                '@type'            => 'Recipe',
                'name'             => get_the_title( $post->ID ),
                'headline'         => get_the_title( $post->ID ),
                'description'      => get_the_excerpt( $post->ID ),
                'author'           => array(
                    '@type' => 'Person',
                    'name'  => get_the_author_meta( 'display_name', $post->post_author ),
                ),
                'datePublished'    => get_the_date( 'c', $post->ID ),
                'dateModified'     => get_the_modified_date( 'c', $post->ID ),
                'prepTime'         => 'PT' . intval( $prep_time ) . 'M',
                'cookTime'         => 'PT' . intval( $cook_time ) . 'M',
                'totalTime'        => 'PT' . ( intval( $prep_time ) + intval( $cook_time ) ) . 'M',
                'recipeYield'      => $servings,
                'recipeCategory'   => 'Hostel Food',
                'recipeCuisine'    => 'Indian',
                'recipeIngredient' => $ingredients,
                'recipeInstructions' => $step_items,
            );

            if ( $image_url ) {
                $recipe_schema['image'] = array( $image_url );
            }

            if ( $cost ) {
                $recipe_schema['estimatedCost'] = array(
                    '@type'    => 'MonetaryAmount',
                    'currency' => 'INR',
                    'value'    => $cost,
                );
            }

            echo '<script type="application/ld+json">' . wp_json_encode( $recipe_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";

            // FAQ Schema
            $faqs_raw = get_post_meta( $post->ID, '_pgrasoi_faqs_raw', true );
            if ( $faqs_raw ) {
                $faq_lines = explode( "\n", str_replace( "\r", "", $faqs_raw ) );
                $faq_entities = array();
                foreach ( $faq_lines as $faq_line ) {
                    $parts = explode( '|', $faq_line, 2 );
                    if ( count( $parts ) === 2 ) {
                        $q = trim( $parts[0] );
                        $a = trim( $parts[1] );
                        if ( ! empty( $q ) && ! empty( $a ) ) {
                            $faq_entities[] = array(
                                '@type'          => 'Question',
                                'name'           => $q,
                                'acceptedAnswer' => array(
                                    '@type' => 'Answer',
                                    'text'  => $a,
                                ),
                            );
                        }
                    }
                }
                if ( ! empty( $faq_entities ) ) {
                    $faq_schema = array(
                        '@context'   => 'https://schema.org',
                        '@type'      => 'FAQPage',
                        'mainEntity' => $faq_entities,
                    );
                    echo '<script type="application/ld+json">' . wp_json_encode( $faq_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) . '</script>' . "\n";
                }
            }
        }
    }
}
add_action( 'wp_head', 'pgrasoi_output_schema_jsonld', 20 );

/* ==========================================================================
   6. TEMPLATE HELPER FUNCTIONS
   ========================================================================== */

/**
 * Breadcrumbs Generator (with Rank Math fallback)
 */
function pgrasoi_breadcrumbs() {
    if ( function_exists( 'rank_math_the_breadcrumbs' ) ) {
        rank_math_the_breadcrumbs();
        return;
    }

    if ( is_front_page() ) {
        return;
    }

    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">Home</a>';
    echo '<span class="separator">/</span>';

    if ( is_category() ) {
        single_cat_title();
    } elseif ( is_tax() ) {
        single_term_title();
    } elseif ( is_single() ) {
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            echo '<span class="separator">/</span>';
        }
        echo '<span>' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_page() ) {
        echo '<span>' . esc_html( get_the_title() ) . '</span>';
    } elseif ( is_search() ) {
        echo '<span>Search: ' . esc_html( get_search_query() ) . '</span>';
    } elseif ( is_404() ) {
        echo '<span>Page Not Found</span>';
    }
    echo '</nav>';
}

/**
 * Renders diet badge (Veg, Egg, Non-Veg)
 */
function pgrasoi_render_diet_badge( $post_id ) {
    $terms = get_the_terms( $post_id, 'diet_type' );
    $type = 'veg';
    $label = 'Pure Veg';

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $slug = $terms[0]->slug;
        if ( strpos( $slug, 'non' ) !== false || strpos( $slug, 'chicken' ) !== false ) {
            $type = 'nonveg';
            $label = 'Non-Veg';
        } elseif ( strpos( $slug, 'egg' ) !== false ) {
            $type = 'egg';
            $label = 'Contains Egg';
        } else {
            $type = 'veg';
            $label = 'Vegetarian';
        }
    }

    echo '<span class="diet-indicator is-' . esc_attr( $type ) . '" title="' . esc_attr( $label ) . '" aria-label="' . esc_attr( $label ) . '">';
    echo '<span class="diet-dot"></span>';
    echo '</span>';
}

/**
 * Renders appliance badge
 */
function pgrasoi_render_appliance_badge( $post_id ) {
    $terms = get_the_terms( $post_id, 'appliance' );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $term_name = $terms[0]->name;
        $icon = '⚡';
        if ( stripos( $term_name, 'kettle' ) !== false ) $icon = '🫖';
        if ( stripos( $term_name, 'rice' ) !== false ) $icon = '🍚';
        if ( stripos( $term_name, 'flame' ) !== false || stripos( $term_name, 'no' ) !== false ) $icon = '🥗';
        if ( stripos( $term_name, 'induction' ) !== false ) $icon = '🍳';

        echo '<span class="appliance-badge">' . esc_html( $icon . ' ' . $term_name ) . '</span>';
    }
}

/**
 * Clean SVG Icon Output
 */
function pgrasoi_svg( $name ) {
    $icons = array(
        'search' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>',
        'sun'    => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"/></svg>',
        'menu'   => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>',
        'clock'  => '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>',
        'print'  => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.656"/></svg>',
        'down'   => '<svg class="faq-chevron" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>',
    );

    return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}
