<?php
include "koneksi.php";
$id = (int)$_GET['id'];

$stmt = $conn->prepare("DELETE FROM nilai WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  echo "<center><div style='margin-top:50px; background:white; padding:20px; border-radius:10px; width:400px; box-shadow:0 0 10px rgba(0,0,0,0.1);'>
        <p style='color:green;'>✅ Data nilai berhasil dihapus.</p>
        <a href='nilaiindex.php' style='text-decoration:none; color:#d4af37;'>Kembali</a></div></center>";
} else {
  echo "<center><div style='margin-top:50px; background:white; padding:20px; border-radius:10px; width:400px; box-shadow:0 0 10px rgba(0,0,0,0.1);'>
        <p style='color:red;'>❌ Gagal menghapus data: " . htmlspecialchars($stmt->error) . "</p>
        <a href='nilaiindex.php' style='text-decoration:none; color:#d4af37;'>Kembali</a></div></center>";
}

$stmt->close();
?>
