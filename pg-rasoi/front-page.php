<?php
/**
 * Front Page Template for PG Rasoi
 *
 * @package PGRasoi
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section" aria-label="Hero Section">
    <div class="container">
        
        <div class="hero-pill">
            <span>⚡ Smart Hostel Cooking • Budget Friendly</span>
        </div>

        <h1 class="hero-title">
            What Can You Cook In Your <span>PG Room</span> Today?
        </h1>

        <p class="hero-desc">
            Foolproof, mess-free recipes designed for electric kettles, mini rice cookers, induction plates, and zero-flame prep. Low rupee cost, minimal cleanup, and 100% hostel-rule friendly.
        </p>

        <!-- Live Hero Search Form -->
        <div class="hero-search-box">
            <form role="search" method="get" class="hero-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <span class="hero-search-icon" aria-hidden="true">
                    <?php echo pgrasoi_svg( 'search' ); ?>
                </span>
                <input 
                    type="search" 
                    class="hero-search-input" 
                    placeholder="Search by appliance, recipe, or ingredient (e.g. kettle, oats, khichdi)..." 
                    value="<?php echo get_search_query(); ?>" 
                    name="s" 
                    aria-label="Search recipes"
                />
                <button type="submit" class="btn btn-primary hero-search-btn">
                    Find Recipe
                </button>
            </form>
        </div>

        <!-- Quick Category / Appliance Chips -->
        <div class="quick-chips-wrapper">
            <div class="chips-title">Browse By Room Equipment:</div>
            <ul class="chips-list">
                <li class="chip-item">
                    <a href="<?php echo esc_url( home_url( '/appliance/electric-kettle/' ) ); ?>">
                        <span>🫖</span> Electric Kettle
                    </a>
                </li>
                <li class="chip-item">
                    <a href="<?php echo esc_url( home_url( '/appliance/rice-cooker/' ) ); ?>">
                        <span>🍚</span> Rice Cooker
                    </a>
                </li>
                <li class="chip-item">
                    <a href="<?php echo esc_url( home_url( '/appliance/induction/' ) ); ?>">
                        <span>🍳</span> Induction Plate
                    </a>
                </li>
                <li class="chip-item">
                    <a href="<?php echo esc_url( home_url( '/appliance/no-flame/' ) ); ?>">
                        <span>🥗</span> No-Flame Breakfast
                    </a>
                </li>
                <li class="chip-item">
                    <a href="<?php echo esc_url( home_url( '/meal-plan/' ) ); ?>">
                        <span>📅</span> ₹500 Weekly Prep
                    </a>
                </li>
                <li class="chip-item">
                    <a href="<?php echo esc_url( home_url( '/equipment-guide/' ) ); ?>">
                        <span>🔌</span> Safe Appliances
                    </a>
                </li>
            </ul>
        </div>

    </div>
</section>

<!-- Featured Recipes Grid -->
<section class="container" style="padding-top: var(--space-2xl); padding-bottom: var(--space-2xl);" aria-label="Featured Hostel Recipes">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: var(--space-md); flex-wrap: wrap; gap: var(--space-sm);">
        <div>
            <h2 style="margin-bottom: 4px;">Top Rated Room Recipes</h2>
            <p style="color: var(--color-text-muted); margin-bottom: 0;">Tested and perfected in compact student hostels.</p>
        </div>
        <a href="<?php echo esc_url( home_url( '/recipes/' ) ); ?>" class="btn btn-secondary btn-sm">
            View All Recipes &rarr;
        </a>
    </div>

    <div class="recipe-grid">
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'ignore_sticky_posts' => 1,
        );
        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
                get_template_part( 'template-parts/content-card' );
            endwhile;
            wp_reset_postdata();
        else :
            // High-aesthetic starter placeholders if site has no posts yet
            ?>
            <!-- Sample Card 1 -->
            <article class="recipe-card">
                <div class="recipe-card-media">
                    <span class="diet-indicator is-veg" title="Vegetarian"><span class="diet-dot"></span></span>
                    <span class="appliance-badge">🫖 Electric Kettle</span>
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #FFE8D6, #DDBEA9); display: flex; align-items: center; justify-content: center; font-size: 3.5rem;">
                        🥣
                    </div>
                </div>
                <div class="recipe-card-content">
                    <h3 class="recipe-card-title"><a href="<?php echo esc_url( home_url( '/sample-recipe/' ) ); ?>">10-Minute Electric Kettle Masala Poha</a></h3>
                    <p class="recipe-card-excerpt">A warm, savory breakfast made entirely inside a basic electric kettle with roasted peanuts and mild spices.</p>
                    <div class="recipe-card-meta">
                        <div class="recipe-time-badge"><?php echo pgrasoi_svg('clock'); ?> 10m <span style="margin-left: 6px; color: var(--color-text-subtle);">★ [ADD RATING]</span></div>
                        <div class="recipe-cost-badge">₹18 / plate</div>
                    </div>
                </div>
            </article>

            <!-- Sample Card 2 -->
            <article class="recipe-card">
                <div class="recipe-card-media">
                    <span class="diet-indicator is-veg" title="Vegetarian"><span class="diet-dot"></span></span>
                    <span class="appliance-badge">🍚 Rice Cooker</span>
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #E9EDC9, #CCD5AE); display: flex; align-items: center; justify-content: center; font-size: 3.5rem;">
                        🍲
                    </div>
                </div>
                <div class="recipe-card-content">
                    <h3 class="recipe-card-title"><a href="<?php echo esc_url( home_url( '/sample-recipe/' ) ); ?>">One-Pot Moong Dal Khichdi (Comfort Dinner)</a></h3>
                    <p class="recipe-card-excerpt">Super comforting, protein-rich meal prep made in a single mini rice cooker pot without creating greasy smoke.</p>
                    <div class="recipe-card-meta">
                        <div class="recipe-time-badge"><?php echo pgrasoi_svg('clock'); ?> 22m <span style="margin-left: 6px; color: var(--color-text-subtle);">★ [ADD RATING]</span></div>
                        <div class="recipe-cost-badge">₹24 / plate</div>
                    </div>
                </div>
            </article>

            <!-- Sample Card 3 -->
            <article class="recipe-card">
                <div class="recipe-card-media">
                    <span class="diet-indicator is-egg" title="Contains Egg"><span class="diet-dot"></span></span>
                    <span class="appliance-badge">🫖 Electric Kettle</span>
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #FAE1DD, #F8EDEB); display: flex; align-items: center; justify-content: center; font-size: 3.5rem;">
                        🥚
                    </div>
                </div>
                <div class="recipe-card-content">
                    <h3 class="recipe-card-title"><a href="<?php echo esc_url( home_url( '/sample-recipe/' ) ); ?>">Perfect Soft-Boiled Eggs &amp; Pepper Toast</a></h3>
                    <p class="recipe-card-excerpt">How to boil eggs in your room kettle without cracking shells or burning the bottom heating coil.</p>
                    <div class="recipe-card-meta">
                        <div class="recipe-time-badge"><?php echo pgrasoi_svg('clock'); ?> 8m <span style="margin-left: 6px; color: var(--color-text-subtle);">★ [ADD RATING]</span></div>
                        <div class="recipe-cost-badge">₹15 / plate</div>
                    </div>
                </div>
            </article>
            <?php
        endif;
        ?>
    </div>
</section>

<!-- Weekly Meal Plan Callout Banner -->
<section class="container" style="margin-bottom: var(--space-2xl);">
    <div style="background: linear-gradient(135deg, #1C242C, #2A3642); color: #FFFFFF; border-radius: var(--radius-lg); padding: clamp(var(--space-lg), 5vw, var(--space-2xl)); display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: var(--space-lg);">
        <div style="max-width: 600px;">
            <span style="display: inline-block; background: var(--color-primary); color: #FFF; font-size: var(--font-size-xs); font-weight: 800; padding: 4px 10px; border-radius: var(--radius-full); margin-bottom: var(--space-sm); text-transform: uppercase;">Student Budget Blueprint</span>
            <h2 style="color: #FFFFFF; margin-bottom: var(--space-xs);">The ₹500 Weekly Hostel Grocery Plan</h2>
            <p style="color: #A0B0BF; margin-bottom: 0; font-size: var(--font-size-base); line-height: 1.6;">
                Cut reliance on oily mess food and expensive food delivery. Get our complete 7-day breakfast &amp; dinner roadmap with exact grocery shopping lists designed to survive without a refrigerator.
            </p>
        </div>
        <div>
            <a href="<?php echo esc_url( home_url( '/meal-plan/' ) ); ?>" class="btn btn-primary" style="font-size: var(--font-size-base); padding: 0.85rem 1.75rem;">
                Explore Weekly Plan &rarr;
            </a>
        </div>
    </div>
</section>

<!-- Hostel Living Hacks Grid -->
<section class="container" style="margin-bottom: var(--space-3xl);">
    <h2 style="margin-bottom: var(--space-xs);">Hostel Room Cooking Essentials</h2>
    <p style="color: var(--color-text-muted); margin-bottom: var(--space-lg);">Practical guidance so you never get caught or trip the floor's electrical supply.</p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: var(--space-md);">
        
        <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: var(--space-lg);">
            <div style="font-size: 2rem; margin-bottom: var(--space-xs);">🧅</div>
            <h3 style="font-size: var(--font-size-md); margin-bottom: 8px;">Storage Without A Fridge</h3>
            <p style="font-size: var(--font-size-sm); color: var(--color-text-muted); line-height: 1.6; margin-bottom: 0;">
                Learn which vegetables stay fresh for 7-10 days in well-ventilated wire baskets and how to store paneer and curd safely in a room during summers.
            </p>
        </div>

        <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: var(--space-lg);">
            <div style="font-size: 2rem; margin-bottom: var(--space-xs);">💨</div>
            <h3 style="font-size: var(--font-size-md); margin-bottom: 8px;">Odor &amp; Smoke Prevention</h3>
            <p style="font-size: var(--font-size-sm); color: var(--color-text-muted); line-height: 1.6; margin-bottom: 0;">
                Tadka aromas can travel down the corridor. Use our simple steam-trapping methods and mild tempering hacks to keep room cooking discreet and fresh.
            </p>
        </div>

        <div style="background: var(--color-surface); border: 1px solid var(--color-border); border-radius: var(--radius-md); padding: var(--space-lg);">
            <div style="font-size: 2rem; margin-bottom: var(--space-xs);">⚡</div>
            <h3 style="font-size: var(--font-size-md); margin-bottom: 8px;">Hostel MCB &amp; Socket Safety</h3>
            <p style="font-size: var(--font-size-sm); color: var(--color-text-muted); line-height: 1.6; margin-bottom: 0;">
                Why you should avoid running a kettle and laptop charger on a cheap multi-plug adapter, and which low-wattage cookers prevent circuit tripping.
            </p>
        </div>

    </div>
</section>

<!-- Newsletter Box -->
<section class="container" style="margin-bottom: var(--space-3xl);">
    <div class="newsletter-banner">
        <h2 style="margin-bottom: 6px;">Get Quick Room Recipes in Your Inbox</h2>
        <p style="color: var(--color-text-muted); max-width: 500px; margin: 0 auto var(--space-md); font-size: var(--font-size-sm);">
            No spam. Just weekly ₹100 dinner recipes, grocery checklists, and student kitchen hacks.
        </p>
        <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Subscribed to PG Rasoi updates!');">
            <input type="email" required placeholder="Enter your college or personal email..." class="header-search-input" style="flex:1;" />
            <button type="submit" class="btn btn-primary">Subscribe Free</button>
        </form>
    </div>
</section>

<?php
get_footer();
