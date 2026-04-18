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

<title>ADD OPD</title>
</head>

<body>
<?php include 'header.php' ?>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
           Book Patient Appointment
        </div>

        <div class="card-body">
            <form method="POST" action="add_opd.php">

                <div class="row g-3">

                    <!-- Patient Name -->
                    <div class="col-md-6">
                        <label class="form-label">Patient Name</label>
                        <input type="text" name="patient_name" class="form-control">
                    </div>

                    <!-- Father Name -->
                    <div class="col-md-6">
                        <label class="form-label">Father Name</label>
                        <input type="text" name="father_name" class="form-control">
                    </div>

                    <!-- Gender -->
                    <div class="col-md-4">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>

                    <!-- Contact -->
                    <div class="col-md-4">
                        <label class="form-label">Contact</label>
                        <input type="text" name="contact" class="form-control">
                    </div>

                    <!-- Token No -->
                    <div class="col-md-4">
                        <label class="form-label">Token No</label>
                        <?php $uniqueToken = rand(); ?>
                        <input type="text" name="token_no" value="<?= $uniqueToken ?>" readonly class="form-control">
                    </div>

                    <!-- Doctor -->
                    <div class="col-md-6">
                        <label class="form-label">Doctor</label>
                        <select name="doctorid" class="form-select">
                            <option value="">Select Doctor</option>
                            <?php
                            $query = "select * from doctors";
                            $result = mysqli_query($conn, $query);
                            while($doctorData = mysqli_fetch_array($result)){
                             ?>
                              <option value="<?= $doctorData['doctorid'] ?>">
                                <?= $doctorData['name'] ?> | <?= $doctorData['speciality'] ?>| <?= $doctorData['day_timing'] ?> | PKR <?= $doctorData['fee'] ?>
                              </option>
                             <?php
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Amount -->
                    <div class="col-md-3">
                        <label class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-control">
                    </div>

                    <!-- Date -->
                    <div class="col-md-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="token_date" class="form-control">
                    </div>

                </div>

                <div class="mt-4">
                    <button name="btnAdd" type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>


<?php

//appointment add hoga
if(isset($_POST['btnAdd'])){

// print_r($_POST);
$patient_name = $_POST['patient_name'];
$father_name  = $_POST['father_name'];
$gender       = $_POST['gender'];
$contact      = $_POST['contact'];
$token_no     = $_POST['token_no'];
$doctorid     = $_POST['doctorid'];
$amount       = $_POST['amount'];
$token_date   = $_POST['token_date'];


$query = "INSERT INTO `opd`( `patient`, 
`father`, `gender`,
 `contact`, `token_no`, `doctorid`, 
 `amount`, `date`) VALUES ('$patient_name',
 '$father_name','$gender','$contact',
 '$token_no','$doctorid','$amount',
 '$token_date')";

if(mysqli_query($conn, $query)){
    echo "<script> alert('appointment successfully booked');  </script>";

    //last database entry save > data capture screenshot
    echo $opdid = mysqli_insert_id($conn);

    echo "<script> window.location.href='print_token.php?id=".$opdid."' </script>";
}else{
   echo "<script> alert('appointment not booked') </script>"; 
}



}

?>