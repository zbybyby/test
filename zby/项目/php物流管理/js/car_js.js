function check_car_number(str){
	var Expression=/^[\u4E00-\u9FA5]?[a-zA-Z]-\w{5}$/; 	
	var objExp=new RegExp(Expression);
	return objExp.test(str)
}
function check_car(){
	if (form1.username.value == ""){
		alert("�û�������Ϊ�գ�");
		form1.username.focus();
		return (false);	 
	}
	//��֤���ƺ���
	if (form1.car_number.value==""){
		alert("���ƺ��벻��Ϊ�գ�");
		form1.car_number.focus();
		return (false);	 
	}
	
	if(form1.car_number.value.length!=8||isNaN(form1.car_number.value.substr(3,4))){
		alert("������ĳ��ƺ����ʽ����ȷ!");
		form1.car_number.focus();
		return (false);	
	}	
	if(!check_car_number(form1.car_number.value)){
		alert("������ĳ��ƺ����ʽ����ȷ!");
		form1.car_number.focus();return;	
	}	

    //��֤���֤����
	if(form1.user_number.value==""){
		alert("���������֤����!");
		form1.user_number.focus();
		return (false);
	}
	if(!(form1.user_number.value.length==15 || form1.user_number.value.length==18)){
	  alert("���֤��ֻ��Ϊ15λ��18λ!");
	  form1.user_number.focus();
	  return (false);
	}
	
	//��֤�绰����
		if(form1.user_tel.value==""){
		alert("������绰����!");
		form1.user_tel.focus();
		return (false);
	}
	
	//��֤��ַ
		if(form1.address.value==""){
		alert("�������ͥ��ַ!");
		form1.address.focus();
		return (false);
	}	
	    if(form1.car_content.value==""){
		alert("�����복����Ϣ!");
		form1.car_content.focus();
		return (false);
	}	
	    if(form1.car_road.value==""){
		alert("�����복����ʻ·��!");
		form1.car_road.focus();
		return (false);
	}
}

function check_admin(){
	if(form1.admin_user.value==""){
		alert("�������û���!");
		form1.admin_user.focus();
		return (false);
		}
    if(form1.admin_pass.value==""){
		alert("�����������!");
		form1.admin_pass.focus();
		return (false);
		}
		 if(form1.admin_new_pass.value==""){
		alert("������������!");
		form1.admin_new_pass.focus();
		return (false);
		}
 if(form1.admin_new_pass2.value==""){
		alert("������������!");
		form1.admin_new_pass2.focus();
		return (false);
		}
	 if(form1.admin_new_pass.value!=forms1.admin_new_pass2.value){
		alert("���������������ȷ�����벻��!");
		form1.admin_new_pass2.focus();
		return (false);
		}	
	}
function check_select_car(){
	if(form1.select1.value==""){
		alert("�����복��·��!");
		form1.select1.focus();
		return (false);
		}
    if(form1.select2.value==""){
		alert("�����복��·��!");
		form1.select2.focus();
		return (false);
		}

	}