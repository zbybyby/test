<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ϵͳ</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
@media print{
div{display:none}
.bgnoprint{
	background:display:none;
}
.noprint{
	display:none
}
}
body {
	margin-top: 0px;
}
</style>
<script>     
  function printview()     
  {     
  document.all.WebBrowser1.ExecWB(7,1) ;
  window.close();  
  }     
 </script> 
<object   ID='WebBrowser1'   WIDTH=0   HEIGHT=0   CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>
<body class="bgnoprint">
<table width="935" height="145" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td background="images/index_03.jpg" class="bgnoprint">&nbsp;</td>
  </tr>
</table>
<table  class="ziti" width="935" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
  
  <tr>
    <td width="128" height="26" align="center" bgcolor="#FFFFFF">�ͻ�����</td>
    <td width="177" align="center" bgcolor="#FFFFFF">�绰</td>
    <td width="257" align="center" bgcolor="#FFFFFF">��ϵ��ַ</td>
    <td width="100" align="center" bgcolor="#FFFFFF">����</td>
  </tr>
 <?php 
 error_reporting(0);
 include("conn/conn.php");
 $query=mysql_query("select * from tb_customer ");
 while($myrow=mysql_fetch_array($query)){
  ?>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF"><?php echo $myrow['customer_user'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $myrow['customer_tel'];?></td>
    <td align="center" bgcolor="#FFFFFF"><?php echo $myrow['customer_address'];?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="delete_customer.php?delete=<?php echo $myrow['customer_id'];?>">ɾ��</a></td>
  </tr>

  <?php }?>
<tr>
    <td height="26" colspan="4" align="center" bgcolor="#FFFFFF"><div><a href="#" onClick="window.print();">�ͻ��굥��ӡ</a>&nbsp;<a href="#" onClick="printview();">��ӡԤ��</a></div></td>
  </tr>
</table>
<table class="bgnoprint" width="935" height="50" border="0" cellpadding="0" cellspacing="0" background="images/index_07.gif">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
