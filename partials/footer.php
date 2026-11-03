<?php
if (!isset($config) && function_exists('tsr_config')) {
  $config = tsr_config();
}
$email = $config['contact_email'] ?? 'grow@tradeshowrealm.com';
$phone = $config['contact_phone'] ?? '(833) 475-1100';
?>
   <!-- Footer -->
  <footer class="tsr-footer" id="contact">
    <div class="container-fluid tsr-container">
      <div class="row gy-5">
        <div class="col-lg-3 col-md-6">
          <div class="tsr-footer-logo">
            <img src="assets/images/footer-logo-card.jpg" alt="Trade Show Realm logo">
          </div>
          <p class="tsr-footer-text">Your partner for tradeshow success in the USA — from strategy to booth design, logistics, support, and lead follow-up.</p>
          <div class="tsr-socials">
            <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <h3>Quick Links</h3>
          <ul class="tsr-footer-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="potfolio.php">Portfolio</a></li>
            <li><a href="industries.php">Industries</a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="wearhose.php">Wear House</a></li>
            <li><a href="contactus.php">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6">
          <h3>Core Services</h3>
          <ul class="tsr-footer-list">
            <li><a href="strategy.php">Tradeshow Strategy</a></li>
            <li><a href="bothdesign.php">Booth Design & Fabrication</a></li>
            <li><a href="printable.php">Printing & Graphics</a></li>
            <li><a href="wearhose.php">Tradeshow Setup and Install</a></li>
            <li><a href="logistic.php">Logistics & Transportation</a></li>
            <li><a href="leadgeneration.php">Lead Generation and Follow Up</a></li>
            <li><a href="staff.php">On-Site Support and Staffing</a></li>
            <li><a href="product.php">Product Representation</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 tsr-contact-col">
          <img class="tsr-network" src="assets/images/footer-network.png" alt="">
          <h3>Contact</h3>
          <p><strong>USA Market Support</strong><br>Nationwide Presence</p>
          <p><strong>Phone</strong><br><a href="tel:+18334751100"><?= htmlspecialchars($phone) ?></a></p>
          <p><strong>Email</strong><br><a href="mailto:<?= htmlspecialchars($email) ?>"><?= htmlspecialchars($email) ?></a></p>
          <p><strong>Hours</strong><br>Mon–Fri · 9AM–6PM EST</p>
          <a href="getquote.php" class="btn tsr-btn tsr-btn-primary tsr-footer-btn">Get a Quote</a>
        </div>
      </div>
    </div>

    <div class="tsr-copyright">
      <div class="container-fluid tsr-container d-flex flex-column flex-md-row justify-content-between gap-2">
        <p>© <?= date('Y') ?> Trade Show Realm. All rights reserved.</p>
        <p><a href="contactus.php">Privacy Policy</a> <span>•</span> <a href="contactus.php">Terms of Service</a></p>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="assets/js/tsrealm-main.js"></script>
  <script src="assets/js/forms.js"></script>
</body>
</html>
