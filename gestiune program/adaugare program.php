<?php

$servername = "localhost"; // Replace with your database server name if different
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "teatruinsiders"; // Replace with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit1'])) {
    $denumire = $_POST['value1']; // Get the "Denumire" value from the form
    $data = $_POST['value1_1']; // Get the "Data" value from the form
    $ora = $_POST['value1_2']; // Get the "Ora" value from the form

    // Check if the denumire exists in the "repertoriu" table
    $checkSql = "SELECT ID FROM repertoriu WHERE Denumire = '$denumire'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idSpectacol = $row['ID']; // Get the ID from the result

        // Check if a duplicate entry exists at the same time or within a 2-hour interval
        $checkSql = "SELECT * FROM program WHERE (Data = '$data' AND (TIME(STR_TO_DATE(Ora, '%H:%i')) BETWEEN ADDTIME(TIME(STR_TO_DATE('$ora', '%H:%i')), '-01:59:59') AND ADDTIME(TIME(STR_TO_DATE('$ora', '%H:%i')), '01:59:59'))) OR (Data = '$data' AND (TIME(STR_TO_DATE(Ora, '%H:%i')) = TIME(STR_TO_DATE('$ora', '%H:%i'))))";
        $result = $conn->query($checkSql);
        if ($result->num_rows > 0) {
            $message = "Error: A duplicate entry already exists at the same time or within a 2-hour interval.";
            // Redirect to the previous page
            header("Location: \\Proiect Web\\Theater-Website\\program.php?message=" . $message);
            exit();
        } else {
            // Insert the values into the table
            $insertSql = "INSERT INTO program (Id_Spectacol, Data, Ora) VALUES ('$idSpectacol', '$data', '$ora')";
            if ($conn->query($insertSql) === TRUE) {
                header("location: \\Proiect Web\\Theater-Website\\program.php");
                exit;
            } else {
                echo "Error inserting values: " . $conn->error;
            }
        }
    } else {
        $message = "Error: Denumire not found in the 'repertoriu' table.";
        // Redirect to the previous page
        header("Location: \\Proiect Web\\Theater-Website\\program.php?message=" . $message);
        exit();
    }
}

// Close the connection
$conn->close();
?>
