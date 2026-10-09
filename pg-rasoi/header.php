<?php
/**
 * Header Template for PG Rasoi
 *
 * @package PGRasoi
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Fallback Open Graph & Twitter Cards if Rank Math is not active -->
    <?php if ( ! class_exists( 'RankMath' ) ) : ?>
        <meta property="og:locale" content="en_IN">
        <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
        <meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>">
        <meta property="og:description" content="<?php bloginfo( 'description' ); ?>">
        <meta property="og:type" content="<?php echo is_single() ? 'article' : 'website'; ?>">
        <meta property="og:url" content="<?php echo esc_url( home_url( add_query_arg( array(), $wp->request ?? '' ) ) ); ?>">
        <meta name="twitter:card" content="summary_large_image">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Accessible Skip Link -->
<a class="skip-link" href="#primary-content"><?php esc_html_e( 'Skip to content', 'pg-rasoi' ); ?></a>

<!-- Sticky Global Header -->
<header id="masthead" class="site-header" role="banner">
    <div class="container">
        <div class="header-inner">
            
            <!-- Site Branding / Logo -->
            <div class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-branding-link" aria-label="<?php bloginfo( 'name' ); ?> Home">
                    <?php if ( has_custom_logo() ) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <div class="brand-text-wrap" style="display:flex; align-items:center; gap:8px;">
                            <span class="brand-logo-icon" aria-hidden="true">🍲</span>
                            <div>
                                <span class="brand-title">PG <span>Rasoi</span></span>
                                <span class="brand-tagline"><?php esc_html_e( 'Hostel & PG Meal Prep', 'pg-rasoi' ); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </a>
            </div>

            <!-- Primary Desktop Navigation -->
            <nav id="site-navigation" class="primary-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'pg-rasoi' ); ?>">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'primary-menu',
                        'container'      => false,
                    ) );
                } else {
                    ?>
                    <ul class="primary-menu">
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'pg-rasoi' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/appliance/electric-kettle/' ) ); ?>"><?php esc_html_e( 'Kettle Recipes', 'pg-rasoi' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/appliance/rice-cooker/' ) ); ?>"><?php esc_html_e( 'Rice Cooker', 'pg-rasoi' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/meal-plan/' ) ); ?>"><?php esc_html_e( '₹500 Weekly Plan', 'pg-rasoi' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/equipment-guide/' ) ); ?>"><?php esc_html_e( 'Hostel Appliances', 'pg-rasoi' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'pg-rasoi' ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </nav>

            <!-- Header Utilities (Search, Dark Mode, Mobile Hamburger) -->
            <div class="header-actions">
                <!-- Search Button -->
                <button type="button" id="search-toggle" class="icon-btn" aria-label="<?php esc_attr_e( 'Search Recipes', 'pg-rasoi' ); ?>" aria-expanded="false">
                    <?php echo pgrasoi_svg( 'search' ); ?>
                </button>

                <!-- Dark Mode Toggle Button -->
                <button type="button" id="theme-toggle" class="icon-btn" aria-label="<?php esc_attr_e( 'Toggle dark mode', 'pg-rasoi' ); ?>">
                    <?php echo pgrasoi_svg( 'sun' ); ?>
                </button>

                <!-- Mobile Navigation Toggle -->
                <button type="button" id="mobile-nav-toggle" class="icon-btn mobile-nav-toggle" aria-label="<?php esc_attr_e( 'Open Navigation Menu', 'pg-rasoi' ); ?>" aria-expanded="false">
                    <?php echo pgrasoi_svg( 'menu' ); ?>
                </button>
            </div>

        </div>
    </div>

    <!-- Live Search Dropdown Drawer -->
    <div id="header-search-modal" class="header-search-modal" role="region" aria-label="<?php esc_attr_e( 'Quick Search', 'pg-rasoi' ); ?>">
        <div class="container container-narrow">
            <form role="search" method="get" class="header-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <label for="header-search-input" class="sr-only"><?php esc_html_e( 'Search recipes or ingredients', 'pg-rasoi' ); ?></label>
                <input type="search" id="header-search-input" class="header-search-input" placeholder="<?php esc_attr_e( 'Search: e.g. kettle poha, rice cooker khichdi, curd oats...', 'pg-rasoi' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <button type="submit" class="btn btn-primary"><?php esc_html_e( 'Search', 'pg-rasoi' ); ?></button>
            </form>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div id="mobile-nav-drawer" class="mobile-nav-drawer" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile Menu', 'pg-rasoi' ); ?>">
    <nav role="navigation">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'mobile-menu',
                'container'      => false,
            ) );
        } else {
            ?>
            <ul class="mobile-menu">
                <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'pg-rasoi' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/appliance/electric-kettle/' ) ); ?>"><?php esc_html_e( 'Electric Kettle Recipes', 'pg-rasoi' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/appliance/rice-cooker/' ) ); ?>"><?php esc_html_e( 'Rice Cooker Meals', 'pg-rasoi' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/appliance/no-flame/' ) ); ?>"><?php esc_html_e( 'No-Flame Breakfasts', 'pg-rasoi' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/meal-plan/' ) ); ?>"><?php esc_html_e( 'Weekly ₹500 Meal Plan', 'pg-rasoi' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/equipment-guide/' ) ); ?>"><?php esc_html_e( 'Hostel Appliance Buying Guide', 'pg-rasoi' ); ?></a></li>
                <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About PG Rasoi', 'pg-rasoi' ); ?></a></li>
            </ul>
            <?php
        }
        ?>
    </nav>
</div>

<main id="primary-content" class="site-main" role="main">
