<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
$baraberId =$_SESSION['adminId'];
$select = "SELECT * FROM `posts` where barber_id =$baraberId  ";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM posts where id = $id";
  $d =  mysqli_query($conn, $delete);
  // header('LOCATION: /barber/admin/posts/list.php');
  testMessage($d, "Delete posts $id ");
}
if (isset($_GET['approve'])) {
  $id =   $_GET['approve'];
  $delete = "UPDATE posts SET `status`='approve' WHERE id =$id ";
  $d =  mysqli_query($conn, $delete);
  // header('LOCATION: /barber/admin/posts/list.php');
  testMessage($d, " posts Approved");
  path("/posts/list.php");

}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List posts Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List posts </li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section dashboard">
    <div class="row">
      <div class="container  mt-5 text-center">
        <div class="card">
          <div class="card-body">
            <table class="table table-dark">
              <tr>
                <th>ID</th>
                <th>price</th>
                <th>description</th>
                <th> status </th>
                <th colspan="3">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                  <th> <?php echo $data['id'] ?> </th>
                  <th> <?php echo $data['price'] ?> </th>
                  <th> <?php echo $data['description'] ?> </th>
                  <th> <?php echo $data['status'] ?> </th>
                  <?php if (!isset($_SESSION['barber'])) : ?>
                    <th> <a class="btn btn-light" href="/barber/admin/posts/list.php?approve=<?php echo $data['id'] ?>">Approve </a> </th>
                  <?php endif; ?>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/barber/admin/posts/list.php?delete=<?php echo $data['id'] ?>">Delete </a> </th>

                  <?php if (isset($_SESSION['barber'])): ?>
                  <th> <a class="btn btn-warning" href="/barber/admin/posts/add.php?edit=<?php echo $data['id'] ?>">Edit </a> </th>
               <?php endif; ?>
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