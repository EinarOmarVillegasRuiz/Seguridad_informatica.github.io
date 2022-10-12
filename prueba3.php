<?php
include("conexion.php");

if($_POST){
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $edad=$_POST["edad"];
    $gmail=$_POST["gmail"];
    $pass=$_POST["pass"];
}


$keypublica=openssl_pkey_get_public(file_get_contents('publica.key'));
openssl_public_encrypt($pass,$datos_cifrados,$keypublica);
$keyprivada=openssl_pkey_get_private(file_get_contents('privada.key'));
openssl_private_decrypt($datos_cifrados,$datos_decifrados,$keyprivada);
$dato=base64_encode($datos_cifrados);



if($pass==null){
    echo "Error";
}else{
    $consulta= "INSERT INTO login1(nombre,apellido,edad,correo,contraseña,encryptado) values('$nombre','$apellido','$edad','$gmail','$pass','$dato')";
    $resultado=mysqli_query($conn,$consulta);
    if($resultado){
        $url="http://localhost/PracticasAna/index.PHP";
        $contenido= file_get_contents($url);
        echo $contenido;

    }else{
        echo "error";
    }
    
}
?>