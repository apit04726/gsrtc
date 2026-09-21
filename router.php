<?php
/**
 * CLI Router for PHP Built-in Server
 * Usage: php -S localhost:8000 router.php
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Serve static assets directly
if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

// Route sitemap.xml
if ($uri === '/sitemap.xml') {
    require __DIR__ . '/sitemap.php';
    return true;
}

// Forward to front-controller
require __DIR__ . '/index.php';
