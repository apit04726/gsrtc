<?php
/**
 * HTML Sitemap Page
 * Comprehensive index of all GSRTC guides, categories, and utilities for users & search crawlers
 */

$categories = get_categories();
$allArticles = get_articles('published');

$pageTitle = "સાઇટમેપ - તમામ GSRTC માર્ગદર્શિકા અને લેખોની યાદી | " . SITE_NAME;
$metaDescription = "GSRTC ગુજરાત એસટી બસ માર્ગદર્શકના તમામ લેખો, કેટેગરીઝ, સમયપત્રક, લગેજ નિયમો અને મુસાફરી ચેકલિસ્ટનું સંપૂર્ણ ઇન્ડેક્સ.";
$metaKeywords = "GSRTC sitemap, સાઇટમેપ, એસટી બસ લેખો, GSRTC guide index, ગુજરાત બસ માર્ગદર્શક ઇન્ડેક્સ";
$canonicalUrl = url('sitemap');
$currentRoute = 'sitemap';

// Breadcrumbs
$breadcrumbs = [
    'હોમ' => url(),
    'સાઇટમેપ' => ''
];

require_once INCLUDES_PATH . '/schema.php';
$schemaJsonLd = generate_breadcrumbs_schema($breadcrumbs);

require_once INCLUDES_PATH . '/header.php';
?>

<div class="container" style="margin-top: 1.5rem; margin-bottom: 3rem;">
  <!-- Breadcrumbs -->
  <nav class="breadcrumbs" aria-label="Breadcrumb">
    <a href="<?= url() ?>">હોમ</a>
    <span>/</span>
    <span style="color: var(--primary); font-weight:600;">સાઇટમેપ (HTML Sitemap)</span>
  </nav>

  <div class="sitemap-hero" data-animate="fade-down" style="background: linear-gradient(135deg, #015fc9 0%, #0284c7 100%); color: #fff; padding: 2rem; border-radius: var(--radius-lg); margin-bottom: 2rem; box-shadow: var(--shadow-md);">
    <h1 style="color: #fff; font-size: 1.85rem; margin-bottom: 0.5rem;">સંપૂર્ણ સાઇટમેપ (Website Sitemap)</h1>
    <p style="color: #e0f2fe; margin: 0; font-size: 1rem; max-width: 800px;">
      GSRTC ગુજરાત એસટી બસ માર્ગદર્શક પોર્ટલ પર ઉપલબ્ધ તમામ લેખો, મુસાફરી નિયમો, કેટેગરી અને સાધનોની વિગતવાર યાદી. કોઈપણ પેજ પર જવા માટે શીર્ષક પર ક્લિક કરો.
    </p>
  </div>

  <!-- Main Sections Grid -->
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem; margin-bottom: 2.5rem;">
    <!-- Key Tools & Pages -->
    <div data-animate="fade-right" style="background: #fff; border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 1.5rem; box-shadow: var(--shadow-sm);">
      <h2 style="font-size: 1.2rem; color: var(--primary); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
        <span>⭐</span> મુખ્ય પૃષ્ઠો અને સાધનો
      </h2>
      <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem;">
        <li><a href="<?= url() ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> મુખ્ય પૃષ્ઠ (Home Page)</a></li>
        <li><a href="<?= url('checklist') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> મુસાફરી પેકિંગ ચેકલિસ્ટ (Smart Checklist)</a></li>
        <li><a href="<?= url('search') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> સર્ચ પોર્ટલ (Search & Archive)</a></li>
        <li><a href="<?= url('feed.xml') ?>" target="_blank" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> RSS Feed (XML)</a></li>
        <li><a href="<?= url('sitemap.xml') ?>" target="_blank" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> Google XML Sitemap</a></li>
      </ul>
    </div>

    <!-- Trust & Policies -->
    <div data-animate="fade-left" style="background: #fff; border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 1.5rem; box-shadow: var(--shadow-sm);">
      <h2 style="font-size: 1.2rem; color: var(--primary); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
        <span>🛡️</span> નીતિ અને કાયદાકીય પાનાં
      </h2>
      <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem;">
        <li><a href="<?= url('about-us') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> અમારા વિશે (About Us)</a></li>
        <li><a href="<?= url('contact-us') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> સંપર્ક કરો (Contact Us)</a></li>
        <li><a href="<?= url('privacy-policy') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> પ્રાઇવસી પોલિસી (Privacy Policy)</a></li>
        <li><a href="<?= url('terms') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> નિયમો અને શરતો (Terms of Use)</a></li>
        <li><a href="<?= url('disclaimer') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> કાયદાકીય અસ્વીકરણ (Legal Disclaimer)</a></li>
        <li><a href="<?= url('editorial-policy') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> સંપાદકીય નીતિ (Editorial Policy)</a></li>
        <li><a href="<?= url('sources-verification') ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 600; display: flex; align-items: center; gap: 0.5rem;"><span style="color: var(--primary);">›</span> માહિતી સ્ત્રોત અને ચકાસણી</a></li>
      </ul>
    </div>
  </div>

  <!-- Category & Articles Silo List -->
  <h2 data-animate="fade-up" style="font-size: 1.5rem; color: var(--text-dark); margin-bottom: 1.5rem; border-bottom: 2px solid var(--border-color); padding-bottom: 0.5rem;">
    શ્રેણીવાર તમામ માર્ગદર્શિકા લેખો (All Guides by Category)
  </h2>

  <?php foreach ($categories as $cat): 
    $catArticles = get_articles('published', $cat['id']);
  ?>
  <div data-animate="fade-up" style="background: #fff; border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: var(--shadow-sm);">
    <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--border-color); padding-bottom: 0.75rem; margin-bottom: 1rem; flex-wrap: wrap; gap: 0.5rem;">
      <h3 style="margin: 0; font-size: 1.25rem;">
        <a href="<?= url('category/' . $cat['slug']) ?>" style="color: var(--primary); text-decoration: none;">
          <?= e($cat['name']) ?> (<?= count($catArticles) ?> લેખો)
        </a>
      </h3>
      <a href="<?= url('category/' . $cat['slug']) ?>" style="font-size: 0.85rem; color: var(--primary); font-weight: 600; text-decoration: none;">
        શ્રેણી જુઓ &rarr;
      </a>
    </div>

    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 1rem;">
      <?= e($cat['description']) ?>
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 0.75rem;">
      <?php foreach ($catArticles as $art): ?>
        <div style="padding: 0.5rem 0.75rem; background: var(--bg-light, #f8fafc); border-radius: var(--radius-sm); border: 1px solid #e2e8f0;">
          <a href="<?= url('article/' . $art['slug']) ?>" style="color: var(--text-dark); text-decoration: none; font-weight: 500; font-size: 0.95rem; line-height: 1.4; display: block;">
            <span style="color: var(--primary); font-weight: 700; margin-right: 0.35rem;">•</span> <?= e($art['title']) ?>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endforeach; ?>

</div>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
