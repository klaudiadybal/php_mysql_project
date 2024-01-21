<?php

$userId = $_GET['user_id'];

if (isset($userId)) {
    echo '<div class="m-5">
        <a href="logout.php" class="btn btn-dark text-white text-decoration-none" role="button">
            Wyloguj się
        </a>
    </div>';
} else {
    echo '<div class="m-5">
        <a href="login.php" class="btn btn-dark text-white text-decoration-none" role="button">
            Zaloguj się
        </a>
    </div>';
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Home page</title>
</head>

<body>
</div>
<div class="d-grid gap-2 col-6 mx-auto mt-5">
  <a href="schedules/view.php<?php if (isset($_GET['user_id'])) echo '?user_id=' . $_GET['user_id']; ?>"
      class="btn btn-dark text-white text-decoration-none" role="button">
      Harmonogramy
    </a>
    <a href="groups/view.php<?php if (isset($_GET['user_id'])) echo '?user_id=' . $_GET['user_id']; ?>"
      class="btn btn-dark text-white text-decoration-none" role="button">
      Grupy
    </a>
    <a href="courses/view.php<?php if (isset($_GET['user_id'])) echo '?user_id=' . $_GET['user_id']; ?>"
      class="btn btn-dark text-white text-decoration-none" role="button">
      Kursy
    </a>
    <a href="teachers/view.php<?php if (isset($_GET['user_id'])) echo '?user_id=' . $_GET['user_id']; ?>"
      class="btn btn-dark text-white text-decoration-none" role="button">
      Nauczyciele
    </a>
</div>


</body>
</html>