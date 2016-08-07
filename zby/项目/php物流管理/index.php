<?php 
error_reporting(0);
session_start();
if(!empty($_GET['reg']))
{
	echo "<script>alert('进入页面');window.location.href='register.php?';</script>";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户登录</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<script language="javascript">
  function chkinput(form){
  
    if(form.admin_user.value==""){
	  alert("请输入用户昵称!");
	  form.admin_user.select();
	  return(false);
	}
   if(form.admin_pass.value==""){
	  alert("请输入注册密码!");
	  form.admin_pass.select();
	  return(false);
	}
   return(true);
  }

</script>
<body>
<table width="800" height="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><table width="635" height="372" border="0" align="center" cellpadding="0" cellspacing="0" background="images/dl.jpg">
  <form name="form1" method="post" action="index.php"  onsubmit="return chkinput(this)">
    <tr>
      <td width="94" height="299"></td>
      <td width="106" ></td>
      <td width="66"></td>
      
      
      <td colspan="3"></td>
    </tr>
    <tr>
      <td height="39"></td>
      <td align="center"><input type="text" name="admin_user" class="inputcss" size="14" ></td>
      <td></td>
      <td width="106"  align="center"><input type="password" name="admin_pass" class="inputcss" size="14" ></td>
      <td width="96"><input type="image" name="imageField" src="images/dl_03.gif"></td>
      <td width="167"><input type="image" name="reset" src="images/dl_04.gif" onClick="form.reset();return false;" class="inputcss" ></td>
    </tr>
    </tr>
    <style>
      .img1{
	  position:absolute;
	  top:460px;
	  left:280px;
	  width:1000px;
	  height:120px;
	  }
	  </style>
 
    <tr>
      <td height="34"></td>
      <td></td>
      <td></td>
      <td colspan="3"></td>
    </tr>
  </form>
     <div class="img1">
          <input type="image" name="imageField2" src="images/dl_08.gif"  onclick="location.href='?reg=1'">
    </div>
  
</table></td>
  </tr>
</table>
<?php 



 if(isset($_POST['admin_user']) || isset($_POST['admin_pass'])){
mysql_query("set names gb2312");
$con = mysql_connect("localhost", "root", "123");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db("db_logistics",$con);
$sql = "SELECT * from tb_admin WHERE admin_user='$_POST[admin_user]'AND  `admin_pass`=md5('$_POST[admin_user]')";
$result = mysql_query($sql,$con);

$sql2 = "SELECT * from tb_admin WHERE admin_user='$_POST[admin_user]'AND  `admin_pass`=md5('$_POST[admin_user]')  AND `m_id`=0 ";
$result2 = mysql_query($sql2,$con);

$us= is_array($row =mysql_fetch_array($result));
$us2= is_array($row =mysql_fetch_array($result2));
//print_r(mysql_fetch_array($result));
if($us){
	$_SESSION['admin_user']=$_POST['admin_user'];
	$_SESSION['admin_pass']=md5($_POST['admin_pass']);
if($us2)
{
	echo "<script>alert('管理员登录成功!');window.location.href='indexs.php';</script>";
}
else
{echo "<script>alert('用户登录成功!');window.location.href='User_indexs.php';</script>";
}
}
else{
	echo "<script>alert('登录失败!');</script>";
}
mysql_close($con);
 /* 	$conn=new mysqli("localhost","root","123","db_logistics");
    $conn->query("set names gb2312");   
    $admin_user=$_POST['admin_user'];
    $admin_pass=md5($_POST['admin_pass']);
    //$query=$conn->query("SELECT * FROM `tb_admin` WHERE `admin_user`=$admin_user AND  `admin_pass`=$admin_pass");
    $sql=$conn->query("SELECT * FROM `tb_admin` WHERE `admin_user`=$_POST[admin_user] AND  `admin_pass`=md5($_POST[admin_pass]");
    $sql2=$conn->query("SELECT * FROM `tb_admin` WHERE `admin_user`=$admin_user AND  `admin_pass`=$admin_pass AND `m_id`=0");
    $sql3=$conn->query("SELECT * FROM `tb_admin` WHERE `admin_user`=$admin_user AND  `admin_pass`=$admin_pass AND `m_id`=2");
  //  print_r(mysql_fetch_array($sql));
   // $res=$sql->fetch_array(MYSQL_BOTH);
    if(!$sql){
	$_SESSION['admin_user']=$_POST['admin_user'];
	$_SESSION['admin_pass']=md5($_POST['admin_pass']);
		if($sql2)
		{
		echo "<script>alert('管理员登录成功!');window.location.href='indexs.php';</script>";
		}
		else
		{echo "<script>alert('用户登录成功!');window.location.href='User_indexs.php';</script>";
		}
		}
	else{
	    echo "<script>alert('登录失败!');</script>";
	}
   
 */
}
?>





</body>
</html>
