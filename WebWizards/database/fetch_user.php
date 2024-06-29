<?php
include 'config.php';

// Kueri untuk mengambil data pengguna dari tabel users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Periksa jika ada hasil yang ditemukan
if ($result->num_rows > 0) {
    // Loop melalui setiap baris hasil
    while ($row = $result->fetch_assoc()) {
        // Menampilkan data pengguna
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["username"]) . "</td>"; // Menggunakan htmlspecialchars untuk mencegah serangan XSS
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>"; // Menggunakan htmlspecialchars untuk mencegah serangan XSS
        echo "<td>" . htmlspecialchars($row["role"]) . "</td>"; // Menggunakan htmlspecialchars untuk mencegah serangan XSS
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Tidak ada data pengguna yang ditemukan</td></tr>"; // Tampilkan pesan jika tidak ada data
}

// Menutup koneksi
$conn->close();
?>