<?php
include '../connect.php';

$id=$_GET['updateid'];
$sql="select * from `kursy` where id=$id";
$result=mysqli_query($connection, $sql);
$row=mysqli_fetch_assoc($result);
$name=$row['nazwa_kursu'];
$desc=$row['opis'];

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $desc = $_POST['desc'];

  $sql = "update `kursy` set nazwa_kursu='$name', 
  opis='$desc' where id=$id";
  $result = mysqli_query($connection, $sql);

  if($result) {
    header('location:display.php');
  } else {
    die(mysqli_error($con));
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
        <input type="text" class="form-control" placeholder="Podaj nazwę kursu" name="name"
        value=<?php echo $name;?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Opis:</label>
        <input type="text" class="form-control" placeholder="Podaj opis kursu" name="desc"
        value=<?php echo $desc;?>>
      </div>
      <button type="submit" class="btn btn-dark my-5" name="submit">Update</button>
    </form>
  </div>
</body>
</html>