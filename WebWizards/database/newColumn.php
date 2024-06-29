<?php
include 'config.php';

// Pilih database
$conn->select_db($dbname);

// Tambahkan kolom "product" ke tabel "orders" jika belum ada
$sql_add_product_column = "ALTER TABLE orders ADD COLUMN product VARCHAR(100)";
if ($conn->query($sql_add_product_column) === TRUE) {
    echo "Kolom 'product' berhasil ditambahkan ke tabel 'orders'\n";
} else {
    echo "Error saat menambahkan kolom 'product': " . $conn->error . "\n";
}

// Tambahkan kolom "nama(customer)" ke tabel "orders" jika belum ada
$sql_add_customer_column = "ALTER TABLE orders ADD COLUMN customer_name VARCHAR(100)";
if ($conn->query($sql_add_customer_column) === TRUE) {
    echo "Kolom 'customer_name' berhasil ditambahkan ke tabel 'orders'\n";
} else {
    echo "Error saat menambahkan kolom 'customer_name': " . $conn->error . "\n";
}

// Menutup koneksi
$conn->close();
?>
