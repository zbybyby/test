<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ϵͳ</title>
</head>

<body>
<form name="form1" method="post" action="customer_ok.php">
<table  class="ziti" width="685" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  <tr>
    <td colspan="2" align="center" bgcolor="#FFFFFF">�ͻ���Ϣ����</td>
  </tr>
  <tr>
    <td width="98" height="26" align="center" bgcolor="#FFFFFF">�ͻ�������</td>
    <td width="574" bgcolor="#FFFFFF"><input name="customer_user" type="text" id="customer_user" size="25" /></td>
  </tr>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF">�绰��</td>
    <td bgcolor="#FFFFFF"><input name="customer_tel" type="text" id="customer_tel" size="20" /></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">��ϵ��ַ</td>
    <td bgcolor="#FFFFFF"><textarea name="customer_address" cols="30" id="customer_address"></textarea></td>
  </tr>
  <tr>
    <td height="26" bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><input type="submit" name="Submit" value="�ύ" /></td>
  </tr>
</table>
</form>
<table  class="ziti" width="685" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  
  <tr>
    <td width="128" height="26" align="center" bgcolor="#FFFFFF">�ͻ�����</td>
    <td width="177" align="center" bgcolor="#FFFFFF">�绰</td>
    <td width="257" align="center" bgcolor="#FFFFFF">��ϵ��ַ</td>
    <td width="100" align="center" bgcolor="#FFFFFF">����</td>
  </tr>
 <?php 
 error_reporting(0);
 include("conn/conn.php");
include_once ('admin_global.php');
// $query=mysql_query("select * from tb_customer ");
 //while($myrow=mysql_fetch_array($query)){

$result = mysql_query("select customer_id from tb_customer");
$total = mysql_num_rows($result);
pageft($total, 10);
//alert("$total");
if ($firstcount < 0) $firstcount = 0;
$query = $db->findall("tb_customer limit  $firstcount, $displaypg");
while ($myrow = $db->fetch_array($query)) {



  ?>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF"><?php echo $myrow['customer_user'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $myrow['customer_tel'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $myrow['customer_address'];?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="delete_customer.php?delete=<?php echo $myrow['customer_id'];?>">ɾ��</a></td>
  </tr>
  	
  <?php }?>
  <tr>
		<th colspan="4"><?php echo $pagenav;?></th>
	</tr>
  
</table>
<p><div><a href="css_print.php">�ͻ��굥��ӡ</a>&nbsp;<a href="css_print.php">��ӡԤ��</a></div></p>
</body>
</html>
