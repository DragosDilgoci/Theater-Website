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

// Assuming the connection code is already present

//Define the insert query
// $sql = "INSERT INTO repertoriu (Denumire) VALUES ('Capra cu trei iezi')";

// // Execute the query
// if ($conn->query($sql) === TRUE) {
//     echo "Value inserted successfully.";
// } else {
//     echo "Error inserting value: " . $conn->error;
// }

// Assuming the connection code is already present

// SQL query to retrieve data from the "users" table
$sql = "SELECT * FROM repertoriu";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    echo "Repertoriu: <br><br>";
    // Output each row's data
    while ($row = $result->fetch_assoc()) {
        // echo "ID: " . $row["ID"] . ", Denumire: " . $row["Denumire"] . "  ";
        echo "<p>".$row["Denumire"] ."</p>";
    }
} else {
    echo "No results found.";
}

// Close the connection
$conn->close();
?>