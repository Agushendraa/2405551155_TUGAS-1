<!-- ganjilgenap.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cek Ganjil Genap</title>
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
    input[type="number"] {
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
  <h2>Cek Bilangan Ganjil atau Genap</h2>
  <form method="post">
    <input type="number" name="angka" placeholder="Masukkan angka"><br>
    <input type="submit" value="Cek">
  </form>

  <?php
  if (isset($_POST['angka']) && $_POST['angka'] !== "") {
      $angka = $_POST['angka'];
      if ($angka % 2 == 0) {
          $hasil = "$angka adalah <b>Genap</b>";
      } else {
          $hasil = "$angka adalah <b>Ganjil</b>";
      }
      echo "<div class='result'>$hasil</div>";
  }
  ?>
</div>

</body>
</html>
