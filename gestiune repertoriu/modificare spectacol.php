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
// Assuming you have established a database connection

if (isset($_POST['submit2'])) {
    $oldValue = $_POST['value2']; // Get the old value from the form
    $newValue = $_POST['value2_1']; // Get the new value from the form

    // Update the table value
    $sql = "UPDATE repertoriu SET Denumire = '$newValue' WHERE Denumire = '$oldValue'";
    if ($conn->query($sql) === TRUE) {
        $message = "Value updated successfully!"
        header("location: \\Proiect Web\\repertoriu.php?message=" . $message);
        exit;
    } else {
        echo "Error updating value: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
