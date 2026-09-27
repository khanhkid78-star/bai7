<?php
include_once('../connect.php');
$id = isset($_GET['idTL']) ? (int)$_GET['idTL'] : 0;
if ($id <= 0) die('ID không hợp lệ');

if (isset($_POST['Sua'])) {
    $ten    = $_POST['TenTL'] ?? '';
    $thutu  = (int)$_POST['ThuTu'];
    $anhien = (int)$_POST['AnHien'];
    $icon   = $_POST['ten_anh'] ?? '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $icon = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../image/' . $icon);
    }

    $stmt = mysqli_prepare($connect, "UPDATE theloai SET TenTL=?, ThuTu=?, AnHien=?, icon=? WHERE idTL=?");
    mysqli_stmt_bind_param($stmt, 'siisi', $ten, $thutu, $anhien, $icon, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Sửa thành công'); location.href='theloai.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($connect);
    }
}

$sql = "SELECT * FROM theloai WHERE idTL=$id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
if (!$row) die('Không tìm thấy thể loại');
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Sửa thể loại</title></head>
<body>
<h2>Sửa thể loại</h2>
<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="ten_anh" value="<?php echo $row['icon']; ?>">
  <table cellpadding="5">
    <tr><td>Tên thể loại</td><td><input type="text" name="TenTL" value="<?php echo $row['TenTL']; ?>" required></td></tr>
    <tr><td>Thứ tự</td><td><input type="number" name="ThuTu" value="<?php echo $row['ThuTu']; ?>"></td></tr>
    <tr><td>Ẩn hiện</td><td>
      <select name="AnHien">
        <option value="1" <?php if($row['AnHien']==1) echo 'selected'; ?>>Hiện</option>
        <option value="0" <?php if($row['AnHien']==0) echo 'selected'; ?>>Ẩn</option>
      </select>
    </td></tr>
    <tr><td>Icon hiện tại</td><td><img src="../image/<?php echo $row['icon']; ?>" width="60"></td></tr>
    <tr><td>Đổi icon</td><td><input type="file" name="image" accept="image/*"></td></tr>
    <tr><td colspan="2">
      <input type="submit" name="Sua" value="Sửa">
      <input type="reset" value="Hủy">
    </td></tr>
  </table>
</form>
</body>
</html>