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
            <a href="course.php" class="text-light text-decoration-none">Add</a>
        </button>
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nazwa kursu</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Modyfikacja</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "Select * from `kursy`";
                $result = mysqli_query($connection, $sql);
                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['nazwa_kursu'];
                        $desc = $row['opis'];
                        echo '<tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$name.'</td>
                            <td>'.$desc.'</td>
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