<?php
/**
 * 404 Error Template for PG Rasoi
 *
 * @package PGRasoi
 */

get_header();
?>

<div class="container container-narrow" style="padding-top: var(--space-3xl); padding-bottom: var(--space-3xl); text-align: center;">
    
    <div style="font-size: 5rem; margin-bottom: var(--space-sm); line-height: 1;">🍳</div>
    <span class="hero-pill">404 Error</span>
    
    <h1 style="margin-top: 8px; margin-bottom: var(--space-sm);">
        Oops! Looks Like The Pot Is Empty
    </h1>
    
    <p class="lead" style="margin-bottom: var(--space-xl);">
        The page or recipe you are looking for doesn't exist, has been moved, or the hostel warden confiscated the link.
    </p>

    <!-- Quick Search -->
    <div style="max-width: 480px; margin: 0 auto var(--space-2xl);">
        <form role="search" method="get" class="hero-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" class="hero-search-input" placeholder="Search for another recipe..." name="s" />
            <button type="submit" class="btn btn-primary hero-search-btn">Search</button>
        </form>
    </div>

    <!-- Quick Links -->
    <div style="display: flex; justify-content: center; gap: var(--space-sm); flex-wrap: wrap;">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to Home</a>
        <a href="<?php echo esc_url( home_url( '/meal-plan/' ) ); ?>" class="btn btn-secondary">₹500 Weekly Plan</a>
        <a href="<?php echo esc_url( home_url( '/equipment-guide/' ) ); ?>" class="btn btn-secondary">Hostel Appliances</a>
    </div>

</div>

<?php
get_footer();
