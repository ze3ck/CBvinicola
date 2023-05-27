<?php

// LOCALHOST
$dbname = "Vinicola";
$dbuser = "root";
$dbhost = "localhost";
$dbpass = "";

/*
// WEBSITE
$dbname = "id20803382_vinicoladb";
$dbuser = "id20803382_root";
$dbhost = "localhost";
$dbpass = "#Hola1234";
*/

$conexion = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
?>