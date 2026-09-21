<?php
/**
 * Static Trust Pages Template
 * Covers: About Us, Disclaimer, Editorial Policy, Sources & Verification
 */

$pageKey = $pageKey ?? 'about-us';

$pagesContent = [
    'about-us' => [
        'title' => 'અમારા વિશે (About Us)',
        'meta_title' => 'અમારા વિશે | ' . SITE_NAME,
        'meta_desc' => 'ગુજરાત બસ માર્ગદર્શક વિશે માહિતી. અમારો ઉદ્દેશ્ય મુસાફરોને સાચી, નિષ્પક્ષ અને સરળ ગુજરાતી માહિતી આપવાનો છે.',
        'content' => <<<HTML
          <h2>અમારો પરિચય અને ઉદ્દેશ્ય</h2>
          <p><strong>ગુજરાત બસ માર્ગદર્શક (Gujarat Bus Margdarshak)</strong> એ ગુજરાતમાં બસ મુસાફરી કરતા લાખો સામાન્ય નાગરિકો, વિદ્યાર્થીઓ, વડીલો અને મહિલાઓ માટે તૈયાર કરાયેલ એક સ્વતંત્ર માહિતી પોર્ટલ છે.</p>
          <p>આજના ડિજિટલ યુગમાં ઇન્ટરનેટ પર ઘણી બધી ભ્રામક અને ગેરમાર્ગે દોરતી વિગતો જોવા મળે છે. અમારો મુખ્ય ઉદ્દેશ્ય કોઈ ખોટા દાવા કર્યા વિના સામાન્ય મુસાફરને પ્રવાસ પહેલાં અને પ્રવાસ દરમિયાન પડતી મુશ્કેલીઓનું વાસ્તવિક માર્ગદર્શન પૂરું પાડવાનો છે.</p>
          
          <h2>અમે શું કામ કરીએ છીએ?</h2>
          <ul>
            <li>મુસાફરોને સામાન નિયમો (Luggage Rules), ટિકિટ બુકિંગ અને અનામત બેઠકો અંગે સાચી માહિતી આપવી.</li>
            <li>બાળકો, વડીલો અને મહિલાઓ માટે પ્રવાસ દરમિયાન રાખવાની સલામતીનું માર્ગદર્શન આપવું.</li>
            <li>ચોમાસામાં પૂર કે રસ્તા ડાયવર્ઝન વખતે લેવાની સાવચેતીઓથી વાકેફ કરવા.</li>
            <li>કટોકટીમાં સરકારી હેલ્પલાઇન (108, 112, 181) નો ઝડપી સંપર્ક કેવી રીતે કરવો તે સમજાવવું.</li>
          </ul>

          <div style="background: #fffbeb; border-left: 4px solid #f59e0b; padding: 1.25rem; margin: 2rem 0; border-radius: 4px;">
            <h3 style="color: #92400e; margin-top: 0; font-size: 1.1rem;">સંપૂર્ણ બિન-સત્તાવાર અને સ્વતંત્ર પ્લેટફોર્મ</h3>
            <p style="color: #78350f; margin: 0; font-size: 0.95rem;">
              આ વેબસાઇટ ગુજરાત રાજ્ય માર્ગ વાહનવ્યવહાર નિગમ (GSRTC) કે કોઈપણ સરકારી પરિવહન સત્તામંડળ સાથે સંલગ્ન નથી. અમે ટિકિટનું બુકિંગ કરતા નથી કે કોઈપણ પ્રકારની ફી વસૂલતા નથી.
            </p>
          </div>
HTML
    ],

    'disclaimer' => [
        'title' => 'કાયદાકીય અસ્વીકરણ (Legal Disclaimer)',
        'meta_title' => 'કાયદાકીય અસ્વીકરણ | ' . SITE_NAME,
        'meta_desc' => 'ગુજરાત બસ માર્ગદર્શકનું સત્તાવાર અસ્વીકરણ. આ GSRTC ની સત્તાવાર વેબસાઇટ નથી અને માત્ર સામાન્ય માહિતી માટે છે.',
        'content' => <<<HTML
          <h2>૧. બિન-સત્તાવાર માહિતીનો દરજ્જો</h2>
          <p><strong>'ગુજરાત બસ માર્ગદર્શક' (www.gujbusguide.in)</strong> એ એક સ્વતંત્ર માહિતીપ્રદ પોર્ટલ છે. આ વેબસાઇટ ગુજરાત રાજ્ય માર્ગ વાહનવ્યવહાર નિગમ (GSRTC), ગુજરાત સરકાર કે કેન્દ્ર સરકારના પરિવહન મંત્રાલય સાથે કોઈપણ પ્રકારનો સત્તાવાર સંબંધ કે ભાગીદારી ધરાવતી નથી.</p>

          <h2>૨. ટ્રેડમાર્ક અને બૌદ્ધિક સંપત્તિ</h2>
          <p>'GSRTC', તેનો લોગો અને સંબંધિત બ્રાન્ડિંગ ગુજરાત રાજ્ય માર્ગ વાહન વ્યવહાર નિગમની માલિકી છે. આ વેબસાઇટ પર વપરાયેલા તમામ સંદર્ભો માત્ર મુસાફરોની સરળતા અને જાહેર સેવા સંદર્ભ (Fair Use) માટે ઉપયોગમાં લેવાયેલ છે. અમે કોઈપણ સરકારી ટ્રેડમાર્ક કે અધિકૃત સીલનો દાવો કરતા નથી.</p>

          <h2>૩. માહિતીની સચોટતા અને ફેરફારો</h2>
          <p>આ વેબસાઇટ પર પ્રકાશિત લેખો, નિયમો અને ચેકલિસ્ટ માત્ર સામાન્ય જાગૃતિ અને માર્ગદર્શન માટે છે. એસટી નિગમ અને પરિવહન વિભાગ દ્વારા ભાડાં, સમયપત્રક, લગેજ ચાર્જ કે રૂટ કોઈપણ પૂર્વસૂચના વિના બદલાઈ શકે છે. મુસાફરોને વિનંતી છે કે કોઈપણ અંતિમ નિર્ણય લેતા પહેલા સત્તાવાર ડેપો કાઉન્ટર અથવા સત્તાવાર પોર્ટલ પરથી માહિતીની પુષ્ટિ કરી લેવી.</p>

          <h2>૪. જવાબદારી મર્યાદા</h2>
          <p>આ વેબસાઇટ પર આપેલી માહિતીના આધારે કોઈ મુસાફરને થયેલ કોઈપણ પ્રકારના આર્થિક નુકસાન, બસ ચૂકી જવા, ટિકિટ રદ થવા કે અસુવિધા માટે આ વેબસાઇટ કે તેની સંપાદકીય ટીમ કોઈપણ રીતે જવાબદાર રહેશે નહીં.</p>
HTML
    ],

    'editorial-policy' => [
        'title' => 'સંપાદકીય અને કન્ટેન્ટ નીતિ (Editorial Policy)',
        'meta_title' => 'સંપાદકીય નીતિ | ' . SITE_NAME,
        'meta_desc' => 'અમારી સામગ્રી કેવી રીતે લખાય છે અને તેની ચકાસણી કેવી રીતે થાય છે તે અંગેની પારદર્શક નીતિ.',
        'content' => <<<HTML
          <h2>૧. લોકો-પ્રથમ કન્ટેન્ટ (People-First Approach)</h2>
          <p>અમારી વેબસાઇટ પરનો દરેક લેખ સર્ચ એન્જિન અલ્ગોરિધમને છેતરવા માટે નહીં, પરંતુ સામાન્ય મુસાફરના સાચા પ્રશ્નનો ઝડપી અને સચોટ જવાબ આપવા માટે લખાય છે. અમે ગૂગલના People-First Content સિદ્ધાંતોનું ચુસ્તપણે પાલન કરીએ છીએ.</p>

          <h2>૨. તથ્ય ચકાસણી અને મૂળ સ્ત્રોત</h2>
          <p>કોઈપણ લેખ પ્રકાશિત કરતા પહેલાં:</p>
          <ul>
            <li>પરિવહન વિભાગના તાજા પરિપત્રો અને મુસાફર નિયમોની ચકાસણી કરવામાં આવે છે.</li>
            <li>અવાસ્તવિક કે ભ્રામક દાવાઓ તાત્કાલિક હટાવી લેવામાં આવે છે.</li>
            <li>જ્યાં નિયમ બદલાવાપાત્ર હોય ત્યાં મુસાફરોને સત્તાવાર સ્ત્રોત ચકાસવાની સ્પષ્ટ ચેતવણી આપવામાં આવે છે.</li>
          </ul>

          <h2>૩. એઆઈ કચરો અને ક્લિકબાઈટથી મુક્તિ</h2>
          <p>અમે આપમેળે જનરેટ થયેલા રોબોટિક અનુવાદો કે ક્લિકબાઈટ હેડલાઇન્સ ચલાવતા નથી. તમામ લેખો શુદ્ધ અને સરળ ગુજરાતી ભાષામાં લખાયેલા છે જે વડીલો અને સામાન્ય વાચકો સરળતાથી સમજી શકે.</p>

          <h2>૪. સુધારા નીતિ (Corrections Policy)</h2>
          <p>જો કોઈ મુસાફર કે વાચકને અમારા લેખમાં કોઈ વિગત જૂની કે અચોક્કસ જણાય, તો તેઓ <a href="contact-us">સંપર્ક પૃષ્ઠ</a> દ્વારા અમારું ધ્યાન દોરી શકે છે. અમારી ટીમ 48 કલાકની અંદર યોગ્ય ચકાસણી કરી લેખ અપડેટ કરે છે.</p>
HTML
    ],

    'sources-verification' => [
        'title' => 'માહિતી સ્ત્રોત અને ચકાસણી (Sources & Verification)',
        'meta_title' => 'માહિતી સ્ત્રોત અને ચકાસણી | ' . SITE_NAME,
        'meta_desc' => 'આ વેબસાઇટ પર ઉપયોગમાં લેવાયેલા તમામ કાયદાકીય, પરિવહન અને જાહેર સુરક્ષા સ્ત્રોતોની યાદી.',
        'content' => <<<HTML
          <h2>સત્તાવાર સ્ત્રોતો અને માર્ગદર્શિકાઓ</h2>
          <p>અમારા માર્ગદર્શક લેખો નીચે આપેલા જાહેર સ્ત્રોતો અને સત્તાવાર દસ્તાવેજો પર આધારિત છે:</p>
          
          <table style="width:100%; border-collapse: collapse; margin: 1.5rem 0; font-size: 0.95rem;">
            <thead>
              <tr style="background: var(--bg-subtle); text-align: left;">
                <th style="padding: 0.75rem; border: 1px solid var(--border);">ક્ષેત્ર</th>
                <th style="padding: 0.75rem; border: 1px solid var(--border);">માહિતી સ્ત્રોત</th>
                <th style="padding: 0.75rem; border: 1px solid var(--border);">સત્તાવાર દરજ્જો</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="padding: 0.75rem; border: 1px solid var(--border); font-weight: 600;">પરિવહન કાયદા</td>
                <td style="padding: 0.75rem; border: 1px solid var(--border);">મોટર વ્હીકલ એક્ટ (Motor Vehicles Act) અને ગુજરાત મોટર વાહન નિયમો</td>
                <td style="padding: 0.75rem; border: 1px solid var(--border);">સંસદીય / રાજ્ય કાયદો</td>
              </tr>
              <tr>
                <td style="padding: 0.75rem; border: 1px solid var(--border); font-weight: 600;">મુસાફરી & લગેજ</td>
                <td style="padding: 0.75rem; border: 1px solid var(--border);">GSRTC જાહેર પેસેન્જર ચાર્ટર અને સામાન પરિવહન સામાન્ય શરતો</td>
                <td style="padding: 0.75rem; border: 1px solid var(--border);">જાહેર સેવા નીતિઓ</td>
              </tr>
              <tr>
                <td style="padding: 0.75rem; border: 1px solid var(--border); font-weight: 600;">મહિલા સુરક્ષા</td>
                <td style="padding: 0.75rem; border: 1px solid var(--border);">181 'અભયમ' ગુજરાત મહિલા હેલ્પલાઇન અને ગૃહ વિભાગ પ્રોટોકોલ</td>
                <td style="padding: 0.75rem; border: 1px solid var(--border);">રાજ્ય કટોકટી સેવા</td>
              </tr>
              <tr>
                <td style="padding: 0.75rem; border: 1px solid var(--border); font-weight: 600;">આરોગ્ય & મેડિકલ</td>
                <td style="padding: 0.75rem; border: 1px solid var(--border);">108 જીવીકે ઈએમઆરઆઈ ઇમરજન્સી મેડિકલ રિસ્પોન્સ ગાઈડલાઇન્સ</td>
                <td style="padding: 0.75rem; border: 1px solid var(--border);">જાહેર આરોગ્ય પ્રોટોકોલ</td>
              </tr>
            </tbody>
          </table>

          <p>આ વેબસાઇટ માત્ર એક માર્ગદર્શિકા છે. કાયદાકીય કે સેવા સંબંધિત આખરી નિર્ણય માટે સંબંધિત સરકારી વિભાગ કે પરિવહન નિગમનો નિર્ણય જ આખરી ગણાય છે.</p>
HTML
    ]
];

$pageData = $pagesContent[$pageKey] ?? $pagesContent['about-us'];

$pageTitle = $pageData['title'] . ' | ' . SITE_NAME;
$metaDescription = $pageData['meta_desc'];
$canonicalUrl = url($pageKey);
$currentRoute = $pageKey;

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Static Page Header -->
<section style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color:#fff; padding: 2.5rem 0;">
  <div class="container">
    <nav class="breadcrumbs" style="color: #cbd5e1; margin-bottom: 0.75rem;" aria-label="Breadcrumb">
      <a href="<?= url() ?>" style="color: #cbd5e1;">હોમ</a>
      <span>/</span>
      <span style="color: #fed7aa; font-weight: 600;"><?= e($pageData['title']) ?></span>
    </nav>
    <h1 style="color:#fff; font-size: 2.2rem; margin: 0;"><?= e($pageData['title']) ?></h1>
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
        <?= $pageData['content'] ?>
      </div>
    </article>

    <!-- In-Content Ad Placement -->
    <?php render_ad_slot('in_article'); ?>
  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
