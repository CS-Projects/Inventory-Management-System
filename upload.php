<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>Store Images</title>
</head>

<body>
<?php
include 'config.php';
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE ^E_DEPRECATED);
if(isset($_POST['submit']))
{
$target = "images/";
$target = $target . basename( $_FILES['photo']['name']); 
$name = $_POST['name'];
$email = $_POST['email'];
$yayin = $_POST['yayin'];
$turu = $_POST['turu'];
$adet = $_POST['adet'];
$fiyat = $_POST['fiyat'];
$pic = ($_FILES['photo']['name']);
$sql = mysql_query("INSERT INTO `myimages` (`name`, `email`, `yayin`, `turu`, `adet`, `fiyat`, `picture`) VALUES ('$name', '$email', '$yayin', '$turu', '$adet', '$fiyat', '$pic');"); 

if(move_uploaded_file($_FILES['photo']['tmp_name'], $target))
{
echo '<center>Image uploaded Saved Success</center>';
}
else
{
echo '<center>Not Saved</center>';
}
}
?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<table align="center">
<tr>
	<td>Kitap adı :</td>
	<td><input type="text" name="name" /></td>
</tr>
<tr>
	<td>Yazarı :</td>
	<td><input type="text" name="email" /></td>
</tr>
<tr>
	<td>Yayınevi :</td>
	<td><input type="text" name="yayin" /></td>
</tr>
<tr>
	<td>Türü :</td>
	<td><input type="text" name="turu" /></td>
</tr>
<tr>
	<td>Sayısı :</td>
	<td><input type="text" name="adet" /></td>
</tr>
<tr>
	<td>Fiyatı :</td>
	<td><input type="text" name="fiyat" /></td>
</tr>
<tr>
	<td>Resmi :</td>
	<td><input type="file" name="photo" /></td>
</tr>
<tr>
	<td><input type="submit" value="add" name="submit" /></td>
	<td><input type="reset" value="clear All" /></td>
</tr>
</table>
</form>
</body>
</html>
