<?php 
	error_reporting(0);
	$conn=mysql_connect("localhost","root","123");
	mysql_select_db("db_logistics");
	mysql_query("set names gb2312");
	$sql="select * from province";
	$query=mysql_query($sql);
	while($row=mysql_fetch_array($query)){
		$province[]=$row;
	}
?>
<script src='jquery.js'></script>
<script>
	$(document).ready(function(){
		$("#province").change(function(){
			var provinceid=$(this).val();
			$("#citySpan").load("index_city.php?provinceid="+provinceid);
			$("#areaSpan").html("<select id=\"area\" name=\"area\"><option value=\"0\"></option></select>");
		});
	})
	function selectArea(){
		var cityid=$("#city").val();
		$("#areaSpan").load("index_area.php?cityid="+cityid);
	}
</script>

<select id="province" name="province">
<option value='0' ></option>
<?php 
	foreach($province as $k=>$v){
?>
<option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
<?php 
	}
?>
</select>
<span id="citySpan">
	<select id="city" name="city">
		<option value="0"></option>
	</select>
</span>
<span id="areaSpan">
	<select id="area" name="area">
		<option value="0"></option>
	</select>
</span>