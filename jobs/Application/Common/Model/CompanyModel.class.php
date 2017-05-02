<?php
namespace Common\Model;
use Think\Model\AdvModel;
class CompanyModel extends AdvModel{
            protected $_validate = array(
                array('name', 'email', '用户名非e-mail格式！'),
                array('password','require','密码是必须！'),
                array('password1','password','两次密码不相同！',0,'confirm'),
                array('sex','require','性别必须选择！'),
                array('phone','require','手机号码必须选择！'),
            );

            protected $_auto = array(
                //定义自动完成   
                    array('password','md5',1,'function') ,  //  对 userpass 字段在新增的时候使 md5 函数处理  
            );


}
