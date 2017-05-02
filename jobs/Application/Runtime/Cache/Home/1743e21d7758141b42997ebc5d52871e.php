<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>密码修改页面</title>
<link rel="stylesheet" type="text/css" href="/jobs/Public/CSS/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/jobs/Public/JS/bootstrap.min.js"></script>
<style type="text/css"> 

body{
	background:url('/jobs/Public/IMG/background.jpg');
}
</style>

</head>
<body class="text-center">
<div class="container well text-left" style="margin-top:100px;margin-left:auto;margin-right:auto;width:200px;">
	<h3>修改密码填写</h3>
	<h5>--------------------------------</h5>
	<form action="<?php echo U('Home/Index/passwordeditHandle');?>" method="post" name="register" onsubmit ="return checks()"/>
		<label>旧密码：</label>
		<input type="password" name="opassword" onblur="check_opassword()" id="opassword" style="height:30px" class="span3 form-control">
		<div style="color:red;display:none;" id="opassword1">旧密码不能为空！</br></div>
		<label>新密码：</label><br>
		<input type='password' name='password' id="password" style="height:30px" class="span3 form-control">
		<label>确认密码：</label><br>
		<input type="password" name='password1' id="password1" onblur="check_password()" style="height:30px" class="span3 form-control">
		<div style="color:red;display:none;" id="passwd1">两次密码不相同！<br></div><div style="color:red;display:none;" id="passwd2">密码8-16位<br></div>
		<input type="hidden" name="id" value="<?php echo ($id); ?>">
		<input type="submit" class="btn btn-primary text-center" value="修改" >
		<a href="javascript:history.go(-1)" class="btn btn-primary">返回</a>
	</form>
</div>
	<script type="text/javascript">
	var username = document.getElementById('opassword');
	var user1 = document.getElementById('opassword1');
	var passwd1 = document.getElementById('passwd1');
	var password = document.getElementById('password');
	var password1 = document.getElementById('password1');
	function check_opassword){
		if(document.register.opassword.value == ''){
			opassword1.style.display = "inline";
			opassword.style.border = "1px solid red";
		}else{
			opassword1.style.display = "none";
			opassword.style.border = "1px solid grey";
		}
	}
	function check_password(){
		var result = password1.value.match(/^\w{5,17}$/);
		if(password.value != password1.value){
			password.style.border = "1px solid red";
			password1.style.border = "1px solid red";
			passwd1.style.display = "inline";
		}else if(result == null){
			password.style.border = "1px solid red";
			password1.style.border = "1px solid red";
			passwd2.style.display = "inline";
			passwd1.style.display = "none";
		}else{
			password.style.border = "1px solid grey";
			password1.style.border = "1px solid grey";
			passwd1.style.display = "none";
			passwd2.style.display = "none";
		}
	}
	
	function checks(){
		var result = password1.value.match(/^\w{5,17}$/);
		var result1 = username.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
		if(username.value == ''){
			alert('用户名不能为空！');
			return false;
		}else if(result1 == null){
			alert('邮箱格式不正确！');
			return false;
		}else if(result == null){
			alert('密码格式不对！');
			return false;
		}else if(password.value != password1.value){
			alert('两次密码不相同！');
			return false;
		}else if(vercode.value != '12345678'&&typed.value == 2){
			alert('验证码出错！');
			return false;
		}else{
			return true;
		}
	}
	</script>
</body>
</html>