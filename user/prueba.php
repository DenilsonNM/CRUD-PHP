<?php
$to = 'destinatario@correo.com';
$subject = 'Hola desde XAMPP!';
$message = 'Este es un correo de prueba enviado usando Papercut SMTP.';
$headers = 'From: tu@correo.com' . "\r\n";

if (mail($to, $subject, $message, $headers)) {
  echo 'Correo enviado con éxito';
} else {
  echo 'Error al enviar el correo';
}
