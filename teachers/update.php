<?php
include '../connect.php';

$id=$_GET['updateid'];
$sql="select * from `nauczyciele` where id=$id";
$result=mysqli_query($connection, $sql);
$row=mysqli_fetch_assoc($result);
$name=$row['imie'];
$last_name=$row['nazwisko'];
$email=$row['adres_email'];
$phone=$row['numer_telefonu'];

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $phone= $_POST['phone'];

  $sql = "update `nauczyciele` set imie='$name', 
  nazwisko='$last_name', adres_email='$email', numer_telefonu=$phone
  where id=$id";
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
        <input type="text" class="form-control" placeholder="Podaj imię" name="name"
        value=<?php echo $name;?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Nazwisko:</label>
        <input type="text" class="form-control" placeholder="Podaj nazwisko" name="last_name"
        value=<?php echo $last_name;?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Adres email:</label>
        <input type="email" class="form-control" placeholder="Podaj adres email" name="email"
        value=<?php echo $email;?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Numer telefonu:</label>
        <input type="number" class="form-control" placeholder="Podaj numer telefonu" name="phone"
        value=<?php echo $phone;?>>
      </div>
      <button type="submit" class="btn btn-dark my-5" name="submit">Update</button>
      <button class="btn btn-danger my-5">
            <a href="display.php" class="text-light text-decoration-none">Cancel</a>
      </button>
    </form>
  </div>
</body>
</html>