<?php

include 'connect.php';

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
}

$id = $_GET['id'];

$query = "SELECT opd.opdid, doctors.name, doctors.speciality, doctors.fee, opd.patient_name, opd.father_name, opd.token_no, opd.token_date, opd.amount, opd.status FROM `opd` inner join doctors on doctors.doctorid = opd.doctorid where opd.opdid = '$id'";

$result = mysqli_query($conn, $query);
$slipData = mysqli_fetch_array($result);

// print_r($slipData);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Token</title>
    <style>
body{
    font-family: monospace;
    width: 80mm;
    margin: 0 auto;
}

.center{
    text-align:center;
}

hr{
    border: 1px dashed black;
}

.small{
    font-size:12px;
}

.bold{
    font-weight:bold;
}

.large{
    font-size:36pt;
    text-align:center;
}
</style>

</head>
<body>
    
<div class="center">
    <h3>Mini Clinic</h3>
</div>

<hr>

<p><div class="large"> <?= $slipData['token_no'] ?> </div></p>
<p><b>Date:</b> <?= $slipData['token_date'] ?></p>

<hr>

<p><b>Patient</b> <?= $slipData['patient_name'] ?>/<?= $slipData['father_name'] ?> <b>Doctor:</b> <?= $slipData['name'] ?></p>

<hr>

<p class="bold">Fee: Rs. <?= $slipData['amount'] ?></p>

<hr>

<div class="center small">
    Thank You <br>
    Get Well Soon
</div>


</body>
</html>