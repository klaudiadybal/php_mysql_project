<?php
    include '../connect.php';

    $userId = $_GET['user_id'];

    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `harmonogramy` WHERE id_grupy = $id";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            // header('location:display.php?user_id=' . $userId);
        } else {
            die(mysqli_error($connection));
        }
    }

?>