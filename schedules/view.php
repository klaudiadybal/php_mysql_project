<?php
include '..\connect.php';

$userId = $_GET['user_id'];

if (isset($userId)) {
    $redirectUrl = 'display.php?user_id=' . $userId;
    header('Location: ' . $redirectUrl);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harmonogramy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php if (isset($_SESSION['user_id'])) : ?>
        <?php header('location: index.php'); ?>
    <?php else : ?>
        <div class="container">
            <button class="btn btn-dark my-5">
                <a href="../index.php" class="text-light text-decoration-none">Powrót</a>
            </button>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Kurs</th>
                        <th scope="col">Nauczyciel</th>
                        <th scope="col">Grupa</th>
                        <th scope="col">Data</th>
                        <th scope="col">Godzina rozpoczęcia</th>
                        <th scope="col">Godzina zakończenia</th>
                        <th scope="col">Typ</th>
                        <th scope="col">Adres</th>
                        <th scope="col">Sala</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT h.*, k.nazwa_kursu, n.imie AS imie_nauczyciela, n.nazwisko AS nazwisko_nauczyciela, g.nazwa AS nazwa_grupy
                            FROM harmonogramy h
                            JOIN kursy k ON h.id_kursu = k.id
                            JOIN nauczyciele n ON h.id_nauczyciela = n.id
                            JOIN grupy g ON h.id_grupy = g.id";
                    $result = mysqli_query($connection, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $kurs = $row['nazwa_kursu'];
                            $nauczyciel = $row['imie_nauczyciela'] . ' ' . $row['nazwisko_nauczyciela'];
                            $grupa = $row['nazwa_grupy'];
                            $data = $row['data'];
                            $godzinaRozpoczecia = $row['godzina_rozpoczęcia'];
                            $godzinaZakonczenia = $row['godzina_zakończenia'];
                            $typ = $row['typ'];
                            $adres = $row['adres'];
                            $sala = $row['sala'];

                            echo '<tr>
                                <th scope="row">' . $id . '</th>
                                <td>' . $kurs . '</td>
                                <td>' . $nauczyciel . '</td>
                                <td>' . $grupa . '</td>
                                <td>' . $data . '</td>
                                <td>' . $godzinaRozpoczecia . '</td>
                                <td>' . $godzinaZakonczenia . '</td>
                                <td>' . $typ . '</td>
                                <td>' . $adres . '</td>
                                <td>' . $sala . '</td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</body>

</html>