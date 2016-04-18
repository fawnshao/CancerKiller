<?php
namespace Home\Controller;
use Think\Controller;

header("charset=utf-8");
class CancerController extends Controller {
	public function index(){

		$this->display('index');
    }
    public function query(){

    	$this->display('query');
    }
 
   

}