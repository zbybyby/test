<?php
error_reporting(0);
include_once ('admin_global.php');
if(!$_SESSION){
    session_start();
}
include("conn/conn.php");
if($_SESSION['admin_user']==true){
	
	
	
	if(isset($_POST['into']))
	{
			
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `fahuo_user` = '$_POST[fahuo_user]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `car_number` = '$_POST[car_number]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `car_tel` = '$_POST[car_tel]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `fahuo_user` = '$_POST[fahuo_user]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `fahuo_tel` = '$_POST[fahuo_tel]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `fahuo_fk` = '$_POST[fahuo_fk]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `fahuo_content` = '$_POST[fahuo_content]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `fahuo_address` = '$_POST[fahuo_address]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `shouhuo_user` = '$_POST[shouhuo_user]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_shopping` SET `shouhuo_address` = '$_POST[shouhuo_address]' WHERE `tb_shopping`.`fahuo_id` = '$_POST[fahuo_id]';");
		$db->query("UPDATE `db_logistics`.`tb_car_log` SET `car_log` = '$_POST[car_log]' WHERE `tb_car_log`.`fahuo_id` = '$_POST[fahuo_id]';");
		echo "<script>alert('�������޸ĳɹ�!');window.location.href='indexs.php?lmbs=������ȷ���޸�';</script>";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ϵͳ</title>
</head>

<body>
<table  class="ziti" width="685" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  
  <tr><form name="form1" method="post" action="indexs.php?lmbs=������ȷ���޸�">
    <td width="195" height="26" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="75" bgcolor="#FFFFFF">���������</td>
    <td width="168" bgcolor="#FFFFFF"><input name="select" type="text" id="select" size="15"></td>
    <td width="284" bgcolor="#FFFFFF"><input type="submit" name="Submit" value="�ύ"></td> </form>
  </tr>
</table>
	<?php 
	if(isset($_POST['Submit']) && $_POST['Submit']==true){
		$query="select * from tb_shopping where fahuo_id='".$_POST['select']."'";
		$result=mysql_query($query);
		if(mysql_num_rows($result)<1){
			echo "�����ҵķ�������Ų����ڣ�";
		}else{
			$myrow=mysql_fetch_array($result);
	?>
<table  class="ziti" width="685" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
<form name="form2" method="post" action="">
<tr>
    <td colspan="5" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td width="83" align="center" bgcolor="#FFFFFF">��������ţ�</td>
    <td width="144" bgcolor="#FFFFFF"><?php echo $myrow['fahuo_id'];?></td>
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
          <option value="����������">����������</option>
          <option value="�����˸���">�����˸���</option>
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
    <td bgcolor="#FFFFFF"><a href="fhd_qr.php?fahuo_id=<?php echo $myrow['fahuo_id'];?>">����������ִȷ��</a></td>
    <td bgcolor="#FFFFFF"><input name="fahuo_id" type="hidden"   value="<?php echo $myrow['fahuo_id'];?>"/> </td>
    <td bgcolor="#FFFFFF"><input type="submit" name="into"  value="�޸ģ���"></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  </form>
</table>
<?php
	?>


<?php }}?>
</body>
</html>
<?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>