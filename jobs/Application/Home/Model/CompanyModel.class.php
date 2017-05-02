<?php
namespace Common\Model;
use Think\Model;

class CompanyModel extends Model{
    protected $_validate = array(
        array('name', "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/",'用户名邮箱格式不正确！','regex'),
        array('password', 'require', '密码不能为空！'),
        array('rname', 'require', '公司名称不能为空！'),
        array('phone', "/^(0?1[358]\d{9}|((\+?[0-9]{2,4}\-[0-9]{3,4}\-)|([0-9]{3,4}\-))?([0-9]{7,8})(\-[0-9]+)?)$/",'联系方式不正确！','regex'),
        array('resume', 'require', '公司简介不能为空！'),
    );
    protected $_auto = array(
        array('resume', 'html_entity_decode',3,'function'),
    );
}
