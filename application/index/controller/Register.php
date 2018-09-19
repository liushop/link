<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Loader;
use think\Validate;
use app\index\model\register as RegisterModel;

class Register extends \think\Controller
{
	public function index ()
	{
		if(request()->isAjax())
		{
			$ajax_data = request()->post();
			$data = [
				'username' => $ajax_data['username'],
				'tel' => $ajax_data['tel'],
				'email' => $ajax_data['email'],
				'password' => md5($ajax_data['password']),
				'bright_password' => $ajax_data['password'],
				'img' => 'picture/temp_default_user_portrait_0.png',
				'add_time' => time(),
			];
			$validate = Loader::validate('User');
			if(!$validate->check($data))
			{
				$res['code'] = -1;
				$res['message'] = $validate->getError();
				return $res;
			}
			$insert = db('user')->insert($data);
			if($insert)
			{
				$res['code'] = 1;
				$res['message'] = '注册成功';
				return $res;
			}
			else
			{
				$res['code'] = -1;
				$res['message'] = '注册失败';
				return $res;
			}
		}
		return $this->fetch();
	}
	
	public function LoginSuccess ()
	{
		$this->redirect('login/index');
	}
	
}