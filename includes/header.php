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
$ogImage = $ogImage ?? url('assets/images/og-share.png');
?>
<!DOCTYPE html>
<html lang="gu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($metaDescription) ?>">
  <meta name="keywords" content="<?= e($metaKeywords) ?>">
  <link rel="canonical" href="<?= e($canonicalUrl) ?>">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  
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

  <?php if (!empty($settings['analytics']['google_search_console_tag'])): ?>
    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="<?= e($settings['analytics']['google_search_console_tag']) ?>">
  <?php endif; ?>

  <?php if (!empty($settings['adsense_client_id'])): ?>
    <!-- Google AdSense Official Account Link & Script -->
    <meta name="google-adsense-account" content="<?= e($settings['adsense_client_id']) ?>">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?= e($settings['adsense_client_id']) ?>" crossorigin="anonymous"></script>
  <?php endif; ?>
  
  <!-- Open Graph / Social Meta -->
  <meta property="og:locale" content="gu_IN">
  <meta property="og:type" content="<?= e($ogType) ?>">
  <meta property="og:title" content="<?= e($pageTitle) ?>">
  <meta property="og:description" content="<?= e($metaDescription) ?>">
  <meta property="og:url" content="<?= e($canonicalUrl) ?>">
  <meta property="og:site_name" content="<?= e(SITE_NAME) ?>">
  <meta property="og:image" content="<?= e($ogImage) ?>">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($pageTitle) ?>">
  <meta name="twitter:description" content="<?= e($metaDescription) ?>">
  <meta name="twitter:image" content="<?= e($ogImage) ?>">

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
            <h1><?= e(SITE_NAME) ?></h1>
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
          <a href="<?= url('search') ?>" class="btn btn-outline btn-sm" title="શોધો">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <span>શોધો</span>
          </a>
          <button id="mobileMenuToggle" class="mobile-menu-toggle" aria-label="ઓપન મેનુ">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <line x1="3" y1="12" x2="21" y2="12"></line>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </header>

  <!-- Mobile Drawer Backdrop & Drawer -->
  <div id="drawerBackdrop" class="drawer-backdrop"></div>
  <aside id="mobileDrawer" class="mobile-drawer" aria-label="Mobile Navigation">
    <div class="drawer-header">
      <span style="font-weight: 700; color: var(--primary);"><?= e(SITE_NAME) ?></span>
      <button id="closeDrawer" style="background:none; border:none; cursor:pointer; padding:0.25rem;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </button>
    </div>
    <div class="drawer-nav">
      <a href="<?= url() ?>">મુખ્ય પૃષ્ઠ (હોમ)</a>
      <a href="<?= url('checklist') ?>">મુસાફરી ચેકલિસ્ટ (ચેક કરો)</a>
      <a href="<?= url('category/before-travel') ?>">મુસાફરી પહેલાં શું ધ્યાન રાખવું</a>
      <a href="<?= url('category/during-travel') ?>">મુસાફરી દરમિયાન સાવચેતી</a>
      <a href="<?= url('category/luggage-rules') ?>">સામાન અને લગેજ નિયમો</a>
      <a href="<?= url('category/ticket-booking') ?>">ટિકિટ અને બુકિંગ માર્ગદર્શન</a>
      <a href="<?= url('category/passenger-safety') ?>">સલામતી અને સુરક્ષા</a>
      <a href="<?= url('category/children-travel') ?>">બાળકો સાથે મુસાફરી</a>
      <a href="<?= url('category/senior-citizens') ?>">વૃદ્ધો માટે માર્ગદર્શન</a>
      <a href="<?= url('category/monsoon-weather') ?>">વરસાદ અને હવામાન</a>
      <a href="<?= url('category/long-distance') ?>">લાંબી મુસાફરી ટિપ્સ</a>
      <a href="<?= url('category/bus-stand-tips') ?>">બસ સ્ટેન્ડ માર્ગદર્શન</a>
      <a href="<?= url('category/emergency-info') ?>">ઈમરજન્સી અને હેલ્પલાઇન</a>
      <hr style="border: 0; border-top: 1px solid var(--border); margin: 0.5rem 0;">
      <a href="<?= url('about-us') ?>">અમારા વિશે</a>
      <a href="<?= url('contact-us') ?>">સંપર્ક કરો</a>
      <a href="<?= url('disclaimer') ?>">કાયદાકીય અસ્વીકરણ</a>
    </div>
  </aside>
