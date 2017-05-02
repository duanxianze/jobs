<?php
/**
 * 文章与属性关联模型
 */
namespace Home\Model;

use Think\Model\RelationModel;

class InviteRelationModel extends RelationModel {
    //定义主表名称
    Protected $tableName = 'company';

    //定义关联关系
    Protected $_link = array(
        'student' => array(
            'mapping_type'=> self::MANY_TO_MANY,
            'foreign_key' => 'id',
            'relation_foreign_key' => 'sno',
            'relation_table' => 'job_invite',
            ),
        // 'xuanke' => array(
        // 	'mapping_type'=> self::HAS_MANY,
        // 	'foreign_key'   => 'cno',)
        // );
    /*Public function get(){
    	$x = $this->relation(true)->select();
    	foreach ($x as $v) {
    		$n = $v.yuangong;
    		$z = $v.xuanke;
    		$abc = array_merge($n,$z);
    		}
    	}
    	return $x;
    }*/);
}