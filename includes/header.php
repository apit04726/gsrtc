<?php
/**
 * Header Template
 * SEO Optimized, OpenGraph, Schema.org, Navigation & Mobile Drawer
 */

$settings = get_settings();
$pageTitle = $pageTitle ?? ($settings['site_title_seo'] ?? (SITE_NAME . ' | ' . SITE_TAGLINE));
$metaDescription = $metaDescription ?? ($settings['site_description'] ?? SITE_TAGLINE);
$metaKeywords = $metaKeywords ?? ($settings['meta_keywords'] ?? 'GSRTC, gsrtc bus, gsrtc time table, gsrtc ticket booking, એસટી બસ સમયપત્રક, ગુજરાત બસ');
$canonicalUrl = $canonicalUrl ?? url();
$ogType = $ogType ?? 'website';
$ogImage = $ogImage ?? url('assets/images/og-share.jpg');
?>
<!DOCTYPE html>
<html lang="gu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($metaDescription) ?>">
  <meta name="keywords" content="<?= e($metaKeywords) ?>">
  <link rel="canonical" href="<?= e($canonicalUrl) ?>">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  
  <!-- Local Gujarat SEO Geotargeting -->
  <meta name="geo.region" content="IN-GJ">
  <meta name="geo.placename" content="Gujarat, India">
  <meta name="geo.position" content="23.0225;72.5714">
  <meta name="ICBM" content="23.0225, 72.5714">
  <link rel="alternate" hreflang="gu-IN" href="<?= e($canonicalUrl) ?>">
  <link rel="alternate" hreflang="gu" href="<?= e($canonicalUrl) ?>">
  <link rel="alternate" hreflang="x-default" href="<?= e($canonicalUrl) ?>">
  <meta name="theme-color" content="#015fc9">
  <meta name="author" content="ગુજરાત બસ માર્ગદર્શક સંપાદકીય ટીમ">

  <!-- Favicon & Touch Icons -->
  <link rel="icon" type="image/svg+xml" href="<?= url('assets/images/favicon.svg') ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= url('assets/images/favicon-32x32.png') ?>">
  <link rel="icon" type="image/png" sizes="192x192" href="<?= url('assets/images/favicon-192x192.png') ?>">
  <link rel="apple-touch-icon" sizes="180x180" href="<?= url('assets/images/apple-touch-icon.png') ?>">
  <link rel="shortcut icon" href="<?= url('favicon.ico') ?>">

  <?php if (!empty($settings['analytics']['google_search_console_tag'])): ?>
    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="<?= e($settings['analytics']['google_search_console_tag']) ?>">
  <?php endif; ?>

  <?php if (!empty($settings['adsense_client_id'])): ?>
    <!-- Google AdSense Official Account Link & Script -->
    <meta name="google-adsense-account" content="<?= e($settings['adsense_client_id']) ?>">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?= e($settings['adsense_client_id']) ?>" crossorigin="anonymous"></script>
  <?php endif; ?>
  
  <!-- Open Graph / Social Media Preview (WhatsApp, Facebook, Telegram, LinkedIn) -->
  <meta property="og:locale" content="gu_IN">
  <meta property="og:type" content="<?= e($ogType) ?>">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:title" content="<?= e($pageTitle) ?>">
  <meta property="og:description" content="<?= e($metaDescription) ?>">
  <meta property="og:url" content="<?= e($canonicalUrl) ?>">
  <meta property="og:image" content="<?= e($ogImage) ?>">
  <meta property="og:image:secure_url" content="<?= e($ogImage) ?>">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="<?= e($pageTitle) ?>">
  
  <!-- Twitter / X Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($pageTitle) ?>">
  <meta name="twitter:description" content="<?= e($metaDescription) ?>">
  <meta name="twitter:image" content="<?= e($ogImage) ?>">
  <meta name="twitter:image:alt" content="<?= e($pageTitle) ?>">

  <!-- Google Fonts: Noto Sans Gujarati & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Gujarati:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>?v=<?= @filemtime(ROOT_PATH . '/assets/css/style.css') ?: time() ?>">

  <?php if (!empty($settings['analytics']['google_analytics_id'])): ?>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= e($settings['analytics']['google_analytics_id']) ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?= e($settings['analytics']['google_analytics_id']) ?>');
    </script>
  <?php endif; ?>

  <?php if (!empty($schemaJsonLd)): ?>
    <?= $schemaJsonLd ?>
  <?php else: ?>
    <?= generate_website_schema() ?>
    <?= generate_organization_schema() ?>
  <?php endif; ?>
</head>
<body>

  <!-- Top Disclaimer Notice -->
  <div class="top-disclaimer-bar">
    <div class="container">
      <span class="badge-unofficial">સ્વતંત્ર માહિતી પોર્ટલ</span>
      આ વેબસાઇટ GSRTC કે ગુજરાત સરકાર સાથે સંલગ્ન નથી. મુસાફરોની સુવિધા માટે માર્ગદર્શન પૂરું પાડતો સ્વતંત્ર બ્લોગ છે.
    </div>
  </div>

  <!-- Main Site Header -->
  <header class="site-header">
    <div class="container">
      <div class="header-inner">
        <!-- Brand Logo -->
        <a href="<?= url() ?>" class="site-brand" title="<?= e(SITE_NAME) ?>">
          <div class="brand-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="3" width="18" height="15" rx="3"></rect>
              <line x1="3" y1="9" x2="21" y2="9"></line>
              <line x1="9" y1="18" x2="9" y2="21"></line>
              <line x1="15" y1="18" x2="15" y2="21"></line>
              <circle cx="7" cy="14" r="1"></circle>
              <circle cx="17" cy="14" r="1"></circle>
            </svg>
          </div>
          <div class="brand-text">
            <span class="brand-title"><?= e(SITE_NAME) ?></span>
            <span class="brand-sub">સલામત અને સરળ મુસાફરી માર્ગદર્શક</span>
          </div>
        </a>

        <!-- Desktop Navigation -->
        <nav class="main-nav" aria-label="Main Navigation">
          <a href="<?= url() ?>" class="nav-link <?= empty($currentRoute) ? 'active' : '' ?>">હોમ</a>
          <a href="<?= url('category/before-travel') ?>" class="nav-link <?= ($currentRoute ?? '') === 'category/before-travel' ? 'active' : '' ?>">મુસાફરી પહેલાં</a>
          <a href="<?= url('category/luggage-rules') ?>" class="nav-link <?= ($currentRoute ?? '') === 'category/luggage-rules' ? 'active' : '' ?>">સામાન નિયમો</a>
          <a href="<?= url('category/passenger-safety') ?>" class="nav-link <?= ($currentRoute ?? '') === 'category/passenger-safety' ? 'active' : '' ?>">સલામતી</a>
          <a href="<?= url('category/emergency-info') ?>" class="nav-link <?= ($currentRoute ?? '') === 'category/emergency-info' ? 'active' : '' ?>">ઈમરજન્સી</a>
          <a href="<?= url('checklist') ?>" class="nav-link <?= ($currentRoute ?? '') === 'checklist' ? 'active' : '' ?>">મુસાફરી ચેકલિસ્ટ</a>
        </nav>

        <!-- Header Actions -->
        <div class="header-actions">
          <a href="<?= e($settings['monetization']['redbus_affiliate_url'] ?? 'https://www.redbus.in/') ?>" target="_blank" rel="noopener noreferrer nofollow" class="header-btn-booking btn-motion-pulse btn-motion-shimmer" title="ઓનલાઇન બસ ટિકિટ બુક કરો">
            <span class="booking-btn-icon">🎫</span>
            <span class="booking-btn-text">ટિકિટ બુકિંગ</span>
          </a>
          <a href="<?= url('search') ?>" class="header-btn-search" title="શોધો" aria-label="માહિતી શોધો">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </a>
          <button id="mobileMenuToggle" class="smart-menu-toggle" aria-label="મુખ્ય મેનુ ખોલો" aria-expanded="false" aria-controls="mobileDrawer">
            <span class="hamburger-box">
              <span class="hamburger-line"></span>
              <span class="hamburger-line"></span>
              <span class="hamburger-line"></span>
            </span>
          </button>
        </div>
      </div>
    </div>
  </header>

  <!-- Smart Mobile & Tablet Drawer Backdrop & Drawer -->
  <div id="drawerBackdrop" class="drawer-backdrop" aria-hidden="true"></div>
  <aside id="mobileDrawer" class="mobile-drawer" aria-label="Mobile Navigation" aria-hidden="true">
    <!-- Drawer Brand Header -->
    <div class="drawer-header-brand">
      <div class="drawer-brand-wrap">
        <div class="drawer-brand-icon">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="15" rx="3"></rect>
            <line x1="3" y1="9" x2="21" y2="9"></line>
            <line x1="9" y1="18" x2="9" y2="21"></line>
            <line x1="15" y1="18" x2="15" y2="21"></line>
            <circle cx="7" cy="14" r="1"></circle>
            <circle cx="17" cy="14" r="1"></circle>
          </svg>
        </div>
        <div class="drawer-brand-info">
          <span class="drawer-brand-title"><?= e(SITE_NAME) ?></span>
          <span class="drawer-brand-badge">સ્વતંત્ર મુસાફરી સહાયક</span>
        </div>
      </div>
      <button id="closeDrawer" class="drawer-close-btn" aria-label="મેનુ બંધ કરો">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>

    <!-- Drawer Scrollable Content Area -->
    <div class="drawer-body">
      <!-- Quick Search Box -->
      <form action="<?= url('search') ?>" method="GET" class="drawer-search-form" role="search">
        <div class="drawer-search-wrap">
          <svg class="drawer-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input type="search" name="q" class="drawer-search-input" placeholder="માર્ગદર્શન કે નિયમો શોધો..." aria-label="માર્ગદર્શન શોધો" autocomplete="off">
          <button type="submit" class="drawer-search-btn" aria-label="શોધો">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </button>
        </div>
      </form>

      <!-- High-Conversion RedBus Booking Card -->
      <a href="<?= e($settings['monetization']['redbus_affiliate_url'] ?? 'https://www.redbus.in/') ?>" target="_blank" rel="noopener noreferrer nofollow" class="drawer-booking-card" title="ઓનલાઇન બસ ટિકિટ બુક કરો">
        <div class="booking-card-main">
          <div class="booking-card-top-row">
            <span class="booking-partner-tag">🎫 RedBus અધિકૃત બુકિંગ</span>
          </div>
          <div class="booking-card-title">ઓનલાઇન બસ ટિકિટ બુક કરો</div>
          <div class="booking-card-sub">GSRTC &amp; પ્રાઇવેટ બસ • સરળ બુકિંગ &rarr;</div>
        </div>
        <div class="booking-card-arrow-btn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </div>
      </a>

      <!-- Navigation Section 1: Main Pages -->
      <div class="drawer-section">
        <div class="drawer-section-title">
          <span>મુખ્ય સુવિધાઓ</span>
        </div>
        <div class="drawer-nav-list">
          <a href="<?= url() ?>" class="drawer-nav-item <?= empty($currentRoute) ? 'active' : '' ?>">
            <span class="drawer-item-icon icon-blue">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            </span>
            <span class="drawer-item-label">મુખ્ય પૃષ્ઠ (હોમ)</span>
          </a>
          <a href="<?= url('checklist') ?>" class="drawer-nav-item <?= ($currentRoute ?? '') === 'checklist' ? 'active' : '' ?>">
            <span class="drawer-item-icon icon-emerald">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"></path><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
            </span>
            <span class="drawer-item-label">સ્માર્ટ મુસાફરી ચેકલિસ્ટ</span>
            <span class="drawer-badge-highlight">નવું ⭐</span>
          </a>
          <a href="<?= url('search') ?>" class="drawer-nav-item <?= ($currentRoute ?? '') === 'search' ? 'active' : '' ?>">
            <span class="drawer-item-icon icon-purple">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </span>
            <span class="drawer-item-label">શોધો અને તમામ આર્ટીકલ્સ</span>
          </a>
        </div>
      </div>

      <!-- Navigation Section 2: Categories Guide Grid -->
      <div class="drawer-section">
        <div class="drawer-section-title">
          <span>મુસાફરી માર્ગદર્શક શ્રેણીઓ</span>
        </div>
        <div class="drawer-category-grid">
          <?php
          $cats = get_categories();
          foreach ($cats as $cat):
            $catSlug = $cat['slug'] ?? $cat['id'];
            $isActive = ($currentRoute ?? '') === 'category/' . $catSlug;
            $catIcon = $cat['icon'] ?? 'bus';
            $catColor = $cat['color'] ?? '#015fc9';
          ?>
          <a href="<?= url('category/' . $catSlug) ?>" class="drawer-cat-chip <?= $isActive ? 'active' : '' ?>">
            <span class="cat-chip-icon" style="background-color: <?= e($catColor) ?>18; color: <?= e($catColor) ?>;">
              <?= get_category_svg_icon($catIcon, 16) ?>
            </span>
            <span class="cat-chip-name"><?= e($cat['name']) ?></span>
            <svg class="cat-chip-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
          </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Navigation Section 3: Information & Links -->
      <div class="drawer-section">
        <div class="drawer-section-title">
          <span>માહિતી અને સહાય</span>
        </div>
        <div class="drawer-sub-links">
          <a href="<?= url('about-us') ?>"><span class="sub-link-dot"></span> અમારા વિશે (About Us)</a>
          <a href="<?= url('contact-us') ?>"><span class="sub-link-dot"></span> સંપર્ક કરો (Contact Us)</a>
          <a href="<?= url('privacy-policy') ?>"><span class="sub-link-dot"></span> પ્રાઇવસી પોલિસી (Privacy)</a>
          <a href="<?= url('terms') ?>"><span class="sub-link-dot"></span> નિયમો અને શરતો (Terms)</a>
          <a href="<?= url('disclaimer') ?>"><span class="sub-link-dot"></span> કાયદાકીય અસ્વીકરણ (Disclaimer)</a>
        </div>
      </div>

      <!-- Emergency Quick Call Hub in Drawer -->
      <div class="drawer-emergency-hub">
        <div class="emergency-hub-title">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          <span>24x7 કટોકટી અને સહાય નંબર્સ</span>
        </div>
        <div class="emergency-hub-grid">
          <a href="tel:181" class="hub-call-pill hub-pink" title="181 અભયમ મહિલા હેલ્પલાઇન">
            <span class="hub-num">181</span>
            <span class="hub-lbl">અભયમ</span>
          </a>
          <a href="tel:108" class="hub-call-pill hub-red" title="108 ઇમરજન્સી એમ્બ્યુલન્સ">
            <span class="hub-num">108</span>
            <span class="hub-lbl">એમ્બ્યુલન્સ</span>
          </a>
          <a href="tel:18002336666" class="hub-call-pill hub-blue" title="1800-233-6666 GSRTC સેન્ટ્રલ પૂછપરછ">
            <span class="hub-num">1800-233</span>
            <span class="hub-lbl">GSRTC</span>
          </a>
        </div>
      </div>
    </div>

    <!-- Drawer Footer Info -->
    <div class="drawer-footer">
      <span>🇮🇳 ગુજરાતના મુસાફરો માટે ૧૦૦% નિઃશુલ્ક માર્ગદર્શન</span>
    </div>
  </aside>

  <!-- Mobile Bottom Quick Navigation Bar (Smart App-like bar for mobile/tablets) -->
  <nav id="mobileBottomNav" class="mobile-bottom-nav" aria-label="Mobile Quick Bar">
    <a href="<?= url() ?>" class="bnav-item <?= empty($currentRoute) ? 'active' : '' ?>">
      <div class="bnav-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
          <polyline points="9 22 9 12 15 12 15 22"></polyline>
        </svg>
      </div>
      <span class="bnav-label">હોમ</span>
    </a>

    <a href="<?= url('checklist') ?>" class="bnav-item <?= ($currentRoute ?? '') === 'checklist' ? 'active' : '' ?>">
      <div class="bnav-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M9 11l3 3L22 4"></path>
          <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
        </svg>
      </div>
      <span class="bnav-label">ચેકલિસ્ટ</span>
    </a>

    <!-- Center Floating Action Button (Ticket Booking) -->
    <a href="<?= e($settings['monetization']['redbus_affiliate_url'] ?? 'https://www.redbus.in/') ?>" target="_blank" rel="noopener noreferrer nofollow" class="bnav-fab" aria-label="ઓનલાઇન ટિકિટ બુક કરો">
      <div class="bnav-fab-inner">
        <span class="fab-ticket-icon">🎫</span>
        <span class="fab-text">બુકિંગ</span>
      </div>
    </a>

    <a href="<?= url('search') ?>" class="bnav-item <?= ($currentRoute ?? '') === 'search' ? 'active' : '' ?>">
      <div class="bnav-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
      </div>
      <span class="bnav-label">શોધો</span>
    </a>

    <button id="bottomNavMenuToggle" class="bnav-item" aria-label="મેનુ ખોલો" aria-controls="mobileDrawer">
      <div class="bnav-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="3" y1="12" x2="21" y2="12"></line>
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
      </div>
      <span class="bnav-label">મેનુ</span>
    </button>
  </nav>
