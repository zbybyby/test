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

<body>
<table  class="ziti" width="685" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  <form name="form1" method="post" action="User_indexs.php?lmbs=��������ѯ">
  <tr>
    <td width="187" align="right" bgcolor="#FFFFFF">��������ѯ��</td>
    <td width="110" bgcolor="#FFFFFF"><select name="select1" id="select1">
      <option value="���������">���������</option>
      <option value="������">������</option>
    </select>
    </td>
    <td width="125" bgcolor="#FFFFFF"><input name="select" type="text" id="select" size="15"></td>
    <td width="240" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="�ύ"></td>
  </tr>
   </form>
</table>
	<?php
    $myrow = array(
        "id"=>null,
        "car_number"=>null,
        "fahuo_content"=>null,
        "fahuo_id"=>null,
        "fahuo_user"=>null,
        "fahuo_ys"=>null,
        "fahuo_fk"=>null,
        "car_tel"=>null,
        "shouhuo_user"=>null,
        "shouhuo_address"=>null,
        "fahuo_address"=>null,
        "fahuo_tel"=>null,
        "shouhuo_tel"=>null,
    );
	if(isset($_POST['select1']) && $_POST['select1']=="���������"){
	$query="select * from tb_shopping where fahuo_id='".$_POST['select']."'";
	$result=mysql_query($query);
	$myrow=mysql_fetch_array($result);
	}
	if(isset($_POST['select1']) && $_POST['select1']=="������"){
	$query="select * from tb_shopping where fahuo_user='".$_POST['select']."' order by id desc ";
	$result=mysql_query($query);
	$myrow=mysql_fetch_array($result);
	}
	?>

<table  class="ziti" width="685" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  <tr>
    <td colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td width="83" align="center" bgcolor="#FFFFFF">��������ţ�</td>
    <td width="144" bgcolor="#FFFFFF"><input name="fahuo_id" type="text" size="18" value="<?php echo $myrow['fahuo_id'];?>"></td>
    <td width="71" bgcolor="#FFFFFF">���ƺ��룺</td>
    <td width="146" bgcolor="#FFFFFF"><input name="car_number" type="text" size="18"  value="<?php echo $myrow['car_number'];?>"/></td>
    <td width="213" bgcolor="#FFFFFF">��ϵ�绰��
    <input name="car_tel" type="text" size="18"  value="<?php echo $myrow['car_tel'];?>"/></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">�����ˣ�</td>
    <td bgcolor="#FFFFFF"><input name="fahuo_user" type="text" size="18" value="<?php echo $myrow['fahuo_user'];?>" /></td>
    <td bgcolor="#FFFFFF">�绰��</td>
    <td bgcolor="#FFFFFF"><input name="fahuo_tel" type="text" size="18"  value="<?php echo $myrow['fahuo_tel'];?>"/></td>
    <td bgcolor="#FFFFFF">���ʽ��
      <select name="fahuo_fk">
        <option value="<?php echo $myrow['fahuo_fk'];?>"><?php echo $myrow['fahuo_fk'];?></option>
    </select>    </td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">����������</td>
    <td colspan="4" bgcolor="#FFFFFF"><textarea name="fahuo_content"><?php echo $myrow['fahuo_content'];?></textarea></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">������ַ</td>
    <td colspan="4" bgcolor="#FFFFFF"><textarea name="fahuo_address"><?php echo $myrow['fahuo_address'];?></textarea></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">�ջ��ˣ�</td>
    <td bgcolor="#FFFFFF"><input name="shouhuo_user" type="text" size="18"  value="<?php echo $myrow['shouhuo_user'];?>"/></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" bgcolor="#FFFFFF">�ջ��˵绰��
    <input name="shouhuo_tel" type="text" size="18" value="<?php echo $myrow['shouhuo_tel'];?>" /></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">�ջ���ַ��</td>
    <td colspan="4" bgcolor="#FFFFFF"><textarea name="shouhuo_address"><?php echo $myrow['shouhuo_address'];?></textarea></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">����������</td>
    <td colspan="4" bgcolor="#FFFFFF"><?php echo $myrow['fahuo_ys'];?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">˵����</td>
    <td colspan="4" bgcolor="#FFFFFF"><textarea name="car_log">
		<?php 
	$querys="select * from tb_car_log where fahuo_id='$myrow[fahuo_id]'";
	$results=mysql_query($querys);
	$myrows=mysql_fetch_array($results);
	echo $myrows['car_log'];
	?>
	
	</textarea></td>
  </tr>
  <tr>
    <td height="26" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>