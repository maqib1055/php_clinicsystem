<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <form action="index.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" >
        </div>
        <button type="submit" name="btnLogin" class="btn btn-primary">Login</button>
    </form>
</body>
</html>

<?php

if(isset($_POST['btnLogin'])){

    $email    = $_POST['email'];
    $password = $_POST['password'];

    $query = "select * from users where email='$email' and password='$password'";
    $rs = mysqli_query($conn, $query);
    if(mysqli_num_rows($rs)>0){

       $userData = mysqli_fetch_array($rs);

       $_SESSION['uid'] = $userData['userid'];
       $_SESSION['uname'] = $userData['name'];

       header("Location: dashboard.php");

    }else{
        echo "Invalid email and password";
    }

}

?>