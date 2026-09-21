<?php
/**
 * 404 Not Found Template
 */

$pageTitle = "પૃષ્ઠ મળ્યું નથી (404 Not Found) | " . SITE_NAME;
$metaDescription = "ક્ષમા કરશો, તમે જે પેજ શોધી રહ્યા છો તે ઉપલબ્ધ નથી.";
$canonicalUrl = url('404');
$currentRoute = '404';

require_once INCLUDES_PATH . '/header.php';
?>

<main class="main-layout">
  <div class="container" style="max-width: 680px; text-align: center; padding: 4rem 1rem;">
    <div style="font-size: 5rem; font-weight: 800; color: var(--accent); line-height: 1; margin-bottom: 1rem;">404</div>
    <h1 style="font-size: 1.8rem; color: var(--primary); margin-bottom: 1rem;">આ પૃષ્ઠ મળી શક્યું નથી</h1>
    <p style="color: var(--text-muted); font-size: 1.05rem; margin-bottom: 2rem;">
      તમે જે પેજ શોધી રહ્યા છો તે કદાચ હટાવી દેવામાં આવ્યું છે, તેનું નામ બદલાયું છે અથવા અમાન્ય લિંક છે.
    </p>

    <!-- Search Form -->
    <form action="<?= url('search') ?>" method="GET" class="hero-search-wrapper" style="border: 1px solid var(--border); box-shadow: var(--shadow-md); margin-bottom: 2rem;">
      <input type="text" name="q" class="hero-search-input" placeholder="બસ મુસાફરી માહિતી શોધો..." required>
      <button type="submit" class="hero-search-btn">શોધો</button>
    </form>

    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
      <a href="<?= url() ?>" class="btn btn-primary">મુખ્ય પૃષ્ઠ પર જાઓ</a>
      <a href="<?= url('checklist') ?>" class="btn btn-outline">મુસાફરી ચેકલિસ્ટ</a>
      <a href="<?= url('category/before-travel') ?>" class="btn btn-outline">મુસાફરી પહેલાં માર્ગદર્શન</a>
    </div>
  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
