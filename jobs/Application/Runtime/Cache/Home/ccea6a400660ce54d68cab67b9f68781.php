<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>登录页面</title>
	<link rel="stylesheet" type="text/css" href="/jobs/Public/CSS/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/jobs/Public/JS/bootstrap.min.js"></script>
</head>
<body>
<div class="container well" style="margin-top:100px;margin-left:auto;margin-right:auto;width:200px;">
	<h3><b>登录</b></h3>
	<h5>-----------------------------</h5>
	<form action="<?php echo U('Home/Index/loginHandle');?>" method="post" name="creator" onsubmit ="return checks()">
		<label>用户类型：</label><select name="type" id="yonghutype" onchange="check_type()">
			<option value="1">学生</option>
			<option value="2">企业</option>
			<option value="3">教师</option>
		</select></br>
		<label>用户名：</label>
		<input type="text" name="name" onblur="check_mail()" id="username" style="height:30px" class="span3 form-control"> <div style="color:red;display:none;" id="user1">用户名不能为空！</div><div style="color:red;display:none;" id="user2">邮箱格式不对</div>
		<label>密码：</label>
		<input type='password' name='password' id="password" style="height:30px" class="span3 form-control"></br>
		
		<input type="submit" class="btn btn-primary" value="登录" >
	</form>
</div>
	<script type="text/javascript">
	var username = document.getElementById('username');
	function check_name(){
		if(document.register.username.value == ''){
			user1.style.display = "inline";
			username.style.border = "1px solid red";
		}else{
			user1.style.display = "none";
			username.style.border = "1px solid grey";
		}
	}
	</script>
</body>
</html>