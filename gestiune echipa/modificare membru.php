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

if (isset($_POST['submit2'])) {
    $oldNume = $_POST['value2']; // Get the old Nume from the form
    $oldPrenume = $_POST['value2_1']; // Get the old Prenume from the form
    $oldFunctie = $_POST['value2_2']; // Get the old Functie from the form

    $newNume = $_POST['value2_3']; // Get the new Nume from the form
    $newPrenume = $_POST['value2_4']; // Get the new Prenume from the form
    $newFunctie = $_POST['value2_5']; // Get the new Functie from the form

    // Update the table value
    $sql = "UPDATE echipa SET Nume = '$newNume', Prenume = '$newPrenume', Functie = '$newFunctie' WHERE Nume = '$oldNume' AND Prenume = '$oldPrenume' AND Functie = '$oldFunctie'";
    if ($conn->query($sql) === TRUE) {
        $message = "Value updated successfully!";
        header("Location: \\Proiect Web\\Theater-Website\\echipa.php?message=" . $message);
        exit;
    } else {
        echo "Error updating value: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>