<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WC";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $bookingId = $_GET['id'];

   
    $sql = "DELETE FROM bookings WHERE id = $bookingId";

    if ($conn->query($sql) === TRUE) {
        echo "Pemesanan berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
