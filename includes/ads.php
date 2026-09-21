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
    
    // Check if alternative ad code (Adsterra / Monetag / PropellerAds) is configured
    $mon = $settings['monetization'] ?? [];
    if (!empty($mon['alternative_ads_enabled']) && !empty($mon['alternative_ad_code'][$position . '_banner'])) {
        echo $mon['alternative_ad_code'][$position . '_banner'];
    } elseif ($isTestMode) {
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

/**
 * Zero-Investment High-Converting Bus Booking Affiliate CTA
 * Generates direct commission per booked ticket (RedBus / AbhiBus / GSRTC)
 */
function render_ticket_booking_cta(string $context = 'general'): void {
    $settings = get_settings();
    $mon = $settings['monetization'] ?? [];
    if (empty($mon['ticket_affiliate_enabled'])) {
        return;
    }

    $redbusUrl = !empty($mon['redbus_affiliate_url']) ? $mon['redbus_affiliate_url'] : 'https://www.redbus.in/';
    $abhibusUrl = !empty($mon['abhibus_affiliate_url']) ? $mon['abhibus_affiliate_url'] : 'https://www.abhibus.com/';
    $gsrtcUrl = !empty($mon['gsrtc_official_url']) ? $mon['gsrtc_official_url'] : 'https://gsrtc.in/';

    ?>
    <section class="ticket-booking-cta-card" aria-label="ઓનલાઇન બસ ટિકિટ બુકિંગ">
      <div class="booking-cta-inner">
        <div class="booking-cta-header">
          <span class="booking-badge">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
            ઓનલાઇન બુકિંગ સુવિધા
          </span>
          <span class="booking-verified">✓ કન્ફર્મ સીટ &bull; ત્વરિત કન્ફર્મેશન</span>
        </div>

        <h3 class="booking-cta-title">ગુજરાત & GSRTC બસ ટિકિટ ઓનલાઇન બુક કરો</h3>
        <p class="booking-cta-desc">ડેપોની લાંબી લાઈનમાં ઊભા રહ્યા વિના ઘરે બેઠા સ્લીપર, વોલ્વો કે એક્સપ્રેસ બસની મનપસંદ સીટ પસંદ કરો અને તાજી ટિકિટ મેળવો.</p>

        <div class="booking-routes-row">
          <span class="route-pill">અમદાવાદ ⇄ રાજકોટ</span>
          <span class="route-pill">સુરત ⇄ ભાવનગર</span>
          <span class="route-pill">વડોદરા ⇄ સોમનાથ</span>
          <span class="route-pill">અમદાવાદ ⇄ ભુજ</span>
        </div>

        <div class="booking-cta-actions">
          <a href="<?= e($redbusUrl) ?>" target="_blank" rel="noopener noreferrer nofollow" class="btn-booking-primary">
            <span>RedBus પર બુક કરો</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
          </a>
          <a href="<?= e($abhibusUrl) ?>" target="_blank" rel="noopener noreferrer nofollow" class="btn-booking-secondary">
            <span>AbhiBus પર બુક કરો</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
          </a>
          <a href="<?= e($gsrtcUrl) ?>" target="_blank" rel="noopener noreferrer nofollow" class="btn-booking-outline">
            <span>GSRTC સત્તાવાર પોર્ટલ</span>
          </a>
        </div>

        <div class="booking-cta-disclaimer">
          <small>* ટિકિટ બુકિંગ સીધા માન્ય પાર્ટનર પોર્ટલ પર સુરક્ષિત રીતે થાય છે. આ વેબસાઇટ કોઈપણ વધારાનો ચાર્જ વસૂલતી નથી.</small>
        </div>
      </div>
    </section>
    <?php
}
