<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "time";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user-submitted values
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$time_slot = $_POST['time_slot'];

// Check if the time slot is available
$sql = "SELECT * FROM bookings WHERE date = '$date' AND time_slot = '$time_slot'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Sorry, the selected time slot is not available.";
} else {
    // Insert the booking into the database
    $insert_sql = "INSERT INTO bookings (name, email, date, time_slot) VALUES ('$name', '$email', '$date', '$time_slot')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
