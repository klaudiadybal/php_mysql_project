<?php
include '../connect.php';
if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  
  $sql = "insert into `nauczyciele` (imie, nazwisko, adres_email, numer_telefonu)
  values('$name', '$last_name', '$email', $phone)";

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
  <title>Nauczyciele</title>
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Imię:</label>
        <input type="text" class="form-control" placeholder="Podaj imię" name="name">
      </div>
      <div class="mb-3">
        <label class="form-label">Nazwisko:</label>
        <input type="text" class="form-control" placeholder="Podaj nazwisko" name="last_name">
      </div>
      <div class="mb-3">
        <label class="form-label">Adres email:</label>
        <input type="email" class="form-control" placeholder="Podaj adres email" name="email">
      </div>
      <div class="mb-3">
        <label class="form-label">Numer telefonu:</label>
        <input type="number" class="form-control" placeholder="Podaj numer telefonu" name="phone">
      </div>

      <button type="submit" class="btn btn-dark mt-5" name="submit">Submit</button>
      <button class="btn btn-danger mt-5">
            <a href="display.php" class="text-light text-decoration-none">Cancel</a>
      </button>
    </form>
  </div>
</body>

</html>