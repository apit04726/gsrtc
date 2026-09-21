<?php
/**
 * Single Article Template
 * People-First Design: Direct Answer, Checklist, Detailed Steps, Warnings, Visible FAQs & Schemas
 */

if (!isset($article) || empty($article)) {
    http_response_code(404);
    require_once TEMPLATES_PATH . '/404.php';
    exit;
}

$category = get_category_by_slug($article['category_id'] ?? '');
$relatedArticles = get_related_articles($article, 3);
$allCategories = get_categories();

// SEO Setup
$pageTitle = ($article['meta_title'] ?? $article['title']) . ' - GSRTC બસ માર્ગદર્શિકા | ' . SITE_NAME;
$metaDescription = $article['meta_desc'] ?? ($article['excerpt'] . ' GSRTC ગુજરાત એસટી બસ મુસાફરી નિયમો.');
$metaKeywords = ($article['title']) . ', GSRTC, ' . ($category['name'] ?? '') . ', gsrtc rules, st bus, એસટી બસ, ગુજરાત બસ માર્ગદર્શક';
$canonicalUrl = url('article/' . $article['slug']);
$ogType = 'article';
$currentRoute = 'article/' . $article['slug'];

// Breadcrumbs
$breadcrumbs = [
    'હોમ' => url(),
    ($category['name'] ?? 'કેટેગરી') => url('category/' . ($category['slug'] ?? '')),
    $article['title'] => ''
];

// Schema JSON-LD
require_once INCLUDES_PATH . '/schema.php';
$schemaJsonLd = generate_breadcrumbs_schema($breadcrumbs) . "\n" . generate_article_schema($article);

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Top Header Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container">
    <div class="article-detail-layout">

      <!-- Main Article Column -->
      <article class="article-main-content">
        
        <!-- Breadcrumbs -->
        <nav class="breadcrumbs" aria-label="Breadcrumb">
          <a href="<?= url() ?>">હોમ</a>
          <span>/</span>
          <?php if ($category): ?>
            <a href="<?= url('category/' . $category['slug']) ?>"><?= e($category['name']) ?></a>
            <span>/</span>
          <?php endif; ?>
          <span style="color: var(--primary); font-weight:600;"><?= e(mb_strimwidth($article['title'], 0, 45, '...')) ?></span>
        </nav>

        <!-- Article Header -->
        <header class="article-header">
          <h1 class="article-h1"><?= e($article['title']) ?></h1>

          <div class="article-byline">
            <span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px;"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
              <?= e($article['author'] ?? 'સફર માર્ગદર્શક ટીમ') ?>
            </span>
            <span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              વાંચન સમય: <?= e($article['reading_time'] ?? '5 મિનિટ') ?>
            </span>
            <span>
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: -2px;"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
              છેલ્લો સુધારો: <?= date('d M Y', strtotime($article['updated_at'] ?? $article['published_at'])) ?>
            </span>
            <span style="background:#dcfce7; color:#15803d; font-weight:700; padding:0.15rem 0.5rem; border-radius:4px; font-size:0.75rem;">
              ✓ ચકાસાયેલ માહિતી
            </span>
          </div>
        </header>

        <!-- 1. Direct Answer Box (People-First SEO) -->
        <?php if (!empty($article['direct_answer'])): ?>
          <div class="direct-answer-box">
            <div class="direct-answer-header">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
              <span>ટૂંકો અને સીધો જવાબ (Quick Direct Answer)</span>
            </div>
            <p class="direct-answer-text"><?= e($article['direct_answer']) ?></p>
          </div>
        <?php endif; ?>

        <!-- 2. Practical Checklist Box -->
        <?php if (!empty($article['checklist']) && is_array($article['checklist'])): ?>
          <div class="checklist-box">
            <h3 class="checklist-title">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
              મુસાફરી પેકિંગ & જરૂરી ચેકલિસ્ટ
            </h3>
            <ul class="checklist-items">
              <?php foreach ($article['checklist'] as $item): ?>
                <li class="checklist-item">
                  <span class="checklist-check">✓</span>
                  <span><?= e($item) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- In-Content Ad Placement -->
        <?php render_ad_slot('in_article'); ?>

        <!-- 3. Detailed Step-by-Step Content -->
        <div class="article-body-text">
          <?= $article['content'] ?>
        </div>

        <!-- 4. Important Warnings Box -->
        <?php if (!empty($article['warnings']) && is_array($article['warnings'])): ?>
          <div class="warning-box">
            <div class="warning-title">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
              <span>અગત્યની સાવચેતીઓ અને સામાન્ય ભૂલો</span>
            </div>
            <ul>
              <?php foreach ($article['warnings'] as $warning): ?>
                <li><?= e($warning) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- 5. Visible FAQ Section (Strictly matches FAQ schema) -->
        <?php if (!empty($article['faqs']) && is_array($article['faqs'])): ?>
          <section class="faq-section" aria-label="વારંવાર પૂછાતા પ્રશ્નો">
            <h2 class="faq-title">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
              વારંવાર પૂછાતા પ્રશ્નો (FAQs)
            </h2>
            <div class="faq-accordion">
              <?php foreach ($article['faqs'] as $idx => $faq): ?>
                <div class="faq-item <?= $idx === 0 ? 'active' : '' ?>">
                  <button type="button" class="faq-question">
                    <span><?= e($faq['question']) ?></span>
                    <svg class="faq-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                  </button>
                  <div class="faq-answer">
                    <p><?= e($faq['answer']) ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endif; ?>

        <!-- Verification & Sources Notice -->
        <div style="background: #f8fafc; border: 1px solid var(--border); border-radius: var(--radius-md); padding: 1rem 1.25rem; font-size: 0.85rem; color: #64748b; margin-top: 2rem;">
          <strong>માહિતી સ્ત્રોત અને ચકાસણી:</strong> આ લેખમાં સમાવિષ્ટ નિયમો મોટર વ્હીકલ એક્ટ, ગુજરાત રાજ્ય માર્ગ વાહન વ્યવહાર નિગમ (GSRTC) ની જાહેર સેવા નીતિઓ અને મુસાફર ચાર્ટરના આધારે સંકલિત કરવામાં આવ્યા છે. નિયમો અને ભાડાં સમયાંતરે સરકારી ઠરાવો મુજબ બદલાઈ શકે છે, તેથી યાત્રા કરતા પહેલાં સ્થાનિક ડેપો પર તાજી સ્થિતિ જાણી લેવી હિતાવહ છે. <a href="<?= url('sources-verification') ?>">સંપૂર્ણ નીતિ વાંચો &rarr;</a>
        </div>

        <!-- Social Share Bar -->
        <div class="share-bar">
          <span class="share-label">આ માહિતી શેર કરો:</span>
          <?php 
            $shareUrl = rawurlencode($canonicalUrl);
            $shareText = rawurlencode($article['title'] . " - " . SITE_NAME);
          ?>
          <a href="https://api.whatsapp.com/send?text=<?= $shareText ?>%20<?= $shareUrl ?>" target="_blank" rel="noopener noreferrer" class="share-btn share-wa">
            વ્હોટ્સએપ
          </a>
          <a href="https://t.me/share/url?url=<?= $shareUrl ?>&text=<?= $shareText ?>" target="_blank" rel="noopener noreferrer" class="share-btn share-tg">
            ટેલિગ્રામ
          </a>
          <button type="button" id="copyArticleLink" class="share-btn share-copy">
            લિંક કોપી કરો
          </button>
        </div>

        <!-- Exit-Intent / Bottom In-Article Ad Placement -->
        <?php render_ad_slot('below_article'); ?>

        <!-- Related Articles -->
        <?php if (!empty($relatedArticles)): ?>
          <section class="related-articles-section">
            <h3 class="related-articles-heading">આ સંબંધિત અન્ય ઉપયોગી માર્ગદર્શન</h3>
            <div class="related-articles-grid">
              <?php foreach ($relatedArticles as $rel): ?>
                <div class="related-article-card">
                  <h4 class="related-article-title">
                    <a href="<?= url('article/' . $rel['slug']) ?>"><?= e($rel['title']) ?></a>
                  </h4>
                  <p class="related-article-excerpt"><?= e(mb_strimwidth($rel['excerpt'], 0, 80, '...')) ?></p>
                </div>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endif; ?>

      </article>

      <!-- Sidebar -->
      <aside class="sidebar">
        
        <!-- Desktop Sidebar Ad Placement -->
        <?php render_ad_slot('sidebar'); ?>

        <!-- Quick Checklist Widget -->
        <div class="sidebar-widget" style="background: linear-gradient(135deg, #0f2942 0%, #1e3f66 100%); color:#fff;">
          <h3 style="color:#fff; font-size: 1.05rem; margin-bottom: 0.5rem;">મુસાફરી ચેકલિસ્ટ</h3>
          <p style="color:#cbd5e1; font-size: 0.82rem; margin-bottom: 1rem;">તમારી બેગ પેક કરતી વખતે કઈ વસ્તુ રહી નથી ગઈ તે જાતે ચેક કરો.</p>
          <a href="<?= url('checklist') ?>" class="btn btn-primary btn-sm" style="width: 100%; text-align: center;">ઇન્ટરેક્ટિવ ચેકલિસ્ટ &rarr;</a>
        </div>

        <!-- Categories Widget -->
        <div class="sidebar-widget">
          <h3 class="widget-title">બધા વિષયો (Categories)</h3>
          <ul class="widget-links">
            <?php foreach ($allCategories as $cat): ?>
              <li>
                <a href="<?= url('category/' . $cat['slug']) ?>">
                  &bull; <?= e($cat['name']) ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Emergency Numbers Widget (Smart Direct Call) -->
        <div class="sidebar-widget emergency-sidebar-widget">
          <h3 class="widget-title emergency-widget-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            ઈમરજન્સી હેલ્પલાઇન
          </h3>
          <p class="emergency-widget-desc">મુસાફરી દરમિયાન તાત્કાલિક કૉલ કરવા નંબર પર ક્લિક કરો:</p>
          <div class="sidebar-call-list">
            <a href="tel:108" class="smart-sidebar-call sidebar-call-red" title="108 પર કૉલ કરો">
              <div class="sidebar-call-info">
                <span class="call-num">108</span>
                <span class="call-desc">એમ્બ્યુલન્સ સેવા</span>
              </div>
              <span class="call-btn">📞 કૉલ</span>
            </a>
            <a href="tel:112" class="smart-sidebar-call sidebar-call-blue" title="112 પર કૉલ કરો">
              <div class="sidebar-call-info">
                <span class="call-num">112</span>
                <span class="call-desc">પોલીસ કટોકટી</span>
              </div>
              <span class="call-btn">📞 કૉલ</span>
            </a>
            <a href="tel:181" class="smart-sidebar-call sidebar-call-pink" title="181 પર કૉલ કરો">
              <div class="sidebar-call-info">
                <span class="call-num">181</span>
                <span class="call-desc">'અભયમ' મહિલા હેલ્પલાઇન</span>
              </div>
              <span class="call-btn">📞 કૉલ</span>
            </a>
            <a href="tel:18002336666" class="smart-sidebar-call sidebar-call-amber" title="1800-233-6666 પર કૉલ કરો">
              <div class="sidebar-call-info">
                <span class="call-num">1800-233-6666</span>
                <span class="call-desc">GSRTC કંટ્રોલ રૂમ</span>
              </div>
              <span class="call-btn">📞 કૉલ</span>
            </a>
          </div>
        </div>

      </aside>

    </div>
  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
