<?php
error_reporting(0);
	$conn=mysql_connect("localhost","root","123");
	mysql_select_db("db_logistics");
	mysql_query("set names utf8");
	$sql="select * from city where fatherid=".$_GET['provinceid'];
	$query=mysql_query($sql);
	while($row=mysql_fetch_array($query)){
		$city[]=$row;
	}

?>
<select id="city" name="city" onchange="selectArea()">
	<option value="0"></option>
	<?php 
		foreach($city as $k=>$v){
	?>
		<option value='<?php echo $v['cityid']?>'><?php echo $v['city']?></option>
	<?php 
		}
	?>
</select>
