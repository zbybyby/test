
<?php
include_once ("admin_register_html.php");
include_once("conn/conn.php");
//error_reporting(0);
include_once('admin_global.php');
mysql_query("set names g2312");
//$query=mysql_query("select * from tb_customer ");
 if(!empty($_POST['admin_user'])&& !empty($_POST['admin_pass']))
 {
 		
 		$passwordfinall=md5($_POST[admin_pass]);
		$db1 = new action($mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset);
	//	$query=mysql_query("select * from tb_customer ");		//$db1->query("");	
 	//$conn=new mysqli("localhost","root","123","db_logistics");
 	//	$conn->query("set names gb2312");
 	/*$sql=$conn->query("INSERT INTO `db_logistics`.`tb_admin` (`id`, `admin_user`, `admin_pass`, `m_id`, `name`) VALUES (NULL, '$_POST[admin_user]', '$passwordfinall', '2', '11');");
 		if(empty($sql)){
 			echo "<script>alert('管理员登录成功!');window.location.href='index.php';</script>";    '$_POST[admin_user]'       '$passwordfinall'
 		}else{
 			echo "<script>alert('管理员登录失败!');</script>";}*/

		
 		$db1->query("INSERT INTO `db_logistics`.`tb_admin` (`id`, `admin_user`, `admin_pass`, `m_id`, `name`) VALUES (NULL, '$_POST[admin_user]', '$passwordfinall', '2', '0');");
		;$db1->Get_admin_msg("index.php","successful!!");
		
 }
?>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name='Author' content='Alan'>
<link rev=MADE href='mailto:haowubai@hotmail.com'><title>后台管理</title>
<link rel='stylesheet' type='text/css' href='images/private.css'>
<script> if(self!=top){ window.open(self.location,'_top'); } </script>
</head><body>
	<script type="text/javascript" src="ajax.js" >  </script>
	  <style>
	  .background1{
	  position:absolute;
	  top:95px;
	  left:300px;
	  width:1000px;
	  height:120px;
	  }
	  </style>
	 
	  <div class="background1">
	  <img src="dl.jpg"/> 
	  </div>
	  
	  <form name="register" action="" method="post" >
	  <style>
	  .div1{
	  position:absolute;
	  top:350px;
	  left:293px;
	  width:647px;
	  height:150px;
	  background:background-imge:url(images/dl.jpg);
	   }
	  </style>
	   
	<div class="div1">
	
	<table border=0 cellspacing=1 align=center class=form >
	<tr>
		<th colspan="2"  background-color:#79FF79>用户注册</th>
	</tr>
     	  <tr>
  <td align="right">登录用户名</td>
  <td><input type="text" name="admin_user" value="" size="20" maxlength="40"  onblur="funphp100()"/></td>
  </tr>
  
       	  <tr>
  <td align="right">登录密码</td>
  <td><input type="password" name="admin_pass" value="" size="20" maxlength="40"/>  </td>
  </tr>
  	
  <tr>
    <td colspan="2" align="center" height='30'>
  <input type="submit" name="update1" value=" 提交" />
   
   <style>
	  </style>
  
  <div class="xs" id="RegisterCheck"></div>


  </td>  </form>
    </tr>
	</table>
</div>
	
	
	</body></html>




















