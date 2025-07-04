<?php
$host = "localhost";
$user = "root"; // default user
$password = "hasmashaik@2310"; // default password
$dbname = "student_crud";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
