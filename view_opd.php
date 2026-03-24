<?php

include 'connect.php';

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
}

if(isset($_GET['approveid'])){
    $approveid = $_GET['approveid'];
    $query = "update opd set status = 'Approve' where opdid = '$approveid'";
    if(mysqli_query($conn, $query)){
        echo "<script> alert('Appointment Approved'); window.location.href='view_opd.php' </script>";
    }
}

if(isset($_GET['delid'])){
    $delid = $_GET['delid'];
    $query = "delete from opd where opdid = '$delid'";
    if(mysqli_query($conn, $query)){
        echo "<script> alert('Appointment Successfully Deleted'); window.location.href='view_opd.php' </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View OPD</title>
</head>
<body>
    <?php include 'header.php' ?>

    <div class="container">
    <a href="add_opd.php" class="btn btn-primary mb-2">Add New Appointment</a>
      <table class="table">
         <thead>
            <tr>
                <th>#</th>
                <th>Token No</th>
                <th>Doctor</th>
                <th>Patient/Father</th>
                <th>Fee</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $query = "SELECT opd.opdid, doctors.name, doctors.speciality, doctors.fee, opd.patient_name, opd.father_name, opd.token_no, opd.token_date, opd.amount, opd.status FROM `opd` inner join doctors on doctors.doctorid = opd.doctorid";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0){
                while($opd = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?= $opd['opdid'] ?></td>
                        <td><?= $opd['token_no'] ?></td>
                        <td><?= $opd['name'] ?? 'N/A' ?> - <?= $opd['speciality'] ?? 'N/A' ?>  </td>
                        <td><?= $opd['patient_name'] ?>/<?= $opd['father_name'] ?></td>
                        <td><?= $opd['amount'] ?></td>
                        <td><?= $opd['token_date'] ?></td>
                        <td>
                            <?php  if($opd['status'] == "Approve"){
                                echo "<span class='badge bg-success'>Approve</span>";
                            }else{
                                 echo "<span class='badge bg-warning'>Pending</span>";
                            } ?>
                        </td>
                        <td>
                            <?php 
                             if($opd['status'] == "Pending"){
                                ?>
                                 <a href="view_opd.php?approveid=<?= $opd['opdid'] ?>" onClick="return confirm('Are you sure you want to approve?')"  ><span class="fa fa-check text-primary"></span></a>
                                <?php
                             }
                            ?>
                            <a href="edit_opd.php?id=<?= $opd['opdid'] ?>"><span class="fa fa-edit text-info"></span></a>
                            <a href="view_opd.php?delid=<?= $opd['opdid'] ?>" onClick="return confirm('Are you sure you want to delete?')"  ><span class="fa fa-trash text-danger"></span></a>
                            <a href="print_token.php?id=<?= $opd['opdid'] ?>"><span class="fa fa-print text-success"></span></a>
                        
                        
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
         </tbody>
      </table>

    </div>
</body>
</html>
