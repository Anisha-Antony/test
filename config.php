<?php
$sqlConnect = new mysqli("localhost","root","","test");

if ($sqlConnect -> connect_errno) {
    echo "Failed to connect to MySQL: " . $sqlConnect -> connect_error;
    exit();
}

session_start();