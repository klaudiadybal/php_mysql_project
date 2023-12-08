<?php
include '..\connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

<body>
    <div class="container">
        <button class="btn btn-dark my-5">
            <a href="group.php" class="text-light text-decoration-none">Add</a>
        </button>
        <button class="btn btn-dark my-5">
            <a href="../index.php" class="text-light text-decoration-none">Back to Home Page</a>
        </button>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Kierunek studiów</th>
                    <th scope="col">Typ grupy</th>
                    <th scope="col">Nazwa grupy</th>
                    <th scope="col">Modyfikacja</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "select * from `grupy`";
                $result = mysqli_query($connection, $sql);
                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $field = $row['kierunek'];
                        $type = $row['typ'];
                        $name = $row['nazwa'];
                        echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$field.'</td>
                            <td>'.$type.'</td>
                            <td>'.$name.'</td>
                            <td>
                                <button class="btn btn-dark">
                                    <a href="update.php?updateid='.$id.'" class="text-light text-decoration-none">Update</a></button>
                                </button>
                                <button class="btn btn-danger">
                                    <a href="delete.php?deleteid='.$id.'" class="text-light text-decoration-none">Delete</a></button>
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