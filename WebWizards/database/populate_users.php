<?php
include 'config.php';

// Pilih database
$conn->select_db($dbname);

// Data contoh untuk tabel users
$users = [
    // Admins
    ['username' => 'agus_susanto', 'password' => password_hash('admin123', PASSWORD_BCRYPT), 'email' => 'agus.susanto@gmail.com', 'role' => 'admin'],
    ['username' => 'budi_prasetyo', 'password' => password_hash('admin123', PASSWORD_BCRYPT), 'email' => 'budi.prasetyo@gmail.com', 'role' => 'admin'],
    ['username' => 'cahya_ramadhani', 'password' => password_hash('admin123', PASSWORD_BCRYPT), 'email' => 'cahya.ramadhani@gmail.com', 'role' => 'admin'],
    ['username' => 'dedi_setiawan', 'password' => password_hash('admin123', PASSWORD_BCRYPT), 'email' => 'dedi.setiawan@gmail.com', 'role' => 'admin'],

    // Owners
    ['username' => 'eko_haryanto', 'password' => password_hash('owner123', PASSWORD_BCRYPT), 'email' => 'eko.haryanto@gmail.com', 'role' => 'owner'],
    ['username' => 'fajar_saputra', 'password' => password_hash('owner123', PASSWORD_BCRYPT), 'email' => 'fajar.saputra@gmail.com', 'role' => 'owner'],
    ['username' => 'gita_rahmawati', 'password' => password_hash('owner123', PASSWORD_BCRYPT), 'email' => 'gita.rahmawati@gmail.com', 'role' => 'owner'],

    // Customers
    ['username' => 'haniyah_mustofa', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'haniyah.mustofa@gmail.com', 'role' => 'customer'],
    ['username' => 'ikhwan_hakim', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'ikhwan.hakim@gmail.com', 'role' => 'customer'],
    ['username' => 'joko_santoso', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'joko.santoso@gmail.com', 'role' => 'customer'],
    ['username' => 'kiki_wibowo', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'kiki.wibowo@gmail.com', 'role' => 'customer'],
    ['username' => 'lina_kartini', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'lina.kartini@gmail.com', 'role' => 'customer'],
    ['username' => 'murni_hamdani', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'murni.hamdani@gmail.com', 'role' => 'customer'],
    ['username' => 'nanda_pratama', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'nanda.pratama@gmail.com', 'role' => 'customer'],
    ['username' => 'oki_suryana', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'oki.suryana@gmail.com', 'role' => 'customer'],
    ['username' => 'putri_fatimah', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'putri.fatimah@gmail.com', 'role' => 'customer'],
    ['username' => 'qori_ahmad', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'qori.ahmad@gmail.com', 'role' => 'customer'],
    ['username' => 'rudi_hartono', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'rudi.hartono@gmail.com', 'role' => 'customer'],
    ['username' => 'siti_maryani', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'siti.maryani@gmail.com', 'role' => 'customer'],
    ['username' => 'toni_kusuma', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'toni.kusuma@gmail.com', 'role' => 'customer'],
    ['username' => 'udin_syafrudin', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'udin.syafrudin@gmail.com', 'role' => 'customer'],
    ['username' => 'vicky_saputra', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'vicky.saputra@gmail.com', 'role' => 'customer'],
    ['username' => 'wira_kusnadi', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'wira.kusnadi@gmail.com', 'role' => 'customer'],
    ['username' => 'xena_anggraeni', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'xena.anggraeni@gmail.com', 'role' => 'customer'],
    ['username' => 'yudi_pratomo', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'yudi.pratomo@gmail.com', 'role' => 'customer'],
    ['username' => 'zahra_maulina', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'zahra.maulina@gmail.com', 'role' => 'customer'],
    ['username' => 'abdi_suryadi', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'abdi.suryadi@gmail.com', 'role' => 'customer'],
    ['username' => 'bayu_setiawan', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'bayu.setiawan@gmail.com', 'role' => 'customer'],
    ['username' => 'cici_firmansyah', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'cici.firmansyah@gmail.com', 'role' => 'customer'],
    ['username' => 'dian_ramadhani', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'dian.ramadhani@gmail.com', 'role' => 'customer'],
    ['username' => 'esa_wibisono', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'esa.wibisono@gmail.com', 'role' => 'customer'],
    ['username' => 'fika_nuraini', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'fika.nuraini@gmail.com', 'role' => 'customer'],
    ['username' => 'gilang_prayoga', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'gilang.prayoga@gmail.com', 'role' => 'customer'],
    ['username' => 'hendra_setiawan', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'hendra.setiawan@gmail.com', 'role' => 'customer'],
    ['username' => 'isna_sulistyo', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'isna.sulistyo@gmail.com', 'role' => 'customer'],
    ['username' => 'juni_kurniawan', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'juni.kurniawan@gmail.com', 'role' => 'customer'],
    ['username' => 'kiki_sari', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'kiki.sari@gmail.com', 'role' => 'customer'],
    ['username' => 'lia_maryati', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'lia.maryati@gmail.com', 'role' => 'customer'],
    ['username' => 'mahfud_hadi', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'mahfud.hadi@gmail.com', 'role' => 'customer'],
    ['username' => 'nina_kurnia', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'nina.kurnia@gmail.com', 'role' => 'customer'],
    ['username' => 'oki_yanto', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'oki.yanto@gmail.com', 'role' => 'customer'],
    ['username' => 'putu_andri', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'putu.andri@gmail.com', 'role' => 'customer'],
    ['username' => 'rina_utama', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'rina.utama@gmail.com', 'role' => 'customer'],
    ['username' => 'tuti_sari', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'tuti.sari@gmail.com', 'role' => 'customer'],
    ['username' => 'usman_purwanto', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'usman.purwanto@gmail.com', 'role' => 'customer'],
    ['username' => 'winda_agustin', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'winda.agustin@gmail.com', 'role' => 'customer'],
    ['username' => 'xenia_anggraeni', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'xenia.anggraeni@gmail.com', 'role' => 'customer'],
    ['username' => 'yulia_widodo', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'yulia.widodo@gmail.com', 'role' => 'customer'],
    ['username' => 'zaki_firdaus', 'password' => password_hash('customer123', PASSWORD_BCRYPT), 'email' => 'zaki.firdaus@gmail.com', 'role' => 'customer']
];

// Menambahkan data ke tabel users
foreach ($users as $user) {
    $sql = "INSERT INTO users (username, password, email, role) VALUES ('{$user['username']}', '{$user['password']}', '{$user['email']}', '{$user['role']}')";
    if ($conn->query($sql) === TRUE) {
        echo "User '{$user['username']}' created successfully\n";
    } else {
        echo "Error creating user '{$user['username']}': " . $conn->error . "\n";
    }
}

// Menutup koneksi
$conn->close();
?>
