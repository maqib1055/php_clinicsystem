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
                <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $query = "select * from doctors";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0){
                while($doctors = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?= $doctors['doctorid'] ?></td>
                        <td><?= $doctors['name'] ?></td>
                        <td><?= $doctors['education'] ?></td>
                        <td><?= $doctors['speciality'] ?></td>
                        <td><?= $doctors['day_timing'] ?></td>
                        <td><?= $doctors['fee'] ?></td>
                        <td>
                            <a href="edit_doctor.php?id=<?= $doctors['doctorid'] ?>"><span class="fa fa-edit text-info"></span></a>
                            <a href="view_doctor.php?id=<?= $doctors['doctorid'] ?>"><span class="fa fa-trash text-danger"></span></a>
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
