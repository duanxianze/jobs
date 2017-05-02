<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>学生信息补充页面</title>
<link rel="stylesheet" type="text/css" href="/jobs/Public/CSS/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="/jobs/Public/JS/bootstrap.min.js"></script>

</head>
<body onLoad="init()" class="text-center">
<div class="container well" style="margin-left:auto;margin-right:auto;width:400px;">
    <h3><b>拒绝该企业原因</b></h3>
    <h5>-----------------------------------------------------------------------</h5>
	<form action="<?php echo U('Home/Index/showerrorHandle');?>" method="post" name="creator">
			<label>拒绝理由:</label>
			<textarea id="newscontent" name="detail" type="text/plain">
			</textarea><br>
            <input type="hidden" name="id" value="<?php echo ($_GET['id']); ?>">
			<input type="submit" class="btn btn-success" value="拒绝邀请" >
            <a href="javascript:history.go(-1)" class="btn btn-primary">返回</a>
		</foreach>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/jobs/Public/JS/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/jobs/Public/JS/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <div id="newscontent"></div>  
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
    maximumWords:300});  
        editor.render('newscontent');  
    </script>
    </form>
</div>
</body>
</html>