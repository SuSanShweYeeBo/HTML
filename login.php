<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root"; 
$dbname = "practicedb";
$password =""; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // SQL query to insert data into the reservations table
    $sql = "INSERT INTO login (name, password) VALUES ('$name', '$password')";

    // Check if the query is successful
    if ($conn->query($sql) === TRUE) {
        // Redirect to reservation.html if the reservation is made successfully
        header("Location: home.html");
        exit(); // Ensure the script stops after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
