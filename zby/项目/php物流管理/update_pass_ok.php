<?php
error_reporting(0);
session_start();
class chkuser{
	var $admin_user;
   	var $admin_pass;
   	var $admin_new_pass;
   	var $admin_new_pass2;
	var $yzm;
  	function chkuser($x,$y,$m,$n,$z){
    	$this->admin_user=$x;
    	$this->admin_pass=$y;
		$this->admin_new_pass=$m;
		$this->admin_new_pass2=$n;
		$this->yzm=$z;
   	}
   function chkinput(){
   		if(strval($this->yzm)!=$_SESSION["autonum1"]){
        	echo "<script>alert('��֤���������!');history.back();</script>";
        	exit;
  		}else{
			unset($_SESSION['autonum1']);
		}
  	include("conn/conn.php");
	
		$query=mysql_query("select * from tb_admin where admin_user='".$this->admin_user."' and admin_pass='".$this->admin_pass."'");
		if(mysql_num_rows($query)<1){
   			echo "<script>alert('����������벻��ȷ������������');history.back();</script>";
  		}else{
			$query1=mysql_query("update tb_admin set admin_pass='".$this->admin_new_pass."' where admin_user='".$this->admin_user."' and admin_pass='".$this->admin_pass."'");
  			if($query1==true){
   				echo "<script>alert('������ĳɹ�');history.back();</script>";
 			}
		}
	}
}
 $chk=new chkuser($_POST['admin_user'],md5($_POST['admin_pass']),md5($_POST['admin_new_pass']),$_POST['admin_new_pass2'],$_POST['yzm']);
 $chk->chkinput();
?>