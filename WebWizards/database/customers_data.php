<?php

// Include file konfigurasi database
include 'config.php';

// Data customer
$customers_data = [
    ['customer_id' => 1, 'customer_name' => 'Lia Anindita', 'email' => 'liaanindita@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Sudirman No. 123, Jakarta', 'city' => 'Jakarta', 'state' => 'DKI Jakarta', 'postal_code' => '12345', 'country' => 'Indonesia'],
    ['customer_id' => 2, 'customer_name' => 'Hadi Pratama', 'email' => 'hadipratama@gmail.com', 'phone' => '08567891234', 'address' => 'Jl. Surya No. 45, Surabaya', 'city' => 'Surabaya', 'state' => 'Jawa Timur', 'postal_code' => '23456', 'country' => 'Indonesia'],
    ['customer_id' => 3, 'customer_name' => 'Dewi Rahayu', 'email' => 'dewirahayu@gmail.com', 'phone' => '08765432109', 'address' => 'Jl. Gajah Mada No. 87, Bandung', 'city' => 'Bandung', 'state' => 'Jawa Barat', 'postal_code' => '34567', 'country' => 'Indonesia'],
    ['customer_id' => 4, 'customer_name' => 'Budi Santoso', 'email' => 'budisantoso@gmail.com', 'phone' => '08111222333', 'address' => 'Jl. Merdeka No. 10, Yogyakarta', 'city' => 'Yogyakarta', 'state' => 'DI Yogyakarta', 'postal_code' => '45678', 'country' => 'Indonesia'],
    ['customer_id' => 5, 'customer_name' => 'Rini Suryani', 'email' => 'rinisuryani@gmail.com', 'phone' => '08987654321', 'address' => 'Jl. Diponegoro No. 30, Semarang', 'city' => 'Semarang', 'state' => 'Jawa Tengah', 'postal_code' => '56789', 'country' => 'Indonesia'],
    ['customer_id' => 6, 'customer_name' => 'Putri Lestari', 'email' => 'putrilestari@gmail.com', 'phone' => '08234567890', 'address' => 'Jl. Gatot Subroto No. 56, Medan', 'city' => 'Medan', 'state' => 'Sumatera Utara', 'postal_code' => '67890', 'country' => 'Indonesia'],
    ['customer_id' => 7, 'customer_name' => 'Dian Kartika', 'email' => 'diankartika@gmail.com', 'phone' => '08765432198', 'address' => 'Jl. Asia Afrika No. 78, Bandung', 'city' => 'Bandung', 'state' => 'Jawa Barat', 'postal_code' => '78901', 'country' => 'Indonesia'],
    ['customer_id' => 8, 'customer_name' => 'Rizky Firmansyah', 'email' => 'rizkyfirmansyah@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Pahlawan No. 22, Surabaya', 'city' => 'Surabaya', 'state' => 'Jawa Timur', 'postal_code' => '89012', 'country' => 'Indonesia'],
    ['customer_id' => 9, 'customer_name' => 'Aditya Pratama', 'email' => 'adityapratama@gmail.com', 'phone' => '08901234567', 'address' => 'Jl. Diponegoro No. 40, Jakarta', 'city' => 'Jakarta', 'state' => 'DKI Jakarta', 'postal_code' => '90123', 'country' => 'Indonesia'],
    ['customer_id' => 10, 'customer_name' => 'Nadia Puspita', 'email' => 'nadiapuspita@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Siliwangi No. 15, Semarang', 'city' => 'Semarang', 'state' => 'Jawa Tengah', 'postal_code' => '01234', 'country' => 'Indonesia'],
    ['customer_id' => 11, 'customer_name' => 'Siti Rahayu', 'email' => 'sitirahayu@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Surya Kencana No. 25, Bogor', 'city' => 'Bogor', 'state' => 'Jawa Barat', 'postal_code' => '12345', 'country' => 'Indonesia'],
    ['customer_id' => 12, 'customer_name' => 'Agus Wibowo', 'email' => 'aguswibowo@gmail.com', 'phone' => '08567891234', 'address' => 'Jl. Raya Barat No. 30, Malang', 'city' => 'Malang', 'state' => 'Jawa Timur', 'postal_code' => '23456', 'country' => 'Indonesia'],
    ['customer_id' => 13, 'customer_name' => 'Dewi Susanti', 'email' => 'dewisusanti@gmail.com', 'phone' => '08765432109', 'address' => 'Jl. Puri Kencana No. 10, Denpasar', 'city' => 'Denpasar', 'state' => 'Bali', 'postal_code' => '34567', 'country' => 'Indonesia'],
    ['customer_id' => 14, 'customer_name' => 'Rudi Hidayat', 'email' => 'rudihidayat@gmail.com', 'phone' => '08111222333', 'address' => 'Jl. Cendrawasih No. 8, Palembang', 'city' => 'Palembang', 'state' => 'Sumatera Selatan', 'postal_code' => '45678', 'country' => 'Indonesia'],
    ['customer_id' => 15, 'customer_name' => 'Nisa Azizah', 'email' => 'nisaazizah@gmail.com', 'phone' => '08987654321', 'address' => 'Jl. Kenanga No. 20, Makassar', 'city' => 'Makassar', 'state' => 'Sulawesi Selatan', 'postal_code' => '56789', 'country' => 'Indonesia'],
    ['customer_id' => 16, 'customer_name' => 'Ahmad Fauzi', 'email' => 'ahmadfauzi@gmail.com', 'phone' => '08234567890', 'address' => 'Jl. Merpati No. 45, Medan', 'city' => 'Medan', 'state' => 'Sumatera Utara', 'postal_code' => '67890', 'country' => 'Indonesia'],
    ['customer_id' => 17, 'customer_name' => 'Siti Nurlela', 'email' => 'sitinurlela@gmail.com', 'phone' => '08765432198', 'address' => 'Jl. Durian No. 56, Surabaya', 'city' => 'Surabaya', 'state' => 'Jawa Timur', 'postal_code' => '78901', 'country' => 'Indonesia'],
    ['customer_id' => 18, 'customer_name' => 'Rudi Hartono', 'email' => 'rudihartono@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Mangga No. 10, Jakarta', 'city' => 'Jakarta', 'state' => 'DKI Jakarta', 'postal_code' => '89012', 'country' => 'Indonesia'],
    ['customer_id' => 19, 'customer_name' => 'Siti Rahmawati', 'email' => 'sitirahmawati@gmail.com', 'phone' => '08901234567', 'address' => 'Jl. Nangka No. 15, Bandung', 'city' => 'Bandung', 'state' => 'Jawa Barat', 'postal_code' => '90123', 'country' => 'Indonesia'],
    ['customer_id' => 20, 'customer_name' => 'Agus Setiawan', 'email' => 'agussetiawan@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Anggrek No. 20, Semarang', 'city' => 'Semarang', 'state' => 'Jawa Tengah', 'postal_code' => '01234', 'country' => 'Indonesia'],
    ['customer_id' => 21, 'customer_name' => 'Rini Sari', 'email' => 'rinisari@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Mawar No. 30, Bandung', 'city' => 'Bandung', 'state' => 'Jawa Barat', 'postal_code' => '34567', 'country' => 'Indonesia'],
    ['customer_id' => 22, 'customer_name' => 'Budi Setiawan', 'email' => 'budisetiawan@gmail.com', 'phone' => '08567891234', 'address' => 'Jl. Manggis No. 15, Surabaya', 'city' => 'Surabaya', 'state' => 'Jawa Timur', 'postal_code' => '45678', 'country' => 'Indonesia'],
    ['customer_id' => 23, 'customer_name' => 'Sinta Dewi', 'email' => 'sintadewi@gmail.com', 'phone' => '08765432109', 'address' => 'Jl. Anggrek No. 20, Malang', 'city' => 'Malang', 'state' => 'Jawa Timur', 'postal_code' => '56789', 'country' => 'Indonesia'],
    ['customer_id' => 24, 'customer_name' => 'Agus Sutanto', 'email' => 'agussutanto@gmail.com', 'phone' => '08111222333', 'address' => 'Jl. Pala No. 25, Jakarta', 'city' => 'Jakarta', 'state' => 'DKI Jakarta', 'postal_code' => '67890', 'country' => 'Indonesia'],
    ['customer_id' => 25, 'customer_name' => 'Rita Setiawan', 'email' => 'ritasetiawan@gmail.com', 'phone' => '08234567890', 'address' => 'Jl. Nanas No. 30, Bandung', 'city' => 'Bandung', 'state' => 'Jawa Barat', 'postal_code' => '78901', 'country' => 'Indonesia'],
    ['customer_id' => 26, 'customer_name' => 'Bambang Suryadi', 'email' => 'bambangsuryadi@gmail.com', 'phone' => '08765432198', 'address' => 'Jl. Pisang No. 35, Semarang', 'city' => 'Semarang', 'state' => 'Jawa Tengah', 'postal_code' => '89012', 'country' => 'Indonesia'],
    ['customer_id' => 27, 'customer_name' => 'Dewi Setyawati', 'email' => 'dewisetyawati@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Apel No. 40, Palembang', 'city' => 'Palembang', 'state' => 'Sumatera Selatan', 'postal_code' => '90123', 'country' => 'Indonesia'],
    ['customer_id' => 28, 'customer_name' => 'Surya Wijaya', 'email' => 'suryawijaya@gmail.com', 'phone' => '08901234567', 'address' => 'Jl. Mangga No. 45, Jakarta', 'city' => 'Jakarta', 'state' => 'DKI Jakarta', 'postal_code' => '01234', 'country' => 'Indonesia'],
    ['customer_id' => 29, 'customer_name' => 'Ani Pratiwi', 'email' => 'anipratiwi@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Sawo No. 50, Surabaya', 'city' => 'Surabaya', 'state' => 'Jawa Timur', 'postal_code' => '12345', 'country' => 'Indonesia'],
    ['customer_id' => 30, 'customer_name' => 'Dodi Santoso', 'email' => 'dodisantoso@gmail.com', 'phone' => '08567891234', 'address' => 'Jl. Jambu No. 55, Bandung', 'city' => 'Bandung', 'state' => 'Jawa Barat', 'postal_code' => '23456', 'country' => 'Indonesia'],

];

// Query untuk memasukkan data ke dalam tabel
$query = "INSERT INTO customers (customer_id, customer_name, email, phone, address, city, state, postal_code, country) VALUES ";

// Loop melalui setiap data customer
foreach ($customers_data as $customer) {
    // Tambahkan nilai-nilai ke dalam query
    $query .= "('{$customer['customer_id']}', '{$customer['customer_name']}', '{$customer['email']}', '{$customer['phone']}', '{$customer['address']}', '{$customer['city']}', '{$customer['state']}', '{$customer['postal_code']}', '{$customer['country']}'),";
}

// Hilangkan koma ekstra di akhir query
$query = rtrim($query, ',');

// Eksekusi query
if ($conn->query($query) === TRUE) {
    echo "Data berhasil dimasukkan ke dalam tabel customers.";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();

?>