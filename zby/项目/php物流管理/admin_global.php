<?php
session_start();
include_once ("./common/mysql.class.php"); //mysql��
include_once ("./configs/config.php"); //���ò���
include_once ("./admin/common/page.class.php"); //��̨ר�÷�ҳ��
include_once ("./admin/common/action.class.php"); //���ݿ������

$db = new action($mydbhost, $mydbuser, $mydbpw, $mydbname, ALL_PS, $mydbcharset); //���ݿ������.


?>