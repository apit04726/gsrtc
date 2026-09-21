<?php
/**
 * Terms and Conditions Template
 */

$pageTitle = "નિયમો અને શરતો (Terms and Conditions) | " . SITE_NAME;
$metaDescription = "ગુજરાત બસ માર્ગદર્શક વેબસાઇટના ઉપયોગ માટેના નિયમો, બૌદ્ધિક સંપત્તિ અને વપરાશકર્તા શરતો.";
$canonicalUrl = url('terms');
$currentRoute = 'terms';

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Terms Header -->
<section style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color:#fff; padding: 2.5rem 0;">
  <div class="container">
    <nav class="breadcrumbs" style="color: #cbd5e1; margin-bottom: 0.75rem;" aria-label="Breadcrumb">
      <a href="<?= url() ?>" style="color: #cbd5e1;">હોમ</a>
      <span>/</span>
      <span style="color: #fed7aa; font-weight: 600;">નિયમો અને શરતો</span>
    </nav>
    <h1 style="color:#fff; font-size: 2.2rem; margin: 0;">નિયમો અને શરતો (Terms & Conditions)</h1>
    <p style="color: #cbd5e1; margin-top: 0.5rem; font-size: 0.95rem;">છેલ્લો સુધારો: સપ્ટેમ્બર 2026</p>
  </div>
</section>

<!-- Header Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container" style="max-width: 860px;">
    <article class="article-main-content">
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
