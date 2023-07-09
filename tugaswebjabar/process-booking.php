<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WC";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$message = $_POST['message'];

$sql = "INSERT INTO bookings (name, address, phone, date, message) VALUES ('$name', '$address', '$phone', '$date', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Pemesanan berhasil.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
