var check_name=0;
var check_passwd=0;
var check_passwd_same=0;
var xmlHttp;

    function xmlrequest(){
        if (window.ActiveXObject){
            xmlHttp=new ActiveXObject('Microsoft.XMLHTTP');
        }
        else if (window.XMLHttpRequest){
            xmlHttp=new XMLHttpRequest();
        }
    }

    function check_user_name(name){
    	if (name.length>20){
    		document.getElementById("emphasize1").innerHTML="用户名过长！";
    		check_name=0;
    	}
    	else if (name==""){
    		document.getElementById("emphasize1").innerHTML="用户名不能为空！";
    		check_name=0;
    	}
    	else
        {
            xmlrequest();
            xmlHttp.open("POST","/together/index.php/register/check/"+name,true);
            xmlHttp.onreadystatechange=function(){ 
                if (xmlHttp.readyState==1){
                    document.getElementById("emphasize1").innerHTML="验证中";
                }          
                if (xmlHttp.responseText=="1"){
                    document.getElementById("emphasize1").innerHTML="该用户名已被注册";
                }
                else{
                    document.getElementById("emphasize1").innerHTML="该用户名可以注册";
                    check_name=1;
                }
            }
            xmlHttp.send(null);
        }
        if (check_name==1 && check_passwd==1 && check_passwd_same==1){
            document.getElementById("submit").disabled=false;
        }
        else{
            return false;
        }
    }

    function check_user_passwd(){
    	var passwd=document.register.user_passwd.value;
    	if (passwd.length<6){
    		document.getElementById("emphasize2").innerHTML="密码过短！";
    		check_passwd=0;
    	}
    	else{
            document.getElementById("emphasize2").innerHTML="";
            check_passwd=1;
        }
        if (check_name==1 && check_passwd==1 && check_passwd_same==1){
            document.getElementById("submit").disabled=false;
        }
        else{
            return false;
        }
    }

    function check_user_passwd_same(){
        var check=0;
    	var passwd1=document.register.user_passwd.value;
    	var passwd2=document.register.user_passwd_again.value;
    	if (passwd1!=passwd2){
    		document.getElementById("emphasize3").innerHTML="两次输入的密码不一致！";
    	    check_passwd_same=0;
        }
    	else{
    		document.getElementById("emphasize3").innerHTML="";
            check_passwd_same=1; 
        }
        if (check_name==1 && check_passwd==1 && check_passwd_same==1){
            alert("ok");
            document.register.submit.disabled=false;
        }
        else{
            return false;
        }
    }
