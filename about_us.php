<?php include __DIR__ . '/includes/header.php'; ?>

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
            <img src="/gg/assets/images/e.jpg" alt="Discover the Majestic Baras" class="img-fluid rounded-3 shadow-sm w-100" style="object-fit: contain; height: 300px;">
          </div>
          <div class="col-12">
            <img src="/gg/assets/images/d.jpg" alt="Baras Scenic View" class="img-fluid rounded-3 shadow-sm w-100" style="object-fit: contain; height: 200px;">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // About Us Section Animations
  const counters = document.querySelectorAll('.counter');
  const statBoxes = document.querySelectorAll('.stat-box');
  
  // Animate counters when they come into view
  const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px 0px -100px 0px'
  };
  
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const statBox = counter.closest('.stat-box');
        const target = parseInt(statBox.getAttribute('data-count'));
        const increment = target / 100;
        let current = 0;
        
        const updateCounter = () => {
          current += increment;
          if (current < target) {
            counter.textContent = Math.ceil(current) + '+';
            setTimeout(updateCounter, 20);
          } else {
            counter.textContent = target + '+';
          }
        };
        
        updateCounter();
        counterObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);
  
  counters.forEach(counter => {
    counterObserver.observe(counter);
  });
  
  // Animate stat boxes on hover
  statBoxes.forEach(box => {
    box.addEventListener('mouseenter', function() {
      this.style.transform = 'translateY(-10px) scale(1.05)';
      this.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.2)';
    });
    
    box.addEventListener('mouseleave', function() {
      this.style.transform = 'translateY(0) scale(1)';
      this.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.08)';
    });
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
  border-color: #0d6efd;
  transform: translateY(-5px) scale(1.05);
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.animated-stat {
  opacity: 0;
  transform: translateY(20px);
  animation: fadeInUp 0.6s ease forwards;
}

.animated-stat:nth-child(2) {
  animation-delay: 0.2s;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* About Us section specific styles */
.bg-light {
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
}
</style>

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
            The name "Baras" is derived from the local word meaning "to separate" or "to divide," referring to the geographical separation of the area from other parts of Catanduanes. This name reflects the unique identity and distinct character of Baras as a municipality that maintains its own cultural heritage and natural beauty separate from the rest of the island.
          </p>

          <h4 class="text-primary mb-3 mt-4">Natural Wonders</h4>
          <p class="lead">
            Baras boasts some of Catanduanes' most spectacular natural attractions. Binurong Point offers panoramic views of the Pacific Ocean with its dramatic cliff formations, while Puraran Beach is famous for its world-class surfing waves and pristine white sand. The municipality is also home to hidden waterfalls, lush forests, and rolling hills that create a paradise for nature lovers and adventure seekers.
          </p>

          <h4 class="text-primary mb-3 mt-4">Cultural Heritage</h4>
          <p class="lead">
            The people of Baras take pride in their rich cultural heritage, preserving traditional practices and customs that have been passed down through generations. The community is known for its warm hospitality, strong family values, and deep connection to the land and sea. This cultural richness adds depth to the natural beauty of Baras, making it not just a destination but an experience.
          </p>

          <h4 class="text-primary mb-3 mt-4">Sustainable Tourism</h4>
          <p class="lead">
            Baras is committed to sustainable tourism practices that protect its natural environment while sharing its beauty with visitors. The local government and community work together to ensure that development balances economic growth with environmental conservation, preserving the pristine beauty that makes Baras special for future generations.
          </p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/gg/index.php#about" class="btn btn-primary">Visit Main Page</a>
      </div>
    </div>
  </div>
</div>
