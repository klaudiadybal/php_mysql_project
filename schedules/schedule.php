<?php
include '../connect.php';

$userId = $_GET['user_id'];

if(isset($_POST['submit'])) {
  $idKursu = $_POST['id_kursu'];
  $idNauczyciela = $_POST['id_nauczyciela'];
  $idGrupy = $_POST['id_grupy'];
  $data = $_POST['data'];
  $godzinaRozpoczecia = $_POST['godzina_rozpoczecia'];
  $godzinaZakonczenia = $_POST['godzina_zakonczenia'];
  $typ = $_POST['typ'];
  $adres = $_POST['adres'];
  $sala = $_POST['sala'];
  
  $sql = "INSERT INTO `schedules` (id_kursu, id_nauczyciela, id_grupy, data, godzina_rozpoczęcia, godzina_zakończenia, typ, adres, sala)
          VALUES ('$idKursu', '$idNauczyciela', '$idGrupy', '$data', '$godzinaRozpoczecia', '$godzinaZakonczenia', '$typ', '$adres', '$sala')";

  $result = mysqli_query($connection, $sql);

  if($result) {
    header('location:display_schedule.php?user_id=' . $userId);
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
  <title>Plan zajęć</title>
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
              echo '<option value="' . $courseId . '">' . $courseName . '</option>';
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
                    echo '<option value="' . $teacherId . '">' . $teacherName . " " . $teacherLastname . '</option>';
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
              echo '<option value="' . $groupId . '">' . $groupName . '</option>';
            }
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
      </div>
      <button type="submit" class="btn btn-dark mt-5" name="submit">Dodaj</button>
      <button class="btn btn-danger mt-5">
        <a href="display_schedule.php?user_id=<?php echo $userId; ?>" class="text-light text-decoration-none">Anuluj</a>
      </button>
    </form>
  </div>
</body>

</html>