<?php
/*
 *【后台】注册验证
 * ============================================================================
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用。
 * 任何企业和个人不允许对程序代码以任何形式任何目的再发布。
 *
 * 版权所有 2018 河北溜溜网络科技有限公司，并保留所有权利。
 * ============================================================================
 * @author : yangruichao
 * @version 1.0
 * @link http://www.chao99.top
 * @date : 2018.06.05
 * @qq : 782483506
 */

namespace app\index\validate;

use think\Validate;

class User extends Validate
{
	protected $rule = [
		'username' => 'require|unique:user',
		'password' => 'require',
		'bright_password' => 'require',
		'tel' => 'require',
	];
	protected $message = [
		'username.require' => '用户名不能为空',
		'username.unique' => '用户名已存在',
		'password.require' => '密码不能为空',
		'bright_password.require' => '确认密码不能为空',
		'tel.require' => '电话不能为空',
		'email.require' => '邮箱不能为空',
	];
}
