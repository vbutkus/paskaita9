<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--    <link rel="stylesheet" href="main.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Title</title>
</head>
<body>


<?php

include('./funkcijos/sqlConnection_mydb.php');

$sql = "SELECT id, name, email, reg_date FROM Paskaita9Forma";
$results = mysqli_query($conn, $sql);

/*if (mysqli_num_rows($results) > 0) {
    while($row = mysqli_fetch_assoc($results)) {
        echo "id: " . $row["id"]. " - Name: " .
            $row["name"] . " - Email: " . $row["email"]. "<br>";
    }
}*/
echo '<div class="container">';
echo "<table class='table'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Registered</th>";
echo "</thead>";
foreach ($results as $result) {
    echo "<tr>";
    echo "<td>".$result['id']."</td>";
    echo "<td>".$result['name']."</td>";
    echo "<td>".$result['email']."</td>";
    echo "<td>".$result['reg_date']."</td>";
    echo "</tr>";
}
echo "</table>";
echo '</div>';

mysqli_close($conn);
?>

<div class="container">
    <div class="card mb-4">
        <?php foreach ($results as $result) {
            echo
                '<div class="card-header">'.$result['name']. '</div>';
            echo
                '<div class="post-card-footer card-footer text-muted">'
                .$result['email']. '</div>';
        }

        ?>
    </div>

</div>



</body>
</html>