<?php
echo "
<style>
body { font-family: Arial, sans-serif; background:#fff; color:#000; text-align:center; padding:20px; }
table { border-collapse:collapse; width:70%; margin:20px auto; }
th { background:#4A90E2; color:#fff; padding:8px; }
td { border:1px solid #ccc; padding:6px; }
tr:nth-child(even){ background:#F9F9F9; }
h3 { color:#4A90E2; margin-bottom:15px; }
</style>
";

$mahasiswa = [
    ["nim"=>"2205551001","nama"=>"Made Andi","umur"=>20,"prodi"=>"TI"],
    ["nim"=>"2205551002","nama"=>"Putri Ayu","umur"=>19,"prodi"=>"TI"],
    ["nim"=>"2205551003","nama"=>"Kadek Budi","umur"=>21,"prodi"=>"SI"],
    ["nim"=>"2205551004","nama"=>"Ni Luh Citra","umur"=>18,"prodi"=>"TI"],
    ["nim"=>"2205551005","nama"=>"Gede Surya","umur"=>22,"prodi"=>"SI"],
    ["nim"=>"2205551006","nama"=>"Ayu Lestari","umur"=>20,"prodi"=>"TI"],
    ["nim"=>"2205551007","nama"=>"I Wayan Bagus","umur"=>19,"prodi"=>"TI"],
    ["nim"=>"2205551008","nama"=>"Komang Sari","umur"=>20,"prodi"=>"SI"],
    ["nim"=>"2205551009","nama"=>"Putu Dwi","umur"=>21,"prodi"=>"TI"],
    ["nim"=>"2205551010","nama"=>"Made Raka","umur"=>18,"prodi"=>"TI"],
];

echo "<h3>Data Mahasiswa:</h3>";
echo "<table><tr><th>NIM</th><th>Nama</th><th>Umur</th><th>Prodi</th></tr>";
foreach ($mahasiswa as $mhs) {
    echo "<tr>
            <td>{$mhs['nim']}</td>
            <td>{$mhs['nama']}</td>
            <td align='center'>{$mhs['umur']}</td>
            <td>{$mhs['prodi']}</td>
          </tr>";
}
echo "</table>";
?>
