<?php
include_once('../connect.php');

$icon = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $icon = basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], '../image/' . $icon);
}

$ten    = $_POST['TenTL'] ?? '';
$thutu  = isset($_POST['ThuTu']) ? (int)$_POST['ThuTu'] : 0;
$anhien = isset($_POST['AnHien']) ? (int)$_POST['AnHien'] : 1;

$stmt = mysqli_prepare($connect, "INSERT INTO theloai (TenTL, ThuTu, AnHien, icon) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'siis', $ten, $thutu, $anhien, $icon);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Thêm thành công'); location.href='theloai.php';</script>";
} else {
    echo "Lỗi: " . mysqli_error($connect);
}
?>