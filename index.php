<?php
/**
 * ગુજરાત બસ માર્ગદર્શક (Gujarat Bus Margdarshak)
 * Front-Controller & Router
 */

require_once __DIR__ . '/config.php';

// Parse incoming request path
$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';

// Remove query string
$path = parse_url($requestUri, PHP_URL_PATH);

// Calculate base directory from SCRIPT_NAME (e.g., /web/gsrtc)
$baseDir = dirname($scriptName);
$baseDir = str_replace('\\', '/', $baseDir);

if ($baseDir !== '/' && $baseDir !== '.') {
    if (str_starts_with($path, $baseDir)) {
        $path = substr($path, strlen($baseDir));
    }
}

$path = trim($path, '/');

// Check for explicit query route param fallback
if (isset($_GET['route'])) {
    $path = trim($_GET['route'], '/');
}

// Route matching
if ($path === '' || $path === 'index.php') {
    require_once TEMPLATES_PATH . '/home.php';
    exit;
}

if ($path === 'sitemap.xml') {
    require_once ROOT_PATH . '/sitemap.php';
    exit;
}

if ($path === 'robots.txt') {
    header('Content-Type: text/plain; charset=UTF-8');
    echo "User-agent: *\n";
    echo "Allow: /\n";
    echo "Disallow: /data/\n\n";
    echo "User-agent: Googlebot\n";
    echo "Allow: /\n\n";
    echo "User-agent: Googlebot-Image\n";
    echo "Allow: /\n\n";
    echo "User-agent: Mediapartners-Google\n";
    echo "Allow: /\n\n";
    echo "User-agent: AdsBot-Google\n";
    echo "Allow: /\n\n";
    echo "Sitemap: " . url('sitemap.xml') . "\n";
    exit;
}

// Google Search Console HTML verification file support
if (preg_match('~^google([a-z0-9_-]+)\.html$~i', $path)) {
    $verificationFile = ROOT_PATH . '/' . $path;
    if (file_exists($verificationFile)) {
        header('Content-Type: text/html; charset=UTF-8');
        readfile($verificationFile);
        exit;
    }
}

if ($path === 'ads.txt') {
    header('Content-Type: text/plain; charset=UTF-8');
    $settings = get_settings();
    $clientId = $settings['adsense_client_id'] ?? 'ca-pub-XXXXXXXXXXXXXXXX';
    $pubId = str_replace('ca-', '', $clientId);
    echo "google.com, {$pubId}, DIRECT, f08c47fec0942fa0\n";
    exit;
}

if ($path === 'checklist') {
    require_once TEMPLATES_PATH . '/checklist.php';
    exit;
}

if ($path === 'search') {
    require_once TEMPLATES_PATH . '/search.php';
    exit;
}

if ($path === 'contact-us') {
    require_once TEMPLATES_PATH . '/contact.php';
    exit;
}

if ($path === 'privacy-policy') {
    require_once TEMPLATES_PATH . '/privacy.php';
    exit;
}

if ($path === 'terms') {
    require_once TEMPLATES_PATH . '/terms.php';
    exit;
}

// Static trust pages
$staticPages = ['about-us', 'disclaimer', 'editorial-policy', 'sources-verification'];
if (in_array($path, $staticPages, true)) {
    $pageKey = $path;
    require_once TEMPLATES_PATH . '/static.php';
    exit;
}

// Category routes: category/{slug}
if (preg_match('~^category/([a-z0-9-]+)$~i', $path, $matches)) {
    $slug = $matches[1];
    $category = get_category_by_slug($slug);
    if ($category) {
        require_once TEMPLATES_PATH . '/category.php';
        exit;
    }
}

// Article routes: article/{slug}
if (preg_match('~^article/([a-z0-9-]+)$~i', $path, $matches)) {
    $slug = $matches[1];
    $article = get_article_by_slug($slug);
    if ($article) {
        require_once TEMPLATES_PATH . '/article.php';
        exit;
    }
}

// Fallback: 404 Not Found
http_response_code(404);
require_once TEMPLATES_PATH . '/404.php';
