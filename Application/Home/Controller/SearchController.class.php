<?php
namespace Home\Controller;
use Think\Controller;

header("charset=utf-8");
class SearchController extends Controller {
	public function search(){
		if(isset($_POST["btn_submit"])){
			if (!empty($_POST['dis'])){
				$disease = strtr($_POST['dis'],array(' '=>''));
				$disease = str_split($disease);
				//每个中文之间插一个%
				for($n=0,$m=0;$m<(count($disease)+count($disease)/3+1);$m++){
					if($m%4==0){
						$disname[$m] = "%";
					}else {
						$disname[$m] = $disease[$n];
						$n++;
					}
				}
				$dis = implode($disname);
			}else if (!empty($_POST['med'])){  //处理medicine的用户输入关键词
				$medicine = strtr($_POST['med'],array(' '=>''));
				$medicine = str_split($medicine);
				//每个中文之间插一个%
				for($n=0,$m=0;$m<(count($medicine)+count($medicine)/3+1);$m++){
					if($m%4==0){
						$medname[$m] = "%";
					}else {
						$medname[$m] = $medicine[$n];
						$n++;
					}
				}
				$med = implode($medname);
			}else if(!empty($_POST['gen'])){
				$gene = strtr($_POST['gen'],array(' '=>''));
				$gene = str_split($gene);
				//每个英文之间插一个%
				for($m=0,$n=0;$m<2*count($gene)+1;$m++){
                	 if($m%2==0){
                	 	$geneTemp[$m] = "%";
                	 }else {
                	 	$geneTemp[$m] = $gene[$n];
                	 	$n++;
                	 }
				}
				$gen = implode($geneTemp);	
			}else if(empty($_POST['dis'])){
				$this->display();
			}else if(empty($_POST['med'])){
				$this->display();
			}else if(empty($_POST['gen'])){
				$this->display();
			}
		}

		 
		if($dis){
			//实例化db_dismed对象
			$cancer=D('cancer');
			$where['second']=array('like',"$dis");
			$list = $cancer->where($where)->select();
			$this->assign('list',$list);
			$this->display();
		}else if($med){
			$medinfor=M('medinfor');
			$where['药品名称']=array('like',"$med");
			$list = $medinfor->where($where)->select();
			$this->assign('list',$list);
			$this->display();
		}else if($gen){
			$disgene=M('disgene');
			$where['zb_gene']=array('like',"$gen");
			$res = $disgene->where($where)->getField('zb_gene',true);
			for($c=0;$c<count($res);$c++){
				$res[$c] = trim($res[$c]);
			}
			//res去重复
			$rest=array_unique($res);
			//把temp的key给rest2
			$countnum=0;
			foreach($rest as $key=>$value){
				$rest2[$countnum++] = $key;
			}
			//将rest的内容给list(主要考虑到rest的key会变化，且不是顺序值)
			for($d=0;$d<count($rest);$d++){
				$list[$d] = $rest[$rest2[$d]];
			}
			$this->assign('list',$list);
			$this->display();
		}
	}

	 

}