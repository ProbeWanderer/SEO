<?php
/**
 * Footer Template for PG Rasoi
 *
 * @package PGRasoi
 */
?>
</main><!-- #primary-content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="container">
        
        <!-- Footer Columns -->
        <div class="footer-grid">
            
            <!-- Col 1: About Brand -->
            <div class="footer-col">
                <div class="brand-text-wrap" style="margin-bottom: 12px;">
                    <span class="brand-title">PG <span>Rasoi</span></span>
                    <span class="brand-tagline"><?php esc_html_e( 'Hostel & PG Meal Prep', 'pg-rasoi' ); ?></span>
                </div>
                <p style="font-size: var(--font-size-sm); color: var(--color-text-muted); line-height: 1.6;">
                    <?php esc_html_e( 'Healthy, quick, student-budget cooking inside hostel and PG rooms across India. From electric kettle oats to one-pot rice cooker khichdi, we make independent living tasty and affordable.', 'pg-rasoi' ); ?>
                </p>
            </div>

            <!-- Col 2: By Appliance -->
            <div class="footer-col">
                <h4><?php esc_html_e( 'By Appliance', 'pg-rasoi' ); ?></h4>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url( home_url( '/appliance/electric-kettle/' ) ); ?>">⚡ <?php esc_html_e( 'Electric Kettle Recipes', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/appliance/rice-cooker/' ) ); ?>">🍚 <?php esc_html_e( 'Mini Rice Cooker Meals', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/appliance/induction/' ) ); ?>">🍳 <?php esc_html_e( 'Induction Cooktop', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/appliance/no-flame/' ) ); ?>">🥗 <?php esc_html_e( 'Zero-Cook / No Flame', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/equipment-guide/' ) ); ?>">🔌 <?php esc_html_e( 'Appliance Wattage Guide', 'pg-rasoi' ); ?></a></li>
                </ul>
            </div>

            <!-- Col 3: Meal Prep & Budgets -->
            <div class="footer-col">
                <h4><?php esc_html_e( 'Budget & Guides', 'pg-rasoi' ); ?></h4>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url( home_url( '/meal-plan/' ) ); ?>">📅 <?php esc_html_e( '₹500 Weekly Meal Plan', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/storage-hacks/' ) ); ?>">🧅 <?php esc_html_e( 'No-Fridge Food Storage', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/grocery-list/' ) ); ?>">🛒 <?php esc_html_e( 'Hostel Pantry Grocery Checklist', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/category/hostel-rules/' ) ); ?>">🏢 <?php esc_html_e( 'Hostel Cooking Rule Hacks', 'pg-rasoi' ); ?></a></li>
                </ul>
            </div>

            <!-- Col 4: Legal & Contact -->
            <div class="footer-col">
                <h4><?php esc_html_e( 'Company', 'pg-rasoi' ); ?></h4>
                <ul class="footer-menu">
                    <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact & Suggestions', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'pg-rasoi' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/disclaimer/' ) ); ?>"><?php esc_html_e( 'Disclaimer', 'pg-rasoi' ); ?></a></li>
                </ul>
            </div>

        </div>

        <!-- Hostel Electrical Safety Disclaimer -->
        <div class="footer-disclaimer">
            <strong><?php esc_html_e( 'Hostel Cooking & Electrical Notice:', 'pg-rasoi' ); ?></strong>
            <?php esc_html_e( 'Always verify your hostel or PG electricity guidelines before operating heating appliances. Use dedicated 3-pin earthed wall sockets to avoid circuit breaker (MCB) trips. Never leave appliances unattended inside your room.', 'pg-rasoi' ); ?>
        </div>

        <!-- Copyright & Bottom Nav -->
        <div class="footer-bottom">
            <div>
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> <strong>PG Rasoi</strong> (pgrasoi.online). <?php esc_html_e( 'All rights reserved.', 'pg-rasoi' ); ?>
            </div>
            <div>
                <?php esc_html_e( 'Handcrafted for Indian hostelers & PG residents.', 'pg-rasoi' ); ?>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
