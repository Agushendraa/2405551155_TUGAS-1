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
    width: 320px;
    text-align: center;
}
form {
    background:#F9F9F9;
    padding:15px;
    border-radius:8px;
    margin-top: 15px;
}
input[type=number] {
    padding:8px;
    margin:6px 0;
    width:90%;
    border:1px solid #ccc;
    border-radius:5px;
}
input[type=submit] {
    background:#4A90E2; 
    color:#fff; 
    border:none; 
    padding:10px 15px;
    border-radius:5px; 
    cursor:pointer;
    margin-top: 10px;
    width:100%;
}
input[type=submit]:hover { background:#357ABD; }
h3 {
    color:#4A90E2;
    margin-bottom: 10px;
}
.result {
    margin-top: 15px;
    padding: 10px;
    background: #e6f0ff;
    border-radius: 6px;
}
.error {
    color:red;
    margin-top: 10px;
}
</style>
";

echo "<div class='container'>";

if (isset($_POST['n1']) && isset($_POST['n2'])) {
    $n1 = $_POST['n1']; $n2 = $_POST['n2'];
    if ($n1 < $n2) {
        echo "<div class='result'><h3>Bilangan Genap dari $n1 sampai $n2:</h3>";
        for ($i=$n1;$i<=$n2;$i++) { 
            if ($i%2==0) echo $i.' '; 
        }
        echo "</div>";
    } else { 
        echo "<p class='error'>n1 harus lebih kecil dari n2!</p>"; 
    }
}

echo '
<form method="post">
    <label>Masukkan n1:</label><br>
    <input type="number" name="n1" required><br>
    <label>Masukkan n2:</label><br>
    <input type="number" name="n2" required><br>
    <input type="submit" value="Tampilkan">
</form>
</div>';
?>
