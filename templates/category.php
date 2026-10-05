<?php
/**
 * Category Listing Template
 * Displays all articles under the selected category
 */

if (!isset($category) || empty($category)) {
    http_response_code(404);
    require_once TEMPLATES_PATH . '/404.php';
    exit;
}

$articles = get_articles('published', $category['id']);
$allCategories = get_categories();

$pageTitle = $category['name'] . " - GSRTC બસ નિયમો & ગાઈડ | GSRTC Info";
$metaDescription = $category['description'] . " GSRTC ગુજરાત એસટી બસ મુસાફરી અંગે 100% સચોટ ગુજરાતી માર્ગદર્શિકા.";
$metaKeywords = $category['name'] . ", GSRTC, " . ($category['name_en'] ?? '') . ", gsrtc rules, એસટી બસ નિયમો, ગુજરાત બસ";
$canonicalUrl = url('category/' . $category['slug']);
$currentRoute = 'category/' . $category['slug'];

// Breadcrumbs
$breadcrumbs = [
    'હોમ' => url(),
    $category['name'] => ''
];

require_once INCLUDES_PATH . '/schema.php';
$schemaJsonLd = generate_breadcrumbs_schema($breadcrumbs) . "\n" . generate_category_schema($category, $articles);

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Category Header Banner -->
<section class="page-hero-banner" aria-label="<?= e($category['name']) ?>">
  <div class="container page-hero-inner">
    <nav class="page-hero-breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= url() ?>">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        હોમ
      </a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current"><?= e($category['name']) ?></span>
    </nav>
    <div class="page-hero-header-row">
      <h1 class="page-hero-title"><?= e($category['name']) ?></h1>
      <span class="page-hero-badge">
        📚 <?= count($articles) ?> માર્ગદર્શક લેખ
      </span>
    </div>
    <p class="page-hero-desc"><?= e($category['description']) ?></p>
  </div>
</section>

<!-- Header Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container">
    <?php if (empty($articles)): ?>
      <div data-animate="fade-up" style="background: var(--bg-surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 3rem; text-align: center;">
        <h3 style="color: var(--primary); margin-bottom: 0.5rem;">આ કેટેગરીમાં ટૂંક સમયમાં નવા લેખો પ્રકાશિત થશે.</h3>
        <p style="color: var(--text-muted); margin-bottom: 1.5rem;">અમારી સંપાદકીય ટીમ મુસાફરો માટે અધિકૃત અને સચોટ માહિતી તૈયાર કરી રહી છે.</p>
        <a href="<?= url() ?>" class="btn btn-primary btn-sm">&larr; મુખ્ય પૃષ્ઠ પર પાછા જાઓ</a>
      </div>
    <?php else: ?>
      <div class="articles-grid" data-stagger="60" data-animate-child="fade-up">
        <?php foreach ($articles as $art): ?>
          <article class="article-card">
            <div class="article-card-body">
              <div class="article-meta">
                <span class="article-category-badge"><?= e($category['name']) ?></span>
                <span>&bull;</span>
                <span><?= e($art['reading_time'] ?? '5 મિનિટ') ?></span>
              </div>
              <h2 class="article-title">
                <a href="<?= url('article/' . $art['slug']) ?>"><?= e($art['title']) ?></a>
              </h2>
              <p class="article-excerpt"><?= e($art['excerpt']) ?></p>
              <div class="article-footer">
                <span style="font-size:0.8rem; color:var(--text-muted);">અપડેટ: <?= date('d M Y', strtotime($art['updated_at'] ?? $art['published_at'])) ?></span>
                <a href="<?= url('article/' . $art['slug']) ?>" class="read-more-link">
                  સંપૂર્ણ વાંચો <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- In-Content Ad Placement -->
    <?php render_ad_slot('in_article'); ?>

    <?php
      // Calculate article counts for other categories
      $allArticlesForCount = get_articles('published');
      $categoryCounts = [];
      foreach ($allArticlesForCount as $aItem) {
          $cId = $aItem['category_id'] ?? '';
          $categoryCounts[$cId] = ($categoryCounts[$cId] ?? 0) + 1;
      }
    ?>

    <!-- Other Categories Quick Links (2-Column Responsive Grid) -->
    <section class="other-categories-box" data-animate="fade-up" aria-label="અન્ય કેટેગરીઝ">
      <div class="other-categories-header">
        <div class="other-categories-title-wrap">
          <div class="other-categories-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
              <rect x="3" y="3" width="7" height="7" rx="1.5"></rect>
              <rect x="14" y="3" width="7" height="7" rx="1.5"></rect>
              <rect x="14" y="14" width="7" height="7" rx="1.5"></rect>
              <rect x="3" y="14" width="7" height="7" rx="1.5"></rect>
            </svg>
          </div>
          <div>
            <h3 class="other-categories-title">અન્ય મહત્વપૂર્ણ કેટેગરીઝ</h3>
            <p class="other-categories-desc">તમારી મુસાફરીને લગતી અન્ય વિષયવાર સચોટ માહિતી મેળવો</p>
          </div>
        </div>
        <a href="<?= url() ?>#categories" class="other-categories-view-all">
          <span>બધી કેટેગરીઝ</span>
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
      </div>

      <div class="other-categories-grid" data-stagger="40" data-animate-child="fade-up">
        <?php foreach ($allCategories as $c): ?>
          <?php if ($c['slug'] !== $category['slug']): ?>
            <?php 
              $cCount = $categoryCounts[$c['id']] ?? 0;
              $cIcon = $c['icon'] ?? 'bus';
              $cColor = $c['color'] ?? '#0d6efd';
            ?>
            <a href="<?= url('category/' . $c['slug']) ?>" class="other-cat-card" title="<?= e($c['name']) ?>">
              <div class="other-cat-card-left">
                <span class="other-cat-icon-badge" style="background-color: <?= e($cColor) ?>18; color: <?= e($cColor) ?>;">
                  <?= get_category_svg_icon($cIcon, 18) ?>
                </span>
                <div class="other-cat-info">
                  <span class="other-cat-title"><?= e($c['name']) ?></span>
                  <?php if (!empty($c['name_en'])): ?>
                    <span class="other-cat-sub"><?= e($c['name_en']) ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="other-cat-card-right">
                <span class="other-cat-count-badge"><?= $cCount ?> લેખ</span>
                <svg class="other-cat-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </div>
            </a>
          <?php endif; ?>
        <?php endforeach; ?>

        <!-- 12th Card to balance the 2-column grid into 6 x 2 -->
        <a href="<?= url() ?>#categories" class="other-cat-card other-cat-card-all" title="બધી કેટેગરીઝ એક્સપ્લોર કરો">
          <div class="other-cat-card-left">
            <span class="other-cat-icon-badge" style="background-color: #0d6efd18; color: #0d6efd;">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                <rect x="3" y="3" width="7" height="7" rx="1.5"></rect>
                <rect x="14" y="3" width="7" height="7" rx="1.5"></rect>
                <rect x="14" y="14" width="7" height="7" rx="1.5"></rect>
                <rect x="3" y="14" width="7" height="7" rx="1.5"></rect>
              </svg>
            </span>
            <div class="other-cat-info">
              <span class="other-cat-title" style="color: #0d6efd;">બધા વિષયો જુઓ</span>
              <span class="other-cat-sub">મુખ્ય હોમ પેજ પર ૧૨ કેટેગરીઝ</span>
            </div>
          </div>
          <div class="other-cat-card-right">
            <span class="other-cat-count-badge other-cat-badge-primary">બધા જુઓ</span>
            <svg class="other-cat-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </div>
        </a>
      </div>
    </section>
  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
