<?php
include 'config.php';

// Pilih database
$conn->select_db($dbname);

// Data contoh untuk tabel orders
$orders = [
    ['customer_id' => 1, 'order_date' => '2024-06-05', 'total_amount' => 1500000, 'status' => 'Dalam Pengiriman', 'shipping_address' => 'Jl. Sudirman No. 123, Jakarta', 'payment_method' => 'Transfer Bank', 'product' => 'Dress Batik', 'customer_name' => 'Lia Anindita'],
    ['customer_id' => 2, 'order_date' => '2024-06-04', 'total_amount' => 750000, 'status' => 'Menunggu Pembayaran', 'shipping_address' => 'Jl. Surya No. 45, Surabaya', 'payment_method' => 'Kartu Kredit', 'product' => 'Kemeja Pria', 'customer_name' => 'Hadi Pratama'],
    ['customer_id' => 3, 'order_date' => '2024-06-03', 'total_amount' => 500000, 'status' => 'Selesai', 'shipping_address' => 'Jl. Gajah Mada No. 87, Bandung', 'payment_method' => 'Bayar di Tempat', 'product' => 'Sepatu Sneakers', 'customer_name' => 'Dewi Rahayu'],
    ['customer_id' => 4, 'order_date' => '2024-06-02', 'total_amount' => 300000, 'status' => 'Dalam Pengiriman', 'shipping_address' => 'Jl. Merdeka No. 10, Yogyakarta', 'payment_method' => 'Transfer Bank', 'product' => 'Celana Jeans', 'customer_name' => 'Budi Santoso'],
    ['customer_id' => 5, 'order_date' => '2024-06-01', 'total_amount' => 900000, 'status' => 'Menunggu Konfirmasi', 'shipping_address' => 'Jl. Diponegoro No. 30, Semarang', 'payment_method' => 'Transfer Bank', 'product' => 'Blouse Wanita', 'customer_name' => 'Rini Suryani'],
    ['customer_id' => 6, 'order_date' => '2024-06-10', 'total_amount' => 600000, 'status' => 'Menunggu Pembayaran', 'shipping_address' => 'Jl. Gatot Subroto No. 56, Medan', 'payment_method' => 'Kartu Debit', 'product' => 'Jaket Kulit', 'customer_name' => 'Putri Lestari'],
    ['customer_id' => 7, 'order_date' => '2024-06-09', 'total_amount' => 850000, 'status' => 'Selesai', 'shipping_address' => 'Jl. Asia Afrika No. 78, Bandung', 'payment_method' => 'Transfer Bank', 'product' => 'Tas Ransel', 'customer_name' => 'Dian Kartika'],
    ['customer_id' => 8, 'order_date' => '2024-06-08', 'total_amount' => 400000, 'status' => 'Dalam Pengiriman', 'shipping_address' => 'Jl. Pahlawan No. 22, Surabaya', 'payment_method' => 'Bayar di Tempat', 'product' => 'Topi Trucker', 'customer_name' => 'Rizky Firmansyah'],
    ['customer_id' => 9, 'order_date' => '2024-06-07', 'total_amount' => 950000, 'status' => 'Menunggu Konfirmasi', 'shipping_address' => 'Jl. Diponegoro No. 40, Jakarta', 'payment_method' => 'Transfer Bank', 'product' => 'Kemeja Flanel', 'customer_name' => 'Aditya Pratama'],
    ['customer_id' => 10, 'order_date' => '2024-06-06', 'total_amount' => 300000, 'status' => 'Dalam Pengiriman', 'shipping_address' => 'Jl. Siliwangi No. 15, Semarang', 'payment_method' => 'Transfer Bank', 'product' => 'Celana Jogger', 'customer_name' => 'Nadia Puspita'],
    ['customer_id' => 11, 'order_date' => '2024-06-15', 'total_amount' => 1200000, 'status' => 'Selesai', 'shipping_address' => 'Jl. Surya Kencana No. 25, Bogor', 'payment_method' => 'Transfer Bank', 'product' => 'Dress Formal', 'customer_name' => 'Siti Rahayu'],
    ['customer_id' => 12, 'order_date' => '2024-06-14', 'total_amount' => 850000, 'status' => 'Dalam Pengiriman', 'shipping_address' => 'Jl. Raya Barat No. 30, Malang', 'payment_method' => 'Kartu Kredit', 'product' => 'Tas Selempang', 'customer_name' => 'Agus Wibowo'],
    ['customer_id' => 13, 'order_date' => '2024-06-13', 'total_amount' => 400000, 'status' => 'Menunggu Pembayaran', 'shipping_address' => 'Jl. Puri Kencana No. 10, Denpasar', 'payment_method' => 'Bayar di Tempat', 'product' => 'Jaket Parka', 'customer_name' => 'Dewi Susanti'],
    ['customer_id' => 14, 'order_date' => '2024-06-12', 'total_amount' => 950000, 'status' => 'Menunggu Konfirmasi', 'shipping_address' => 'Jl. Cendrawasih No. 8, Palembang', 'payment_method' => 'Transfer Bank', 'product' => 'Sepatu Boots', 'customer_name' => 'Rudi Hidayat'],
    ['customer_id' => 15, 'order_date' => '2024-06-11', 'total_amount' => 300000, 'status' => 'Selesai', 'shipping_address' => 'Jl. Kenanga No. 20, Makassar', 'payment_method' => 'Transfer Bank', 'product' => 'Kaos Polos', 'customer_name' => 'Nisa Azizah'],
];

// Masukkan data ke dalam tabel orders
foreach ($orders as $order) {
    $customer_id = $order['customer_id'];
    $order_date = $order['order_date'];
    $total_amount = $order['total_amount'];
    $status = $order['status'];
    $shipping_address = $order['shipping_address'];
    $payment_method = $order['payment_method'];
    $product = $order['product'];
    $customer_name = $order['customer_name'];

    $sql = "INSERT INTO orders (customer_id, order_date, total_amount, status, shipping_address, payment_method, product, customer_name) VALUES ($customer_id, '$order_date', $total_amount, '$status', '$shipping_address', '$payment_method', '$product', '$customer_name')";
    if ($conn->query($sql) === TRUE) {
        echo "Order added successfully\n";
    } else {
        echo "Error adding order: " . $conn->error . "\n";
    }
}

// Menutup koneksi
$conn->close();
?>
