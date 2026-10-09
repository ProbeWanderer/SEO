# PG Rasoi (pgrasoi.online) — WordPress Theme Guide

Welcome to **PG Rasoi**, a lightweight, performance-tuned WordPress theme designed specifically for hostel and PG room cooking, student meal prep, and appliance-based recipes in India.

---

## 🚀 1. How to Install and Activate on WordPress

### Step 1: Zip the Theme Folder
1. Go to your computer's `SEO` folder on the Desktop.
2. Right-click the `pg-rasoi` folder.
3. Select **Compress to ZIP file** (or **Send to > Compressed (zipped) folder**).
4. Name the file `pg-rasoi.zip`.

### Step 2: Upload via WP Admin
1. Log in to your WordPress Admin dashboard (`https://pgrasoi.online/wp-admin`).
2. Navigate to **Appearance > Themes**.
3. Click the **Add New Theme** button at the top, then click **Upload Theme**.
4. Choose `pg-rasoi.zip` and click **Install Now**.
5. Once uploaded, click **Activate**.

---

## ⚙️ 2. Essential Initial WordPress Settings

### Permalinks (Crucial for SEO)
1. In your WP Admin, go to **Settings > Permalinks**.
2. Under *Common Settings*, select **Post name** (`/%postname%/`).
3. Click **Save Changes**.

### Setup Menus
1. Go to **Appearance > Menus**.
2. Create a new menu named `Primary Menu`.
3. Add your main navigation links:
   - **Home** (`/`)
   - **Kettle Recipes** (`/appliance/electric-kettle/`)
   - **Rice Cooker Meals** (`/appliance/rice-cooker/`)
   - **₹500 Weekly Plan** (Page)
   - **Hostel Appliances** (Page)
   - **About** (Page)
4. Under *Menu Settings* at the bottom, check **Primary Header Menu**.
5. Click **Save Menu**.

---

## 📝 3. Creating Recipes with Custom Fields

When you write a new post in **Posts > Add New Post**:

1. **Title:** e.g., `10-Minute Electric Kettle Masala Poha`
2. **Category & Appliance:**
   - Under *Appliances* in the right sidebar, check **Electric Kettle** (or Rice Cooker, Induction, No-Flame).
   - Under *Diet Types*, check **Pure Veg**, **Egg**, or **Non-Veg**.
3. **Featured Image:** Set a clear photo (1200x675 recommended).
4. **PG Rasoi Recipe Box (Below Post Content):**
   - Check the box: `[x] Enable Recipe Layout & Rich Snippet Schema for this post`
   - Fill in:
     - **Cost Per Serving (₹):** e.g., `18`
     - **Total Batch Cost (₹):** e.g., `18`
     - **Prep Time (mins):** `4`
     - **Cook Time (mins):** `6`
     - **Servings:** `1 student`
     - **Hostel Room Hack & Safety Notice:** e.g., `Never use metal spoons in a kettle; use silicone or wooden spoons to prevent scratching.`
     - **Ingredients List:** Put each ingredient on a new line. Each line automatically becomes an interactive checklist item with a checkbox!
     - **Cooking Instructions:** Put each step on a new line. They will render as large numbered steps.
     - **Hostel FAQs:** Write questions and answers separated by a pipe (`|`):
       ```text
       Will this make my kettle smell? | No, rinse with warm water and lemon immediately.
       Does this trip the room MCB? | No, running the kettle for 40 seconds uses minimal power.
       ```

---

## 📅 4. Creating the Specialized Pages

### A. Weekly Meal Plan Page
1. Go to **Pages > Add New Page**.
2. Title it: `Weekly Meal Plan`.
3. In the right sidebar under **Page Attributes > Template**, select **Weekly Meal Plan**.
4. Click **Publish**.

### B. Hostel Equipment & Wattage Guide
1. Go to **Pages > Add New Page**.
2. Title it: `Hostel Equipment Guide`.
3. In the right sidebar under **Page Attributes > Template**, select **Equipment Guide**.
4. Click **Publish**.

---

## 🔍 5. Configuring Rank Math SEO

The theme is built from the ground up to pair seamlessly with Rank Math:

1. In WP Admin, install and activate the free **Rank Math SEO** plugin.
2. In the Rank Math Setup Wizard:
   - Site Type: Select **Food Blog / Recipe Website**.
   - Breadcrumbs: Turn **ON** Breadcrumbs. The theme automatically supports Rank Math breadcrumbs!
   - Schema: Set Default Schema for Posts to **Recipe**.
3. **Automatic Fallback:** Even if you do not configure Rank Math Schema right away, PG Rasoi has built-in Schema.org JSON-LD generation (`Recipe`, `FAQPage`, `BreadcrumbList`, `WebSite`) so Google Rich Snippets will work immediately.

---

## 🎨 6. Localhost Interactive Preview

You can test the entire site locally at any time:
1. Open terminal in this folder.
2. Run: `node server.js`
3. Open your browser and go to: `http://localhost:3000`

---
*Created for PG Rasoi — India's #1 Hostel & PG Cooking Guide.*
