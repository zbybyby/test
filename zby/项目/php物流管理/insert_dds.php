<?php session_start();
error_reporting(0);
include("conn/conn.php");
if($_SESSION['admin_user']==true){
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ϵͳ</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<style>
.ddd{
	  position:absolute;
	  top:270px;
	  left:0px;
	  width:647px;
	  height:150px;
}
</style>
<div class="ddd">
<form name="form5" method="post" action="insert_dd_ok.php" >
<table  class="ziti" width="667" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  
  <tr>
    <td width="90" height="26" align="center" bgcolor="#FFFFFF">��������ţ�</td>
    <td width="145" bgcolor="#FFFFFF"><input name="fahuo_id" type="text" id="fahuo_id"  value="<?php echo date("YmdHis");?><?php echo $_GET['ljid'];?>" size="20"/>      </td>
	<?php 
	$query="select * from tb_car where id='".$_GET['ljid']."'";
	$result=mysql_query($query);
	$myrow=mysql_fetch_array($result);
	?>
    <td width="196" align="center" bgcolor="#FFFFFF">���ƺ��룺
    <input name="car_number" type="text" size="12"  value="<?php echo $myrow['car_number']?>"/></td>
    <td width="213" align="center" bgcolor="#FFFFFF">�����绰��
    <input name="car_tel" type="text" size="12"  value="<?php echo $myrow['tel'];?>"/></td>
  </tr>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF">�����ˣ�</td>
    <td bgcolor="#FFFFFF"><input name="fahuo_user" type="text" size="15" /></td>
    <td align="center" bgcolor="#FFFFFF">�����˵绰��
      <input name="fahuo_tel" type="text" size="12" /></td>
    <td align="center" bgcolor="#FFFFFF">���ʽ��
      <select name="fahuo_fk">
        <option selected="selected"></option>
		<option>�����˸���</option>
        <option>����������</option>
      </select>    </td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">����������</td>
    <td colspan="3" bgcolor="#FFFFFF"><textarea name="fahuo_content" cols="65" rows="5"></textarea></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">������ַ</td>
    <td colspan="3" bgcolor="#FFFFFF"><textarea name="fahuo_address" cols="65" rows="3"></textarea></td>
  </tr>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF">�ջ��ˣ�</td>
    <td bgcolor="#FFFFFF"><input name="shouhuo_user" type="text" size="15" /></td>
    <td colspan="2" bgcolor="#FFFFFF">�ջ��˵绰��
      <input name="shouhuo_tel" type="text" size="15" /></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">�ջ���ַ��</td>
    <td colspan="3" bgcolor="#FFFFFF"><textarea name="shouhuo_address" cols="65" rows="3"></textarea></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">˵����</td>
    <td colspan="3" bgcolor="#FFFFFF"><textarea name="car_log" cols="65" rows="5"></textarea></td>
  </tr>
</table>
</form>
</div>
</body>
</html>
<?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>