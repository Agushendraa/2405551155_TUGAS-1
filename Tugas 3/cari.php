<?php
include "koneksi.php";

// Ambil kata kunci dari parameter URL
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : "";

// Query pencarian dengan LIKE
$stmt = $conn->prepare("SELECT * FROM mahasiswa WHERE nama LIKE ? OR nim LIKE ? ORDER BY id DESC");
$like = "%" . $keyword . "%";
$stmt->bind_param("ss", $like, $like);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Kembalikan hasil dalam format JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);

$stmt->close();
?>
