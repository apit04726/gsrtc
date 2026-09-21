<?php
/**
 * Controlled Google AdSense Placements
 * Policy compliant: clearly labeled, responsive, zero intrusive overlaps
 */

function render_ad_slot(string $position): void {
    $settings = get_settings();
    if (empty($settings['adsense_enabled'])) {
        return;
    }

    $clientId = $settings['adsense_client_id'] ?? 'ca-pub-XXXXXXXXXXXXXXXX';
    $slotId = $settings['adsense_slots'][$position] ?? '1234567890';
    $isTestMode = !empty($settings['adsense_test_mode']);

    $slotStyles = [
        'header'        => 'min-height: 90px; max-width: 970px; margin: 1rem auto;',
        'in_article'    => 'min-height: 280px; max-width: 728px; margin: 2rem auto;',
        'mid_article'   => 'min-height: 250px; max-width: 728px; margin: 2rem auto;',
        'below_article' => 'min-height: 250px; max-width: 728px; margin: 2.5rem auto 1.5rem auto;',
        'sidebar'       => 'min-height: 300px; max-width: 336px; margin: 1.5rem auto;',
        'footer'        => 'min-height: 90px; max-width: 970px; margin: 2rem auto;',
        'feed'          => 'min-height: 180px; max-width: 100%; margin: 1.5rem 0;'
    ];
    $style = $slotStyles[$position] ?? 'min-height: 100px; margin: 1rem auto;';

    echo '<div class="ad-placement-wrapper ad-pos-' . e($position) . '" style="' . $style . '">';
    echo '  <span class="ad-label">જાહેરાત &bull; ADVERTISEMENT</span>';
    
    if ($isTestMode) {
        echo '  <div class="ad-test-box">';
        echo '    <div class="ad-test-inner">';
        echo '      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>';
        echo '      <span>Google AdSense Slot [' . strtoupper(e($position)) . ']</span>';
        echo '      <small class="ad-slot-detail">Client ID: ' . e($clientId) . ' | Slot: ' . e($slotId) . ' (AdSense Ready)</small>';
        echo '    </div>';
        echo '  </div>';
    } else {
        echo '  <ins class="adsbygoogle"';
        echo '       style="display:block"';
        echo '       data-ad-client="' . e($clientId) . '"';
        echo '       data-ad-slot="' . e($slotId) . '"';
        echo '       data-ad-format="auto"';
        echo '       data-full-width-responsive="true"></ins>';
        echo '  <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>';
    }
    
    echo '</div>';
}
