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
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<table  class="ziti" width="687" border="0" cellpadding="0" cellspacing="0" bordercolor="#FFFFFF" bgcolor="#666666">
  <tr>
    <td align="center" bgcolor="#FFFFFF">
	<iframe name="content" src="insert_dds.php?ljid=<?php echo isset($_GET['ljid'])?$_GET['ljid']:'';?>"  frameborder="0" width="97%" height="252%"></iframe></td>
    </tr>
  <tr>
    <td height="28" align="center" valign="top" bgcolor="#FFFFFF">&nbsp;&nbsp;
   <script language="javascript">
  function check_dd(){
		 if(content.form5.fahuo_id.value==""){
		alert("�����붩�����!");
		content.form5.fahuo_id.focus();
		return (false);
		}	
		 if(content.form5.fahuo_user.value==""){
		alert("�����뷢����");
		content.form5.fahuo_user.focus();
		return (false);
		}	
		
		 if(content.form5.fahuo_content.value==""){
		alert("�����������Ϣ!");
		content.form5.fahuo_content.focus();
		return (false);
		}	
		 if(content.form5.fahuo_address.value==""){
		alert("�����뷢����ַ!");
		content.form5.fahuo_address.focus();
		return (false);
		}	
		 if(content.form5.shouhuo_user.value==""){
		alert("�������ջ���!");
		content.form5.fahuo_user.focus();
		return (false);
		}	
	 if(content.form5.shouhuo_address.value==""){
		alert("�������ջ���ַ!");
		content.form5.fahuo_address.focus();
		return (false);
		}	
			 if(content.form5.car_log.value==""){
		alert("�����복��ʹ����Ϣ!");
		content.form5.car_log.focus();
		return (false);
		}	
content.form5.submit()
}
 </script>

      <input type="button" value="�ύ" onClick="check_dd()">      &nbsp;&nbsp;
      <input type="button" value="����" onClick="content.form5.reset()">
      &nbsp;&nbsp;
<a href="#" onClick="parent.content.focus();window.print();"><img src="images/dl_033.gif" width="87" height="27" border="0"></a></td>
  </tr>
</table>

</body>
</html>
<?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>