<!-- kalkulator.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kalkulator Sederhana</title>
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
    input[type="number"], select {
      padding: 8px;
      width: 80%;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }
    input[type="submit"] {
      background: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
    }
    input[type="submit"]:hover {
      background: #388E3C;
    }
    .result {
      margin-top: 20px;
      background: #e9f5ff;
      padding: 10px;
      border-radius: 8px;
      font-weight: bold;
      color: #222;
    }
  </style>
</head>
<body>

<div class="card">
  <h2>Kalkulator Sederhana</h2>
  <form method="post">
    <input type="number" name="angka1" placeholder="Masukkan angka pertama"><br>
    <input type="number" name="angka2" placeholder="Masukkan angka kedua"><br>
    <select name="operator">
      <option value="tambah">+</option>
      <option value="kurang">-</option>
      <option value="kali">×</option>
      <option value="bagi">÷</option>
    </select><br>
    <input type="submit" value="Hitung">
  </form>

  <?php
  if (isset($_POST['angka1']) && isset($_POST['angka2']) && $_POST['angka1'] !== "" && $_POST['angka2'] !== "") {
      $a = $_POST['angka1'];
      $b = $_POST['angka2'];
      $op = $_POST['operator'];
      $hasil = "";

      switch ($op) {
          case "tambah": $hasil = $a + $b; $simbol = "+"; break;
          case "kurang": $hasil = $a - $b; $simbol = "-"; break;
          case "kali":   $hasil = $a * $b; $simbol = "×"; break;
          case "bagi":   
              if ($b == 0) {
                  $hasil = "Tidak bisa dibagi 0";
                  $simbol = "÷";
              } else {
                  $hasil = $a / $b; 
                  $simbol = "÷";
              }
              break;
          default: $hasil = "Operator tidak valid"; $simbol = "";
      }

      echo "<div class='result'>Hasil: $a $simbol $b = <b>$hasil</b></div>";
  }
  ?>
</div>

</body>
</html>
