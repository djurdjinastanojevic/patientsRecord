<?php
$host = "localhost";
$username = "root";
$password = "";
$dbName = "corona";

$conn = mysqli_connect($host, $username, $password, $dbName);

if(!$conn)
{
    die("Neuspješna konekcija!");
}
