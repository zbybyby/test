<?php
error_reporting(0);
header("Content-type:text/html; charset=gb2312");
//php生成excel报表，是通过发送header()头信息完成的
header("Content-type:applicateion/vnd.ms-excel");
//告知浏览器文件名称，并要求客户端下载
header("Content-Disposition:attachment;filename=test.xls");
mysql_connect('localhost','root','123');
mysql_select_db('db_logistics');
mysql_query("set names gb2312");
$sql = "select * from tb_car";

$res = mysql_query($sql);
//获得行数，记录数
$arr_rows = mysql_num_rows($res);
//获得列数
$arr_cols = mysql_num_fields($res);
echo "id"."\t";
echo "用户名"."\t";
echo "身份证号         "."\t";
echo "车牌号     "."\t";
echo "车主电话         "."\t";
echo "地址"."\t";
echo "路线    "."\t";
echo "车辆类型"."\t";
echo "使用情况"."\n";
while($row = mysql_fetch_array($res))

{
	for($i=0;$i<$arr_cols;$i++)
	{
		//遍历每条记录的字段
		if($i==$arr_cols-1)
		{
			echo $row[$i]."\n";
		}
		else
		{
			echo $row[$i]."\t";
		}
	}
}

?>