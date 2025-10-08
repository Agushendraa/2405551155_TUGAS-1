<?php
include "koneksi.php";

$result = $conn->query("SELECT * FROM mahasiswa");
if (!$result) {
  die("Query gagal: " . $conn->error);
}

while ($row = $result->fetch_assoc()) {
  echo $row['nama'] . " - " . $row['prodi'] . "<br>";
}
?>
