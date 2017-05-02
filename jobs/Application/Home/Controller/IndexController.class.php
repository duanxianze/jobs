<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function register(){
      dump('11');
      // $type = $_SESSION['type'];
      // if(empty($type)){
      //   $this->display();
      // }else{
      //   $this->success('已登录，正跳转至详情页面...',U('loginHandle'));
      // }
    }
    public function index(){
      dump('123');
      // $type = $_SESSION['type'];
      // if(empty($type)){
      //   $this->result = D('InviteView')->order('accept_time desc')->select();
      //   $this->display();
      // }else{
      //   $this->success('已登录，正跳转至详情页面...',U('loginHandle'));
      // }
    }
    public function registerHandle(){
      $type = I('type');
      $name = I('name');
        if ($type == 1) {
          $res = D('Student')->where(array('name'=>$name))->find();
          if ($res) {
             $this->error('用户名已存在！');
          }else{
             $User = D("Student"); // 实例化User对象
             if (!$User->create()){     // 如果创建失败 表示验证没有通过 输出错误提示信息     
             $this->error($User->getError());
          }else{     
             // 验证通过 可以进行其他数据操作
               if($User->add()){
                      $this->success('注册成功',U('index'));
              }else{
                  $this->error('注册失败');
             }
          }    
        }
      }else{
        $varcode = I('vercode');
        if($varcode == 'jsjxy'){
          $res = M('company')->where(array('name'=>$name))->find();
          if($res){
           $this->error('用户名已存在！');
          }else{
            $User = D("Company"); // 实例化User对象
               if (!$User->create()){     // 如果创建失败 表示验证没有通过 输出错误提示信息     
               $this->error($User->getError());
            }else{     
               // 验证通过 可以进行其他数据操作
              // $a = $User->add();
              // echo $User->getDbError();
              // var_dump($a);die;
			  $User->password = md5($User->password);
                 if($User->add()){
                        $this->success('注册成功',U('index'));
                }else{
                    $this->error('注册失败');
               }
            }
          } 
        }else{
            $this->error('验证码错误');
        }
  }
}
  /**
  *登录处理页面
  */
  public function loginHandle(){
    $type = $_SESSION['type'];
      if(empty($type)){
        $type = I('type');
        $name = I('name');
        $password = I('password');
        switch (loginHandes($type,$name,$password)) {
          case '1':
            $this->success('补充学生信息！',U('studentadd'));
            break;
          case '2':
            $this->success('登录学生成功！',U('lists'));
            break;
          case '3':
            $this->success('补充企业信息！',U('companyadd'));
            break;
          case '4':
            $this->success('登录企业成功！',U('studentlist'));
            break;
          case '5':
            $this->success('登录教师成功！',U('tstudent'));
            break;
          default:
            $this->error('登录失败！');
            break;
        }
      }else{
        $type = $_SESSION['type'];
        $name = $_SESSION['name'];
        $password = $_SESSION['password'];
        switch (loginHandes($type,$name,$password)) {
          case '1':
            $this->success('补充学生信息！',U('studentadd'));
            break;
          case '2':
            $this->success('登录学生成功！',U('lists'));
            break;
          case '3':
            $this->success('补充企业信息！',U('companyadd'));
            break;
          case '4':
            $this->success('登录企业成功！',U('studentlist'));
            break;
          case '5':
            $this->success('登录教师成功！',U('tstudent'));
            break;
          default:
            $this->error('登录失败！');
            break;
      }
   }   
  }
  /**
  *学生登录成功后的页面
  */
  public function lists(){
    if($_SESSION['type']==1&&!empty($_SESSION['name'])){
      $name = $_SESSION['name'];
      $list = M('student')->where(array('name'=>$name))->find();
      $sno = $list['id'];
      $this->result = D('InviteView')->where(array('sno'=>$sno))->select();
      //var_dump($result);die;
      $this->assign('list',$list);
      $this->display();
     }else{
      $this->error('未登录或非学生用户！',U('index'));
    }
  }
  /**
  *学生信息补充处理页面
  */
  public function passwordeditHandle(){
  $checkname = $_SESSION['name'];
  $type = $_SESSION['type'];
	$id = I('id');
	$opssword = md5(I('opassword'));
	$data['password'] = md5(I('password'));
	$password1 = md5(I('password1'));
	//var_dump($_POST);die;
    	switch ($type) {
    		case '1':
    			$list = M('student')->where(array('id'=>$id,'password'=>$opssword))->find();
    			//var_dump($list);die;
    			if($list){
    				if($data['password'] == $password1){
    					if(M('student')->where(array('id'=>$id))->save($data)){
							session_destroy();
    						$this->success('修改成功！',U('index'));
    					}else
    						$this->error('修改失败!');
    				}else{
    					$this->error('两次密码不同!');
    				}
    			}else{
    				$this->error('原密码错误!');
    			}
    			break;
    		case '2':
    			$list = M('company')->where(array('id'=>$id,'password'=>$opssword))->find();
    			if($list){
    				if($data['password'] == $password1){
    					if(M('company')->where(array('id'=>$id))->save($data)){
							session_destroy();
    						$this->success('修改成功！',U('index'));
    					}else
    						$this->error('修改失败!');
    				}else{
    					$this->error('两次密码不同!');
    				}
    			}else{
    				$this->error('原密码错误!');
    			}
    			break;
    		case '3':
    			$list = M('teacher')->where(array('id'=>$id,'password'=>$opssword))->find();
    			if($list){
    				if($data['password'] == $password1){
    					if(M('teacher')->where(array('id'=>$id))->save($data)){
							session_destroy();
    						$this->success('修改成功！',U('index'));
    					}else
    						$this->error('修改失败!');
    				}else{
    					$this->error('两次密码不同!');
    				}
    			}else{
    				$this->error('原密码错误!');
    			}
    			break;
    		default:
    			$this->error('未登陆！',U('index'));
    			break;
    }
  }
  /**
  *学生信息补充页面
  */
  public function studentadd(){
    if($_SESSION['type']==1&&!empty($_SESSION['name'])){
      $this->display();
    }else{
      $this->error('未登录或非学生用户！',U('index'));
    }
  }
  /**
  *学生信息修改页面
  */
  public function studentedit(){
    if($_SESSION['type']==1&&!empty($_SESSION['name'])){
    	$name = $_SESSION['name'];
    	$this->list = M('student')->where(array('name'=>$name))->select();
      $this->display();
    }else{
      $this->error('未登录或非学生用户！',U('index'));
    }
  }
  /**
  *学生信息修改处理
  */
  public function studenteditHandle(){
    $checkname = $_SESSION['name'];
    $student = D('Student');
    $student->where(array('name'=>$name))->find();
    $id = $student['id'];
    if(M('student')->where(array('name'=>$checkname,'id'=>$id))->find()){
      $name = $_SESSION['name'];
      if (!$student->create()){     // 对data数据进行验证     
        $this->error($student->getError());
      }else{     // 验证通过 可以进行其他数据操作
        if($student->where(array('name'=>$name))->save()){
          $this->success("成功！",U('lists'));
        }else{
          $this->error("失败！");
        }
      }
      }else{
        $this->error('该用户与修改信息不匹配',U('index'));
      }
  }
  /**
  *学生信息补充处理
  */
  public function studentaddHandle(){
    $student = D('Student');
    $name = $_SESSION['name'];
    if (!$student->create()){     // 对data数据进行验证     
      $this->error(($student->getError()));
    }else{     // 验证通过 可以进行其他数据操作
      if($student->where(array('name'=>$name))->save()){
        $this->success("成功！",U('lists'));
      }else{
        $this->error("失败！");
      }
    }
    
  }
  /**
  *公司信息补充页面
  */
  public function companyadd(){
    if($_SESSION['type']==2&&!empty($_SESSION['name'])){
      $this->display();
    }else{
      $this->error('未登录或非企业用户！',U('index'));
    }
  }
  /**
  *公司信息补充处理
  */
  public function companyaddHandle(){
    $company = D('Company');
    $name = $_SESSION['name'];
    if (!$company->create()){     // 对data数据进行验证     
      $this->error($company->getError());
    }else{
		//var_dump($company->create());die;
      if($company->where(array('name'=>$name))->save()){
      $this->success("成功！",U('studentlist'));
    }else{
      $this->error("失败！");
    }
    }
    
  }
  /**
  *公司信息修改页面
  */
  public function companyedit(){
    if($_SESSION['type']==2&&!empty($_SESSION['name'])){
    	$name = $_SESSION['name'];
    	$this->list = M('company')->where(array('name'=>$name))->select();
      $this->display();
    }else{
      $this->error('未登录或非企业用户！',U('index'));
    }
  }
  /**
  *公司信息补充处理
  */
  public function companyeditHandle(){
    $checkname = $_SESSION['name'];
    $company = D('Company');
    $info = $company->where(array('name'=>$checkname))->find();

   $id = $info['id'];
  if(M('company')->where(array('name'=>$checkname,'id'=>$id))->find()){
        $name = $_SESSION['name'];
        $data['rname'] = I('rname');
        $data['phone'] = I('phone');
        $data['status'] = 1;
        $data['resume'] = html_entity_decode(I('resume'));
        if (!$company->create()){     // 对data数据进行验证     
          $this->error($company->getError());
        }else{
          if($company->where(array('name'=>$name))->save($data)){
          $this->success("成功！",U('studentlist'));
        }else{
          $this->error("失败！");
        }
      }
    }else{
      $this->error('该用户与修改信息不匹配',U('index'));
    }
  }
  /**
  *显示学生信息页面
  */
  public function studentlist(){
	$names = $_SESSION['name'];
	  $this->lists = M('company')->where(array('name'=>$names))->select();
    if($_SESSION['type']==2&&!empty($_SESSION['name'])){
      if(!empty($_POST['submit1'])){
          $city = I('citys');
          $name = $_SESSION['name'];
          $this->list = iscinvite($name,$city);
          $this->display();
        }else if(!empty($_POST['submit2'])){
          $work = I('work');
          $name = $_SESSION['name'];
          $this->list = iswinvite($name,$work);
          $this->display();
        }else{
          $name = $_SESSION['name'];
          $this->list = isinvite($name);
		  //var_dump($list);die;
          $this->display();
        }
     }else{
      $this->error('未登录或非企业用户！',U('index'));
    }
  }
  /**
  *显示学生简历信息页面
  */
  public function showresume(){
    $id = I('id',1,'intval');
    $this->list = M('student')->where(array('id'=>$id))->select();
	if(session('type')==1 && session('name')!= $this->list[0]['name'])  die('you do not have the access to this info,if you have any question,you can email huhuadong@jsnu.edu.cn');
    $this->display();
  }
  /**
  *显示公司简介信息页面
  */
  public function showcresume(){
    $id = I('id');
    $this->list = M('company')->where(array('id'=>$id))->select();
    $this->display();
  }
  /**
  *学生处理邀请处理页面
  */
  public function listHandle(){
    $id = I('id');
    $tuid = M('invite')->where(array('id'=>$id))->find();
    $uid = M('student')->where(array('name'=>$_SESSION['name']))->find();
    if($tuid['sno'] == $uid['id']){
      $data['type'] = I('type');
      $data['accept_time'] = time();
      //echo $data['type'];die;
      //echo $id;die;
      if(M('invite')->where(array('id'=>$id))->save($data)){
        $this->success('修改成功！',U('lists'));
      }else{
        $this->error('修改失败！');
      }
    }else{
       $this->error('非本人不可操作！');
    }
  }
  /**
  *密码修改页面
  */
  public function passwordedit(){
    $this->id = I('id');
    $this->display();
  }
  public function studentinvite(){
    $this->display();
  }
  /**
  *发出邀请
  */
  public function inviteHandle(){
    if($_SESSION['type']==2&&!empty($_SESSION['name'])){
      $cname = $_SESSION['name'];
      $data['sno'] = I('id');
      $name = M('company')->where(array('name'=>$cname))->find();
      $data['cno'] = $name['id'];
      $data['type'] = 2;
      $data['invite_time'] = time();
      $data['message'] = html_entity_decode(I('message'));
      if(M('invite')->add($data)){
        $this->success('邀请成功！',U('studentlist'));
      }else{
        $this->error('邀请失败！');
      }
    }else{
      $this->error('未登录或非企业用户！',U('index'));
    }
  }
  /**
  *拒绝理由填写页面
  */
  public function showerror(){
    if($_SESSION['type']==1&&!empty($_SESSION['name'])){
      $this->display();
    }else{
      $this->error('未登录或非学生用户！',U('index'));
    }
  }
  /**
  *拒绝理由填写处理
  */
  public function showerrorHandle(){
    $id = I('id');
    $tuid = M('invite')->where(array('id'=>$id))->find();
    $uid = M('student')->where(array('name'=>$_SESSION['name']))->find();
    if($tuid['sno'] == $uid['id']){
      $data['accept_time']=time();
      $data['type'] = 0;
      $data['detail'] = html_entity_decode(I('detail'));
      if(!empty($data['detail'])){
        if(M('invite')->where(array('id'=>$id))->save($data)){
          $this->success('修改成功！',U('lists'));
        }else{
          $this->error('修改失败！');
        }
      }else{
        $this->error('原因不能为空 ！');
      }
    }else{
      $this->error('非本人不可操作！');
    }
  }
  /**
  *清理SESSION
  */
  public function clear(){
	session_destroy();
	$this->success('退出成功！',U('index'));
	}
  /**
  *老师端显示学生信息页面
  */
  public function tstudent(){
    $time = time();
   if($_SESSION['type']==3&&!empty($_SESSION['name'])){
	  $names = $_SESSION['name'];
	  $this->list = M('teacher')->where(array('name'=>$names))->select();
      if(!empty($_POST['submit1'])){
          $city = I('citys');
          $name = $_SESSION['name'];
          $this->list = iscinvite($name,$city);
          $this->display();
        }else if(!empty($_POST['submit2'])){
          $work = I('work');
          $name = $_SESSION['name'];
          $this->list = iswinvite($name,$work);
          $this->display();
        }else{
          $name = $_SESSION['name'];
          $list = M('student')->select();
          for($i=0;$i<count($list);$i++){
            $vo = M('invite')->where(array('sno'=>$list[$i]['id']))->order('invite_time desc')->find();
            if($vo['invite_time']+3600*24*3>$time){
              array_push($list[$i],array('timeout'=>1));
            }else{
              array_push($list[$i],array('timeout'=>0));
          }
        }
        //var_dump($list);die;
          $this->assign("list",$list);
          $this->display();
        }
     }else{
      $this->error('未登录或非教师用户！',U('index'));
    }
  }
  /**
  *老师端显示学生邀请历史页面
  */
  public function invitehistory(){
    if($_SESSION['type']==3&&!empty($_SESSION['name'])){
      $id = I('id');
      $this->list = D('InviteView')->where(array('studentid'=>$id))->select();
      $this->display();
    }else{
      $this->error('未登录或非教师用户！',U('index'));
    }
  }  
}