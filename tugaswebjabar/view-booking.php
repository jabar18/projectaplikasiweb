<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pemesanan - Sedot WC</title>
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
        <li><a href="booking.html">pesan</a></li>
        <li><a href="view-bookings.php">Lihat Pemesanan</a></li>
      </ul>
    </nav>
  </header>

  <section id="bookings">
    <div class="container">
      <h2>Daftar Pemesanan</h2>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Tanggal</th>
            <th>Pesan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "WC";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
              die("Koneksi gagal: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM bookings";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["id"] . "</td>";
                  echo "<td>" . $row["name"] . "</td>";
                  echo "<td>" . $row["address"] . "</td>";
                  echo "<td>" . $row["phone"] . "</td>";
                  echo "<td>" . $row["date"] . "</td>";
                  echo "<td>" . $row["message"] . "</td>";
                  echo "<td>";
                  echo "<a href='edit-booking.php?id=" . $row["id"] . "'>Edit</a> ";
                  echo "<a href='delete-booking.php?id=" . $row["id"] . "' onclick='return confirm(\"Anda yakin ingin menghapus pemesanan ini?\")'>Hapus</a>";
                  echo "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='7'>Tidak ada pemesanan.</td></tr>";
          }

          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 Sedot WC. All rights reserved.</p>
  </footer>
</body>
</html>
