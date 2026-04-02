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
    <title>OPD report</title>
</head>
<body>
    <?php include 'header.php' ?>
    <div class="container">
        <form action="opd_report.php" method="post">
            <input type="date" name="start" class="form-control"> 
            <input type="date" name="end" class="form-control"> 
            <input type="submit" name="btnReport" class="btn btn-primary"> 
        </form>

        
       
        <table class="table" >
         <thead>
            <tr>
                <th>Token#</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Contact</th>
                <th>Fee</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
         </thead>
         <tbody>
             <?php
          if(isset($_POST['btnReport'])){

            $start = $_POST['start'];
            $end = $_POST['end'];

            $total_fees = 0;

            $sql = "SELECT opd.opdid, opd.patient_name, doctors.name as 'doctor_name', opd.token_no, opd.contact, opd.amount, opd.status, opd.token_date
            from opd
            inner join doctors on doctors.doctorid = opd.doctorid
            where opd.token_date BETWEEN '$start' and '$end'";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($opdData = mysqli_fetch_array($result)){
                //pre post ++ x = x + 2;  
                $total_fees = $total_fees + $opdData['amount'];
                   ?>

                   <tr>
                         
                         <td><?= $opdData['token_no'] ?></td>
                         <td><?= $opdData['patient_name'] ?></td>
                         <td><?= $opdData['doctor_name'] ?></td>
                         <td><?= $opdData['contact'] ?></td>
                         <td><?= $opdData['amount'] ?></td>
                         <td><?= $opdData['token_date'] ?></td>
                        
                          <td>
                            <?php  if($opdData['status'] == "Approve"){
                                echo "<span class='badge bg-success'>Approve</span>";
                            }else{
                                 echo "<span class='badge bg-warning'>Pending</span>";
                            } ?>
                        </td>
                        <td>
                            <?php 
                             if($opdData['status'] == "Pending"){
                                ?>
                                 <a href="view_opd.php?approveid=<?= $opdData['opdid'] ?>" onClick="return confirm('Are you sure you want to approve?')"  ><span class="fa fa-check text-primary"></span></a>
                                <?php
                             }
                            ?>
                            <a href="edit_opd.php?id=<?= $opdData['opdid'] ?>"><span class="fa fa-edit text-info"></span></a>
                            <a href="view_opd.php?delid=<?= $opdData['opdid'] ?>" onClick="return confirm('Are you sure you want to delete?')"  ><span class="fa fa-trash text-danger"></span></a>
                            <a href="print_token.php?id=<?= $opdData['opdid'] ?>"><span class="fa fa-print text-success"></span></a>
                        
                        
                        </td>

                   </tr>
                   
                   
                   <?php
                
                }
            }

            ?>

          

         </tbody>
         <tfoot>
            <tr>
                <td>Total Fees: <strong> <?= $total_fees ?> </strong> </td>
            </tr>
         </tfoot>
         <?php
         }
        ?>
        </table>
    </div>

    

</body>
</html>