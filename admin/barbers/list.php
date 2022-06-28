<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
$select = "SELECT * FROM `barbers`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM `barbers` where id = $id";
  $d =  mysqli_query($conn, $delete);
  testMessage($d, "delete barber");
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
      <div class="container col-10 mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>address</th>

                <th colspan="3">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['name'] ?> </th>
                  <th> <?php echo $data['phone'] ?> </th>
                  <th> <a class="btn btn-warning" href="/barber/admin/barbers/show.php?show=<?php echo $data['id'] ?>">Show </a> </th>
                  <th> <a class="btn btn-warning" href="/barber/admin/barbers/add.php?edit=<?php echo $data['id'] ?>">Updated </a> </th>
                  <th> <a class="btn btn-danger" href="/barber/admin/barbers/list.php?delete=<?php echo $data['id'] ?>">Remove </a> </th>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
      </div>

    </div><!-- End Right side columns -->
  </section>

</main><!-- End #main -->
<?php
include '../shared/footer.php';
include '../shared/script.php';
?>