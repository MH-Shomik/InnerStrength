/* =================================================================
   JavaScript for Inner Strength Landing Page
   =================================================================
   - Preloader Logic
   - GSAP Animations (ScrollTrigger)
   - Swiper.js Initialization
   - Particles.js Initialization
   - Mobile Menu Toggle
   - Custom Cursor
   - Scroll Progress Bar
   - Ripple Buttons
   - Expandable Cards
   - Tilt Cards
   =================================================================
*/

document.addEventListener("DOMContentLoaded", function() {

    // --- 1. Preloader Logic ---
    // Wait for the entire window (images, styles) to load
    window.onload = () => {
        const preloader = document.getElementById('preloader');
        const contentWrapper = document.querySelector('.content-wrapper');

        if (preloader) {
            preloader.style.opacity = '0';
            preloader.style.visibility = 'hidden';
            preloader.style.transition = 'opacity 0.5s, visibility 0.5s';
        }

        if (contentWrapper) {
            contentWrapper.classList.remove('hidden-for-load');
            contentWrapper.style.opacity = '1';
            contentWrapper.style.visibility = 'visible';
            contentWrapper.style.transition = 'opacity 0.5s';
        }
        
        // Trigger GSAP animations AFTER the preloader is gone
        if (typeof gsap !== 'undefined') {
            initGsapAnimations();
        }
    };
    
    // Safety fallback: If window.onload fails, hide after 3s
    setTimeout(() => {
         const preloader = document.getElementById('preloader');
         // Check if preloader is still visible
         if (preloader && getComputedStyle(preloader).visibility !== 'hidden') {
             window.onload(); // Manually trigger
         }
    }, 3000);

    // --- 2. Mobile Menu Toggle ---
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close menu when a link is clicked
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });
    }

    

    // --- 4. Scroll Progress Bar ---
    const scrollProgressBar = document.getElementById('scroll-progress-bar');
    if (scrollProgressBar) {
        window.addEventListener('scroll', () => {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercentage = (scrollTop / scrollHeight) * 100;
            scrollProgressBar.style.width = `${scrollPercentage}%`;
        });
    }

    // --- 5. Particles.js Initialization ---
    // Using new color scheme: #B1C9EF, #8AAEE0
    if (typeof particlesJS !== 'undefined') {
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#8AAEE0" // is-accent-light
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#B1C9EF", // is-border
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 3,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    }

    // --- 6. Swiper.js Testimonial Slider ---
    if (typeof Swiper !== 'undefined') {
        new Swiper('.testimonial-slider', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    }

    // --- 7. Button Ripple Effect ---
    function createRipple(event) {
        const button = event.currentTarget;
        const ripple = document.createElement('span');
        const rect = button.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;

        ripple.style.width = ripple.style.height = `${size}px`;
        ripple.style.left = `${x}px`;
        ripple.style.top = `${y}px`;
        ripple.classList.add('ripple');

        // Check for accent button
        if(button.classList.contains('btn-ripple-accent')) {
            ripple.style.background = 'rgba(0,0,0,0.1)';
        } else {
            ripple.style.background = 'rgba(255,255,255,0.5)';
        }

        const existingRipple = button.querySelector('.ripple');
        if (existingRipple) {
            existingRipple.remove();
        }

        button.appendChild(ripple);
        
        ripple.addEventListener('animationend', () => {
            if (ripple.parentElement) {
                 ripple.remove();
            }
        });
    }

    const rippleButtons = document.querySelectorAll('.btn-ripple');
    rippleButtons.forEach(button => {
        button.addEventListener('click', createRipple);
    });

    // --- 8. Service Card Expandable Content ---
    const expandButtons = document.querySelectorAll('.expand-btn');
    expandButtons.forEach(button => {
        button.addEventListener('click', () => {
            const content = button.previousElementSibling;
            const btnText = button.querySelector('.btn-text');

            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                if (btnText) btnText.textContent = 'Learn Less';
            } else {
                content.classList.add('hidden');
                if (btnText) btnText.textContent = 'Learn More';
            }
        });
    });

    // --- 9. 3D Tilt Cards ---
    const tiltCards = document.querySelectorAll('.tilt-card');
    tiltCards.forEach(card => {
        const tiltInner = card.querySelector('.tilt-card-inner') || card;
        
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const width = rect.width;
            const height = rect.height;
            
            const rotateX = (y / height - 0.5) * -10; // Max 5deg tilt
            const rotateY = (x / width - 0.5) * 10;  // Max 5deg tilt

            tiltInner.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.03)`;
            tiltInner.style.transition = 'transform 0.1s ease-out';
        });

        card.addEventListener('mouseleave', () => {
            tiltInner.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
            tiltInner.style.transition = 'transform 0.5s ease-out';
        });
    });
    
    // --- 10. Magnetic Buttons (Simple) ---
    const magneticElements = document.querySelectorAll('[data-magnetic]');
    magneticElements.forEach(el => {
        el.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;

            this.style.transform = `translate(${x * 0.15}px, ${y * 0.15}px)`;
            this.style.transition = 'transform 0.1s';
        });

        el.addEventListener('mouseleave', function() {
            this.style.transform = 'translate(0, 0)';
            this.style.transition = 'transform 0.3s';
        });
    });

});

// --- 11. GSAP Animations Function ---
// This is called by the window.onload function AFTER preloader is hidden
function initGsapAnimations() {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
        console.error('GSAP or ScrollTrigger is not loaded');
        return;
    }

    gsap.registerPlugin(ScrollTrigger);

    // General fade-in reveal
    gsap.utils.toArray('.gsap-reveal').forEach(el => {
        gsap.fromTo(el, {
            opacity: 0,
            y: 50
        }, {
            opacity: 1,
            y: 0,
            duration: 1,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 85%',
                toggleActions: 'play none none none',
            }
        });
    });

    // Hero text reveal (staggered)
    gsap.fromTo(".gsap-reveal-text > *", {
        opacity: 0,
        y: 30
    }, {
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: 'power3.out',
        stagger: 0.15,
        delay: 0.2 // Small delay after load
    });

    // Number counters
    gsap.utils.toArray('.counter').forEach(counter => {
        const goal = parseInt(counter.dataset.goal, 10);
        const start = { val: 0 };
        
        gsap.to(start, {
            val: goal,
            duration: 3,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: counter,
                start: 'top 90%',
                toggleActions: 'play none none none',
            },
            onUpdate: () => {
                counter.textContent = Math.ceil(start.val);
            }
        });
    });

    // Process path draw
    const path = document.getElementById('process-path-draw');
    if (path) {
        gsap.fromTo(path, {
            strokeDashoffset: 1000
        }, {
            strokeDashoffset: 0,
            duration: 3,
            ease: 'power2.inOut',
            scrollTrigger: {
                trigger: path,
                start: 'top 80%',
                toggleActions: 'play none none none',
            }
        });
    }
}