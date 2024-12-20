<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "tec9";

$conectar = mysqli_connect($host, $user, $pass, $bd);

if (mysqli_connect_errno()) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}
