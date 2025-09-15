<!-- biodata.php -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Biodata Mahasiswa</title>
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
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    .label {
      font-weight: bold;
      color: #555;
    }
    .value {
      color: #222;
    }
    .row {
      margin-bottom: 10px;
    }
    .highlight {
      background: #e9f5ff;
      padding: 5px 10px;
      border-radius: 8px;
      display: inline-block;
    }
  </style>
</head>
<body>

<div class="card">
  <h2>Biodata Mahasiswa</h2>
  <?php
    // Data biodata
    $nama     = "I Made Agus Hendra Diwangga";
    $nim      = "2405551155";
    $kelas    = "Program Internet B";
    $jk       = "Laki-laki";
    $kampus   = "Universitas Udayana";
    $fakultas = "Fakultas Teknik";
    $prodi    = "Teknologi Informasi";

    echo "<div class='row'><span class='label'>Nama:</span> <span class='value'>$nama</span></div>";
    echo "<div class='row'><span class='label'>NIM:</span> <span class='value'>$nim</span></div>";
    echo "<div class='row'><span class='label'>Kelas:</span> <span class='value'>$kelas</span></div>";
    echo "<div class='row'><span class='label'>Jenis Kelamin:</span> <span class='value'>$jk</span></div>";
    echo "<div class='row'><span class='label'>Kampus:</span> <span class='value'>$kampus</span></div>";
    echo "<div class='row'><span class='label'>Fakultas:</span> <span class='value'>$fakultas</span></div>";
    echo "<div class='row'><span class='label'>Program Studi:</span> <span class='value'>$prodi</span></div>";

    echo "<p style='margin-top:20px; text-align:center;' class='highlight'>
            Halo, saya $nama dari $kampus.
          </p>";
  ?>
</div>

</body>
</html>
