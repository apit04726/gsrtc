/**
 * ગુજરાત બસ માર્ગદર્શક (Gujarat Bus Margdarshak)
 * Client-side interactions & Smart Hero Slider
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Mobile Menu Drawer
  const menuToggle = document.getElementById('mobileMenuToggle');
  const drawer = document.getElementById('mobileDrawer');
  const backdrop = document.getElementById('drawerBackdrop');
  const closeDrawer = document.getElementById('closeDrawer');

  function openMenu() {
    if (drawer && backdrop) {
      drawer.classList.add('open');
      backdrop.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
  }

  function closeMenu() {
    if (drawer && backdrop) {
      drawer.classList.remove('open');
      backdrop.classList.remove('open');
      document.body.style.overflow = '';
    }
  }

  if (menuToggle) menuToggle.addEventListener('click', openMenu);
  if (closeDrawer) closeDrawer.addEventListener('click', closeMenu);
  if (backdrop) backdrop.addEventListener('click', closeMenu);

  // 2. Smart Showcase Hero Card Slider (3 Images, Auto-Play, Pause-on-Hover, Touch Swipe)
  const slider = document.getElementById('heroSlider');
  if (slider) {
    const slides = slider.querySelectorAll('.showcase-slide');
    const dots = document.querySelectorAll('.s-dot');
    const prevBtn = document.getElementById('sliderPrev');
    const nextBtn = document.getElementById('sliderNext');
    const counterEl = document.getElementById('slideCounter');
    const tagTextEl = document.getElementById('slideTagText');
    let currentIndex = 0;
    const totalSlides = slides.length;
    let autoPlayTimer = null;

    function goToSlide(index) {
      if (index < 0) index = totalSlides - 1;
      if (index >= totalSlides) index = 0;
      
      slides.forEach((slide, i) => {
        if (i === index) {
          slide.classList.add('active');
          if (tagTextEl && slide.dataset.tag) {
            tagTextEl.textContent = slide.dataset.tag;
          }
        } else {
          slide.classList.remove('active');
        }
      });

      dots.forEach((dot, i) => {
        if (i === index) {
          dot.classList.add('active');
          dot.setAttribute('aria-selected', 'true');
        } else {
          dot.classList.remove('active');
          dot.setAttribute('aria-selected', 'false');
        }
      });

      if (counterEl) {
        counterEl.textContent = `0${index + 1} / 0${totalSlides}`;
      }

      currentIndex = index;
    }

    function nextSlide() {
      goToSlide(currentIndex + 1);
    }

    function prevSlide() {
      goToSlide(currentIndex - 1);
    }

    function startAutoPlay() {
      stopAutoPlay();
      autoPlayTimer = setInterval(nextSlide, 5000);
    }

    function stopAutoPlay() {
      if (autoPlayTimer) {
        clearInterval(autoPlayTimer);
        autoPlayTimer = null;
      }
    }

    // Button controls
    if (nextBtn) {
      nextBtn.addEventListener('click', () => {
        nextSlide();
        startAutoPlay();
      });
    }

    if (prevBtn) {
      prevBtn.addEventListener('click', () => {
        prevSlide();
        startAutoPlay();
      });
    }

    // Dots controls
    dots.forEach((dot) => {
      dot.addEventListener('click', () => {
        const idx = parseInt(dot.getAttribute('data-index'), 10);
        goToSlide(idx);
        startAutoPlay();
      });
    });

    // Pause on hover
    slider.addEventListener('mouseenter', stopAutoPlay);
    slider.addEventListener('mouseleave', startAutoPlay);

    // Touch Swipe Support for Mobile
    let touchStartX = 0;
    let touchEndX = 0;

    slider.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
      stopAutoPlay();
    }, { passive: true });

    slider.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
      startAutoPlay();
    }, { passive: true });

    function handleSwipe() {
      const diff = touchEndX - touchStartX;
      if (Math.abs(diff) > 40) {
        if (diff < 0) {
          nextSlide(); // swipe left
        } else {
          prevSlide(); // swipe right
        }
      }
    }

    // Start on load
    startAutoPlay();
  }

  // 3. FAQ Accordions
  const faqQuestions = document.querySelectorAll('.faq-question');
  faqQuestions.forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const isActive = item.classList.contains('active');
      
      document.querySelectorAll('.faq-item.active').forEach(openItem => {
        if (openItem !== item) {
          openItem.classList.remove('active');
        }
      });

      if (isActive) {
        item.classList.remove('active');
      } else {
        item.classList.add('active');
      }
    });
  });

  // 4. Interactive Checklist Persistence (LocalStorage)
  const checklistRows = document.querySelectorAll('.cl-task-row');
  const storageKey = 'gujbusguide_checklist_state';
  let savedState = {};

  try {
    const raw = localStorage.getItem(storageKey);
    if (raw) savedState = JSON.parse(raw);
  } catch (e) {
    console.error('LocalStorage error', e);
  }

  checklistRows.forEach((row, idx) => {
    const checkbox = row.querySelector('.cl-checkbox');
    const rowId = row.dataset.id || 'task_' + idx;

    if (savedState[rowId]) {
      checkbox.checked = true;
      row.classList.add('checked');
    }

    row.addEventListener('click', (e) => {
      if (e.target !== checkbox) {
        checkbox.checked = !checkbox.checked;
      }
      if (checkbox.checked) {
        row.classList.add('checked');
        savedState[rowId] = true;
      } else {
        row.classList.remove('checked');
        delete savedState[rowId];
      }
      try {
        localStorage.setItem(storageKey, JSON.stringify(savedState));
      } catch (err) {}
    });
  });

  const resetBtn = document.getElementById('resetChecklistBtn');
  if (resetBtn) {
    resetBtn.addEventListener('click', () => {
      if (confirm('શું તમે ચેકલિસ્ટ રીસેટ કરવા માંગો છો?')) {
        localStorage.removeItem(storageKey);
        checklistRows.forEach(row => {
          row.classList.remove('checked');
          const cb = row.querySelector('.cl-checkbox');
          if (cb) cb.checked = false;
        });
      }
    });
  }

  const printBtn = document.getElementById('printChecklistBtn');
  if (printBtn) {
    printBtn.addEventListener('click', () => {
      window.print();
    });
  }

  // 5. Share / Copy Link
  const copyBtn = document.getElementById('copyArticleLink');
  if (copyBtn) {
    copyBtn.addEventListener('click', () => {
      const url = window.location.href;
      navigator.clipboard.writeText(url).then(() => {
        const origText = copyBtn.innerHTML;
        copyBtn.innerHTML = '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg> લિંક કોપી થઈ!';
        setTimeout(() => {
          copyBtn.innerHTML = origText;
        }, 2500);
      }).catch(() => {
        alert('લિંક કોપી થઈ શકી નથી.');
      });
    });
  }
});
