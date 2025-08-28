<?php
$host = "localhost";
$user = "root";
$password = "teste";
$database = "pokecode_DB";

$conn = new mysqli($host, $user, $password, $database);

if($conn -> connect_error){
    die("Falha de conexão: ".  $conn->connect_error);
}

?>