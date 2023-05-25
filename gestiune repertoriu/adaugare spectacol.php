<?php

// $servername = "localhost"; // Replace with your database server name if different
// $username = "root"; // Replace with your database username
// $password = ""; // Replace with your database password
// $dbname = "teatruinsiders"; // Replace with your database name

// // Create a connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// // Assuming you have established a database connection

// if (isset($_POST['submit1'])) {
//     $value = $_POST['value1']; // Get the value from the form

//     // Insert the value into the table
//     $sql = "INSERT INTO repertoriu (Denumire) VALUES ('$value')";
//     if ($conn->query($sql) === TRUE) {
//         header("location: \\Proiect Web\\repertoriu.php");
//         exit;
        
//     } else {
//         echo "Error inserting value: " . $conn->error;
//     }
// }

// // Close the connection
// $conn->close();

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
    $value = $_POST['value1']; // Get the value from the form

    // Check if the value already exists in the table
    $checkSql = "SELECT * FROM repertoriu WHERE Denumire = '$value'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        $message = "Error: Value already exists in the table.";
        // Redirect to the previous page
        header("Location: \\Proiect Web\\Theater-Website\\repertoriu.php?message=" . $message);
        exit();
    } else {
        // Insert the value into the table
        $insertSql = "INSERT INTO repertoriu (Denumire) VALUES ('$value')";
        if ($conn->query($insertSql) === TRUE) {
            header("location: \\Proiect Web\\Theater-Website\\repertoriu.php");
            exit;
        } else {
            echo "Error inserting value: " . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>