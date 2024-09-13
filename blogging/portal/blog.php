<!DOCTYPE html>
<html lang="en">
<?php
include '../include/connect.php';
include 'assets/classes/functions.php';  
  $insight = new Insight($db);
if(isset($_GET['id']))
  {
   $insight->setInsight($_GET['id']);
   $metaTitle = $insight->getMetaTitle();
   $metaDesc = $insight->getMetaDesc();
   $title = $insight->getTitle();
   $date=$insight->getDate();
   $content=$insight->getContent();
   $authors = $insight->getAuthor();
   $img = $insight->getImage();
   $id = $_GET['id'];
  }
  ?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $metaTitle ?></title>
  <meta name="contact" content="www.ttchtech.co.za/index#contact">
  <meta name="copyright" content="TTCH Technologies 2024">
  <meta content="<?php echo $metaDesc ?>" name="description">
  <meta name="keywords" content="Technology, IT Services, IT, Development, Dev, App Dev, Web Development, Mobile Development, System Installations & Support, ICT Training, Network Installation & Maintenance, ICT Project Management">

  <!-- Favicons -->
  <link href="../../assets/img/TTCH-Technologies.png" rel="icon">
  <link href="../../assets/img/" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-D52PRN3XYV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D52PRN3XYV');
</script>
  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php
      header("Content-Type: text/html; charset=UTF-8");
   ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex justify-content-between">

      <!--<h1 class="logo me-auto"><a href="index.html">IBI Solutions</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar text-center">
        <ul>
          <li><a class="nav-link scrollto" href="https://ttchtech.co.za/index.html">Home</a></li>
          <li><a class="nav-link scrollto" href="https://ttchtech.co.za/index.html#about">About</a></li>
          <li><a class="nav-link scrollto" href="https://ttchtech.co.za/blogs">Blogs</a></li>
          <li class="nav-link dropdown active"><a href="https://ttchtech.co.za/index.html#services"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="https://ttchtech.co.za/software-development.html">Software Development</a></li>
              <li><a href="https://ttchtech.co.za/web-development.html">Web Development</a></li>
              <li><a href="https://ttchtech.co.za/cloud-web-hosting.html">Cloud Web and App Hosting Solutions</a></li>
              <li><a href="https://ttchtech.co.za/mobile-app-development.html">Mobile App Development</a></li>
              <li><a href="https://ttchtech.co.za/technical-support.html">Technical Support Services</a></li>
              <li><a href="https://ttchtech.co.za/system-installations-support.html">System Installations & Support</a></li>
              <li><a href="https://ttchtech.co.za/ict-training.html">ICT Training</a></li>
              <li><a href="https://ttchtech.co.za/network-installation-maintenance.html">Network Installation and Maintenance</a></li>
              <li><a href="https://ttchtech.co.za/ict-project-management-services.html" class="active">ICT Project Management Services</a></li>
            </ul>
          </li>
                   <li><a class="nav-link scrollto" href="https://ttchtech.co.za/index.html#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="https://ttchtech.co.za/index.html#contact">Get a quote</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section class="blog-info d-flex align-items-center">
    <div class="container">
      <div class="blog-intro">
        <div class="blog-img">
          <img src="../img/<?php echo $img ?>">
        </div>
        <div class="authors-info">
            <img src="../../assets/img/team/matome.jpg">
            <div class="d-flex justify-content-between">
              <div class="">
                <h4><?php echo $authors ?></h4>
                <p>Content Writer</p>
              </div>
            </div>
            <label class="blog-date"><?php echo $date ?></label>
          </div>
      </div>        
          <div class="bloging-content bg-white">
            <h1 class="mt-3"><?php echo $title ?></h1>
            <p class="text-white"><?php echo nl2br(html_entity_decode($content)); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-3">
            <img class="logo_" src="../../assets/img/TTCH-Technologies.png">
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>TTCH</h3>
            <p>
              66 Ingersol Rd<br>
              Lynnwood Glen<br>
              Pretoria<br>
              <strong>Phone:</strong> <a href="tel:+27 12 881 5186">+27 12 881 5186</a><br>
              <strong>Email:</strong><a href="mailto:info@ttchtech.co.za">info@ttchtech.co.za</a><br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/index.html#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/index.html#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/index.html#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/index.html#contact">Contact us</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/index.html#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/index.html#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/index.html#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/index.html#contact">Contact us</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
             <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/web-development.html">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/technical-support.html">Technical Support</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/ict-training.html">ICT Training</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/network-installation-maintenance.html">Network Installation & Maintenance</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="https://ttchtech.co.za/ict-project-management-services.html">ICT Project Management</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Follow us on</p>
            <div class="social-links mt-3">
              <a href="https://twitter.com/TTCHTech" class="twitter" target="_blank"><i class="bx bxl-twitter"></i></a>
              <a href="https://www.facebook.com/TTCHTECH" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
              <a href="http://www.instagram.com/ttch_tech" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.linkedin.com/company/ttch-technologies" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!--<div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        <!--Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>-->
  </footer><!-- End Footer -->

  <div id="preloader"><div class="row justify-content-center">
          <div class="col-lg-3">
            <img class="logo_" src="../../assets/img/TTCH-Technologies.png">
          </div>
        </div></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/aos/aos.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
  <script src="../../https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>