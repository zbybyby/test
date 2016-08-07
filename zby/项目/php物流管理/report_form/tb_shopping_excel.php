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
$sql = "select * from tb_shopping";

$res = mysql_query($sql);
//获得行数，记录数
$arr_rows = mysql_num_rows($res);
//获得列数
$arr_cols = mysql_num_fields($res);

echo "id"."\t";
echo "车牌号码"."\t";
echo "货物描述     "."\t";
echo "订单ID   "."\t";
echo "发货人    "."\t";
echo "发货时间"."\t";
echo "确认订单"."\t";
echo "付款方式"."\t";
echo "车主电话"."\t";
echo "收货人"."\t";
echo "收货地址"."\t";
echo "发货地址"."\t";
echo "发货人电话"."\t";
echo "收货人电话"."\t";
echo "备注"."\n";
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