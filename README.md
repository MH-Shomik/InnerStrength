# InnerStrength

# Inner Strength - Special Child Neurodevelopment Care

**Inner Strength** is a responsive, interactive web application designed for a neurodevelopmental care center. It serves as a digital gateway for parents seeking specialized therapy for children (Autism, ADHD, etc.), featuring a modern landing page, service details, and access to parent/staff portals.

## 📖 Table of Contents
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Project Structure](#-project-structure)
- [Installation](#-installation)
- [Configuration](#-configuration)

## ✨ Features

### Frontend Experience
* **Interactive UI/UX:** Features a custom animated cursor, particle background effects, and a scroll progress bar.
* **Modern Animations:** Utilizes GSAP for scroll-triggered text reveals and "tilt" effects on service cards.
* **Responsive Design:** Fully mobile-responsive navigation with a toggleable hamburger menu.
* **Testimonial Slider:** Integrated Swiper.js carousel to display parent reviews.

### Core Functionality
* **Service Showcase:** Detailed sections for Occupational Therapy, Speech Therapy, Behavioral Therapy, Physiotherapy, and Special Education.
* **Team Section:** Profiles of licensed therapists and psychologists.
* **Contact System:** Functional contact form with PHP session-based success/error message handling.
* **Portal Integration:** Direct access links for the Parents Portal and Staff/Admin Login.

## 🛠 Tech Stack

**Languages:**
* ![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) (Backend logic & Session management)
* ![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
* ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

**Styling:**
* **Tailwind CSS** (via CDN): Used for utility-first styling and custom color configuration.
* **Google Fonts:** Uses 'Inter' and 'Playfair Display'.

**Libraries & Plugins:**
* [GSAP & ScrollTrigger](https://greensock.com/gsap/): For high-performance animations.
* [Swiper.js](https://swiperjs.com/): For touch-enabled sliders.
* [Particles.js](https://vincentgarreau.com/particles.js/): For the interactive background.

## 📂 Project Structure

Based on the file references in `index.php`, the project requires the following structure:

```text
/
├── index.php                # Main landing page
├── admin_login.php          # Staff login page
├── contact_form_handler.php # PHP script to process form submissions
├── landing-style.css        # Custom external CSS
├── landing-script.js        # Custom external JS for animations/logic
├── uploads/                 # Directory for images
│   ├── logo-1639445951.jpg
│   └── therapists/          # Team member images
└── portal/
    └── parents_login.php    # Parent portal login
🚀 InstallationClone the repository:Bashgit clone [https://github.com/yourusername/inner-strength-care.git](https://github.com/yourusername/inner-strength-care.git)
Set up a Local Server:Since this project uses PHP, you need a local server environment like XAMPP, WAMP, or MAMP.Deploy Files:Move the project folder into your server's root directory (e.g., htdocs for XAMPP or www for WAMP).Run the Project:Open your browser and navigate to:http://localhost/inner-strength-care/index.php🎨 Color PaletteThe project uses a custom Tailwind configuration focused on calming blue tones:Color NameHex CodeUsageis-bg#F0F3FAMain Backgroundis-bg-secondary#D5DEEFSecondary Backgroundis-border#B1C9EFBordersis-accent-light#8AAEE0Gradients & Highlightsis-accent-dark#7894bbffButtons & Text Highlightsis-text#5177afffPrimary Text Color🤝 ContributingFork the repository.Create a new branch (git checkout -b feature/NewFeature).Commit your changes.Push to the branch.Open a Pull Request.Developed for Inner Strength - Special Child Neurodevelopment Care.
