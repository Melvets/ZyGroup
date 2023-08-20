<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

include 'functions.php';

$id = $_GET["id"];

if ( delete($id) > 0 ) {
    $_SESSION["alertSuccess"] = "Data berhasil dihapus!";
    header("location: index.php");
} 


?>