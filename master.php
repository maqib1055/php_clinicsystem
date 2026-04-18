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
    <title>Master File</title>
</head>
<body>
    <?php include 'header.php' ?>

    
   <!-- yeh tabs ha jahan alag alag files load hongi -->
    <nav>
        <div class="nav nav-tabs" >
            <button class="nav-link active"  data-bs-toggle="tab" data-bs-target="#nav-patient" type="button" >Patient</button>
            <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#nav-doctor" type="button" >Doctor</button>
            <button class="nav-link"  data-bs-toggle="tab" data-bs-target="#nav-opd" type="button" >Appointment</button>
        </div>
    </nav>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="nav-patient" > <?php include 'patient_info.php' ?> </div>
        <div class="tab-pane fade" id="nav-doctor" ><?php include 'doctor_info.php' ?></div>
        <div class="tab-pane fade" id="nav-opd"><?php include 'appointment_info.php' ?></div>
    </div>


</body>
</html>