<?php
namespace Home\Controller;
use Think\Controller;

header("charset=utf-8");
class NewsController extends Controller {
	public function news(){
		$this->display('news');
	}

	 

}