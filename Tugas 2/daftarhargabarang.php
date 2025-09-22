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
table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 10px;
}
th {
    background: #4A90E2;
    color: #fff;
    padding: 10px;
    border-radius: 6px 6px 0 0;
}
td {
    border: 1px solid #ddd;
    padding: 8px;
}
tr:nth-child(even) {
    background: #F9F9F9;
}
tr:hover {
    background: #e6f0ff;
}
td:last-child {
    text-align: right;
    font-weight: bold;
    color: #333;
}
</style>
";

$harga = [
    "Nasi Goreng" => 15000,
    "Mie Ayam" => 12000,
    "Es Teh" => 5000,
    "Kopi" => 7000,
    "Roti Bakar" => 10000
];

echo "<div class='container'>";
echo "<h3>Daftar Harga Barang:</h3>";
echo "<table><tr><th>Nama Barang</th><th>Harga</th></tr>";
foreach ($harga as $barang => $h) {
    echo "<tr><td>$barang</td><td>Rp ".number_format($h,0,',','.')."</td></tr>";
}
echo "</table>";
echo "</div>";
?>
