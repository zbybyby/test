<?php 
error_reporting(0);
session_start(); include("conn/conn.php");
if($_SESSION['admin_user']==true){
	if(isset($_GET['lmbs'])){
			$lmbs=$_GET['lmbs'];
		}else{
			$lmbs="";
		}
	if(isset($_GET['ljid'])){
			$ljid=$_GET['ljid'];
		}else{
			$ljid="";
		}
		
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������ϵͳ</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<body><center>
<table border="0" cellpadding="0" cellspacing="0">
  <tr><td><img src="images/index_01_02.gif" width="935" height="24" border="0" usemap="#Map"></td>
</tr></table>
<img src="images/index_03.jpg" width="940" height="195">
<table width="935" height="428" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="224" height="428" align="center" valign="top" bgcolor="#F5F5F5"><table width="224" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="26" colspan="2" align="center"><img src="images/index_05_01.gif" width="222" height="28"></td>
        </tr>
      <tr>
        <td width="31" height="26" align="center">&nbsp;</td>
        <td width="193" align="center">&nbsp;</td>
      </tr>
      <tr onMouseOver="this.bgColor='#9FCB3A'"onMouseOut="this.bgColor='#F5F5F5'" >
        <td height="28" align="center">&nbsp;</td>
        <td align="left"><a href="User_indexs.php?lmbs=��������ѯ">��������ѯ</a></td>
      </tr>
      <tr onMouseOver="this.bgColor='#9FCB3A'"onMouseOut="this.bgColor='#F5F5F5'" >
        <td height="28" align="center">&nbsp;</td>
        <td align="left"><a href="User_indexs.php?lmbs=��ѯ�˷�">�˷Ѳ�ѯ</a></td>
      </tr>
      <tr onMouseOver="this.bgColor='#9FCB3A'"onMouseOut="this.bgColor='#F5F5F5'" >
        <td height="28" align="center">&nbsp;</td>
        <td align="left"><a href="User_indexs.php?lmbs=�޸��û�����">�޸�����</a></td>
      </tr>
      <tr>
        <td height="28" align="center">&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td height="28" align="center">&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td height="28" colspan="2" align="center"><img src="images/index_05_03.gif" width="222" height="169"></td>
        </tr>
    </table></td>
    <td width="5"></td>
    <td width="706" height="428" align="right" valign="top" bgcolor="#FFFFFF"><table width="700" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25" bgcolor="#E5E5E5">&nbsp;</td>
        </tr>
      <tr>
        <td height="25">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" valign="top" bgcolor="#FFFFFF"><?php
        if(isset($_GET['lmbs']) && $_GET['lmbs'] != ''){

            switch($_GET['lmbs']){
                case "��������ѯ":
                    include("User_hwys.php");
                    break;
                case "��ѯ�˷�":
                    include("select.php");//./search_money/index.php
                    break;
                case "�޸��û�����":
                    include("update_pass.php");
                    break;
            }
        }else{
            include("update_pass.php");
        }
	?></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="935" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/index_07.gif" width="935" height="50"></td>
  </tr>
</table>
</center>

<map name="Map">
<area shape="rect" coords="860,5,923,18" href="tc_dl.php">
<area shape="rect" coords="768,6,832,22" href="#"></map></body>
</html>
<?php 
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>