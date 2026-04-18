<?php

//poori app mein session yahan se active hoga
session_start();

//yeh mysql database ka global connection ha jo ke har page pe include se chal rha hoga..
$conn = mysqli_connect('localhost','root','root321', 'dbclinic');

if(!$conn){
    die('cannot connect db');
}



?>