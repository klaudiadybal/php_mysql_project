<?php
include '../connect.php';

$userId = $_GET['user_id'];

$id=$_GET['updateid'];
$sql="select * from `grupy` where id=$id";
$result=mysqli_query($connection, $sql);
$row=mysqli_fetch_assoc($result);
$field=$row['kierunek'];
$type=$row['typ'];
$name=$row['nazwa'];

if(isset($_POST['submit'])) {
  $field = $_POST['field'];
  $type = $_POST['type'];
  $name = $_POST['name'];

  $sql = "update `grupy` set kierunek='$field', 
  typ='$type', nazwa='$name' where id=$id";
  $result = mysqli_query($connection, $sql);

  if($result) {
    header('location:display.php?user_id=' . $userId);
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
        <label class="form-label">Kierunek studiów:</label>
        <input type="text" class="form-control" placeholder="Podaj nazwę kierunku" name="field"
        value=<?php echo $field;?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Typ grupy:</label>
        <input type="text" class="form-control" placeholder="Podaj typ gurpy" name="type"
        value=<?php echo $type;?>>
      </div>
      <div class="mb-3">
        <label class="form-label">Nazwa grupy:</label>
        <input type="text" class="form-control" placeholder="Podaj nazwę gurpy" name="name"
        value=<?php echo $name;?>>
      </div>
      <button type="submit" class="btn btn-dark my-5" name="submit">Zaktualizuj</button>
      <button class="btn btn-danger my-5">
            <a href="display.php?user_id=<?php echo $userId; ?>" class="text-light text-decoration-none">Anuluj</a>
      </button>
    </form>
  </div>
</body>
</html>