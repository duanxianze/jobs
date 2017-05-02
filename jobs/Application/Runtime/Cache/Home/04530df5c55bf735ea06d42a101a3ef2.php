<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" " http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>学生信息补充页面</title>
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
<div class="container well text-left" style="width:800px;">
    <h3><b>学生个人信息修改</b></h3>
    <h5>-----------------------------------------------------------------------</h5>
	<form action="<?php echo U('Home/Index/studentaddHandle');?>" method="post" name="creator">
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><label>籍贯：</label>
			<input type="text" name="nplace"  onblur="check_nplace()" class="span3 form-control" value="<?php echo ($vo["nplace"]); ?>"/><div style="color:red;display:none;" id="nplace1">籍贯不能为空！</div></br>
			<label>住址：</label>
			<input type="text" name="address" onblur="check_address()" class="span3 form-control" value="<?php echo ($vo["address"]); ?>"/><div style="color:red;display:none;" id="address1">住址不能为空！</div></br>
			<label>求职意向：</label>
            <select name="work">
                <option value="<?php echo ($vo["work"]); ?>" selected="selected"><?php echo ($vo["work"]); ?></option>
                <option value="软件研发类">软件研发类</option>
                <option value="硬件研发类">硬件研发类</option>
                <option value="产品类">产品类</option>
                <option value="设计类">设计类</option>
                <option value="运营类">运营类</option>
                <option value="市场与销售类">市场与销售类</option>
                <option value="职能类">职能类</option>
                <option value="考研">考研</option>
                <option value="教师">教师</option>
                <option value="公务员">公务员</option>
                <option value="已安排">已安排</option>
            </select></br>
			<label>手机：</label>
			<input type="text" name="phone" onblur="check_phone()" class="span3 form-control" value="<?php echo ($vo["phone"]); ?>"/><div style="color:red;display:none;" id="phone1">手机不能为空！</div></br>
            <label>邮箱：</label>
            <input type="text" name="email" onblur="check_email()" class="span3 form-control" value="<?php echo ($vo["email"]); ?>"/><div style="color:red;display:none;" id="email1">邮箱不能为空！</div></br>
			<label>个人简历:</label>
			<textarea id="container" name="resume">
				<?php echo ($vo["resume"]); ?>
			</textarea><br>
			<input type="hidden" name="citys">
            <input type="hidden" name="citys1">
            <input type="hidden" name="citys2">
			<input type="submit" class="btn btn-success" value="修改" >
            <a href="javascript:history.go(-1)" class="btn btn-primary">返回</a><?php endforeach; endif; ?>
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
    maximumWords:10000});  
        editor.render('container');  
    </script>
    </form>
</div>
</body>

<script type="text/javascript">
    var user1 = document.getElementById('user1');
    var nplace1 = document.getElementById('nplace1');
    var address1 = document.getElementById('address1');
    var work1 = document.getElementById('work1');
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
    function check_nplace(){
        if(document.creator.nplace.value == ''){
            nplace1.style.display = "inline";
            nplace.style.border = "1px solid red";
        }else{
            nplace1.style.display = "none";
            naplace.style.border = "1px solid grey";
        }
    }
    function check_email(){
        if(document.creator.email.value == ''){
            email1.style.display = "inline";
            email.style.border = "1px solid red";
        }else{
            email1.style.display = "none";
            email.style.border = "1px solid grey";
        }
    }
    function check_address(){
        if(document.creator.address.value == ''){
            address1.style.display = "inline";
            address.style.border = "1px solid red";
        }else{
            address1.style.display = "none";
            naplace.style.border = "1px solid grey";
        }
    }
    function check_work(){
        if(document.creator.work.value == ''){
            work1.style.display = "inline";
            work.style.border = "1px solid red";
        }else{
            work1.style.display = "none";
            naplace.style.border = "1px solid grey";
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
    function add_city2(){
        var newTextBoxDiv = $(document.createElement('div')).attr("id", 'div_txt');
        newTextBoxDiv.after().html(
          '<select id="comb_res_addr" style="width:100px;"    onchange="onchange_addr(this.value)">
            <option value="res_addr">地址</option>
            <option value="res_addr_domain">地址段</option>
        </select>'
          );
     newTextBoxDiv.appendTo("#addcity"); 
    }
    </script>
</html>