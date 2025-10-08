<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Mahasiswa</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5;">

  <center>
  <div style="margin-top: 40px; width: 90%; max-width: 600px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 25px;">

    <h3 style="text-align:center; margin-bottom: 20px;">Tambah Mahasiswa</h3>

    <form method="post" onsubmit="return validasi()" style="text-align:left;">
      <table cellpadding="8" cellspacing="0" style="margin: 0 auto;">
        <tr>
          <td>NIM</td>
          <td><input type="text" id="nim" name="nim" style="width:250px; padding:6px;"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" id="nama" name="nama" style="width:250px; padding:6px;"></td>
        </tr>
        <tr>
          <td>Prodi</td>
          <td><input type="text" id="prodi" name="prodi" style="width:250px; padding:6px;"></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <br>
            <input type="submit" name="simpan" value="Simpan" 
              style="background-color:#d4af37;color:white;border:none;padding:8px 20px;border-radius:6px;cursor:pointer;">
          </td>
        </tr>
      </table>
    </form>

    <p id="pesan" style="color:red; font-weight:bold; text-align:center;"></p>

<?php
if (isset($_POST['simpan'])) {
    $nim   = trim($_POST['nim']);
    $nama  = trim($_POST['nama']);
    $prodi = trim($_POST['prodi']);

    if ($nim == "" || $nama == "" || $prodi == "") {
        echo "<p style='color:red; text-align:center;'>❌ Semua kolom wajib diisi!</p>";
    } elseif (strlen($nim) < 5) {
        echo "<p style='color:red; text-align:center;'>❌ NIM minimal 5 karakter!</p>";
    } else {
        $stmt = $conn->prepare("INSERT INTO mahasiswa (nim, nama, prodi) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nim, $nama, $prodi);
        if ($stmt->execute()) {
            echo "<p style='color:green; text-align:center;'>✅ Data berhasil disimpan.</p>";
            echo "<center><a href='index.php' style='text-decoration:none; color:#d4af37;'>Kembali ke Daftar Mahasiswa</a></center>";
        } else {
            echo "<p style='color:red; text-align:center;'>Gagal menyimpan data: " . htmlspecialchars($stmt->error) . "</p>";
        }
        $stmt->close();
    }
}
?>
  </div>
  </center>

<script>
function validasi() {
  let nim   = document.querySelector("#nim").value.trim();
  let nama  = document.querySelector("#nama").value.trim();
  let prodi = document.querySelector("#prodi").value.trim();
  let pesan = document.querySelector("#pesan");

  if (nim === "" || nama === "" || prodi === "") {
    pesan.textContent = "❌ Semua kolom wajib diisi!";
    return false;
  }
  if (nim.length < 5) {
    pesan.textContent = "❌ NIM minimal 5 karakter!";
    return false;
  }
  pesan.textContent = "";
  return true;
}
</script>

</body>
</html>
