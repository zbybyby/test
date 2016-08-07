<?php
session_start();
include_once ("./common/mysql.class.php"); //mysql类
include_once ("./configs/config.php"); //配置参数
include_once ("./admin/common/page.class.php"); //后台专用分页类
include_once ("./admin/common/action.class.php"); //数据库操作类

$db = new action($mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset); //数据库操作类.


?>