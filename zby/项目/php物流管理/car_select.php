<?php
error_reporting(0);
if(!$_SESSION){
    session_start();
}
include("conn/conn.php");
if($_SESSION['admin_user']==true){
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ϵͳ</title>
</head>
<script language="javascript" src="js/car_js.js"></script>
<body>
<table  class="ziti" width="685" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  <tr>
    <form id="form1" name="form1" method="post" action="indexs.php?lmbs=��Դ��Ϣ��ѯ" onSubmit="javascript: return check_select_car();">
      <td height="30" colspan="4" align="right" bgcolor="#FFFFFF">��ѯ
        <input name="select1" type="text" id="select1" size="10">
        ��
        <input name="select2" type="text" id="select2" size="10"></td>
      <td colspan="2" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="�ύ" /></td>
    </form>
  </tr>
  <tr>
    <td width="79" height="26" align="center" bgcolor="#FFFFFF">���ƺ���</td>
    <td width="146" align="center" bgcolor="#FFFFFF">·��</td>
    <td colspan="2" align="center" bgcolor="#FFFFFF">��������</td>
    <td width="141" align="center" bgcolor="#FFFFFF">ʹ����־</td>
    <td width="67" align="center" bgcolor="#FFFFFF">�Ƿ�ʹ��</td>
  </tr>
<?php
if((isset($_POST['select1']) && $_POST['select1'] == true) || (isset($_POST['select1']) && $_POST['select2'] == true)){
	$select1=$_POST['select1'];
	$select2=$_POST['select2'];
  	$query="select * from tb_car where car_road like '%$select1%' and car_road like '%$select2%' and car_used='����'";
  	$result=mysql_query($query);
  	if(mysql_num_rows($result)>0){
  		while($myrow=mysql_fetch_array($result)){  
?>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF"><?php echo $myrow['car_number'];?></td>
    <td bgcolor="#FFFFFF"><?php echo $myrow['car_road'];?></td>
    <td colspan="2" bgcolor="#FFFFFF"><?php echo $myrow['car_content'];?></td>
    <td bgcolor="#FFFFFF">&nbsp;
    <?php 
	$querys=mysql_query("select * from tb_car_log where car_number='".$myrow['car_number']."'");
	$myrows=mysql_fetch_array($querys);
	echo $myrows['car_log'];
	?>
    </td>
    <td align="center" bgcolor="#FFFFFF">
	<?php 
	if($myrows['car_log']==null){
		echo "<a href='indexs.php?lmbs=������&ljid=$myrow[id]'>ʹ�øó�</a>";
	}else{
		echo "<a href='indexs.php?lmbs=������&ljid=$myrow[id]'>Ԥ���ó�</a>";	}?>
    </td>
  </tr>
  <?php }}else{
  	$query1="select * from tb_car where car_road like '%$select1%' and car_road like '%$select2%'";
  	$result1=mysql_query($query1);
  	if(mysql_num_rows($result1)>0){
  		echo "����·�޿��п��ó���";
  	}
  	else {
  	echo "�����ҵ�·�߲����ڣ�";
	}
    }
  
  }?>
</table>
</body>
</html>
<?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>