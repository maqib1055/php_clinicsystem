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

//yeh method check krta ha ager jo input ap ne banai woh us form k andar majood hain unka data collect kr k laiye ga jb button press hoga
if(isset($_POST['btnLogin'])){

    $email    = $_POST['email'];
    $password = $_POST['password'];

    //yeh login ki query ha email password match honge toh login hoga admin
    $query = "select * from users where email='$email' and password='$password'";

    //yeh method tamam queries ko php mein allow krta ha ke run ho sake
    $rs = mysqli_query($conn, $query);

    // yeh method allow ki hui queries ko check krta ha ager rows mein data ho toh le aata ha  MySQL mein data rows / columns ki surat mein store hota ha with table format.
    if(mysqli_num_rows($rs)>0){

       //yeh method uper allow ki gai valid rows se data collect krta ha (ager row > 0 ha toh valid wrna invalid means empty ya incorrect)
       $userData = mysqli_fetch_array($rs);

       //yahan jo database se data collect kia ha specific user ka uski details session mein store kr rhe tah k longterm jahan need parhe esy use kr ske
       $_SESSION['uid'] = $userData['userid'];
       $_SESSION['uname'] = $userData['name'];

       //redirect ka code ha
       header("Location: dashboard.php");

    }else{
        echo "Invalid email and password";
    }

}

?>