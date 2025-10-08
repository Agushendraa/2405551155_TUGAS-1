<?php
include "koneksi.php";

$m = isset($_GET['m']) ? (int)$_GET['m'] : 0;

// Ambil data mahasiswa
$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id=?");
$stmt->bind_param("i", $m);
$stmt->execute();
$mhs = $stmt->get_result()->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mata_kuliah = $_POST['mata_kuliah'];
    $sks = $_POST['sks'];
    $nilai_angka = $_POST['nilai_angka'];

    // Menentukan nilai huruf otomatis
    if ($nilai_angka >= 85) {
        $nilai_huruf = "A";
    } elseif ($nilai_angka >= 78) {
        $nilai_huruf = "B";
    } elseif ($nilai_angka >= 70) {
        $nilai_huruf = "C";
    } elseif ($nilai_angka >= 60) {
        $nilai_huruf = "D";
    } else {
        $nilai_huruf = "E";
    }

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO nilai (id_mahasiswa, mata_kuliah, sks, nilai_huruf, nilai_angka) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isisd", $m, $mata_kuliah, $sks, $nilai_huruf, $nilai_angka);

    if ($stmt->execute()) {
        header("Location: nilaiindex.php?m=" . $m);
        exit();
    } else {
        echo "Gagal menambahkan nilai: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Nilai Mahasiswa</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f5f8;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 50%;
      margin: 60px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      border-bottom: 3px solid gold;
      padding-bottom: 8px;
      color: #2b2b2b;
    }
    label {
      display: block;
      margin-top: 15px;
      font-weight: 600;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 14px;
    }
    .btn {
      display: inline-block;
      padding: 10px 18px;
      margin-top: 20px;
      border: none;
      border-radius: 6px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.2s;
    }
    .btn-save {
      background: gold;
      color: black;
    }
    .btn-save:hover {
      background: #d4b200;
    }
    .btn-back {
      background: #777;
      color: white;
      text-decoration: none;
      padding: 10px 18px;
      border-radius: 6px;
      margin-left: 10px;
    }
    .btn-back:hover {
      background: #555;
    }
    .info {
      background: #fafafa;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 15px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Tambah Nilai Mahasiswa</h2>

  <?php if (!$mhs): ?>
    <p style="color:red; text-align:center;">Mahasiswa tidak ditemukan.</p>
    <a href="index.php" class="btn-back">← Kembali</a>
  <?php else: ?>
    <div class="info">
      <p><strong>Nama:</strong> <?= htmlspecialchars($mhs['nama']) ?></p>
      <p><strong>NIM:</strong> <?= htmlspecialchars($mhs['nim']) ?></p>
      <p><strong>Program Studi:</strong> <?= htmlspecialchars($mhs['prodi']) ?></p>
    </div>

    <form method="POST">
      <label for="mata_kuliah">Mata Kuliah</label>
      <select name="mata_kuliah" id="mata_kuliah" required>
        <option value="">-- Pilih Mata Kuliah --</option>
        <option value="Pangkalan Data">Pangkalan Data</option>
        <option value="Algoritma Pemrograman">Algoritma Pemrograman</option>
        <option value="Manajemen Stress">Manajemen Stress</option>
        <option value="Inovasi Teknologi">Inovasi Teknologi</option>
        <option value="Kecerdasan Tiruan">Kecerdasan Tiruan</option>
      </select>

      <label for="sks">SKS</label>
      <input type="number" name="sks" id="sks" min="1" max="6" required>

      <label for="nilai_angka">Nilai Angka</label>
      <input type="number" step="0.01" name="nilai_angka" id="nilai_angka" min="0" max="100" required>

      <button type="submit" class="btn btn-save">Simpan Nilai</button>
      <a href="nilaiindex.php?m=<?= $m ?>" class="btn-back">← Kembali</a>
    </form>
  <?php endif; ?>
</div>

</body>
</html>
