<?php
require "conexion.php";

$nombre_user = $_POST['nombre_user'];
$edad_user = $_POST['edad_user'];
$correo_user = $_POST['correo_user'];

// Generar contraseña aleatoria
$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*';
$contr_user = substr(str_shuffle($caracteres), 0, 8);

// Guardar en la base de datos SIN HASH
$sql = "INSERT INTO usuarios (nombre_user, edad_user, correo_user, contr_user) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conectar, $sql);
mysqli_stmt_bind_param($stmt, 'siss', $nombre_user, $edad_user, $correo_user, $contr_user);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
  $asunto = "Registro Exitoso";
  $mensaje = "
    <html>
    <head>
        <title>Registro Exitoso</title>
    </head>
    <body>
        <h2>¡Registro exitoso!</h2>
        <p>Hola <strong>$nombre_user</strong>, tu registro ha sido exitoso.</p>
        <p>Tu contraseña generada es: <strong>$contr_user</strong></p>
        <p>Por favor, inicia sesión y cambia tu contraseña.</p>
    </body>
    </html>";

  // Encabezados del correo
  $encabezados = "MIME-Version: 1.0" . "\r\n";
  $encabezados .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $encabezados .= "From: residencias@itmerida.com.mx" . "\r\n";

  // Enviar correo
  if (mail($correo_user, $asunto, $mensaje, $encabezados)) {
    echo "<script>alert('Registro exitoso. Revisa tu correo para obtener la contraseña.'); window.location.href='login.php';</script>";
  } else {
    echo "<script>alert('Error al enviar el correo. Intenta de nuevo.'); window.history.back();</script>";
  }
} else {
  echo "<script>alert('Error al registrar. Intenta de nuevo.'); window.history.back();</script>";
}
