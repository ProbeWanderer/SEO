<?php
/**
 * Template Name: Equipment Guide
 * Template for hostel room appliance buying and wattage safety comparison
 *
 * @package PGRasoi
 */

get_header();
?>

<div class="container container-narrow" style="padding-top: var(--space-xl); padding-bottom: var(--space-3xl);">
    
    <!-- Breadcrumbs -->
    <?php pgrasoi_breadcrumbs(); ?>

    <header style="margin-bottom: var(--space-xl);">
        <span class="hero-pill">🔌 Room Gear Guide</span>
        <h1 style="margin-top: 8px; margin-bottom: var(--space-xs);">
            Best Hostel Cooking Appliances (Wattage &amp; Safety Guide)
        </h1>
        <p class="lead">
            Buying the wrong appliance can trip your hostel circuit breaker (MCB) or get confiscated by the warden. Here is our tested comparison of safe, low-power cooking appliances for PG rooms in India.
        </p>
    </header>

    <!-- Important Hostel Electrical Safety Rule Banner -->
    <div class="hostel-rule-callout" role="alert" style="margin-bottom: var(--space-2xl);">
        <h4>⚠️ The 6-Ampere Socket Rule for Indian Hostels</h4>
        <p>
            Most standard bedroom electrical sockets in Indian hostels and PGs are rated for <strong>6A (approx 1300W maximum safe load)</strong>. If you run a high-power 2000W induction plate or plug both a kettle and geyser into the same line, the MCB will trip. Always look for appliances under 1000W.
        </p>
    </div>

    <!-- Appliance Comparison Table -->
    <div class="meal-plan-table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Appliance</th>
                    <th>Wattage</th>
                    <th>Price Range</th>
                    <th>Hostel MCB Risk</th>
                    <th>Pros &amp; Cons</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Wide-Mouth Electric Kettle</strong><br>
                        <small style="color:var(--color-text-subtle);">e.g. Pigeon / Prestige 1.5L</small>
                    </td>
                    <td>1000W - 1200W</td>
                    <td>₹600 - ₹900</td>
                    <td><span style="color: var(--color-veg); font-weight: 700;">Low Risk</span> (Runs fine on 6A)</td>
                    <td>
                        <strong>Pros:</strong> Boils in 2 mins, compact, easy to hide.<br>
                        <strong>Cons:</strong> Narrow mouth is tricky to scrub.
                    </td>
                </tr>

                <tr>
                    <td>
                        <strong>Multi-Cooker Kettle (Flat Heating Base)</strong><br>
                        <small style="color:var(--color-text-subtle);">With temperature knob</small>
                    </td>
                    <td>600W - 800W</td>
                    <td>₹1,100 - ₹1,600</td>
                    <td><span style="color: var(--color-veg); font-weight: 700;">Very Safe</span> (Lowest wattage)</td>
                    <td>
                        <strong>Pros:</strong> Doesn't trip power, wide opening, can fry lightly.<br>
                        <strong>Cons:</strong> Slightly slower water boiling.
                    </td>
                </tr>

                <tr>
                    <td>
                        <strong>Mini Electric Rice Cooker (0.5L - 1L)</strong><br>
                        <small style="color:var(--color-text-subtle);">e.g. Bajaj Majesty / Panasonic</small>
                    </td>
                    <td>300W - 450W</td>
                    <td>₹1,200 - ₹1,800</td>
                    <td><span style="color: var(--color-veg); font-weight: 700;">Safest</span> (Never trips breaker)</td>
                    <td>
                        <strong>Pros:</strong> Perfect automatic khichdi, pulao, and oats. Shuts off automatically.<br>
                        <strong>Cons:</strong> Takes 15-20 mins for cooking.
                    </td>
                </tr>

                <tr>
                    <td>
                        <strong>Portable Induction Cooktop</strong><br>
                        <small style="color:var(--color-text-subtle);">With manual power control</small>
                    </td>
                    <td>1200W - 1800W</td>
                    <td>₹1,800 - ₹2,500</td>
                    <td><span style="color: var(--color-egg); font-weight: 700;">Medium Risk</span> (Needs 16A socket)</td>
                    <td>
                        <strong>Pros:</strong> Full temperature control, feels like real cooking.<br>
                        <strong>Cons:</strong> Needs induction-compatible cookware; larger size.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Buying Advice Checklist -->
    <section style="margin-top: var(--space-2xl);">
        <h2 style="font-size: var(--font-size-xl); margin-bottom: var(--space-sm);">3 Things to Check Before Ordering Online</h2>
        <ol style="padding-left: 20px; line-height: 1.8; color: var(--color-text-main);">
            <li style="margin-bottom: 8px;"><strong>Check Cord Length:</strong> Most hostel rooms have poorly placed sockets. Pick an appliance with at least a 1-meter heavy-gauge cable so you don't need risky extension strips.</li>
            <li style="margin-bottom: 8px;"><strong>Concealed Heating Element:</strong> Avoid old-school exposed coiled kettles; food will stick and burn on the coil, making it impossible to clean without a kitchen sink.</li>
            <li style="margin-bottom: 8px;"><strong>Detachable Base:</strong> A 360-degree swivel base allows you to take the jug directly to your study desk to eat, eliminating the need to wash extra bowls.</li>
        </ol>
    </section>

</div>

<?php
get_footer();
