<?php
error_reporting(0);
session_start(); 
if($_SESSION['admin_user']==true){
include("conn/conn.php");
$fahuo_time=date("Y-m-d H:i:s");
    if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['car_tel'])){
	    if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['fahuo_tel'])){
            if(preg_match("/^(\d{3}-)(\d{8})$|^(\d{4}-)(\d{7})$|^(\d{4}-)(\d{8})$|^(\d{11})$/",$_POST['shouhuo_tel'])){
  $query="insert into tb_shopping (car_number,car_tel,fahuo_id,fahuo_user, fahuo_tel,fahuo_address,fahuo_content,fahuo_time,fahuo_fk,shouhuo_user,shouhuo_address,shouhuo_tel)values('".$_POST['car_number']."','".$_POST['car_tel']."','".$_POST['fahuo_id']."','".$_POST['fahuo_user']."','".$_POST['fahuo_tel']."','".$_POST['fahuo_address']."','".$_POST['fahuo_content']."','".$fahuo_time."','".$_POST['fahuo_fk']."','".$_POST['shouhuo_user']."','".$_POST['shouhuo_address']."','".$_POST['shouhuo_tel']."')";
                $result=mysql_query($query);
  $querys="insert into tb_car_log(car_log,car_number,log_date,fahuo_id)values('".$_POST['car_log']."','".$_POST['car_number']."','".$fahuo_time."','".$_POST['fahuo_id']."')";
  $results=mysql_query($querys);
  $queryss="insert into tb_customer (customer_user,customer_tel,customer_address)values('".$_POST['fahuo_user']."','".$_POST['fahuo_tel']."','".$_POST['fahuo_address']."')";
  $resultss=mysql_query($queryss);

  echo "<script>alert('��������ӳɹ�!');history.back();</script>"; 

      }else{
                echo "<script>alert('��������ջ��˵ĵ绰�����ʽ����ȷ!!');history.back()</script>";
             }
        }else{
           echo "<script>alert('������ķ����˵ĵ绰�����ʽ����ȷ!!');history.back()</script>";
        }
    }else{
         echo "<script>alert('������ĳ����ĵ绰�����ʽ����ȷ!!');history.back()</script>";
    }
}else{
echo "<script>alert('������ȷ��¼��'); window.location.href='index.php';</script>";
}

?>