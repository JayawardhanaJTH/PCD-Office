<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'pcd_office');

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    mysqli_set_charset($conn, 'utf8');

    if ($conn->connect_error) {
        die("Connection failed " . $conn->connect_error);
    }
} catch (Throwable $th) {
    echo ("Error on database server!");
}
