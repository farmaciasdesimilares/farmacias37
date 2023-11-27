<?php 
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "farmacia";

    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if (!$conexion){
        die("No hay conexion: ".mysqli_connect_error());
    }

    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //sign in
    if(isset($_POST['iniciarsesion'])){
        $consulta = mysqli_query($conexion, "SELECT * FROM login WHERE usuario='$usuario' OR usuario='$email' and password='$password'");
        $resultado = mysqli_num_rows($consulta);

        if($resultado){
            header("location: inicio.html");
        }else{
            echo "<script> alet('Usuario y/o Contraseña incorrecto') </script>";
        }
    }

    //register
    if(isset($_POST['registrarse'])){
        $sqlgrabar = "INSERT INTO login(usuario, password, email) values('$usuario', '$password', '$email')";

        if(mysqli_query($conexion, $sqlgrabar)){
            echo "<script> alert('Te has registrado con exito. Inicia sesión'); window.location='index.html' </script>";
        }else{
            echo 'Error: '.$sql.'<br>'.mysqli_error($conexion);
        }
    }
?>