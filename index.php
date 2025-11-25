<?php
// Start session to handle contact form messages
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inner Strength - Special Child Neurodevelopment Care</title>
    <link rel="icon" href="uploads/logo-1639445951.jpg" type="image/jpeg">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- Swiper.js for Testimonials -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    
    <!-- External Stylesheet -->
    <link rel="stylesheet" href="landing-style.css">

    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'is-bg': '#F0F3FA',
            'is-bg-secondary': '#D5DEEF',
            'is-border': '#B1C9EF',
            'is-accent-light': '#8AAEE0', // Corrected from #8AAEEO
            'is-accent-dark': '#7894bbff',
            'is-text': '#5177afff',
          }
        }
      }
    }
  </script>

</head>
<!-- UPDATED: Body with new color scheme -->
<body class="text-is-text bg-is-bg transition-colors duration-300">

    <!-- 1. Custom Animated Cursor (Simplified) -->
    <div id="custom-cursor-dot" class="custom-cursor-dot"></div>

    <!-- 2. Interactive Particle Background -->
    <div id="particles-js" class="fixed top-0 left-0 w-full h-full z-[-1]"></div>

    <!-- 3. Scroll Progress Bar -->
    <div id="scroll-progress-bar"></div>

    <!-- 9. Pre-loader -->
    <div id="preloader">
        <div class="loader-dot"></div>
        <div class="loader-dot"></div>
        <div class="loader-dot"></div>
    </div>

    <!-- 
      Content Wrapper
      ALL content (except cursor/particles) goes in here
    -->
    <div class="content-wrapper hidden-for-load">
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 nav-blur border-b border-is-border transition-all duration-300" id="navbar">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <a href="#" class="flex items-center space-x-3" data-magnetic>
                        <div class="w-12 h-12 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-xl flex items-center justify-center shadow-lg">
                            <img src="uploads/logo-1639445951.jpg" alt="Inner Strength Logo" class="w-12 h-12 rounded-xl shadow-lg">
                        </div>
                        <span class="text-2xl font-bold heading-font text-is-text">Inner Strength</span>
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex items-center space-x-6 lg:space-x-8">
                        <a href="#services" class="nav-link" data-magnetic>Services</a>
                        <a href="#about" class="nav-link" data-magnetic>About Us</a>
                        <a href="#team" class="nav-link" data-magnetic>Our Team</a>
                        <a href="#contact" class="nav-link" data-magnetic>Contact</a>
                        
                        <!-- Dark Mode Toggle REMOVED -->
                        
                        <a href="portal/parents_login.php" class="text-is-accent-dark hover:text-is-accent-light font-medium border border-is-accent-dark px-4 py-2 rounded-lg transition-colors" data-magnetic>Parents Login</a>
                       <a href="admin_login.php" class="text-is-accent-dark hover:text-is-accent-light font-medium border border-is-accent-dark px-4 py-2 rounded-lg transition-colors" data-magnetic>Staff Login</a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 text-is-text" id="mobile-menu-btn" aria-label="Toggle Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="hidden md:hidden bg-white border-t border-is-border" id="mobile-menu">
                <div class="px-4 py-4 space-y-3">
                    <a href="#services" class="block text-is-text hover:text-is-accent-dark font-medium py-2">Services</a>
                    <a href="#about" class="block text-is-text hover:text-is-accent-dark font-medium py-2">About Us</a>
                    <a href="#team" class="block text-is-text hover:text-is-accent-dark font-medium py-2">Our Team</a>
                    <a href="#contact" class="block text-is-text hover:text-is-accent-dark font-medium py-2">Contact</a>
                    <a href="portal/parents_login.php" class="block text-is-accent-dark font-medium py-2 border-t border-is-border">Portal Login</a>
                    <a href="admin_login.php" class="block text-is-accent-dark font-medium py-2 border-t border-is-border">Staff Login</a>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center overflow-hidden pt-20 hero-section">
            <!-- Morphing Blobs (NEW: now uses blue/indigo) -->
            <div class="blob w-96 h-96 bg-is-border top-20 left-10"></div>
            <div class="blob w-80 h-80 bg-is-bg-secondary bottom-20 right-10" style="animation-delay: 2s;"></div>
            <div class="blob w-72 h-72 bg-is-border top-1/2 left-1/2" style="animation-delay: 4s;"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 py-20 relative z-10">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Left Content -->
                    <div class="space-y-6 gsap-reveal-text">
                        <!-- UPDATED: Added border-is-border -->
                        <div class="inline-flex items-center gap-1.5 md:gap-2 px-3 py-1 md:px-4 md:py-2 rounded-full bg-white/80 backdrop-blur-sm border border-is-accent-light/50 shadow-[0_2px_10px_rgba(60,120,177,0.15)] hover:shadow-[0_4px_15px_rgba(60,120,177,0.2)] hover:-translate-y-0.5 transition-all duration-300 cursor-default">
    
                            <div class="relative flex items-center justify-center w-5 h-5 md:w-6 md:h-6 rounded-full bg-gradient-to-br from-is-accent-light to-is-accent-dark text-white shadow-sm flex-shrink-0">
                                <svg class="w-2.5 h-2.5 md:w-3.5 md:h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>

                            <span class="text-is-accent-dark font-bold text-xs md:text-sm tracking-wide uppercase">
                                Evidence-Based Care
                            </span>

                        </div>
                        <span><h1 class="text-5xl md:text-6xl lg:text-7xl font-bold heading-font leading-tight text-is-text mb-8">
                            <span class="gradient-text-blue">Nurturing brighter futures for every child</span>
                        </h1></span>
                        <span><p class="text-xl text-is-text leading-relaxed mb-4">
                            Empowering your little one with compassionate, personalized therapy to help them grow, learn, and shine in their own beautiful way.
                        </p></span>
                        <span><div class="flex flex-col sm:flex-row gap-4">
                            <a href="#contact" class="btn-ripple bg-is-accent-dark hover:bg-is-accent-light text-white px-8 py-4 rounded-xl font-semibold text-lg hover:shadow-2xl hover:scale-105 transition-all text-center" data-magnetic>
                               <span class="gradient-text-blue2"> Book a Consultation</span>
                            </a>
                            <a href="#services" class="border-2 border-is-accent-dark text-is-accent-dark px-8 py-4 rounded-xl font-semibold text-lg hover:bg-is-accent-dark hover:text-white transition-all text-center" data-magnetic>
                                Explore Services
                            </a>
                        </div></span>
                        <span><div class="flex items-center space-x-8 pt-4">
                            <div>
                                <div class="text-3xl font-bold text-is-accent-dark counter" data-goal="500">0</div>
                                <div class="text-sm text-is-text opacity-80">Families Helped</div>
                            </div>
                            <div class="border-l border-is-border h-12"></div>
                            <div>
                                <div class="text-3xl font-bold text-is-accent-dark counter" data-goal="5">0</div>
                                <div class="text-sm text-is-text opacity-80">Years Experience</div>
                            </div>
                            <div class="border-l border-is-border h-12"></div>
                            <div>
                                <div class="text-3xl font-bold text-is-accent-dark counter" data-goal="98">0</div>
                                <div class="text-sm text-is-text opacity-80">Satisfaction Rate</div>
                            </div>
                        </div></span>
                    </div>

                    <!-- Right Content - Floating Image -->
                    <div class="relative hidden md:block gsap-reveal">
                        <div class="floating">
                            <div class="relative tilt-card">
                                <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-3xl transform rotate-6 opacity-20"></div>
                                <img src="uploads/therapists/hero_image.jpg" alt="Therapy Session" class="relative rounded-3xl shadow-2xl tilt-card-inner">
                            </div>
                        </div>
                        <!-- Floating Cards -->
                        <div class="absolute -bottom-8 -left-8 bg-white p-6 rounded-2xl shadow-xl floating" style="animation-delay: 1s;">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-is-bg-secondary rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-is-accent-dark" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-is-text">12+</div>
                                    <div class="text-sm text-is-text opacity-80">Expert Therapists</div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -top-8 -right-8 bg-white p-6 rounded-2xl shadow-xl floating" style="animation-delay: 2s;">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-is-text">Certified</div>
                                    <div class="text-xs text-is-text opacity-80">Licensed Professionals</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-b from-transparent to-is-bg-secondary pointer-events-none z-0">

            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="pt-12 pb-24 bg-gradient-to-b from-is-bg-secondary to-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 gsap-reveal">
                    <span class="text-is-accent-dark font-semibold text-sm uppercase tracking-wider">Our Approach</span>
                    <h2 class="text-4xl md:text-5xl font-bold heading-font mt-3 mb-4 text-is-text">How We Help Your Child Grow</h2>
                    <p class="text-xl text-is-text opacity-90 max-w-3xl mx-auto">Personalized, evidence-based therapies that address your child's unique needs and unlock their full potential.</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-8">
                    <!-- Service Card 1 -->
                    <div class="tilt-card gsap-reveal" style="perspective: 1500px;">
                        <div class="card-hover tilt-card-inner bg-white rounded-xl md:rounded-2xl shadow-lg p-3 md:p-8 border border-is-border h-full flex flex-col">
                            <div class="w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-is-text">Occupational Therapy</h3>
                            <p class="text-is-text opacity-90 mb-6 leading-relaxed">Helping children develop essential life skills, sensory processing, and motor coordination through play-based interventions.</p>
                            <div class="expandable-content hidden mt-4 space-y-2 text-is-text opacity-90">
                                <p>We focus on fine motor skills, self-care routines, and sensory integration to build independence and confidence.</p>
                            </div>
                            <button class="expand-btn text-is-accent-dark font-semibold hover:text-is-accent-light inline-flex items-center group mt-4">
                                <span class="btn-text">Learn More</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Service Card 2 -->
                    <div class="tilt-card gsap-reveal" style="perspective: 1500px;">
                        <div class="card-hover tilt-card-inner bg-white rounded-xl md:rounded-2xl shadow-lg p-3 md:p-8 border border-is-border h-full flex flex-col">
                            <div class="w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-is-text">Speech Therapy</h3>
                            <p class="text-is-text opacity-90 mb-6 leading-relaxed">Building communication confidence through language development, articulation training, and social communication strategies.</p>
                            <div class="expandable-content hidden mt-4 space-y-2 text-is-text opacity-90">
                                <p>Our pathologists address speech sound disorders, language delays, fluency, and social pragmatics.</p>
                            </div>
                            <button class="expand-btn text-is-accent-dark font-semibold hover:text-is-accent-light inline-flex items-center group mt-4">
                                <span class="btn-text">Learn More</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Service Card 3 -->
                    <div class="tilt-card gsap-reveal" style="perspective: 1500px;">
                        <div class="card-hover tilt-card-inner bg-white rounded-xl md:rounded-2xl shadow-lg p-3 md:p-8 border border-is-border h-full flex flex-col">
                            <div class="w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-is-text">Behavioral Therapy</h3>
                            <p class="text-is-text opacity-90 mb-6 leading-relaxed">Evidence-based ABA and behavioral interventions that foster positive behaviors, emotional regulation, and social skills.</p>
                             <div class="expandable-content hidden mt-4 space-y-2 text-is-text opacity-90">
                                <p>We use positive reinforcement to teach new skills and reduce challenging behaviors in a supportive environment.</p>
                            </div>
                            <button class="expand-btn text-is-accent-dark font-semibold hover:text-is-accent-light inline-flex items-center group mt-4">
                                <span class="btn-text">Learn More</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </button>
                        </div>
                    </div>
                    <div class="tilt-card gsap-reveal" style="perspective: 1500px;">
                            <div class="card-hover tilt-card-inner bg-white rounded-xl md:rounded-2xl shadow-lg p-3 md:p-8 border border-is-border h-full flex flex-col">
                                <div class="w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-is-text">Physiotherapy</h3>
                                <p class="text-is-text opacity-90 mb-6 leading-relaxed">Enhancing physical strength, balance, and mobility through specialized exercises and movement therapies.</p>
                                <div class="expandable-content hidden mt-4 space-y-2 text-is-text opacity-90">
                                    <p>We treat physical challenges including gait abnormalities, gross motor delays, and coordination issues to improve independence.</p>
                                </div>
                                <button class="expand-btn text-is-accent-dark font-semibold hover:text-is-accent-light inline-flex items-center group mt-4">
                                    <span class="btn-text">Learn More</span>
                                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </button>
                            </div>
                        </div>

                        <div class="tilt-card gsap-reveal" style="perspective: 1500px;">
                            <div class="card-hover tilt-card-inner bg-white rounded-xl md:rounded-2xl shadow-lg p-3 md:p-8 border border-is-border h-full flex flex-col">
                                <div class="w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                                </div>
                                <h3 class="text-xl font-bold mb-4 text-is-text">Psychological Assessment</h3>
                                <p class="text-is-text opacity-90 mb-6 leading-relaxed">Comprehensive evaluations to identify developmental milestones, cognitive strengths, and emotional needs.</p>
                                <div class="expandable-content hidden mt-4 space-y-2 text-is-text opacity-90">
                                    <p>Our assessments help diagnose conditions like ASD and ADHD, providing a clear roadmap for effective intervention.</p>
                                </div>
                                <button class="expand-btn text-is-accent-dark font-semibold hover:text-is-accent-light inline-flex items-center group mt-4">
                                    <span class="btn-text">Learn More</span>
                                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </button>
                            </div>
                        </div>

                        <div class="tilt-card gsap-reveal" style="perspective: 1500px;">
                            <div class="card-hover tilt-card-inner bg-white rounded-xl md:rounded-2xl shadow-lg p-3 md:p-8 border border-is-border h-full flex flex-col">
                                <div class="w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-is-text">Special Education</h3>
                                <p class="text-is-text opacity-90 mb-6 leading-relaxed">Tailored educational strategies designed to support children with diverse learning needs and styles.</p>
                                <div class="expandable-content hidden mt-4 space-y-2 text-is-text opacity-90">
                                    <p>We focus on school readiness, literacy, and numeracy skills using individualized education plans (IEPs) for every child.</p>
                                </div>
                                <button class="expand-btn text-is-accent-dark font-semibold hover:text-is-accent-light inline-flex items-center group mt-4">
                                    <span class="btn-text">Learn More</span>
                                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section id="about" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 gsap-reveal">
                    <span class="text-is-accent-dark font-semibold text-sm uppercase tracking-wider">Our Process</span>
                    <h2 class="text-4xl md:text-5xl font-bold heading-font mt-3 mb-4 text-is-text">Your Journey with Us</h2>
                    <p class="text-xl text-is-text opacity-90 max-w-3xl mx-auto">A collaborative, step-by-step approach to unlock your child's potential</p>
                </div>

                <div class="relative max-w-4xl mx-auto">
                    <!-- SVG Path for Desktop -->
                    <div class="hidden md:block absolute top-10 left-0 w-full h-full" style="z-index: 0;">
                        <svg width="100%" height="100" viewBox="0 0 800 100" preserveAspectRatio="none">
                            <path id="process-path-draw" d="M 100 50 Q 250 10, 400 50 T 700 50" stroke="#638ECB" stroke-width="3" fill="none" stroke-linecap="round" stroke-dasharray="10 10"/>
                        </svg>
                    </div>

                    <!-- Grid for steps -->
                    <div class="grid md:grid-cols-3 gap-12 relative" style="z-index: 1;">
                        <!-- Step 1 -->
                        <div class="gsap-reveal text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl relative z-10 border-4 border-white">
                                <span class="text-3xl font-bold text-white">1</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-is-text">Initial Consultation</h3>
                            <p class="text-is-text opacity-90 leading-relaxed">We listen to your concerns and understand your child's unique needs in a warm, welcoming environment.</p>
                        </div>

                        <!-- Step 2 -->
                        <div class="gsap-reveal text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl relative z-10 border-4 border-white">
                                <span class="text-3xl font-bold text-white">2</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-is-text">Comprehensive Assessment</h3>
                            <p class="text-is-text opacity-90 leading-relaxed">Our expert team conducts thorough evaluations and creates a personalized therapy plan tailored to your child.</p>
                        </div>

                        <!-- Step 3 -->
                        <div class="gsap-reveal text-center">
                            <div class="w-20 h-20 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl relative z-10 border-4 border-white">
                                <span class="text-3xl font-bold text-white">3</span>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-is-text">Ongoing Support</h3>
                            <p class="text-is-text opacity-90 leading-relaxed">We partner with you throughout your journey, tracking progress and adjusting strategies for continued success.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section id="team" class="py-24 bg-gradient-to-b from-white to-is-bg-secondary">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 gsap-reveal">
                    <span class="text-is-accent-dark font-semibold text-sm uppercase tracking-wider">Our Team</span>
                    <h2 class="text-4xl md:text-5xl font-bold heading-font mt-3 mb-4 text-is-text">Meet Our Expert Therapists</h2>
                    <p class="text-xl text-is-text opacity-90 max-w-3xl mx-auto">Licensed professionals dedicated to making a difference in your child's life</p>
                </div>

               <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-8">
                    <!-- Team Member 1 -->
                    <div class="gsap-reveal text-center card-hover tilt-card pb-6" style="perspective: 1000px;">
                        <div class="relative mb-6 group tilt-card-inner">
                            <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl transform rotate-6 opacity-20 group-hover:rotate-12 transition-transform"></div>
                            <img src="uploads/therapists/therapist-male.png" alt="Mansur Rahman" class="relative rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-is-text">Mansur Rahman</h3>
                        <p class="text-is-accent-dark font-semibold mb-2">Senior Physio Therapist</p>
                        <p class="text-is-text opacity-80 text-sm"></p>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="gsap-reveal text-center card-hover tilt-card pb-6" style="perspective: 1000px;">
                        <div class="relative mb-6 group tilt-card-inner">
                            <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl transform -rotate-6 opacity-20 group-hover:-rotate-12 transition-transform"></div>
                            <img src="uploads/therapists/therapist-male.png" alt="Md. Shariful Islam Dipu" class="relative rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-is-text">Md. Shariful Islam Dipu</h3>
                        <p class="text-is-accent-dark font-semibold mb-2">Senior Occupational therapist, CRP-Dhaka.</p>
                        <p class="text-is-text opacity-80 text-sm"></p>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="gsap-reveal text-center card-hover tilt-card pb-6" style="perspective: 1000px;">
                        <div class="relative mb-6 group tilt-card-inner">
                            <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl transform rotate-6 opacity-20 group-hover:rotate-12 transition-transform"></div>
                            <img src="uploads/therapists/therapist-female.png" alt="Fatema Akter Samira" class="relative rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-is-text">Fatema Akter Samira</h3>
                        <p class="text-is-accent-dark font-semibold mb-2">Senior Psychologist</p>
                        <p class="text-is-text opacity-80 text-sm"></p>
                    </div>

                    <!-- Team Member 4 -->
                    <div class="gsap-reveal text-center card-hover tilt-card pb-6" style="perspective: 1000px;">
                        <div class="relative mb-6 group tilt-card-inner">
                            <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl transform rotate-6 opacity-20 group-hover:rotate-12 transition-transform"></div>
                            <img src="uploads/therapists/therapist-male.png" alt="Sujon Kumar Mandal" class="relative rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-is-text">Sujon Kumar Mandal</h3>
                        <p class="text-is-accent-dark font-semibold mb-2">Physio Therapist</p>
                        <p class="text-is-text opacity-80 text-sm"></p>
                    </div>

                    <!-- Team Member 5 -->
                    <div class="gsap-reveal text-center card-hover tilt-card pb-6" style="perspective: 1000px;">
                        <div class="relative mb-6 group tilt-card-inner">
                            <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl transform rotate-6 opacity-20 group-hover:rotate-12 transition-transform"></div>
                            <img src="uploads/therapists/therapist-female.png" alt="Nilanjona Sultana Dolon" class="relative rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-is-text">Nilanjona Sultana Dolon</h3>
                        <p class="text-is-accent-dark font-semibold mb-2">Senior Child Development Therapist</p>
                        <p class="text-is-text opacity-80 text-sm"></p>
                    </div>
                    <!-- Team Member 6 -->
                    <div class="gsap-reveal text-center card-hover tilt-card pb-6" style="perspective: 1000px;">
                        <div class="relative mb-6 group tilt-card-inner">
                            <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl transform rotate-6 opacity-20 group-hover:rotate-12 transition-transform"></div>
                            <img src="uploads/therapists/therapist-male.png" alt="Sareful Islam Emon" class="relative rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-is-text">Sareful Islam Emon</h3>
                        <p class="text-is-accent-dark font-semibold mb-2">Physio Therapist</p>
                        <p class="text-is-text opacity-80 text-sm"></p>
                    </div>
                    <!-- Team Member 7 -->
                    <div class="gsap-reveal text-center card-hover tilt-card pb-6" style="perspective: 1000px;">
                        <div class="relative mb-6 group tilt-card-inner">
                            <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl transform rotate-6 opacity-20 group-hover:rotate-12 transition-transform"></div>
                            <img src="uploads/therapists/therapist-male.png" alt="Taposh Kumar Mandal" class="relative rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-is-text">Taposh Kumar Mandal</h3>
                        <p class="text-is-accent-dark font-semibold mb-2">Physio Therapist</p>
                        <p class="text-is-text opacity-80 text-sm"></p>
                    </div>
                    <!-- Team Member 8 -->
                    <div class="gsap-reveal text-center card-hover tilt-card pb-6" style="perspective: 1000px;">
                        <div class="relative mb-6 group tilt-card-inner">
                            <div class="absolute inset-0 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl transform rotate-6 opacity-20 group-hover:rotate-12 transition-transform"></div>
                            <img src="uploads/therapists/therapist-male.png" alt="Sabbir Hossain" class="relative rounded-2xl shadow-lg w-full aspect-square object-cover">
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-is-text">Sabbir Hossain</h3>
                        <p class="text-is-accent-dark font-semibold mb-2">Physio Therapist</p>
                        <p class="text-is-text opacity-80 text-sm"></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="relative py-24 bg-gradient-to-b from-is-bg-secondary to-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 gsap-reveal">
                    <span class="text-is-accent-dark font-semibold text-sm uppercase tracking-wider">Testimonials</span>
                    <h2 class="text-4xl md:text-5xl font-bold heading-font mt-3 mb-4 text-is-text">What Families Are Saying</h2>
                    <p class="text-xl text-is-text opacity-90 max-w-3xl mx-auto">Real stories from parents who've seen their children thrive</p>
                </div>

                <!-- Swiper.js Slider -->
                <div class="swiper testimonial-slider gsap-reveal">
                    <div class="swiper-wrapper pb-16">
                        <!-- Testimonial 1 -->
                        <div class="swiper-slide h-auto">
                            <div class="testimonial-card rounded-2xl p-8 shadow-lg border border-is-border h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex mb-4 text-yellow-400">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    </div>
                                    <p class="text-is-text opacity-90 mb-6 leading-relaxed italic">"The team at Inner Strength has been a blessing for our family. My son has made incredible progress in just six months. They truly care about each child's success."</p>
                                </div>
                                <div class="flex items-center mt-auto">
                                    <div class="w-12 h-12 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-full flex items-center justify-center text-white font-bold text-lg">S</div>
                                    <div class="ml-4">
                                        <div class="font-bold text-is-text">Afroza Khatun</div>
                                        <div class="text-sm text-is-text opacity-80">Parent of 6-year-old</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 2 -->
                        <div class="swiper-slide h-auto">
                            <div class="testimonial-card rounded-2xl p-8 shadow-lg border border-is-border h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex mb-4 text-yellow-400">
                                        <!-- 5 stars -->
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    </div>
                                    <p class="text-is-text opacity-90 mb-6 leading-relaxed italic">"Professional, compassionate, and effective. Our daughter's speech has improved dramatically. We couldn't have asked for a better experience."</p>
                                </div>
                                <div class="flex items-center mt-auto">
                                    <div class="w-12 h-12 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-full flex items-center justify-center text-white font-bold text-lg">M</div>
                                    <div class="ml-4">
                                        <div class="font-bold text-is-text">Ali Asgar</div>
                                        <div class="text-sm text-is-text opacity-80">Parent of 4-year-old</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Testimonial 3 -->
                        <div class="swiper-slide h-auto">
                            <div class="testimonial-card rounded-2xl p-8 shadow-lg border border-is-border h-full flex flex-col justify-between">
                                <div>
                                    <div class="flex mb-4 text-yellow-400">
                                        <!-- 5 stars -->
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    </div>
                                    <p class="text-is-text opacity-90 mb-6 leading-relaxed italic">"From day one, we felt supported. The personalized approach has helped my son develop skills we never thought possible. Highly recommend!"</p>
                                </div>
                                <div class="flex items-center mt-auto">
                                    <div class="w-12 h-12 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-full flex items-center justify-center text-white font-bold text-lg">J</div>
                                    <div class="ml-4">
                                        <div class="font-bold text-is-text">Jenny Akter</div>
                                        <div class="text-sm text-is-text opacity-80">Parent of 8-year-old</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
           <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-b from-transparent to-is-accent-light z-15 pointer-events-none"></div>
        </section>

        <!-- CTA Section -->
        <section id="book" class="py-24 bg-gradient-to-b from-is-accent-light to-is-accent-dark relative overflow-hidden">
            <!-- Morphing Blobs -->
            <div class="blob w-96 h-96 bg-white top-0 right-0" style="opacity: 0.1;"></div>
            <div class="blob w-80 h-80 bg-white bottom-0 left-0" style="opacity: 0.1; animation-delay: 3s;"></div>

            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 gsap-reveal">
                <h2 class="text-4xl md:text-5xl font-bold heading-font text-white mb-6">Ready to Take the Next Step?</h2>
                <p class="text-xl text-is-bg mb-10 leading-relaxed">Schedule your free, no-obligation consultation today and discover how we can help your child thrive.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="#contact" 
                       class="btn-ripple bg-white text-is-accent-dark px-10 py-4 rounded-xl font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all"
                       data-magnetic>
                        Book a Consultation
                    </a>
                    <a href="tel:+880 1914-672205" 
                       class="btn-ripple border-2 border-is-bg-secondary text-white px-10 py-4 rounded-xl font-bold text-lg hover:bg-white hover:text-is-accent-dark transition-all"
                       data-magnetic>
                        Call Us Now
                    </a>
                </div>
                <p class="text-is-bg mt-6 text-sm">Or call us at <a href="tel:+8801914672205" class="font-bold underline" data-magnetic>(019) 146 72205</a></p>
            </div>
        </section>

        <!-- 
        ===========================
        REDESIGNED CONTACT SECTION
        ===========================
    -->
        <section id="contact" class="relative py-24 bg-gradient-to-b from-is-accent-dark to-is-bg-secondary overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    
                    <!-- Left Side: Contact Info (Redesigned) -->
                    <div class="relative z-20 gsap-reveal">
                        <span class="text-is-bg font-semibold text-sm uppercase tracking-wider">Contact Us</span>
                        <h2 class="text-is-bg text-4xl md:text-5xl font-bold heading-font mt-3 mb-6 text-is-text">Get in Touch</h2>
                        <p class="text-is-bg text-xl text-is-text opacity-90 mb-8 leading-relaxed">
                            We're here to answer your questions and help your child begin their journey.
                        </p>

                        <div class="space-y-6">
                            <!-- Info Card 1: Visit -->
                            <div class="flex items-start space-x-4 tilt-card" style="perspective: 1000px;">
                                <div class="tilt-card-inner flex-shrink-0 w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-2xl mb-1 text-is-bg">Visit Us</h3>
                                    <p class="text-is-bg opacity-90 text-lg">Mirpur 10, Opposite of Panir Tanki<br>Dhaka-1216</p>
                                </div>
                            </div>

                            <!-- Info Card 2: Call -->
                            <div class="flex items-start space-x-4 tilt-card" style="perspective: 1000px;">
                                <div class="tilt-card-inner flex-shrink-0 w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-2xl mb-1 text-is-bg">Call Us</h3>
                                    <a href="tel:+880 1914-672205" class="text-is-bg opacity-90 hover:text-is-accent-dark font-semibold text-lg" data-magnetic>+880 1914-672205</a>
                                </div>
                            </div>

                            <!-- Info Card 3: Email -->
                            <div class="flex items-start space-x-4 tilt-card" style="perspective: 1000px;">
                                <div class="tilt-card-inner flex-shrink-0 w-16 h-16 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-2xl mb-1 text-is-bg">Email Us</h3>
                                    <a href="mailto:innerstrength.childcare@gmail.com" class="text-is-bg opacity-90 hover:text-is-accent-dark font-semibold text-lg" data-magnetic>innerstrength.childcare@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Contact Form (Redesigned) -->
                    <div class="relative z-20 bg-white rounded-2xl shadow-xl p-8 md:p-10 gsap-reveal border border-is-border">
                        
                        <!-- PHP Success/Error Messages -->
                        <?php if (isset($_SESSION['form_success'])): ?>
                            <div class="mb-4 rounded-md bg-green-50 p-4 border border-green-200">
                                <h3 class="text-sm font-medium text-green-800">Message Sent!</h3>
                                <p class="mt-1 text-sm text-green-700"><?php echo $_SESSION['form_success']; ?></p>
                            </div>
                            <?php unset($_SESSION['form_success']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['form_error'])): ?>
                            <div class="mb-4 rounded-md bg-red-50 p-4 border border-red-200">
                                <h3 class="text-sm font-medium text-red-800">Error</h3>
                                <p class="mt-1 text-sm text-red-700"><?php echo $_SESSION['form_error']; ?></p>
                            </div>
                            <?php unset($_SESSION['form_error']); ?>
                        <?php endif; ?>
                        <!-- End PHP Messages -->

                        <!-- Updated Form -->
                        <form action="contact_form_handler.php" method="POST" class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-is-text mb-2">Your Name</label>
                                <input type="text" name="name" id="name" class="form-input-premium" placeholder="John Doe" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-semibold text-is-text mb-2">Email Address</label>
                                <input type="email" name="email" id="email" class="form-input-premium" placeholder="john@example.com" required>
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-is-text mb-2">Phone Number <span class="opacity-70">(Optional)</span></label>
                                <input type="tel" name="phone" id="phone" class="form-input-premium" placeholder="(123) 456-7890">
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-semibold text-is-text mb-2">Message</label>
                                <textarea rows="4" name="message" id="message" class="form-input-premium" placeholder="Tell us about your child and how we can help..." required></textarea>
                            </div>
                            <button type="submit" 
                                    class="btn-ripple w-full bg-is-accent-dark hover:bg-is-accent-light text-white px-8 py-4 rounded-lg font-bold text-lg hover:shadow-xl hover:scale-105 transition-all"
                                    data-magnetic>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-32 md:h-64 bg-gradient-to-b from-transparent to-is-text pointer-events-none z-10"></div>
        </section>

        <!-- 
        ===========================
        REDESIGNED FOOTER SECTION
        ===========================
    -->
        <footer class="bg-is-text text-is-bg pt-16 footer-glow-border">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-12 mb-12">
                    
                    <!-- Column 1: Brand & Socials -->
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-is-accent-light to-is-accent-dark rounded-xl flex items-center justify-center shadow-lg">
                               <img src="uploads/logo-1639445951.jpg" alt="Inner Strength Logo" class="w-12 h-12 rounded-xl shadow-lg">
                            </div>
                            <span class="text-2xl font-bold heading-font text-white">Inner Strength</span>
                        </div>
                        <p class="text-is-bg-secondary leading-relaxed mb-6 max-w-lg">
                            Empowering children with neurodevelopmental differences to reach their full potential through compassionate, evidence-based care.
                        </p>
                        <div class="flex space-x-4">
                            <a href="https://www.facebook.com/p/Inner-Strength-61564264974654/" class="footer-social-icon" data-magnetic aria-label="Facebook">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path></svg>
                            </a>
                           
                        </div>
                    </div>

                    <!-- Column 2: Quick Links -->
                    <div>
                        <h3 class="text-lg font-bold text-white mb-4">Quick Links</h3>
                        <ul class="space-y-3">
                            <li><a href="#services" class="footer-link" data-magnetic>Services</a></li>
                            <li><a href="#about" class="footer-link" data-magnetic>About Us</a></li>
                            <li><a href="#team" class="footer-link" data-magnetic>Our Team</a></li>
                            <li><a href="#contact" class="footer-link" data-magnetic>Contact</a></li>
                            <li><a href="portal/parents_login.php" class="footer-link" data-magnetic>Parent Portal</a></li>
                        </ul>
                    </div>

                    <!-- Column 3: Our Services -->
                    <div>
                        <h3 class="text-lg font-bold text-white mb-4">Our Services</h3>
                        <ul class="space-y-3">
                            <li><a href="#services" class="footer-link" data-magnetic>Occupational Therapy</a></li>
                            <li><a href="#services" class="footer-link" data-magnetic>Speech Therapy</a></li>
                            <li><a href="#services" class="footer-link" data-magnetic>Behavioral Therapy</a></li>
                            <li><a href="#services" class="footer-link" data-magnetic>Assessments</a></li>
                        </ul>
                    </div>

                    <!-- Column 4: Contact Info -->
                    <div>
                        <h3 class="text-lg font-bold text-white mb-4">Contact Info</h3>
                        <ul class="space-y-3">
                            <li class="text-is-bg-secondary">Mirpur 10, Opposite of Panir Tanki<br>Dhaka-1216</li>
                            <li><a href="tel:01329593162" class="footer-link" data-magnetic>+880 1914-672205</a></li>
                            <li><a href="mailto:innerstrength.childcare@gmail.com" class="footer-link" data-magnetic>innerstrength.childcare@gmail.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-is-accent-dark pt-8 text-center text-is-bg-secondary">
                    <p>&copy; <?php echo date('Y'); ?> Inner Strength. All rights reserved.</p>
                </div>
            </div>
        </footer>
        <!-- End Redesigned Footer -->

    </div> <!-- End .content-wrapper -->

    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- External JavaScript -->
    <script src="landing-script.js"></script>

</body>
</html>