<?php
error_reporting(0);
	$conn=mysql_connect("localhost","root","123");
	mysql_select_db("db_logistics");
	mysql_query("set names utf8");
	$sql="select * from area where fatherid=".$_GET['cityid2'];
	$qd=$_COOKIE['aaa'];
	$zd=$_GET['cityid2'];
	setcookie("bbb",$zd);
	$query=mysql_query($sql);
	while($row=mysql_fetch_array($query)){
		$city[]=$row;
	}
	$sql1="select city from city where cityid=".$_GET['cityid2'];
	$sql2="select city from city where cityid='$qd'";
//	$sql3="SELECT`city`FROM `city` WHERE `fatherid`=110100";
	$query1=mysql_query($sql1);
	while($row1=mysql_fetch_array($query1)){
		$city1[]=$row1;
	}
	foreach ($city1 as $k1=>$v1)
	{
		$zdz=$v1['city'];
	}
	$query2=mysql_query($sql2);
	while($row2=mysql_fetch_array($query2)){
		$city2[]=$row2;
	}
	foreach ($city2 as $k2=>$v2)
	{
		$cfd=$v2['city'];
	}
	$sql3="select money from tran_money where qd='$cfd' and zd='$zdz' ";
	$query3=mysql_query($sql3);
	while($row3=mysql_fetch_array($query3)){
		$city3[]=$row3;
	}
	foreach ($city3 as $k3=>$v3)
	{
		$mm=$v3['money'];
		//setcookie(search_m,$mm);
	}
	
	setcookie(m,$mm);
?>
<select id="area2" name="area2">
	<option value="0"></option>
	<?php 
		foreach($city as $k=>$v){
	?>
		<option value='<?php echo $v['areaid']?>'><?php echo $v['area']?></option>
	<?php 
		}
	?>
</select>


