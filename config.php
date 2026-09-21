<?php
/**
 * ગુજરાત બસ માર્ગદર્શક (Gujarat Bus Margdarshak)
 * Application Configuration
 */

// Error handling
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Directory Paths
define('ROOT_PATH', __DIR__);
define('DATA_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'data');
define('INCLUDES_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'includes');
define('TEMPLATES_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'templates');

// Determine Base URL dynamically
function get_base_url(): string {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    
    // Check script directory
    $scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
    $dir = dirname($scriptName);
    $dir = str_replace('\\', '/', $dir);
    
    // If run via PHP built-in server at root
    if ($dir === '/' || $dir === '.') {
        $base = $protocol . $host;
    } else {
        $base = $protocol . $host . rtrim($dir, '/');
    }
    
    return rtrim($base, '/');
}

define('BASE_URL', get_base_url());

// Site Identity Constants
define('SITE_NAME', 'ગુજરાત બસ માર્ગદર્શક');
define('SITE_NAME_EN', 'Gujarat Bus Margdarshak');
define('SITE_TAGLINE', 'ગુજરાતમાં સલામત, સુગમ અને સચોટ બસ મુસાફરી માટેનું સ્વતંત્ર માર્ગદર્શન');
define('SITE_EMAIL', 'info@gujbusguide.in');

// Legal Non-Affiliation Notice
define('OFFICIAL_DISCLAIMER', 'આ એક સ્વતંત્ર અને બિન-સત્તાવાર માર્ગદર્શક વેબસાઇટ છે. આ પોર્ટલ ગુજરાત રાજ્ય માર્ગ વાહનવ્યવહાર નિગમ (GSRTC) કે કોઈપણ સરકારી વિભાગ સાથે સંલગ્ન, અધિકૃત કે સંચાલિત નથી. મુસાફરોની સગવડ અને માર્ગદર્શન માટે અહીં સામાન્ય માહિતી પૂરી પાડવામાં આવે છે. સત્તાવાર બુકિંગ, તાજા સમયપત્રક અને ભાડાં માટે હંમેશા GSRTC ની સત્તાવાર વેબસાઇટ કે ડેપોનો સંપર્ક કરવો.');

// Timezone
date_default_timezone_set('Asia/Kolkata');

// Load helper functions and modules
require_once INCLUDES_PATH . '/functions.php';
require_once INCLUDES_PATH . '/ads.php';
require_once INCLUDES_PATH . '/schema.php';

