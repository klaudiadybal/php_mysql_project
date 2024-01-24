<?php
$connection = new mysqli('localhost', 'root', '', 'uczelnia_test');

if (!$connection) {
    die(mysqli_error($connection));
}
?>