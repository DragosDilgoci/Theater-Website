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
    $oldSpectacol = $_POST['value2']; // Get the "vechiul spectacol" value from the form
    $oldData = $_POST['value2_1']; // Get the "vechea dată" value from the form
    $oldOra = $_POST['value2_2']; // Get the "vechea oră" value from the form
    $newSpectacol = $_POST['value2_3']; // Get the "noul spectacol" value from the form
    $newData = $_POST['value2_4']; // Get the "noua dată" value from the form
    $newOra = $_POST['value2_5']; // Get the "noua oră" value from the form

    // Check if the old entry exists in the "program" table
    $checkSql = "SELECT Id_Spectacol FROM program WHERE Id_Spectacol = (SELECT ID FROM repertoriu WHERE Denumire = '$oldSpectacol') AND Data = '$oldData' AND Ora = '$oldOra'";
    $result = $conn->query($checkSql);
    if ($result->num_rows > 0) {
        // Update the entry with the new values
        $updateSql = "UPDATE program SET Id_Spectacol = (SELECT ID FROM repertoriu WHERE Denumire = '$newSpectacol'), Data = '$newData', Ora = '$newOra' WHERE Id_Spectacol = (SELECT ID FROM repertoriu WHERE Denumire = '$oldSpectacol') AND Data = '$oldData' AND Ora = '$oldOra'";
        if ($conn->query($updateSql) === TRUE) {
            header("location: \\Proiect Web\\Theater-Website\\program.php");
            exit;
        } else {
            echo "Error updating entry: " . $conn->error;
        }
    } else {
        $message = "Error: Entry not found in the 'program' table.";
        // Redirect to the previous page
        header("Location: \\Proiect Web\\Theater-Website\\program.php?message=" . $message);
        exit();
    }
}

// Close the connection
$conn->close();
?>