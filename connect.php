<?php

session_start();
$conn = mysqli_connect('localhost','root','', 'dbclinic');

if(!$conn){
    die('cannot connect db');
}



?>