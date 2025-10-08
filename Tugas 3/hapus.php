<?php
include "koneksi.php";

// Pastikan parameter id ada di URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<center><div style='margin-top:50px; background:white; padding:20px; border-radius:10px; width:400px; box-shadow:0 0 10px rgba(0,0,0,0.1);'>
          <p style='color:red;'>⚠️ ID tidak ditemukan atau tidak valid.</p>
          <a href='index.php' style='text-decoration:none; color:#d4af37;'>Kembali</a></div></center>";
    exit;
}

$id = (int) $_GET['id'];

// Gunakan prepared statement untuk keamanan
$stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<center><div style='margin-top:50px; background:white; padding:20px; border-radius:10px; width:400px; box-shadow:0 0 10px rgba(0,0,0,0.1);'>
          <p style='color:green;'>✅ Data berhasil dihapus.</p>
          <a href='index.php' style='text-decoration:none; color:#d4af37;'>Kembali</a></div></center>";
} else {
    echo "<center><div style='margin-top:50px; background:white; padding:20px; border-radius:10px; width:400px; box-shadow:0 0 10px rgba(0,0,0,0.1);'>
          <p style='color:red;'>❌ Gagal menghapus data: " . htmlspecialchars($stmt->error) . "</p>
          <a href='index.php' style='text-decoration:none; color:#d4af37;'>Kembali</a></div></center>";
}

$stmt->close();
?>
