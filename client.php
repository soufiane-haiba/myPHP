<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bankmanagement"; // Change this to your actual database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert sample data into the 'client' table
$sqlInsertDataClient = "INSERT INTO client (first_name, last_name, birthdate, nationality) VALUES 
                    ('Abdelghafour', 'Belkhoukh', '1990/01/01', 'Moroccan'),
                    ('Ahmed', 'Nouaoui', '1985/12/15', 'Moroccan'),
                    ('abdessalam', 'Houas', '1985/12/15', 'Moroccan'),
                    ('Mostafa', 'Labdaoui', '1985/12/15', 'Moroccan'),
                    ('Yassine', 'Haiba', '1985/12/15', 'Moroccan'),
                    ('Alae', 'Rami', '1985/12/15', 'Canadian')";

if ($conn->query($sqlInsertDataClient)) {
    echo "Data inserted into 'client' successfully";
} else {
    echo "Error inserting data into 'client': " . $conn->error;
}

// Close connection
$conn->close();

?>
