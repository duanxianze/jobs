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
    <h3><b>学生个人信息填写</b></h3></br>

	<form action="<?php echo U('Home/Index/studentaddHandle');?>" method="post" name="creator">
		<label>籍贯：</label>
        <input type="text" name="nplace"  onblur="check_nplace()" class="span3 form-control"/><div style="color:red;display:none;" id="nplace1">籍贯不能为空！</div></br>
		<label>住址：</label>
        <input type="text" name="address" onblur="check_address()" class="span3 form-control"/><div style="color:red;display:none;" id="address1">住址不能为空！</div></br>
		<label>求职意向：</label>
        <select name="work">
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
        </select><br>
        <label>手机：</label>
        <input type="text" name="phone" onblur="check_phone()" class="span3 form-control"/><div style="color:red;display:none;" id="phone1">手机不能为空！</div></br>
        <label>邮箱：</label>
        <input type="text" name="email" onblur="check_email()" class="span3 form-control" value="<?php echo ($vo["phone"]); ?>"/><div style="color:red;display:none;" id="email1">邮箱不能为空！</div></br>
		<label>意向城市：<span style="color:red;">(意向城市请慎重选择，选择后不能修改)</span></label><br><div id="addcity"><select name="province" id="province" onChange = "select()">
        
            </select>省(直辖市)<select name="city" id="city" onChange = "select()"></select>市(区)<input type="button" id="add1" value="新增一座城市" onclick="add_one_file1();init1();"/>
            <div id="upload_file"></div>
		<label>个人简历:</label>
		<textarea id="container" name="resume" type="text/plain">
    	</textarea><br>
		<input type="hidden" name="citys">
        <input type="hidden" name="citys1">
        <input type="hidden" name="citys2">
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
    maximumWords:10000});  
        editor.render('container');  
    </script>
    </form>
</div>
</body>
<script language="javascript">
var where = new Array(35);
function comefrom(loca,locacity) { this.loca = loca; this.locacity = locacity; }
where[0]= new comefrom("请选择省份名","请选择城市名");
where[1] = new comefrom("北京","|北京");  
where[2] = new comefrom("上海","|上海");
where[3] = new comefrom("天津","|天津");
where[4] = new comefrom("重庆","|重庆");
where[5] = new comefrom("河北","|石家庄|邯郸|邢台|保定|张家口|承德|廊坊|唐山|秦皇岛|沧州|衡水");
where[6] = new comefrom("山西","|太原|大同|阳泉|长治|晋城|朔州|吕梁|忻州|晋中|临汾|运城");
where[7] = new comefrom("内蒙古","|呼和浩特|包头|乌海|赤峰|呼伦贝尔盟|阿拉善盟|哲里木盟|兴安盟|乌兰察布盟|锡林郭勒盟|巴彦淖尔盟|伊克昭盟");
where[8] = new comefrom("辽宁","|沈阳|大连|鞍山|抚顺|本溪|丹东|锦州|营口|阜新|辽阳|盘锦|铁岭|朝阳|葫芦岛");
where[9] = new comefrom("吉林","|长春|吉林|四平|辽源|通化|白山|松原|白城|延边");
where[10] = new comefrom("黑龙江","|哈尔滨|齐齐哈尔|牡丹江|佳木斯|大庆|绥化|鹤岗|鸡西|黑河|双鸭山|伊春|七台河|大兴安岭");
where[11] = new comefrom("江苏","|南京|镇江|苏州|南通|扬州|盐城|徐州|连云港|常州|无锡|宿迁|泰州|淮安");
where[12] = new comefrom("浙江","|杭州|宁波|温州|嘉兴|湖州|绍兴|金华|衢州|舟山|台州|丽水");
where[13] = new comefrom("安徽","|合肥|芜湖|蚌埠|马鞍山|淮北|铜陵|安庆|黄山|滁州|宿州|池州|淮南|巢湖|阜阳|六安|宣城|亳州");
where[14] = new comefrom("福建","|福州|厦门|莆田|三明|泉州|漳州|南平|龙岩|宁德");
where[15] = new comefrom("江西","|南昌市|景德镇|九江|鹰潭|萍乡|新馀|赣州|吉安|宜春|抚州|上饶");
where[16] = new comefrom("山东","|济南|青岛|淄博|枣庄|东营|烟台|潍坊|济宁|泰安|威海|日照|莱芜|临沂|德州|聊城|滨州|菏泽");
where[17] = new comefrom("河南","|郑州|开封|洛阳|平顶山|安阳|鹤壁|新乡|焦作|濮阳|许昌|漯河|三门峡|南阳|商丘|信阳|周口|驻马店|济源");
where[18] = new comefrom("湖北","|武汉|宜昌|荆州|襄樊|黄石|荆门|黄冈|十堰|恩施|潜江|天门|仙桃|随州|咸宁|孝感|鄂州");
where[19] = new comefrom("湖南","|长沙|常德|株洲|湘潭|衡阳|岳阳|邵阳|益阳|娄底|怀化|郴州|永州|湘西|张家界");
where[20] = new comefrom("广东","|广州|深圳|珠海|汕头|东莞|中山|佛山|韶关|江门|湛江|茂名|肇庆|惠州|梅州|汕尾|河源|阳江|清远|潮州|揭阳|云浮");
where[21] = new comefrom("广西","|南宁|柳州|桂林|梧州|北海|防城港|钦州|贵港|玉林|南宁地区|柳州地区|贺州|百色|河池");
where[22] = new comefrom("海南","|海口|三亚");
where[23] = new comefrom("四川","|成都|绵阳|德阳|自贡|攀枝花|广元|内江|乐山|南充|宜宾|广安|达川|雅安|眉山|甘孜|凉山|泸州");
where[24] = new comefrom("贵州","|贵阳|六盘水|遵义|安顺|铜仁|黔西南|毕节|黔东南|黔南");
where[25] = new comefrom("云南","|昆明|大理|曲靖|玉溪|昭通|楚雄|红河|文山|思茅|西双版纳|保山|德宏|丽江|怒江|迪庆|临沧");
where[26] = new comefrom("西藏","|拉萨|日喀则|山南|林芝|昌都|阿里|那曲");
where[27] = new comefrom("陕西","|西安|宝鸡|咸阳|铜川|渭南|延安|榆林|汉中|安康|商洛");
where[28] = new comefrom("甘肃","|兰州|嘉峪关|金昌|白银|天水|酒泉|张掖|武威|定西|陇南|平凉|庆阳|临夏|甘南");
where[29] = new comefrom("宁夏","|银川|石嘴山|吴忠|固原");
where[30] = new comefrom("青海","|西宁|海东|海南|海北|黄南|玉树|果洛|海西");
where[31] = new comefrom("新疆","|乌鲁木齐|石河子|克拉玛依|伊犁|巴音郭勒|昌吉|克孜勒苏柯尔克孜|博尔塔拉|吐鲁番|哈密|喀什|和田|阿克苏");
where[32] = new comefrom("香港","|香港");
where[33] = new comefrom("澳门","|澳门");
where[34] = new comefrom("台湾","|台湾");
function select() {
with(document.creator.province) { var loca2 = options[selectedIndex].value; }
for(i = 0;i < where.length;i ++) {
if (where[i].loca == loca2) {
loca3 = (where[i].locacity).split("|");
for(j = 0;j < loca3.length;j++) { with(document.creator.city) { length = loca3.length; options[j].text = loca3[j]; options[j].value = loca3[j]; var loca4=options[selectedIndex].value;}}
break;
}}
document.creator.citys.value=loca4;
}
function select1() {
with(document.creator.province1) { var loca2 = options[selectedIndex].value; }
for(i = 0;i < where.length;i ++) {
if (where[i].loca == loca2) {
loca3 = (where[i].locacity).split("|");
for(j = 0;j < loca3.length;j++) { with(document.creator.city1) { length = loca3.length; options[j].text = loca3[j]; options[j].value = loca3[j]; var loca4=options[selectedIndex].value;}}
break;
}}
document.creator.citys1.value=loca4;
}
function select2() {
with(document.creator.province2) { var loca2 = options[selectedIndex].value; }
for(i = 0;i < where.length;i ++) {
if (where[i].loca == loca2) {
loca3 = (where[i].locacity).split("|");
for(j = 0;j < loca3.length;j++) { with(document.creator.city2) { length = loca3.length; options[j].text = loca3[j]; options[j].value = loca3[j]; var loca4=options[selectedIndex].value;}}
break;
}}
document.creator.citys2.value=loca4;
}
function init() {
with(document.creator.province) {
length = where.length;
for(k=0;k<where.length;k++) { options[k].text = where[k].loca; options[k].value = where[k].loca; }
options[selectedIndex].text = where[0].loca; options[selectedIndex].value = where[0].loca;
}
with(document.creator.city) {
loca3 = (where[0].locacity).split("|");
length = loca3.length;
for(l=0;l<length;l++) { options[l].text = loca3[l]; options[l].value = loca3[l]; }
options[selectedIndex].text = loca3[0]; options[selectedIndex].value = loca3[0];
}} 
function init1(){
    with(document.creator.province1) {
    length = where.length;
    for(k=0;k<where.length;k++) { options[k].text = where[k].loca; options[k].value = where[k].loca; }
    options[selectedIndex].text = where[0].loca; options[selectedIndex].value = where[0].loca;
    }
    with(document.creator.city1) {
    loca3 = (where[0].locacity).split("|");
    length = loca3.length;
    for(l=0;l<length;l++) { options[l].text = loca3[l]; options[l].value = loca3[l]; }
    options[selectedIndex].text = loca3[0]; options[selectedIndex].value = loca3[0];
    }
}
function init2(){  
    with(document.creator.province2) {
    length = where.length;
    for(k=0;k<where.length;k++) { options[k].text = where[k].loca; options[k].value = where[k].loca; }
    options[selectedIndex].text = where[0].loca; options[selectedIndex].value = where[0].loca;
    }
    with(document.creator.city2) {
    loca3 = (where[0].locacity).split("|");
    length = loca3.length;
    for(l=0;l<length;l++) { options[l].text = loca3[l]; options[l].value = loca3[l]; }
    options[selectedIndex].text = loca3[0]; options[selectedIndex].value = loca3[0];
    }
}
</script>
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
    function check_email(){
        if(document.creator.email.value == ''){
            email1.style.display = "inline";
            email.style.border = "1px solid red";
        }else{
            email1.style.display = "none";
            email.style.border = "1px solid grey";
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
    <script language="javascript" type="text/jscript"><!-- 
    function add_input_file1(tbfile) 
    { 
    //file_name = "file" + index;  
    var input_trfile = document.createElement('div');
    var input_file = document.createElement("select");  
    input_file.setAttribute("name",'province1');
    input_file.setAttribute("onChange","select1()");
    var input_file1 = document.createElement("select");
    input_file1.setAttribute("name",'city1');
    input_file1.setAttribute("id",'city1');
    input_file1.setAttribute("onChange",'select1()');
    var input_file2 = document.createElement("span");
    input_file2.innerHTML = "省(直辖市)";
    var input_file3 = document.createElement("span");
    input_file3.innerHTML = "市(区)";
    var input_file4 = document.createElement("input");
    input_file4.setAttribute("type",'button');
    input_file4.setAttribute("id",'add2');
    input_file4.setAttribute("value",'新增一座城市');
    input_file4.setAttribute("onclick",'add_one_file2();init2()');

    input_trfile.appendChild(input_file);
    input_trfile.appendChild(input_file2);
    input_trfile.appendChild(input_file1);
    input_trfile.appendChild(input_file3); 
    input_trfile.appendChild(input_file4); 
    //tr_file.appendChild(td_file);
    tbfile.appendChild(input_trfile); 
    var add1 = document.getElementById("add1");
    add1.style.display = "none";
    } 
    function add_one_file1() 
    { 
    var tb_file = document.getElementById("upload_file"); 
    var count_file = document.getElementById("upload_file").childNodes.length; 
    //window.alert(steps_nums); 
    add_input_file1(tb_file); 
    } 
    function add_input_file2(tbfile) 
    { 
    //file_name = "file" + index;  
    var input_trfile = document.createElement('div');
    var input_file = document.createElement("select");  
    input_file.setAttribute("name",'province2');
    input_file.setAttribute("onChange","select2()");
    var input_file1 = document.createElement("select");
    input_file1.setAttribute("name",'city2');
    input_file1.setAttribute("id",'city2');
    input_file1.setAttribute("onChange",'select2()');
    var input_file2 = document.createElement("span");
    input_file2.innerHTML = "省(直辖市)";
    var input_file3 = document.createElement("span");
    input_file3.innerHTML = "市(区)";
    var input_file4 = document.createElement("span");
    input_file4.innerHTML = "已达到上限（3座城市）";
    input_file4.setAttribute("style",'color:red;');

    input_trfile.appendChild(input_file);
    input_trfile.appendChild(input_file2);
    input_trfile.appendChild(input_file1);
    input_trfile.appendChild(input_file3); 
    input_trfile.appendChild(input_file4); 
    //tr_file.appendChild(td_file);
    tbfile.appendChild(input_trfile); 
    var add1 = document.getElementById("add2");
    add1.style.display = "none";
    } 
    function add_one_file2() 
    { 
    var tb_file = document.getElementById("upload_file"); 
    var count_file = document.getElementById("upload_file").childNodes.length; 
    //window.alert(steps_nums); 
    add_input_file2(tb_file); 
    } 
// --></script> 
</html>