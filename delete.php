<?php
include "service/db.php"; // Menggantikan dengan file koneksi database yang sesuai

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query delete
    $sql = "DELETE FROM tb_tiket WHERE id = $id";

    if ($db->query($sql) === TRUE) {
        header('Location: daftar-pesanan.php');
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $db->close();
} else {
    echo "ID tidak ditemukan.";
}
?>