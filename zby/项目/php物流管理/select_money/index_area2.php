<?php
error_reporting(0);
	$conn=mysql_connect("localhost","root","123");
	mysql_select_db("db_logistics");
	mysql_query("set names utf8");
	$sql="select * from area where fatherid=".$_GET['cityid2'];
	$query=mysql_query($sql);
	while($row=mysql_fetch_array($query)){
		$city[]=$row;
	}
?>
<select id="area2" name="area2">
	<option value="0"></option>
	<?php 
		foreach($city as $k=>$v){
	?>
		<option value='<?php echo $v['areaid2']?>'><?php echo $v['area']?></option>
	<?php 
		}
	?>
</select>
