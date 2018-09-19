<?php
/*
 *【前台】登录模块Model
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
namespace app\index\model;
use think\Model;
use think\Db;
class Login extends Model
{
	public function login($data){
		$user=Db::name('user')->where('username|tel|email','=',$data['username'])->find();
		if($user){
			if($user['password'] == md5($data['password'])){
				session('username',$user['username']);
				session('uid',$user['id']);
				return 3; //正确
			}else{
				return 2; //密码错误
			}
		}else{
			return 1; //用户不存在
		}
	}
	
	public function res ()
	{
		$res = [
			'code' => -1,
			'data' => '',
			'message' => ''
		];
		return $res;
	}
}
