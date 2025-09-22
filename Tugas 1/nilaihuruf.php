<!-- nilai.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cek Nilai Huruf</title>
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
      background: #2196F3;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
    }
    input[type="submit"]:hover {
      background: #1976D2;
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
  <h2>Cek Nilai Huruf</h2>
  <form method="post">
    <input type="number" name="nilai" min="0" max="100" placeholder="Masukkan nilai (0-100)">
    <br>
    <input type="submit" value="Cek">
  </form>

  <?php
  if (isset($_POST['nilai']) && $_POST['nilai'] !== "") {
      $n = $_POST['nilai'];
      $grade = "";

      if ($n >= 85) {
          $grade = "A";
      } elseif ($n >= 70) {
          $grade = "B";
      } elseif ($n >= 55) {
          $grade = "C";
      } elseif ($n >= 40) {
          $grade = "D";
      } else {
          $grade = "E";
      }

      echo "<div class='result'>Nilai Anda: $n <br> Grade: <b>$grade</b></div>";
  }
  ?>
</div>

</body>
</html>
