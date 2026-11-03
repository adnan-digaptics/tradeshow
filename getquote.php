<?php
require_once __DIR__ . '/includes/process-quote.php';
require_once __DIR__ . '/includes/helpers.php';
$flash = tsr_flash_get();
$config = tsr_config();
$page_title = 'Get a Quote | Trade Show Realm';
$quote_sent = isset($_GET['sent']);
include('partials/header.php');
?>
<!-- Hero Section -->
<section class="tsrlm-quote-hero">
<div aria-hidden="true" class="tsrlm-quote-hero-bg"></div>
<div class="container-fluid tsrlm-site-container">
<div class="tsrlm-breadcrumbs">
<a href="index.php">Home</a>
<span>/</span>
<a href="getquote.php">Services</a>
<span>/</span>
<span>Get a Quote</span>
</div>
<div class="row align-items-center tsrlm-hero-row">
<div class="col-xl-5 col-lg-6 col-md-8">
<div class="tsrlm-eyebrow">GET A QUOTE</div>
<h1 class="tsrlm-hero-title">Let’s Build Your <span>USA Growth Strategy</span></h1>
<p class="tsrlm-hero-copy">
            Whether you need a trade show booth, nationwide product representation,
            distributor placement, printing, logistics, or complete U.S. market entry
            support — we create a customized plan for your business.
          </p>
<div class="tsrlm-hero-checks">
<span><i class="bi bi-check2-circle"></i> Nationwide Coverage</span>
<span><i class="bi bi-check2-circle"></i> End-to-End Solutions</span>
<span><i class="bi bi-check2-circle"></i> Dedicated Project Team</span>
</div>
<div class="tsrlm-hero-actions">
<a class="tsrlm-btn tsrlm-btn-primary" href="#tsrlm-project-form"><i class="bi bi-calendar2-check"></i> Schedule Consultation</a>
<a class="tsrlm-btn tsrlm-btn-ghost" href="#tsrlm-project-form"><i class="bi bi-send"></i> Get My Proposal</a>
</div>
</div>
</div>
</div>
</section>
<!-- Quote Form -->
<main class="tsrlm-form-section" id="tsrlm-project-form">
<div class="container-fluid tsrlm-site-container">
<div class="tsrlm-form-heading text-center">
<h2>Tell Us About Your Project</h2>
<p>The more details you provide, the more accurate and customized your quote will be.</p>
</div>
<?= tsr_render_alert($flash) ?>
<form action="getquote.php" class="tsrlm-quote-form" enctype="multipart/form-data" id="tsrlm-quote-form" method="post">
<input type="hidden" name="tsr_form" value="quote">
<div class="row g-3 align-items-start tsrlm-main-layout">
<div class="col-xl-9 col-lg-8 tsrlm-main-col">
<div class="row g-4">
<div class="col-md-6 col-lg-4">
<section class="tsrlm-card tsrlm-service-card">
<h3><i class="bi bi-shop-window"></i> Trade Show Services</h3>
<div class="tsrlm-check-list">
<label><input name="services[]" type="checkbox" value="tradeshow-strategy"/> Tradeshow Strategy</label>
<label><input name="services[]" type="checkbox" value="booth-design"/> Booth Design &amp; Fabrication</label>
<label><input name="services[]" type="checkbox" value="printing-graphics"/> Printing &amp; Graphics</label>
<label><input name="services[]" type="checkbox" value="setup-install"/> Tradeshow Setup and Install</label>
<label><input name="services[]" type="checkbox" value="logistics-transportation"/> Logistics &amp; Transportation</label>
<label><input name="services[]" type="checkbox" value="lead-generation"/> Lead Generation and Follow Up</label>
<label><input name="services[]" type="checkbox" value="onsite-support"/> On-Site Support and Staffing</label>
<label><input name="services[]" type="checkbox" value="others"/> Others</label>
</div>
</section>
</div>
<div class="col-md-6 col-lg-4">
<section class="tsrlm-card tsrlm-service-card">
<h3><i class="bi bi-globe-americas"></i> USA Market Expansion</h3>
<div class="tsrlm-check-list">
<label><input name="expansion[]" type="checkbox" value="market-entry"/> USA Market Entry</label>
<label><input name="expansion[]" type="checkbox" value="representation"/> Product Representation</label>
<label><input name="expansion[]" type="checkbox" value="distributor"/> Distributor Placement</label>
<label><input name="expansion[]" type="checkbox" value="retail"/> Retail Placement</label>
<label><input name="expansion[]" type="checkbox" value="dealer-network"/> Dealer Network Development</label>
<label><input name="expansion[]" type="checkbox" value="warehousing"/> Warehousing &amp; Fulfillment</label>
</div>
</section>
</div>
<div class="col-md-6 col-lg-4">
<section class="tsrlm-card tsrlm-service-card">
<h3><i class="bi bi-megaphone"></i> Marketing Support</h3>
<div class="tsrlm-check-list">
<label><input name="marketing[]" type="checkbox" value="website"/> Website Development</label>
<label><input name="marketing[]" type="checkbox" value="brand-materials"/> Brand Materials</label>
<label><input name="marketing[]" type="checkbox" value="product-photography"/> Product Photography</label>
<label><input name="marketing[]" type="checkbox" value="video-production"/> Video Production</label>
<label><input name="marketing[]" type="checkbox" value="crm"/> CRM &amp; Automation</label>
<label><input name="marketing[]" type="checkbox" value="sales-collateral"/> Sales Collateral</label>
</div>
</section>
</div>
<div class="col-lg-6">
<section class="tsrlm-card">
<h3>Company Information</h3>
<div class="row g-3">
<div class="col-sm-6">
<label class="tsrlm-label">Company Name*</label>
<input class="form-control tsrlm-input" name="company_name" placeholder="Company Name" required="" type="text"/>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Website</label>
<input class="form-control tsrlm-input" name="website" placeholder="https://" type="url"/>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Industry*</label>
<select class="form-select tsrlm-input" name="industry" required="">
<option disabled="" selected="" value="">Select Industry</option>
<option value="manufacturing">Manufacturing</option>
<option value="technology">Technology</option>
<option value="consumer-products">Consumer Products</option>
<option value="healthcare">Healthcare</option>
<option value="food-beverage">Food &amp; Beverage</option>
<option value="other">Other</option>
</select>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Country*</label>
<select class="form-select tsrlm-input" name="country" required="">
<option disabled="" selected="" value="">Select Country</option>
<option value="united-states">United States</option>
<option value="canada">Canada</option>
<option value="united-kingdom">United Kingdom</option>
<option value="pakistan">Pakistan</option>
<option value="united-arab-emirates">United Arab Emirates</option>
<option value="other">Other</option>
</select>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">State</label>
<input class="form-control tsrlm-input" name="state" placeholder="State" type="text"/>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Contact Name*</label>
<input class="form-control tsrlm-input" name="contact_name" placeholder="Full Name" required="" type="text"/>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Email*</label>
<input class="form-control tsrlm-input" name="email" placeholder="Email" required="" type="email"/>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Phone</label>
<input class="form-control tsrlm-input" name="phone" placeholder="Phone" type="tel"/>
</div>
<div class="col-12">
<label class="tsrlm-label">LinkedIn / Catalog Link</label>
<input class="form-control tsrlm-input" name="linkedin_catalog_link" placeholder="https://" type="url"/>
</div>
</div>
</section>
</div>
<div class="col-lg-6">
<section class="tsrlm-card">
<h3>Trade Show Information</h3>
<div class="tsrlm-mini-group mb-3">
<span>Are you exhibiting at a trade show?</span>
<label><input name="exhibiting" type="radio" value="yes"/> Yes</label>
<label><input name="exhibiting" type="radio" value="no"/> No</label>
</div>
<div class="row g-3">
<div class="col-sm-6">
<label class="tsrlm-label">Show Name</label>
<input class="form-control tsrlm-input" name="show_name" placeholder="Event Name" type="text"/>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Event Date</label>
<input class="form-control tsrlm-input" name="event_date" type="date"/>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Event Location</label>
<input class="form-control tsrlm-input" name="event_location" placeholder="City / Venue" type="text"/>
</div>
<div class="col-sm-6">
<label class="tsrlm-label">Booth Size</label>
<div class="tsrlm-pill-row tsrlm-pill-row-sm">
<label><input name="booth_size" type="radio" value="10x10"/> 10x10</label>
<label><input name="booth_size" type="radio" value="10x20"/> 10x20</label>
<label><input name="booth_size" type="radio" value="20x20"/> 20x20</label>
<label><input name="booth_size" type="radio" value="20x30"/> 20x30</label>
<label><input name="booth_size" type="radio" value="custom"/> Custom</label>
</div>
</div>
</div>
</section>
</div>
<div class="col-lg-6">
<section class="tsrlm-card">
<h3>USA Expansion Information</h3>
<div class="tsrlm-mini-group mb-3">
<span>Are you currently selling in the USA?</span>
<label><input name="selling_usa" type="radio" value="yes"/> Yes</label>
<label><input name="selling_usa" type="radio" value="no"/> No</label>
</div>
<label class="tsrlm-label">Annual Revenue Range</label>
<div class="tsrlm-pill-row mb-3">
<label><input name="revenue" type="radio" value="under-500k"/> Under $500K</label>
<label><input name="revenue" type="radio" value="500k-1m"/> $500K - $1M</label>
<label><input name="revenue" type="radio" value="1m-5m"/> $1M - $5M</label>
<label><input name="revenue" type="radio" value="5m"/> $5M+</label>
</div>
<label class="tsrlm-label">Target Market</label>
<div class="tsrlm-pill-row">
<label><input name="target_market[]" type="checkbox" value="retail"/> Retail</label>
<label><input name="target_market[]" type="checkbox" value="distribution"/> Distribution</label>
<label><input name="target_market[]" type="checkbox" value="wholesale"/> Wholesale</label>
<label><input name="target_market[]" type="checkbox" value="b2b"/> B2B</label>
<label><input name="target_market[]" type="checkbox" value="government"/> Government</label>
<label><input name="target_market[]" type="checkbox" value="hospitality"/> Hospitality</label>
<label><input name="target_market[]" type="checkbox" value="e-commerce"/> E-commerce</label>
</div>
</section>
</div>
<div class="col-lg-6">
<section class="tsrlm-card">
<h3>Project Scope</h3>
<label class="tsrlm-label">What are your goals? Select all that apply.</label>
<div class="tsrlm-pill-row">
<label><input name="project_goals[]" type="checkbox" value="generate-leads"/> Generate Leads</label>
<label><input name="project_goals[]" type="checkbox" value="find-distributors"/> Find Distributors</label>
<label><input name="project_goals[]" type="checkbox" value="launch-product"/> Launch Product</label>
<label><input name="project_goals[]" type="checkbox" value="grow-usa-market"/> Grow USA Market</label>
<label><input name="project_goals[]" type="checkbox" value="increase-brand-awareness"/> Increase Brand Awareness</label>
<label><input name="project_goals[]" type="checkbox" value="retail-placement"/> Retail Placement</label>
<label><input name="project_goals[]" type="checkbox" value="dealer-recruitment"/> Dealer Recruitment</label>
<label><input name="project_goals[]" type="checkbox" value="strategic-partnerships"/> Strategic Partnerships</label>
</div>
</section>
</div>
<div class="col-lg-6">
<section class="tsrlm-card">
<h3>Project Budget</h3>
<label class="tsrlm-label">Estimated Budget</label>
<div class="tsrlm-pill-row">
<label><input name="budget" type="radio" value="under-5-000"/> Under $5,000</label>
<label><input name="budget" type="radio" value="5-000-10-000"/> $5,000 - $10,000</label>
<label><input name="budget" type="radio" value="10-000-25-000"/> $10,000 - $25,000</label>
<label><input name="budget" type="radio" value="25-000-50-000"/> $25,000 - $50,000</label>
<label><input name="budget" type="radio" value="50-000"/> $50,000+</label>
</div>
</section>
</div>
<div class="col-lg-6">
<section class="tsrlm-card">
<h3>Timeline</h3>
<label class="tsrlm-label">When do you need this completed?</label>
<div class="tsrlm-pill-row">
<label><input name="timeline" type="radio" value="immediately"/> Immediately</label>
<label><input name="timeline" type="radio" value="within-30-days"/> Within 30 Days</label>
<label><input name="timeline" type="radio" value="1-3-months"/> 1-3 Months</label>
<label><input name="timeline" type="radio" value="3-6-months"/> 3-6 Months</label>
<label><input name="timeline" type="radio" value="flexible"/> Flexible</label>
</div>
</section>
</div>
<div class="col-12">
<section class="tsrlm-card">
<h3>Additional Information</h3>
<label class="tsrlm-label">Tell us more about your project, products, target market, or any specific requirements.</label>
<textarea class="form-control tsrlm-input tsrlm-textarea" name="additional_information" placeholder="Type your message here..."></textarea>
</section>
</div>
</div>
</div>
<aside class="col-xl-3 col-lg-4 tsrlm-side-col">
<div class="tsrlm-sidebar-wrap">
<section class="tsrlm-card tsrlm-upload-card">
<h3>Upload Files <span>(Optional)</span></h3>
<p>Upload any relevant files to help us understand your project better.</p>
<label class="tsrlm-upload-box" for="tsrlm-upload-input">
<i class="bi bi-cloud-arrow-up"></i>
<strong>Drag &amp; Drop Files Here</strong>
<small>or</small>
<span>Choose Files</span>
<input accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip,.png,.jpg,.jpeg" hidden="" id="tsrlm-upload-input" multiple="" name="project_files[]" type="file"/>
</label>
<small class="tsrlm-upload-help">Accepted: PDF, DOCX, PPTX, XLSX, ZIP, PNG, JPG</small>
<ul class="tsrlm-file-list" id="tsrlm-file-list"></ul>
</section>
<section class="tsrlm-card tsrlm-package-card-wrap">
<h3>Service Packages <span>(Starting At)</span></h3>
<div class="tsrlm-package-slider">
<article class="tsrlm-package-slide">
<div class="tsrlm-package-icon"><i class="bi bi-display"></i></div>
<h4>Trade Show Launch</h4>
<strong>$3,500+</strong>
<ul>
<li>Booth Design &amp; Planning</li>
<li>Graphics &amp; Signage</li>
<li>Printing &amp; Logistics Support</li>
</ul>
</article>
<article class="tsrlm-package-slide">
<div class="tsrlm-package-icon"><i class="bi bi-graph-up-arrow"></i></div>
<h4>Market Entry Accelerator</h4>
<strong>$9,500+</strong>
<ul>
<li>Market Research</li>
<li>Distributor Outreach</li>
<li>Launch Strategy</li>
</ul>
</article>
<article class="tsrlm-package-slide">
<div class="tsrlm-package-icon"><i class="bi bi-globe2"></i></div>
<h4>USA Growth Partner</h4>
<strong>$25,000+</strong>
<ul>
<li>Product Representation</li>
<li>Lead Generation</li>
<li>Ongoing Market Development</li>
</ul>
</article>
</div>
</section>
</div>
</aside>
</div>
<div class="tsrlm-submit-wrap" id="tsrlm-submit-area">
<div class="tsrlm-submit-card">
<div class="tsrlm-submit-copy">
<h3>Submit Your Project Details</h3>
<p>Review your information, then submit the form. All selected services, company details, trade show information, uploaded files, budget, timeline, and project notes are included.</p>
</div>
<div class="tsrlm-submit-actions">
<button class="tsrlm-btn tsrlm-btn-primary tsrlm-submit-btn" id="tsrlm-submit-btn" type="submit">
        Submit Project Request <i class="bi bi-arrow-right"></i>
</button>
<small>No obligation. Our team will review your details and follow up.</small>
</div>
</div>
<div aria-live="polite" class="tsrlm-submit-success<?= $quote_sent ? ' is-visible' : '' ?>" id="tsrlm-submit-success" role="status"<?= $quote_sent ? '' : ' hidden' ?>>
<i class="bi bi-check-circle-fill"></i>
<span>Your project request has been captured successfully.</span>
</div>
</div>

</form>
</div>
</main>
<!-- Why Choose -->
<section class="tsrlm-why-section">
<div class="container-fluid tsrlm-site-container">
<h2 class="tsrlm-section-title text-center">Why Companies Choose Trade Show Realm</h2>
<div class="row g-3">
<div class="col-md-6 col-xl-3">
<article class="tsrlm-why-card">
<i class="bi bi-geo-alt"></i>
<h3>50 States Covered</h3>
<p>Nationwide network of trade show and market expansion partners.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="tsrlm-why-card">
<i class="bi bi-diagram-3"></i>
<h3>End-to-End Execution</h3>
<p>One partner from strategy and booth planning to logistics and launch.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="tsrlm-why-card">
<i class="bi bi-bullseye"></i>
<h3>USA Market Experts</h3>
<p>Local market knowledge for product placement and growth planning.</p>
</article>
</div>
<div class="col-md-6 col-xl-3">
<article class="tsrlm-why-card">
<i class="bi bi-bar-chart-line"></i>
<h3>Results Focused</h3>
<p>Measured around qualified leads, partnerships, and market traction.</p>
</article>
</div>
</div>
</div>
</section>
<!-- CTA -->
<section class="tsrlm-cta-section">
<div class="container-fluid tsrlm-site-container">
<div class="tsrlm-cta-box">
<div class="row align-items-center g-4">
<div class="col-lg-7">
<h2>Ready to Launch, Expand, and Grow in the USA?</h2>
<p>Tell us about your project and receive a customized strategy proposal.</p>
<div class="tsrlm-cta-links">
<a href="tel:<?= tsr_esc($config['contact_phone_tel']) ?>"><i class="bi bi-telephone"></i> <?= tsr_esc($config['contact_phone']) ?></a>
<a href="mailto:<?= tsr_esc($config['contact_email']) ?>"><i class="bi bi-envelope"></i> <?= tsr_esc($config['contact_email']) ?></a>
</div>
</div>
<div class="col-lg-5 text-lg-end">
<a class="tsrlm-btn tsrlm-btn-primary tsrlm-cta-btn" href="getquote.php">Get My Custom Proposal <i class="bi bi-arrow-right"></i></a>
<small>No obligation. Just a plan for your success.</small>
</div>
</div>
</div>
</div>
</section>
<!-- Trust Bar -->
<section class="tsrlm-trust-section">
<div class="container-fluid tsrlm-site-container">
<div class="row g-3">
<div class="col-6 col-lg-3"><div class="tsrlm-trust-item"><i class="bi bi-building-check"></i><span>Trusted by 1000+ Companies</span></div></div>
<div class="col-6 col-lg-3"><div class="tsrlm-trust-item"><i class="bi bi-patch-check"></i><span>Proven Process with Real Results</span></div></div>
<div class="col-6 col-lg-3"><div class="tsrlm-trust-item"><i class="bi bi-emoji-smile"></i><span>Client Satisfaction Focused</span></div></div>
<div class="col-6 col-lg-3"><div class="tsrlm-trust-item"><i class="bi bi-clock-history"></i><span>Long-Term Partnership</span></div></div>
</div>
</div>
</section>
<?php include('partials/footer.php'); ?>
