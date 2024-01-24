<?php
include '../connect.php';
session_start();

$userId = isset($_GET['user_id']) ? $_GET['user_id'] : null;

if (isset($userId)) {
    $redirectUrl = 'display.php?user_id=' . $userId;
    header('Location: ' . $redirectUrl);
    exit();
}

$searchResults = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    $query = mysqli_real_escape_string($connection, $_GET['query']);

    $sql = "SELECT * FROM `kursy` WHERE 
            nazwa_kursu LIKE '%$query%' OR 
            opis LIKE '%$query%'";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searchResults[] = $row;
        }
    } else {
        echo "Błąd zapytania: " . mysqli_error($connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <button class="btn btn-dark my-5">
            <a href="../courses/view.php" class="text-light text-decoration-none">Powrót</a>
        </button>

        <?php
        if (!isset($_SESSION['user_id'])) {
        ?>
            <form action="search.php" method="get" class="mb-3">
                <div class="input-group">
                    <input type="text" id="search" name="query" class="form-control" placeholder="Wyszukaj" required>
                    <button type="submit" class="btn btn-dark">Szukaj</button>
                </div>
            </form>
        <?php
        }
        ?>

        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nazwa kursu</th>
                    <th scope="col">Opis</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($searchResults as $row) {
                    $id = $row['id'];
                    $name = $row['nazwa_kursu'];
                    $desc = $row['opis'];
                    echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td>' . $name . '</td>
                        <td>' . $desc . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
