<?php
include '../connect.php';

$userId = $_GET['user_id'];

$id=$_GET['updateid'];
$sql="select * from `harmonogramy` where id=$id";
$result=mysqli_query($connection, $sql);
$row=mysqli_fetch_assoc($result);
$id_kursu=$row['id_kursu'];
$id_nauczyciela=$row['id_nauczyciela'];
$id_grupy=$row['id_grupy'];
$data=$row['data'];
$godzina_rozpoczecia=$row['godzina_rozpoczęcia'];
$godzina_zakonczenia=$row['godzina_zakończenia'];
$typ=$row['typ'];
$adres=$row['adres'];
$sala=$row['sala'];

$teacherSql = "SELECT * FROM `nauczyciele` WHERE id=$id_nauczyciela";
$teacherResult = mysqli_query($connection, $teacherSql);
$teacherRow = mysqli_fetch_assoc($teacherResult);
$currentTeacherId = $teacherRow['id'];
$currentTeacherName = $teacherRow['imie'];
$currentTeacherLastname = $teacherRow['nazwisko'];

if(isset($_POST['submit'])) {
  $id_kursu = $_POST['id_kursu'];
  $id_nauczyciela = $_POST['id_nauczyciela'];
  $id_grupy = $_POST['id_grupy'];
  $data = $_POST['data'];
  $godzina_rozpoczecia = $_POST['godzina_rozpoczecia'];
  $godzina_zakonczenia = $_POST['godzina_zakonczenia'];
  $typ = $_POST['typ'];
  $adres = $_POST['adres'];
  $sala = $_POST['sala'];

  $sql = "update `harmonogramy` set id_kursu='$id_kursu', 
  id_nauczyciela='$id_nauczyciela', id_grupy='$id_grupy', data='$data', godzina_rozpoczęcia='$godzina_rozpoczecia', 
  godzina_zakończenia='$godzina_zakonczenia', typ='$typ', adres='$adres', sala='$sala' where id=$id";
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
  <title>Harmonogramy</title>
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Kurs:</label>
        <select class="form-select" name="id_kursu">
          <?php
          $coursesSql = "SELECT * FROM `kursy`";
          $coursesResult = mysqli_query($connection, $coursesSql);

          if($coursesResult) {
            while($courseRow = mysqli_fetch_assoc($coursesResult)) {
              $courseId = $courseRow['id'];
              $courseName = $courseRow['nazwa_kursu'];
              $selected = ($courseId == $id_kursu) ? 'selected' : '';
              echo '<option value="' . $courseId . '" ' . $selected . '>' . $courseName . '</option>';
            }
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Nauczyciel:</label>
        <select class="form-select" name="id_nauczyciela">
          <?php
          $teachersSql = "SELECT * FROM `nauczyciele`";
          $teachersResult = mysqli_query($connection, $teachersSql);

          if($teachersResult) {
            while($teacherRow = mysqli_fetch_assoc($teachersResult)) {
              $teacherId = $teacherRow['id'];
              $teacherName = $teacherRow['imie'];
              $teacherLastname = $teacherRow['nazwisko'];
              $selected = ($teacherId == $id_nauczyciela) ? 'selected' : '';
              echo '<option value="' . $teacherId . '" ' . $selected . '>' . $teacherName ." ". $teacherLastname . '</option>';
            }
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Grupa:</label>
        <select class="form-select" name="id_grupy">
          <?php
          $groupsSql = "SELECT * FROM `grupy`";
          $groupsResult = mysqli_query($connection, $groupsSql);

          if($groupsResult) {
            while($groupRow = mysqli_fetch_assoc($groupsResult)) {
              $groupId = $groupRow['id'];
              $groupName = $groupRow['nazwa'];
              $selected = ($groupId == $id_grupy) ? 'selected' : '';
              echo '<option value="' . $groupId . '" ' . $selected . '>'. $groupName . '</option>';
            }
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Data:</label>
        <input type="date" class="form-control" name="data" value="<?php echo $data; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Godzina rozpoczęcia:</label>
        <input type="time" class="form-control" name="godzina_rozpoczecia" value="<?php echo $godzina_rozpoczecia; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Godzina zakończenia:</label>
        <input type="time" class="form-control" name="godzina_zakonczenia" value="<?php echo $godzina_zakonczenia; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Typ:</label>
        <input type="text" class="form-control" placeholder="Podaj typ" name="typ" value="<?php echo $typ; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Adres:</label>
        <input type="text" class="form-control" placeholder="Podaj adres" name="adres" value="<?php echo $adres; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Sala:</label>
        <input type="text" class="form-control" placeholder="Podaj salę" name="sala" value="<?php echo $sala; ?>">
      </div>
      <button type="submit" class="btn btn-dark my-5" name="submit">Zaktualizuj</button>
      <button class="btn btn-danger my-5">
        <a href="display.php?user_id=<?php echo $userId; ?>" class="text-light text-decoration-none">Anuluj</a>
      </button>
    </form>
  </div>
</body>
</html>