<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
include './sharedFunc/func.php';
$error = "";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `users` where  `email` = '$email' and `password`= '$password'";
    $s = mysqli_query($conn, $select);

    $numOfRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    if ($numOfRows > 0) {
        $_SESSION['admin'] = $email;
        $_SESSION['adminId'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['job'] = $row['job'];
        header("LOCATION:/barber/user/");
    } else {
        $error = "<div class=' mt-5  alert alert-warning mx-auto '>
    Wrong Password OR User Name 
        </div>";
    }
}

?>
<main class="bg-info  ">
  <div class="container">
  <div class="addBanar alert alert-warning">
  Hi : Place Your ADs Here
    </div>
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <?php echo $error ?>
                 </div><!-- End Logo -->

            <div class="card mb-3 text-center">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                  <p class="text-center small"></p>
                </div>

                <form class="row g-3 needs-validation" novalidate method="POST">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" required class="form-control" require>
                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" required class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>


                  <div class="col-12">
                    <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="/barber/user/admins/add.php">Create an account</a></p>
                  </div>
                </form>

              </div>
            </div>



          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php
