<?php
error_reporting(0);
if(!$_SESSION){
    session_start();
}
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
  <tr>   <form name="form2" method="post" action="indexs.php?lmbs=��Դ��Ϣ����">
  
    <td width="360" height="30" align="right" bgcolor="#FFFFFF">��Դ��Ϣ����
	
      <select name="select"  size=1>
	  <option selected="selected"></option>
        <?php 
	  $query="select * from tb_car";
	  $result=mysql_query($query);
	  while($myrow=mysql_fetch_array($result)){
	  ?>
	   <option><?php echo $myrow['car_number']; ?></option>
	  <?php } ?>
      </select>      </td>
    <td width="360" bgcolor="#FFFFFF">&nbsp; <input type="submit" name="Submit3" value="�ύ"> </td> </form>   
  </tr>
 
</table>
<?php
    $select = isset($_POST['select'])?$_POST['select']:'';
	  $querys="select * from tb_car where car_number='".$select."'";
	  $results=mysql_query($querys);
	 $myrows=mysql_fetch_array($results);
	  ?>
<form name="form1" method="post" action="car_insert_ok.php" onSubmit="javascript:return check_car(form1);">  
<table  class="ziti" width="685" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  
  <tr>
    <td width="80" height="26" align="center" bgcolor="#FFFFFF">������</td>
    <td width="218" bgcolor="#FFFFFF"><input name="username" type="text" id="username" size="25" value="<?php echo $myrows['username'];?>" /></td>
    <td width="83" height="22" align="center" bgcolor="#FFFFFF">���ƺ��룺</td>
    <td width="281" bgcolor="#FFFFFF"><input name="car_number" type="text" id="car_number" size="25" value="<?php echo $myrows['car_number'];?>" /></td>
  </tr>
  <tr>
    <td height="22" align="center" bgcolor="#FFFFFF">���֤�ţ�</td>
    <td bgcolor="#FFFFFF"><input name="user_number" type="text" id="user_number" size="28" value="<?php echo $myrows['user_number'];?>"/></td>
    <td rowspan="2" align="center" bgcolor="#FFFFFF">����������</td>
    <td rowspan="2" bgcolor="#FFFFFF"><textarea name="car_content" cols="30" rows="5" id="car_content"><?php echo $myrows['car_content'];?></textarea></td>
  </tr>
  <tr>
    <td height="22" align="center" bgcolor="#FFFFFF">�绰��</td>
    <td bgcolor="#FFFFFF"><input name="user_tel" type="text" id="user_tel" value="<?php echo $myrows['tel'];?>"/></td>
  </tr>
  <tr>
    <td height="22" align="center" bgcolor="#FFFFFF">��ַ��</td>
    <td bgcolor="#FFFFFF"><textarea name="address" id="address"><?php echo $myrows['address'];?></textarea></td>
    <td align="center" bgcolor="#FFFFFF">����·��: (��ʽ:xx--xx)</td>
    <td bgcolor="#FFFFFF"><textarea name="car_road" cols="30" rows="5" id="car_road"><?php echo $myrows['car_road'];?></textarea></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">    
    <select name="car_used">
        <option selected="selected"></option>
		<option>��������</option>
        <option>����</option>
      </select>  </td>
    <td align="right" bgcolor="#FFFFFF">
    <input type="submit" name="Submit" value="�ύ" /></td>
    
    <td align="center" bgcolor="#FFFFFF"><input type="submit" name="Submit2" value="�޸�"></td>
    <td bgcolor="#FFFFFF"><input type="submit" name="Submit4" value="ɾ��"></td>
  </tr>
</table>
</form>
</body>
</html>
<?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>