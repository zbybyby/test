<?php 
error_reporting(0);
session_start(); 
include("conn/conn.php");
if($_SESSION['admin_user']==true){
	if(isset($_POST['Submit']) && $_POST['Submit']==true){
    	if(preg_match("/\d{17}[\d|X]|\d{15}/",$_POST['user_number'])){
             if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['user_tel'])){
   				$query=mysql_query("insert into tb_car(username,user_number,tel,address,car_number,car_road,car_content)values('".$_POST['username']."','".$_POST['user_number']."','".$_POST['user_tel']."','".$_POST['address']."','".$_POST['car_number']."','".$_POST['car_road']."','".$_POST['car_content']."')");
   				if($query==true){
	   				echo "<script>alert('��Դ��Ϣ��ӳɹ�!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";   }	   
	         	}else{
                	echo "<script>alert('������ĵ绰�����ʽ����ȷ!!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";
             	}
        	}else{
           		echo "<script>alert('����������֤����ĸ�ʽ����ȷ!!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";
        	}
	} 
	if(isset($_POST['Submit2']) && $_POST['Submit2']=="�޸�"){
    	if(preg_match("/\d{17}[\d|X]|\d{15}/",$_POST['user_number'])){
        	if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['user_tel'])){
                $query="update tb_car set username='".$_POST['username']."', user_number='".$_POST['user_number']."', tel='".$_POST['user_tel']."', address='".$_POST['address']."', car_number='".$_POST['car_number']."', car_road='".$_POST['car_road']."', car_content='".$_POST['car_content']."' ,car_used='".$_POST['car_used']."'where car_number='".$_POST['car_number']."'";
   				$result=mysql_query($query);
   				if($result==true){
 	   				echo "<script>alert('��Դ���ݸ��³ɹ�!!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";
   				}
       		}else{
                echo "<script>alert('������ĵ绰�����ʽ����ȷ!!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";
            }
        }else{
           echo "<script>alert('����������֤����ĸ�ʽ����ȷ!!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";
        }
	}
	if(isset($_POST['Submit4']) && $_POST['Submit4']=="ɾ��"){
   		$query="delete  from tb_car where car_number='".$_POST['car_number']."'";
   		$result=mysql_query($query);
   		if($result==true){
 			echo "<script>alert('��Դ����ɾ���ɹ�!');window.location.href='indexs.php?lmbs=��Դ��Ϣ����';</script>";
   		}
	}
}else{
	echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}
?>