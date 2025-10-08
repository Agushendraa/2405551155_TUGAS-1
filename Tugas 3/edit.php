<?php include "koneksi.php"; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Mahasiswa</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5;">

  <center>
  <div style="margin-top: 40px; width: 90%; max-width: 600px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 25px;">
    <h3 style="text-align: center; margin-bottom: 20px;">Edit Data Mahasiswa</h3>

    <form method="post">
      <table cellpadding="8" cellspacing="0" style="margin: 0 auto;">
        <tr>
          <td>NIM</td>
          <td><input type="text" name="nim" value="<?= $data['nim'] ?>" style="width:250px; padding:6px;"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama" value="<?= $data['nama'] ?>" style="width:250px; padding:6px;"></td>
        </tr>
        <tr>
          <td>Prodi</td>
          <td><input type="text" name="prodi" value="<?= $data['prodi'] ?>" style="width:250px; padding:6px;"></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <br>
            <input type="submit" name="update" value="Update"
              style="background-color:#d4af37;color:white;border:none;padding:8px 20px;border-radius:6px;cursor:pointer;">
          </td>
        </tr>
      </table>
    </form>

<?php
if (isset($_POST['update'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green; text-align:center;'>✅ Data berhasil diperbarui.</p>";
        echo "<center><a href='index.php' style='text-decoration:none; color:#d4af37;'>Kembali ke Daftar</a></center>";
    } else {
        echo "<p style='color:red; text-align:center;'>Error: " . $conn->error . "</p>";
    }
}
?>
  </div>
  </center>

</body>
</html>
