
var xmlHttp;
function S_xmlhttprequest() {
	if(window.ActiveXObject) {
		
		
		xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
	} else if(window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
	}
}

function funphp100() {
	
   var f=document.register.admin_user.value;
  // alert("1111111111111111111111");
	S_xmlhttprequest();
	
	xmlHttp.open("GET","admin_register_html.php?id="+f,true);
	xmlHttp.onreadystatechange = byphp;
	xmlHttp.send(null);
//	alert("1");
}

function byphp() {
    	if(xmlHttp.readyState == 4 ){
    	
		if(xmlHttp.status == 200) {	
          var byphp100 =  xmlHttp.responseText;
          document.getElementById('RegisterCheck').innerHTML = byphp100;
		}
	}


}







