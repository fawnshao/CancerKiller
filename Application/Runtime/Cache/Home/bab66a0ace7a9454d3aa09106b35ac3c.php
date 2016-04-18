<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel = "Shortcut Icon" href="/CancerKiller/Public/images/logo.ico"/>
<title>Cancer Killer</title>
<link  rel="stylesheet" href="/CancerKiller/Public/css/demo.css" media="screen"/>
<link  rel="stylesheet" href="/CancerKiller/Public/css/medcontainer.css" />
 <link  rel="stylesheet" href="/CancerKiller/Public/css/med.css" />
 <link href="/CancerKiller/Public/css/medwin.css" rel="stylesheet" type="text/css" />
<link href="/CancerKiller/Public/css/medDaquanTable.css" rel="stylesheet" type="text/css" />
<style>
.message{ width:260px; height:160px; background:rgba(92,167,186,0.4);border:1px solid rgba(189,172,156,0.8); position:fixed; right:-262px; bottom:10px;}
.window{ width:260px; height:40px; background:rgba(0,90,171,0.5);border:1px solid rgba(189,172,156,0.8); position:fixed; right:-262px; bottom:170px;}
.window .close{ font-family:'Microsoft Yahei';font-size:12px;width:35px; height:40px; line-height:33px;display:block; float:right;margin-right:3px;}
</style>
 
<script src="/CancerKiller/Public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/guide.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/jquery.min.js"></script>


<script type="text/javascript" src="/CancerKiller/Public/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="/CancerKiller/Public/js/gm.js"></script>
<script>$(document).ready(function(){$(".vertical-nav").verticalnav({speed: 400,align: "left"});});</script>

<script type="text/javascript">
$(document).ready(function(){
	$(".showdiv2").click(function(){
		var box =300;
		var th= $(window).scrollTop()+$(window).height()/1.6-box-100;
		var h =document.body.clientHeight;
		var rw =$(window).width()/2-box-300;
		$(".showbox2").animate({top:th,opacity:'show',width:1200,height:600,right:rw},500);
		$("#zhezhao").css({
			display:"block",height:$(document).height()
		});
		return false;
	});
	$(".showbox2 .close").click(function(){
		$(this).parents(".showbox2").animate({top:0,opacity: 'hide',width:0,height:0,right:0},500);
		$("#zhezhao").css("display","none");
	});
});
</script>

<script>
$(function (){
$('.window').animate({right:'10px'},1000);
$('.window .close').click(function(){
   $('.window').hide();
});
});
</script>
<script>
$(function (){
$('.message').animate({right:'10px'},1000);
$('.window .close').click(function(){
   $('.message').hide();
});
});
</script>

<script type="text/javascript" src="/CancerKiller/Public/js/json2.min.js"></script>
<script type="text/javascript" src="/CancerKiller/Public/js/AC_OETags.min.js"></script>
<script type="text/javascript" src="/CancerKiller/Public/js/cytoscapeweb.min.js"></script>

        <script type="text/javascript">
            window.onload = function() {
                // id of Cytoscape Web container div
                var div_id = "cytoscapeweb";
                // NOTE: - the attributes on nodes and edges
                //       - it also has directed edges, which will automatically display edge arrows
                var xml = '\
                <graphml>\
                  <key id="label" for="all" attr.name="label" attr.type="string"/>\
                  <key id="weight" for="node" attr.name="weight" attr.type="double"/>\
                  <graph edgedefault="directed">\
                	<?php
 if($_GET['id']){ $med = base64_decode(str_replace(" ","+",$_GET['id'])); } $medtar = M("medtar"); $med_data['medicine'] = $med; $list = $medtar->where($med_data)->getField('gene',true); $dismed = M("dismed"); $med_data2['medicine'] = $med; $list2 = $dismed->where($med_data2)->getField('disease',true); ?>
                    <node id="1">\
                        <data key="label"><?php echo $med; ?></data>\
                        <data key="weight">3.0</data>\
                    </node>\
<?php
 for($c=0;$c<count($list);$c++){ echo " <node id=\"".($c+2)."\">\
    			<data key=\"label\">".$list[$c]."</data>\
        		<data key=\"weight\">5.0</data>\
    			</node>\   "; } for($c=0;$c<count($list2);$c++){ echo " <node id=\"".($c+count($list)+2)."\">\
            	<data key=\"label\">".$list2[$c]."</data>\
                <data key=\"weight\">4.0</data>\
                </node>\   "; } for($q=0;$q<count($list);$q++){ echo " <edge source=\"1\" target=\"".($q+2)."\">\
            <data key=\"label\">".$list[$q]."  to   ".$med."</data>\
            </edge>\  	";} for($q=0;$q<count($list2);$q++){ echo " <edge source=\"".($q+count($list)+2)."\" target=\"1\">\
            <data key=\"label\">".$med."  to   ".$list2[$q]."</data>\
            </edge>\  	";} ?>
                  </graph>\
                </graphml>\
                ';
                

                // visual style we will use
                var visual_style = {
                    global: {
                        backgroundColor: "#ABCFD6",
                    },
                    nodes: {
                        shape: "OCTAGON",
                        borderWidth: 3,
                        borderColor: "#ffffff",
                        size: {
                            defaultValue: 25,
                            continuousMapper: { attrName: "weight", minValue: 55, maxValue: 75 }
                        },
                        color: {
                            discreteMapper: {
                                attrName: "id",
                                entries: [
<?php
 for($i=0;$i<count($list);$i++){ echo "{ attrValue: ".($i+2).", value: \"#0B94B1\" },"; } for($i=0;$i<count($list2);$i++){ echo "{ attrValue: ".($i+count($list)+2).", value: \"#28FF28\" },"; } ?>
						]
                            }
                        },
                        labelHorizontalAnchor: "center"
                    },
                    edges: {
                        width: 3,
                        color: "#4169E1"
                    }
                };
                
                // initialization options
                var options = {
                    swfPath: "/CancerKiller/Public/swf/CytoscapeWeb",
                    flashInstallerPath: "/CancerKiller/Public/swf/playerProductInstall"
                };
                
                var vis = new org.cytoscapeweb.Visualization(div_id, options);
                
                vis.ready(function() {
                    // set the style programmatically
                    document.getElementById("color").onclick = function(){
                        visual_style.global.backgroundColor = rand_color();
                        vis.visualStyle(visual_style);
                    };
                });

                var draw_options = {
                    // your data goes here
                    network: xml, 
                    // show edge labels too
                    edgeLabelsVisible: false,
                    
                    // let's try another layout
                    layout: "Radial",
                    
                    // set the style at initialisation
                    visualStyle: visual_style,
                    
                    // hide pan zoom
                    panZoomControlVisible: true 
                };
                
                vis.draw(draw_options);
            };
        </script>
        <style>  
            body { line-height: 1.5; color: #000000; font-size: 14px; }
            /* The Cytoscape Web container must have its dimensions set. */
            #cytoscapeweb { width: 1200px; height: 600px; }
        </style>
</head>
<body style="background-color:#fff;position:relative">
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
							<a href="/CancerKiller/Home/Cancer/index" >&nbsp;&nbsp;癌&nbsp;症&nbsp;&nbsp;</a>
						</h2>
					</li>
					
					<li class="nav-up-selected-inpage" _t_nav="medicine">
						<h2>
							<a href="#">&nbsp;&nbsp;药&nbsp;物&nbsp;&nbsp;</a>
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
<?php
 $cancer = M("cancer"); $dismed = M("dismed"); $res = $cancer->select(); for($r=0;$r<count($res);$r++){ $temp[$r]=$res[$r]['first']; } $rest=array_unique($temp); $countnum=0; foreach($rest as $key=>$value){ $rest2[$countnum++] = $key; } for($d=0;$d<count($rest);$d++){ $restemp[$d] = $rest[$rest2[$d]]; } echo "<div id=\"Container\"><br><div id=\"C-Left\"><div class=\"content\"><ul class=\"vertical-nav dark red\">"; echo "<li><a href=\"\"></a></li>"; for($i=0;$i<count($restemp);$i++){ echo "<li><a href=\"\">".$restemp[$i]; echo "<span class=\"submenu-icon\"></span></a><ul>"; $data['first']=$restemp[$i]; $res2 = $cancer->where($data)->select(); for($m=0;$m<count($res2);$m++){ echo "<li><a href=\"\">".$res2[$m][second]."<span class=\"submenu-icon\"></span></a><ul>"; $data2['disease'] = $res2[$m][second]; $res3 = $dismed->where($data2)->select(); for($n=0;$n<count($res3);$n++){ echo "<li><a href=\"medicineQuery.html?id=".base64_encode($res3[$n]['medicine'])."\">".$res3[$n]['medicine']."</a></li>"; } echo "</ul></li>"; } echo "</ul>"; } echo "<li><a href=\"\"></a></li>"; echo "<li><a href=\"\"></a></li>"; echo "</ul></div></div>"; echo "<div id=\"C-Main\"><br><br>"; if($_GET['id']){ $id = base64_decode(str_replace(" ","+",$_GET['id'])); $medicine = $id; $medinfor = M("medinfor"); $data['medicine']="$medicine"; $list = $medinfor->where($data)->select(); if(count($list)!=0){ echo "<table class=\"bordered\">"; echo "<thead>"; echo "<tr>"; echo "<th><font style=\"font-family:Microsoft Yahei;font-size:20px;color:#0072a8;\" >&nbsp;属&nbsp;&nbsp;性&nbsp;</font></th>"; echo "<th><font style=\"font-family:Microsoft Yahei;font-size:20px;color:#0072a8;\" >描&nbsp;&nbsp;述&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"showdiv2\" style=\"font-size:18px;color:#FF0000;\">【点击此处查看药物基因疾病网络图】</a></font></th>"; echo "</tr>"; echo "</thead>"; foreach($list as $key=>$value){ foreach($value as $k=>$val){ if($k=='medicine'){ } else{ echo "<tr>"; echo "<td> <font style=\"font-family:Microsoft Yahei;font-size:16px;color:#0072a8;\">$k</font> </td>"; echo "<td><font style=\"font-family:Microsoft Yahei;font-size:16px;color:#0072a8;\"> $val </font></td>"; echo "</tr>"; } } } echo "</table>"; }else { echo "<font style=\"font-size:20px;font-family:Microsoft Yahei;\">您要查询的药物  <font style=\"color:rgba(255,66,93,0.7);\">$medicine </font>数据暂缺<br/>我们很抱歉</font>"; } } echo "</div></div>"; ?>

	<div class="showbox2" >
		<h2>药物基因疾病网络图(点击右下角小工具可以放大与移动,图中的小元素也是可以移动的)<a class="close" href="#">【关闭】</a></h2>
	<div id="cytoscapeweb">
        </div>
	</div>	
    <div id="zhezhao"></div>
    
    

<div class="window">
<a href="javascript:" class="close">[关闭]</a><br>
<!--  
<br></br>&nbsp;&nbsp;<font style="font-family:Microsoft Yahei;font-size:14px;color:#0072a8;">请在左侧选择您要查询的药物并点<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;击查询</font><br></br>
-->
</div>
<div class="message">
<br/>&nbsp;&nbsp;<font style="font-family:Microsoft Yahei;font-size:14px;color:#0072a8;">请在左侧选择您要查询的药物并点<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;击查询<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们衷心祝愿您身体健康！</font><br></br>
</div>
</body>
</html>