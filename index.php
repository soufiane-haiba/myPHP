<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

$databaseName = "bankmanagement";
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $databaseName";

if ($conn->query($sqlCreateDatabase)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Use the created database
$conn->select_db($databaseName);

// Create 'account' table
$tableName = "account";
$sqlCreateTableAccount = "CREATE TABLE IF NOT EXISTS `$tableName` (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    balance INT(10) NOT NULL,
    devise VARCHAR(30) NOT NULL,
    client_id INT(6) UNSIGNED NOT NULL,  -- Match data type and attributes
    FOREIGN KEY (client_id) REFERENCES client(id),
    INDEX (client_id)
)";

if ($conn->query($sqlCreateTableAccount)) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table $tableName: " . $conn->error;
}


// Create 'account' table
$tableName = "account";
$sqlCreateTableAccount = "CREATE TABLE IF NOT EXISTS `$tableName` (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    balance INT(10) NOT NULL,
    devise VARCHAR(30) NOT NULL,
    client_id INT NOT NULL,
    FOREIGN KEY (client_id) REFERENCES client(id),
    INDEX (client_id)
)";

if ($conn->query($sqlCreateTableAccount)) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table $tableName: " . $conn->error;
}

// Create 'transaction' table
$tableName = "transaction";
$sqlCreateTableTransaction = "CREATE TABLE IF NOT EXISTS `$tableName` (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    montant INT(10) NOT NULL,
    type VARCHAR(30) NOT NULL,
    account_id INT(6) UNSIGNED NOT NULL,  -- Match data type and attributes
    FOREIGN KEY (account_id) REFERENCES account(id),
    INDEX (account_id)
)";

if ($conn->query($sqlCreateTableTransaction)) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table $tableName: " . $conn->error;
}



$conn->close();

?>
