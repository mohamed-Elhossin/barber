<?php
include './shared/head.php';
include './shared/header.php';
include './sharedFunc/db.php';
if (isset($_GET['viewProfile'])) {
    $id = $_GET['viewProfile'];
    $select = "SELECT * FROM `barbers` where id =$id";
    $s = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($s);
}
if (isset($_GET['viewProfile'])) {
    $id = $_GET['viewProfile'];
    $selectt = "SELECT AVG(rating) FROM `rating` WHERE barberId =$id ";
    $ss = mysqli_query($conn, $selectt);
    $rowRating = mysqli_fetch_assoc($ss);
}
if (isset($_GET['viewProfile'])) {
    $id = $_GET['viewProfile'];
    $selecttt = "SELECT * FROM `posts` WHERE barber_id =$id ";
    $sss = mysqli_query($conn, $selecttt);
}
?>

<section id="pricing" class="my-5 pricing section-bg wow fadeInUp">

    <div class="container">
        <header class="section-header">
            <h3>profile Baraber <?php echo $row['name']; ?></h3>

        <div class="row flex-items-xs-middle flex-items-xs-center">
            <!-- Basic Plan  -->
                <div class="col-xs-12 col-lg-3">
                    <div class="card mt-5">
                        <img height="300" src="/barber/admin/barbers/upload/<?php echo $row['image'] ?>" class="img-top" alt="Eror">
                        <div class="card-header">
                            <h2><span class="currency">   <?php echo $row['name'] ?> <span class="period"></span></h2>
                        </div>
                        <div class="card-block">
                            <p> Location :
                                <?php echo $row['addess'] ?>
                                <br>
                                phone:
                                <?php echo $row['phone'] ?>
                                <br>
                            </p>
                            Total avrage rating
                            <p><?php echo $rowRating['AVG(rating)'] ?> </p>
                            <?php if (isset($_SESSION['admin'])): ?>
                                <a href="/barber/user/barberProfile.php?viewProfile=<?php echo $row['id'] ?>" class="btn">View Profile and Prices</a>
                            <?php else: ?>
                                <a href="/barber/user/pages-login.php" class="btn">View Profile and Prices </a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="mx-auto col-xs-12 col-lg-4">
                     <h1>Barber Pricing And Offers</h1>
                     <?php foreach ($sss as $data) {?>
                      <div class="card mt-5">
                        <img src="../admin/posts/upload/<?php echo $data['image'] ?>" alt="">
                        <div class="card-body">
                    <h4>Price <?php echo $data['price'] ?></h4>
                    <h4>Desciption <?php echo $data['description'] ?></h4>
                        </div>
                        <a href="/barber/user/payment.php?booking=<?php echo $data['id']?>" class="my-2 bg-danger btn btn-danger"> Book Now Your Time </a>
                      </div>
                      <?php }?>
                </div>

        </div>
    </div>

</section><!-- End Pricing Section -->

<?php
include './shared/footer.php';
include './shared/script.php';

?>