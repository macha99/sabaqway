<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$server = 'sql308.epizy.com';
$username = 'epiz_28402066';
$password = 'tWESZ06p9zo7';
$dbname = 'epiz_28402066_swk';
$conn = new mysqli($server, $username, $password, $dbname);

session_start();


function x($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}
