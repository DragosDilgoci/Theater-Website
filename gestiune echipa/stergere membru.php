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
    $deleteNume = $_POST['value3']; // Get the Nume to be deleted from the form
    $deletePrenume = $_POST['value3_1']; // Get the Prenume to be deleted from the form
    $deleteFunctie = $_POST['value3_2']; // Get the Functie to be deleted from the form

    // Delete the row from the table
    $sql = "DELETE FROM echipa WHERE Nume = '$deleteNume' AND Prenume = '$deletePrenume' AND Functie = '$deleteFunctie'";
    if ($conn->query($sql) === TRUE) {
        $message = "Row deleted successfully!";
        header("Location: \\Proiect Web\\Theater-Website\\echipa.php?message=" . $message);
        exit;
    } else {
        echo "Error deleting row: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>