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
    $nume = $_POST['value1']; // Get the "Nume" value from the form
    $prenume = $_POST['value1_1']; // Get the "Prenume" value from the form
    $functie = $_POST['value1_2']; // Get the "Functie" value from the form

    // Check if the value already exists in the table
    $checkSql = "SELECT * FROM echipa WHERE Nume = '$nume' AND Prenume = '$prenume' AND Functie = '$functie'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        $message = "Error: Value already exists in the table.";
        // Redirect to the previous page
        header("Location: \\Proiect Web\\Theater-Website\\echipa.php?message=" . $message);
        exit();
    } else {
        // Insert the values into the table
        $insertSql = "INSERT INTO echipa (Nume, Prenume, Functie) VALUES ('$nume', '$prenume', '$functie')";
        if ($conn->query($insertSql) === TRUE) {
            header("location: \\Proiect Web\\Theater-Website\\echipa.php");
            exit;
        } else {
            echo "Error inserting values: " . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>