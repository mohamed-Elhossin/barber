<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `barbers` where id =$id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List barbers Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List barbers</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
 <div class="card">
   <img width="200" class="d-inline" src="./upload/<?php echo $row['image'] ?>" alt="">
   <img width="200" class="d-inline" src="./upload/<?php echo $row['image2'] ?>" alt="">
 <div class="card-body">
 <h4> Name :<?php echo $row['name'] ?>  </h4>
 <h4> Locatopn :<?php echo $row['addess'] ?>  </h4>
 </div>
  </div>

    </div><!-- End Right side columns -->
    <a class="btn btn-info" href="/barber/admin/barbers/list.php"> Go Back</a>
  </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>