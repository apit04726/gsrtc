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

$pageTitle = $category['name'] . " - GSRTC બસ મુસાફરી નિયમો અને માર્ગદર્શન | " . SITE_NAME;
$metaDescription = $category['description'] . " GSRTC ગુજરાત એસટી બસ મુસાફરી અંગે સંપૂર્ણ ગુજરાતી માર્ગદર્શિકા.";
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
<section style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color:#fff; padding: 2.5rem 0;">
  <div class="container">
    <nav class="breadcrumbs" style="color: #cbd5e1; margin-bottom: 0.75rem;" aria-label="Breadcrumb">
      <a href="<?= url() ?>" style="color: #cbd5e1;">હોમ</a>
      <span>/</span>
      <span style="color: #fed7aa; font-weight: 600;"><?= e($category['name']) ?></span>
    </nav>
    <div style="display:flex; align-items:center; gap: 1rem; flex-wrap: wrap;">
      <h1 style="color:#fff; font-size: 2rem; margin: 0;"><?= e($category['name']) ?></h1>
      <span style="background: rgba(255,255,255,0.2); padding: 0.2rem 0.75rem; border-radius: var(--radius-full); font-size: 0.85rem; font-weight: 700;">
        <?= count($articles) ?> લેખ
      </span>
    </div>
    <p style="color: #cbd5e1; font-size: 1.05rem; margin-top: 0.5rem; max-width: 720px;"><?= e($category['description']) ?></p>
  </div>
</section>

<!-- Header Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container">
    <?php if (empty($articles)): ?>
      <div style="background: var(--bg-surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 3rem; text-align: center;">
        <h3 style="color: var(--primary); margin-bottom: 0.5rem;">આ કેટેગરીમાં ટૂંક સમયમાં નવા લેખો પ્રકાશિત થશે.</h3>
        <p style="color: var(--text-muted); margin-bottom: 1.5rem;">અમારી સંપાદકીય ટીમ મુસાફરો માટે અધિકૃત અને સચોટ માહિતી તૈયાર કરી રહી છે.</p>
        <a href="<?= url() ?>" class="btn btn-primary btn-sm">&larr; મુખ્ય પૃષ્ઠ પર પાછા જાઓ</a>
      </div>
    <?php else: ?>
      <div class="articles-grid">
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
    <section class="other-categories-box" aria-label="અન્ય કેટેગરીઝ">
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

      <div class="other-categories-grid">
        <?php foreach ($allCategories as $c): ?>
          <?php if ($c['slug'] !== $category['slug']): ?>
            <?php $cCount = $categoryCounts[$c['id']] ?? 0; ?>
            <a href="<?= url('category/' . $c['slug']) ?>" class="other-cat-card" title="<?= e($c['name']) ?>">
              <div class="other-cat-card-left">
                <span class="other-cat-badge-dot" style="background-color: <?= e($c['color'] ?? '#0d6efd') ?>;"></span>
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
            <span class="other-cat-badge-dot" style="background-color: #0d6efd;"></span>
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
