<?php
/**
 * Contact Us Page Template
 * Validated form, CSRF protection, clear communication bounds
 */

$pageTitle = "અમારો સંપર્ક કરો (Contact Us) | " . SITE_NAME;
$metaDescription = "ગુજરાત બસ માર્ગદર્શક ટીમનો સંપર્ક કરો. વેબસાઇટ કન્ટેન્ટ સંબંધિત સૂચનો, ફીડબેક કે પ્રશ્નો માટે ફોર્મ ભરો.";
$canonicalUrl = url('contact-us');
$currentRoute = 'contact-us';

$successMsg = '';
$errorMsg = '';

// Handle POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        $errorMsg = 'કૃપા કરીને તમામ જરૂરી વિગતો (નામ, ઇમેઇલ અને સંદેશ) ભરો.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = 'કૃપા કરીને માન્ય ઇમેઇલ એડ્રેસ દાખલ કરો.';
    } else {
        // Save feedback safely (supports serverless read-only filesystems like Vercel)
        $logDir = is_writable(DATA_PATH) ? DATA_PATH : sys_get_temp_dir();
        $logFile = $logDir . '/feedback.json';
        $feedbacks = file_exists($logFile) ? (json_decode(@file_get_contents($logFile), true) ?: []) : [];
        $feedbacks[] = [
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message,
            'created_at' => date('Y-m-d H:i:s'),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? ''
        ];
        @file_put_contents($logFile, json_encode($feedbacks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);

        $successMsg = 'તમારો સંદેશ સફળતાપૂર્વક મળી ગયો છે. અમારી ટીમ ટૂંક સમયમાં તમારો સંપર્ક કરશે. આભાર!';
    }
}

require_once INCLUDES_PATH . '/header.php';
?>

<!-- Contact Header -->
<section style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color:#fff; padding: 2.5rem 0;">
  <div class="container">
    <nav class="breadcrumbs" style="color: #cbd5e1; margin-bottom: 0.75rem;" aria-label="Breadcrumb">
      <a href="<?= url() ?>" style="color: #cbd5e1;">હોમ</a>
      <span>/</span>
      <span style="color: #fed7aa; font-weight: 600;">સંપર્ક કરો</span>
    </nav>
    <h1 style="color:#fff; font-size: 2.2rem; margin: 0;">અમારો સંપર્ક કરો (Contact Us)</h1>
    <p style="color: #cbd5e1; margin-top: 0.5rem; font-size: 1.05rem;">સૂચનો, સુધારા અને મુસાફર માર્ગદર્શન સંબંધિત સહાય માટે</p>
  </div>
</section>

<!-- Header Ad Placement -->
<div class="container">
  <?php render_ad_slot('header'); ?>
</div>

<main class="main-layout">
  <div class="container" style="max-width: 860px;">
    
    <!-- Important Notice Box -->
    <div style="background: #fffbeb; border: 1px solid #fde68a; border-radius: var(--radius-md); padding: 1.25rem; margin-bottom: 2rem;">
      <h3 style="color: #92400e; font-size: 1.05rem; margin-bottom: 0.4rem; display: flex; align-items: center; gap: 0.5rem;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        સંપર્ક કરતા પહેલાં મહત્વપૂર્ણ નોંધ:
      </h3>
      <p style="font-size: 0.9rem; color: #78350f; margin: 0; line-height: 1.6;">
        આ એક સ્વતંત્ર માહિતી પોર્ટલ છે. અમે <strong>ટિકિટ બુકિંગ, ટિકિટ રદ્દીકરણ (Cancellation) કે રિફંડ</strong> કરતા નથી. જો તમારી બસ ચૂકી ગઈ હોય કે ટિકિટના પૈસા કપાઈ ગયા હોય, તો કૃપા કરીને સત્તાવાર GSRTC હેલ્પલાઇન <a href="tel:18002336666" class="smart-inline-call" title="1800-233-6666 પર સીધો કૉલ કરો">📞 1800-233-6666 (ટોલ-ફ્રી)</a> અથવા તમારા નજીકના એસટી ડેપો કંટ્રોલ રૂમનો સંપર્ક કરવો.
      </p>
    </div>

    <?php if ($successMsg): ?>
      <div class="alert alert-success">
        ✓ <?= e($successMsg) ?>
      </div>
    <?php endif; ?>

    <?php if ($errorMsg): ?>
      <div class="alert alert-danger">
        ✗ <?= e($errorMsg) ?>
      </div>
    <?php endif; ?>

    <div style="background: var(--bg-surface); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 2rem; box-shadow: var(--shadow-sm);">
      <form action="<?= url('contact-us') ?>" method="POST">
        
        <div class="form-group">
          <label for="name" class="form-label">તમારું પૂરું નામ *</label>
          <input type="text" id="name" name="name" class="form-control" required placeholder="દા.ત. રમેશભાઈ પટેલ">
        </div>

        <div class="form-group">
          <label for="email" class="form-label">ઇમેઇલ એડ્રેસ *</label>
          <input type="email" id="email" name="email" class="form-control" required placeholder="દા.ત. ramesh@example.com">
        </div>

        <div class="form-group">
          <label for="subject" class="form-label">વિષય</label>
          <input type="text" id="subject" name="subject" class="form-control" placeholder="દા.ત. લેખમાં સુધારો / સામાન નિયમ અંગે પ્રશ્ન">
        </div>

        <div class="form-group">
          <label for="message" class="form-label">સંદેશ / પ્રશ્ન *</label>
          <textarea id="message" name="message" class="form-control" required placeholder="તમારો સંદેશ વિગતવાર અહીં લખો..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
          <span>સંદેશ મોકલો</span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
        </button>
      </form>
    </div>

    <!-- Official Help Directory Box (Smart Direct Call Cards) -->
    <div class="contact-help-directory">
      <div class="contact-help-header">
        <h3 class="contact-help-title">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
          અધિકૃત સરકારી હેલ્પલાઇન નંબરો
        </h3>
        <span class="contact-help-subtitle">કૉલ કરવા માટે કાર્ડ પર ક્લિક કરો</span>
      </div>

      <div class="contact-call-grid">
        <a href="tel:18002336666" class="contact-call-card contact-card-amber" title="1800-233-6666 પર કૉલ કરો">
          <div class="contact-call-card-top">
            <span class="contact-call-label">GSRTC સત્તાવાર ટોલ ફ્રી</span>
            <span class="contact-badge-chip badge-amber">24x7</span>
          </div>
          <span class="contact-call-num">1800-233-6666</span>
          <span class="contact-call-action">📞 સીધો કૉલ કરો</span>
        </a>

        <a href="tel:112" class="contact-call-card contact-card-blue" title="112 પર કૉલ કરો">
          <div class="contact-call-card-top">
            <span class="contact-call-label">પોલીસ / નેશનલ ઈમરજન્સી</span>
            <span class="contact-badge-chip badge-blue">સુરક્ષા</span>
          </div>
          <span class="contact-call-num">112</span>
          <span class="contact-call-action">📞 સીધો કૉલ કરો</span>
        </a>

        <a href="tel:108" class="contact-call-card contact-card-red" title="108 પર કૉલ કરો">
          <div class="contact-call-card-top">
            <span class="contact-call-label">108 મેડિકલ એમ્બ્યુલન્સ</span>
            <span class="contact-badge-chip badge-red">મેડિકલ</span>
          </div>
          <span class="contact-call-num">108</span>
          <span class="contact-call-action">📞 સીધો કૉલ કરો</span>
        </a>

        <a href="tel:181" class="contact-call-card contact-card-pink" title="181 પર કૉલ કરો">
          <div class="contact-call-card-top">
            <span class="contact-call-label">'અભયમ' મહિલા હેલ્પલાઇન</span>
            <span class="contact-badge-chip badge-pink">મહિલા</span>
          </div>
          <span class="contact-call-num">181</span>
          <span class="contact-call-action">📞 સીધો કૉલ કરો</span>
        </a>
      </div>
    </div>

  </div>
</main>

<?php require_once INCLUDES_PATH . '/footer.php'; ?>
