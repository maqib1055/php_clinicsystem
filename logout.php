<?php
//yeh teeno method laganey hote tah k session khali ho jaye kuch extra code bhi kr skte cookies k liye mger filhaal need nahi
session_start();
session_unset();
session_destroy();

//yeh simple redirect ho rha ha
header("Location: index.php");

?>