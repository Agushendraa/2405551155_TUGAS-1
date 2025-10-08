<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "koneksi.php";

// Ambil ID mahasiswa dari URL
$m = isset($_GET['m']) ? (int)$_GET['m'] : 0;

// Ambil data mahasiswa
$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE id=?");
$stmt->bind_param("i", $m);
$stmt->execute();
$mhs = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Nilai Mahasiswa</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f5f8;
      margin: 0;
      padding: 0;
    }
    .container {
      width: 80%;
      margin: 50px auto;
      background: white;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
      color: #2b2b2b;
      border-bottom: 3px solid gold;
      padding-bottom: 8px;
      font-size: 24px;
    }
    .info {
      background: #fafafa;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 15px;
      margin-bottom: 20px;
    }
    .info p {
      margin: 5px 0;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }
    th {
      background: gold;
      color: black;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    .actions {
      margin-top: 15px;
      text-align: right;
    }
    .btn {
      text-decoration: none;
      padding: 8px 14px;
      border-radius: 6px;
      font-weight: 600;
      transition: 0.2s;
      margin-left: 5px;
      display: inline-block;
    }
    .btn-add {
      background: gold;
      color: #000;
    }
    .btn-add:hover {
      background: #d1b200;
    }
    .btn-back {
      background: #777;
      color: white;
    }
    .btn-back:hover {
      background: #555;
    }
    .btn-edit {
      background: royalblue;
      color: white;
    }
    .btn-edit:hover {
      background: dodgerblue;
    }
    .btn-delete {
      background: crimson;
      color: white;
    }
    .btn-delete:hover {
      background: darkred;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Nilai Mahasiswa</h2>

  <?php if (!$mhs): ?>
    <p style="color:red; text-align:center;">Mahasiswa tidak ditemukan.</p>
    <div class="actions">
      <a href="index.php" class="btn btn-back">← Kembali</a>
    </div>
  <?php else: ?>
    <div class="info">
      <p><strong>Nama:</strong> <?= htmlspecialchars($mhs['nama']) ?></p>
      <p><strong>NIM:</strong> <?= htmlspecialchars($mhs['nim']) ?></p>
      <p><strong>Program Studi:</strong> <?= htmlspecialchars($mhs['prodi']) ?></p>
    </div>

    <div class="actions">
      <a href="nilaitambah.php?m=<?= $m ?>" class="btn btn-add">+ Tambah Nilai</a>
      <a href="index.php" class="btn btn-back">← Kembali</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Mata Kuliah</th>
          <th>SKS</th>
          <th>Nilai Huruf</th>
          <th>Nilai Angka</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM nilai WHERE id_mahasiswa=? ORDER BY id ASC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $m);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0):
          $no = 1;
          while ($row = $result->fetch_assoc()):
        ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= htmlspecialchars($row['mata_kuliah']) ?></td>
              <td><?= htmlspecialchars($row['sks']) ?></td>
              <td><?= htmlspecialchars($row['nilai_huruf']) ?></td>
              <td><?= htmlspecialchars($row['nilai_angka']) ?></td>
              <td>
                <a href="nilaiedit.php?id=<?= $row['id'] ?>&m=<?= $m ?>" class="btn btn-edit">Edit</a>
                <a href="nilaihapus.php?id=<?= $row['id'] ?>&m=<?= $m ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus nilai ini?')">Hapus</a>
              </td>
            </tr>
        <?php
          endwhile;
        else:
          echo "<tr><td colspan='6'>Belum ada data nilai.</td></tr>";
        endif;
        $stmt->close();
        ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

</body>
</html>
 