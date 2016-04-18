<?php
namespace Home\Controller;
use Think\Controller;

header("charset=utf-8");
class IndexController extends Controller {
	public function index(){
        $this->display('index');
    }
     public function test(){
		 $tm = M("tm"); 
$list = $tm->limit(10)->select();
dump($list);
		 $this->display();
	 }
    

}

