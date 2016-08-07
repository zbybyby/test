<?php
error_reporting(0);
	$conn=mysql_connect("localhost","root","123");
	mysql_select_db("db_logistics");
	mysql_query("set names utf8");
	$sql="select * from area where fatherid=".$_GET['cityid'];
	$query=mysql_query($sql);
	while($row=mysql_fetch_array($query)){
		$city[]=$row;
	}
?>
<select id="area" name="area">
	<option value="0"></option>
	<?php 
		foreach($city as $k=>$v){
	?>
		<option value='<?php echo $v['areaid']?>'><?php echo $v['area']?></option>
	<?php 
		}
		/*
		 		$("#province2").change(function()
				{
			var provinceid2=$(this).val();
			$("#citySpan2").load("index_city2.php?provinceid2="+provinceid2);
			$("#areaSpan2").html("<select id=\"area2\" name=\"area2\"><option value=\"0\"></option></select>");
				}             );
				
					function selectArea2(){
		var cityid2=$("#city2").val();
		$("#areaSpan2").load("index_area2.php?cityid2="+cityid2);}
		
		<select id="province2" name="province2">
<option value='0' ></option>
<?php 
	foreach($province as $k=>$v){
?>
<option value='<?php echo $v['provinceid2']?>'  ><?php echo $v['province']?></option>
<?php 
	}
?>
</select>

<!--  -->
<span id="citySpan2">
	<select id="city2" name="city2">
		<option value="0"></option>
	</select>
</span>
<span id="areaSpan2">
	<select id="area2" name="area2">
		<option value="0"></option>
	</select>
</span>


		 */
	?>
</select>
