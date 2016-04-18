<?php
namespace Home\Controller;
use Think\Controller;

header("charset=utf-8");
class GeneController extends Controller {
	public function index(){

        $this->display('index');
    }


}