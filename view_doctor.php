<?php

include 'connect.php';

if(!isset($_SESSION['uid'])){
    header('Location: index.php');
}

if(isset($_GET['delid'])){
    $id = $_GET['delid'];
   // $query = "delete from doctors where doctorid = '$id'";
    $query = "update doctors set status = 0 where doctorid = '$id'";
    if(mysqli_query($conn, $query)){
        echo "<script> alert('doctor deleted'); window.location.href='view_doctor.php' </script>";

    }else{
        echo "<script> alert('doctor not delete') </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Doctor</title>
</head>
<body>
    <?php include 'header.php' ?>

    <div class="container">
    <a href="add_doctor.php" class="btn btn-primary mb-2">Add New Doctor</a>
      <table class="table">
         <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Education</th>
                <th>Speciality</th>
                <th>Days/Timing</th>
                <th>Fee</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $query = "select * from doctors where status = 1";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0){
                while($doctors = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?= $doctors['doctorid'] ?></td>
                        <td><?= $doctors['name'] ?></td>
                        <td><?= $doctors['education'] ?></td>
                        <td><?= $doctors['speciality'] ?></td>
                        <td><?= $doctors['timing_days'] ?></td>
                        <td><?= $doctors['fee'] ?></td>
                        <td>
                            <?php  if($doctors['status'] == 1){
                                echo "<span class='badge bg-success'>Active</span>";
                            }else{
                                 echo "<span class='badge bg-danger'>Inactive</span>";
                            } ?>
                        </td>
                        <td>
                            <a href="edit_doctor.php?id=<?= $doctors['doctorid'] ?>"><span class="fa fa-edit text-info"></span></a>
                            <a href="view_doctor.php?delid=<?= $doctors['doctorid'] ?>" onClick="return confirm('Are you sure you want to delete?')"  ><span class="fa fa-trash text-danger"></span></a>
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
