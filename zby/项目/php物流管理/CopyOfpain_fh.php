<?php 
error_reporting(0);
require_once '../jpgraph/src/jpgraph.php';
require_once '../jpgraph/src/jpgraph_pie.php'; 
require_once '../jpgraph/src/jpgraph_pie3d.php'; 

$conn=mysql_connect("localhost","root","123");
mysql_select_db("db_logistics");
mysql_query("set names gb2312");
$sql="SELECT `fahuo_address`,`shouhuo_address` FROM `tb_shopping`";
$query=mysql_query($sql);
$i=0;
while($row=mysql_fetch_array($query)){
	$data1[$row['shouhuo_address']]++;
	$i++;
}
$j=0;
foreach ($data1 as $key=>$value)
{
	$tl1[$j]=$key;
	$dat[$j]=$value;
	$j++;
}
$data=$dat;
$tl=$tl1;
//var_dump($tl);

$graph = new PieGraph(800,300); 
$graph->SetShadow(); 
$graph->title->Set("�ջ�ͳ�Ʊ�"); 
$graph->title->SetFont(FF_SIMSUN,FS_BOLD); 
$pieplot = new PiePlot3D($data); //����PiePlot3D���� 
$pieplot->SetCenter(0.3); //���ñ�ͼ���ĵ�λ�� 
$graph->legend->Pos(0.2,0.90,"right","center");
$pieplot->SetLegends($tl); //����ͼ�� 
$graph->Add($pieplot); 
$graph->Stroke();

?>