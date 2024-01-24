<?php
include '..\connect.php';

$userId = $_GET['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nauczyciele</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <button class="btn btn-dark my-5">
            <a href="teacher.php?user_id=<?php echo $userId; ?>" class="text-light text-decoration-none">Dodaj</a>
        </button>
        <button class="btn btn-dark my-5">
            <a href="..\index.php?user_id=<?php echo $userId; ?>" class="text-light text-decoration-none">Powrót</a>
        </button>

        

        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Imię</th>
                    <th scope="col">Nazwisko</th>
                    <th scope="col">Adres email</th>
                    <th scope="col">Numer telefonu</th>
                    <th scope="col">Modyfikacja</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from `nauczyciele`";
                $result = mysqli_query($connection, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['imie'];
                        $last_name = $row['nazwisko'];
                        $email = $row['adres_email'];
                        $phone = $row['numer_telefonu'];
                        echo '<tr>
                            <th scope="row">' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $last_name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $phone . '</td>
                            <td>
                            <button class="btn btn-dark">
                                <a href="update.php?updateid=' . $id . '&user_id=' . $userId . '" class="text-light text-decoration-none">Edytuj</a></button>
                            </button>
                            <button class="btn btn-danger">
                                <a href="delete.php?deleteid=' . $id . '&user_id=' . $userId . '" class="text-light text-decoration-none">Usuń</a></button>
                            </button>
                            </td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>