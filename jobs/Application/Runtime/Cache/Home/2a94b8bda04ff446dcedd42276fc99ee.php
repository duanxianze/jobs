<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>登录页面</title>
	<link rel="stylesheet" type="text/css" href="/jobs/Public/CSS/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/jobs/Public/JS/bootstrap.min.js"></script>
<style type="text/css"> 

body{
	background:rgba(0,0,0,0.7) url('/jobs/Public/IMG/bg.jpg') no-repeat;background-position :center; background-attachment: fixed;
}
.ifm{
	
	overflow:hidden; 
}
.login{
            background:rgba(0,0,0,0.7);
            width:100%;
            height:65px;
            padding-left: 0;
            padding-right:0;
            padding-top:8px;
            position:fixed;
            bottom:0px;
            color:#000;
        }
		.state{
            background:rgba(0,0,0,0.7);
            width:100%;
            height:65px;
            padding-left: 0;
            padding-right:0;
            padding-top:8px;
            color:#fff;
        }
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter:alpha(opacity=88);
        }
        .white_content {
            display: none;
            position: absolute;
            top: 5%;
            left: 5%;
            width: 85%;
            height: 85%;
            padding: 10px;
            border: 10px solid orange;
            background-color: white;
            z-index:1002;
            overflow: auto;
        }
		ul li{list-style-type:none;margin:0;padding:0}

</style>
    <script type="text/javascript" src="http://www.16sucai.com/uploadfile/show2012/20121111001/js/jquery.pause.min.js"></script>
    <!--滚动效果js-->
    <script type="text/javascript">
	$(function () {
    var scrtime;

    var $ul = $("#con ul");
    var liFirstHeight = $ul.find("li:first").height();//第一个li的高度
    $ul.css({ top: "-" + liFirstHeight - 20 + "px" });//利用css的top属性将第一个li隐藏在列表上方	 因li的上下padding:10px所以要-20

    $("#con").hover(function () {
        $ul.pause();//暂停动画
        clearInterval(scrtime);
    }, function () {
        $ul.resume();//恢复播放动画	
        scrtime = setInterval(function scrolllist() {
            //动画形式展现第一个li
            $ul.animate({ top: 0 + "px" }, 1500, function () {
                //动画完成时
                $ul.find("li:last").prependTo($ul);//将ul的最后一个剪切li插入为ul的第一个li
                liFirstHeight = $ul.find("li:first").height();//刚插入的li的高度
                $ul.css({ top: "-" + liFirstHeight - 20 + "px" });//利用css的top属性将刚插入的li隐藏在列表上方  因li的上下padding:10px所以要-20					
            });
        }, 3300);

    }).trigger("mouseleave");//通过trigger("mouseleave")函数来触发hover事件的第2个函数

});
	</script>

</head>
<body>

<div class='login'>
	<div style="width:900px;margin:0 auto;">
	<form action="<?php echo U('Home/Index/loginHandle');?>" method="post" name="creator" onsubmit ="return checks()" class="form-inline" role="form">
	
  <div class="form-group">
		<label>用户类型：</label><select name="type" id="yonghutype" onchange="check_type();nametype();">
			<option value="1" name="option1">学生</option>
			<option value="2" name="option2">企业</option>
			<option value="3" name="option3">教师</option>
		</select>
	</div>	
	<div class="form-group">
		<label id="nametype">学号:</label>
		<input type="text" name="name" onblur="check_mail()" id="username" style="height:30px" class="span3 form-control"> 
		</div>	
	<div class="form-group">
		<label>密码：</label>
		<input type='password' name='password' id="password" style="height:30px" class="span3 form-control">
		
		<input type="submit" class="btn btn-primary" value="登录" style="border:none;" >
		</div>	
	<div class="form-group">
		<a class="btn btn-success" href="<?php echo U('Home/Index/register');?>" style="margin-left:1%;">企业注册</a>
		</div>
	</form>
	</div>
</div>
<div id='con' class="text-right container state ifm" style="margin-top:20px;width:250px;float:right;height:300px;overflow-y:auto;">
		<div style='position:relative;left:-30px;font-size:12px;' >
			<p align='center'>这里正在发生</p>
			<ul>
			<?php if(is_array($result)): foreach($result as $key=>$vo): ?><li><?php echo ($vo["studentname"]); ?></span>收到一封新的邀请!&nbsp;&nbsp;<?php echo (date("Y-m-d",$vo["invite_time"])); ?></li><?php endforeach; endif; ?>
			</ul>
		</div>
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
	function nametype(){
		var nametype = document.getElementById('nametype');
		var grade = document.getElementByNames("option1").value;
		if(grade == '1')
			nametype.innerHTML="学号：";
		var grade = document.getElementByNames("option2").value;
		if(grade == '2')
			nametype.innerHTML="注册邮箱：";
		var grade = document.getElementByNames("option3").value;
		if(grade == '3')
			nametype.innerHTML="工号：";
	}
	</script>
</div>
</body>
</html>