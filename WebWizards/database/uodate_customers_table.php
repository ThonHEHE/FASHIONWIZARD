<?php
// Sisipkan konfigurasi
require_once('config.php');

// Query untuk menghapus kolom first_name dan last_name, serta menambahkan kolom customer_name
$sql = "ALTER TABLE customers DROP COLUMN first_name, DROP COLUMN last_name, ADD COLUMN customer_name VARCHAR(255) NOT NULL AFTER customer_id";

if ($conn->query($sql) === TRUE) {
    echo "Struktur tabel customers berhasil diperbarui";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi ke database
$conn->close();
?>
