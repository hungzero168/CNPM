<div id="fix">
<?php
	$id_nhom=$_GET["idn"];
	$sql="select * from nhomsanpham where id_nhom=$id_nhom";
	$kq=mysqli_query($conn,$sql);
	$r=mysqli_fetch_array($kq);
	$id_nhom=$r["id_nhom"];$tennhom=$r["tennhom"];
?>	
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" style="border-bottom:1px solid #333; background:url(images/toplist-content.gif) repeat-x; padding-bottom:5px; font-weight:bold">
    <a href="index.php"><img src="images/Home.gif" width="16" height="16" border="0"></a>
    <img src="images/towred1-r.gif" width="16" height="9">
    <a href="?b=nsp&idn=<?php echo $id_nhom; ?>"><?php echo "$tennhom"; ?></a>        
    </td>
  </tr>
</table>
<?php	
	$sql2="select * from loaisanpham where id_nhom=$id_nhom";
	$kq2=mysqli_query($conn,$sql2);
	while($r2=mysqli_fetch_array($kq2))
	{
		$id_loai=$r2["id_loai"];$tenloaisp=$r2["tenloaisp"];
		$query="select count(*) from sanpham where id_loai=$id_loai";			
		$kq_query=mysqli_query($conn,$query);
		$r_query=mysqli_fetch_array($kq_query);
		$n_query=$r_query[0];
		if($n_query==0){	echo "";}
		else{

?>	
<table width="560" border="0" cellspacing="0" cellpadding="0">
  <tr>	
    <td style="padding-left:5px; width:550px; height:30px" background="images/bg_tieude3.jpg"><a href="?b=lsp&idl=<?php echo $id_loai; ?>" style="color: #fff; font-size:14px; font-weight:bold"><?php echo $tenloaisp;?></a>
  </tr> 
  <tr>
  	<td align="center" style="padding-left:5px;">
<?php	
	$sql3="select * from sanpham where id_loai=$id_loai and ( ghichu='hienthi' or ghichu='new' ) order by rand() limit 0,9";
	$kq3=mysqli_query($conn,$sql3);
	while($r3=mysqli_fetch_array($kq3))
	{
		$id=$r3["id"];$tensp=$r3["tensp"];$hinh=$r3["hinh"];
		$gia=$r3["gia"];$gia2=number_format($gia,0,'','.');
		if( $gia==0) $s="(liên hệ)";	else { $s=$gia2." VND"; }
		echo "<div class=divshow>
		<table width=175 height=220 border=0 cellspacing=0 cellpadding=0 background=\"images/box.gif\" style=\"border:1px dotted #999\">
		  <tr>
			<td height=170><a href=?b=ct&id=$id><img src='sanpham/small/$hinh' width=170px height=170 border=0> </a></td>
		  </tr>
		  <tr>
			<td height=25 style=\"font-size:14px; color:#F00\"><a href=?b=ct&id=$id class=a-m><strong>$tensp</strong></a></td>
		  </tr>
		  <tr>
			<td height=25>Giá: $s</td>
		  </tr>
		</table>		
		</div>";
	}
?>
	</td>
   </tr>
    <tr>
  	<td align="right" style="padding-right:10px; border-top:1px solid #999"><a href="?b=lsp&idl=<?php echo $id_loai; ?>">Xem thêm &raquo;</a>    
    </td>
  </tr>
<?php	}
	}
?>
 
</table>
</div>			