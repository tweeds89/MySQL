<?php

$server = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'relationships';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn -> connect_error){
    die("Wystąpił błąd". $conn->connect_error);
}