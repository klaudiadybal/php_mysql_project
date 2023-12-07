<?php
include '../connect.php';
if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  
  $sql = "insert into `kursy` (nazwa_kursu, opis)
  values('$name', '$desc')";

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
  <title>Kursy</title>
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Nazwa kursu:</label>
        <input type="text" class="form-control" placeholder="Podaj nazwę kursu" name="name">
      </div>
      <div class="mb-3">
        <label class="form-label">Opis:</label>
        <input type="text" class="form-control" placeholder="Podaj opis kursu" name="desc">
      </div>
      <button type="submit" class="btn btn-dark mt-5" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>