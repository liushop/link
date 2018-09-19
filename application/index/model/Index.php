<?php
/*
 *【前台】主页模块Model
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

class Index extends Model
{
	
	//判断是否登录
	public function is_login ($flag)
	{
		if(!session('username'))
		{
			$flag = false;
		}
		return $flag;
	}

	//获取用户信息
	public function user($id){
		$filter = Db::name('user')
			//->field('g.*, gc.name as cat_name')
			->where("id = '$id'")
			->select();
		return $filter;
	}
	
}
