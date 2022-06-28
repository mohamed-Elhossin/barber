<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';
include '../sharedFunc/func.php';
$baraberId =$_SESSION['adminId'];
$select = "SELECT * FROM `payment` JOIN posts ON payment.postId= posts.id JOIN users ON payment.userId= users.id where barber_id =$baraberId ";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
  $id =   $_GET['delete'];
  $delete = "DELETE FROM payment where id = $id";
  $d =  mysqli_query($conn, $delete);

  testMessage($d, "Delete payment $id ");
}

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List payment Page</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">List payment </li>
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
              <th> User Name </th>
                <th>price</th>
                <th>description</th>
                <th>Date </th>
                <th colspan="3">Action</th>
              </tr>
              <?php foreach ($s as $data) { ?>
                <tr>
                <th> <?php echo $data['name'] ?> </th>
                  <th> <?php echo $data['price'] ?> </th>
                  <th> <?php echo $data['description'] ?> </th>
                  <th> <?php echo $data['data'] ?> </th>
                  <th> <a class="btn btn-danger" onclick="return confirm('are your Sure !')" href="/barber/admin/payment/list.php?delete=<?php echo $data['id'] ?>">Delete </a> </th>
           
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