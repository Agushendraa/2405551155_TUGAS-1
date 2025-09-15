<!-- menu.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Menu Makanan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f3f6fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      background: white;
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      width: 400px;
      text-align: center;
    }
    h2 {
      color: #333;
      margin-bottom: 20px;
    }
    select {
      padding: 8px;
      width: 85%;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }
    input[type="submit"] {
      background: #FF9800;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
    }
    input[type="submit"]:hover {
      background: #F57C00;
    }
    .result {
      margin-top: 20px;
      background: #fff3e0;
      padding: 10px;
      border-radius: 8px;
      font-weight: bold;
      color: #222;
    }
  </style>
</head>
<body>

<div class="card">
  <h2>Pilih Menu Makanan</h2>
  <form method="post">
    <select name="menu">
      <option value="">-- Pilih Menu --</option>
      <option value="nasi">Nasi Goreng</option>
      <option value="soto">Soto</option>
      <option value="mie">Mie Ayam</option>
    </select>
    <br>
    <input type="submit" value="Pesan">
  </form>

  <?php
  if (isset($_POST['menu']) && $_POST['menu'] !== "") {
      $menu = $_POST['menu'];
      $harga = "";

      switch ($menu) {
          case "nasi": $harga = "Rp15.000"; $nama = "Nasi Goreng"; break;
          case "soto": $harga = "Rp12.000"; $nama = "Soto"; break;
          case "mie":  $harga = "Rp10.000"; $nama = "Mie Ayam"; break;
          default: $harga = "Menu tidak tersedia"; $nama = "";
      }

      if ($nama !== "") {
          echo "<div class='result'>Anda memilih <b>$nama</b><br> Harga: <b>$harga</b></div>";
      } else {
          echo "<div class='result'>$harga</div>";
      }
  }
  ?>
</div>

</body>
</html>
