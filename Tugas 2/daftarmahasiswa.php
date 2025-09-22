<?php
echo "
<style>
body { 
    font-family: Arial, sans-serif; 
    background: #f0f2f5; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
    margin: 0;
}
.container {
    background: #fff;
    padding: 20px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    text-align: center;
}
h3 { 
    color: #4A90E2; 
    margin-bottom: 15px;
}
ul { 
    list-style: none; 
    padding: 0; 
    margin: 0; 
}
ul li { 
    background: #F9F9F9; 
    margin: 6px 0; 
    padding: 8px 12px; 
    border-radius: 6px; 
    text-align: left;
}
ul li b {
    color: #333;
}
</style>
";

$mahasiswa = [
    "2205551001" => "Made Andi",
    "2205551002" => "Putri Ayu",
    "2205551003" => "Gede Surya",
    "2205551004" => "Ni Luh Citra",
    "2205551005" => "Kadek Budi"
];

echo "<div class='container'>";
echo "<h3>Daftar Mahasiswa:</h3><ul>";
foreach ($mahasiswa as $nim => $nama) {
    echo "<li><b>$nim</b> - $nama</li>";
}
echo "</ul></div>";
?>
