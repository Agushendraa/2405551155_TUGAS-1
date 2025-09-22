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
    padding: 10px 15px;
    border-radius: 6px;
    transition: 0.2s;
}
ul li:hover {
    background: #e6f0ff;
}
</style>
";

$barang = ["Buku Tulis", "Pulpen", "Penggaris", "Penghapus"];

echo "<div class='container'>";
echo "<h3>Daftar Barang:</h3><ul>";
foreach ($barang as $b) { 
    echo "<li>$b</li>"; 
}
echo "</ul></div>";
?>
