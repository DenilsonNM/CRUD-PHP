<?php
session_start();
error_reporting(0);
$varsesion = $_SESSION['nom_admin'];
if ($varsesion == null || $varsesion == '') {
  header("location: login.php");
  die();
}
