<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>注册页面</title>
<link rel="stylesheet" type="text/css" href="/jobs/Public/CSS/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/jobs/Public/JS/bootstrap.min.js"></script>
<style type="text/css"> 

body{
	background:url('/jobs/Public/IMG/aaa.jpg');
}
</style>
</head>
<body>
<div class="container well" style="margin-top:100px;margin-left:auto;margin-right:auto;width:200px;">
	<div style="width:100%;border-bottom:2px dashed black"><h3>注册信息填写</h3></div>
	<form action="<?php echo U('Home/Index/registerHandle');?>" method="post" name="register" onsubmit ="return checks()"/>
		<input type="hidden" name="type" value="2">
		<label>用户名(企业邮箱)：</label>
		<input type="text" name="name" onblur="check_mail()" id="username" style="height:30px" class="span3 form-control">
		<div style="color:red;display:none;" id="user1">用户名不能为空！</br></div><div style="color:red;display:none;" id="user2">邮箱格式不对</br></div>
		<label>密码：</label><br>
		<input type='password' name='password' id="password" style="height:30px" class="span3 form-control">
		<label>确认密码：</label><br>
		<input type="password" name='password1' id="password1" onblur="check_password()" style="height:30px" class="span3 form-control">
		<div style="color:red;display:none;" id="passwd1">两次密码不相同！<br></div><div style="color:red;display:none;" id="passwd2">密码8-16位<br></div>
		<div id="varcode"><label>验证码:</label><br><input type="text" name="vercode" id="vercode" class="form-control"></div><br>
		<input type="submit" class="btn btn-primary text-center" value="注册" >
		<a class="btn btn-success" href="<?php echo U('Home/Index/index');?>">登录页面</a>
	</form>
</div>
	<script type="text/javascript">
	var typed = document.getElementById('yonghutype');
	var vcode1 = document.getElementById('vcode1');
	var varcode = document.getElementById('varcode');
	var vercode = document.getElementById('vercode');
	var username = document.getElementById('username');
	var user1 = document.getElementById('user1');
	var user2 = document.getElementById('user2');
	var passwd1 = document.getElementById('passwd1');
	var password = document.getElementById('password');
	var password1 = document.getElementById('password1');
	function check_name(){
		if(document.register.username.value == ''){
			user1.style.display = "inline";
			username.style.border = "1px solid red";
		}else{
			user1.style.display = "none";
			username.style.border = "1px solid grey";
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
	function check_mail(){
		var result = username.value.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
		if(username.value == ''){
			user1.style.display = "inline";
			username.style.border = "1px solid red";
		}else if(result == null){
			user2.style.display = "inline";
			username.style.border = "1px solid red";
			user1.style.display = "none";
		}else{
			user1.style.display = "none";
			user2.style.display = "none";
			username.style.border = "1px solid grey";
		}
	}
	function check_type(){
		if(typed.value == 2){
			varcode.style.display = "inline";
		}else{
			varcode.style.display = "none";
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