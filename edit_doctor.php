<?php

include 'connect.php';

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
}

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query = "select * from doctors where doctorid = '$id'";
    $result = mysqli_query($conn, $query);
    $doctors = mysqli_fetch_array($result);
   


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Doctor</title>
</head>
<body>
    <?php include 'header.php' ?>

    <div class="container">
        <form action="edit_doctor.php" method="post">
            <div class="form-group mb-2">
                <input type="hidden" name="doctorid" value="<?= $doctors['doctorid'] ?>">
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $doctors['name']  ?>" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="">Education</label>
                <input type="text" name="education" value="<?= $doctors['education']  ?>" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="">Speciality</label>
                <input type="text" name="speciality" value="<?= $doctors['speciality']  ?>" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="">Days/Timing</label>
                <input type="text" name="days_timing" value="<?= $doctors['timing_days']  ?>" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="">Fee</label>
                <input type="number" name="fee" value="<?= $doctors['fee']  ?>" class="form-control">
            </div>
            <div class="form-group mb-2">
                <input type="submit" name="btnUpdate" class="btn btn-primary">
            </div>
        </form>
        
    </div>
    <?php } ?>
</body>
</html>

<?php
if(isset($_POST['btnUpdate'])){

    $doctorid       = $_POST['doctorid'];
    $name           = $_POST['name'];
    $education      = $_POST['education'];
    $speciality     = $_POST['speciality'];
    $days_timing    = $_POST['days_timing'];
    $fee            = $_POST['fee'];

    $query = mysqli_query($conn, "UPDATE `doctors` SET `name`='$name',
    `education`='$education',`speciality`='$speciality',
    `timing_days`='$days_timing',`fee`='$fee' WHERE doctorid = '$doctorid'");

    if($query == true){
        echo "<script> alert('doctor updated'); window.location.href='view_doctor.php'; </script>";
    }else{
        echo "<script> alert('doctor not updated') </script>";
    }
}
?>