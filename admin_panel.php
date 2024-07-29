<?php
$username = "sepaehs";
$password = "onuq7256";
$database = "sepaehs_info";

$mysqli = new mysqli("mysql-sepaehs.alwaysdata.net", $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM alwaysdata_connection";

echo '
<main class="table" id="customers_table">
    <section class="table__header">
        <h1>Les Exercices et Les Évaluation</h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <img src="images/search.png" alt="">
        </div>
        <div class="export__file">
            <label for="export-file" class="export__file-btn" title="Export File"></label>
            <input type="checkbox" id="export-file">
            <div class="export__file-options">
                <label>Export As &nbsp; &#10140;</label>
                <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
                <label for="export-file" id="toJSON">JSON <img src="images/json.png" alt=""></label>
                <label for="export-file" id="toCSV">CSV <img src="images/csv.png" alt=""></label>
                <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt=""></label>
            </div>
        </div>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th>Id<span class="icon-arrow">&UpArrow;</span></th>
                    <th>Name<span class="icon-arrow">&UpArrow;</span></th>
                    <th>Last Name<span class="icon-arrow">&UpArrow;</span></th>
                    <th>Email<span class="icon-arrow">&UpArrow;</span></th>
                    <th>username<span class="icon-arrow">&UpArrow;</span></th>
                    <th>Password<span class="icon-arrow">&UpArrow;</span></th>
                    <th>Action<span class="icon-arrow">&UpArrow;</span></th>
                </tr>
            </thead>
            <tbody>
';

if ($result = $mysqli->query($query)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
                <tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["prenom"] . "</td>
                    <td>" . $row["nom"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='username' value='" . $row["username"] . "'>
                            <input type='submit' style='background-color:red' class='btn btn-primary' value='Delete'>
                        </form>
                    </td>
                </tr>
            ";
        }
    } else {
        echo "No data found.";
    }
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}

echo "
            </tbody>
        </table>
    </section>
</main>
";

$mysqli->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>

    <style>
        table {
            border: 1px solid black;
        }
        tr, td {
            border: 1px solid black;
            margin-bottom: 0px;
            margin-top: 0px;

            padding-bottom: 0px;
            padding-top: 0px;
        }

        th {
            border: 1px solid red;
        }

        .delete_user {
            background-color: red;
            margin-top: 10px;
            margin-bottom: 0px;
        }

    </style>

</head>
<body>
    
</body>
</html>