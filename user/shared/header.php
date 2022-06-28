<?php
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/barber/user/');
}
?>
<!-- ======= Header ======= -->

<header id="header" class="fixed-top d-flex align-items-center header-transparent">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="index.php">Barber
      </a></h1>
    <div class="social-links">
      <?php if (isset($_SESSION['admin'])) : ?>
        <form action="">
          <button name="logout" class="btn btn-danger text-light"> Log Out </button>
        </form>
        <a class="btn btn-danger p-3" href="/barber/user/orders.php">your Orders</a>
      <?php else : ?>
        <a href="/barber/user/admins/add.php" class="btn btn-primary text-light p-3 "> Sign up </a>
        <a href="/barber/user/pages-login.php" class="btn btn-success text-light p-3">Login</a>
      <?php endif; ?>
    </div>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/barber/user/#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="/barber/user/#about">About</a></li>
        <li><a class="nav-link scrollto" href="/barber/user/rating.php">Rating</a></li>

        <li><a class="nav-link scrollto" href="/barber/user/barber.php">Barbers</a></li>
        <li><a class="nav-link scrollto" href="/barber/user/#footer">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->


  </div>
</header><!-- End Header -->