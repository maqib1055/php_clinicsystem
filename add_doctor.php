<?php

include 'connect.php';

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
</head>
<body>
    <?php include 'header.php' ?>

    <div class="container">
        <form action="add_doctor.php" method="post">
            <div class="form-group mb-2">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="">Education</label>
                <input type="text" name="education" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="">Speciality</label>
                <input type="text" name="speciality" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="">Days/Timing</label>
                <input type="text" name="days_timing" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="">Fee</label>
                <input type="number" name="fee" class="form-control">
            </div>
            <div class="form-group mb-2">
                <input type="submit" name="btnAdd" class="btn btn-primary">
            </div>
        </form>
        
    </div>
</body>
</html>

<?php
if(isset($_POST['btnAdd'])){

    $name           = $_POST['name'];
    $education      = $_POST['education'];
    $speciality     = $_POST['speciality'];
    $days_timing    = $_POST['days_timing'];
    $fee            = $_POST['fee'];

    $query = mysqli_query($conn, "INSERT INTO `doctors`(`name`, `education`, 
    `speciality`, `timing_days`, `fee`) VALUES ('$name','$education','$speciality',
    '$days_timing','$fee')");

    if($query == true){
        echo "<script> alert('doctor added'); window.location.href='view_doctor.php'; </script>";
    }else{
        echo "<script> alert('doctor not added') </script>";
    }
}
?>