<?php
/**
 * Template Name: Weekly Meal Plan
 * Template for displaying weekly hostel meal plans with rupee costs and print button
 *
 * @package PGRasoi
 */

get_header();
?>

<div class="container container-narrow" style="padding-top: var(--space-xl); padding-bottom: var(--space-3xl);">
    
    <!-- Breadcrumbs -->
    <?php pgrasoi_breadcrumbs(); ?>

    <header style="margin-bottom: var(--space-xl);">
        <span class="hero-pill">📅 Budget Meal Blueprint</span>
        <h1 style="margin-top: 8px; margin-bottom: var(--space-xs);">
            The ₹500 Weekly Hostel Meal Plan
        </h1>
        <p class="lead">
            A practical, real-world 7-day meal plan for Indian hostel and PG students. Designed to be cooked using just an electric kettle or mini rice cooker, with zero refrigerator requirement.
        </p>

        <!-- Fast Actions -->
        <div class="recipe-action-bar">
            <button type="button" class="btn btn-primary btn-sm print-recipe-btn">
                <?php echo pgrasoi_svg( 'print' ); ?> Print / Save as PDF
            </button>
            <span style="font-size: var(--font-size-xs); color: var(--color-text-subtle);">
                Updated for Indian grocery prices: [ADD RATING]
            </span>
        </div>
    </header>

    <!-- Budget Overview 4-Stat Row -->
    <div class="recipe-facts-grid" style="grid-template-columns: repeat(2, 1fr); margin-bottom: var(--space-xl);">
        <div class="fact-item is-cost">
            <span class="fact-label">Total 7-Day Spend</span>
            <span class="fact-value">₹495</span>
        </div>
        <div class="fact-item">
            <span class="fact-label">Daily Avg Cost</span>
            <span class="fact-value">₹70 / day</span>
        </div>
        <div class="fact-item">
            <span class="fact-label">Primary Appliance</span>
            <span class="fact-value">Kettle / Cooker</span>
        </div>
        <div class="fact-item">
            <span class="fact-label">Fridge Needed?</span>
            <span class="fact-value">No (Zero)</span>
        </div>
    </div>

    <!-- The 7-Day Weekly Breakdown Table -->
    <section aria-label="7-Day Meal Schedule">
        <h2 style="font-size: var(--font-size-xl); margin-bottom: var(--space-sm);">7-Day Hostel Meal Schedule</h2>
        
        <div class="meal-plan-table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="min-width: 100px;">Day</th>
                        <th>Breakfast (In Room)</th>
                        <th>Dinner (In Room)</th>
                        <th>Snack</th>
                        <th style="text-align: right;">Day Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Monday</strong></td>
                        <td>Kettle Masala Poha (₹18)</td>
                        <td>One-Pot Moong Dal Khichdi (₹24)</td>
                        <td>Roasted Chana (₹10)</td>
                        <td style="text-align: right; font-weight: 700; color: var(--color-secondary);">₹52</td>
                    </tr>
                    <tr>
                        <td><strong>Tuesday</strong></td>
                        <td>Peanut Butter Banana Oats (₹22)</td>
                        <td>Steamed Rice + Dal Tadka (₹26)</td>
                        <td>Cucumber Chaat (₹12)</td>
                        <td style="text-align: right; font-weight: 700; color: var(--color-secondary);">₹60</td>
                    </tr>
                    <tr>
                        <td><strong>Wednesday</strong></td>
                        <td>Boiled Eggs &amp; Brown Bread (₹25)</td>
                        <td>Veggie Masala Dalia (₹22)</td>
                        <td>Roasted Peanuts (₹8)</td>
                        <td style="text-align: right; font-weight: 700; color: var(--color-secondary);">₹55</td>
                    </tr>
                    <tr>
                        <td><strong>Thursday</strong></td>
                        <td>Curd Poha with Green Chilli (₹16)</td>
                        <td>Jeera Rice + Soya Chunks Curry (₹28)</td>
                        <td>Banana (₹8)</td>
                        <td style="text-align: right; font-weight: 700; color: var(--color-secondary);">₹52</td>
                    </tr>
                    <tr>
                        <td><strong>Friday</strong></td>
                        <td>Instant Oats with Honey &amp; Apple (₹24)</td>
                        <td>One-Pot Vegetable Pulao (₹28)</td>
                        <td>Makhana / Roasted Corn (₹14)</td>
                        <td style="text-align: right; font-weight: 700; color: var(--color-secondary);">₹66</td>
                    </tr>
                    <tr>
                        <td><strong>Saturday</strong></td>
                        <td>Kettle Upma with Mustard seeds (₹20)</td>
                        <td>Egg Bhurji / Paneer Bhurji &amp; Roti (₹38)</td>
                        <td>Tea + Marie Biscuits (₹10)</td>
                        <td style="text-align: right; font-weight: 700; color: var(--color-secondary);">₹68</td>
                    </tr>
                    <tr>
                        <td><strong>Sunday</strong></td>
                        <td>Cheesy Maggi with Sweet Corn (₹32)</td>
                        <td>Khichdi + Papad + Pickle (₹22)</td>
                        <td>Fruit Salad (₹20)</td>
                        <td style="text-align: right; font-weight: 700; color: var(--color-secondary);">₹74</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr style="background: var(--color-surface-soft); font-weight: 800;">
                        <td colspan="4">Total Weekly Grocery Spend</td>
                        <td style="text-align: right; color: var(--color-primary); font-size: var(--font-size-md);">₹427 - ₹495</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>

    <!-- Grocery Shopping Checklist (No Fridge) -->
    <section style="margin-top: var(--space-2xl);" aria-label="Grocery Shopping Checklist">
        <h2 style="font-size: var(--font-size-xl); margin-bottom: var(--space-sm);">Weekly Grocery Checklist (₹500 Budget)</h2>
        <p style="color: var(--color-text-muted); font-size: var(--font-size-sm); margin-bottom: var(--space-md);">
            Buy these dry pantry goods once a week. They do not spoil at room temperature:
        </p>

        <ul class="ingredient-checklist">
            <li class="ingredient-item">
                <input type="checkbox" class="ingredient-checkbox" />
                <span class="ingredient-text">Rolled Oats (500g pack)</span>
                <span class="ingredient-cost-note">₹75</span>
            </li>
            <li class="ingredient-item">
                <input type="checkbox" class="ingredient-checkbox" />
                <span class="ingredient-text">Thick Poha (Flattened rice, 500g)</span>
                <span class="ingredient-cost-note">₹35</span>
            </li>
            <li class="ingredient-item">
                <input type="checkbox" class="ingredient-checkbox" />
                <span class="ingredient-text">Yellow Moong Dal &amp; Rice (500g each)</span>
                <span class="ingredient-cost-note">₹85</span>
            </li>
            <li class="ingredient-item">
                <input type="checkbox" class="ingredient-checkbox" />
                <span class="ingredient-text">Soya Chunks / Nutrela (200g box)</span>
                <span class="ingredient-cost-note">₹45</span>
            </li>
            <li class="ingredient-item">
                <input type="checkbox" class="ingredient-checkbox" />
                <span class="ingredient-text">Raw Peanuts &amp; Roasted Chana (250g)</span>
                <span class="ingredient-cost-note">₹50</span>
            </li>
            <li class="ingredient-item">
                <input type="checkbox" class="ingredient-checkbox" />
                <span class="ingredient-text">Potatoes, Onions, Ginger, Green Chillies, Lemons</span>
                <span class="ingredient-cost-note">₹80</span>
            </li>
            <li class="ingredient-item">
                <input type="checkbox" class="ingredient-checkbox" />
                <span class="ingredient-text">Cooking Oil (small 500ml pouch) + Salt, Haldi, Jeera</span>
                <span class="ingredient-cost-note">₹80</span>
            </li>
        </ul>
    </section>

</div>

<?php
get_footer();
