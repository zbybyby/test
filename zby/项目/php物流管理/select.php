<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ϵͳ</title>
</head>

<body>
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
		$("#province").change(function()
				{
			var provinceid=$("#province").val();
		//	var pr1 = $('select[name=province]').val();
			$.get("index_area2.php", {pr1:$('select[name=province]').val()} );
			$("#citySpan").load("index_city.php?provinceid="+provinceid);
			$("#areaSpan").html("<select id=\"area\" name=\"area\"><option value=\"0\"></option></select>");
				}             );

		$("#province2").change(function()
				{
			var provinceid2=$("#province2").val();
		//	var pr2 = $('select[name=province2]').val();
			$.get("index_area2.php", { pr2: $('select[name=province2]').val()} );
			$("#citySpan2").load("index_city2.php?provinceid2="+provinceid2);
			$("#areaSpan2").html("<select id=\"area2\" name=\"area2\"><option value=\"0\"></option></select>");
				}             );
								}
	                   )
	
	function selectArea(){
		var cityid=$("#city").val();
		$("#areaSpan").load("index_area.php?cityid="+cityid);
	}

	function selectArea2(){
		var cityid2=$("#city2").val();
		$("#areaSpan2").load("index_area2.php?cityid2="+cityid2);
	}
</script>
<p>������</p>
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
<br>
<br>
<p>�յ�վ</p>
<select id="province2" name="province2">
<option value='0' ></option>
<?php 
	foreach($province as $k=>$v){
?>
<option value='<?php echo $v['provinceid']?>'><?php echo $v['province']?></option>
<?php 
	}
?>
</select>
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
<br>
<br>
<br>
<table>
<form action="" method="post">
<input type="submit" value="submit!" name="search1"></form>
</table>
<br>
<br>

<?php 
if(isset($_POST['search1']))
{
	//echo "111111111";
	echo "<font color=blue size=3>�˷�Ϊ$_COOKIE[m]RMB</font>";
}

?>
</body>
</html>
