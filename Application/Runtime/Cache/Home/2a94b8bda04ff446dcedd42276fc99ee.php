<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="IE=edge" http-equiv="X-UA-Compatible" />


<link  rel="stylesheet" href="/CancerKiller/Public/css/demo.css" media="screen"/>
<link  rel="stylesheet" href="/CancerKiller/Public/css/search.css" type="text/css" />
<link  rel="stylesheet" href="/CancerKiller/Public/css/qqchat.css"  type="text/css"/>
<link  rel="stylesheet" href="/CancerKiller/Public/css/slidebox.css"  type="text/css"/>



<script src="/CancerKiller/Public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/guide.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/jquery.min.js"></script>
<script src="/CancerKiller/Public/js/SuperSlide.js"></script>

<link rel = "Shortcut Icon" href="/CancerKiller/Public/images/logo.ico"/>


<title>Cancer Killer</title>

</head>
<body style="background-color:	rgba(225,233,220,0.99);position:relative">

<div class="head-v3">
	<div class="navigation-up">
		<div class="navigation-inner">
		  <div class="navigation-v2">
          <font style="/*font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;*/font-family:'Monotype Corsiva'; font-size:45px;color: #fff; font-weight:bold;text-shadow:0 0 5px #CCCCCC, 0 0 10px #CCCCCC, 0 0 15px #CCCCCC">Cancer killer</font>
		  </div>
			<div class="navigation-v3">
	     		<ul>
					<li class="nav-up-selected-inpage" _t_nav="home">
						<h2>
							<a href="">首页</a>
						</h2>
					</li>
					<li class=""  _t_nav="browse">
						<h2>
							<a href="/CancerKiller/index.php/Home/Cancer/index" >&nbsp;&nbsp;癌&nbsp;症&nbsp;&nbsp;</a>
						</h2>
					</li>
					<li class="" _t_nav="medicine">
						<h2>
							<a href="/CancerKiller/index.php/Home/Medicine/medicineQuery">&nbsp;&nbsp;药&nbsp;物&nbsp;&nbsp;</a>
						</h2>
					</li>
					<li class="" _t_nav="gene">
						<h2>
							<a href="/CancerKiller/index.php/Home/Gene/index">&nbsp;&nbsp;基&nbsp;因&nbsp;&nbsp;</a>
						</h2>
					</li>
					<li class="" _t_nav="login">				  
						<h2>
							<a href="/CancerKiller/index.php/Home/Login/login">登录注册</a>
						</h2>
					</li>
					<li _t_nav="us">
						<h2>
							<a href="/CancerKiller/index.php/Home/Member/member">关于网站</a>
						</h2>
					</li>
				</ul>
			</div>
		</div>
</div>


<br/><br/><br/>
<form name="searchform" action="/CancerKiller/index.php/Home/search/search" method="post">
<div class="search-form" style="margin:20px auto;">
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

 

 

<div id="floatTools" class="rides-cs" style="height:246px;">
  <div class="floatL">
  	<a id="aFloatTools_Show" class="btnOpen" title="查看在线咨询" style="top:20px;display:block" href="javascript:void(0);">展开</a>
  	<a id="aFloatTools_Hide" class="btnCtn" title="关闭在线咨询" style="top:20px;display:none" href="javascript:void(0);">收缩</a>
  </div>
  <div id="divFloatToolsView" class="floatR" style="display: none;height:237px;width: 140px;">
    <div class="cn">
      <h3 class="titZx">专家在线咨询</h3>
      <ul>
        <li><span>内科医生</span> <a target="_blank" href="tencent://message/?uin=1090454488&Menu=yes"><img border="0" src="/CancerKiller/Public/images/online.png" alt="点击这里咨询内科医生" title="点击这里咨询内科医生"/></a> </li>
        <li><span>外科医生</span> <a target="_blank" href="tencent://message/?uin=576128317&Menu=yes"><img border="0" src="/CancerKiller/Public/images/online.png" alt="点击这里咨询外科医生" title="点点击这里咨询外科医生"/></a> </li>
        <li><span>药剂师&nbsp;</span> <a target="_blank" href="tencent://message/?uin=1090454488&Menu=yes"><img border="0" src="/CancerKiller/Public/images/online.png" alt="点击这里咨询药剂师" title="点击这里咨询药剂师"/></a> </li>

        <li style="border:none;"><span>电话：123456789</span> </li>
      </ul>
    </div>
  </div>
</div>

<script>
	$(function(){
		$("#aFloatTools_Show").click(function(){
			$('#divFloatToolsView').animate({width:'show',opacity:'show'},100,function(){$('#divFloatToolsView').show();});
			$('#aFloatTools_Show').hide();
			$('#aFloatTools_Hide').show();				
		});
		$("#aFloatTools_Hide").click(function(){
			$('#divFloatToolsView').animate({width:'hide', opacity:'hide'},100,function(){$('#divFloatToolsView').hide();});
			$('#aFloatTools_Show').show();
			$('#aFloatTools_Hide').hide();	
		});
	});
</script>

</div>

<br/><br/><br/>
<div id="slideBox" class="slideBox">
      <div class="bd">
        <ul>
          <li> 
            <a target="_blank" href="http://www.biodiscover.com/news/research/116990.html"><img src="/CancerKiller/Public/images/news1.png" /></a>
            <div class="burder_content"> 
              <a target="_blank" href="http://www.biodiscover.com/news/research/116990.html" class="burder_content_title">Nature发文：大数据助力癌症精准化医疗</a>
              <p class="burder_content_content">最近几年许多研究机构整理了大范围的癌症组学数据，希望通过这些信息找到驱动癌症发生的分子，并作为药物靶点进行阻断。</p>
              <a class="burder_content_lookall" target="_blank" href="http://www.biodiscover.com/news/research/116990.html">详情&gt;</a> 
              <a class="burder_content_lookmore"  href="/CancerKiller/index.php/Home/News/news">更多资讯&gt;</a> 
            </div>
          </li>
          <li> 
            <a target="_blank" href="http://www.biodiscover.com/news/industry/173572.html"><img src="/CancerKiller/Public/images/news2.png" /></a>
            <div class="burder_content">  
              <a target="_blank" href="http://www.biodiscover.com/news/industry/173572.html" class="burder_content_title">【IOM报告】启动精准医学的关键</a>
              <p class="burder_content_content">精准医学的领域进展迅速，新的分子靶向药物和相关的生物标记物检测正在涌入药物研发生产线，等待批准使用。但是。。。。。<br></br></p>
              <a class="burder_content_lookall" target="_blank" href="http://www.biodiscover.com/news/industry/173572.html">详情&gt;</a> 
              <a class="burder_content_lookmore" href="/CancerKiller/index.php/Home/News/news">更多资讯&gt;</a> 
            </div>
          </li>
          <li> 
            <a target="_blank" href="http://www.guokr.com/article/440297/"><img src="/CancerKiller/Public/images/news3.png" /></a>
            <div class="burder_content"> 
              <a target="_blank" href="http://www.guokr.com/article/440297/" class="burder_content_title">精准医疗”变革：中国准备好了吗？</a>
              <p class="burder_content_content">按照美国国立卫生研究院（NIH）对“精准医疗”的定义，“精准医疗”是一个建立在了解个体基因、环境以及生活方式的基础上的新兴疾病治疗和预防方法。</p>
              <a class="burder_content_lookall" target="_blank" href="http://www.guokr.com/article/440297/">详情&gt;</a> 
              <a class="burder_content_lookmore"  href="/CancerKiller/index.php/Home/News/news">更多资讯&gt;</a> 
            </div>
          </li>
          <li> 
            <a target="_blank" href="http://www.guokr.com/article/5253/"><img src="/CancerKiller/Public/images/news4.png" /></a>
            <div class="burder_content"> 
              <a target="_blank" href="http://www.guokr.com/article/5253/" class="burder_content_title">靶向治疗：精确的癌症杀手</a>
              <p class="burder_content_content">传统的放疗、化疗在抑制或杀灭癌细胞的同时，也会对正常细胞产生损伤。所以人们一直在思考，如何才能更精确地处理癌变细胞？如何尽量减少对正常细胞造成的伤害？</p>
              <a class="burder_content_lookall" target="_blank" href="http://www.guokr.com/article/5253/">详情&gt;</a>
              <a class="burder_content_lookmore"  href="/CancerKiller/index.php/Home/News/news">更多资讯&gt;</a> 
              
            </div>
          </li>
          <li> 
            <a target="_blank" href="http://cancergenome.nih.gov/cancergenomics/impact"><img src="/CancerKiller/Public/images/news5.png" /></a>
            <div class="burder_content"> 
              <a target="_blank" href="http://cancergenome.nih.gov/cancergenomics/impact" class="burder_content_title">Impact of Cancer Genomic</a>
              <p class="burder_content_content">Precision medicine is a phrase that is often used to describe how genetic information about a person’s disease is being used to diagnose or treat their disease. </p>
              <a class="burder_content_lookall" target="_blank" href="http://cancergenome.nih.gov/cancergenomics/impact">详情&gt;</a> 
              <a class="burder_content_lookmore"  href="/CancerKiller/index.php/Home/News/news">更多资讯&gt;</a> 
            </div>
          </li>
        </ul>
      </div>
      <div class="hd">
        <ul>
          <li><a href="javascript:">Nature发文...</a></li>
          <li><a href="javascript:">IOM报告...</a></li>
          <li><a href="javascript:">精准医疗变革...</a></li>
          <li><a href="javascript:">靶向治疗...</a></li>
          <li><a href="javascript:">Impact of Cancer...</a></li>
        </ul>
      </div>
    </div>
    
    <script>
	  jQuery(".slideBox").slide({ mainCell:".bd ul",effect:"left",autoPlay:true} );
    </script> 


<br/><br/><br/>
<div class="bottom">
<br/>
<center>Copyright © "别喝，那是我的福尔马林"  All rights reserved <br/>中国大学生计算机设计大赛江苏赛区<br/> “别喝，那是我的福尔马林”代表队</center> 
<br/></div>

</body>
</html>