/* ============================================
   LAUNDRY AZZAM - HOME LANDING PAGE JS
   Lenis smooth scroll + scroll reveal animations
   ============================================ */

document.addEventListener('DOMContentLoaded', function () {

    // ==========================================
    // 1. LENIS SMOOTH SCROLLING
    // ==========================================
    const lenis = new Lenis({
        duration: 1.2,
        easing: function (t) {
            return Math.min(1, 1.001 - Math.pow(2, -10 * t));
        },
        orientation: 'vertical',
        gestureOrientation: 'vertical',
        smoothWheel: true,
        wheelMultiplier: 1,
        touchMultiplier: 2,
        infinite: false,
    });

    // Connect Lenis to RAF loop
    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    // Make anchor links work smoothly with Lenis
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var targetId = this.getAttribute('href');
            if (targetId === '#') return;

            e.preventDefault();
            var target = document.querySelector(targetId);
            if (target) {
                lenis.scrollTo(target, {
                    offset: -80,
                    duration: 1.5,
                });
            }
        });
    });


    // ==========================================
    // 2. SCROLL PROGRESS BAR
    // ==========================================
    var progressBar = document.createElement('div');
    progressBar.className = 'scroll-progress';
    document.body.prepend(progressBar);

    lenis.on('scroll', function (e) {
        var scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
        var scrollPercent = (e.scroll / scrollHeight) * 100;
        progressBar.style.width = scrollPercent + '%';
    });


    // ==========================================
    // 3. FIXED NAVBAR ON SCROLL (ALWAYS VISIBLE)
    // ==========================================
    var navbar = document.getElementById('navbar');

    lenis.on('scroll', function (e) {
        var currentScrollY = e.scroll;

        // Add subtle shadow when scrolled
        if (currentScrollY > 20) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });


    // ==========================================
    // 4. MOBILE NAVIGATION TOGGLE
    // ==========================================
    var navToggle = document.getElementById('navToggle');
    var navMenu = document.getElementById('navMenu');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function () {
            navToggle.classList.toggle('active');
            navMenu.classList.toggle('open');
        });

        navMenu.querySelectorAll('.nav-link').forEach(function (link) {
            link.addEventListener('click', function () {
                navToggle.classList.remove('active');
                navMenu.classList.remove('open');
            });
        });
    }


    // ==========================================
    // 5. ACTIVE NAV LINK ON SCROLL
    // ==========================================
    var sections = document.querySelectorAll('section[id]');
    var navLinks = document.querySelectorAll('.nav-link');

    lenis.on('scroll', function (e) {
        var scrollPos = e.scroll + 200;

        sections.forEach(function (section) {
            var sectionTop = section.offsetTop;
            var sectionHeight = section.offsetHeight;
            var sectionId = section.getAttribute('id');

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                navLinks.forEach(function (link) {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === '#' + sectionId) {
                        link.classList.add('active');
                    }
                });
            }
        });
    });


    // ==========================================
    // 6. INTERSECTION OBSERVER - SCROLL REVEAL
    // ==========================================
    var revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                var delay = parseInt(el.getAttribute('data-delay') || '0', 10);

                setTimeout(function () {
                    el.classList.add('is-visible');
                }, delay);

                // Unobserve after animation (one-time reveal)
                revealObserver.unobserve(el);
            }
        });
    }, {
        threshold: 0.15,
        rootMargin: '0px 0px -60px 0px'
    });

    // Observe all elements with data-animate
    document.querySelectorAll('[data-animate]').forEach(function (el) {
        revealObserver.observe(el);
    });

    // Observe stagger containers
    document.querySelectorAll('[data-animate-stagger]').forEach(function (el) {
        revealObserver.observe(el);
    });


    // ==========================================
    // 7. FEATURE ITEMS STAGGER REVEAL
    // ==========================================
    var featureItems = document.querySelectorAll('.feature-item');

    var featureObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                // Stagger animate each feature item
                featureItems.forEach(function (item, index) {
                    setTimeout(function () {
                        item.classList.add('is-visible');
                    }, index * 200);
                });

                featureObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3,
        rootMargin: '0px'
    });

    var aboutFeatures = document.querySelector('.about-features');
    if (aboutFeatures) {
        featureObserver.observe(aboutFeatures);
    }


    // ==========================================
    // 8. PARALLAX EFFECT ON SCROLL
    // ==========================================
    var parallaxElements = document.querySelectorAll('[data-parallax]');

    lenis.on('scroll', function (e) {
        var scrollY = e.scroll;

        parallaxElements.forEach(function (el) {
            var speed = parseFloat(el.getAttribute('data-speed') || '1');
            var rect = el.getBoundingClientRect();
            var elementCenter = rect.top + rect.height / 2;
            var windowCenter = window.innerHeight / 2;
            var distance = elementCenter - windowCenter;

            // Only apply parallax when element is near viewport
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                var offset = distance * (1 - speed) * 0.5;
                el.style.transform = 'translateY(' + offset + 'px)';
            }
        });
    });


    // ==========================================
    // 9. SERVICE CARDS TILT EFFECT
    // ==========================================
    var serviceCards = document.querySelectorAll('.service-card');

    serviceCards.forEach(function (card) {
        card.addEventListener('mousemove', function (e) {
            var rect = card.getBoundingClientRect();
            var x = e.clientX - rect.left;
            var y = e.clientY - rect.top;
            var centerX = rect.width / 2;
            var centerY = rect.height / 2;

            var rotateX = ((y - centerY) / centerY) * -5;
            var rotateY = ((x - centerX) / centerX) * 5;

            card.style.transform = 'translateY(-10px) perspective(600px) rotateX(' + rotateX + 'deg) rotateY(' + rotateY + 'deg)';
        });

        card.addEventListener('mouseleave', function () {
            card.style.transform = '';
        });
    });


    // ==========================================
    // 10. SERVICES GRID STAGGER ANIMATION
    // ==========================================
    var servicesGrid = document.querySelector('.services-grid');

    if (servicesGrid) {
        var gridObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var cards = entry.target.querySelectorAll('.service-card');
                    cards.forEach(function (card, index) {
                        var delay = parseInt(card.getAttribute('data-delay') || '0', 10);
                        setTimeout(function () {
                            card.classList.add('is-visible');
                        }, delay + (index * 100));
                    });
                    gridObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -40px 0px'
        });

        gridObserver.observe(servicesGrid);
    }


    // ==========================================
    // 11. TEXT SPLIT ANIMATION FOR HERO TITLE
    // ==========================================
    var heroTitle = document.querySelector('.hero-title');
    if (heroTitle && heroTitle.closest('[data-animate]')) {
        // Ensure hero title parent triggers properly
        var heroParent = heroTitle.closest('[data-animate]');
        if (heroParent) {
            heroParent.addEventListener('transitionend', function () {
                heroTitle.style.opacity = '1';
            }, { once: true });
        }
    }


    // ==========================================
    // 12. SCROLL-TRIGGERED SECTION LINE EXPAND
    // ==========================================
    var sectionLines = document.querySelectorAll('.section-line');
    var servicesHeader = document.querySelector('.services-header');

    if (servicesHeader) {
        var lineObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    lineObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        lineObserver.observe(servicesHeader);
    }

});
