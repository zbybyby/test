<?php
error_reporting(0);
if(isset($_POST['tb_admin']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/report_form/tb_admin_excel.php';</script>";
}
if(isset($_POST['tb_car']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/report_form/tb_car_excel.php';</script>";
}

if(isset($_POST['tb_car_log']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/report_form/tb_car_log_excel.php';</script>";
}

if(isset($_POST['tb_customer']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/report_form/tb_customer_excel.php';</script>";
}

if(isset($_POST['tb_shopping']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/report_form/tb_shopping_excel.php';</script>";
}

if(isset($_POST['tb_bf']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/admin/mysqlbh.php';</script>";
}
if(isset($_POST['fhtj']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/pain_fh.php';</script>";
}
if(isset($_POST['tb_hy']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/admin/mysqlhy.php';</script>";
}
if(isset($_POST['shtj']))
{
	echo "<script>alert('正在进入页面');window.location.href='../Program/Copyofpain_fh.php';</script>";
}



?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>物流管理系统</title>
</head>
<body>
<table  class="ziti" width="385" border="1" cellpadding="1" cellspacing="1" bordercolor="#FFFFFF" bgcolor="#666666">
 <form id="form1" name="form1" method="post" action="" >
  <tr>
    <td height="26" colspan="2" align="center" bgcolor="#FFFFFF">报表生成</td>
    </tr>
  <tr>
    <td width="605" height="26" align="center" bgcolor="#FFFFFF">用户名密码表格</td>
    <td width="567" bgcolor="#FFFFFF" align="center"><input name="tb_admin" type="submit" id="tb_admin"  style="width:80px;"  value="生成表单" /></td>
  </tr>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF">货车表格</td>
    <td bgcolor="#FFFFFF" align="center"><input name="tb_car" type="submit" id="tb_car" style="width:80px;"  value="生成表单"/></td>
  </tr>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF">运送相关信息表格</td>
    <td bgcolor="#FFFFFF" align="center"><input name="tb_car_log" type="submit" id="tb_car_log" style="width:80px;"  value="生成表单"/></td>
  </tr>
  <tr>
    <td height="26" align="center" bgcolor="#FFFFFF">顾客信息表格</td>
    <td bgcolor="#FFFFFF" align="center"><input name="tb_customer" type="submit" id="tb_customer" style="width:80px;"  value="生成表单"/></td>
  </tr>
   <tr>
    <td height="26" align="center" bgcolor="#FFFFFF">订单信息表格</td>
    <td bgcolor="#FFFFFF" align="center"><input name="tb_shopping" type="submit" id="tb_shopping" style="width:80px;"  value="生成表单"/></td>
  </tr>
    <tr>
    <td height="26" colspan="2" align="center" bgcolor="#FFFFFF">数据库操作</td>
    </tr>
    <tr>
    <td width="605" height="26" align="center" bgcolor="#FFFFFF">数据库备份</td>
    <td width="567" bgcolor="#FFFFFF" align="center"><input name="tb_bf" type="submit" id="tb_bf"  style="width:80px;"  value="备份" /></td>
  </tr>
   <tr>
    <td width="605" height="26" align="center" bgcolor="#FFFFFF">数据库还原</td>
    <td width="567" bgcolor="#FFFFFF" align="center"><input name="tb_hy" type="submit" id="tb_hy"  style="width:80px;"  value="备份" /></td>
  </tr>
   <tr>
    <td height="26" colspan="2" align="center" bgcolor="#FFFFFF">统计</td>
    </tr>
    <tr>
    <td width="605" height="26" align="center" bgcolor="#FFFFFF">发货统计</td>
    <td width="567" bgcolor="#FFFFFF" align="center"><input name="fhtj" type="submit" id="fhtj"  style="width:80px;"  value="查看" /></td>
</tr>
<tr>
    <td width="605" height="26" align="center" bgcolor="#FFFFFF">收货统计</td>
    <td width="567" bgcolor="#FFFFFF" align="center"><input name="shtj" type="submit" id="shtj"  style="width:80px;"  value="查看" /></td>
  </tr>
  <tr>
  
  
 </form>
</table>


</body>
</html>
