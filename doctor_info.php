<?php
$id = $_GET['id'];

$sql = "select * from doctors where doctorid = '$id'";
$rs = mysqli_query($conn, $sql);
$doctorData = mysqli_fetch_array($rs);

?>

<table class="table">
    <tr>
        <th>Name</th>
        <th>Timing</th>
        <th>Fee</th>
    </tr>
    <tr>
        <td><?= $doctorData['name']  ?></td>
        <td><?= $doctorData['day_timing']  ?></td>
        <td><?= $doctorData['fee']  ?></td>
    </tr>
</table>