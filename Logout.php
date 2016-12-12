<?php 
session_start();
session_unset($_SESSION['nick']);
session_destroy();
header("Location: /SARpr/Inicio.php");
?>