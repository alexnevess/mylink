<?php
$host = "localhost";
$user = "root";
$password = "";
$bd_name = "mylinkbd";

$con = new mysqli($host, $user, $password, $bd_name);
if ($con->connect_errno) {
echo "teste";
}
