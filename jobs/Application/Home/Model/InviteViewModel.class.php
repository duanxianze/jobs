<?php
/**
 * 文章与属性关联模型
 */
namespace Home\Model;

use Think\Model\ViewModel;

class InviteViewModel extends ViewModel {
     public $viewFields = array(
        'invite'=>array('id','sno','cno','type','invite_time','accept_time','detail','message'),
        'company'=>array(
            'id'=>'companyid','rname'=>'companyname','name'=>'companyemail','resume','phone'=>'companyphone',
            '_on'=>'invite.cno=company.id'),
        'student'=>array(
            'id'=>'studentid','rname'=>'studentname','name'=>'studentemail','address','work','city','city1','city2','phone'=>'studentphone',
            '_on'=>'invite.sno=student.id'),
        ); 
}