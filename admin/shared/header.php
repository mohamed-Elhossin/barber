<?php

if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/barber/admin/pages-login.php');
}


?>
<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="/barber/admin/index.php" class="logo d-flex align-items-center">
   
      <span class="d-none d-lg-block">barber Shop</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <?php if ($_SESSION['admin']) :  ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo   $_SESSION['admin']; ?> </span>
          </a><!-- End Profile Iamge Icon -->
        <?php endif; ?>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">


          <li>
            <a class="dropdown-item d-flex align-items-center" href="/barber/admin/users-profile.php">
             
              <span>My Page</span>
            </a>
          </li>
          <li>
            <form action="">
              <button class="dropdown-item d-flex align-items-center" name="logout">
         
                <span>Log Out</span>
              </button>
            </form>

          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->