<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>公司信息补充页面</title>
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
<body onLoad="init()" class="text-center">
<div class="container well text-left" style="margin-left:auto;margin-right:auto;width:800px;">
    <h3><b>公司信息填写</b></h3></br>
	<form action="<?php echo U('Home/Index/companyaddHandle');?>" method="post" name="creator">
		<label>公司名称：</label>
        <input type="text" name="rname" onblur="check_name()" class="span3 form-control"> <div style="color:red;display:none;" id="user1">企业名称不能为空！</div></br>
        <label>联系方式：</label>
        <input type="text" name="phone" onblur="check_phone()" class="span3 form-control"/><div style="color:red;display:none;" id="phone1">联系方式不能为空！</div></br>
		<label>公司简介:</label>
		<textarea id="container" name="resume" type="text/plain">
    	</textarea><br>
		<input type="hidden" name="status" value="1">
		<input type="submit" class="btn btn-success" value="添加" >
		<a href="<?php echo U('Home/Index/clear');?>" class="btn btn-primary">退出</a><br>
   
    <!-- 配置文件 -->
    <script type="text/javascript" src="/jobs/Public/JS/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/jobs/Public/JS/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">  
        var editor = new baidu.editor.ui.Editor({toolbars: [
    ['undo', //撤销
        'redo', //重做
        'indent', //首行缩进
        'snapscreen', //截图]
        'formatmatch', //格式刷
        'blockquote', //引用
        'selectall', //全选
        'removeformat', //清除格式
        'insertcode', //代码语言
        'fontfamily', //字体
        'fontsize', //字号
        'attachment',
        'simpleupload', //单图上传
        'insertimage', //多图上传
        'link', //超链接
        'spechars', //特殊字符
        'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
        'bold', //加粗
        'forecolor', //字体颜色
        'backcolor', //背景色
        'insertorderedlist', //有序列表
        'insertunorderedlist', //无序列表
        'fullscreen', //全屏]
        ]
    ],
    allHtmlEnabled:false,
    elementPathEnabled:false,
	initialFrameHeight:270,
    maximumWords:10000});  
        editor.render('container');  
    </script>
    </form>
</div>
</body>
<script type="text/javascript">
    var user1 = document.getElementById('user1');
    var phone1 = document.getElementById('phone1');
    function check_name(){
        if(document.creator.rname.value == ''){
            user1.style.display = "inline";
            rname.style.border = "1px solid red";
        }else{
            user1.style.display = "none";
            rname.style.border = "1px solid grey";
        }
    }
    function check_phone(){
        if(document.creator.phone.value == ''){
            phone1.style.display = "inline";
            phone.style.border = "1px solid red";
        }else{
            phone1.style.display = "none";
            phone.style.border = "1px solid grey";
        }
    }
    </script>
</html>