<?php
include_once('../connect.php');
$id = isset($_GET['idTL']) ? (int)$_GET['idTL'] : 0;

if ($id > 0) {
    
    $res = mysqli_query($connect, "SELECT icon FROM theloai WHERE idTL=$id");
    $row = mysqli_fetch_assoc($res);
    if ($row && file_exists('../image/' . $row['icon'])) {
        unlink('../image/' . $row['icon']);
    }

    $sql = "DELETE FROM theloai WHERE idTL=$id";
    if (mysqli_query($connect, $sql)) {
        echo "<script>alert('Xóa thành công'); location.href='theloai.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
} else {
    echo "ID không hợp lệ";
}
?>