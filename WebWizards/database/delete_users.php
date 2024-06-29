<?php
include 'config.php';

// Query untuk menghapus semua data di tabel users
$sql = "DELETE FROM users";
if ($conn->query($sql) === TRUE) {
    echo "All users deleted successfully\n";
} else {
    echo "Error deleting users: " . $conn->error . "\n";
}

// Close connection
$conn->close();
?>