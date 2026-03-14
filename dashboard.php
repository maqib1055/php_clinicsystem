<?php

include 'connect.php';

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
}

$total_users = mysqli_fetch_array(mysqli_query($conn, "select count(*) from users"));
$total_doctors = mysqli_fetch_array(mysqli_query($conn, "select count(*) from doctors"));
$total_opd = mysqli_fetch_array(mysqli_query($conn, "select count(*) from opd"));

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
                            <br> <p><?= $total_users ?></p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="#" class="btn btn-dark">Doctors</a>
                            <br> <p><?= $total_doctors ?></p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="#" class="btn btn-dark">Appointments</a>
                            <br> <p><?= $total_opd ?></p>
                        </div>
                    </div>
                </div>
            </div>
       </div>

    </div>
</body>
</html>