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
   
    $doctor = htmlspecialchars($_POST['doctor']);
    $location = htmlspecialchars($_POST['locations']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $service = htmlspecialchars($_POST['service']);
    $comments = htmlspecialchars($_POST['comments']);

    // SQL query to insert data into the reservations table
    $sql = "INSERT INTO reservations (DoctorName,Location ,name, email, phone, date, time, service, comments) 
            VALUES ('$doctor','$location', '$name', '$email', '$phone', '$date', '$time', '$service', '$comments')";

    // Check if the query is successful
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Reservation successfully made!');
                window.location.href = 'reservation.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    $conn->close();



}
?>
