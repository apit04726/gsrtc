<?php
/**
 * RSS 2.0 Feed Generator for Search Engines & Readers
 * Allows Googlebot & Bingbot to discover and index new articles immediately
 */

require_once __DIR__ . '/config.php';

header('Content-Type: application/rss+xml; charset=UTF-8');

$articles = get_articles('published');
$settings = get_settings();

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
  <channel>
    <title><?= htmlspecialchars(SITE_NAME . ' | ' . SITE_TAGLINE, ENT_XML1, 'UTF-8') ?></title>
    <link><?= url() ?></link>
    <description><?= htmlspecialchars($settings['site_description'] ?? SITE_TAGLINE, ENT_XML1, 'UTF-8') ?></description>
    <language>gu</language>
    <lastBuildDate><?= date(DATE_RSS) ?></lastBuildDate>
    <atom:link href="<?= url('feed.xml') ?>" rel="self" type="application/rss+xml" />
    <image>
      <url><?= url('assets/images/favicon-512x512.png') ?></url>
      <title><?= htmlspecialchars(SITE_NAME, ENT_XML1, 'UTF-8') ?></title>
      <link><?= url() ?></link>
    </image>
    <?php foreach ($articles as $art): 
      $category = get_category_by_slug($art['category_id'] ?? '');
      $pubDate = date(DATE_RSS, strtotime($art['updated_at'] ?? $art['published_at'] ?? 'now'));
    ?>
    <item>
      <title><?= htmlspecialchars($art['title'], ENT_XML1, 'UTF-8') ?></title>
      <link><?= url('article/' . $art['slug']) ?></link>
      <guid isPermaLink="true"><?= url('article/' . $art['slug']) ?></guid>
      <pubDate><?= $pubDate ?></pubDate>
      <?php if ($category): ?>
        <category><?= htmlspecialchars($category['name'], ENT_XML1, 'UTF-8') ?></category>
      <?php endif; ?>
      <description><![CDATA[<?= $art['excerpt'] ?? $art['title'] ?>]]></description>
    </item>
    <?php endforeach; ?>
  </channel>
</rss>
