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
<body onLoad="init()" class="text-center">
<div class="well table-responsive text-left" style="margin-top:100px;width:1024px;margin-left:auto;margin-right:auto;">
<label>学生信息列表</label></br>
<a href="<?php echo U('Home/Index/companyedit?id='.$lists[0]['id']);?>" class="btn btn-success">修改公司信息</a>
<a href="<?php echo U('Home/Index/passwordedit?id='.$lists[0]['id']);?>" class="btn btn-success">修改密码</a>
	<a href="<?php echo U('Home/Index/clear');?>" class="btn btn-primary">退出</a><br>
<label>筛选：</label><br>
	<form action="<?php echo U('Home/Index/studentlist');?>" method="post" name="creator">
	&nbsp;&nbsp;<label>根据意向城市筛选</label>
	<select name="province" onChange = "select()"></select>省(直辖市)<select name="city" id="city" onChange = "select()"></select>市(区)
	<input type="hidden" name="citys">
	<input	type="submit" class="btn btn-small btn-primary" value="筛选" name='submit1'></br>
	</form>
	<form action="<?php echo U('Home/Index/studentlist');?>" method="post">
	&nbsp;&nbsp;<label>根据意向工作筛选</label>
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
	</select>
	<input	type="submit" class="btn btn-small btn-primary" value="筛选" name='submit2'></br>
	</form>
	<table class="table table-hover" style="background:white;">
		<tr>
			<th>学生姓名</th>
			<th>性别</th>
			<th>学生专业</th>
			<th>学生工作意向</th>
			<th>学生意向城市</th>
			<th>相关信息</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
				<td><?php echo ($vo["rname"]); ?></td>
				<?php if($vo["sex"] == 1): ?><td>男</td>
				<?php else: ?>
					<td>女</td><?php endif; ?>
				<td><?php echo ($vo["major"]); ?></td>
				<td><?php echo ($vo["work"]); ?></td>
				<td><?php echo ($vo["city"]); ?>,<?php echo ($vo["city1"]); ?>,<?php echo ($vo["city2"]); ?></td>
				<td><a href="<?php echo U('Home/Index/showresume?id='.$vo['id']);?>">简历</a></td>
				<?php if($vo['isinvite'] == '3'): ?><td><a href="<?php echo U('Home/Index/studentinvite?id='.$vo['id']);?>" >邀请</a></td><?php endif; ?>
				<?php if($vo['isinvite'] == '2'): ?><td>还未收到回复</td><?php endif; ?>
				<?php if($vo['isinvite'] == '1'): ?><td>已接受</td><?php endif; ?>
				<?php if($vo['isinvite'] == '0'): ?><td>不接受</td><?php endif; ?>
			</tr><?php endforeach; endif; ?>
	</table>
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
</script>
<script language="javascript">
    function delcfm() {
        if (!confirm("确认要邀请？")) {
            window.event.returnValue = false;
        }
    }
</script>
</html>