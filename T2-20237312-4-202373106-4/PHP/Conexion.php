<?php
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "congresodb";
    
    $conexion = mysqli_connect($host, $user, $password, $database);

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }