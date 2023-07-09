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
    
    $sql = "SELECT * FROM bookings WHERE id = $bookingId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $address = $row['address'];
        $phone = $row['phone'];
        $date = $row['date'];
        $message = $row['message'];
    } else {
        echo "Pemesanan tidak ditemukan.";
    }
} else {
    echo "ID pemesanan tidak valid.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pemesanan - Sedot WC</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="services.html">Layanan</a></li>
        <li><a href="about.html">Tentang Kami</a></li>
        <li><a href="contact.html">Kontak</a></li>
        <li><a href="login.html">Login</a></li>
        <li><a href="view-bookings.php">Lihat Pemesanan</a></li>
      </ul>
    </nav>
  </header>

  <section id="booking">
    <div class="container">
      <h2>Edit Pemesanan Sedot WC</h2>
      <form action="process-edit-booking.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $bookingId; ?>">
        <input type="text" name="name" placeholder="Nama" value="<?php echo $name; ?>" required>
        <input type="text" name="address" placeholder="Alamat" value="<?php echo $address; ?>" required>
        <input type="tel" name="phone" placeholder="Nomor Telepon" value="<?php echo $phone; ?>" required>
        <input type="date" name="date" value="<?php echo $date; ?>" required>
        <textarea name="message" placeholder="Pesan" required><?php echo $message; ?></textarea>
        <button type="submit">Simpan Perubahan</button>
      </form>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 Sedot WC. All rights reserved.</p>
  </footer>
</body>
</html>
