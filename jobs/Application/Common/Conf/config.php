<?php
return array(
	//'配置项'=>'配置值'
		//连接数据库
	'APP_DEBUG' => true,
	'SHOW_PAGE_TRACE' => true,
	//开启URL路由
	'URL_ROUTER_ON' => true,
	'URL_ROUTE_RULES' => array(
		'/^c_(\d+)$/' => 'Index/List/index?id=:1',//正则路由
		':id\d' => 'Index/Display/index'),
	/*配置模板文件相对位置*/
	'APP_DEBUG'=>flase,
	'DB_FIELD_CACHE'=>false,
	'HTML_CACHE_ON'=>false,
	'SHOW_PAGE_TRACE' => false,
	'DB_TYPE'   => 'mysqli', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'jobs', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'jsnu123',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'job_', // 数据库表前缀
    'TMPL_PARSE_STRING' =>  array( // 添加输出替换
    //'__UPLOAD__'    =>  __ROOT__.'/Admin/Public/Uploads',//__ROOT__网站根目录，跟网站的入口文件位置相同
    '__JS__' => __ROOT__.'/Public/JS',
    '__CSS__' => __ROOT__.'/Public/CSS',
    '__IMG__' => __ROOT__.'/Public/IMG',
    ),

	
);