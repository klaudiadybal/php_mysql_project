<?php
include '../connect.php';
if(isset($_POST['submit'])) {
  $field = $_POST['field'];
  $type = $_POST['type'];
  $name = $_POST['name'];
  
  $sql = "insert into `grupy` (kierunek, typ, nazwa)
  values('$field', '$type', '$name')";

  $result = mysqli_query($connection, $sql);

  if($result) {
    header('location:display.php');
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
  <title>Grupy</title>
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Kierunek studiów:</label>
        <input type="text" class="form-control" placeholder="Podaj nazwę kierunku" name="field">
      </div>
      <div class="mb-3">
        <label class="form-label">Typ grupy:</label>
        <input type="text" class="form-control" placeholder="Podaj typ grupy" name="type">
      </div>
      <div class="mb-3">
        <label class="form-label">Nazwa grupy:</label>
        <input type="text" class="form-control" placeholder="Podaj nazwę grupy" name="name">
      </div>
      <button type="submit" class="btn btn-dark mt-5" name="submit">Submit</button>
      <button class="btn btn-danger mt-5">
            <a href="display.php" class="text-light text-decoration-none">Cancel</a>
      </button>
    </form>
  </div>
</body>

</html>