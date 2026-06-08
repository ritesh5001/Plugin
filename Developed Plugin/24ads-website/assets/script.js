/* 24ads — shared interactions: SVG sprite injection, nav drawer, services dropdown, FAQ accordion */
(function () {
  "use strict";

  /* ---- 1. Inject the shared SVG icon sprite (works over file://) ---- */
  var SPRITE = '<svg width="0" height="0" style="position:absolute" aria-hidden="true">   <defs>     <!-- arrow right -->     <symbol id="i-arrow" viewBox="0 0 24 24"><path d="M5 12h14M13 5l7 7-7 7"/></symbol>     <!-- arrow up right -->     <symbol id="i-arrowur" viewBox="0 0 24 24"><path d="M7 17L17 7M7 7h10v10"/></symbol>     <!-- check -->     <symbol id="i-check" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></symbol>     <!-- plus -->     <symbol id="i-plus" viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></symbol>     <!-- chart bar -->     <symbol id="i-chart" viewBox="0 0 24 24"><path d="M3 3v18h18M7 16V8m5 8V4m5 12v-5"/></symbol>     <!-- target -->     <symbol id="i-target" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.5" class="icon--filled"/></symbol>     <!-- search -->     <symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></symbol>     <!-- camera -->     <symbol id="i-camera" viewBox="0 0 24 24"><path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"/><circle cx="12" cy="13" r="4"/></symbol>     <!-- megaphone -->     <symbol id="i-megaphone" viewBox="0 0 24 24"><path d="M3 11l18-8v18l-18-8z"/><path d="M11.6 16.8a3 3 0 11-5.8-1.6"/></symbol>     <!-- code -->     <symbol id="i-code" viewBox="0 0 24 24"><path d="M16 18l6-6-6-6M8 6l-6 6 6 6"/></symbol>     <!-- rocket -->     <symbol id="i-rocket" viewBox="0 0 24 24"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 00-2.91-.09zM12 15l-3-3a22 22 0 014-6 11.22 11.22 0 0110-2 11.22 11.22 0 01-2 10 22 22 0 01-6 4z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></symbol>     <!-- shopping -->     <symbol id="i-shopping" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 002 1.6h9.7a2 2 0 002-1.6L23 6H6"/></symbol>     <!-- users -->     <symbol id="i-users" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></symbol>     <!-- award -->     <symbol id="i-award" viewBox="0 0 24 24"><circle cx="12" cy="8" r="7"/><path d="M8.21 13.89L7 23l5-3 5 3-1.21-9.12"/></symbol>     <!-- shield -->     <symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></symbol>     <!-- zap (lightning) -->     <symbol id="i-zap" viewBox="0 0 24 24"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></symbol>     <!-- trending -->     <symbol id="i-trending" viewBox="0 0 24 24"><path d="M23 6l-9.5 9.5-5-5L1 18"/><path d="M17 6h6v6"/></symbol>     <!-- mail -->     <symbol id="i-mail" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M22 6l-10 7L2 6"/></symbol>     <!-- phone -->     <symbol id="i-phone" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.37 1.9.72 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.35 1.85.59 2.81.72A2 2 0 0122 16.92z"/></symbol>     <!-- pin -->     <symbol id="i-pin" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></symbol>     <!-- globe -->     <symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></symbol>     <!-- briefcase -->     <symbol id="i-briefcase" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></symbol>     <!-- home -->     <symbol id="i-home" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><path d="M9 22V12h6v10"/></symbol>     <!-- gem -->     <symbol id="i-gem" viewBox="0 0 24 24"><path d="M6 3h12l4 6-10 13L2 9z"/><path d="M11 3L8 9l4 13 4-13-3-6M2 9h20"/></symbol>     <!-- sparkle -->     <symbol id="i-sparkle" viewBox="0 0 24 24"><path d="M12 3l2.5 6.5L21 12l-6.5 2.5L12 21l-2.5-6.5L3 12l6.5-2.5z"/></symbol>     <!-- heart -->     <symbol id="i-heart" viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></symbol>     <!-- star -->     <symbol id="i-star" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01z" class="icon--filled"/></symbol>     <!-- menu -->     <symbol id="i-menu" viewBox="0 0 24 24"><path d="M3 12h18M3 6h18M3 18h18"/></symbol>     <!-- instagram -->     <symbol id="i-insta" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><circle cx="17.5" cy="6.5" r="0.5" class="icon--filled"/></symbol>     <!-- linkedin -->     <symbol id="i-linkedin" viewBox="0 0 24 24"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-4 0v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2" class="icon--filled"/></symbol>     <!-- facebook -->     <symbol id="i-facebook" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></symbol>     <!-- youtube -->     <symbol id="i-youtube" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.25 29 29 0 00-.46-5.33z"/><path d="M9.75 15.02l5.75-3.27-5.75-3.27z" class="icon--filled"/></symbol>     <!-- whatsapp -->     <symbol id="i-whatsapp" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8z"/></symbol>     <!-- meta -->     <symbol id="i-meta" viewBox="0 0 24 24"><path d="M2 12c0-5.52 3.5-10 8-10 3.5 0 5.5 3 7 6 1.5 3 3 6 5 6 1.5 0 2-1.5 2-3" /></symbol>     <!-- google -->     <symbol id="i-google" viewBox="0 0 24 24"><path d="M22 12c0 5.52-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2c2.65 0 5.05 1 6.85 2.7L15.6 7.6A5.5 5.5 0 0012 6.5a5.5 5.5 0 100 11c2.78 0 4.6-1.4 5.06-3.34H12V11h10z"/></symbol>     <!-- shopify -->     <symbol id="i-shopify" viewBox="0 0 24 24"><path d="M15.8 4.7c-.1-.1-.2-.1-.3-.1l-1.4.1c-.1-.4-.3-.9-.6-1.3-.6-1-1.5-1.6-2.6-1.4-1.3.2-2.5 1.5-3.1 3.5L5 6.4 4 19.8l13.5 1.8 2-13.4-3.7-3.5zM10 4.5c.4.1.7.3 1 .6.2.3.4.7.5 1l-2 .5c.1-1 .4-1.8.5-2.1zm2-1c-.5-.5-1-.7-1.5-.7-.7 0-1.5.4-2 1.5-.3.5-.5 1.1-.6 1.7l1.6-.4c-.1.6.1 1.1.3 1.5.2.3.5.5.9.6.4 0 .8-.1 1.1-.4.3-.3.4-.7.4-1.2 0-.7-.2-1.3-.6-1.7l.4-.9zm-3.3 3.8l-2 .5L8 19.4l9.5-1.1L18.5 9l-1.5-1.5-1.2.3v3.5c.5.4.8.9.8 1.5 0 1.1-.9 2-2 2s-2-.9-2-2c0-.4.1-.7.2-1L9.7 11l-1 .3z"/></symbol>     <!-- clock -->     <symbol id="i-clock" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></symbol>     <!-- handshake -->     <symbol id="i-handshake" viewBox="0 0 24 24"><path d="M11 17l-5-5 5-5M13 7l5 5-5 5M2 12h20"/></symbol>     <!-- pen -->     <symbol id="i-pen" viewBox="0 0 24 24"><path d="M12 19l7-7 3 3-7 7-3-3zM18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5zM2 2l7.586 7.586"/><circle cx="11" cy="11" r="2" class="icon--filled"/></symbol>     <!-- layers -->     <symbol id="i-layers" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></symbol>     <!-- compass -->     <symbol id="i-compass" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M16.24 7.76l-2.12 6.36-6.36 2.12 2.12-6.36 6.36-2.12z"/></symbol>     <!-- bot -->     <symbol id="i-bot" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="2"/><path d="M12 7v4M8 16h.01M16 16h.01"/></symbol>     <!-- gauge -->     <symbol id="i-gauge" viewBox="0 0 24 24"><circle cx="12" cy="13" r="9"/><path d="M12 13l5-5"/><circle cx="12" cy="13" r="1" class="icon--filled"/></symbol>     <!-- video -->     <symbol id="i-video" viewBox="0 0 24 24"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2"/></symbol>     <!-- coffee -->     <symbol id="i-coffee" viewBox="0 0 24 24"><path d="M18 8h1a4 4 0 010 8h-1M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM6 1v3M10 1v3M14 1v3"/></symbol>   </defs> </svg> ';
  var holder = document.createElement('div');
  holder.style.position = 'absolute';
  holder.style.width = '0';
  holder.style.height = '0';
  holder.style.overflow = 'hidden';
  holder.setAttribute('aria-hidden', 'true');
  holder.innerHTML = SPRITE;
  document.body.insertBefore(holder, document.body.firstChild);

  /* ---- 2. Mobile drawer open/close ---- */
  var burger = document.querySelector('.a24-burger');
  var drawer = document.querySelector('.a24-drawer');
  if (burger && drawer) {
    var openDrawer = function () { drawer.classList.add('is-open'); document.body.style.overflow = 'hidden'; };
    var closeDrawer = function () { drawer.classList.remove('is-open'); document.body.style.overflow = ''; };
    burger.addEventListener('click', openDrawer);
    drawer.addEventListener('click', function (e) {
      if (e.target === drawer || e.target.closest('.a24-drawer__close') || e.target.closest('.a24-drawer__panel a')) closeDrawer();
    });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeDrawer(); });
  }

  /* ---- 3. FAQ accordion ---- */
  document.querySelectorAll('.a24-faq__q').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var item = btn.closest('.a24-faq__item');
      var isOpen = item.classList.contains('is-open');
      item.parentNode.querySelectorAll('.a24-faq__item').forEach(function (i) { i.classList.remove('is-open'); });
      if (!isOpen) item.classList.add('is-open');
    });
  });

  /* ---- 4. Mobile drawer: expandable services submenu ---- */
  document.querySelectorAll('[data-drawer-toggle]').forEach(function (t) {
    t.addEventListener('click', function (e) {
      e.preventDefault();
      var sub = t.nextElementSibling;
      if (sub) sub.style.display = (sub.style.display === 'block') ? 'none' : 'block';
    });
  });

  /* ---- 5. Active nav highlight (so header markup can be identical everywhere) ---- */
  var path = (location.pathname.split('/').pop() || 'index.html').toLowerCase();
  if (path === '') path = 'index.html';
  document.querySelectorAll('.a24-nav a, .a24-drawer__panel > a').forEach(function (a) {
    var href = (a.getAttribute('href') || '').toLowerCase();
    if (!href || href.charAt(0) === '#' || href.indexOf('tel:') === 0) return;
    if (href === path) a.classList.add('is-active');
    if (href === 'services.html' && path.indexOf('service') === 0) a.classList.add('is-active');
  });

  /* ---- 6. Shared mobile bottom CTA ---- */
  if (!document.querySelector('.a24-sticky-cta')) {
    var headerCta = document.querySelector('.a24-header__cta .btn--primary');
    if (headerCta) {
      var stickyCta = document.createElement('div');
      var stickyLink = document.createElement('a');
      stickyCta.className = 'a24-sticky-cta';
      stickyLink.className = 'a24-sticky-cta__btn';
      stickyLink.href = headerCta.getAttribute('href') || 'contact.html';
      stickyLink.innerHTML = '<svg class="icon"><use href="#i-phone"/></svg><span>Book a Call</span><svg class="icon arr"><use href="#i-arrow"/></svg>';
      stickyCta.appendChild(stickyLink);
      document.body.appendChild(stickyCta);
    }
  }

  /* ---- 7. Hero typewriter (types then deletes, loops) ---- */
  var tw = document.querySelector('[data-typewriter]');
  if (tw) {
    var phrases = [];
    try { phrases = JSON.parse(tw.getAttribute('data-typewriter')); } catch (e) { phrases = []; }
    if (phrases.length) {
      var pi = 0, ci = 0, deleting = false;
      var type = function () {
        var word = phrases[pi];
        ci += deleting ? -1 : 1;
        tw.textContent = word.substring(0, ci);
        var delay = deleting ? 45 : 90;
        if (!deleting && ci === word.length) { delay = 1600; deleting = true; }
        else if (deleting && ci === 0) { deleting = false; pi = (pi + 1) % phrases.length; delay = 350; }
        setTimeout(type, delay);
      };
      type();
    }
  }

  /* ---- 8. Client logo category tabs ---- */
  document.querySelectorAll('[data-logos]').forEach(function (root) {
    var tabs = root.querySelectorAll('.a24-logos__tab');
    var panels = root.querySelectorAll('.a24-logos__cat');
    var activate = function (tab) {
      var cat = tab.getAttribute('data-cat');
      tabs.forEach(function (t) {
        var on = t === tab;
        t.classList.toggle('is-active', on);
        t.setAttribute('aria-selected', on ? 'true' : 'false');
      });
      panels.forEach(function (p) {
        p.classList.toggle('is-active', p.getAttribute('data-cat') === cat);
      });
    };
    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () { activate(tab); });
    });
    // Sync panels to whichever tab is marked active on load (e.g. the "All" tab).
    var initial = root.querySelector('.a24-logos__tab.is-active') || tabs[0];
    if (initial) activate(initial);
  });

  /* ---- 9. Stat cards: count up when visible ---- */
  var statNums = Array.prototype.slice.call(document.querySelectorAll('.a24-statblock__num'));
  if (statNums.length) {
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var formatStat = function (value, decimals) {
      return decimals ? value.toFixed(decimals) : Math.round(value).toString();
    };
    var setStat = function (el, value) {
      el.innerHTML = formatStat(value, el._a24Decimals) + '<em>' + el._a24Suffix + '</em>';
    };
    var animateStat = function (el) {
      if (el._a24Done) return;
      el._a24Done = true;

      if (reduceMotion) {
        setStat(el, el._a24Target);
        return;
      }

      var start = null;
      var duration = 1400;
      var tick = function (time) {
        if (!start) start = time;
        var progress = Math.min((time - start) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3);
        setStat(el, el._a24Target * eased);
        if (progress < 1) {
          requestAnimationFrame(tick);
        } else {
          setStat(el, el._a24Target);
        }
      };
      requestAnimationFrame(tick);
    };

    statNums.forEach(function (el) {
      var raw = el.textContent.trim();
      var match = raw.match(/^([\d.]+)\s*([^0-9.]*)$/);
      if (!match) return;

      el._a24Target = parseFloat(match[1]);
      el._a24Decimals = (match[1].split('.')[1] || '').length;
      el._a24Suffix = match[2] || '';
      setStat(el, 0);
    });

    if ('IntersectionObserver' in window) {
      var statObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          entry.target.querySelectorAll('.a24-statblock__num').forEach(animateStat);
          observer.unobserve(entry.target);
        });
      }, { threshold: 0.35 });
      document.querySelectorAll('.a24-statblocks').forEach(function (section) {
        statObserver.observe(section);
      });
    } else {
      statNums.forEach(animateStat);
    }
  }

  /* ---- 10. Client dashboard videos: lazy load + themed play/pause ---- */
  document.querySelectorAll('.a24-vid').forEach(function (card) {
    var video = card.querySelector('.a24-vid__player');
    var btn = card.querySelector('.a24-vid__toggle');
    if (!video || !btn) return;

    var toggle = function () {
      if (video.paused || video.ended) {
        // Only ever one clip playing at a time.
        document.querySelectorAll('.a24-vid__player').forEach(function (v) {
          if (v !== video) v.pause();
        });
        // Reveal native scrub / volume / fullscreen once the user has chosen to watch.
        if (!video.controls) video.controls = true;
        video.play();
      } else {
        video.pause();
      }
    };

    btn.addEventListener('click', toggle);
    video.addEventListener('play', function () {
      card.classList.add('is-playing');
      btn.setAttribute('aria-label', 'Pause video');
    });
    video.addEventListener('pause', function () {
      card.classList.remove('is-playing');
      btn.setAttribute('aria-label', 'Play video');
    });
    video.addEventListener('ended', function () {
      card.classList.remove('is-playing');
      btn.setAttribute('aria-label', 'Play video');
    });
  });
})();
