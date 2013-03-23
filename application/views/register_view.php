<!--ajax验证用户名是否重复-->

<html>

<head>

<style type="text/css">
    #emphasize1,#emphasize2,#emphasize3{
    	font-weight:bold;
    	font-size:15px;
    }
    .submit{
    	font-weight:bold;
    	font-size:20px;
        position: fixed;
        left:170px;
    }
</style>

<script type="text/javascript" src="<?php echo base_url(); ?>items/js/register.js">
</script>

</head>

<body>

<form name="register" method="POST" action="/together/index.php/register/info" onsubmit="return check_register();">
    用户名<input name="user_name" type="text" size="20" onblur="return check_user_name(this.value);"><span id="emphasize1">不可超过20个字符</span></br>
    密&nbsp;&nbsp;码<input name="user_passwd" type="password" onblur="return check_user_passwd();"><span id="emphasize2">不可少于6个字符</span></br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="user_passwd_again" type="password" onblur="return check_user_passwd_same();"><span id="emphasize3">重复输入密码</span></br>
    性&nbsp;&nbsp;别<input name="user_sex" type="radio" value="1" checked>男
	                  <input name="user_sex" type="radio" value="0">女</br>
	<input name="submit" class="submit" type="submit" disabled="disabled" value="提交">
</form>

</body>



</html>