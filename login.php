<?php
session_start();

include 'connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `uzytkownicy` WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $redirectUrl = 'index.php?user_id=' . $_SESSION['user_id'];
            header('Location: ' . $redirectUrl);
        } else {
            echo 'Nieprawidłowy login lub hasło.';
        }
    } else {
        die(mysqli_error($connection));
    }
}
?>

<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Login page</title>
</head>

<body>
    <div class="d-grid gap-2 col-6 mx-auto mt-5">
        <?php if (isset($_SESSION['user_id'])) : ?>
            <?php header('location: index.php'); ?>
        <?php else : ?>
            <form method="post" class="mb-3">
                <label for="username" class="form-label">Nazwa użytkownika:</label>
                <input type="text" id="username" name="username" class="form-control" required>

                <label for="password" class="form-label">Hasło:</label>
                <input type="password" id="password" name="password" class="form-control" required>

                <button type="submit" name="login" class="btn btn-dark mt-3">Zaloguj</button>
                <a href="index.php" class="btn btn-dark text-white text-decoration-none mt-3" role="button">
                    Powrót
                </a>
            </form>
        <?php endif; ?>
    </div>
</body>


</html>