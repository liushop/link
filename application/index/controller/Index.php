<?php
namespace app\Index\controller;
use think\Controller;
use app\index\model\Index as IndexModel;
use app\Index\controller\Base;
class Index extends Controller
{
    public function index()
    {

    	// if(empty(session('uid'))){
    	// 	$this->error('回复与审核失败！');
    	// }
    	
    	$model=new IndexModel();
    	//判断是否登录
		$flag = $model->is_login(true);
		if(!$flag){
			$this->error('请登录系统！');
		}
		$id = session('uid');
		$info= $model->user($id)['0'];
        $this->assign([
			"flag" => $flag,
			"info" => $info
		]);
		return $this->fetch();
    }

    public function loginout ()
	{
		$this->redirect('login/loginout');
	}

	public function ok ()
	{
		$this->redirect('login/index');
	}
}