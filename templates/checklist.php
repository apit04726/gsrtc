<?php
/**
 * Interactive Passenger Checklist Template
 * Offline-capable (localStorage), printable, grouped by categories
 */

$pageTitle = "બસ મુસાફરી માટે જરૂરી વસ્તુઓની Checklist | " . SITE_NAME;
$metaDescription = "બસ પ્રવાસમાં નીકળતા પહેલા શું પેક કરવું? ટિકિટ, આઈડી કાર્ડ, દવાઓ, પાણી, નાસ્તો અને પાવરબેંકનું સંપૂર્ણ ગુજરાતી ઇન્ટરેક્ટિવ ચેકલિસ્ટ.";
$canonicalUrl = url('checklist');
$currentRoute = 'checklist';

$checklistGroups = [
    [
        'title' => '૧. અગત્યના દસ્તાવેજો અને નાણાં (Documents & Cash)',
        'icon' => 'file-text',
        'items' => [
            ['id' => 'doc_1', 'text' => 'અસલ માન્ય ફોટો આઈડી કાર્ડ (Aadhaar Card, Election Card કે Driving License)'],
            ['id' => 'doc_2', 'text' => 'કન્ફર્મ ટિકિટ (મોબાઈલ SMS / ડાઉનલોડ કરેલ PDF ફાઈલ અથવા પ્રિન્ટ)'],
            ['id' => 'doc_3', 'text' => 'રોકડ નાણાં - નાની નોટો (₹10, ₹20, ₹50, ₹100) કંડક્ટર પાસે છૂટા ન હોય ત્યારે'],
            ['id' => 'doc_4', 'text' => 'એટીએમ કાર્ડ / યુપીઆઈ સ્કેનર માટે તૈયાર મોબાઈલ બેંકિંગ'],
            ['id' => 'doc_5', 'text' => 'સિનિયર સિટીઝન / કન્સેશન પાસ (જો લાગુ પડતું હોય તો)']
        ]
    ],
    [
        'title' => '૨. આરોગ્ય, સ્વચ્છતા અને દવાઓની કીટ (Health & Medical Kit)',
        'icon' => 'activity',
        'items' => [
            ['id' => 'med_1', 'text' => 'નિયમિત લેવાતી બ્લડ પ્રેશર (BP), ડાયાબિટીસ કે હૃદયરોગની દવાઓ (2 દિવસનો વધારાનો સ્ટોક)'],
            ['id' => 'med_2', 'text' => 'ઉલટી / ચક્કરની દવા (ડૉક્ટરની સલાહ મુજબ પ્રવાસના 30 મિનિટ પહેલા લેવી)'],
            ['id' => 'med_3', 'text' => 'માથાનો દુખાવો (Paracetamol) અને એસિડિટીની ગોળીઓ'],
            ['id' => 'med_4', 'text' => 'હેન્ડ સેનિટાઇઝર, પેપર સોપ અને વેટ વાઇપ્સ (ડેપોના શૌચાલયમાં સાબુ ન હોઈ શકે)'],
            ['id' => 'med_5', 'text' => 'ઉલટી થાય તો ઉપયોગ કરવા માટે જાડી પ્લાસ્ટિકની કોથળીઓ (Barf Bags)'],
            ['id' => 'med_6', 'text' => 'ડીહાઈડ્રેશનથી બચવા માટે ORS (ઈલેક્ટ્રોલાઈટ) નું એક પેકેટ']
        ]
    ],
    [
        'title' => '૩. મોબાઈલ અને ઇલેક્ટ્રોનિક્સ (Electronics & Gadgets)',
        'icon' => 'smartphone',
        'items' => [
            ['id' => 'elec_1', 'text' => 'મોબાઈલ ફોન 100% ફુલ ચાર્જ કરેલો રાખવો'],
            ['id' => 'elec_2', 'text' => 'પાવરબેંક (સંપૂર્ણ ચાર્જ્ડ) અને ચાર્જિંગ કેબલ સાથે રાખવી'],
            ['id' => 'elec_3', 'text' => 'ગીતો કે વિડીયો જોવા માટે ઇયરફોન/હેડફોન (અન્ય મુસાફરોને અવાજ ન થાય તે માટે)'],
            ['id' => 'elec_4', 'text' => 'રાત્રિના સમયે ઉપયોગ માટે નાની ટોર્ચ અથવા મોબાઈલ ફ્લેશલાઈટ']
        ]
    ],
    [
        'title' => '૪. ખોરાક અને પીવાનું શુદ્ધ પાણી (Food & Water)',
        'icon' => 'coffee',
        'items' => [
            ['id' => 'food_1', 'text' => 'ઘરેથી ભરેલી શુદ્ધ પીવાના પાણીની 1 થી 2 લિટરની બોટલ'],
            ['id' => 'food_2', 'text' => 'પચવામાં હળવો અને ન બગડે તેવો નાસ્તો (ખાખરા, થેપલા, શેકેલા ચણા, મમરા)'],
            ['id' => 'food_3', 'text' => 'મોશન સિકનેસમાં રાહત માટે લીંબુ, સંચળ, લવિંગ કે વરિયાળી'],
            ['id' => 'food_4', 'text' => 'હાથ લૂછવા માટે પેપર નેપકીન કે નાનો ટુવાલ']
        ]
    ],
    [
        'title' => '૫. સામાન અને આરામદાયક મુસાફરી (Luggage & Comfort)',
        'icon' => 'briefcase',
        'items' => [
            ['id' => 'comf_1', 'text' => 'સામાનનું વજન 25 કિલોની મર્યાદામાં રાખવું (વધારાના વજન માટે લગેજ ટિકિટ લેવી)'],
            ['id' => 'comf_2', 'text' => 'દરેક બેગ પર નામ, ગામ અને મોબાઈલ નંબર લખેલું લગેજ ટેગ લગાવવું'],
            ['id' => 'comf_3', 'text' => 'એસી બસ કે રાત્રિ પ્રવાસ માટે હળવી શાલ, ચાદર કે મફલર'],
            ['id' => 'comf_4', 'text' => 'લાંબી મુસાફરીમાં ગળાના દુખાવાથી બચવા માટે નેક પિલો (Neck Pillow)'],
            ['id' => 'comf_5', 'text' => 'ચોમાસામાં તમામ કાગળો અને મોબાઈલ માટે વોટરપ્રૂફ ઝિપ-લોક પાઉચ']
        ]
    ]
];

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Header Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container" style="max-width: 860px;">
    
    <div style="text-align: center; margin-bottom: 2rem;">
      <span class="article-category-badge" style="font-size: 0.85rem; padding: 0.3rem 0.8rem;">મુસાફરી પૂર્વ તૈયારી ટૂલ</span>
      <h1 style="font-size: 2.2rem; margin: 0.75rem 0 0.5rem; color: var(--primary);">બસ મુસાફરી માટે જરૂરી વસ્તુઓની Checklist</h1>
      <p style="color: var(--text-muted); font-size: 1.05rem;">
        ઘરેથી નીકળતા પહેલા નીચે આપેલા મુદ્દાઓ ચકાસો અને ટીક કરતા જાઓ. આ ચેકલિસ્ટ તમારા બ્રાઉઝરમાં સેવ રહે છે.
      </p>
    </div>

    <!-- Action Buttons -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 0.75rem;">
      <span style="font-size: 0.9rem; color: #15803d; font-weight: 700;">
        ✓ ટીક કરેલ વસ્તુઓ ઓટોમેટિક સેવ થાય છે
      </span>
      <div style="display: flex; gap: 0.5rem;">
        <button type="button" id="printChecklistBtn" class="btn btn-outline btn-sm">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
          પ્રિન્ટ / PDF
        </button>
        <button type="button" id="resetChecklistBtn" class="btn btn-outline btn-sm" style="color: #b91c1c; border-color: #fecaca;">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>
          બધું રીસેટ કરો
        </button>
      </div>
    </div>

    <!-- Checklist Card -->
    <div class="interactive-checklist-card">
      <?php foreach ($checklistGroups as $group): ?>
        <div class="checklist-group">
          <h3 class="checklist-group-title">
            <?= e($group['title']) ?>
          </h3>
          <div>
            <?php foreach ($group['items'] as $item): ?>
              <div class="cl-task-row" data-id="<?= e($item['id']) ?>">
                <input type="checkbox" class="cl-checkbox" id="cb_<?= e($item['id']) ?>" aria-label="<?= e($item['text']) ?>">
                <label for="cb_<?= e($item['id']) ?>" class="cl-task-text"><?= e($item['text']) ?></label>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <!-- Share Widget -->
      <div style="margin-top: 2rem; padding: 1.25rem; background: var(--bg-subtle); border-radius: var(--radius-md); text-align: center;">
        <p style="font-weight: 700; color: var(--primary); margin-bottom: 0.75rem;">આ ચેકલિસ્ટ તમારા પરિવાર કે મિત્રો સાથે શેર કરો:</p>
        <a href="https://api.whatsapp.com/send?text=<?= rawurlencode('બસમાં મુસાફરી કરતા પહેલા આ ચેકલિસ્ટ ખાસ જોઈ લો: ' . url('checklist')) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm" style="background:#25d366; border-color:#25d366;">
          વ્હોટ્સએપ પર શેર કરો
        </a>
      </div>
    </div>

    <!-- In-Content Ad Placement -->
    <?php render_ad_slot('in_article'); ?>

  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
