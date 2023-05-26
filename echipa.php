<!DOCTYPE html>
<html>
<head>
  <title>Trupa de Teatru Insiders</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <nav>
    <ul>
      <li><a href="index.php">Acasa</a></li>
      <li><a href="echipa.php">Echipa</a></li>
      <li><a href="repertoriu.php">Repertoriu</a></li>
      <li><a href="program.php">Program</a></li>
      <li><a href="galerie.php">Galerie</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </nav>

  <h1>Trupa de Teatru Insiders</h1>


  <h2>Echipa</h2>

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

// SQL query to retrieve data from the "users" table
$sql = "SELECT Nume, Prenume, Functie FROM echipa order by Functie desc";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output each row's data
    while ($row = $result->fetch_assoc()) {
        echo "<p>Nume: " . $row["Nume"] . "</p>";
        echo "<p>Prenume: " . $row["Prenume"] . "</p>";
        echo "<p>Functie: " . $row["Functie"] . "</p>";
        echo "--- --- --- ---";
    }
} else {
    echo "No results found.";
}
if (isset($_GET['message'])) {
  $message = $_GET['message'];
  echo "<script>alert('$message');</script>"; // Display the message
}

// Close the connection
$conn->close();
?>
 <head>
<style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
  <nav>
    <ul>
  <li><button onclick="toggleTextBox('textBox1')">Arata/Ascunde <br> Buton Adaugare Membru </button>
  <div id="textBox1" class="hidden">
  <form method="POST" action="gestiune echipa/adaugare membru.php">
    <input type="text" name="value1" placeholder="Scrieți numele...">
    <input type="text" name="value1_1" placeholder="Scrieți prenumele...">
    <input type="text" name="value1_2" placeholder="Scrieți funcția...">
    <input type="submit" name="submit1" value="Submit">
  </form></li>

  <li><button onclick="toggleTextBox('textBox2')">Arata/Ascunde <br> Buton Modificare Membru </button>
  <div id="textBox2" class="hidden">
  <form method="POST" action="gestiune echipa/modificare membru.php">
    <input type="text" name="value2" placeholder="Scrieți vechiul nume">
    <input type="text" name="value2_1" placeholder="Scrieți vechiul prenume">
    <input type="text" name="value2_2" placeholder="Scrieți vechea funcție"><br>
    <input type="text" name="value2_3" placeholder="Scrieți noul nume">
    <input type="text" name="value2_4" placeholder="Scrieți noul prenume">
    <input type="text" name="value2_5" placeholder="Scrieți noua funcție">
    <input type="submit" name="submit2" value="Submit">
  </form></li>

  <li><button onclick="toggleTextBox('textBox3')">Arata/Ascunde <br> Buton Stergere Membru </button>
  <div id="textBox3" class="hidden">
  <form method="POST" action="gestiune echipa/stergere membru.php">
  <input type="text" name="value3" placeholder="Scrieți numele...">
    <input type="text" name="value3_1" placeholder="Scrieți prenumele...">
    <input type="text" name="value3_2" placeholder="Scrieți funcția...">
    <input type="submit" name="submit3" value="Submit">
  </form></li>
      </ul>
      </nav>
</body>
<script>
        function toggleTextBox(textBoxId) {
            var textBox = document.getElementById(textBoxId);
            textBox.classList.toggle('hidden');
        }
    </script>
</body>
</html>