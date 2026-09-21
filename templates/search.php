<?php
/**
 * Search Page Template
 * Bilingual Search (Gujarati & English Transliteration Support)
 */

$query = trim($_GET['q'] ?? '');
$results = $query !== '' ? search_articles($query, 'published') : [];

$pageTitle = ($query !== '' ? ('"' . e($query) . '" - GSRTC બસ માહિતી સર્ચ પરિણામો') : 'GSRTC બસ માહિતી સર્ચ') . ' | ' . SITE_NAME;
$metaDescription = "GSRTC એસટી બસ માહિતી સર્ચ પોર્ટલ. સમયપત્રક, ટિકિટ બુકિંગ, ૨૫ કિલો સામાન, પાસ, રિફંડ અને ૧૮૦૦-૨૩૩-૬૬૬૬ હેલ્પલાઇન નિયમો.";
$metaKeywords = "GSRTC search, gsrtc bus time table, gsrtc ticket, gsrtc luggage rules, એસટી બસ સર્ચ, ગુજરાત બસ";
$canonicalUrl = url('search') . ($query !== '' ? ('?q=' . urlencode($query)) : '');
$currentRoute = 'search';

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Search Header Banner -->
<section style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color:#fff; padding: 2.5rem 0;">
  <div class="container">
    <div style="max-width: 720px; margin: 0 auto; text-align: center;">
      <h1 style="color:#fff; font-size: 2rem; margin-bottom: 0.5rem;">માહિતી શોધો (Search Guides)</h1>
      <p style="color: #cbd5e1; font-size: 0.95rem; margin-bottom: 1.5rem;">
        તમે ગુજરાતીમાં (દા.ત. ટિકિટ, સામાન, વરસાદ) અથવા અંગ્રેજી અક્ષરોમાં (દા.ત. ticket, luggage, varsad, sleeper) શોધી શકો છો.
      </p>

      <form action="<?= url('search') ?>" method="GET" class="hero-search-wrapper" style="box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
        <input 
          type="text" 
          name="q" 
          value="<?= e($query) ?>" 
          class="hero-search-input" 
          placeholder="શોધવા માટે કીવર્ડ દાખલ કરો..." 
          aria-label="શોધવા માટે કીવર્ડ"
          required
        >
        <button type="submit" class="hero-search-btn">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <span>શોધો</span>
        </button>
      </form>
    </div>
  </div>
</section>

<!-- Header Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container">

    <?php if ($query !== ''): ?>
      <div style="margin-bottom: 2rem; display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--border); padding-bottom: 1rem;">
        <h2 style="font-size: 1.4rem; margin: 0; color: var(--primary);">
          '<strong><?= e($query) ?></strong>' માટે <span style="color: var(--accent);"><?= count($results) ?></span> પરિણામો મળ્યા
        </h2>
        <?php if (!empty($results)): ?>
          <span style="font-size: 0.85rem; color: var(--text-muted);">સૌથી સુસંગત ક્રમમાં ગોઠવાયેલ</span>
        <?php endif; ?>
      </div>

      <?php if (empty($results)): ?>
        <div style="background: var(--bg-surface); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 3rem; text-align: center; max-width: 680px; margin: 2rem auto;">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5" style="margin-bottom: 1rem;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line><line x1="8" y1="11" x2="14" y2="11"></line></svg>
          <h3 style="color: var(--primary); margin-bottom: 0.5rem;">કોઈ મેળ ખાતા લેખો મળ્યા નથી</h3>
          <p style="color: var(--text-muted); margin-bottom: 1.5rem;">
            કૃપા કરીને અન્ય કોઈ સરળ શબ્દ (દા.ત. 'ટિકિટ', 'સામાન', 'બાળકો', 'સલામતી') વડે ફરીથી પ્રયાસ કરો.
          </p>
          <div style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= url('search?q=ટિકિટ') ?>" class="tag-pill">ટિકિટ નિયમો</a>
            <a href="<?= url('search?q=સામાન') ?>" class="tag-pill">સામાન વજન</a>
            <a href="<?= url('search?q=ખોવાઈ') ?>" class="tag-pill">સામાન ખોવાઈ જાય તો</a>
            <a href="<?= url('search?q=બાળકો') ?>" class="tag-pill">બાળકોની મુસાફરી</a>
          </div>
        </div>
      <?php else: ?>
        <div class="articles-grid">
          <?php foreach ($results as $art): ?>
            <?php $cat = get_category_by_slug($art['category_id'] ?? ''); ?>
            <article class="article-card">
              <div class="article-card-body">
                <div class="article-meta">
                  <span class="article-category-badge"><?= e($cat['name'] ?? 'માર્ગદર્શન') ?></span>
                  <span>&bull;</span>
                  <span><?= e($art['reading_time'] ?? '5 મિનિટ') ?></span>
                </div>
                <h3 class="article-title">
                  <a href="<?= url('article/' . $art['slug']) ?>"><?= e($art['title']) ?></a>
                </h3>
                <p class="article-excerpt"><?= e($art['excerpt']) ?></p>
                <div class="article-footer">
                  <span style="font-size:0.8rem; color:var(--text-muted);">અપડેટ: <?= date('d M Y', strtotime($art['updated_at'] ?? $art['published_at'])) ?></span>
                  <a href="<?= url('article/' . $art['slug']) ?>" class="read-more-link">
                    વાંચો <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"></polyline></svg>
                  </a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    <?php else: ?>
      <!-- Initial Search Landing State -->
      <div style="background: var(--bg-surface); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 2.5rem; text-align: center; max-width: 860px; margin: 0 auto;">
        <h3 style="color: var(--primary); margin-bottom: 1rem;">GSRTC મુસાફરો દ્વારા વારંવાર પૂછાતા મોસ્ટ પોપ્યુલર વિષયો</h3>
        <p style="color: var(--text-muted); margin-bottom: 1.5rem;">નીચે આપેલા કોઈપણ વિષય પર ક્લિક કરીને સીધું સચોટ માર્ગદર્શન મેળવો:</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
          <a href="<?= url('search?q=સમયપત્રક') ?>" class="btn btn-outline btn-sm">🕒 GSRTC બસ સમયપત્રક</a>
          <a href="<?= url('search?q=ટિકિટ+બુકિંગ') ?>" class="btn btn-outline btn-sm">🎫 ટિકિટ બુકિંગ નિયમો</a>
          <a href="<?= url('search?q=સામાન+વજન') ?>" class="btn btn-outline btn-sm">🧳 25 કિલો સામાન નિયમ</a>
          <a href="<?= url('search?q=વિદ્યાર્થી+પાસ') ?>" class="btn btn-outline btn-sm">🪪 વિદ્યાર્થી 80% પાસ યોજના</a>
          <a href="<?= url('search?q=રિફંડ') ?>" class="btn btn-outline btn-sm">💰 ટિકિટ કેન્સલેશન & રિફંડ</a>
          <a href="<?= url('search?q=સિનિયર+સિટીઝન') ?>" class="btn btn-outline btn-sm">👴 વરિષ્ઠ નાગરિક અનામત સીટ</a>
          <a href="<?= url('search?q=મહિલા+સુરક્ષા') ?>" class="btn btn-outline btn-sm">👩 મહિલા સુરક્ષા 181 અભયમ</a>
          <a href="<?= url('search?q=બાળકોની+ટિકિટ') ?>" class="btn btn-outline btn-sm">👶 બાળકોની હાફ ટિકિટ વય</a>
          <a href="<?= url('search?q=helpline') ?>" class="btn btn-outline btn-sm">🚨 ટોલ ફ્રી 1800 233 6666</a>
        </div>
      </div>
    <?php endif; ?>

    <!-- In-Content Ad Placement -->
    <?php render_ad_slot('in_article'); ?>

  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
