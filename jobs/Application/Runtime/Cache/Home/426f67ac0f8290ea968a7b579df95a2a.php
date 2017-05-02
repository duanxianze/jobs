<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title><?php echo ($list[0]['rname']); ?>的简历</title>
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
<div class="container well text-left" style="margin-top:100px;margin-left:auto;margin-right:auto;width:800px;">
	<?php if(is_array($list)): foreach($list as $key=>$vo): ?><label><b><?php echo ($vo["rname"]); ?>的个人简历</b></label></br>
		<?php echo ($vo["resume"]); endforeach; endif; ?>
	<a href="javascript:history.go(-1)" class="btn btn-primary">返回</a>
</div>
</body>
</html>