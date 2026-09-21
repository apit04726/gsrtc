<?php
/**
 * Home Page Template with Smart Slider (3 Images)
 * Color: #015fc9 & White
 * Auto-Responsive Grid System
 */

$categories = get_categories();
$allArticles = get_articles('published');
$featuredArticles = array_slice($allArticles, 0, 6);

// Count articles per category
$categoryCounts = [];
foreach ($allArticles as $art) {
    $cId = $art['category_id'] ?? '';
    $categoryCounts[$cId] = ($categoryCounts[$cId] ?? 0) + 1;
}

$pageTitle = "GSRTC બસ માર્ગદર્શક - સમયપત્રક, ટિકિટ બુકિંગ, લગેજ નિયમો & હેલ્પલાઇન | ગુજરાત બસ માર્ગદર્શક";
$metaDescription = "GSRTC એસટી બસ સમયપત્રક, ઓનલાઇન ટિકિટ બુકિંગ, ૨૫ કિલો સામાન નિયમો, વિદ્યાર્થી & સિનિયર સિટીઝન પાસ, ૧૮૦૦-૨૩૩-૬૬૬૬ હેલ્પલાઇન અને મુસાફરી સલામતી માટેનું ૧૦૦% સચોટ ગુજરાતી માર્ગદર્શન.";
$metaKeywords = "GSRTC, gsrtc bus, gsrtc time table, gsrtc bus time table, gsrtc ticket booking, gsrtc online booking, gsrtc bus tracking, gsrtc pass, gsrtc luggage rules, 25 kg free luggage gsrtc, gsrtc helpline number, gsrtc toll free 1800 233 6666, gsrtc sleeper bus, એસટી બસ સમયપત્રક, એસટી બસ ટિકિટ બુકિંગ ઓનલાઇન, જીએસઆરટીસી";
$canonicalUrl = url();
$currentRoute = '';

// Structured Data: WebSite + Organization + High-CTR GSRTC FAQPage Schema
require_once INCLUDES_PATH . '/schema.php';
$schemaJsonLd = generate_website_schema() . "\n" . generate_organization_schema() . "\n" . generate_home_faq_schema();

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Professional Modern Hero Section (Split Layout with Smart Showcase Slider) -->
<section class="pro-hero-section" aria-label="મુખ્ય પરિચય અને સ્લાઇડર">
  <div class="container">
    <div class="pro-hero-grid">
      
      <!-- Left Column: Authoritative Content & Search Box -->
      <div class="pro-hero-content">
        <div class="hero-kicker">
          <span class="kicker-pulse"></span>
          <span>GSRTC અને ગુજરાત બસ મુસાફર સહાય પોર્ટલ</span>
        </div>

        <h1 class="hero-headline">
          GSRTC બસ મુસાફરી માટે ઉપયોગી માહિતી અને <span class="hero-highlight">જરૂરી સાવચેતીઓ</span>
        </h1>

        <p class="hero-description">
          એસટી બસમાં મુસાફરી કરતા પહેલા, મુસાફરી દરમિયાન અને મુસાફરી પછી જરૂરી નિયમો, ૨૫ કિલો સામાન મર્યાદા, ટિકિટ કેન્સલેશન, પાસ યોજના અને મુસાફરોની સુરક્ષા અંગેનું ૧૦૦% વિશ્વસનીય ગુજરાતી માર્ગદર્શન.
        </p>

        <!-- Modern Elevated Search Card -->
        <form action="<?= url('search') ?>" method="GET" class="hero-search-card" role="search">
          <div class="search-input-group">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input 
              type="text" 
              name="q" 
              class="search-input" 
              placeholder="GSRTC સર્ચ કરો: દા.ત. ટિકિટ નિયમો, ૨૫ કિલો સામાન, પાસ, helpline..." 
              aria-label="બસ પ્રવાસ માહિતી શોધો"
              required
            >
          </div>
          <button type="submit" class="search-submit-btn">
            <span>માહિતી શોધો</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
          </button>
        </form>

        <!-- Quick Search Tags (High Search Volume GSRTC Queries) -->
        <div class="hero-tags">
          <span class="tags-label">મોસ્ટ પોપ્યુલર:</span>
          <a href="<?= url('search?q=ટિકિટ+બુકિંગ') ?>" class="hero-tag-pill">ટિકિટ બુકિંગ</a>
          <a href="<?= url('search?q=સામાન+નિયમો') ?>" class="hero-tag-pill">૨૫ કિલો સામાન</a>
          <a href="<?= url('search?q=વિદ્યાર્થી+પાસ') ?>" class="hero-tag-pill">એસટી બસ પાસ</a>
          <a href="<?= url('search?q=રિફંડ') ?>" class="hero-tag-pill">ટિકિટ રિફંડ નિયમો</a>
          <a href="<?= url('search?q=સિનિયર+સિટીઝન') ?>" class="hero-tag-pill">વૃદ્ધોની અનામત સીટ</a>
          <a href="<?= url('search?q=સ્લીપર+બસ') ?>" class="hero-tag-pill">સ્લીપર & વોલ્વો</a>
          <a href="<?= url('search?q=helpline') ?>" class="hero-tag-pill">૧૮૦૦-૨૩૩-૬૬૬૬ હેલ્પલાઇન</a>
        </div>

        <!-- Trust Badges Row -->
        <div class="hero-trust-row">
          <div class="trust-item">
            <span class="trust-check">✓</span>
            <span>૩૬+ અધિકૃત ગાઈડ્સ</span>
          </div>
          <div class="trust-item">
            <span class="trust-check">✓</span>
            <span>૧૨ કેટેગરીઝ</span>
          </div>
          <div class="trust-item">
            <span class="trust-check">✓</span>
            <span>૧૦૦% ચકાસાયેલ માહિતી</span>
          </div>
        </div>
      </div>

      <!-- Right Column: Smart Showcase Card Slider -->
      <div class="pro-hero-slider-wrap">
        <div class="showcase-card" id="heroSlider">
        
          <!-- Slide 1: Highway Journey -->
          <div class="showcase-slide active" data-slide="0" data-tag="હાઇવે મુસાફરી">
            <img src="<?= url('assets/images/slide-1.jpg') ?>" alt="ગુજરાત હાઈવે બસ પ્રવાસ" class="showcase-img" loading="eager">
            <div class="showcase-caption">
              <span class="caption-tag">મુસાફરી પૂર્વે તૈયારી</span>
              <h3 class="caption-title">બસમાં મુસાફરી કરતા પહેલા શું ધ્યાન રાખવું?</h3>
              <p class="caption-desc">અસલ આઈડી કાર્ડ, ટિકિટ કન્ફર્મેશન અને સામાન પેકિંગનું સંપૂર્ણ માર્ગદર્શન.</p>
              <div class="caption-actions">
                <a href="<?= url('article/bus-safari-pehlani-taiyari') ?>" class="caption-btn">વાંચો &rarr;</a>
              </div>
            </div>
          </div>

          <!-- Slide 2: Bus Port & Platform Guidance -->
          <div class="showcase-slide" data-slide="1" data-tag="ડેપો નેવિગેશન">
            <img src="<?= url('assets/images/slide-2.jpg') ?>" alt="ગુજરાત બસ સ્ટેશન પ્લેટફોર્મ ડેપો" class="showcase-img" loading="lazy">
            <div class="showcase-caption">
              <span class="caption-tag">ડેપો & પ્લેટફોર્મ ગાઈડ</span>
              <h3 class="caption-title">બસ સ્ટેન્ડ પર મુસાફરી કરતા પહેલા શું તપાસવું?</h3>
              <p class="caption-desc">પૂછપરછ બારી, પ્લેટફોર્મ બે નંબર અને વિન્ડશિલ્ડ રૂટ પાટિયું વાંચવાની સાચી રીત.</p>
              <div class="caption-actions">
                <a href="<?= url('article/bus-stand-tips-guidance') ?>" class="caption-btn">વાંચો &rarr;</a>
              </div>
            </div>
          </div>

          <!-- Slide 3: Family Safety & Luggage Rules -->
          <div class="showcase-slide" data-slide="2" data-tag="પરિવાર & સામાન">
            <img src="<?= url('assets/images/slide-3.jpg') ?>" alt="પરિવાર સાથે સુરક્ષિત બસ મુસાફરી અને સામાન પેકિંગ" class="showcase-img" loading="lazy">
            <div class="showcase-caption">
              <span class="caption-tag">સુરક્ષા & સામાન નિયમો</span>
              <h3 class="caption-title">૨૫ કિલો સામાન મર્યાદા & બાળકોની સુરક્ષા</h3>
              <p class="caption-desc">બાળકો માટે હાફ ટિકિટના નિયમો અને પ્રવાસ માટેનું ઇન્ટરેક્ટિવ ચેકલિસ્ટ.</p>
              <div class="caption-actions">
                <a href="<?= url('checklist') ?>" class="caption-btn">ચેકલિસ્ટ જુઓ &rarr;</a>
              </div>
            </div>
          </div>

          <!-- Slider Controls inside the Showcase Card -->
          <div class="showcase-controls">
            <div class="showcase-dots" id="sliderDots">
              <button type="button" class="s-dot active" data-index="0" aria-label="સ્લાઇડ ૧"></button>
              <button type="button" class="s-dot" data-index="1" aria-label="સ્લાઇડ ૨"></button>
              <button type="button" class="s-dot" data-index="2" aria-label="સ્લાઇડ ૩"></button>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- Top Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container">

    <!-- Interactive Checklist Teaser Card (White & Primary #015fc9) -->
    <div style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color:#fff; border-radius: var(--radius-lg); padding: clamp(1.5rem, 3vw, 2.25rem); margin-bottom: 3.5rem; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1.5rem; box-shadow: var(--shadow-lg);">
      <div style="max-width: 680px;">
        <h2 style="color:#fff; font-size: clamp(1.25rem, 1.5vw + 0.8rem, 1.6rem); margin: 0 0 0.4rem;">બસ મુસાફરી પહેલાંનું ઇન્ટરેક્ટિવ ચેકલિસ્ટ</h2>
        <p style="color: #e2e8f0; margin: 0; font-size: clamp(0.9rem, 0.2vw + 0.85rem, 1rem);">ઘરેથી નીકળતા પહેલા જરૂરી દસ્તાવેજ, રોકડ, દવાઓ અને સામાનનું લિસ્ટ તમારા મોબાઇલમાં ટીક માર્ક કરો.</p>
      </div>
      <a href="<?= url('checklist') ?>" class="btn btn-white" style="white-space: nowrap;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
        <span>ચેકલિસ્ટ ખોલો (ચેક કરો)</span>
      </a>
    </div>

    <!-- 12 Categories Grid (Auto-Responsive) -->
    <section style="margin-bottom: 4rem;">
      <div class="section-header">
        <div class="section-title-group">
          <h2>વિષય મુજબ માર્ગદર્શન (Categories)</h2>
          <p>તમારી મુસાફરીને અનુરૂપ વિષય પસંદ કરી સચોટ માહિતી મેળવો</p>
        </div>
      </div>

      <div class="categories-grid">
        <?php foreach ($categories as $cat): ?>
          <?php $count = $categoryCounts[$cat['id']] ?? 0; ?>
          <a href="<?= url('category/' . $cat['slug']) ?>" class="category-card">
            <div class="category-card-top">
              <div class="category-icon" style="background-color: var(--primary);">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                  <polyline points="14 2 14 8 20 8"></polyline>
                </svg>
              </div>
              <span class="category-count"><?= $count ?> લેખ</span>
            </div>
            <h3 class="category-name"><?= e($cat['name']) ?></h3>
            <p class="category-desc"><?= e($cat['description']) ?></p>
          </a>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- GSRTC Smart Search Topics & Direct Access Hub (Google SEO Silo) -->
    <section class="gsrtc-seo-hub-section" style="background: var(--bg-surface); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: clamp(1.5rem, 3vw, 2.5rem); margin-bottom: 3.5rem; box-shadow: var(--shadow-sm);">
      <div style="border-bottom: 2px solid var(--primary-light); padding-bottom: 1rem; margin-bottom: 1.5rem;">
        <span style="font-size: 0.8rem; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.5px;">GSRTC Smart Search Hub</span>
        <h2 style="font-size: clamp(1.25rem, 1.2vw + 1rem, 1.6rem); color: var(--primary-dark); margin: 0.25rem 0 0.5rem 0;">GSRTC મોસ્ટ પોપ્યુલર સર્ચ વિષયો અને માર્ગદર્શિકા</h2>
        <p style="color: var(--text-muted); font-size: 0.92rem; margin: 0;">ગુજરાતમાં મુસાફરો દ્વારા સૌથી વધુ સર્ચ કરવામાં આવતી સેવાઓ, સમયપત્રક, પાસ અને અધિકૃત નિયમોનું એક જ ક્લિકમાં માર્ગદર્શન:</p>
      </div>

      <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
        <!-- Hub Group 1: સમયપત્રક & પૂછપરછ -->
        <div style="background: var(--bg-subtle); padding: 1.25rem; border-radius: var(--radius-md); border-left: 4px solid #0284c7;">
          <h3 style="font-size: 1.05rem; color: #0369a1; margin-top: 0; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
            <span>🕒 સમયપત્રક & બસ પૂછપરછ</span>
          </h3>
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.45rem; font-size: 0.88rem;">
            <li><a href="<?= url('search?q=સમયપત્રક') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; GSRTC બસ સમયપત્રક & રૂટ તપાસો</a></li>
            <li><a href="<?= url('article/bus-stand-platform-bay-number-board-reading-tips') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; ડેપો પ્લેટફોર્મ (Bay Number) વાંચવાની રીત</a></li>
            <li><a href="<?= url('article/chomasama-gsrtc-route-diversion-causeway-status') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; ચોમાસામાં રૂટ ડાયવર્ઝન અને કોઝવે સ્થિતિ</a></li>
            <li><a href="<?= url('search?q=રાજકોટ') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; અમદાવાદ, રાજકોટ, સુરત, વડોદરા બસ માહિતી</a></li>
          </ul>
        </div>

        <!-- Hub Group 2: ટિકિટ & રિફંડ -->
        <div style="background: var(--bg-subtle); padding: 1.25rem; border-radius: var(--radius-md); border-left: 4px solid #7c3aed;">
          <h3 style="font-size: 1.05rem; color: #6d28d9; margin-top: 0; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
            <span>🎫 ટિકિટ બુકિંગ & રિફંડ નિયમો</span>
          </h3>
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.45rem; font-size: 0.88rem;">
            <li><a href="<?= url('article/ticket-booking-niyamo-savcheti') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; GSRTC ઓનલાઇન અને કાઉન્ટર ટિકિટ નિયમો</a></li>
            <li><a href="<?= url('article/gsrtc-ticket-cancellation-refund-rules-timeline') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; ટિકિટ કેન્સલેશન અને રિફંડ સ્લેબ (10% થી 40%)</a></li>
            <li><a href="<?= url('article/gsrtc-seat-selection-advance-booking-guide') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; બસમાં શ્રેષ્ઠ સીટ સિલેક્શન અને એડવાન્સ બુકિંગ</a></li>
            <li><a href="<?= url('article/st-bus-balako-ticket-age-rules-half-ticket') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; બાળકોની ટિકિટ: 0-5 વર્ષ ફ્રી & 5-12 હાફ ટિકિટ</a></li>
          </ul>
        </div>

        <!-- Hub Group 3: સામાન & લગેજ -->
        <div style="background: var(--bg-subtle); padding: 1.25rem; border-radius: var(--radius-md); border-left: 4px solid #d97706;">
          <h3 style="font-size: 1.05rem; color: #b45309; margin-top: 0; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
            <span>🧳 સામાન, વજન & લગેજ ચાર્જ</span>
          </h3>
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.45rem; font-size: 0.88rem;">
            <li><a href="<?= url('article/bus-luggage-niyamo-packing') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; ૨૫ કિલોગ્રામ મફત સામાન મર્યાદા નિયમો</a></li>
            <li><a href="<?= url('article/gsrtc-luggage-charge-rates-weight-rules') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; વધારાના સામાન માટે લગેજ ટિકિટ દર પત્રક</a></li>
            <li><a href="<?= url('article/bus-pratibandhit-vastuo-prohibited-items-rules') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; બસમાં પ્રતિબંધિત સામાન (પેટ્રોલ, ગેસ, ફટાકડા)</a></li>
            <li><a href="<?= url('article/gsrtc-bus-stand-cloak-room-rules-luggage-deposit') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; ડેપો ક્લોક રૂમમાં સામાન જમા કરાવવાના નિયમો</a></li>
          </ul>
        </div>

        <!-- Hub Group 4: પાસ & કન્સેશન -->
        <div style="background: var(--bg-subtle); padding: 1.25rem; border-radius: var(--radius-md); border-left: 4px solid #16a34a;">
          <h3 style="font-size: 1.05rem; color: #15803d; margin-top: 0; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
            <span>🪪 પાસ યોજના & કન્સેશન</span>
          </h3>
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.45rem; font-size: 0.88rem;">
            <li><a href="<?= url('article/gsrtc-bus-pass-yojana-vidyarthi-daily-pass') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; વિદ્યાર્થી ૮૦% રાહત પાસ અને કન્યા કેળવણી યોજના</a></li>
            <li><a href="<?= url('article/gsrtc-senior-citizen-anamat-seat-concession-rules') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; સિનિયર સિટીઝન અનામત બેઠક (સીટ નં. ૧ થી ૪)</a></li>
            <li><a href="<?= url('article/mahila-suraksha-bus-safari-181-abhayam-rights') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; મહિલાઓ માટે અનામત બેઠકો & ૧૮૧ અભયમ હેલ્પલાઇન</a></li>
            <li><a href="<?= url('article/vruddh-vyakti-bus-safari-guidance') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; વડીલો અને દિવ્યાંગ મુસાફરો માટે ખાસ સુવિધાઓ</a></li>
          </ul>
        </div>

        <!-- Hub Group 5: ઈમરજન્સી & હેલ્પલાઇન -->
        <div style="background: var(--bg-subtle); padding: 1.25rem; border-radius: var(--radius-md); border-left: 4px solid #dc2626;">
          <h3 style="font-size: 1.05rem; color: #b91c1c; margin-top: 0; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
            <span>🚨 ઈમરજન્સી & ૨૪x૭ હેલ્પલાઇન</span>
          </h3>
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.45rem; font-size: 0.88rem;">
            <li><a href="<?= url('article/emergency-bus-sahay-helpline') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; GSRTC કંટ્રોલ રૂમ ટોલ ફ્રી ૧૮૦૦ ૨૩૩ ૬૬૬૬</a></li>
            <li><a href="<?= url('article/bus-safari-achanak-bimari-medical-emergency-108-help') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; મુસાફરીમાં તબીબી કટોકટી & ૧૦૮ એમ્બ્યુલન્સ મીટ પોઇન્ટ</a></li>
            <li><a href="<?= url('article/bus-saman-khovai-jay-to-shu-karvu') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; સામાન ખોવાઈ જાય તો ડેપો લોસ્ટ પ્રોપર્ટી રિકવરી</a></li>
            <li><a href="<?= url('article/ratre-bus-safari-safety-tips') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; રાત્રિ મુસાફરીમાં સુરક્ષા અને ચોરીથી બચવાના ઉપાય</a></li>
          </ul>
        </div>

        <!-- Hub Group 6: સ્લીપર & વોલ્વો -->
        <div style="background: var(--bg-subtle); padding: 1.25rem; border-radius: var(--radius-md); border-left: 4px solid #0f766e;">
          <h3 style="font-size: 1.05rem; color: #0f766e; margin-top: 0; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
            <span>🚌 સ્લીપર, વોલ્વો & ગુર્જરનગરી</span>
          </h3>
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.45rem; font-size: 0.88rem;">
            <li><a href="<?= url('article/gsrtc-sleeper-ac-volvo-berth-selection-night-guide') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; GSRTC સ્લીપર બસ: લોઅર vs અપર બર્થ માર્ગદર્શન</a></li>
            <li><a href="<?= url('article/lambee-bus-safari-paani-khorak') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; લાંબી મુસાફરીમાં ખોરાક અને પીવાના પાણીની વ્યવસ્થા</a></li>
            <li><a href="<?= url('article/bus-refreshment-halt-hotel-st-stop-niyamo') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; હોટલ કે ડેપો રિફ્રેશમેન્ટ સ્ટોપ પર રાખવાની સાવચેતી</a></li>
            <li><a href="<?= url('article/balako-bus-ulti-chakkar-motion-sickness-upay') ?>" style="color: var(--text-main); text-decoration: none; font-weight: 600;">&bull; મોશન સિકનેસ: ઉલટી-ચક્કરથી બચવાના અસરકારક ઉપાયો</a></li>
          </ul>
        </div>
      </div>
    </section>

    <!-- In-Content Ad Placement -->
    <?php render_ad_slot('in_article'); ?>

    <!-- Featured & Essential Guides (Auto-Responsive Grid) -->
    <section style="margin-bottom: 4rem;">
      <div class="section-header">
        <div class="section-title-group">
          <h2>મુસાફરો માટે સૌથી ઉપયોગી લેખો</h2>
          <p>મુસાફરી દરમિયાન સૌથી વધુ પૂછાતા પ્રશ્નો અને તેના સચોટ જવાબો</p>
        </div>
        <a href="<?= url('category/before-travel') ?>" class="btn btn-outline btn-sm">બધા લેખ જુઓ &rarr;</a>
      </div>

      <div class="articles-grid">
        <?php foreach ($featuredArticles as $art): ?>
          <?php 
            $cat = get_category_by_slug($art['category_id'] ?? '');
          ?>
          <article class="article-card">
            <div class="article-card-body">
              <div class="article-meta">
                <span class="article-category-badge"><?= e($cat['name'] ?? 'માર્ગદર્શન') ?></span>
                <span>&bull;</span>
                <span><?= e($art['reading_time'] ?? '5 મિનિટ') ?></span>
              </div>
              <h3 class="article-title">
                <a href="<?= url('article/' . $art['slug']) ?>"><?= e($art['title']) ?></a>
              </h3>
              <p class="article-excerpt"><?= e($art['excerpt']) ?></p>
              <div class="article-footer">
                <span style="font-size:0.8rem; color:var(--text-muted);">અપડેટ: <?= date('d M Y', strtotime($art['updated_at'] ?? '2026-01-01')) ?></span>
                <a href="<?= url('article/' . $art['slug']) ?>" class="read-more-link">
                  વાંચો <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Step-by-Step Passenger Journey Timeline (Auto-Responsive Grid) -->
    <section class="journey-timeline-section">
      <div class="journey-timeline-header">
        <h2 class="journey-timeline-title">સલામત મુસાફરીનો 4-તબક્કાનો ક્રમ</h2>
        <p class="journey-timeline-desc">દરેક પગલે શું સાવચેતી રાખવી તે સરળતાથી સમજો</p>
      </div>

      <div class="journey-timeline-grid">
        <!-- Stage 1 -->
        <div class="stage-card">
          <span class="stage-badge">તબક્કો ૧</span>
          <h4 class="stage-title">ઘરેથી નીકળતા પહેલાં</h4>
          <p class="stage-desc">ટિકિટ અને અસલ આઈડી કાર્ડ કન્ફર્મ કરો. ૨૫ કિલો વજન મર્યાદા અને દવાઓ હેન્ડબેગમાં પેક કરો.</p>
        </div>

        <!-- Stage 2 -->
        <div class="stage-card">
          <span class="stage-badge">તબક્કો ૨</span>
          <h4 class="stage-title">બસ સ્ટેન્ડ (ડેપો) પર</h4>
          <p class="stage-desc">પૂછપરછ બારીએ પ્લેટફોર્મ નંબર તપાસો. બસના કાચનું રૂટ પાટિયું વાંચીને જ લાઈનમાં ચઢો.</p>
        </div>

        <!-- Stage 3 -->
        <div class="stage-card">
          <span class="stage-badge">તબક્કો ૩</span>
          <h4 class="stage-title">મુસાફરી દરમિયાન</h4>
          <p class="stage-desc">બારી બહાર હાથ ન કાઢો. ટિકિટ છેલ્લે સુધી સાચવો. રિફ્રેશમેન્ટ રોકાણ વખતે સામાન સાથે રાખો.</p>
        </div>

        <!-- Stage 4 -->
        <div class="stage-card">
          <span class="stage-badge">તબક્કો ૪</span>
          <h4 class="stage-title">કટોકટી અને ઈમરજન્સી</h4>
          <p class="stage-desc">સામાન ભુલાઈ જાય તો ડેપો ટ્રાફિક કંટ્રોલરને મળો. મહિલા સુરક્ષા માટે ૧૮૧ અને મેડિકલ માટે ૧૦૮ નો ઉપયોગ કરો.</p>
        </div>
      </div>
    </section>

    <!-- Bottom Ad Placement -->
    <?php render_ad_slot('below_article'); ?>

    <!-- Why This Platform / Trust Statement -->
    <section style="background: var(--primary-subtle); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: clamp(1.5rem, 3vw, 2.5rem); text-align: center; max-width: 860px; margin: 0 auto;">
      <h3 style="font-size: clamp(1.15rem, 1vw + 0.9rem, 1.4rem); margin-bottom: 0.75rem; color: var(--primary-dark);">શા માટે આ માર્ગદર્શિકા મુસાફરો માટે ઉપયોગી છે?</h3>
      <p style="font-size: 0.95rem; color: #475569; margin-bottom: 1.5rem;">
        આ વેબસાઇટ કોઈ ફેક ટિકિટ બુકિંગ કે કમ્પ્યુટર જનરેટેડ એઆઈ કન્ટેન્ટ નથી બનાવતી. અહીં આપવામાં આવેલી દરેક માહિતી વાસ્તવિક મુસાફરોના અનુભવો, મોટર વ્હીકલ નિયમો અને પરિવહનની જાહેર માર્ગદર્શિકાઓને ધ્યાને રાખીને શુદ્ધ સરળ ગુજરાતીમાં તૈયાર કરવામાં આવી છે.
      </p>
      <div style="display: inline-flex; gap: 1rem; flex-wrap: wrap; justify-content: center;">
        <a href="<?= url('about-us') ?>" class="btn btn-outline btn-sm">અમારા મિશન વિશે વધુ વાંચો</a>
        <a href="<?= url('sources-verification') ?>" class="btn btn-outline btn-sm">માહિતી સ્ત્રોત અને સત્યાર્થતા</a>
      </div>
    </section>

  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
