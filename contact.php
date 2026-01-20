<?php
require_once __DIR__ . '/config.php';

$name = '';
$email = '';
$subject = '';
$message = '';
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $subject === '' || $message === '') {
        $errors[] = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    } else {
        // Only allow messages from registered (and verified) users
        $stmt = $pdo->prepare('SELECT is_verified FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            $errors[] = 'Please use the email address you registered with.';
        } elseif (isset($user['is_verified']) && (int)$user['is_verified'] === 0) {
            $errors[] = 'Please verify your email address before sending us a message.';
        }
    }

    if (!$errors) {
        $stmt = $pdo->prepare('INSERT INTO messages (name, email, subject, message) VALUES (?,?,?,?)');
        $stmt->execute([$name, $email, $subject, $message]);

        // Send notification email to tourism office
        $officeEmail = 'tourismcatanduanesgov@gmail.com';
        $from = 'tourismcatanduanesgov@gmail.com';
        $headers = "From: $from\r\nReply-To: $email\r\n";

        $officeSubject = 'New inquiry from Catanduanes Tourism website';
        $officeBody = "Name: $name\n" .
                      "Email: $email\n" .
                      "Subject: $subject\n\n" .
                      "Message:\n$message";
        @mail($officeEmail, $officeSubject, $officeBody, $headers);

        // Auto-reply to the visitor
        $autoSubject = 'Thank you for contacting Catanduanes Tourism';
        $autoBody = "Hi $name,\n\n" .
                    "Thank you for reaching out to the Provincial Tourism Office. " .
                    "We have received your message and will get back to you as soon as possible during office hours.\n\n" .
                    "This is an automated reply to let you know your message was delivered.\n\n" .
                    "Tourism Catanduanes Team";
        $autoHeaders = "From: $from\r\nReply-To: $from\r\n";
        @mail($email, $autoSubject, $autoBody, $autoHeaders);

        $success = 'Your message has been sent successfully.';
        $name = $email = $subject = $message = '';
    }
}

include __DIR__ . '/includes/header.php';
?>

<section class="section-muted py-5">
  <div class="container" style="max-width: 1100px;">
    <div class="text-center mb-4">
      <span class="badge bg-primary bg-opacity-10 text-primary pill-soft pill-soft-blue mb-2">Contact &amp; Booking</span>
      <h2 class="fw-bold mb-2">Let's Plan Your Journey</h2>
      <p class="text-muted mb-0">Ready to explore Catanduanes? Get in touch with our tourism office for assistance with bookings, itineraries, and travel questions.</p>
    </div>

    <div class="row g-4">
      <!-- Left: contact info cards -->
      <div class="col-lg-5">
        <div class="contact-info-card mb-3">
          <h6 class="mb-1">Phone</h6>
          <p class="mb-1 small">09207502145</p><p class="mb-1 small">09487597647</p>
          <p class="mb-1 small">09632893514</p><p class="mb-1 small">09519083629</p>
          <p class="mb-0 text-muted small">Call us for inquiries and assistance.</p>
        </div>
        <div class="contact-info-card mb-3">
          <h6 class="mb-1">Email</h6>
          <p class="mb-1 small">tourismcatanduanesgov@gmail.com</p>
          <p class="mb-0 text-muted small">We typically reply within 24 hours.</p>
        </div>
        <div class="contact-info-card mb-3">
          <h6 class="mb-1">Office Address</h6>
          <p class="mb-1 small">Provincial Tourism Office, Capitol Compound</p>
          <p class="mb-0 small">Virac, Catanduanes</p>
        </div>
        <div class="contact-info-card mb-3">
          <h6 class="mb-1">Office Hours</h6>
          <p class="mb-1 small">Monday - Friday: 8AM - 5PM</p>
          <p class="mb-0 small">Saturday: 8AM - 12PM</p>
        </div>
        
        <!-- Emergency Hotlines -->
        <div class="contact-info-card mb-3 emergency-hotlines">
          <h6 class="mb-3 text-danger fw-bold">
            <i class="fas fa-exclamation-triangle me-2"></i>EMERGENCY HOTLINES IN BARAS
          </h6>
          <div class="emergency-grid">
            <div class="emergency-item">
              <div>
                <span class="emergency-title">Municipal Disaster Risk Reduction and Management Office- LGU Baras</span>
                <span class="emergency-address">Baras Municipal Hall, Eastern Población, Baras, Catanduanes</span>
                <span class="emergency-number">09752317862</span>
              </div>
            </div>
            <div class="emergency-item">
              <div>
                <span class="emergency-title">Baras Municipal Police Station</span>
                <span class="emergency-address">Bagong Silangan, Baras, Catanduanes</span>
                <span class="emergency-number">09752317862</span>
              </div>
            </div>
            <div class="emergency-item">
              <div>
                <span class="emergency-title">Bureau of Fire Protection</span>
                <span class="emergency-address">Eastern Poblacion, Baras Catanduanes</span>
                <span class="emergency-number">09611039801</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: message form -->
      <div class="col-lg-7">
        <div class="contact-form-card">
          <?php if ($errors): ?>
            <div class="alert alert-danger alert-auto-hide"><?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?></div>
          <?php endif; ?>
          <?php if ($success): ?>
            <div class="alert alert-success alert-auto-hide"><?php echo htmlspecialchars($success); ?></div>
          <?php endif; ?>

          <form method="post" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label small">Name</label>
                <input type="text" name="name" class="form-control" required value="<?php echo htmlspecialchars($name); ?>">
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label small">Email Address</label>
                <input type="email" name="email" class="form-control" required value="<?php echo htmlspecialchars($email); ?>">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label small">Subject</label>
              <input type="text" name="subject" class="form-control" required value="<?php echo htmlspecialchars($subject); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label small">Message</label>
              <textarea name="message" rows="5" class="form-control" required><?php echo htmlspecialchars($message); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>

<style>
/* Emergency Hotlines Styles */
.emergency-hotlines {
  border: 3px solid #ff6b35 !important;
  background: linear-gradient(135deg, #fff8e1 0%, #ffffff 100%);
  box-shadow: 0 8px 25px rgba(255, 107, 53, 0.15);
}

.emergency-hotlines h6 {
  background: linear-gradient(135deg, #ff6b35 0%, #ff4500 100%);
  color: white !important;
  padding: 15px 20px;
  border-radius: 10px;
  margin-bottom: 25px !important;
  text-align: center;
  box-shadow: 0 6px 20px rgba(255, 107, 53, 0.3);
  font-size: 1.1rem;
  letter-spacing: 0.5px;
}

.emergency-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 15px;
  max-height: 450px;
  overflow-y: auto;
  padding-right: 15px;
}

.emergency-grid::-webkit-scrollbar {
  width: 8px;
}

.emergency-grid::-webkit-scrollbar-track {
  background: #fff8e1;
  border-radius: 4px;
}

.emergency-grid::-webkit-scrollbar-thumb {
  background: linear-gradient(135deg, #ff6b35 0%, #ff4500 100%);
  border-radius: 4px;
}

.emergency-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  background: white;
  border-radius: 10px;
  border-left: 5px solid #ff6b35;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  position: relative;
}

.emergency-item::before {
  content: '';
  position: absolute;
  left: 8px;
  top: 50%;
  transform: translateY(-50%);
  width: 8px;
  height: 8px;
  background: #ff6b35;
  border-radius: 50%;
  box-shadow: 0 0 10px rgba(255, 107, 53, 0.4);
}

.emergency-item:hover {
  transform: translateX(8px);
  box-shadow: 0 6px 25px rgba(255, 107, 53, 0.2);
  border-left-color: #ff4500;
  background: linear-gradient(90deg, #fff8e1 0%, white 100%);
}

.emergency-title {
  font-size: 0.9rem;
  font-weight: 700;
  color: #333;
  flex: 1;
  margin-right: 20px;
  margin-left: 20px;
  text-transform: uppercase;
  letter-spacing: 0.3px;
}

.emergency-number {
  font-size: 0.95rem;
  font-weight: 800;
  color: #ff4500;
  white-space: nowrap;
  background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(255, 69, 0, 0.15) 100%);
  padding: 8px 12px;
  border-radius: 8px;
  font-family: 'Courier New', monospace;
  border: 2px solid rgba(255, 107, 53, 0.2);
  box-shadow: 0 2px 8px rgba(255, 107, 53, 0.1);
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .emergency-item {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
    padding: 15px;
  }
  
  .emergency-item::before {
    position: relative;
    left: 0;
    top: 0;
    margin-bottom: 5px;
  }
  
  .emergency-title {
    margin-right: 0;
    margin-left: 0;
    font-size: 0.85rem;
  }
  
  .emergency-number {
    font-size: 0.9rem;
    align-self: stretch;
    text-align: center;
  }
}

/* Enhanced animation for emergency icon */
.emergency-hotlines h6 i {
  animation: emergencyPulse 1.5s infinite;
  margin-right: 8px;
}

@keyframes emergencyPulse {
  0% { 
    transform: scale(1); 
    color: white;
  }
  50% { 
    transform: scale(1.2); 
    color: #ffeb3b;
  }
  100% { 
    transform: scale(1); 
    color: white;
  }
}

/* Add subtle glow effect */
.emergency-hotlines {
  position: relative;
}

.emergency-hotlines::after {
  content: '';
  position: absolute;
  top: -2px;
  left: -2px;
  right: -2px;
  bottom: -2px;
  background: linear-gradient(45deg, #ff6b35, #ff4500, #ff6b35);
  border-radius: 12px;
  z-index: -1;
  opacity: 0.3;
  filter: blur(8px);
}
</style>
