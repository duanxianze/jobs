<?php
	 function loginHandes($type,$name,$password){
		switch ($type) {
			case '1':
				$result = M('student')->where(array('name'=>$name,'password'=>md5($password)))->select();
				if($result){
					if($result[0]['status']==0){
						$_SESSION['name'] = $name;
						$_SESSION['type'] = $type;
						$_SESSION['password'] = $password;
						return 1;}
					else if($result[0]['status']==1){
						$_SESSION['name'] = $name;
						$_SESSION['type'] = $type;
						$_SESSION['password'] = $password;
						return 2;}
				}else
					return 0;
				break;
			case '2':
				$result = M('company')->where(array('name'=>$name,'password'=>md5($password)))->select();
				if($result){
					if($result[0]['status']==0){
						$_SESSION['name'] = $name;
						$_SESSION['type'] = $type;
						$_SESSION['password'] = $password;
						return 3;}
					else if($result[0]['status']==1){
						$_SESSION['name'] = $name;
						$_SESSION['type'] = $type;
						$_SESSION['password'] = $password;
						return 4;}
				}
				else
					return 0;
				break;
			case '3':
				$result = M('teacher')->where(array('tno'=>$name,'password'=>md5($password)))->find();
				if($result){
					$_SESSION['name'] = $name;
					$_SESSION['type'] = $type;
					$_SESSION['password'] = $password;
					return 5;
				}
				else
					return 0;
				break;
			default:
				return 0;
				break;
		}
	}
	/**
	*通过企业用户的名字来返回邀请列表中的学生号,并判断是否被该企业邀请
	*/
	function isinvite($name){
		$rs = M('company')->where(array('name'=>$name))->find();
		$cno = $rs['id'];
		$result = M('invite')->where(array('cno'=>$cno))->select();
		//var_dump($re);die;
		$list = M('student')->select();
	      for($i=0;$i<count($list);$i++){
	        $list[$i]['isinvite'] = '3';
	        foreach ($result as $v) {
	        	if($list[$i]['id'] == $v['sno']){
	            $list[$i]['isinvite'] = $v['type'];
	          }
	        }
	      }
		return $list;
	}
	/**
	*通过企业用户的名字来返回邀请列表中的学生号,并判断是否被该企业邀请，判断工作地点
	*/
	function iscinvite($name,$limit){
		$time = time();
		$rs = M('company')->where(array('name'=>$name))->find();
		$cno = $rs['id'];
		$result = M('invite')->where(array('cno'=>$cno))->select();
		//var_dump($re);die;
		$list = M('student')->where("city='%s' or city1='%s' or city2='%s'",array($limit,$limit,$limit))->select();
	      for($i=0;$i<count($list);$i++){
	      	$vo = M('invite')->where(array('sno'=>$list[$i]['id']))->order('invite_time desc')->find();
	        $list[$i]['isinvite'] = '3';
	        if($vo['invite_time']+3600*24*3>$time){
              array_push($list[$i],array('timeout'=>1));
            }else{
              array_push($list[$i],array('timeout'=>0));
          }
	        foreach ($result as $v) {
	        	if($list[$i]['id'] == $v['sno']){
	            $list[$i]['isinvite'] = $v['type'];
	          }
	        }
	      }
		return $list;
	}
	/**
	*通过企业用户的名字来返回邀请列表中的学生号,并判断是否被该企业邀请，判断工作类型
	*/
	function iswinvite($name,$limit){
		$time = time();
		$rs = M('company')->where(array('name'=>$name))->find();
		$cno = $rs['id'];
		$result = M('invite')->where(array('cno'=>$cno))->select();
		//var_dump($re);die;
		$list = M('student')->where(array('work'=>$limit))->select();
	      for($i=0;$i<count($list);$i++){
	      	$vo = M('invite')->where(array('sno'=>$list[$i]['id']))->order('invite_time desc')->find();
	        $list[$i]['isinvite'] = '3';
	        if($vo['invite_time']+3600*24*3>$time){
              array_push($list[$i],array('timeout'=>1));
            }else{
              array_push($list[$i],array('timeout'=>0));
          }
	        foreach ($result as $v) {
	        	if($list[$i]['id'] == $v['sno']){
	            $list[$i]['isinvite'] = $v['type'];
	          }
	        }
	      }
		return $list;
	}
