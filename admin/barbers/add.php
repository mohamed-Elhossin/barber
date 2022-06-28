<?php
include '../shared/head.php';
include '../shared/header.php';
include '../shared/aside.php';
include '../sharedFunc/db.php';


function testMessage($condation, $message)
{
    if ($condation) {
        echo "<div class='mt-5 alert alert-info mx-auto w-50'>
<h3>  $message is Done </h3>
    </div>";
    } else {
        echo "<div class=' mt-5  alert alert-danger mx-auto w-50'>
        <h3>  $message is False </h3>
            </div>";
    }
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];

    $phone = $_POST['phone'];
    $addess = $_POST['addess'];
    $password = $_POST['password'];


    $catId = $_POST['catId'];
    // Image Code
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $location = "upload/" . $image_name;
    if (move_uploaded_file($image_tmp, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $image_name2 = $_FILES['image2']['name'];
    $image_tmp2 = $_FILES['image2']['tmp_name'];
    $location = "upload/" . $image_name2;
    if (move_uploaded_file($image_tmp2, $location)) {
        echo "image Uploaded Done";
    } else {
        echo "image Uploaded false";
    }
    $insert = "INSERT INTO `barbers` VALUES (NULL ,'$name','$phone','$addess','$password','$image_name' ,'$image_name2' ,$catId)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Add Baraber Done ");
}


$name = '';


$phone = '';
$addess = '';
$password = '';

$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id =   $_GET['edit'];
    $select = "SELECT * from `barbers` where id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
   

    $phone = $row['phone'];
    $addess = $row['addess'];
    $password = $row['password'];
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $catId = $_POST['catId'];
        $phone = $_POST['phone'];
        $addess = $_POST['addess'];
        $password = $_POST['password'];
        $update = "UPDATE `barbers` SET `name` = '$name',`phone` = '$phone',`addess` = '$addess' , `password` = '$password' ,`categoryId` = $catId where id = $id";
        $u = mysqli_query($conn, $update);
        testMessage($u, "Updated Your Data");
    
        path("/barbers/list.php");
    }
}
$selects = "SELECT * FROM `category`";
$cats = mysqli_query($conn, $selects);
?>
<main id="main" class="main">
    <div class="pagetitle">
        <?php if ($update) : ?>
            <h1 class="display-1 text-center text-warning"> barbers Update page </h1>
        <?php else : ?>
            <h1 class="display-1 text-center text-info">Sign Up As barbers </h1>
        <?php endif; ?>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">add barbers</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container">

            <div class="row">
                <div class="card col-lg-9">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label> Name : </label>
                                <input required class="form-control" value="<?php echo $name ?>" name="name" type="text">
                            </div>
                            <div class="form-group">

                                <div class="form-group">
                                    <label> phone </label>
                                    <input type="text" value="<?php echo $phone ?>" required class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label> addess </label>
                                    <input type="text" value="<?php echo $addess ?>" required class="form-control" name="addess">
                                </div>
                                <div class="form-group">
                                    <label> password </label>
                                    <input type="text" value="<?php echo $password ?>" required class="form-control" name="password">
                                </div>
                                <?php if (!$update) : ?>
                                    <div class="form-group">
                                        <label>Shop Image </label>
                                        <input type="file" required class="form-control" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label> Covid'19 vaccine image </label>
                                        <input type="file" required class="form-control" name="image2">
                                    </div>
                                <?php endif; ?>
                       
                                <div class="form-group">
                                    <label> Category </label>
                                    <select type="text" required class="form-control" name="catId">
                                        <?php foreach ($cats as $data) { ?>
                                            <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <?php if ($update) : ?>
                                    <button name="update" class="mt-4 btn btn-primary btn-block w-50 mx-auto">Update Data </button>
                                <?php else : ?>
                                    <button name="send" class=" mt-4 btn btn-info btn-block w-50 mx-auto">Send Data</button>
                                <?php endif; ?>
                        </form>
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