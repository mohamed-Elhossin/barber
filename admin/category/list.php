<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';

$select = "SELECT * FROM `category`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM travel_agency where id = $id";
  $d =  mysqli_query($conn, $delete);
  path("/category/list.php");
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List category Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List category</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container col-6 mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th colspan="2">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['name'] ?> </th>
                  <th> <a class="btn btn-warning" href="/barber/admin/category/add.php?edit=<?php echo $data['id'] ?>">Edit </a> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/barber/admin/category/list.php?delete=<?php echo $data['id'] ?>">delete </a> </th>
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