<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cancer Killer</title>
<link  rel="stylesheet" href="/CancerKiller/Public/css/chooseCancer.css"  type="text/css"/>
<link  rel="stylesheet" href="/CancerKiller/Public/css/pic.css" media="screen"/>
<link  rel="stylesheet" href="/CancerKiller/Public/css/demo.css" media="screen"/>
<script src="/CancerKiller/Public/js/jquery.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/cancer.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/guide.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/public.js" type="text/javascript"></script>
<link rel = "Shortcut Icon" href="/CancerKiller/Public/images/logo.ico"/>
</head>
<body  style="background-color:rgba(92,167,186,0.5);position:relative">
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
							<a href="/CancerKiller/">首页</a>
						</h2>
					</li>
					<li class="nav-up-selected-inpage"  _t_nav="browse">
						<h2>
							<a href="/CancerKiller/index.php/Home/Cancer/../Cancer/index" >&nbsp;&nbsp;癌&nbsp;症&nbsp;&nbsp;</a>
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
							<a href="/CancerKiller/Home/Login/login" >登录注册</a>
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
 <br> <br> 
<div id="main">
 <form name="form10" action="/CancerKiller/Home/Cancer/query" target="_blank" method="get">
    <font size=4px color=red>*&nbsp;</font><font style="font-family:'微软雅黑';font-size:17px;">您可以点击下面的文本框选择癌型，也可以点击图片的相应部位选择</font><br><br>
	<font style="font-family:'微软雅黑';font-size:23px;">选择癌症: &nbsp; </font><input type="text" style="height:31px;width:160px;font-size:20px;border: 2px solid; border-color: D7D7D7 ;" name="cancer2" id="cancer2-name" value="点我选择癌症" onclick="pop()">
	<input type="submit"  name="submit" style="font-family:'微软雅黑';border:0;vertical-align:middle;margin:8px;line-height:18px;font-size:18px;width:100px;height:35px;" value="查询"/>
 </form>	
	<div id="choose-box-wrapper">
	  <div id="choose-box">
		<div id="choose-box-title">
			<span>选择癌症</span>
		</div>
		<div id="choose-a-cancer">
		</div>
		<div id="choose-a-cancer2">
		</div>
		<div id="choose-box-bottom">
			<input type="bottom" onclick="hide()" value="关闭" />
		</div>
	  </div>
	</div>
	</div><br></br>

  <script type="text/javascript">
	
    function pop(){

		makeCenter();

		initcancer();

		$('[cancer-id="1"]').addClass('choosen');

		
		initcancer2(1);
	}

	function hide()
	{
		$('#choose-box-wrapper').css("display","none");
	}

	function initcancer()
	{
		
		$('#choose-a-cancer').html('');
		for(i=0;i<cancer2List.length;i++)
		{
			$('#choose-a-cancer').append('<a class="cancer-item" cancer-id="'+cancer2List[i].id+'">'+cancer2List[i].name+'</a>');
		}

		$('.cancer-item').bind('click', function(){
				var item=$(this);
				var cancer = item.attr('cancer-id');
				var choosenItem = item.parent().find('.choosen');
				if(choosenItem)
					$(choosenItem).removeClass('choosen');
				item.addClass('choosen');
			
				initcancer2(cancer);
			}
		);
	}

	function initcancer2(cancerID)
	{
	
		$('#choose-a-cancer2').html('');
		var cancer2s = cancer2List[cancerID-1].cancer2;
		for(i=0;i<cancer2s.length;i++)
		{
			$('#choose-a-cancer2').append('<a class="cancer2-item" cancer2-id="'+cancer2s[i].id+'">'+cancer2s[i].name+'</a>');
		}

		$('.cancer2-item').bind('click', function(){
				var item=$(this);
				var cancer2 = item.attr('cancer2-id');
		
				$('#cancer2-name').val(item.text());
		
				hide();
			}
		);
	}

	function makeCenter()
	{
		$('#choose-box-wrapper').css("display","block");
		$('#choose-box-wrapper').css("position","absolute");
		$('#choose-box-wrapper').css("top", Math.max(0, (($(window).height() - $('#choose-box-wrapper').outerHeight()) / 2) + $(window).scrollTop()) + "px");
		$('#choose-box-wrapper').css("left", Math.max(0, (($(window).width() - $('#choose-box-wrapper').outerWidth()) / 2) + $(window).scrollLeft()) + "px");
	}
  </script>
<div id="main2">


<img src="/CancerKiller/Public/images/person.jpg" width="720" height="960" usemap="#Map" border="0" />
 <map name="Map" id="Map">
   <area class="mapArea1" shape="poly" coords="340,79,353,72,369,71,385,78,391,87,393,104,393,121,393,138,393,152,385,163,387,181,389,195,389,205,382,211,362,213,350,216,347,216,334,213,329,210,333,200,337,176,337,167,331,149,332,137,332,125,332,114,329,94,333,88" href="javascript:void(-1)" style="outline:none;" />
   <area class="mapArea2" shape="poly" coords="316,244,306,264,305,280,304,297,301,313,308,320,319,310,323,304,327,300,330,298,336,294,341,291,345,287,350,281,353,272,356,259,356,245,353,234,353,224,345,220,336,222,329,225,323,231,319,237" href="javascript:void(-1)" style="outline:none;" />   
   <area class="mapArea2" shape="poly" coords="375,240,376,234,376,226,381,222,389,219,392,225,401,232,406,234,410,248,416,252,420,266,421,277,423,297,424,321,415,314,403,303,393,298,382,288,381,275,376,260,375,250" href="javascript:void(-1)" style="outline:none;"/>
   <area class="mapArea3" shape="poly" coords="342,302,328,310,321,322,313,328,309,339,309,357,315,373,321,373,309,383,311,396,311,406,315,416,321,428,330,446,349,449,365,443,377,445,392,432,401,421,407,409,413,381,412,365,412,337,398,322,389,308,378,308,354,301"  href="javascript:void(-1)" style="outline:none;"/>
   <area class="mapArea4" shape="poly" coords="319,468,335,464,348,459,369,462,390,466,404,479,396,494,377,510,367,518,354,520,340,512,328,495,324,482" href="javascript:void(-1)" style="outline:none;" />
   <area class="mapArea5" shape="poly" coords="305,524,289,553,287,575,287,597,287,623,287,658,286,718,286,765,289,816,293,854,303,871,312,828,312,786,312,739,316,696,330,624,328,570,319,532" href="javascript:void(-1)" style="outline:none;"/>
   <area class="mapArea5" shape="poly" coords="413,520,431,518,431,539,437,571,433,597,432,640,437,672,438,698,441,737,442,760,442,785,438,816,434,835,428,859,419,852,418,819,410,777,412,703,407,649,399,605,398,572,401,539" href="javascript:void(-1)" style="outline:none;" />
   <area class="mapArea6" shape="poly" coords="252,255,243,285,246,286,238,303,233,326,229,347,214,360,212,391,203,408,195,438,186,476,170,495,170,519,191,523,203,486,220,436,237,395,250,366,263,322,273,282,271,259" href="javascript:void(-1)" style="outline:none;" />
   <area class="mapArea7" shape="poly" coords="446,245,461,236,473,240,476,255,476,280,479,306,491,340,506,362,520,410,527,442,536,482,550,502,545,517,529,520,519,502,513,459,500,428,491,408,479,378,468,347,456,313,447,271" href="javascript:void(-1)" style="outline:none;" /> 
 </map> 
<div class="mapcon mapcon1">
 <div class="map_Txt">
 <div class="map_name">头部,颈部,神经系统相关癌症</div>
 <div class="map_itm">
 <?php
 echo "<a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(鼻咽癌)." \">鼻咽癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(下咽癌)." \">下咽癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(喉癌)." \">喉癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(口腔癌)." \">口腔癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(口咽癌)." \">口咽癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(神经胶质瘤)." \">神经胶质瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(神经母细胞瘤)." \">神经母细胞瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(神经鞘瘤)." \">神经鞘瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(脑膜瘤)." \">脑膜瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(甲状腺癌)." \">甲状腺癌</a>
 "; ?>
 </div>
</div>
</div>
<div class="mapcon mapcon2">
 <div class="map_Txt">
 <div class="map_name">肺,胸膜,乳腺相关癌症</div>
 <div class="map_itm">
 <?php
 echo "
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(非小细胞肺癌)." \">非小细胞肺癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(小细胞肺癌)." \">小细胞肺癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(恶性胸膜间皮瘤)." \">恶性胸膜间皮瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(乳腺癌)." \">乳腺癌</a>
"; ?>
 </div>
 </div>
 </div>
 <div class="mapcon mapcon3">
 <div class="map_Txt">
 <div class="map_name">消化系统,内分泌器官相关癌症</div>
 <div class="map_itm">
 <?php
 echo "
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(食道癌)." \">食道癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(胃癌)." \">胃癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(类癌瘤)." \">类癌瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(结直肠癌)." \">结直肠癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(肛管癌)." \">肛管癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(肝细胞癌)." \">肝细胞癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(胆囊癌)." \">胆囊癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(胆管癌)." \">胆管癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(胰腺癌)." \">胰腺癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(肾上腺皮质癌)." \">肾上腺皮质癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(胰腺内分泌肿瘤)." \">胰腺内分泌肿瘤</a>
"; ?>
 </div>
 </div>
 </div>
  <div class="mapcon mapcon4">
 <div class="map_Txt">
 <div class="map_name">生殖器官相关癌症</div>
 <div class="map_itm">
 <?php
 echo "
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(卵巢癌)." \">卵巢癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(绒毛膜癌)." \">绒毛膜癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(子宫内膜癌)." \">子宫内膜癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(宫颈癌)." \">宫颈癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(外阴癌)." \">外阴癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(肾细胞癌)." \">肾细胞癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(膀胱癌)." \">膀胱癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(前列腺癌)." \">前列腺癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(睾丸癌)." \">睾丸癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(阴茎癌)." \">阴茎癌</a>
"; ?>
 </div>
 </div>
 </div>
   <div class="mapcon mapcon5">
 <div class="map_Txt">
 <div class="map_name">软组织和骨头相关癌症</div>
 <div class="map_itm">
 <?php
 echo "
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(黏液样脂肪肉瘤)." \">黏液样脂肪肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(纤维肉瘤)." \">纤维肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(恶性纤维组织细胞瘤（MFH）)." \">恶性纤维组织细胞瘤（MFH）</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(平滑肌肉瘤)." \">平滑肌肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(腺泡状横纹肌肉瘤)." \">腺泡状横纹肌肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(卡波济氏肉瘤)." \">卡波济氏肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(血管肉瘤)." \">血管肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(软骨肉瘤)." \">软骨肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(滑膜肉瘤)." \">滑膜肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(上皮样肉瘤)." \">上皮样肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(腺泡状横纹肌肉瘤)." \">腺泡状软组织肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(软组织透明细胞肉瘤)." \">软组织透明细胞肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(黏液样骨外软骨肉瘤)." \">黏液样骨外软骨肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(促纤维组织增生性小圆细胞肿瘤)." \">促纤维组织增生性小圆细胞肿瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(骨肉瘤)." \">骨肉瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(尤文氏肉瘤)." \">尤文氏肉瘤</a>
"; ?>
 </div>
 </div>
 </div>
    <div class="mapcon mapcon6">
 <div class="map_Txt">
 <div class="map_name">皮肤，血液，淋巴组织相关癌症</div>
 <div class="map_itm">
 <?php
 echo "
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(基底细胞癌)." \">基底细胞癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(鳞状细胞癌)." \">鳞状细胞癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(恶性黑色素瘤)." \">恶性黑色素瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(蕈样真菌病)." \">蕈样真菌病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(默克尔细胞癌)." \">默克尔细胞癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(急性髓系白血病（AML）)." \">急性髓系白血病(AML)</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(前体B淋巴细胞白血病)." \">前体B淋巴细胞白血病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(前身T淋巴细胞白血病)." \">前身T淋巴细胞白血病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(慢性粒细胞白血病（CML）)." \">慢性粒细胞白血病(CML)</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(慢性淋巴细胞白血病（CLL）)." \">慢性淋巴细胞白血病(CLL)</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(霍奇金淋巴瘤)." \">霍奇金淋巴瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(毛细胞白血病)." \">毛细胞白血病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(套细胞淋巴瘤)." \">套细胞淋巴瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(伯基特淋巴瘤)." \">伯基特淋巴瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(成人T细胞白血病)." \">成人T细胞白血病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(蕈样真菌病)." \">蕈样真菌病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(多发性骨髓瘤)." \">多发性骨髓瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(淋巴浆细胞淋巴瘤)." \">淋巴浆细胞淋巴瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(真性红细胞增多症)." \">真性红细胞增多症</a>
"; ?>
 </div>
 </div>
 </div>
     <div class="mapcon mapcon7">
 <div class="map_Txt">
 <div class="map_name">皮肤，血液，淋巴组织相关癌症</div>
 <div class="map_itm">
 <?php
 echo "
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(基底细胞癌)." \">基底细胞癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(鳞状细胞癌)." \">鳞状细胞癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(恶性黑色素瘤)." \">恶性黑色素瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(蕈样真菌病)." \">蕈样真菌病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(默克尔细胞癌)." \">默克尔细胞癌</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(急性髓系白血病（AML）)." \">急性髓系白血病(AML)</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(前体B淋巴细胞白血病)." \">前体B淋巴细胞白血病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(前身T淋巴细胞白血病)." \">前身T淋巴细胞白血病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(慢性粒细胞白血病（CML）)." \">慢性粒细胞白血病(CML)</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(慢性淋巴细胞白血病（CLL）)." \">慢性淋巴细胞白血病(CLL)</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(霍奇金淋巴瘤)." \">霍奇金淋巴瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(毛细胞白血病)." \">毛细胞白血病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(套细胞淋巴瘤)." \">套细胞淋巴瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(伯基特淋巴瘤)." \">伯基特淋巴瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(成人T细胞白血病)." \">成人T细胞白血病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(蕈样真菌病)." \">蕈样真菌病</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(多发性骨髓瘤)." \">多发性骨髓瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(淋巴浆细胞淋巴瘤)." \">淋巴浆细胞淋巴瘤</a>
 <a target=\"_blank\" class=\"cor_bs\" href=\"/CancerKiller/Home/Cancer/query.html?id=".base64_encode(真性红细胞增多症)." \">真性红细胞增多症</a>
"; ?>
 
 </div>
 </div>
 </div>
<script language="javascript">
 $(".mapArea1").hover(function(){$(".mapcon").hide();$(".mapcon1").show()});
 $(".mapcon1").hover(function(){return false;},function(){$(".mapcon1").hide()});
 
 $(".mapArea2").hover(function(){$(".mapcon").hide();$(".mapcon2").show()});
 $(".mapcon2").hover(function(){return false;},function(){$(".mapcon2").hide()});
 
 $(".mapArea3").hover(function(){$(".mapcon").hide();$(".mapcon3").show()});
 $(".mapcon3").hover(function(){return false;},function(){$(".mapcon3").hide()});
 
 $(".mapArea4").hover(function(){$(".mapcon").hide();$(".mapcon4").show()});
 $(".mapcon4").hover(function(){return false;},function(){$(".mapcon4").hide()});
 
 $(".mapArea5").hover(function(){$(".mapcon").hide();$(".mapcon5").show()});
 $(".mapcon5").hover(function(){return false;},function(){$(".mapcon5").hide()});
 
 $(".mapArea6").hover(function(){$(".mapcon").hide();$(".mapcon6").show()});
 $(".mapcon6").hover(function(){return false;},function(){$(".mapcon6").hide()});
 
 $(".mapArea7").hover(function(){$(".mapcon").hide();$(".mapcon7").show()});
 $(".mapcon7").hover(function(){return false;},function(){$(".mapcon7").hide()});
 
 $(".mapBox").hover(function(){return false;},function(){$(".mapcon").hide();});
</script>
</div>

</body>
</html>