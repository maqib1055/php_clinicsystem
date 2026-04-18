
<?php
$id = $_GET['id'];

$sql = "select * from opd where doctorid = '$id'";
$rs = mysqli_query($conn, $sql);
$opdData = mysqli_fetch_array($rs);


?>

<table class="table">
    <tr>
        <th>Token No</th>
        <th>Date</th>
        <th>Fee</th>
        <th>Status</th>
    </tr>
    <tr>
        <td><?= $opdData['token_no']  ?></td>
        <td><?= $opdData['date']  ?></td>
        <td><?= $opdData['amount']  ?></td>
        <td><?= $opdData['status']  ?></td>
    </tr>
</table>