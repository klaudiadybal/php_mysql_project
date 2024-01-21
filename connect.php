<?php
$connection = new mysqli('localhost', 'root', '', 'uczelnia');

if (!$connection) {
    die(mysqli_error($connection));
}
?>