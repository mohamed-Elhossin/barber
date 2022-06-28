<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="/barber/admin/index.php">

        <span>Master Page</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-heading">All</li>
    <?php if (isset($_SESSION['barber'])): ?>
       <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#post" data-bs-toggle="collapse" href="#">
        <span>Posts and prices</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="post" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/barber/admin/posts/add.php">
            <i class="bi bi-circle"></i><span>Set Prices</span>
          </a>
          <a href="/barber/admin/posts/list.php">
            <i class="bi bi-circle"></i><span>View All</span>
          </a>
        </li>
      </ul>
    </li><!-- End travel Adency Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="/barber/admin/payment/list.php">
        <span>schedule</span>
      </a>
 
    </li><!-- End travel Adency Nav -->

    <?php endif;?>

    <?php if (!isset($_SESSION['barber'])): ?>
      <li class="nav-item">
      <a class="nav-link collapsed"  href="/barber/admin/posts/list.php">
        <span>View All Posts</span>
      </a>

    </li><!-- End travel Adency Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#category" data-bs-toggle="collapse" href="#">
          <span>category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="category" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/barber/admin/category/add.php">
              <i class="bi bi-circle"></i><span>Create New</span>
            </a>
          </li>
          <li>
            <a href="/barber/admin/category/list.php">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
        </ul>
      </li><!-- End travel Adency Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#barber" data-bs-toggle="collapse" href="#">
          <span>Barbers</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="barber" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/barber/admin/barbers/add.php">
              <i class="bi bi-circle"></i><span>Create New</span>
            </a>
          </li>
          <li>
            <a href="/barber/admin/barbers/list.php">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>
        </ul>
      </li><!-- End travel Adency Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#admin" data-bs-toggle="collapse" href="#">
          <span>admins</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/barber/admin/admins/add.php">
              <i class="bi bi-circle"></i><span>Create New</span>
            </a>
          </li>
        </ul>
      </li><!-- End travel Adency Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/barber/admin/users-profile.php">

          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

    <?php endif;?>
  </ul>

</aside><!-- End Sidebar-->