<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link  rel="stylesheet" href="/CancerKiller/Public/css/demo.css" media="screen"/>
<link  rel="stylesheet" href="/CancerKiller/Public/css/search.css" type="text/css" />
<link  rel="stylesheet" href="/CancerKiller/Public/css/searchhtml.css" type="text/css" />
<link  rel="stylesheet" href="/CancerKiller/Public/css/pages.css" type="text/css" /> 
<script src="/CancerKiller/Public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/guide.js" type="text/javascript"></script> 
<script src="/CancerKiller/Public/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/jPages.js" type="text/javascript"></script>
<title>Cancer Killer</title>
<link rel = "Shortcut Icon" href="/CancerKiller/Public/images/logo.ico"/>
</head>
<body style="position:relative;">
<div class="head-v3">
	<div class="navigation-up">
		<div class="navigation-inner">
		<div class="navigation-v2">
          <font style="/*font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;*/font-family:'Monotype Corsiva'; font-size:45px;color: #fff; font-weight:bold;text-shadow:0 0 5px #CCCCCC, 0 0 10px #CCCCCC, 0 0 15px #CCCCCC">Cancer killer</font>
		  </div>
			<div class="navigation-v3">	
				<ul>
					<li class="" _t_nav="home">
						<h2>
							<a href="/CancerKiller">首页</a>
						</h2>
					</li>
					<li class=""  _t_nav="browse">
						<h2>
							<a href="/CancerKiller/Home/Cancer/index.html/" >&nbsp;&nbsp;癌&nbsp;症&nbsp;&nbsp;</a>
						</h2>
					</li>
					
					<li class="" _t_nav="medicine">
						<h2>
							<a href="/CancerKiller/Home/Medicine/medicineQuery">&nbsp;&nbsp;药&nbsp;物&nbsp;&nbsp;</a>
						</h2>
					</li>
					<li class="" _t_nav="gene">
						<h2>
							<a href="/CancerKiller/Home/Gene/index">&nbsp;&nbsp;基&nbsp;因&nbsp;&nbsp;</a>
						</h2>
					</li>
					<li class="" _t_nav="login">				  
						<h2>
							<a href="/CancerKiller/Home/Login/login">登录注册</a>
						</h2>
					</li>
					<li _t_nav="us">
						<h2>
							<a href="/CancerKiller/Home/Member/member">关于网站</a>
						</h2>
					</li>
				</ul>
			</div>
		</div>
   </div>
</div>
<br></br>

<div id="header">
<form name="searchform1" action="/CancerKiller/Home/Search/search" method="post">
<div class="search-form">
        <div id="search-bd" class="search-bd">
            <ul>

        <li class="selected">疾病</li>
        <li>药品</li>
        <li>基因</li>
            </ul>
        </div>
        <div id="search-hd" class="search-hd">
            <div class="search-bg"></div>         
			<input type="text" id="s1" name="dis" class="search-input" />         
			<input type="text" id="s2" name="med" class="search-input" />
			<input type="text" id="s3" name="gen" class="search-input" /> 
            <span class="s1 pholder">示例：白血病</span>
            <span class="s2 pholder">示例：顺铂</span>
			<span class="s2 pholder">示例：EGFR</span>
            <input type="submit" name="btn_submit" class="btn-search" value="搜索" ></input>
        </div>
    </div>
 </form>
 </div>
    <script>
        $(function(){
            //通用头部搜索切换
            $('#search-hd .search-input').on('input propertychange',function(){
                var val = $(this).val();
                if(val.length > 0){
                    $('#search-hd .pholder').hide(0);
                }else{
                    var index = $('#search-bd li.selected').index();
                    $('#search-hd .pholder').eq(index).show().siblings('.pholder').hide(0);
                }
            })
            $('#search-bd li').click(function(){
                var index = $(this).index();
                $('#search-hd .pholder').eq(index).show().siblings('.pholder').hide(0);
                $('#search-hd .search-input').eq(index).show().siblings('.search-input').hide(0);
                $(this).addClass('selected').siblings().removeClass('selected');
                $('#search-hd .search-input').val('');
            });
        })
    </script>
  
  
  
    		<script>
  			$(function() {
    		$("div.holder").jPages({
      		containerID: "itemContainer",
	  		previous: "上一页",
      		next: "下一页",
      		perPage: 2
    		});
  			});
  			</script>
<?php
 if($_POST['dis']){ if(count($list)!=0){ echo "<div id=\"content-left\"><h4>根据您的搜索关键词:&nbsp;\"<font color=\"red\">".$_POST['dis']."\"<br></font>"; echo "我们为您匹配了以下结果，请选择您要查询的并点击</h4> <ul id=\"itemContainer\">"; for($i=0;$i<count($list);$i++){ $second = $list[$i][second]; echo "<li><div class=\"searchres\">"; echo "<h1><a href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode($second)." \">".$list[$i][second]."</a></h1></div>"; echo "<h3>".$list[$i][description]." </h3><div class=\"searchres\"><a  href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode($second)."\">详细内容&gt;</a></div></li>"; } echo "</ul></div>"; }else { echo "<div id=\"content-left\"><h1>您要查询的数据暂无</h1></div>"; } }else if($_POST['med']){ if(count($list)!=0){ echo "$flag<div id=\"content-left\"><h4>根据您的搜索关键词:&nbsp;\"<font color=\"red\">".$_POST['med']."\"<br></font>"; echo "我们为您匹配了以下结果，请选择您要查询的并点击</h4> <ul id=\"itemContainer\">"; for($i=0;$i<count($list);$i++){ $medname = $list[$i][medicine]; echo "<li><div class=\"searchres\">"; echo "<h1><a href=\"../Medicine/medicineQuery.html?id=".base64_encode($medname)." \">".$list[$i][medicine]."</a></h1></div>"; echo "<h3>".mb_substr($list[$i][注意事项],0,130)."...... </h3><div class=\"searchres\"><a  href=\"../Medicine/medicineQuery.html?id=".base64_encode($medname)."\">详细内容&gt;</a></div></li>"; } echo "</ul></div>"; }else { echo "<div id=\"content-left\"><h1>您要查询的数据暂无</h1></div>"; } }else { if(count($list)!=0){ echo "$flag<div id=\"content-left\"><h4>根据您的搜索关键词:&nbsp;\"<font color=\"red\">".$_POST['gen']."\"<br></font>"; echo "我们为您匹配了以下结果，请选择您要查询的并点击</h4> <ul id=\"itemContainer\">"; for($i=0;$i<count($list);$i++){ $genename = $list[$i]; echo "<li><div class=\"searchres\">"; echo "<h1><a href=\"../Gene/index.html?id=".base64_encode($genename)." \">".$list[$i]."</a></h1></div>"; echo "<div class=\"searchres\"><a  href=\"../Gene/index.html?id=".base64_encode($genename)."\">详细内容&gt;</a></div></li>"; } echo "</ul></div>"; }else { echo "<div id=\"content-left\"><h1>您要查询的数据暂无</h1></div>"; } } echo "<div id=\"content-right\"><img src=\"/CancerKiller/Public/images/gene/gene".rand(1,10).".png\" /><br></br>"; $guide = M("guide"); $randId['id'] = rand(1,20); $tips = $guide->where($randId)->select(); echo "<h3>".$tips[0][title]."</h3>"; echo "<h3>".$tips[0][content]."</h3>"; echo "</div>"; echo "<div id=\"footer\"><div class=\"holder\"></div></div>"; ?>

			
</body>
</html>