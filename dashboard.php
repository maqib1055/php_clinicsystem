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
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="#" class="btn btn-dark">Doctors</a>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="#" class="btn btn-dark">Appointments</a>
                        </div>
                    </div>
                </div>
            </div>
       </div>

    </div>
</body>
</html>