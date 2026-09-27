<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Danh sách thể loại</title></head>
<body>
<?php include_once('../connect.php'); ?>
<h2>Danh sách thể loại</h2>
<table border="1" cellpadding="5" width="700">
<tr>
  <th>Tên thể loại</th>
  <th>Thứ tự</th>
  <th>Ẩn/Hiện</th>
  <th>Icon</th>
  <th colspan="2"><a href="theloai_them.php">Thêm</a></th>
</tr>
<?php
$sql = "SELECT * FROM theloai ORDER BY idTL DESC";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
  <td><?php echo $row['TenTL']; ?></td>
  <td><?php echo $row['ThuTu']; ?></td>
  <td><?php echo $row['AnHien'] ? 'Hiện' : 'Ẩn'; ?></td>
  <td><img src="../image/<?php echo $row['icon']; ?>" width="50"></td>
  <td><a href="theloai_sua.php?idTL=<?php echo $row['idTL']; ?>">Sửa</a></td>
  <td><a href="theloai_xoa.php?idTL=<?php echo $row['idTL']; ?>" onclick="return confirm('Xóa?');">Xóa</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>