<?php

$host = 'localhost';
$dbname = 'user_form_db';
$username = 'root'; 
$password = '';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $about = mysqli_real_escape_string($conn, $_POST['about']);

    $sql = "INSERT INTO users (name, email, about) VALUES ('$name', '$email', '$about')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

  
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
