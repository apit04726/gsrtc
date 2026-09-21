<?php
/**
 * Footer Template
 * Trust & Policy Links, Emergency Contact Badges, AdSense Footer Slot & Disclaimer
 */
?>
  <!-- Footer Ad Placement -->
  <div class="container">
    <?php render_ad_slot('footer'); ?>
  </div>

  <!-- Footer Wave Shape Divider -->
  <div class="footer-shape-divider" aria-hidden="true">
    <svg viewBox="0 0 1440 84" fill="none" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <!-- Background Ambient Glow Path -->
      <path opacity="0.25" d="M0,28 C280,68 560,-6 840,42 C1120,90 1320,44 1440,24 L1440,84 L0,84 Z" fill="url(#footerGlowGrad)"></path>
      <!-- Main Wave Path -->
      <path d="M0,38 C200,66 440,14 680,48 C920,82 1180,24 1440,52 L1440,84 L0,84 Z" fill="url(#footerWaveGrad)"></path>
      <!-- Glowing Border Arc -->
      <path d="M0,38 C200,66 440,14 680,48 C920,82 1180,24 1440,52" stroke="url(#footerBorderGrad)" stroke-width="1.5" stroke-opacity="0.6"></path>
      <defs>
        <linearGradient id="footerGlowGrad" x1="0%" y1="0%" x2="100%" y2="0%">
          <stop offset="0%" stop-color="#38bdf8" />
          <stop offset="50%" stop-color="#0284c7" />
          <stop offset="100%" stop-color="#f59e0b" />
        </linearGradient>
        <linearGradient id="footerWaveGrad" x1="0%" y1="0%" x2="100%" y2="0%">
          <stop offset="0%" stop-color="#001a38" />
          <stop offset="45%" stop-color="#00142e" />
          <stop offset="100%" stop-color="#001026" />
        </linearGradient>
        <linearGradient id="footerBorderGrad" x1="0%" y1="0%" x2="100%" y2="0%">
          <stop offset="0%" stop-color="#38bdf8" />
          <stop offset="30%" stop-color="#0284c7" />
          <stop offset="70%" stop-color="#0ea5e9" />
          <stop offset="100%" stop-color="#f59e0b" />
        </linearGradient>
      </defs>
    </svg>
  </div>

  <footer class="site-footer">
    <!-- Ambient Background Geometric Shapes -->
    <div class="footer-bg-shape shape-orb-1" aria-hidden="true"></div>
    <div class="footer-bg-shape shape-orb-2" aria-hidden="true"></div>

    <div class="container footer-content-wrap">
      <div class="footer-grid">
        <!-- Brand Summary -->
        <div class="footer-brand">
          <div class="footer-brand-header">
            <div class="footer-brand-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="18" height="15" rx="3"></rect>
                <path d="M3 11h18"></path>
                <circle cx="7.5" cy="15.5" r="1.5" fill="currentColor"></circle>
                <circle cx="16.5" cy="15.5" r="1.5" fill="currentColor"></circle>
                <path d="M6 18v2"></path>
                <path d="M18 18v2"></path>
              </svg>
            </div>
            <div>
              <h3 class="footer-brand-title"><?= e(SITE_NAME) ?></h3>
              <span class="footer-brand-badge">સ્વતંત્ર મુસાફરી માર્ગદર્શિકા</span>
            </div>
          </div>

          <p class="footer-tagline"><?= e(SITE_TAGLINE) ?></p>
          
          <p class="footer-mission-text">
            અમારો હેતુ ગુજરાતમાં મુસાફરી કરતા સામાન્ય લોકોને સરળ, વિશ્વસનીય અને વ્યવહારુ માહિતી પૂરી પાડી તેમની મુસાફરી સુખદ બનાવવાનો છે.
          </p>

          <div class="footer-trust-pills">
            <span class="footer-pill"><span class="pill-dot"></span> ૧૦૦% નિઃશુલ્ક માર્ગદર્શન</span>
            <span class="footer-pill">જનહિત પ્રવાસી પોર્ટલ</span>
          </div>
        </div>

        <!-- Quick Links -->
        <div class="footer-col">
          <h4 class="col-heading"><span class="heading-shape"></span>ઉપયોગી માર્ગદર્શન</h4>
          <ul class="footer-links">
            <li><a href="<?= url() ?>"><span class="link-chevron">›</span> મુખ્ય પૃષ્ઠ</a></li>
            <li><a href="<?= url('checklist') ?>"><span class="link-chevron">›</span> મુસાફરી પેકિંગ ચેકલિસ્ટ</a></li>
            <li><a href="<?= url('category/before-travel') ?>"><span class="link-chevron">›</span> મુસાફરી પહેલાંની તૈયારી</a></li>
            <li><a href="<?= url('category/luggage-rules') ?>"><span class="link-chevron">›</span> સામાન અને વજન નિયમો</a></li>
            <li><a href="<?= url('category/passenger-safety') ?>"><span class="link-chevron">›</span> મુસાફરોની સુરક્ષા ટિપ્સ</a></li>
            <li><a href="<?= url('category/emergency-info') ?>"><span class="link-chevron">›</span> કટોકટી અને સહાય</a></li>
          </ul>
        </div>

        <!-- Trust & Policies -->
        <div class="footer-col">
          <h4 class="col-heading"><span class="heading-shape"></span>નીતિ અને ટ્રસ્ટ</h4>
          <ul class="footer-links">
            <li><a href="<?= url('about-us') ?>"><span class="link-chevron">›</span> અમારા વિશે (About Us)</a></li>
            <li><a href="<?= url('contact-us') ?>"><span class="link-chevron">›</span> સંપર્ક કરો (Contact Us)</a></li>
            <li><a href="<?= url('privacy-policy') ?>"><span class="link-chevron">›</span> પ્રાઇવસી પોલિસી (Privacy)</a></li>
            <li><a href="<?= url('terms') ?>"><span class="link-chevron">›</span> નિયમો અને શરતો (Terms)</a></li>
            <li><a href="<?= url('disclaimer') ?>"><span class="link-chevron">›</span> કાયદાકીય અસ્વીકરણ (Disclaimer)</a></li>
            <li><a href="<?= url('editorial-policy') ?>"><span class="link-chevron">›</span> સંપાદકીય નીતિ (Editorial)</a></li>
            <li><a href="<?= url('sources-verification') ?>"><span class="link-chevron">›</span> માહિતી સ્ત્રોત અને ચકાસણી</a></li>
          </ul>
        </div>

        <!-- Emergency Numbers (Smart Direct Call Cards) -->
        <div class="footer-col footer-emergency-col">
          <h4 class="col-heading"><span class="heading-shape pulse"></span>તાત્કાલિક સહાય નંબરો</h4>
          <p class="emergency-subtitle">કૉલ કરવા માટે નંબર પર ક્લિક કરો:</p>
          
          <div class="footer-smart-call-list">
            <!-- 108 Ambulance -->
            <a href="tel:108" class="smart-call-card call-theme-red" title="108 પર સીધો કૉલ કરો" aria-label="108 પર કૉલ કરો - ઈમરજન્સી મેડિકલ સહાય">
              <div class="call-card-icon">
                <svg class="phone-vibrate" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
              </div>
              <div class="call-card-content">
                <div class="call-card-title-row">
                  <strong class="call-num">108</strong>
                  <span class="call-tag">મેડિકલ</span>
                </div>
                <span class="call-desc">ઈમરજન્સી મેડિકલ સહાય</span>
              </div>
              <div class="call-card-action">
                <span>કૉલ</span>
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </div>
            </a>

            <!-- 112 National Police / Emergency -->
            <a href="tel:112" class="smart-call-card call-theme-blue" title="112 પર સીધો કૉલ કરો" aria-label="112 પર કૉલ કરો - રાષ્ટ્રીય પોલીસ / ઈમરજન્સી">
              <div class="call-card-icon">
                <svg class="phone-vibrate" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
              </div>
              <div class="call-card-content">
                <div class="call-card-title-row">
                  <strong class="call-num">112</strong>
                  <span class="call-tag">પોલીસ</span>
                </div>
                <span class="call-desc">રાષ્ટ્રીય પોલીસ / ફાયર</span>
              </div>
              <div class="call-card-action">
                <span>કૉલ</span>
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </div>
            </a>

            <!-- 181 Abhayam Women Helpline -->
            <a href="tel:181" class="smart-call-card call-theme-pink" title="181 પર સીધો કૉલ કરો" aria-label="181 પર કૉલ કરો - અભયમ મહિલા હેલ્પલાઇન">
              <div class="call-card-icon">
                <svg class="phone-vibrate" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
              </div>
              <div class="call-card-content">
                <div class="call-card-title-row">
                  <strong class="call-num">181</strong>
                  <span class="call-tag">મહિલા</span>
                </div>
                <span class="call-desc">'અભયમ' મહિલા હેલ્પલાઇન</span>
              </div>
              <div class="call-card-action">
                <span>કૉલ</span>
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </div>
            </a>

            <!-- 1800-233-6666 GSRTC Central -->
            <a href="tel:18002336666" class="smart-call-card call-theme-amber" title="1800-233-6666 પર સીધો કૉલ કરો" aria-label="1800-233-6666 પર કૉલ કરો - GSRTC પૂછપરછ સત્તાવાર">
              <div class="call-card-icon">
                <svg class="phone-vibrate" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
              </div>
              <div class="call-card-content">
                <div class="call-card-title-row">
                  <strong class="call-num">1800-233-6666</strong>
                  <span class="call-tag">ટોલ-ફ્રી</span>
                </div>
                <span class="call-desc">GSRTC સત્તાવાર સેન્ટ્રલ પૂછપરછ</span>
              </div>
              <div class="call-card-action">
                <span>કૉલ</span>
                <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="9 18 15 12 9 6"></polyline></svg>
              </div>
            </a>
          </div>

          <div class="emergency-note">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
            <span>ટિકિટ બુકિંગ કે ચોક્કસ બસ સમય માટે સત્તાવાર ડેપો પૂછપરછનો સંપર્ક કરવો.</span>
          </div>
        </div>
      </div>

      <!-- Legal Disclaimer Box with Unique Shape & Shield Badge -->
      <div class="footer-disclaimer-box">
        <div class="disclaimer-header">
          <div class="disclaimer-badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
            <span>કાયદાકીય સ્પષ્ટતા & અસ્વીકરણ (Official Disclaimer)</span>
          </div>
        </div>
        <p class="disclaimer-text">
          <?= OFFICIAL_DISCLAIMER ?>
        </p>
      </div>

      <!-- Bottom Bar -->
      <div class="footer-bottom">
        <div class="footer-copyright">
          <span>&copy; <?= date('Y') ?> <strong><?= e(SITE_NAME) ?></strong>. સર્વાધિકાર સુરક્ષિત.</span>
          <span class="footer-badge-mini">An Independent Passenger Guide</span>
        </div>
       
      </div>
    </div>
  </footer>

  <!-- Main JavaScript -->
  <script src="<?= url('assets/js/main.js') ?>?v=1.0.0"></script>
</body>
</html>
