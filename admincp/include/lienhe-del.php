<?php
	$idlh=$_GET["idlh"];
	
	$sql="delete from lienhe where id_lienhe='$idlh'";
	$kq=mysqli_query($conn,$sql);
	if(!$kq)
		echo "<script>alert('Có lỗi trong khi xóa!!!');window.location='../admincp/?m=lienhe';</script>";
	else
	{
		$n=mysqli_affected_rows($conn);
		echo "<script>alert('Đã xóa'); window.history.go(-1);</script>";		
	}

?>