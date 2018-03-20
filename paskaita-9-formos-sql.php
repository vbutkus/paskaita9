<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
          crossorigin="anonymous">
    <title>Formos sql</title>
</head>
<body>

<?php

/*// sql to create table
$sql = "CREATE TABLE Paskaita9Forma (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}*/


/*$sql = "INSERT INTO Paskaita9Forma (username, email)
VALUES ('Test2', 'test2@test.com')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "New record created succesfully. Last inserted ID is: " . $last_id;
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

/*$sql = "SELECT id, username, email FROM Paskaita9Forma";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " .
            $row["username"] . " - Email: " . $row["email"]. "<br>";
    }
}
else {
    echo "0 results";
}*/

?>


<?php
session_start();

include('./funkcijos/sqlConnection_mydb.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if(empty($_POST['name']) || empty($_POST['email'])) {
        $error = 'Bad entry douchebag';/*
        if (strlen($_POST['name'] >= 1)) {
            $error = "Name too short";
        }*/
    }
    else {
        $success = 'Information added';
            if (isset($_POST['submit'])) {
                $sql = "INSERT INTO Paskaita9Forma (name, email)
                    VALUES ('".$_POST["name"]."','". $_POST["email"]."')";
                            /*$sql = "INSERT INTO Paskaita9Forma (username, email)
                    VALUES ('Test3', 'test3@test.com')";*/
                $result = mysqli_query($conn, $sql);
                var_dump($result);
            }
    }
}

mysqli_close($conn);

?>


<div class="container">
    <H1> Form</H1>
    <div class="row">
        <div class="col-4">
            <?php
            if($error) {
                echo "<div class='alert alert-danger'>".$error."</div>";
            }
            elseif($success) {
                echo "<div class='alert alert-success'>".$success."</div>";
            }
            ?>
            <form method="POST" action="paskaita-9-formos-sql.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>



</body>
</html>