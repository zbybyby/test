<?php
error_reporting(0);
header("Content-type:text/html; charset=gb2312");
//php����excel������ͨ������header()ͷ��Ϣ��ɵ�
header("Content-type:applicateion/vnd.ms-excel");
//��֪������ļ����ƣ���Ҫ��ͻ�������
header("Content-Disposition:attachment;filename=test.xls");
mysql_connect('localhost','root','123');
mysql_select_db('db_logistics');
mysql_query("set names gb2312");
$sql = "select * from tb_shopping";

$res = mysql_query($sql);
//�����������¼��
$arr_rows = mysql_num_rows($res);
//�������
$arr_cols = mysql_num_fields($res);

echo "id"."\t";
echo "���ƺ���"."\t";
echo "��������     "."\t";
echo "����ID   "."\t";
echo "������    "."\t";
echo "����ʱ��"."\t";
echo "ȷ�϶���"."\t";
echo "���ʽ"."\t";
echo "�����绰"."\t";
echo "�ջ���"."\t";
echo "�ջ���ַ"."\t";
echo "������ַ"."\t";
echo "�����˵绰"."\t";
echo "�ջ��˵绰"."\t";
echo "��ע"."\n";
while($row = mysql_fetch_array($res))

{
	for($i=0;$i<$arr_cols;$i++)
	{
		//����ÿ����¼���ֶ�
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