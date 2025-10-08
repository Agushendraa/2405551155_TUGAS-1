<?php include "koneksi.php"; ?>
<?php
$id = (int)$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM nilai WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Nilai Mahasiswa</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5;">
  <center>
  <div style="margin-top: 40px; width: 90%; max-width: 600px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 25px;">
    <h3 style="text-align:center; margin-bottom:20px;">Edit Nilai Mahasiswa</h3>

    <form method="post" onsubmit="return validasi()" style="text-align:left;">
      <table cellpadding="8" cellspacing="0" style="margin: 0 auto;">
        <tr><td>Mata Kuliah</td><td><input type="text" id="mk" name="mata_kuliah" value="<?= htmlspecialchars($data['mata_kuliah']) ?>" style="width:250px; padding:6px;"></td></tr>
        <tr><td>SKS</td><td><input type="number" id="sks" name="sks" value="<?= htmlspecialchars($data['sks']) ?>" style="width:250px; padding:6px;"></td></tr>
        <tr><td>Nilai Huruf</td>
          <td>
            <select id="nh" name="nilai_huruf" style="width:250px; padding:6px;">
              <option <?= $data['nilai_huruf']=='A'?'selected':'' ?>>A</option>
              <option <?= $data['nilai_huruf']=='B'?'selected':'' ?>>B</option>
              <option <?= $data['nilai_huruf']=='C'?'selected':'' ?>>C</option>
              <option <?= $data['nilai_huruf']=='D'?'selected':'' ?>>D</option>
              <option <?= $data['nilai_huruf']=='E'?'selected':'' ?>>E</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <br>
            <input type="submit" name="update" value="Update" style="background-color:#d4af37;color:white;border:none;padding:8px 20px;border-radius:6px;cursor:pointer;">
          </td>
        </tr>
      </table>
    </form>
    <p id="pesan" style="color:red; text-align:center;"></p>

<?php
if (isset($_POST['update'])) {
  $mk = trim($_POST['mata_kuliah']);
  $sks = (int)$_POST['sks'];
  $nh = trim($_POST['nilai_huruf']);
  $map = ['A'=>4.00, 'B'=>3.00, 'C'=>2.00, 'D'=>1.00, 'E'=>0.00];
  $na = $map[$nh] ?? 0.00;

  $stmt = $conn->prepare("UPDATE nilai SET mata_kuliah=?, sks=?, nilai_huruf=?, nilai_angka=? WHERE id=?");
  $stmt->bind_param("sdsdi", $mk, $sks, $nh, $na, $id);
  if ($stmt->execute()) {
    echo "<p style='color:green; text-align:center;'>✅ Nilai berhasil diperbarui!</p>";
    echo "<center><a href='nilaiindex.php' style='text-decoration:none; color:#d4af37;'>Kembali</a></center>";
  } else {
    echo "<p style='color:red; text-align:center;'>Error: " . htmlspecialchars($stmt->error) . "</p>";
  }
  $stmt->close();
}
?>
  </div>
  </center>

<script>
function validasi(){
  const mk = document.querySelector("#mk").value.trim();
  const sks = document.querySelector("#sks").value.trim();
  const nh = document.querySelector("#nh").value.trim();
  const pesan = document.querySelector("#pesan");
  if (!mk || !sks || !nh) {
    pesan.textContent = "Semua kolom wajib diisi!";
    return false;
  }
  return true;
}
</script>

</body>
</html>
