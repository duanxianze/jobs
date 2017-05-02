<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>学生列表</title>
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
<body>
	<div class="well table-responsive" style="margin-top:100px;width:370px;float:left;">
	<a href="<?php echo U('Home/Index/studentedit?id='.$list['id']);?>" class="btn btn-success">修改个人信息</a>
	<a href="<?php echo U('Home/Index/passwordedit?id='.$list['id']);?>" class="btn btn-success">修改密码</a>
	<a href="<?php echo U('Home/Index/clear');?>" class="btn btn-primary">退出</a><br>
	<label>学生信息:</label>
		<table class="table">
			<tr>
				<th>学生姓名</th>
				<th>学生住址</th>
			</tr>
			<tr>
				<td><?php echo ($list["rname"]); ?></td>
				<td><?php echo ($list["address"]); ?></td>
			</tr>
			<tr>
				<th>学生工作意向</th>
				<th>学生意向城市</th>
				<th>相关信息</th>
			</tr>
			<tr>
				<td><?php echo ($list["work"]); ?></td>
				<td><?php echo ($list["city"]); ?>,<?php echo ($list["city1"]); ?>,<?php echo ($list["city2"]); ?></td>
				<td><a href="<?php echo U('Home/Index/showresume?id='.$list['id']);?>" class="btn btn-success">简历</a>
			</tr>
		</table>
	</div>
	<div class="well" style="width:670px;float:right;">
	<label>受邀情况</label>
		<table class="table table-hover" style="background:white;">
			<tr>
				<th>学生</th>
				<th>公司</th>
				<th>公司联系方式</th>
				<th>公司留言</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($result)): foreach($result as $key=>$vi): ?><tr>
					<td><?php echo ($vi["studentname"]); ?></td>
					<td><?php echo ($vi["companyname"]); ?><a href="<?php echo U('Home/Index/showcresume?id='.$vi['companyid']);?>" class='btn btn-primary btn-sm'>简介</a></td>
					<td><?php echo ($vi["companyphone"]); ?></td>
					<td><?php echo ($vi["message"]); ?></td>
					<td>
					<?php if($vi["type"] == 2): ?><a href="<?php echo U('Home/Index/listHandle?type=1&id='.$vi['id']);?>" class="btn btn-success" onclick="delcfm()">接受</a>
						<a href="<?php echo U('Home/Index/showerror?id='.$vi['id']);?>" class="btn btn-warning">拒绝</a><?php endif; ?>
					<?php if($vi["type"] == 1): ?>已接受<?php endif; ?>
					<?php if($vi["type"] == 0): ?>已拒绝<?php endif; ?>
					</td>
				</tr><?php endforeach; endif; ?>
		</table>
	</div>
</body>
<script language="javascript">
    function delcfm() {
        if (!confirm("确认要接受邀请？")) {
            window.event.returnValue = false;
        }
    }
</script>
</html>