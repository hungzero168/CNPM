<?php
	include('connect.php');
	$str = $_GET['content'];
	if($str!="")
	{
		$sel = mysqli_query($conn, "select tensp from sanpham where ghichu='hienthi' and hinh like '%".trim($str)."%' and id like '%".trim($str)."%' OR tensp like '%".trim($str)."%'");
		if(mysqli_num_rows($sel))
		{
			echo "<table border =\"0\" width=\"100%\">\n";
			if(mysqli_num_rows($sel))
			{
				echo "<script language=\"javascript\">box('1');</script>";
				while($row = mysqli_fetch_array($sel))
				{
					$country = str_ireplace($str,"<b>".$str."</b>",($row['tensp']));
					echo "<tr id=\"word".$row['id']."\" onmouseover=\"highlight(1,'".$row['id']."');\" onmouseout=\"highlight(0,'".$row['id']."');\" onClick=\"display('".$row['tensp']."');\" >\n<td>".$country."</td>\n</tr>\n";
				}
			}
			echo "</table>";
		}
	}
	else
	{
		echo "<script language=\"javascript\">box('0');</script>";
	}
?>