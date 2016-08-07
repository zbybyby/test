<?php

error_reporting(0);
include_once('admin_global.php');
mysql_query("set names g2312");
if($_GET[id])
{
	$db2 = new action($mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset);
	$q=$db2->query("SELECT * FROM `tb_admin` WHERE `admin_user` LIKE '$_GET[id]'");
	if(is_array(mysql_fetch_row($q))){
	echo "<font color=red>Username exist</font>";//
	}else
	{
	echo "<font color=red>Usable</font>";;        //  <script type="text/javascript" src="ajax.js"></script>
	}
}
 
?>