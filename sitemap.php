<?php
/**
 * Dynamic XML Sitemap Generator
 * Valid XML for Google Search Console & Bing Webmaster Tools
 */

require_once __DIR__ . '/config.php';

header('Content-Type: application/xml; charset=UTF-8');

$categories = get_categories();
$articles = get_articles('published');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
  <!-- Home Page -->
  <url>
    <loc><?= url() ?></loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
    <image:image>
      <image:loc><?= url('assets/images/og-share.png') ?></image:loc>
      <image:title><?= htmlspecialchars(SITE_NAME . ' - GSRTC બસ માર્ગદર્શિકા', ENT_XML1, 'UTF-8') ?></image:title>
    </image:image>
  </url>

  <!-- Interactive Checklist Tool -->
  <url>
    <loc><?= url('checklist') ?></loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
  </url>

  <!-- Search Portal -->
  <url>
    <loc><?= url('search') ?></loc>
    <lastmod><?= date('Y-m-d') ?></lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
  </url>

  <!-- Categories -->
  <?php foreach ($categories as $cat): ?>
    <url>
      <loc><?= url('category/' . $cat['slug']) ?></loc>
      <lastmod><?= date('Y-m-d') ?></lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.85</priority>
    </url>
  <?php endforeach; ?>

  <!-- Articles (All 36 Official Guides with Image Indexing) -->
  <?php foreach ($articles as $art): ?>
    <url>
      <loc><?= url('article/' . $art['slug']) ?></loc>
      <lastmod><?= date('Y-m-d', strtotime($art['updated_at'] ?? $art['published_at'] ?? date('Y-m-d'))) ?></lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.9</priority>
      <image:image>
        <image:loc><?= url('assets/images/og-share.png') ?></image:loc>
        <image:title><?= htmlspecialchars($art['title'], ENT_XML1, 'UTF-8') ?></image:title>
        <image:caption><?= htmlspecialchars(mb_strimwidth($art['excerpt'] ?? $art['title'], 0, 150, '...'), ENT_XML1, 'UTF-8') ?></image:caption>
      </image:image>
    </url>
  <?php endforeach; ?>

  <!-- Trust & Policy Pages -->
  <url>
    <loc><?= url('about-us') ?></loc>
    <lastmod>2026-09-18</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
  </url>
  <url>
    <loc><?= url('contact-us') ?></loc>
    <lastmod>2026-09-18</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
  </url>
  <url>
    <loc><?= url('privacy-policy') ?></loc>
    <lastmod>2026-09-18</lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.4</priority>
  </url>
  <url>
    <loc><?= url('terms') ?></loc>
    <lastmod>2026-09-18</lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.4</priority>
  </url>
  <url>
    <loc><?= url('disclaimer') ?></loc>
    <lastmod>2026-09-18</lastmod>
    <changefreq>yearly</changefreq>
    <priority>0.5</priority>
  </url>
  <url>
    <loc><?= url('editorial-policy') ?></loc>
    <lastmod>2026-09-18</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
  </url>
  <url>
    <loc><?= url('sources-verification') ?></loc>
    <lastmod>2026-09-18</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
  </url>
</urlset>
