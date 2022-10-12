<?php

    $servidor = "localhost";
    $user = "root";
    $psw = "";  
    $bd = "practica";
    
    $conn = mysqli_connect($servidor,$user,$psw,$bd);

    if(mysqli_connect_errno()){
        //echo'{"response":"0","message":"Error de conexion"}';
    }else{
        mysqli_set_charset($conn,"utf8");
    }
   
?>