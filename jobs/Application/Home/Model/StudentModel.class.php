<?php
namespace Common\Model;
use Think\Model;

class StudentModel extends Model{
    protected $_validate = array(
        array('name', 'require', '用户名不能为空！'),
        array('password', 'require', '密码不能为空！'),
        array('phone', "/^1[0-9][0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/",'联系方式不正确！','regex'),
        array('nplace', 'require', '籍贯不能为空！'),
        array('address', 'require', '住址不能为空！'),
        array('work', 'require', '意向工作不能为空！'),
        array('email', "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/",'邮箱格式不正确！','regex'),
        array('city', 'require', '意向城1市不能为空！'),
        array('city1', 'require', '意向城市2不能为空！'),
        array('city2', 'require', '意向城市3不能为空！'),
        array('resume', 'require', '个人简介不能为空！'),
    );

    protected $_auto = array(
        array('resume', 'html_entity_decode',3,'function'),
        array('status', '1'),
    );



}
