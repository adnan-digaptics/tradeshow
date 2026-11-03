<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
if (!function_exists('tsr_config')) {
  require_once __DIR__ . '/../includes/helpers.php';
}
$config = tsr_config();
$page_title = $page_title ?? ($config['site_name'] . ' — USA Trade Show Success');
$current = basename($_SERVER['PHP_SELF'] ?? 'index.php');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= tsr_esc($page_title) ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <!-- Slick Slider -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css?v=20260918a">
</head>
<body>
  <header class="tsr-header">
    <nav class="navbar navbar-expand-xl tsr-navbar">
      <div class="container-fluid tsr-nav-container">
        <a class="navbar-brand tsr-brand" href="index.php">
          <img src="assets/images/logo.png" alt="Trade Show Realm">
        </a>

        <button class="navbar-toggler tsr-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#tsrMenu" aria-controls="tsrMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="tsrMenu">
          <ul class="navbar-nav ms-auto align-items-xl-center tsr-menu">
            <li class="nav-item"><a class="nav-link<?= $current === 'index.php' ? ' active' : '' ?>" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link<?= $current === 'potfolio.php' ? ' active' : '' ?>" href="potfolio.php">Portfolio</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle<?= in_array($current, ['strategy.php','bothdesign.php','printable.php','wearhose.php','logistic.php','leadgeneration.php','staff.php','product.php'], true) ? ' active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
              <ul class="dropdown-menu tsr-services-dropdown">
                <li><a class="dropdown-item<?= $current === 'strategy.php' ? ' active' : '' ?>" href="strategy.php">Tradeshow Strategy</a></li>
                <li><a class="dropdown-item<?= $current === 'bothdesign.php' ? ' active' : '' ?>" href="bothdesign.php">Booth Design &amp; Fabrication</a></li>
                <li><a class="dropdown-item<?= $current === 'printable.php' ? ' active' : '' ?>" href="printable.php">Printing &amp; Graphics</a></li>
                <li><a class="dropdown-item<?= $current === 'wearhose.php' ? ' active' : '' ?>" href="wearhose.php">Tradeshow Setup and Install</a></li>
                <li><a class="dropdown-item<?= $current === 'logistic.php' ? ' active' : '' ?>" href="logistic.php">Logistics &amp; Transportation</a></li>
                <li><a class="dropdown-item<?= $current === 'leadgeneration.php' ? ' active' : '' ?>" href="leadgeneration.php">Lead Generation and Follow Up</a></li>
                <li><a class="dropdown-item<?= $current === 'staff.php' ? ' active' : '' ?>" href="staff.php">On-Site Support and Staffing</a></li>
                <li><a class="dropdown-item<?= $current === 'product.php' ? ' active' : '' ?>" href="product.php">Product Representation</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link<?= $current === 'industries.php' ? ' active' : '' ?>" href="industries.php">Industries</a></li>
            <li class="nav-item"><a class="nav-link<?= $current === 'staff.php' ? ' active' : '' ?>" href="staff.php">Staff</a></li>
            <li class="nav-item"><a class="nav-link<?= $current === 'usamarket.php' ? ' active' : '' ?>" href="usamarket.php">USA Market</a></li>
            <li class="nav-item"><a class="nav-link<?= $current === 'contactus.php' ? ' active' : '' ?>" href="contactus.php">Contact</a></li>
          </ul>
          <a class="btn tsr-btn tsr-btn-dark ms-xl-4" href="getquote.php">Get a Quote</a>
        </div>
      </div>
    </nav>
  </header>
