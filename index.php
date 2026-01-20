<?php include __DIR__ . '/includes/header.php'; ?>

<style>
/* Animated Card Effects */
.animated-card {
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 4px solid;
  border-image: linear-gradient(45deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4) 1;
  box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
}

.animated-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
}

.animated-card:focus {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
  outline: 3px solid rgba(255, 255, 255, 0.8);
  outline-offset: 2px;
}

.animated-card:focus:not(:focus-visible) {
  outline: none;
}

.animated-card:focus-visible {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
  outline: 3px solid rgba(255, 255, 255, 0.8);
  outline-offset: 2px;
}

.image-container {
  overflow: hidden;
  height: auto;
}

.animated-card:hover .card-image {
  transform: scale(1.1);
}

.animated-card:focus .card-image {
  transform: scale(1.1);
}

/* Transport option cards */
.transport-option {
  border: 4px solid !important;
  border-image: linear-gradient(45deg, #4ECDC4, #45B7D1, #96CEB4, #FFEAA7) 1 !important;
  box-shadow: 0 8px 25px rgba(78, 205, 196, 0.3) !important;
  transition: all 0.3s ease !important;
}

.transport-option:hover {
  box-shadow: 0 12px 35px rgba(78, 205, 196, 0.4) !important;
}

.transport-option:focus {
  box-shadow: 0 12px 35px rgba(78, 205, 196, 0.4) !important;
}

/* Video zoom effect to hide watermark */
#backgroundVideo.zoomed {
  transform: scale(1.3);
  object-position: center;
}
</style>

<!-- Animated Background Elements -->
<div class="position-fixed w-100 h-100" style="z-index: -1; overflow: hidden;">
  <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary" style="opacity: 0.03;"></div>
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 20% 30%, rgba(67, 97, 238, 0.08) 0%, transparent 40%), radial-gradient(circle at 80% 70%, rgba(76, 201, 240, 0.08) 0%, transparent 40%);"></div>
</div>

<!-- Hero Section -->
<section class="hero-banner position-relative" id="home">
  <!-- Background Video -->
  <video id="backgroundVideo" class="position-absolute top-0 start-0 w-100 h-100" style="object-fit: cover; z-index: 0; display: none; opacity: 0;" loop preload="auto">
    <source src="/gg/assets/videos/Binurong Point, Baras, Catanduanes.mp4 " type="video/mp4">
    <source src="<?php echo '/gg/assets/videos/' . rawurlencode('Binurong Point, Baras, Catanduanes.mp4'); ?>" type="video/mp4">
    Your browser does not support the video tag.
  </video>
 <div class="hero-overlay d-flex align-items-center justify-content-center text-center text-white" style="background: transparent;">
    <div class="hero-content container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h1 class="display-4 fw-bold mb-4" style="background: linear-gradient(90deg, #00d4ff, #00ff88, #ffcc00, #ff0066, #ff00ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; font-family: 'Arial Black', sans-serif; font-weight: 900; text-shadow: 3px 3px 8px rgba(0,0,0,0.4); filter: brightness(1.2); letter-spacing: 1px;">
            DISCOVER MAJESTIC BARAS
          </h1>
          <p class="lead mb-4" style="font-size: 1.4rem; line-height: 1.6; color: #ffffff; font-family: 'Georgia', 'Times New Roman', serif; font-style: italic; letter-spacing: 1px; text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
            One Place, One Scan, Endless Stories, Waiting to be Explored
          </p>
          <div class="hero-buttons">
            <a href="#attractions" class="btn btn-primary btn-lg me-3">Explore Now</a>
            <button id="watchVideoBtn" class="btn btn-secondary btn-lg">Watch Video</button>
            <button id="stopVideoBtn" class="btn btn-danger btn-lg" style="display: none;">Stop Video</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<style>
/* Attractions Slideshow Styles */
#attractionsSlideshow {
  transition: opacity 0.5s ease;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(5px);
}

.slideshow-container {
  transition: transform 0.8s ease-in-out;
}

.slide-item img {
  transition: transform 0.8s ease-in-out;
}

/* Hero Section Adjustments */
.hero-overlay {
  background: linear-gradient(to bottom, 
    rgba(0,0,0,0.4) 0%, 
    rgba(0,0,0,0.1) 20%, 
    rgba(0,0,0,0.05) 50%, 
    rgba(0,0,0,0.1) 80%, 
    rgba(0,0,0,0.4) 100%);
}

.hero-title-top {
  animation: fadeInDown 1s ease-out;
}

.hero-slideshow-middle {
  animation: fadeIn 1s ease-out 0.3s both;
}

.hero-content-bottom {
  animation: fadeInUp 1s ease-out 0.6s both;
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: scale(0.95);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive adjustments for hero */
@media (max-width: 768px) {
  .hero-overlay {
    padding: 40px 0 !important;
  }
  
  #attractionsSlideshow {
    height: 250px !important;
  }
  
  .hero-main-title {
    font-size: 2.5rem !important;
  }
  
  .hero-subtitle {
    font-size: 1.2rem !important;
  }
}

@media (max-width: 480px) {
  .hero-overlay {
    padding: 30px 0 !important;
  }
  
  #attractionsSlideshow {
    height: 200px !important;
    border-width: 2px !important;
  }
  
  .hero-main-title {
    font-size: 2rem !important;
  }
  
  .hero-subtitle {
    font-size: 1rem !important;
  }
}
</style>

<!-- About Us Section -->
<section id="about" class="py-5 bg-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0" style="padding: 20px; background: white;">
        <h2 class="display-5 fw-bold mb-4 animated-title" style="white-space: nowrap;">
          <span style="color: #0d6efd; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite;">A</span>
          <span style="color: #198754; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.1s;">b</span>
          <span style="color: #fd7e14; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.2s;">o</span>
          <span style="color: #0d6efd; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.3s;">u</span>
          <span style="color: #198754; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.4s;">t</span>
          <span style="color: #dc3545; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 15px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite;"> </span>
          <span style="color: #0d6efd; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.5s;">B</span>
          <span style="color: #198754; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.6s;">a</span>
          <span style="color: #fd7e14; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.7s;">r</span>
          <span style="color: #0d6efd; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.8s;">a</span>
          <span style="color: #198754; font-family: 'Arial Black', sans-serif; font-weight: 900; margin-right: 8px; text-shadow: 3px 3px 6px rgba(0,0,0,0.3); animation: bounce 2s infinite 0.9s;">s</span>
        </h2>
        <style>
        @keyframes bounce {
          0%, 20%, 50%, 80%, 100% {
            transform: translateY(0) scale(1);
          }
          40% {
            transform: translateY(-10px) scale(1.1);
          }
          60% {
            transform: translateY(-5px) scale(1.05);
          }
        }
        .animated-title {
          position: relative;
          z-index: 10;
        }
        .animated-title span {
          display: inline-block;
          transition: all 0.3s ease;
        }
        .animated-title span:hover {
          transform: scale(1.3) rotate(5deg);
          filter: brightness(1.3);
        }
        </style>
        <p class="lead mb-4" style="font-family: 'Georgia', serif; font-size: 1.1rem; line-height: 1.7; color: #2c3e50; text-align: justify; font-weight: 400; letter-spacing: 0.3px;">
          Baras is a peaceful coastal municipality in eastern part of Catanduanes, known for its dramatic landscapes, rolling hills, and breathtaking ocean views. It is home to natural attractions such as Binurong Point, where grassy cliffs meet Pacific, offering some of the most iconic scenery on the island. With its strong local culture, warm community, and unspoiled environment, Baras reflects the quiet beauty and authentic island life that Catanduanes is known for.
        </p>
        
        <style>
        /* Moving Background Styles */
        .moving-background-container {
            position: relative;
            height: 450px; /* Much bigger height to fit screenshot */
            overflow: hidden;
            border-radius: 15px;
            margin-bottom: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Align to top */
            align-items: center;
        }
        
        .moving-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 300%; /* Much wider - 3x viewport width to fit screenshot */
            height: 100%;
            display: flex;
            animation: scrollBackground 40s linear infinite; /* Slower for better viewing */
        }
        
        .moving-image {
            width: 100vw; /* Each image takes full viewport width */
            height: 100%;
            background-size: cover;
            background-position: center;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }
        
        .moving-image:hover {
            transform: scale(1.05); /* Subtle hover effect */
            z-index: 10;
        }
        
        @keyframes scrollBackground {
            0% {
                transform: translateX(0); /* Start from left */
            }
            100% {
                transform: translateX(-33.33%); /* Move left to right (scroll through 3x width) */
            }
        }
        
        /* Text Positioning */
        .moving-background-container h1,
        .moving-background-container p {
            position: relative;
            z-index: 5; /* Ensure text is above moving background */
            background: rgba(0, 0, 0, 0.7); /* Semi-transparent background for text readability */
            padding: 20px 30px;
            border-radius: 10px;
            margin: 20px 0 0 20px 0; /* Top margin to position at top */
            max-width: 90%;
            text-align: center;
        }
        
        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
          .moving-background-container {
            height: 350px; /* Adjusted for tablets */
          }
          
          .moving-image {
            min-width: 80px;
          }
          
          .moving-background-container h1 {
            font-size: 2.5rem !important; /* Larger for tablets */
            line-height: 1.2 !important;
          }
          
          .moving-background-container h1 span {
            margin-right: 4px !important;
          }
          
          .moving-background-container p {
            font-size: 1.2rem !important; /* Larger for tablets */
            line-height: 1.3 !important;
          }
        }
        
        @media (max-width: 480px) {
          .moving-background-container {
            height: 280px; /* Adjusted for mobile */
          }
          
          .moving-image {
            min-width: 60px;
          }
          
          .moving-background-container h1 {
            font-size: 2rem !important; /* Larger for mobile */
          }
          
          .moving-background-container p {
            font-size: 1.1rem !important; /* Larger for mobile */
          }
        }
        </style>
        <button class="btn btn-primary btn-lg mb-4" data-bs-toggle="modal" data-bs-target="#aboutUsModal">
          <i class="fas fa-info-circle me-2"></i>Learn More About Baras
        </button>
        <div class="row g-4">
          <div class="col-6">
            <div class="text-center p-4 bg-white rounded-3 shadow-sm stat-box animated-stat" data-count="12">
              <h3 class="text-primary fw-bold mb-2 counter">12+</h3>
              <p class="mb-0 fw-semibold">Pristine Beaches</p>
            </div>
          </div>
          <div class="col-6">
            <div class="text-center p-4 bg-white rounded-3 shadow-sm stat-box animated-stat" data-count="300">
              <h3 class="text-primary fw-bold mb-2 counter">300+</h3>
              <p class="mb-0 fw-semibold">Years of Heritage</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row g-4">
          <div class="col-12 mb-3">
            <img src="/gg/assets/images/e.jpg" alt="Discover the Majestic Baras" class="img-fluid rounded-3 shadow-sm w-100 animated-image" style="object-fit: contain; height: 300px;">
          </div>
          <div class="col-12">
            <img src="/gg/assets/images/d.jpg" alt="Baras Scenic View" class="img-fluid rounded-3 shadow-sm w-100 animated-image" style="object-fit: contain; height: 200px;">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const watchBtn = document.getElementById('watchVideoBtn');
  const stopBtn = document.getElementById('stopVideoBtn');
  const backgroundVideo = document.getElementById('backgroundVideo');
  const heroBanner = document.querySelector('.hero-banner');

  // Debug: Check if video element exists
  console.log('Video element found:', !!backgroundVideo);
  console.log('Video source:', backgroundVideo.querySelector('source').src);

  // Attractions Slideshow Functionality
  const slideshowContainer = document.querySelector('.slideshow-container');
  const slides = document.querySelectorAll('.slide-item');
  const attractionsSlideshow = document.getElementById('attractionsSlideshow');
  let currentSlide = 0;
  let slideshowInterval;
  const slideCount = slides.length;

  function startSlideshow() {
    if (slideCount === 0) return;
    
    slideshowInterval = setInterval(() => {
      currentSlide = (currentSlide + 1) % slideCount;
      updateSlideshow();
    }, 4000); // Change slide every 4 seconds
  }

  function updateSlideshow() {
    if (slideshowContainer) {
      const offset = -currentSlide * 100;
      slideshowContainer.style.transform = `translateX(${offset}%)`;
    }
  }

  function showSlideshow() {
    if (attractionsSlideshow) {
      attractionsSlideshow.style.opacity = '1';
      attractionsSlideshow.style.transform = 'scale(1)';
    }
  }

  function hideSlideshow() {
    if (attractionsSlideshow) {
      attractionsSlideshow.style.opacity = '0';
      attractionsSlideshow.style.transform = 'scale(0.95)';
    }
  }

  // Start slideshow on page load
  if (slides.length > 0) {
    startSlideshow();
    showSlideshow();
  }

  // Handle video/slideshow toggle
  watchBtn.addEventListener('click', function () {
    console.log('Watch video button clicked');
    
    // Hide slideshow when video plays
    hideSlideshow();
    
    // Show and play background video with zoom effect
    backgroundVideo.style.display = 'block';
    backgroundVideo.style.opacity = '1';
    backgroundVideo.currentTime = 0;
    backgroundVideo.classList.add('zoomed');
    
    // Try to play the video with error handling
    backgroundVideo.play().then(() => {
      console.log('Video playing successfully');
    }).catch(function(error) {
      console.error('Video play failed:', error);
      alert('Video could not be played. Please check if the file exists.');
    });
    
    // Hide watch button and show stop button
    watchBtn.style.display = 'none';
    stopBtn.style.display = 'inline-block';
  });

  stopBtn.addEventListener('click', function () {
    // Stop and hide background video
    backgroundVideo.pause();
    backgroundVideo.currentTime = 0;
    backgroundVideo.style.display = 'none';
    backgroundVideo.style.opacity = '0';
    backgroundVideo.classList.remove('zoomed');
    
    // Show slideshow again when video stops
    showSlideshow();
    
    // Show watch button and hide stop button
    watchBtn.style.display = 'inline-block';
    stopBtn.style.display = 'none';
    
    // Remove dark overlay
    heroBanner.style.background = '';
  });

  // Optional: Stop video when it ends
  backgroundVideo.addEventListener('ended', function () {
    backgroundVideo.currentTime = 0;
    backgroundVideo.play(); // Loop the video
  });
});

// About Us Section Animations
document.addEventListener('DOMContentLoaded', function () {
  // Animate images when they load
  const images = document.querySelectorAll('.animated-image');
  images.forEach((img, index) => {
    if (img.complete) {
      setTimeout(() => {
        img.classList.add('loaded');
      }, index * 200);
    } else {
      img.addEventListener('load', function() {
        setTimeout(() => {
          img.classList.add('loaded');
        }, index * 200);
      });
    }
  });

  // Animate stat boxes when they come into view
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.animationDelay = '0s';
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.animated-stat').forEach(el => {
    observer.observe(el);
  });
});
</script>

<style>
/* About Us Section Animations */
.stat-box {
  transition: all 0.3s ease;
  border: 2px solid transparent;
}

.stat-box:hover {
  transform: translateY(-8px) scale(1.05);
  box-shadow: 0 15px 30px rgba(13, 110, 253, 0.2);
  border-color: rgba(13, 110, 253, 0.3);
  background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
}

.animated-stat {
  opacity: 0;
  transform: translateY(30px);
  animation: fadeInUp 0.8s ease forwards;
}

.animated-stat:nth-child(2) {
  animation-delay: 0.2s;
}

.animated-image {
  opacity: 0;
  transform: scale(0.9);
  transition: all 0.6s ease;
}

.animated-image.loaded {
  opacity: 1;
  transform: scale(1);
}

.animated-image:hover {
  transform: scale(1.05);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Counter animation */
.counter {
  display: inline-block;
}

/* About Us section specific styles */
.bg-light {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
}
</style>

<style>
/* Professional Design System */
body {
  font-family: 'Inter', sans-serif;
  background-color: #F9FAFB;
  color: #1A1A1A;
  line-height: 1.5;
}

h1, h2, h3, h4, h5, h6 {
  font-family: 'Montserrat', sans-serif;
  font-weight: 600;
  color: #1A1A1A;
}

.card-title, .tour-card h5, .tour-card .card-title {
  font-family: 'Montserrat', sans-serif !important;
  font-weight: 600;
}

.card-text, .tour-card .card-text, .tour-card p {
  font-family: 'Inter', sans-serif !important;
  color: #6B7280;
  line-height: 1.6;
}

.tour-card-body {
  font-family: 'Inter', sans-serif;
}

/* Professional Color Palette with Navbar Gradient */
.text-primary {
  color: #0d6efd !important;
}

.bg-primary {
  background: linear-gradient(90deg, #0d6efd, #198754, #fd7e14) !important;
}

.btn-primary {
  background: linear-gradient(90deg, #0d6efd, #198754, #fd7e14);
  border: none;
  border-radius: 8px;
  font-weight: 600;
  padding: 12px 24px;
  transition: all 0.2s ease;
  color: white;
}

.btn-primary:hover {
  background: linear-gradient(90deg, #198754, #fd7e14, #0d6efd);
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
}

.btn-outline-primary {
  border: 2px solid #0d6efd;
  color: #0d6efd;
  border-radius: 8px;
  font-weight: 600;
  padding: 10px 22px;
  transition: all 0.2s ease;
  background: transparent;
}

.btn-outline-primary:hover {
  background: linear-gradient(90deg, #0d6efd, #198754, #fd7e14);
  border-color: transparent;
  color: white;
  transform: translateY(-1px);
}

/* Enhanced Cards */
.tour-card {
  background: white;
  border: 1px solid #E5E7EB;
  border-radius: 12px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.tour-card:hover {
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
  transform: translateY(-4px);
}

/* Section Backgrounds */
.section-blue {
  background-color: white !important;
}

.section-beige {
  background-color: #F9FAFB !important;
}

/* Professional Spacing */
.py-5 {
  padding-top: 60px !important;
  padding-bottom: 60px !important;
}

.mb-4 {
  margin-bottom: 32px !important;
}

.mb-5 {
  margin-bottom: 48px !important;
}

/* Typography Hierarchy */
h1 { font-size: 40px; font-weight: 700; }
h2 { font-size: 32px; font-weight: 600; }
h3 { font-size: 24px; font-weight: 600; }
h4 { font-size: 20px; font-weight: 600; }
h5 { font-size: 18px; font-weight: 600; }
h6 { font-size: 16px; font-weight: 600; }

.lead {
  font-size: 18px;
  color: #6B7280;
  line-height: 1.6;
}

/* Responsive Font Sizes */
@media (max-width: 768px) {
  h1 { font-size: 32px; }
  h2 { font-size: 28px; }
  h3 { font-size: 22px; }
  h4 { font-size: 18px; }
  h5 { font-size: 16px; }
  h6 { font-size: 14px; }
  
  .py-5 {
    padding-top: 40px !important;
    padding-bottom: 40px !important;
  }
}

@media (max-width: 576px) {
  h1 { font-size: 28px; }
  h2 { font-size: 24px; }
  h3 { font-size: 20px; }
  h4 { font-size: 18px; }
  h5 { font-size: 16px; }
  h6 { font-size: 14px; }
  
  .py-5 {
    padding-top: 32px !important;
    padding-bottom: 32px !important;
  }
}

/* Transparent Panel Styles for Home Page Only */
body.home .tour-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

body.home .tour-card-body {
  background: transparent;
}

body.home .home-table-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

body.home .home-plan-card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

body.home .card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
}

body.home .card-body {
  background: transparent;
}

</style>

<style>
/* Hero Section Styles */
.hero-banner {
  min-height: 90vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: white;
  position: relative;
}

.hero-overlay {
  position: relative;
  z-index: 2;
}

.hero-content {
  position: relative;
  z-index: 2;
  padding: 2rem 1rem;
}

.hero-banner h1 {
  font-size: 3.5rem;
  font-weight: 800;
  margin-bottom: 1.5rem;
  text-shadow: 0 2px 4px rgba(0,0,0,0.3);
  line-height: 1.2;
}

.hero-banner .lead {
  font-size: 1.4rem;
  font-weight: 400;
  margin-bottom: 2.5rem;
  text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

/* Button Styles */
.btn-primary {
  background-color: #0d6efd;
  border: none;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background-color: #0b5ed7;
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
}

.btn-outline-light:hover {
  background-color: rgba(255, 255, 255, 0.1);
  transform: translateY(-2px);
}

/* Simplified Counter Styles */
.counter-simple {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 0.5rem 1rem;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(5px);
  min-width: 100px;
}

.counter-number {
  font-size: 1.8rem;
  font-weight: 700;
  line-height: 1;
  margin-bottom: 0.25rem;
}

.counter-label {
  font-size: 0.9rem;
  opacity: 0.9;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .hero-banner h1 {
    font-size: 2.5rem;
  }
  
  .hero-banner .lead {
    font-size: 1.2rem;
  }
  
  .btn-lg {
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
  }
  
  .counter-simple {
    min-width: 80px;
    padding: 0.5rem;
  }
  
  .counter-number {
    font-size: 1.5rem;
  }
}

/* Counter Box Styles */
.counter-box {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
  border-radius: 15px;
  padding: 20px 15px;
  text-align: center;
  transition: all 0.3s ease;
  height: 100%;
}

.counter-box:hover {
  transform: translateY(-5px);
  background: rgba(255, 255, 255, 0.15);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.counter-number {
  font-size: 2.5rem;
  font-weight: 700;
  color: #fff;
  line-height: 1;
  margin-bottom: 5px;
  text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.counter-label {
  font-size: 0.9rem;
  color: rgba(255, 255, 255, 0.9);
  font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .counter-box {
    padding: 15px 10px;
  }
  .counter-number {
    font-size: 2rem;
  }
  .counter-label {
    font-size: 0.8rem;
  }
}
</style>

<style>
/* Animated Card Effects */
.animated-card {
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 4px solid;
  border-image: linear-gradient(45deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4) 1;
  box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
}

.animated-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
}

.animated-card:focus {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
  outline: 3px solid rgba(255, 255, 255, 0.8);
  outline-offset: 2px;
}

.image-container {
  position: relative;
  overflow: hidden;
  border-radius: 8px 8px 0 0;
}

.card-image {
  transition: transform 0.3s ease;
  display: block;
  width: 100%;
  height: auto;
}

.animated-card:hover .card-image {
  transform: scale(1.1);
}

.animated-card:focus .card-image {
  transform: scale(1.1);
}

/* Transport option cards */
.transport-option {
  border: 4px solid !important;
  border-image: linear-gradient(45deg, #4ECDC4, #45B7D1, #96CEB4, #FFEAA7) 1 !important;
  box-shadow: 0 8px 25px rgba(78, 205, 196, 0.3) !important;
  transition: all 0.3s ease !important;
}

.transport-option:hover {
  box-shadow: 0 12px 35px rgba(78, 205, 196, 0.4) !important;
}

.transport-option:focus {
  box-shadow: 0 12px 35px rgba(78, 205, 196, 0.4) !important;
}

/* Remove gradient background from transport icons */
.animated-card .rounded-circle.bg-primary.bg-opacity-10 {
  background: white !important;
  border: 2px solid #0d6efd !important;
}

.animated-card .rounded-circle.bg-primary.bg-opacity-10 i {
  color: #0d6efd !important;
}

/* Enhanced card animations for all sections */
.tour-card {
  transition: all 0.3s ease;
  border: 4px solid;
  border-image: linear-gradient(45deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4) 1;
  box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
}

.tour-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
}

.tour-card:focus {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  outline: 3px solid rgba(13, 110, 253, 0.3);
  outline-offset: 2px;
}

/* Feature Cards Styling */
.feature-card {
  background: white;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 0, 0, 0.05);
}

.feature-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

.feature-card:focus {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  outline: 3px solid rgba(13, 110, 253, 0.3);
  outline-offset: 2px;
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

/* Transport Option Cards Styling */
.transport-option {
  background: white !important;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 0, 0, 0.05);
  cursor: pointer;
}

.transport-option:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%) !important;
}

.transport-option:focus {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  outline: 3px solid rgba(13, 110, 253, 0.3);
  outline-offset: 2px;
  background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%) !important;
}

/* Travel Guide Cards Styling */
.travel-guide-card {
  transition: all 0.3s ease;
  position: relative;
  z-index: 1;
}

.travel-guide-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  background: linear-gradient(135deg, #ffffff 0%, #e3f2fd 100%);
}

.travel-guide-card:focus {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  outline: 3px solid rgba(13, 110, 253, 0.3);
  outline-offset: 2px;
  background: linear-gradient(135deg, #ffffff 0%, #e3f2fd 100%);
}

/* Section Color Scheme */
.section-light .tour-card,
.section-blue .tour-card,
.section-beige .tour-card {
  background: white !important;
  border: none;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
}

.section-light .tour-card:hover,
.section-blue .tour-card:hover,
.section-beige .tour-card:hover {
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  transform: translateY(-5px) scale(1.02);
}

.section-light .tour-card:focus,
.section-blue .tour-card:focus,
.section-beige .tour-card:focus {
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  transform: translateY(-5px) scale(1.02);
  outline: 3px solid rgba(13, 110, 253, 0.3);
  outline-offset: 2px;
}

.section-blue .tour-card {
  background: white !important;
  border: none;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
  cursor: pointer;
  transition: all 0.3s ease;
  cursor: pointer !important;
  position: relative;
  z-index: 1;
}

.section-blue .tour-card:hover {
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  transform: translateY(-5px) scale(1.02);
  cursor: pointer !important;
}

.section-blue .tour-card:focus {
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  transform: translateY(-5px) scale(1.02);
  outline: 3px solid rgba(13, 110, 253, 0.3);
  outline-offset: 2px;
  cursor: pointer !important;
}

<style>
/* Colorful Title Overlay Styles */
.colorful-title-overlay {
  pointer-events: none;
}

.colorful-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, 
    rgba(255, 99, 132, 0.15) 0%, 
    rgba(54, 162, 235, 0.15) 25%, 
    rgba(255, 206, 86, 0.15) 50%, 
    rgba(75, 192, 192, 0.15) 75%, 
    rgba(153, 102, 255, 0.15) 100%),
    radial-gradient(circle at 20% 20%, rgba(255, 99, 132, 0.2) 0%, transparent 50%),
    radial-gradient(circle at 80% 80%, rgba(54, 162, 235, 0.2) 0%, transparent 50%),
    radial-gradient(circle at 50% 50%, rgba(255, 206, 86, 0.1) 0%, transparent 60%);
  animation: colorShift 8s ease-in-out infinite;
}

@keyframes colorShift {
  0%, 100% {
    background: linear-gradient(135deg, 
      rgba(255, 99, 132, 0.15) 0%, 
      rgba(54, 162, 235, 0.15) 25%, 
      rgba(255, 206, 86, 0.15) 50%, 
      rgba(75, 192, 192, 0.15) 75%, 
      rgba(153, 102, 255, 0.15) 100%),
      radial-gradient(circle at 20% 20%, rgba(255, 99, 132, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 80% 80%, rgba(54, 162, 235, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(255, 206, 86, 0.1) 0%, transparent 60%);
  }
  25% {
    background: linear-gradient(135deg, 
      rgba(54, 162, 235, 0.15) 0%, 
      rgba(75, 192, 192, 0.15) 25%, 
      rgba(153, 102, 255, 0.15) 50%, 
      rgba(255, 99, 132, 0.15) 75%, 
      rgba(255, 206, 86, 0.15) 100%),
      radial-gradient(circle at 30% 70%, rgba(75, 192, 192, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 70% 30%, rgba(153, 102, 255, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(54, 162, 235, 0.1) 0%, transparent 60%);
  }
  50% {
    background: linear-gradient(135deg, 
      rgba(255, 206, 86, 0.15) 0%, 
      rgba(153, 102, 255, 0.15) 25%, 
      rgba(255, 99, 132, 0.15) 50%, 
      rgba(54, 162, 235, 0.15) 75%, 
      rgba(75, 192, 192, 0.15) 100%),
      radial-gradient(circle at 80% 20%, rgba(153, 102, 255, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 20% 80%, rgba(255, 99, 132, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(75, 192, 192, 0.1) 0%, transparent 60%);
  }
  75% {
    background: linear-gradient(135deg, 
      rgba(75, 192, 192, 0.15) 0%, 
      rgba(255, 99, 132, 0.15) 25%, 
      rgba(54, 162, 235, 0.15) 50%, 
      rgba(255, 206, 86, 0.15) 75%, 
      rgba(153, 102, 255, 0.15) 100%),
      radial-gradient(circle at 60% 40%, rgba(255, 206, 86, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 40% 60%, rgba(54, 162, 235, 0.2) 0%, transparent 50%),
      radial-gradient(circle at 50% 50%, rgba(255, 99, 132, 0.1) 0%, transparent 60%);
  }
}

.title-container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: 2;
  pointer-events: auto;
}

.majestic-title {
  margin: 0;
  padding: 2rem;
  font-family: 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;
  font-weight: 900;
  text-shadow: 
    2px 2px 4px rgba(0, 0, 0, 0.8),
    0 0 20px rgba(255, 255, 255, 0.5),
    0 0 40px rgba(255, 255, 255, 0.3);
  animation: titleGlow 3s ease-in-out infinite alternate;
}

@keyframes titleGlow {
  0% {
    text-shadow: 
      2px 2px 4px rgba(0, 0, 0, 0.8),
      0 0 20px rgba(255, 255, 255, 0.5),
      0 0 40px rgba(255, 255, 255, 0.3);
  }
  100% {
    text-shadow: 
      2px 2px 4px rgba(0, 0, 0, 0.8),
      0 0 30px rgba(255, 255, 255, 0.8),
      0 0 60px rgba(255, 255, 255, 0.5);
  }
}

.title-line {
  display: block;
  font-size: 3.5rem;
  background: linear-gradient(45deg, 
    #FF6B6B, #4ECDC4, #45B7D1, #96CEB4, #FFEAA7, #DDA0DD, #98D8C8, #F7DC6F);
  background-size: 300% 300%;
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: gradientShift 4s ease-in-out infinite;
  margin-bottom: 0.5rem;
  letter-spacing: 2px;
  text-transform: uppercase;
  font-weight: 900;
}

.subtitle-line {
  display: block;
  font-size: 1.8rem;
  background: linear-gradient(45deg, 
    #74b9ff, #a29bfe, #fd79a8, #fdcb6e, #6c5ce7, #00b894, #00cec9, #e17055);
  background-size: 300% 300%;
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: gradientShift 4s ease-in-out infinite reverse;
  margin-bottom: 0.3rem;
  font-weight: 700;
  letter-spacing: 1px;
}

@keyframes gradientShift {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

/* Mobile Responsive Styles */
@media (max-width: 768px) {
  .title-line {
    font-size: 2.5rem !important;
    letter-spacing: 1px;
  }
  
  .subtitle-line {
    font-size: 1.3rem !important;
    letter-spacing: 0.5px;
  }
  
  .majestic-title {
    padding: 1rem;
  }
}

@media (max-width: 480px) {
  .title-line {
    font-size: 1.8rem !important;
    letter-spacing: 0.5px;
  }
  
  .subtitle-line {
    font-size: 1rem !important;
    letter-spacing: 0.3px;
  }
  
  .majestic-title {
    padding: 0.5rem;
  }
}
</style>

<style>
/* Hero Title Styles */
.hero-main-title {
  font-family: 'Montserrat', sans-serif;
  font-weight: 900;
  font-size: 4rem;
  line-height: 1.1;
  margin: 0;
  padding: 1rem 0;
  text-transform: uppercase;
  letter-spacing: 2px;
  -webkit-text-stroke: 2px white;
  color: transparent;
}

.title-word {
  display: inline-block;
  margin: 0 0.2rem;
  position: relative;
  -webkit-background-clip: unset;
  background-clip: unset;
  -webkit-text-fill-color: unset;
  text-shadow: none;
}

.title-word.discover {
  color: #FF6B6B;
  -webkit-text-stroke: 2px white;
}

.title-word.majestic {
  color: #4ECDC4;
  -webkit-text-stroke: 2px white;
}

.title-word.baras {
  color: #FFD93D;
  -webkit-text-stroke: 2px white;
}

.hero-subtitle {
  font-family: 'Montserrat', sans-serif;
  font-size: 1.8rem;
  font-weight: 700;
  margin: 1.5rem 0;
  line-height: 1.4;
  color: white;
  -webkit-text-stroke: 1px white;
}

.subtitle-line {
  display: block;
  margin: 0.5rem 0;
  background: linear-gradient(90deg, 
    #74b9ff, #a29bfe, #fd79a8, #fdcb6e, #6c5ce7, #00b894);
  background-size: 200% 100%;
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: subtitleGradient 4s ease-in-out infinite;
  font-weight: 500;
  letter-spacing: 1px;
}

@keyframes subtitleGradient {
  0%, 100% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .hero-main-title {
    font-size: 2.8rem;
    letter-spacing: 2px;
  }
  
  .hero-subtitle {
    font-size: 1.4rem;
  }
  
  .title-word {
    margin: 0 0.1rem;
  }
}

@media (max-width: 480px) {
  .hero-main-title {
    font-size: 2rem;
    letter-spacing: 1px;
  }
  
  .hero-subtitle {
    font-size: 1.2rem;
  }
  
  .title-word {
    display: block;
    margin: 0.3rem 0;
  }
}
</style>

<section id="attractions" class="section-blue py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #f8f9ff 0%, #e9ecef 50%, #f8f9ff 100%);">
  <!-- Background decoration -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 50% 0%, rgba(13, 110, 253, 0.08) 0%, transparent 50%); z-index: 0;"></div>
  
  <div class="container position-relative" style="z-index: 1;">
    <div class="row mb-5 text-center">
      <div class="col-lg-8 mx-auto">
        <h2 class="section-title text-primary mb-0 display-5 fw-bold" style="font-family: 'Montserrat', sans-serif;">EXPLORE DESTINATIONS</h2>
        <p class="lead text-muted mb-0" style="font-family: 'Inter', sans-serif;">Handpicked Catanduanes experiences loved by travelers from around the world</p>
      </div>
    </div>
    <div class="row g-4">
      <?php
      $stmt = $pdo->query("SELECT * FROM attractions WHERE title LIKE '%Puraran Beach%' OR title LIKE '%Binurong Point%' OR title LIKE '%Balacay Point%' ORDER BY FIELD(title, 'Puraran Beach', 'Binurong Point', 'Balacay Point') LIMIT 3");
      foreach ($stmt as $row): ?>
        <div class="col-md-4">
          <div class="tour-card h-100 animated-card shadow-lg" tabindex="0" onclick="console.log('Attraction card clicked, ID: <?php echo (int)$row['id']; ?>'); window.location.href='/gg/attraction_view.php?id=<?php echo (int)$row['id']; ?>'">
            <div class="image-container">
              <?php if (!empty($row['image'])): ?>
                <?php if (strpos(strtolower($row['title']), 'puraran beach') !== false): ?>
                  <img src="/gg/assets/images/puraran.jpg" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 350px; object-position: center;">
                <?php elseif (strpos(strtolower($row['title']), 'binurong point') !== false): ?>
                  <img src="/gg/assets/images/binurong.jpg" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>">
                <?php elseif (strpos(strtolower($row['title']), 'balacay point') !== false): ?>
                  <img src="/gg/assets/images/balacay.jpg" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>">
                <?php else: ?>
                  <img src="<?php echo htmlspecialchars($row['image']); ?>" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>">
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <div class="tour-card-body d-flex flex-column p-4">
              <div class="d-flex justify-content-between align-items-center mb-2">
             <span class="badge bg-primary bg-opacity-10 text-white pill-soft">Top Pick</span>
                <?php if (!empty($row['location'])): ?>
                  <small class="text-muted"><i class="fas fa-map-marker-alt me-1"></i><?php echo htmlspecialchars($row['location']); ?></small>
                <?php endif; ?>
              </div>
              <h5 class="card-title mb-2 fw-bold text-start" style="font-family: 'Montserrat', sans-serif;"><?php echo htmlspecialchars($row['title']); ?></h5>
              <div class="d-flex justify-content-between align-items-center small mb-1">
              <span class="fw-semibold text-primary"><?php echo (isset($row['price']) && $row['price'] !== null) ? '₱' . number_format($row['price'], 2) : ''; ?></span>
              <span class="text-muted"><?php echo (isset($row['duration']) && $row['duration'] !== '') ? htmlspecialchars($row['duration']) : ''; ?></span>
            </div>
              <p class="card-text text-muted flex-grow-1 mb-3 text-justify text-start" style="font-family: 'Inter', sans-serif;"><?php echo nl2br(htmlspecialchars(substr($row['description'],0,200))); ?>...</p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <a href="/gg/attraction_view.php?id=<?php echo (int)$row['id']; ?>" class="btn btn-outline-primary px-3" onclick="event.stopPropagation();">View Tour</a>
                <a href="/gg/book.php?attraction_id=<?php echo (int)$row['id']; ?>" class="btn btn-primary px-3" onclick="event.stopPropagation();">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    
    
    <!-- View All Tours CTA -->
    <div class="row mt-5">
      <div class="col text-center">
        <a href="/gg/attractions.php" class="btn btn-primary btn-lg px-5">
          <i class="fas fa-th-large me-2"></i> View All Tours
        </a>
      </div>
    </div>
  </div>
</section>

<section class="section-blue py-5">
  <div class="container">
    <div class="row mb-4 text-center">
      <div class="col">
        <h2 class="section-title text-primary mb-0 display-5 fw-bold" style="font-family: 'Montserrat', sans-serif;">Festivals & Culture</h2>
        <p class="lead text-muted mb-0"><span style="font-family: 'Montserrat', sans-serif;">Experience</span> <span style="font-family: 'Inter', sans-serif;">vibrant street parades, colorful costumes, and timeless traditions.</span></p>
      </div>
    </div>
    <div class="row g-4">
      <?php
      $stmt = $pdo->query("SELECT * FROM culture ORDER BY festival_date ASC LIMIT 3");
      foreach ($stmt as $row): ?>
        <div class="col-md-4">
          <div class="tour-card h-100 animated-card" tabindex="0" onclick="console.log('Culture card clicked, ID: <?php echo (int)$row['id']; ?>'); window.location.href='/gg/culture_view.php?id=<?php echo (int)$row['id']; ?>'" 
               <?php if (strpos(strtolower($row['title']), 'penafrancia') !== false): ?>
               style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6)), url('/gg/assets/images/P.jpg'); background-size: cover; background-position: center; color: white;"
               <?php endif; ?>>
            <div class="image-container">
              <?php if (!empty($row['image'])): ?>
                <?php if (strpos(strtolower($row['title']), 'baras') !== false || strpos(strtolower($row['title']), 'fiesta') !== false): ?>
                  <img src="/gg/assets/images/ad.jpg" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 350px; border: 3px solid #0d6efd; border-radius: 15px;">
                <?php elseif (strpos(strtolower($row['title']), 'catandungan') !== false): ?>
                  <img src="/gg/assets/images/cc.jpg" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 350px; border: 3px solid #0d6efd; border-radius: 15px;">
                <?php elseif (strpos(strtolower($row['title']), 'holy week') !== false): ?>
                  <img src="/gg/assets/images/c.jpg" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 350px; border: 3px solid #0d6efd; border-radius: 15px;">
                <?php elseif (strpos(strtolower($row['title']), 'penafrancia') !== false): ?>
                  <img src="/gg/assets/images/P.jpg" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 350px; border: 3px solid #0d6efd; border-radius: 15px;">
                <?php else: ?>
                  <img src="<?php echo htmlspecialchars($row['image']); ?>" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 350px; border: 3px solid #0d6efd; border-radius: 15px;">
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <div class="tour-card-body" <?php if (strpos(strtolower($row['title']), 'penafrancia') !== false): ?>style="background: transparent; color: white;"<?php endif; ?>>
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="card-title mb-0" style="font-family: 'Montserrat', sans-serif;" <?php if (strpos(strtolower($row['title']), 'penafrancia') !== false): ?>style="color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.8);"<?php endif; ?>><?php echo htmlspecialchars($row['title']); ?></h5>
                <?php if (!empty($row['festival_date'])): ?>
                  <span class="pill-soft pill-soft-green" <?php if (strpos(strtolower($row['title']), 'penafrancia') !== false): ?>style="background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);"<?php endif; ?>>Date: <?php echo htmlspecialchars($row['festival_date']); ?></span>
                <?php endif; ?>
              </div>
              <p class="card-text small text-muted flex-grow-1 mb-3" style="font-family: 'Inter', sans-serif;" <?php if (strpos(strtolower($row['title']), 'penafrancia') !== false): ?>style="color: rgba(255,255,255,0.9); text-shadow: 1px 1px 2px rgba(0,0,0,0.8);"<?php endif; ?>><?php echo nl2br(htmlspecialchars(substr($row['description'],0,150))); ?>...</p>
              <div class="d-flex justify-content-between align-items-center mt-auto">
                <a href="/gg/culture_view.php?id=<?php echo (int)$row['id']; ?>" class="btn btn-outline-primary px-3" onclick="event.stopPropagation();">View Details</a>
                <a href="/gg/contact.php" class="btn btn-primary px-3" onclick="event.stopPropagation();">Inquire</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <!-- View All Festivals & Culture CTA -->
    <div class="row mt-5">
      <div class="col text-center">
        <a href="/gg/culture.php" class="btn btn-primary btn-lg px-5">
          <i class="fas fa-calendar-alt me-2"></i> View All Festivals & Culture
        </a>
      </div>
    </div>
  </div>
</section>

<section class="section-beige py-5">
  <div class="container">
  <div class="row mb-4 text-center">
    <div class="col">
      <h2 class="section-title text-primary mb-0 display-5 fw-bold" style="font-family: 'Montserrat', sans-serif;">Top Outdoor Adventures</h2>
      <p class="lead text-muted mb-0"><span style="font-family: 'Montserrat', sans-serif;">Surf</span> <span style="font-family: 'Inter', sans-serif;">world-class waves, chase waterfalls, and hike rolling hills.</span></p>
    </div>
  </div>

  <div class="row g-4">
    <?php
    $stmt = $pdo->query("SELECT * FROM adventures ORDER BY created_at DESC LIMIT 3");
    foreach ($stmt as $row): ?>
      <div class="col-md-4">
        <div class="tour-card h-100 animated-card" tabindex="0" onclick="console.log('Adventure card clicked, ID: <?php echo (int)$row['id']; ?>'); window.location.href='/gg/adventure_view.php?id=<?php echo (int)$row['id']; ?>'">
          <div class="image-container">
            <?php if (!empty($row['image'])): ?>
              <img src="<?php echo htmlspecialchars($row['image']); ?>" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['title']); ?>" style="object-fit: cover; height: 350px; border: 3px solid #0d6efd; border-radius: 15px;">
            <?php endif; ?>
          </div>
          <div class="tour-card-body d-flex flex-column">
            <div class="tour-meta mb-1"><?php echo htmlspecialchars($row['activity_type'] ?: 'Adventure'); ?></div>
            <h5 class="card-title mb-2 fw-bold" style="font-family: 'Montserrat', sans-serif;"><?php echo htmlspecialchars($row['title']); ?></h5>
            <p class="card-text small text-muted flex-grow-1" style="font-family: 'Inter', sans-serif;"><?php echo nl2br(htmlspecialchars(substr($row['description'],0,150))); ?>...</p>
            <div class="mt-2">
              <a href="/gg/adventure_view.php?id=<?php echo (int)$row['id']; ?>" class="btn btn-sm btn-outline-primary" onclick="event.stopPropagation();">View Adventure</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  
  <!-- View All Outdoor Adventures CTA -->
  <div class="row mt-5">
    <div class="col text-center">
      <a href="/gg/adventure.php" class="btn btn-primary btn-lg px-5">
        <i class="fas fa-hiking me-2"></i> View All Outdoor Adventures
      </a>
    </div>
  </div>
</section>

<section class="section-blue py-5">
  <div class="container">
    <div class="row mb-4 text-center">
      <div class="col">
        <h2 class="section-title text-primary mb-0 display-5 fw-bold" style="font-family: 'Montserrat', sans-serif;">Taste of Catanduanes</h2>
        <p class="lead text-muted mb-0"><span style="font-family: 'Montserrat', sans-serif;">Discover</span> <span style="font-family: 'Inter', sans-serif;">beloved local dishes and seaside dining spots.</span></p>
      </div>
    </div>
    <div class="row g-4">
      <?php
      $stmt = $pdo->query("SELECT * FROM food ORDER BY created_at DESC LIMIT 3");
      foreach ($stmt as $row): ?>
        <div class="col-md-4 col-sm-6">
          <div class="tour-card h-100 animated-card" tabindex="0" onclick="window.location.href='/gg/food_view.php?id=<?php echo (int)$row['id']; ?>'">
            <div class="image-container">
              <?php if (!empty($row['image'])): ?>
                <img src="<?php echo htmlspecialchars($row['image']); ?>" class="w-100 card-image" alt="<?php echo htmlspecialchars($row['name']); ?>">
              <?php endif; ?>
            </div>
            <div class="tour-card-body d-flex flex-column">
              <h5 class="card-title mb-1" style="font-family: 'Montserrat', sans-serif;"><?php echo htmlspecialchars($row['name']); ?></h5>
              <?php if (!empty($row['location'])): ?>
                <p class="tour-meta mb-1"><?php echo htmlspecialchars($row['location']); ?></p>
              <?php endif; ?>
              <p class="card-text small text-muted flex-grow-1" style="font-family: 'Inter', sans-serif;"><?php echo nl2br(htmlspecialchars(substr($row['description'],0,120))); ?>...</p>
              <a href="/gg/food_view.php?id=<?php echo (int)$row['id']; ?>" class="btn btn-sm btn-outline-primary mt-2" onclick="event.stopPropagation();">View Dish</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <!-- View All Taste of Catanduanes CTA -->
    <div class="row mt-5">
      <div class="col text-center">
        <a href="/gg/food.php" class="btn btn-primary btn-lg px-5">
          <i class="fas fa-utensils me-2"></i> View All Taste of Catanduanes
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Souvenirs Section -->
<section class="py-5" style="background: white; position: relative; overflow: hidden;">
  <!-- Background decoration -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 50% 0%, rgba(13, 110, 253, 0.05) 0%, transparent 50%); z-index: 0;"></div>
  
  <div class="container">
    <div class="row mb-4 text-center">
      <div class="col-lg-8 mx-auto">
        <h2 class="section-title text-primary mb-0 display-5 fw-bold" style="font-family: 'Montserrat', sans-serif;">BARAS PASALUBONG & SOUVENIRS</h2>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="tour-card h-100 animated-card" tabindex="0" onclick="window.location.href='/gg/souvenir.php'" style="border: 4px solid; border-image: linear-gradient(45deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4) 1; box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);">
          <div class="tour-card-body d-flex flex-column text-center">
            <div class="why-icons text-warning mb-4" style="font-size: 3rem;">
              <i class="fas fa-gem"></i>
            </div>
            <h5 class="card-title mb-3">Baras Abaca Crafts</h5>
            <p class="card-text text-muted flex-grow-1 mb-4">Handwoven abaca products made by Baras local weavers - bags, placemats, and coin purses with intricate designs.</p>
            <div class="mt-auto">
              <span class="badge bg-warning bg-opacity-10 text-warning">Exclusive to Baras</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="tour-card h-100 animated-card" tabindex="0" onclick="window.location.href='/gg/souvenir.php'" style="border: 4px solid; border-image: linear-gradient(45deg, #4ECDC4, #45B7D1, #96CEB4, #FFEAA7) 1; box-shadow: 0 8px 25px rgba(78, 205, 196, 0.3);">
          <div class="tour-card-body d-flex flex-column text-center">
            <div class="why-icons text-success mb-4" style="font-size: 3rem;">
              <i class="fas fa-leaf"></i>
            </div>
            <h5 class="card-title mb-3">Baras Seafood Delicacies</h5>
            <p class="card-text text-muted flex-grow-1 mb-4">Baras-famous dried fish from the local fish port - dilis, danggit, and other seafood delicacies perfect as pasalubong.</p>
            <div class="mt-auto">
              <span class="badge bg-success bg-opacity-10 text-success">Baras Fish Port</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="tour-card h-100 animated-card" tabindex="0" onclick="window.location.href='/gg/souvenir.php'" style="border: 4px solid; border-image: linear-gradient(45deg, #45B7D1, #96CEB4, #FFEAA7, #DDA0DD) 1; box-shadow: 0 8px 25px rgba(69, 183, 209, 0.3);">
          <div class="tour-card-body d-flex flex-column text-center">
            <div class="why-icons text-primary mb-4" style="font-size: 3rem;">
              <i class="fas fa-tshirt"></i>
            </div>
            <h5 class="card-title mb-3">Baras Native Sweets</h5>
            <p class="card-text text-muted flex-grow-1 mb-4">Traditional Baras kakanin like suman and latik made from locally grown coconut and rice with unique Baras recipes.</p>
            <div class="mt-auto">
              <span class="badge text-primary" style="background-color: #e0f2f7 !important; background-image: none !important;">Baras Local Recipe</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- View All Souvenirs CTA -->
    <div class="row mt-5">
      <div class="col text-center">
        <a href="/gg/souvenir.php" class="btn btn-primary btn-lg px-5" style="background: #0d6efd !important; background-image: none !important;">
          <i class="fas fa-shopping-bag me-2"></i>Explore All Souvenirs
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Accommodations Section -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9ff 0%, #e9ecef 50%, #f8f9ff 100%); position: relative; overflow: hidden;">
  <!-- Background decoration -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at 50% 0%, rgba(13, 110, 253, 0.08) 0%, transparent 50%); z-index: 0;"></div>
  
  <div class="container position-relative" style="z-index: 1;">
    <div class="row mb-4 text-center">
      <div class="col-lg-8 mx-auto">
        <h2 class="section-title text-primary mb-0 display-5 fw-bold" style="font-family: 'Montserrat', sans-serif;">WHERE TO STAY IN BARAS</h2>
        <p class="lead text-muted mb-0" style="font-family: 'Inter', sans-serif;">Find your perfect home away from home in Baras, Catanduanes</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="tour-card h-100 animated-card" tabindex="0" onclick="window.location.href='/gg/accommodations.php'" style="border: 4px solid; border-image: linear-gradient(45deg, #FF6B6B, #4ECDC4, #45B7D1, #96CEB4) 1; box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);">
          <div class="tour-card-body d-flex flex-column text-center">
            <div class="why-icons text-warning mb-4" style="font-size: 3rem;">
              <i class="fas fa-hotel"></i>
            </div>
            <h5 class="card-title mb-3">Luxury Resorts in Baras</h5>
            <p class="card-text text-muted flex-grow-1 mb-4">Premium beachfront resorts in Baras with world-class amenities, infinity pools, and stunning ocean views of the Pacific.</p>
            <div class="mt-auto">
              <span class="badge bg-warning bg-opacity-10 text-warning">Premium Experience</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="tour-card h-100 animated-card" tabindex="0" onclick="window.location.href='/gg/accommodations.php'" style="border: 4px solid; border-image: linear-gradient(45deg, #4ECDC4, #45B7D1, #96CEB4, #FFEAA7) 1; box-shadow: 0 8px 25px rgba(78, 205, 196, 0.3);">
          <div class="tour-card-body d-flex flex-column text-center">
            <div class="why-icons text-success mb-4" style="font-size: 3rem;">
              <i class="fas fa-home"></i>
            </div>
            <h5 class="card-title mb-3">Baras Homestays</h5>
            <p class="card-text text-muted flex-grow-1 mb-4">Cozy local homes in Baras offering authentic Catanduanes hospitality and cultural immersion with warm local families.</p>
            <div class="mt-auto">
              <span class="badge bg-success bg-opacity-10 text-success">Local Experience</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="tour-card h-100 animated-card" tabindex="0" onclick="window.location.href='/gg/accommodations.php'" style="border: 4px solid; border-image: linear-gradient(45deg, #45B7D1, #96CEB4, #FFEAA7, #DDA0DD) 1; box-shadow: 0 8px 25px rgba(69, 183, 209, 0.3);">
          <div class="tour-card-body d-flex flex-column text-center">
            <div class="why-icons text-primary mb-4" style="font-size: 3rem;">
              <i class="fas fa-umbrella-beach"></i>
            </div>
            <h5 class="card-title mb-3">Baras Beach Cottages</h5>
            <p class="card-text text-muted flex-grow-1 mb-4">Charming seaside cottages in Baras perfect for surfers and beach lovers seeking direct beach access to Puraran and nearby beaches.</p>
            <div class="mt-auto">
              <span class="badge bg-info bg-opacity-10 text-info">Beachfront Access</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- View All Accommodations CTA -->
    <div class="row mt-5">
      <div class="col text-center">
        <a href="/gg/accommodations.php" class="btn btn-primary btn-lg px-5">
          <i class="fas fa-bed me-2"></i>View All Accommodations
        </a>
      </div>
    </div>
  </div>
</section>

<?php
$recent = $pdo->query("SELECT b.*, u.name AS user_name, a.title AS attraction_title
                       FROM bookings b
                       JOIN users u ON b.user_id = u.id
                       JOIN attractions a ON b.attraction_id = a.id
                       ORDER BY b.created_at DESC
                       LIMIT 5")->fetchAll();

$attractionsForSelect = $pdo->query("SELECT id, title FROM attractions ORDER BY title ASC")->fetchAll();
?>

<!-- Embedded Travel Guide section -->
<section class="section-muted py-5">
<div class="container travel-guide-shell">
  <div class="text-center mb-4">
    <span class="badge bg-info bg-opacity-10 text-info mb-2">Transportation</span>
    <h2 class="fw-bold mb-2">Plan Your Journey</h2>
    <p class="text-muted mb-0">Everything you need to know for an unforgettable trip to Catanduanes &mdash; from transport options to suggested routes.</p>
  </div>

    <!-- Tabs -->
    <ul class="nav nav-pills justify-content-center bg-white rounded-pill shadow-sm px-2 py-1 mb-4 travel-guide-tabs" id="travelGuideTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active rounded-pill" id="transport-tab" data-bs-toggle="pill" data-bs-target="#transport" type="button" role="tab">Transport</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link rounded-pill" id="stay-tab" data-bs-toggle="pill" data-bs-target="#stay" type="button" role="tab">Stay</button>
      </li>
    </ul>

    <div class="tab-content" id="travelGuideTabsContent">
    <!-- Transport tab -->
    <div class="tab-pane fade show active" id="transport" role="tabpanel" aria-labelledby="transport-tab">
      <!-- By Air -->
      <div class="card border-0 shadow-sm mb-4 rounded-4 travel-guide-card animated-card" tabindex="0">
        <div class="card-body p-4">
          <div class="d-flex align-items-center mb-3">
            <div class="me-3 d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10" style="width:40px;height:40px;">
              <i class="fas fa-plane text-primary"></i>
            </div>
            <h5 class="mb-0 fw-bold">By Air</h5>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="bg-white rounded-3 p-3 h-100 animated-card transport-option" tabindex="0">
                <h6 class="fw-semibold mb-2">Manila to Virac</h6>
                <p class="small mb-1"><span class="text-muted">Operator:</span> Cebu Pacific</p>
                <p class="small mb-1"><span class="text-muted">Duration:</span> 1.5 hours</p>
                <p class="small mb-1"><span class="text-muted">Schedule:</span> Daily flights (subject to season)</p>
                <p class="small mb-0 text-primary fw-semibold">Price Range: ₱4,500 &ndash; ₱8,000</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bg-white rounded-3 p-3 h-100 animated-card transport-option" tabindex="0">
                <h6 class="fw-semibold mb-2">Cebu to Virac</h6>
                <p class="small mb-1"><span class="text-muted">Operator:</span> Philippine Airlines / Cebu Pacific (via Manila)</p>
                <p class="small mb-1"><span class="text-muted">Duration:</span> 2.5 &ndash; 3 hours total (including layover)</p>
                <p class="small mb-1"><span class="text-muted">Schedule:</span> Multiple flights weekly</p>
                <p class="small mb-0 text-primary fw-semibold">Price Range: ₱3,500 &ndash; ₱6,500</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- By Sea -->
      <div class="card border-0 shadow-sm mb-4 rounded-4 animated-card" tabindex="0">
        <div class="card-body p-4">
          <div class="d-flex align-items-center mb-3">
            <div class="me-3 d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10" style="width:40px;height:40px;">
              <i class="fas fa-ship text-primary"></i>
            </div>
            <h5 class="mb-0 fw-bold">By Sea</h5>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="bg-white rounded-3 p-3 h-100 animated-card transport-option" tabindex="0">
                <h6 class="fw-semibold mb-2">Manila to Tabaco, then ferry to Virac</h6>
                <p class="small mb-1"><span class="text-muted">Operator:</span> 2GO Travel + RORO / bus companies</p>
                <p class="small mb-1"><span class="text-muted">Duration:</span> 18 &ndash; 20 hours total</p>
                <p class="small mb-1"><span class="text-muted">Schedule:</span> Daily (bus) + regular ferry trips</p>
                <p class="small mb-0 text-primary fw-semibold">Price Range: ₱1,500 &ndash; ₱3,000</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bg-white rounded-3 p-3 h-100 animated-card transport-option" tabindex="0">
                <h6 class="fw-semibold mb-2">Legazpi / Tabaco to Virac</h6>
                <p class="small mb-1"><span class="text-muted">Operator:</span> RORO Ferry operators</p>
                <p class="small mb-1"><span class="text-muted">Duration:</span> 3 &ndash; 4 hours</p>
                <p class="small mb-1"><span class="text-muted">Schedule:</span> Multiple trips daily (weather dependent)</p>
                <p class="small mb-0 text-primary fw-semibold">Price Range: ₱200 &ndash; ₱500</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Catanduanes Map -->
      <div class="card border-0 shadow-sm mb-4 rounded-4 animated-card" tabindex="0">
        <div class="card-body p-4">
          <h6 class="fw-semibold mb-3">Map: Catanduanes, Philippines</h6>
          <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63247.05917176302!2d124.0545!3d6z!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a017b4f6f4d0b3%3A0x4c0c3d8f4d2ba8e7!2sCatanduanes!5e0!3m2!1sen!2sph!4v1700000000000!5m2!1sen!2sph"
              style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="mt-2">
            <a href="https://www.google.com/maps/@13.716667,124.291667,6z" 
               target="_blank" 
               class="btn btn-primary btn-sm">
              <i class="fas fa-map-marked-alt me-2"></i>View larger map
            </a>
            <a href="https://www.google.com/maps/dir/?api=1&destination=Catanduanes,+Philippines" 
               target="_blank" 
               class="btn btn-secondary btn-sm ms-2">
              <i class="fas fa-directions me-2"></i>Get Directions from Your Location
            </a>
          </div>
        </div>
      </div>

      <!-- Getting to Baras -->
      <div class="card border-0 shadow-sm mb-4 rounded-4 animated-card" tabindex="0">
        <div class="card-body p-4">

          <div class="d-flex align-items-center mb-3">
            <div class="me-3 d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10" style="width:40px;height:40px;">
              <i class="fas fa-map-marked-alt text-warning"></i>
            </div>
            <h5 class="mb-0 fw-bold">Getting to Baras</h5>
          </div>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="bg-white rounded-3 p-3 h-100 animated-card transport-option" tabindex="0">
                <h6 class="fw-semibold mb-2">From Virac Airport</h6>
                <p class="small mb-1"><span class="text-muted">Route:</span> Virac → Bato → Baras</p>
                <p class="small mb-1"><span class="text-muted">Distance:</span> 45 km</p>
                <p class="small mb-1"><span class="text-muted">Travel Time:</span> 1.5 - 2 hours</p>
                <p class="small mb-1"><span class="text-muted">Transport:</span> Van/Jeepney (₱200-300)</p>
                <p class="small mb-0 text-primary fw-semibold">Best for: Direct travelers</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bg-white rounded-3 p-3 h-100 animated-card transport-option" tabindex="0">
                <h6 class="fw-semibold mb-2">From Virac Port</h6>
                <p class="small mb-1"><span class="text-muted">Route:</span> Virac → Bato → Baras</p>
                <p class="small mb-1"><span class="text-muted">Distance:</span> 45 km</p>
                <p class="small mb-1"><span class="text-muted">Travel Time:</span> 1.5 - 2 hours</p>
                <p class="small mb-1"><span class="text-muted">Transport:</span> Van/Jeepney (₱200-300)</p>
                <p class="small mb-0 text-primary fw-semibold">Best for: Direct travelers</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bg-white rounded-3 p-3 h-100 animated-card transport-option" tabindex="0">
                <h6 class="fw-semibold mb-2">From San Andres Port</h6>
                <p class="small mb-1"><span class="text-muted">Route:</span> San Andres Port → Virac → Bato → Baras</p>
                <p class="small mb-1"><span class="text-muted">Distance:</span> 35 km</p>
                <p class="small mb-1"><span class="text-muted">Travel Time:</span> 1 - 1.5 hours</p>
                <p class="small mb-1"><span class="text-muted">Transport:</span> Ferry + Land transfer (₱300-500)</p>
                <p class="small mb-0 text-primary fw-semibold">Best for: Island hopping travelers</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="bg-white rounded-3 p-3 h-100 animated-card transport-option" tabindex="0">
                <h6 class="fw-semibold mb-2">Direct Bus to Baras</h6>
                <p class="small mb-1"><span class="text-muted">Route:</span> Virac → Bato → Baras</p>
                <p class="small mb-1"><span class="text-muted">Distance:</span> 50 km</p>
                <p class="small mb-1"><span class="text-muted">Travel Time:</span> 2 - 2.5 hours</p>
                <p class="small mb-1"><span class="text-muted">Schedule:</span> 2 trips daily</p>
                <p class="small mb-0 text-primary fw-semibold">Best for: Budget travelers</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Baras Catanduanes Map -->
      <div class="card border-0 shadow-sm mb-4 rounded-4 travel-guide-card animated-card" tabindex="0">
        <div class="card-body p-4">
          <h6 class="fw-semibold mb-3">Map: Baras, Catanduanes</h6>
          <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15655.000000000002!2d124.293333!3d13.716667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a01662923f738b%3A0x8a9235d214a1c5d!2sBaras%2C+Catanduanes!5e0!3m2!1sen!2sph!4v1700000000000!5m2!1sen!2sph"
              style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="mt-3">
            <a href="https://www.google.com/maps/@13.716667,124.291667,6z" 
               target="_blank" 
               class="btn btn-primary btn-sm me-2">
              <i class="fas fa-map-marked-alt me-2"></i>View larger map
            </a>
            <a href="https://www.google.com/maps/dir/?api=1&destination=Baras,+Catanduanes" 
               target="_blank" 
               class="btn btn-secondary btn-sm">
              <i class="fas fa-directions me-2"></i>Get Directions from Your Location
            </a>
          </div>
        </div>
      </div>

    </div>

      <!-- Stay tab -->
      <div class="tab-pane fade" id="stay" role="tabpanel" aria-labelledby="stay-tab">
        <div class="card border-0 shadow-sm rounded-4 travel-guide-card mb-4">
          <div class="card-body p-4">
            <h2 class="fw-bold mb-4">Where to Stay in Catanduanes</h2>
            <p class="lead text-muted mb-5">Find the perfect accommodation for your Catanduanes adventure</p>
            
           <!-- Accommodation 1 -->
          <div class="row g-4 mb-5">
            <div class="col-md-4">
              <div class="position-relative h-100">
                <img src="/gg/assets/images/pO.jpg" alt="Puraran Beach Resort" class="img-fluid rounded-3 w-100 h-100" style="object-fit: cover; min-height: 200px;">
                <div class="position-absolute bottom-0 start-0 p-2 bg-dark bg-opacity-75 text-white w-100">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="small">
                      <i class="fas fa-star text-warning"></i> 4.8/5 (245 reviews)
                    </span>
                    <span class="badge bg-primary">Popular</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="d-flex flex-column h-100">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h3 class="mb-1">Puraran Beach Resort</h3>
                  <div class="text-warning">
                    <i class="fas fa-wifi"></i>
                    <i class="fas fa-umbrella-beach ms-2"></i>
                    <i class="fas fa-utensils ms-2"></i>
                    <i class="fas fa-swimming-pool ms-2"></i>
                    <i class="fas fa-spa ms-2"></i>
                  </div>
                </div>
                <p class="text-muted mb-3">
                  <i class="fas fa-map-marker-alt text-danger me-1"></i> 
                  Puraran, Catanduanes | <a href="#" class="text-decoration-none">View on Map</a>
                </p>
                <p class="mb-3">Experience luxury by the beach with our premium accommodations featuring stunning ocean views, private balconies, and world-class service. Perfect for romantic getaways and family vacations.</p>
                
                <div class="mt-auto">
                  <div class="d-flex flex-wrap align-items-center mb-2">
                    <span class="me-3"><i class="fas fa-check-circle text-success me-1"></i> Beachfront Access</span>
                    <span class="me-3"><i class="fas fa-check-circle text-success me-1"></i> Infinity Pool</span>
                    <span class="me-3"><i class="fas fa-check-circle text-success me-1"></i> Spa & Wellness</span>
                    <span class="me-3"><i class="fas fa-check-circle text-success me-1"></i> Free WiFi</span>
                  </div>
                  
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                      <h4 class="text-primary mb-0">₱4,500 <small class="text-muted fw-normal">/ night</small></h4>
                      <p class="small text-muted mb-0">+₱500 taxes & fees</p>
                    </div>
                    <div>
                      <a href="book.php?resort=luxury" class="btn btn-primary px-4">Book Now</a>
                      <a href="#" class="btn btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#luxuryResortModal">View Details</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- Accommodation 2 -->
          <div class="row g-4 mb-5">
            <div class="col-md-4">
              <div class="position-relative h-100">
                <img src="/gg/assets/images/tt.jpg" alt="Titaays Surfers Resort" class="img-fluid rounded-3 w-100 h-100" style="object-fit: cover; min-height: 200px;">
                <div class="position-absolute bottom-0 start-0 p-2 bg-dark bg-opacity-75 text-white w-100">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="small">
                      <i class="fas fa-star text-warning"></i> 4.8/5 (245 reviews)
                    </span>
                    <span class="badge bg-primary">Popular</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="d-flex flex-column h-100">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <h3 class="mb-1">Titaays Surfers</h3>
                  <div class="text-warning">
                    <i class="fas fa-wifi"></i>
                    <i class="fas fa-umbrella-beach ms-2"></i>
                    <i class="fas fa-utensils ms-2"></i>
                    <i class="fas fa-swimming-pool ms-2"></i>
                    <i class="fas fa-spa ms-2"></i>
                  </div>
                </div>  
                <p class="text-muted mb-3">
                  <i class="fas fa-map-marker-alt text-danger me-1"></i> 
                  Baras, Catanduanes | <a href="#" class="text-decoration-none">View on Map</a>
                </p>
                <p class="mb-3">Experience luxury by the beach with our premium accommodations featuring stunning ocean views, private balconies, and world-class service. Perfect for romantic getaways and family vacations.</p>
                
                <div class="mt-auto">
                  <div class="d-flex flex-wrap align-items-center mb-2">
                    <span class="me-3"><i class="fas fa-check-circle text-success me-1"></i> Beachfront Access</span>
                    <span class="me-3"><i class="fas fa-check-circle text-success me-1"></i> Infinity Pool</span>
                    <span class="me-3"><i class="fas fa-check-circle text-success me-1"></i> Spa & Wellness</span>
                    <span class="me-3"><i class="fas fa-check-circle text-success me-1"></i> Free WiFi</span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                      <h4 class="text-primary mb-0">₱4,500 <small class="text-muted fw-normal">/ night</small></h4>
                      <p class="small text-muted mb-0">+₱500 taxes & fees</p>
                    </div>
                    <div>
                      <a href="book.php?resort=luxury" class="btn btn-primary px-4">Book Now</a>
                      <a href="#" class="btn btn-outline-primary ms-2" data-bs-toggle="modal" data-bs-target="#luxuryResortModal">View Details</a>
                              </div> <!-- end card-body -->
        </div> <!-- end card -->
      </div> <!-- end tab-pane stay -->
    </div> <!-- end tab-content -->
  </div> <!-- end container travel-guide-shell -->
</section> <!-- end section-muted -->

<!-- QR Code Section -->
    <section class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <div class="d-inline-flex align-items-center mb-3">
            <i class="fas fa-qrcode fa-2x text-primary me-2"></i>
            <h2 class="mb-0">Scan & Explore</h2>
          </div>
          <p class="lead mb-4">
            Scan the QR code below with your smartphone to access our tourism portal instantly. Share it
            with friends and family planning their Catanduanes adventure!
          </p>
        </div>
      </div>
      <div class="row justify-content-center align-items-center mt-4">
        <div class="col-md-4 mb-4">
          <div class="card border-0 shadow-sm rounded-lg p-4 text-center">
            <div id="qrcode" class="mx-auto mb-3" style="width: 200px; height: 200px; display: flex; justify-content: center; align-items: center;"></div>
          </div>
        </div>
        <div class="col-md-5 mb-4">
          <div class="p-4">
            <h4 class="text-primary mb-3"><i class="fas fa-mobile-alt me-2"></i> Easy Access</h4>
            <ul class="list-unstyled">
              <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> 1. Open your phone's camera app</li>
              <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> 2. Point it at the QR code</li>
              <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> 3. Tap the notification to visit the site</li>
            </ul>
            <div class="alert alert-warning mt-4" role="alert">
              <i class="fas fa-lightbulb me-2"></i> <strong>Tip:</strong> Save this page to your home screen for quick
              access during your trip!
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- QR Code Script -->
    <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Generate QR code for website's root URL
        const currentUrl = 'https://baras.lovestoblog.com/gg/';
        new QRCode(document.getElementById("qrcode"), {
          text: currentUrl,
          width: 180,
          height: 180,
          colorDark: "#000000",
          colorLight: "#ffffff",
          correctLevel: QRCode.CorrectLevel.H
        });
      });
    </script>

<?php include __DIR__ . '/includes/footer.php'; ?>

<!-- About Us Modal -->
<div class="modal fade" id="aboutUsModal" tabindex="-1" aria-labelledby="aboutUsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="aboutUsModalLabel">
          <i class="fas fa-info-circle me-2"></i>About Us
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="about-content">
          <h4 class="text-primary mb-3">About Baras</h4>
          <p class="lead">
            Baras is a peaceful coastal municipality in the eastern part of Catanduanes, known for its dramatic landscapes, rolling hills, and breathtaking ocean views. It is home to natural attractions such as Binurong Point, where grassy cliffs meet the Pacific, offering some of the most iconic scenery on the island. With its strong local culture, warm community, and unspoiled environment, Baras reflects the quiet beauty and authentic island life that Catanduanes is known for.
          </p>

          <h4 class="text-primary mb-3 mt-4">The Name Baras</h4>
          <p class="lead">
            Once called "Badas" during the early period of colonization of the Philippine archipelago by Spain, it was claimed to be a village town that was luxuriant and verdant with "badas" plants. As to what kind of vegetation was the plant is a subject of conjuncture. Some believed that it was a kind of bamboo now called "bagakay". Others believed it to be a kind of sturdy tree, but a seeming majority believed that it was a wild rattan plant abounding the surrounding mountains.
          </p>
          <p class="lead">
            Another common belief is that "badas" is a kind of material used for making spears, a weapon used by the native to repel the Moro raiders and pirates. It is also argued that "badas" was a much in demand material for building the native huts. Because of its abundance in the area, villagers referred to the place as "Cabadasan" meaning a place where "badas" thrive. Colonizers may have Hispanicized the reference and has now metamorphosed into what is now Baras.
          </p>

          <h4 class="text-primary mb-3 mt-4">History of Baras (Folklore and Tales)</h4>
          <p class="lead">
            According to folklore and tales handed down through generations old folks recall, Baras centuries ago was once a progressive fishing village located over a small hill projecting towards the sea on the western side of "Kalapadan" Bay. The present day Baras public cemetery is the former población site. The old site was so chosen because it was an elevated area overlooking the sea. The villagers could easily see approaching pirates and "Moro" raiders who occasionally plundered the coastal areas. The strategic location allows the villagers ample time to evacuate their families and prepare for the encounter. It was told that several fierce skirmishes had been fought in the present población. Excavation in the church-plaza reveals human remains claimed to be those of the invaders. The pirates having gone, villagers later settled in what is now Baras.
          </p>
          <p class="lead">
            The locals, pre-dominantly Roman Catholics by religiosity, has adopted Saint Lawrence the Martyr and Our Lady of Salvation as its Patron Saints whose feast days are August 10 and 11 respectively.
          </p>
    
          <h4 class="text-primary mb-3 mt-4">Natural Attractions</h4>
          <p class="lead">
            Baras is home to notable natural attractions, including scenic cliffs, rolling hills, coastal areas, and panoramic viewpoints such as Binurong Point. These natural features highlight the town's environmental significance and contribute to its growing potential as a sustainable tourism destination. The municipality also benefits from fertile agricultural lands and coastal resources that support local livelihoods.
          </p>
          
          <h4 class="text-primary mb-3 mt-4">Cultural Heritage</h4>
          <p class="lead">
            Cultural traditions and community values remain central to life in Baras. Religious observances, local festivals, and long-standing customs continue to strengthen social ties and preserve the town's identity. The local cuisine and artisanal products further reflect the municipality's agricultural and maritime heritage.
          </p>
          
          <h4 class="text-primary mb-3 mt-4">Our Mission</h4>
          <p class="lead">
            This website was developed to provide accurate and accessible information about the Municipality of Baras. It aims to promote tourism, support local economic development, and encourage responsible travel practices while preserving the town's natural and cultural resources.
          </p>
            <h4 class="text-primary mb-3 mt-4">Our Vision</h4>
          <p class="lead">
            Baras envisions becoming a premier sustainable tourism destination in Catanduanes, where economic growth harmonizes with environmental preservation and cultural heritage. We strive to be a model municipality that balances development with conservation, ensuring that future generations can enjoy the natural beauty and rich cultural tapestry that defines our community.
          </p>
          <p class="lead">
            Our vision includes fostering inclusive growth, promoting eco-friendly practices, and strengthening community engagement to create a resilient and vibrant Baras that remains true to its roots while embracing progress and innovation.
          </p>
          <div class="alert alert-success mt-4">
            <i class="fas fa-heart me-2"></i>
            <strong class="lead">Welcome Message:</strong> <span class="lead">The Municipality of Baras welcomes visitors, partners, and stakeholders to explore its destinations, engage with its culture, and contribute to the continued growth and preservation of the community.</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/gg/contact.php" class="btn btn-primary">
          <i class="fas fa-envelope me-2"></i>Contact Us
        </a>
      </div>
    </div>
  </div>
</div>
