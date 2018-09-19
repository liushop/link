<?php
namespace app\Index\controller;
use think\Controller;
class Demo extends Controller
{
    public function index()
    {
    	$info="hello word!";
    	$this->assign([
			"info" => $info
		]);
		return $this->fetch();
    }

    public function arr(){
    	$info=array(
    	[
    	 "name"=>"tom",
    	 "age"=>"19",
    	 "sex"=>"男",
    	 ],
    	 [
    	 "name"=>"jarry",
    	 "age"=>"18",
    	 "sex"=>"女",
    	 ]
    	 );

    	$num_info=array(
    	[
    	 "name"=>"tom",
    	 "age"=>"19",
    	 "sex"=>"1",
    	 ],
    	 [
    	 "name"=>"jarry",
    	 "age"=>"18",
    	 "sex"=>"0",
    	 ]
    	 );
    	$this->assign([
			"info" => $info,
			"num_info" => $num_info
		]);
		return $this->fetch();
    }
}