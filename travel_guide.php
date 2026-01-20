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
</style>

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
            <!-- Accommodation 1 -->
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

    <!-- Itinerary tab -->
    <div class="tab-pane fade" id="itinerary" role="tabpanel" aria-labelledby="itinerary-tab">
      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-2">Suggested Itineraries</h5>
          <p class="text-muted small mb-2">Add 3-day and 5-day sample itineraries covering Puraran, Binurong Point, Maribina Falls, and heritage sites like Bato Church.</p>
        </div>
      </div>
    </div>

    <!-- Tips tab -->
    <div class="tab-pane fade" id="tips" role="tabpanel" aria-labelledby="tips-tab">
      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
          <h5 class="fw-bold mb-2">Travel Tips</h5>
          <p class="text-muted small mb-2">Share packing tips, best travel months (dry season), and safety reminders for surfing spots and cliff viewpoints.</p>
        </div>
      </div>
    </div>
  </div>
<!-- Map with route to Baras, Catanduanes -->
  <div class="mt-4">
    <h5 class="fw-bold mb-3">Route to Baras, Catanduanes, Philippines</h5>
    <div class="ratio ratio-16x9 rounded overflow-hidden shadow-sm">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15655.000000000002!2d124.293333!3d13.716667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a01662923f738b%3A0x8a9235d214a1c5d!2sBaras%2C+Catanduanes!5e0!3m2!1sen!2sph!4v1700000000000!5m2!1sen!2sph"
        style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="mt-3">
      <a href="https://www.google.com/maps/dir/?api=1&destination=Baras,+Catanduanes" 
         target="_blank" 
         class="btn btn-primary btn-sm">
        <i class="fas fa-directions me-2"></i>Get Directions from Your Location
      </a>
    </div>
  </div>
</div>
</div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
