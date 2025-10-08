<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Mahasiswa</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5;">

  <center>
  <div style="margin-top: 40px; width: 90%; max-width: 1000px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 25px;">

    <h2 style="text-align:center; margin-bottom: 20px;">Daftar Mahasiswa</h2>

    <!-- Tombol Tambah Mahasiswa -->
    <div style="margin-bottom: 20px;">
      <a href="tambah.php" style="background-color: #d4af37; color: white; padding: 8px 16px; text-decoration: none; border-radius: 6px;">Tambah Mahasiswa</a>
    </div>

    <!-- Input pencarian -->
    <input type="text" id="keyword" placeholder="Cari mahasiswa berdasarkan nama atau NIM..." 
           style="width: 60%; padding: 8px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 20px; text-align:center;">
    <br>

    <!-- Tabel data mahasiswa -->
    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; background-color: white;">
      <thead style="background-color: #d4af37; color: white;">
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Prodi</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="hasil">
        <?php
        $result = $conn->query("SELECT * FROM mahasiswa ORDER BY id ASC");
        $no = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr align='center'>
                    <td>{$no}</td>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['prodi']}</td>
                    <td>
                      <a href='edit.php?id={$row['id']}' style='background-color:#007bff;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;'>Edit</a>
                      <a href='hapus.php?id={$row['id']}' style='background-color:#dc3545;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
                      <a href='nilaitambah.php?m={$row['id']}' style='background-color:#d4af37;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;'>Tambah Nilai</a>
                      <a href='nilaiindex.php?m={$row['id']}' style='background-color:#6c757d;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;'>Lihat Nilai</a>
                    </td>
                  </tr>";
            $no++;
          }
        } else {
          echo "<tr><td colspan='5' align='center'>Belum ada data mahasiswa.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  </center>

  <script>
    const inputCari = document.querySelector("#keyword");
    const tabelHasil = document.querySelector("#hasil");

    inputCari.oninput = function() {
      const key = this.value.trim();

      fetch("cari.php?keyword=" + encodeURIComponent(key))
        .then(res => res.json())
        .then(data => {
          let isi = "";
          if (data.length > 0) {
            let nomor = 1;
            data.forEach(m => {
              isi += `
                <tr align='center'>
                  <td>${nomor}</td>
                  <td>${m.nim}</td>
                  <td>${m.nama}</td>
                  <td>${m.prodi}</td>
                  <td>
                    <a href='edit.php?id=${m.id}' style='background-color:#007bff;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;'>Edit</a>
                    <a href='hapus.php?id=${m.id}' style='background-color:#dc3545;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;' onclick="return confirm('Hapus data ini?')">Hapus</a>
                    <a href='nilaitambah.php?m=${m.id}' style='background-color:#d4af37;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;'>Tambah Nilai</a>
                    <a href='nilaiindex.php?m=${m.id}' style='background-color:#6c757d;color:white;padding:5px 10px;border-radius:5px;text-decoration:none;'>Lihat Nilai</a>
                  </td>
                </tr>`;
              nomor++;
            });
          } else {
            isi = "<tr><td colspan='5' align='center'>Tidak ada hasil ditemukan</td></tr>";
          }
          tabelHasil.innerHTML = isi;
        })
        .catch(err => console.error("Error:", err));
    };
  </script>

</body>
</html>
