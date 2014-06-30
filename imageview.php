<?php
include 'config.php';
error_reporting(E_ALL ^ E_NOTICE);
$select = mysql_query("SELECT * from myimages");
if(isset($_POST['submit']))
{
	for($i=1;$i<=$_POST['hidden'];$i++)
	{
		
		$query2 = mysql_query("SELECT picture from myimages WHERE id = ' ".$_POST["hioddenid$i"]." ' ");
		while($file = mysql_fetch_array($query2))
		{
		$unlink = unlink('images/'.$file['picture']);
		if($unlink)
		{
		$query1 = mysql_query("DELETE from myimages WHERE id = ' ".$_POST["hioddenid$i"]." ' ");
		echo 'Deleted , You Will be Redirect';
		header("refresh : 3 imageview.php");
		}
		else
		{
		echo 'Not deleted';
		}
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>View Images</title>
</head>

<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<table align="center" cellspacing="15">
<tr>
	<th align="left">Seç</th>
	<th align="left">Adı</th>
	<th align="left">Yazarı</th>
	<th align="left">Yayını</th>
	<th align="left">Türü</th>
	<th align="left">Sayısı</th>
	<th align="left">Fiyatı</th>
	<th align="left">Resmi</th>
</tr>
<?php
$i = 0;
while($row = mysql_fetch_array($select))
{
$i = $i + 1;
?>
<tr>
	<td><input type="checkbox" name="hioddenid<?php echo $i; ?>" value="<?php echo $row['id']; ?>" /></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['email']; ?></td>
	<td><?php echo $row['yayin']; ?></td>
	<td><?php echo $row['turu']; ?></td>
	<td><?php echo $row['adet']; ?></td>
	<td><?php echo $row['fiyat']; ?></td>
	<td><img src="images/<?php echo $row['picture'];?>" height="80" width="100"/></td>
	<input type="hidden" name="image<?php echo $i; ?>" value="<?php echo $row['picture'];?>" />
</tr>
<?php
}
?>
<tr>
	<input type="hidden" name="hidden" value="<?php echo $i; ?>" />
	<td colspan="5" align="center"><input type="submit" name="submit" value="Delete" /></td>
</tr>
</table>
</form>
</body>
</html>
