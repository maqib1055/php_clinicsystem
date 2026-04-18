<?php
$id = $_GET['id'];

$sql = "select * from opd where doctorid = '$id'";
$rs = mysqli_query($conn, $sql);
$patientData = mysqli_fetch_array($rs);

?>

<table class="table">
    <tr>
        <th>Name</th>
        <th>Father</th>
        <th>Contact</th>
    </tr>
    <tr>
        <td><?= $patientData['patient']  ?></td>
        <td><?= $patientData['father']  ?></td>
        <td><?= $patientData['contact']  ?></td>
    </tr>
</table>