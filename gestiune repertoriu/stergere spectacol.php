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
    $value = $_POST['value3']; // Get the value from the form

    // Check if the value exists in the table
    $checkSql = "SELECT * FROM repertoriu WHERE Denumire = '$value'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        // Delete the record
        $deleteSql = "DELETE FROM repertoriu WHERE Denumire = '$value'";
        if ($conn->query($deleteSql) === TRUE) {
            $message = "Record deleted successfully.";
        } else {
            $message = "Error deleting record: " . $conn->error;
        }
    } else {
        $message = "Error: Value does not exist in the table.";
    }
    
    // Redirect to the previous page with the message in the URL
    header("Location: \\Proiect Web\\repertoriu.php?message=" . $message);
    exit();
}

// Close the connection
$conn->close();
?>