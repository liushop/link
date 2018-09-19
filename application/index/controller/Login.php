<?php
/*
 *【前台】用户登录控制器
 * ============================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用。
 * 任何企业和个人不允许对程序代码以任何形式任何目的再发布。
 *
 * 版权所有 2018 河北溜溜网络科技有限公司，并保留所有权利。
 * ============================================================================
 * @author : yangruichao
 * @version 1.0
 * @link http://www.chao99.top
 * @date : 2018.06.06
 * @qq : 782483506
 */
namespace app\Index\controller;
use think\Controller;
use app\index\model\common;
use app\index\model\Login as LoginModel;
class Login extends Controller
{
    public function index()
    {
	    $model = new LoginModel();
	    if(request()->isAjax()){
		    $res = $model->res();
		    $ajax_data = request()->post();
		    $num=$model->login($ajax_data);
		    if($num==3){
			    $res['code'] = 1;
			    $res['message'] = '登录成功！';
			    return $res;
		    }else if($num==2){
			    $res['code'] = -1;
			    $res['message'] = '密码错误！';
			    return $res;
		    }
		    else{
			    $res['code'] = -1;
			    $res['message'] = '用户不存在';
			    return $res;
		    }
	    }
        return $this->fetch();
    }
    
    //登录成功
	public function ok(){
		$this->redirect('index/index');
	}
	
	//退出
	public function loginout(){
		$loginout=session(null);
		if($loginout){
			$res['code'] = -1;
			$res['message'] = '退出失败，系统繁忙，稍后重试';
			return $res;
		}else{
			$res['code'] = 1;
			$res['message'] = '退出成功';
			return $res;
		}
		
	}

    



}
