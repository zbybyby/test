<?php
error_reporting(0);
include("conn/conn.php");		//�������ݿ�
	if($_GET['delete']==true){					//�ж��ύ�ı���ֵ�Ƿ�Ϊ��
		//����$_GET��ȡ�ı���ֵΪ���ݣ�ִ��ɾ�����
		$query=mysql_query("delete from tb_customer  where customer_id='".$_GET['delete']."'");
		if($query){
			echo "<script> alert('�ͻ���Ϣɾ���ɹ�');window.location.href='indexs.php?lmbs=�ͻ���Ϣ����';</script>";
		}
	}
?>