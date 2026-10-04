/**
 * ગુજરાત બસ માર્ગદર્શક (Gujarat Bus Margdarshak)
 * Client-side interactions & Smart Hero Slider
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Smart Mobile & Tablet Menu Drawer
  const menuToggle = document.getElementById('mobileMenuToggle');
  const bottomMenuToggle = document.getElementById('bottomNavMenuToggle');
  const drawer = document.getElementById('mobileDrawer');
  const backdrop = document.getElementById('drawerBackdrop');
  const closeDrawer = document.getElementById('closeDrawer');

  function openMenu() {
    if (drawer && backdrop) {
      drawer.classList.add('open');
      backdrop.classList.add('open');
      drawer.setAttribute('aria-hidden', 'false');
      backdrop.setAttribute('aria-hidden', 'false');
      if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
      if (bottomMenuToggle) bottomMenuToggle.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';

      // Auto-focus search field after animation if on tablet/desktop view
      setTimeout(() => {
        const searchInput = drawer.querySelector('.drawer-search-input');
        if (searchInput && window.innerWidth >= 768) {
          searchInput.focus();
        }
      }, 350);
    }
  }

  function closeMenu() {
    if (drawer && backdrop) {
      drawer.classList.remove('open');
      backdrop.classList.remove('open');
      drawer.setAttribute('aria-hidden', 'true');
      backdrop.setAttribute('aria-hidden', 'true');
      if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
      if (bottomMenuToggle) bottomMenuToggle.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }
  }

  if (menuToggle) menuToggle.addEventListener('click', (e) => {
    e.preventDefault();
    if (drawer && drawer.classList.contains('open')) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  if (bottomMenuToggle) bottomMenuToggle.addEventListener('click', (e) => {
    e.preventDefault();
    if (drawer && drawer.classList.contains('open')) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  if (closeDrawer) closeDrawer.addEventListener('click', (e) => {
    e.preventDefault();
    closeMenu();
  });

  if (backdrop) backdrop.addEventListener('click', closeMenu);

  // Close drawer on Escape key press
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer && drawer.classList.contains('open')) {
      closeMenu();
    }
  });

  // Touch Swipe Right to Close Drawer on Mobile & Tablet
  if (drawer) {
    let drawerStartX = 0;
    let drawerStartY = 0;

    drawer.addEventListener('touchstart', (e) => {
      drawerStartX = e.changedTouches[0].clientX;
      drawerStartY = e.changedTouches[0].clientY;
    }, { passive: true });

    drawer.addEventListener('touchend', (e) => {
      const diffX = e.changedTouches[0].clientX - drawerStartX;
      const diffY = Math.abs(e.changedTouches[0].clientY - drawerStartY);
      
      // If horizontal swipe to the right is greater than vertical movement
      if (diffX > 60 && diffX > diffY) {
        closeMenu();
      }
    }, { passive: true });
  }

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

  // 6. Smart Scroll Animations System (Fade In, Fade Out, Fade Left, Fade Right, Fade Up, Fade Down)
  function initScrollAnimations() {
    // Add js-ready class to activate CSS animation initial states cleanly
    document.documentElement.classList.add('js-ready');

    // Accessibility: Respect user's motion preference
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      document.querySelectorAll('[data-animate], [data-aos], .fade-in, .fade-left, .fade-right, .fade-up, .fade-down, .fade-in-left, .fade-in-right, .fade-in-up, .fade-in-down').forEach(el => {
        el.classList.add('is-visible');
      });
      return;
    }

    // Auto-setup children of [data-stagger] grids if children don't already have explicit animate attr
    document.querySelectorAll('[data-stagger]').forEach(container => {
      const children = container.children;
      const baseAnim = container.dataset.animateChild || 'fade-up';
      const staggerMs = parseInt(container.dataset.stagger, 10) || 70;
      Array.from(children).forEach((child, index) => {
        if (!child.hasAttribute('data-animate') && 
            !child.classList.contains('fade-in') && 
            !child.classList.contains('fade-up') && 
            !child.classList.contains('fade-left') && 
            !child.classList.contains('fade-right')) {
          child.setAttribute('data-animate', baseAnim);
          if (!child.hasAttribute('data-delay')) {
            child.setAttribute('data-delay', (index * staggerMs));
          }
        }
      });
    });

    const animateSelector = '[data-animate], [data-aos], .fade-in, .fade-out, .fade-left, .fade-right, .fade-up, .fade-down, .fade-in-left, .fade-in-right, .fade-in-up, .fade-in-down';
    const animatedElements = document.querySelectorAll(animateSelector);
    if (!animatedElements.length) return;

    // Fallback if IntersectionObserver is unsupported in very old browsers
    if (!('IntersectionObserver' in window)) {
      animatedElements.forEach(el => el.classList.add('is-visible'));
      return;
    }

    const observerOptions = {
      root: null,
      rootMargin: '0px 0px -30px 0px',
      threshold: 0.08
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        const el = entry.target;
        if (entry.isIntersecting) {
          // Apply inline delay if attribute is specified
          if (el.dataset.delay) {
            el.style.transitionDelay = `${el.dataset.delay}ms`;
          }

          // Apply inline duration if attribute is specified
          if (el.dataset.duration) {
            el.style.transitionDuration = `${el.dataset.duration}ms`;
          }

          el.classList.add('is-visible');
          el.setAttribute('data-animated', 'true');
        } else {
          // Re-trigger animation when scrolling up or down back into view
          el.classList.remove('is-visible');
        }
      });
    }, observerOptions);

    animatedElements.forEach(el => observer.observe(el));
  }

  // Initialize animations
  initScrollAnimations();
  window.initScrollAnimations = initScrollAnimations;

  // 7. Clean Smooth Anchor Scroller
  function initSmoothScroller() {
    // Also bind any .footer-back-to-top or [href="#top"] links
    document.querySelectorAll('.footer-back-to-top, [href="#top"]').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    });

    // Smooth scroll for all internal hashtag anchor links (e.g. href="#categories", href="#faq")
    document.querySelectorAll('a[href^="#"]:not([href="#"]):not([href="#!"])').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
          e.preventDefault();
          const navOffset = 85;
          const elementPosition = targetElement.getBoundingClientRect().top;
          const offsetPosition = elementPosition + window.pageYOffset - navOffset;

          window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
          });
        }
      });
    });
  }

  // Initialize smooth scroller
  initSmoothScroller();
  window.initSmoothScroller = initSmoothScroller;
});



