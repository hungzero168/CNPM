<?php 	include "connect.php";
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php	if(isset($_REQUEST["id"]))	{			$id2=$_REQUEST["id"];			$sql2=mysqli_query($conn,"select * from sanpham where id='$id2'");		while($r2=mysqli_fetch_array($sql2))		{		$idsp2=$r2["id"];$tensp2=$r2["tensp"];			echo "$tensp2 -  ***";				} 	}	else		echo "*****";?></title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<?php
	$id=$_GET["id"];
	
	if(isset($_GET["idk"]))
	{
		$idk=$_GET["idk"];
		$sql="SELECT * from kieudan where id_kieu='$idk'";
		$kq=mysqli_query($conn,$sql);
		$r=mysqli_fetch_array($kq);	
		$hinh=$r["hinh"];$id=$r["id_kieu"];
		$tenkieu=$r["tenkieu"];		
	}
	else{
	$sql="SELECT * from sanpham where id='$id'";
	$kq=mysqli_query($conn,$sql);
	$r=mysqli_fetch_array($kq);	
	$hinh=$r["hinh"];$id=$r["id"];
	$tensp=$r["tensp"];}
?>

<table width="400" height="520" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50"style="border-bottom:1px solid #d4340c;" align="center"><span style="color:#00F; font-weight:bold; font-size:20px;"> MÃ SẢN PHẨM:</span><span style="color:#d4340c; font-weight:bold; font-size:24px;"> <?php if(isset($idk)) echo $tenkieu; else echo $tensp; ?></span></td>
  </tr>
  <tr>
  	<td height="400"><img src="sanpham/large/<?php echo $hinh; ?>" width="400" height="399"></td>
  </tr>
  </table>
</body>
</html>