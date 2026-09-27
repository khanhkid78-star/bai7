<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm thể loại</title>
</head>
<body>

<h2>Thêm thể loại</h2>

<form action="theloai_them_xl.php" method="post" enctype="multipart/form-data">

  <table cellpadding="5">
    <tr><td>Tên thể loại</td><td><input type="text" name="TenTL" required></td></tr>
    <tr><td>Thứ tự</td><td><input type="number" name="ThuTu" value="0"></td></tr>
    <tr><td>Ẩn hiện</td><td>
      <select name="AnHien">
        <option value="1">Hiện</option>
        <option value="0">Ẩn</option>
      </select>
    </td></tr>
    <tr><td>Icon</td><td><input type="file" name="image" accept="image/*"></td></tr>
    <tr><td>
      <input type="submit" name="Them" value="Thêm">
      <input type="reset" value="Hủy">
    </td></tr>
  </table>

</form>

</body>
</html>