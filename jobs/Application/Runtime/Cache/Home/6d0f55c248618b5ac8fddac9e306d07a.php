<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>学生受邀历史</title>
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
<div class="well table-responsive text-left" style="margin-top:100px;">
	<table class="table">
		<tr>
			<th>公司名称</th>
			<th>公司联系方式</th>
			<th>学生姓名</th>
			<th>学生联系方式</th>
			<th>公司邀请时间</th>
			<th>学生回应时间</th>
			<th>学生工作意向</th>
			<th>是否成功？</th>
			<th>详情</th>
		</tr>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["companyname"]); ?><a href="<?php echo U('Home/Index/showcresume?id='.$vo['companyid']);?>" class='btn btn-primary btn-sm'>简介</a></td>
				<td><?php echo ($vo["companyphone"]); ?></td>
				<td><?php echo ($vo["studentname"]); ?></td>
				<td><?php echo ($vo["studentphone"]); ?></td>
				<td><?php echo (date('Y-m-d',$vo["invite_time"])); ?></td>
				<?php if($vo["type"] == 2): ?><td>还未回复</td>
				<?php else: ?>
					<td><?php echo (date('Y-m-d',$vo["accept_time"])); ?></td><?php endif; ?>
				<td><?php echo ($vo["work"]); ?></td>
				<?php if($vo['type'] == '2'): ?><td>还未收到回复</td><?php endif; ?>
				<?php if($vo['type'] == '1'): ?><td>已接受</td><?php endif; ?>
				<?php if($vo['type'] == '0'): ?><td>不接受</td><?php endif; ?>
				<?php if($vo["type"] == 2): ?><td>还未回复</td>
				<?php else: ?>
					<td><?php echo ($vo["detail"]); ?></td><?php endif; ?>
			</tr><?php endforeach; endif; ?>
		<a href="javascript:history.go(-1)" class="btn btn-primary">返回</a>
	</table>
</div>
</body>
</html>