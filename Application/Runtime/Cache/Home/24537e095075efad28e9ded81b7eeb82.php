<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cancer Killer</title>
<link  rel="stylesheet" href="/CancerKiller/Public/css/demo.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="/CancerKiller/Public/css/xiala.css">
<link rel="stylesheet" href="/CancerKiller/Public/css/tinyselect.css">
<script src="/CancerKiller/Public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/guide.js" type="text/javascript"></script>
<link rel = "Shortcut Icon" href="/CancerKiller/Public/images/logo.ico"/>
</head>
<body style="position:relative;">

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
							<a href="/CancerKiller/index.php/Home/Login/../Cancer/index" >&nbsp;&nbsp;癌&nbsp;症&nbsp;&nbsp;</a>
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
					<li class="nav-up-selected-inpage" _t_nav="login">				  
						<h2>
							<a href="#">电子病历</a>
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
<br></br>
<form action="" method="post">
<div class="xiala-container">
		<div class="row"><font style="font-size:16px;">选择基因：</font><br/><br/>
				<select name="geneselect" id="select1" >

					<option value="2">option c</option>

				</select>
	</div>
</div>
<input type="submit" value="Submit" />本模块还没完成！
</form>


<script src="/CancerKiller/Public/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/tinyselect.js"></script>
<script>
$("#select1").tinyselect();
$("#havoc").show()
</script>



</body>
</html>