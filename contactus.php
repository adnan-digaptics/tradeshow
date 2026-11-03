<?php
require_once __DIR__ . '/includes/process-contact.php';
require_once __DIR__ . '/includes/helpers.php';
$flash = tsr_flash_get();
$config = tsr_config();
$page_title = 'Contact Us | Trade Show Realm';
include('partials/header.php');
?>

<section class="tsr-contact-page">

  <!-- Hero -->
  <section class="tsr-contact-hero">
    <div class="tsr-hero-bg" aria-hidden="true"></div>
    <div class="container tsr-container">
      <div class="tsr-hero-content">
        <span class="tsr-eyebrow">CONTACT US</span>

        <h1 class="tsr-hero-title">
          Let’s Start a <br>
          <span>Powerful Partnership.</span>
        </h1>

        <p class="tsr-hero-text">
          Have questions or ready to grow in the USA? Our team is here to help you every step of the way.
        </p>

        <div class="tsr-hero-feature-row">
          <div class="tsr-hero-feature">
            <i class="bi bi-headset"></i>
            <h6>Quick Response</h6>
            <p>Within 1 Business Day</p>
          </div>

          <div class="tsr-hero-feature">
            <i class="bi bi-people"></i>
            <h6>Expert Guidance</h6>
            <p>From Real People</p>
          </div>

          <div class="tsr-hero-feature">
            <i class="bi bi-shield-check"></i>
            <h6>Confidential &amp; Secure</h6>
            <p>Your Information is Safe</p>
          </div>

          <div class="tsr-hero-feature">
            <i class="bi bi-bullseye"></i>
            <h6>Results Focused</h6>
            <p>Your Growth is Our Goal</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Main Contact Area -->
  <main class="container tsr-container tsr-main-area">
    <div class="row g-4 align-items-stretch">
      <div class="col-lg-8">
        <div class="tsr-card tsr-form-card" id="contact-form">
          <h2>Send Us a Message</h2>
          <p class="tsr-card-intro">
            Fill out the form below and tell us about your project. We’ll get back to you within 1 business day.
          </p>

          <?= tsr_render_alert($flash) ?>

          <form class="tsr-contact-form" action="contactus.php" method="post" novalidate>
            <input type="hidden" name="tsr_form" value="contact">
            <div class="row g-3">
              <div class="col-md-6">
                <label for="fullName" class="form-label">Full Name *</label>
                <input id="fullName" name="full_name" type="text" class="form-control" placeholder="Enter your full name" required autocomplete="name">
              </div>

              <div class="col-md-6">
                <label for="emailAddress" class="form-label">Email Address *</label>
                <input id="emailAddress" name="email" type="email" class="form-control" placeholder="Enter your email" required autocomplete="email">
              </div>

              <div class="col-md-6">
                <label for="companyName" class="form-label">Company Name</label>
                <input id="companyName" name="company" type="text" class="form-control" placeholder="Enter your company name" autocomplete="organization">
              </div>

              <div class="col-md-6">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input id="phoneNumber" name="phone" type="tel" class="form-control" placeholder="Enter your phone number" autocomplete="tel">
              </div>

              <div class="col-12">
                <label for="serviceInterest" class="form-label">Service You’re Interested In *</label>
                <select id="serviceInterest" name="service" class="form-select" required>
                  <option value="" selected disabled>Select a service</option>
                  <option value="Tradeshow Strategy">Tradeshow Strategy</option>
                  <option value="Booth Design & Fabrication">Booth Design &amp; Fabrication</option>
                  <option value="Printing & Graphics">Printing &amp; Graphics</option>
                  <option value="Tradeshow Setup and Install">Tradeshow Setup and Install</option>
                  <option value="Logistics & Transportation">Logistics &amp; Transportation</option>
                  <option value="Lead Generation and Follow Up">Lead Generation and Follow Up</option>
                  <option value="On-Site Support and Staffing">On-Site Support and Staffing</option>
                  <option value="Others">Others</option>
                </select>
              </div>

              <div class="col-12">
                <label for="message" class="form-label">How can we help you?</label>
                <textarea id="message" name="message" class="form-control" rows="5" placeholder="Tell us about your project, goals, or any questions you have..."></textarea>
              </div>

              <div class="col-12">
                <button type="submit" class="tsr-primary-btn">
                  <i class="bi bi-send"></i>
                  Send Message
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-4">
        <aside class="tsr-card tsr-contact-info-card">
          <h2>Get in Touch</h2>

          <div class="tsr-info-list">
            <div class="tsr-info-item">
              <span class="tsr-info-icon"><i class="bi bi-telephone"></i></span>
              <div>
                <h5>Call Us</h5>
                <a href="tel:<?= tsr_esc($config['contact_phone_tel']) ?>"><?= tsr_esc($config['contact_phone']) ?></a>
                <p>Mon - Fri, 9:00 AM - 6:00 PM EST</p>
              </div>
            </div>

            <div class="tsr-info-item">
              <span class="tsr-info-icon"><i class="bi bi-envelope"></i></span>
              <div>
                <h5>Email Us</h5>
                <a href="mailto:<?= tsr_esc($config['contact_email']) ?>"><?= tsr_esc($config['contact_email']) ?></a>
                <p>We respond within 1 business day</p>
              </div>
            </div>

            <div class="tsr-info-item">
              <span class="tsr-info-icon"><i class="bi bi-geo-alt"></i></span>
              <div>
                <h5>Headquarters</h5>
                <p>1500 Concord Ter, Suite 200<br>Sunrise, FL 33323, USA</p>
              </div>
            </div>

            <div class="tsr-info-item">
              <span class="tsr-info-icon"><i class="bi bi-clock"></i></span>
              <div>
                <h5>Business Hours</h5>
                <p>Monday - Friday<br>9:00 AM - 6:00 PM EST</p>
              </div>
            </div>
          </div>

          <div class="tsr-social-block">
            <h4>Connect With Us</h4>
            <div class="tsr-social-icons">
              <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
              <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            </div>
          </div>
        </aside>
      </div>
    </div>

    <!-- Nationwide -->
    <section class="tsr-card tsr-nationwide-card">
      <div class="row align-items-center g-4">
        <div class="col-lg-5">
          <h2>Nationwide. Wherever You Need Us.</h2>
          <p>
            We serve clients in all 50 states with local partners and a nationwide network.
          </p>

          <div class="tsr-stats-grid">
            <div class="tsr-stat-item">
              <i class="bi bi-map"></i>
              <strong>50</strong>
              <span>States Covered</span>
            </div>

            <div class="tsr-stat-item">
              <i class="bi bi-buildings"></i>
              <strong>100+</strong>
              <span>Partner Locations</span>
            </div>

            <div class="tsr-stat-item">
              <i class="bi bi-people"></i>
              <strong>1,000+</strong>
              <span>Projects Delivered</span>
            </div>
          </div>
<!-- 
          <a href="usamarket.php" class="tsr-outline-btn">
            View Our Locations
            <i class="bi bi-arrow-right"></i>
          </a> -->
        </div>

        <div class="col-lg-7">
          <div class="tsr-map-wrap">
            <img src="assets/images/usa-map-pins.png" alt="USA map with service locations" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <!-- Why Work -->
    <section class="tsr-why-section">
      <h2>Why Work With Trade Show Realm?</h2>

      <div class="row g-3">
        <div class="col-sm-6 col-lg-3">
          <div class="tsr-why-card">
            <i class="bi bi-bullseye"></i>
            <div>
              <h4>Industry Experts</h4>
              <p>Deep experience in trade shows and market expansion.</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="tsr-why-card">
            <i class="bi bi-puzzle"></i>
            <div>
              <h4>End-to-End Solutions</h4>
              <p>From strategy to execution, we handle it all.</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="tsr-why-card">
            <i class="bi bi-hand-thumbs-up"></i>
            <div>
              <h4>Proven Results</h4>
              <p>We deliver measurable growth and ROI.</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-lg-3">
          <div class="tsr-why-card">
            <i class="bi bi-headset"></i>
            <div>
              <h4>Dedicated Support</h4>
              <p>Your success is backed by our dedicated team.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="tsr-cta-bar">
      <div class="tsr-cta-art" aria-hidden="true">
        <img src="assets/images/cta-network.png" alt="">
      </div>

      <div class="tsr-cta-content">
        <h2>Ready to Grow in the USA?</h2>
        <p>Let’s build a strategy that gets you real results.</p>
      </div>

      <div class="tsr-cta-actions">
        <a href="getquote.php" class="tsr-primary-btn">
          <i class="bi bi-calendar-check"></i>
          Schedule a Consultation
        </a>

        <div class="tsr-cta-call">
          <i class="bi bi-telephone"></i>
          <span>or call us <strong><?= tsr_esc($config['contact_phone']) ?></strong></span>
        </div>
      </div>
    </section>

    <!-- Trust Bar -->
    <section class="tsr-trust-bar">
      <div><i class="bi bi-people"></i><span>Trusted by 1,000+ Companies</span></div>
      <div><i class="bi bi-shield-check"></i><span>Confidential & Secure</span></div>
      <div><i class="bi bi-chat-dots"></i><span>Fast 1-Business-Day Response</span></div>
      <div><i class="bi bi-check-circle"></i><span>No Obligation Free Consultation</span></div>
      <div><i class="bi bi-star"></i><span>Committed to Your Success</span></div>
    </section>
  </main>
</section>
<?php include('partials/footer.php'); ?>
