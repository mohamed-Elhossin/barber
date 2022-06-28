<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
$select = "SELECT * FROM `barbers`";
$s = mysqli_query($conn, $select);
?>

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
        <header class="section-header">
            <h3>All barbers Barbers</h3>
        </header>
        <div class="row">
            <div class="col-6">
            <form action="./showByName.php">
            <div class=" my-5">
                <div class="col">
                    <label for=""> Search by Name</label>
                    <input type="text" name="location" class="form-control" placeholder="search by Barber Name">
                </div>
            </div>
            <button name="search" class="btn btn-info"> Search By Name </button>
        </form>
            </div>
            <div class="col-6">
        <form action="./show.php">
            <div class=" my-5">
                <div class="col">
                    <label for=""> Search by Location</label>
                    <input type="text" name="location" class="form-control" placeholder="search by Barber Location">
                </div>
            </div>
            <button name="search" class="btn btn-info"> Search By Location </button>
        </form></div>

        </div>

        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
            <?php foreach ($s as $data) {?>
                <div class="col-xs-12 col-lg-3">
                    <div class="card mt-5">
                        <img height="300" src="/barber/admin/barbers/upload/<?php echo $data['image'] ?>" class="img-top" alt="Eror">
                        <div class="card-header">
                            <h2><span class="currency">   <?php echo $data['name'] ?> <span class="period"></span></h2>
                        </div>
                        <div class="card-block">
                            <p> Location :
                                <?php echo $data['addess'] ?>
                                <br>
                                phone:
                                <?php echo $data['phone'] ?>
                                <br>
                            </p>
                            <?php if (isset($_SESSION['admin'])): ?>
                                <a href="/barber/user/barberProfile.php?viewProfile=<?php echo $data['id'] ?>" class="btn">View Profile and Prices</a>
                            <?php else: ?>
                                <a href="/barber/user/pages-login.php" class="btn">View Profile and Prices </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>

            <?php }?>
        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';

?>