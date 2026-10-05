<?php
/**
 * Terms and Conditions Template
 */

$pageTitle = "નિયમો અને શરતો (Terms and Conditions) | GSRTC Info";
$metaDescription = "GSRTC Info ગુજરાત બસ માર્ગદર્શક વેબસાઇટના ઉપયોગ માટેના નિયમો, બૌદ્ધિક સંપત્તિ અને વપરાશકર્તા શરતો.";
$canonicalUrl = url('terms');
$currentRoute = 'terms';

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Terms Header -->
<section class="page-hero-banner" aria-label="Terms of Use">
  <div class="container page-hero-inner">
    <nav class="page-hero-breadcrumbs" aria-label="Breadcrumb">
      <a href="<?= url() ?>">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
        હોમ
      </a>
      <span class="breadcrumb-sep">/</span>
      <span class="breadcrumb-current">નિયમો અને શરતો</span>
    </nav>
    <div class="page-hero-header-row">
      <h1 class="page-hero-title">નિયમો અને શરતો (Terms &amp; Conditions)</h1>
      <span class="page-hero-badge">
        📜 વપરાશ નિયમો
      </span>
    </div>
    <p class="page-hero-desc">આ વેબસાઇટનો ઉપયોગ કરતા પહેલાં તમામ નિયમો અને અસ્વીકરણો ધ્યાનથી વાંચો • છેલ્લો સુધારો: સપ્ટેમ્બર 2026</p>
  </div>
</section>

<!-- Header Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container" style="max-width: 860px;">
    <article class="article-main-content" data-animate="fade-up">
      <div class="article-body-text">
        <p><strong>ગુજરાત બસ માર્ગદર્શક</strong> વેબસાઇટની મુલાકાત લેવા બદલ આપનો આભાર. આ વેબસાઇટનો ઉપયોગ કરીને તમે નીચે જણાવેલ નિયમો અને શરતો સાથે સંપૂર્ણપણે સહમત થાઓ છો:</p>

        <h2>૧. શૈક્ષણિક અને માહિતીપ્રદ ઉપયોગ</h2>
        <p>આ વેબસાઇટ પર પૂરી પાડવામાં આવેલી તમામ સામગ્રી માત્ર વ્યક્તિગત, બિન-વ્યવસાયિક અને માહિતીપ્રદ હેતુઓ માટે છે. વપરાશકર્તાઓએ ધ્યાનમાં રાખવું કે આ વેબસાઇટ કોઈ ટિકિટિંગ એજન્ટ કે પરિવહન નિગમ નથી.</p>

        <h2>૨. કન્ટેન્ટની પુનઃપ્રકાશિત મનાઈ (Copyright)</h2>
        <p>આ વેબસાઇટ પરના લેખો, ચેકલિસ્ટ, માળખું અને લખાણ મૂળ સ્વરૂપે તૈયાર કરવામાં આવેલ છે. પૂર્વ લેખિત પરવાનગી વિના આ સામગ્રીને અન્ય કોઈ વેબસાઇટ, અખબાર કે ડિજિટલ માધ્યમ પર કોપી-પેસ્ટ કે પુનઃપ્રકાશિત કરવા પર સખત મનાઈ છે.</p>

        <h2>૩. બાહ્ય લિંક્સ</h2>
        <p>અમારી વેબસાઇટ પર સત્તાવાર સરકારી પોર્ટલ કે હેલ્પલાઇનના સંદર્ભો હોઈ શકે છે. આ તૃતીય-પક્ષ લિંક્સની સામગ્રી કે તેની કાર્યક્ષમતા પર અમારું કોઈ નિયંત્રણ નથી.</p>

        <h2>૪. સુધારા અને ફેરફારનો અધિકાર</h2>
        <p>અમે કોઈપણ પૂર્વસૂચના વિના આ નિયમો અને શરતોમાં કોઈપણ સમયે ફેરફાર કરવાનો અધિકાર અનામત રાખીએ છીએ.</p>

        <h2>૫. અધિકારક્ષેત્ર (Jurisdiction)</h2>
        <p>આ શરતો અને વેબસાઇટના ઉપયોગ સંબંધિત કોઈપણ વિવાદ ભારત સરકારના કાયદા અને ગુજરાત રાજ્યના ન્યાયક્ષેત્રને આધીન રહેશે.</p>
      </div>
    </article>

    <!-- In-Content Ad Placement -->
    <?php render_ad_slot('in_article'); ?>
  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
