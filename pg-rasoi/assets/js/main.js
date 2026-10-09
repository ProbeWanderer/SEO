/**
 * PG Rasoi - Core Vanilla JavaScript
 * Lightweight, accessible, zero-dependency (< 4KB uncompressed)
 */

document.addEventListener('DOMContentLoaded', function () {
  'use strict';

  // 1. DARK MODE TOGGLE
  const themeToggle = document.getElementById('theme-toggle');
  const storedTheme = localStorage.getItem('pgrasoi_theme');
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

  // Set initial theme
  if (storedTheme) {
    document.documentElement.setAttribute('data-theme', storedTheme);
  } else if (prefersDark) {
    document.documentElement.setAttribute('data-theme', 'dark');
  }

  if (themeToggle) {
    themeToggle.addEventListener('click', function () {
      const current = document.documentElement.getAttribute('data-theme');
      const next = current === 'dark' ? 'light' : 'dark';
      document.documentElement.setAttribute('data-theme', next);
      localStorage.setItem('pgrasoi_theme', next);
      this.setAttribute('aria-label', 'Switch to ' + (next === 'dark' ? 'light' : 'dark') + ' mode');
    });
  }

  // 2. MOBILE NAVIGATION DRAWER
  const mobileNavToggle = document.getElementById('mobile-nav-toggle');
  const mobileNavDrawer = document.getElementById('mobile-nav-drawer');

  if (mobileNavToggle && mobileNavDrawer) {
    mobileNavToggle.addEventListener('click', function () {
      const isOpen = mobileNavDrawer.classList.contains('is-open');
      if (isOpen) {
        mobileNavDrawer.classList.remove('is-open');
        mobileNavToggle.setAttribute('aria-expanded', 'false');
      } else {
        mobileNavDrawer.classList.add('is-open');
        mobileNavToggle.setAttribute('aria-expanded', 'true');
      }
    });

    // Close mobile nav on escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && mobileNavDrawer.classList.contains('is-open')) {
        mobileNavDrawer.classList.remove('is-open');
        mobileNavToggle.setAttribute('aria-expanded', 'false');
        mobileNavToggle.focus();
      }
    });
  }

  // 3. SEARCH OVERLAY / MODAL TOGGLE
  const searchToggle = document.getElementById('search-toggle');
  const searchModal = document.getElementById('header-search-modal');
  const searchInput = document.getElementById('header-search-input');

  if (searchToggle && searchModal) {
    searchToggle.addEventListener('click', function () {
      const isActive = searchModal.classList.contains('is-active');
      if (isActive) {
        searchModal.classList.remove('is-active');
        searchToggle.setAttribute('aria-expanded', 'false');
      } else {
        searchModal.classList.add('is-active');
        searchToggle.setAttribute('aria-expanded', 'true');
        if (searchInput) searchInput.focus();
      }
    });

    // Dismiss search modal on Escape
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && searchModal.classList.contains('is-active')) {
        searchModal.classList.remove('is-active');
        searchToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  // 4. JUMP TO RECIPE SMOOTH SCROLL
  const jumpBtn = document.getElementById('jump-to-recipe-btn');
  const recipeBox = document.getElementById('recipe-box');

  if (jumpBtn && recipeBox) {
    jumpBtn.addEventListener('click', function (e) {
      e.preventDefault();
      recipeBox.scrollIntoView({ behavior: 'smooth' });
      recipeBox.setAttribute('tabindex', '-1');
      recipeBox.focus({ preventScroll: true });
    });
  }

  // 5. PRINT RECIPE ACTION
  const printBtns = document.querySelectorAll('.print-recipe-btn');
  printBtns.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      window.print();
    });
  });

  // 6. INGREDIENT CHECKBOXES (Interactive Recipe Checklist)
  const ingredientCheckboxes = document.querySelectorAll('.ingredient-checkbox');
  ingredientCheckboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
      const parentItem = this.closest('.ingredient-item');
      if (parentItem) {
        if (this.checked) {
          parentItem.classList.add('is-checked');
        } else {
          parentItem.classList.remove('is-checked');
        }
      }
    });
  });

  // 7. ACCESSIBLE FAQ ACCORDION
  const faqButtons = document.querySelectorAll('.faq-question');
  faqButtons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const faqItem = this.closest('.faq-item');
      const isExpanded = this.getAttribute('aria-expanded') === 'true';

      if (faqItem) {
        if (isExpanded) {
          this.setAttribute('aria-expanded', 'false');
          faqItem.classList.remove('is-open');
        } else {
          this.setAttribute('aria-expanded', 'true');
          faqItem.classList.add('is-open');
        }
      }
    });
  });

  // 8. SHARE / COPY RECIPE LINK
  const shareBtn = document.getElementById('share-recipe-btn');
  if (shareBtn) {
    shareBtn.addEventListener('click', function () {
      if (navigator.share) {
        navigator.share({
          title: document.title,
          url: window.location.href
        }).catch(function () {});
      } else if (navigator.clipboard) {
        navigator.clipboard.writeText(window.location.href).then(function () {
          const originalText = shareBtn.innerText;
          shareBtn.innerText = '✓ Copied Link';
          setTimeout(function () {
            shareBtn.innerText = originalText;
          }, 2000);
        });
      }
    });
  }
});
