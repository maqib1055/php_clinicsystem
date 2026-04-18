<?php

//yeh database connection ha jo global har page pe rahe ga along with session tah k bar bar na banana parhe
include 'connect.php';

//yeh restriction ha authorization kehte koi user without login access nahi kr skta page ko url se
if(!isset($_SESSION['uid'])){
    header('Location: index.php');
}

//yeh aggregate functions mysql k use kiye or dashboard pe summary show krwai ha
$total_users = mysqli_fetch_array(mysqli_query($conn, "select count(*) as total_user from users"));
$total_doctors = mysqli_fetch_array(mysqli_query($conn, "select count(*) as total_doctor from doctors"));
$total_opd = mysqli_fetch_array(mysqli_query($conn, "select count(*) as total_opd from opd"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <?php include 'header.php' ?>

    <div class="container">

       <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="#" class="btn btn-dark">Users</a>
                            <!-- uper aggregate functions se jo data get kia uski summary show krwa rhe ha  -->
                            <br> <p><?= $total_users['total_user'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="#" class="btn btn-dark">Doctors</a>
                            <br> <p><?= $total_doctors['total_doctor'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="#" class="btn btn-dark">Appointments</a>
                            <br> <p><?= $total_opd['total_opd'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
       </div>

    </div>
</body>
</html>