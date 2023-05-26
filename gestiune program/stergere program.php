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

if (isset($_POST['submit3'])) {
    $denumire = $_POST['value3']; // Get the "Denumire" value from the form
    $data = $_POST['value3_1']; // Get the "Data" value from the form
    $ora = $_POST['value3_2']; // Get the "Ora" value from the form

    // Check if the denumire exists in the "repertoriu" table
    $checkSql = "SELECT ID FROM repertoriu WHERE Denumire = '$denumire'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idSpectacol = $row['ID']; // Get the ID from the result

        // Delete the record from the table
        $deleteSql = "DELETE FROM program WHERE Id_Spectacol = '$idSpectacol' AND Data = '$data' AND Ora = '$ora'";
        if ($conn->query($deleteSql) === TRUE) {
            header("location: \\Proiect Web\\Theater-Website\\program.php");
            exit;
        } else {
            echo "Error deleting record: " . $conn->error;
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
