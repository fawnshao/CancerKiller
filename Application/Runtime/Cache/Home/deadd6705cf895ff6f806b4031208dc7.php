<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Cancer Killer</title>
<link href="/CancerKiller/Public/css/canwin.css" rel="stylesheet" type="text/css" />
<link href="/CancerKiller/Public/css/cancercheckbox.css" rel="stylesheet" type="text/css" />
<link href="/CancerKiller/Public/css/medDaquanTable.css" rel="stylesheet" type="text/css" />
<link href="/CancerKiller/Public/css/medwin.css" rel="stylesheet" type="text/css" />
<link  rel="stylesheet" href="/CancerKiller/Public/css/demo.css" media="screen"/>
<script type="text/javascript" src="/CancerKiller/Public/js/jquery.js"></script>
<script src="/CancerKiller/Public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="/CancerKiller/Public/js/guide.js" type="text/javascript"></script>
<script type="text/javascript" src="/CancerKiller/Public/js/json2.min.js"></script>
<script type="text/javascript" src="/CancerKiller/Public/js/AC_OETags.min.js"></script>
<script type="text/javascript" src="/CancerKiller/Public/js/cytoscapeweb.min.js"></script>
<link rel = "Shortcut Icon" href="/CancerKiller/Public/images/logo.ico"/>

<script type="text/javascript">
$(document).ready(function(){
	$(".showdiv").click(function(){
		var box =300;
		var th= $(window).scrollTop()+$(window).height()/1.6-box;
		var h =document.body.clientHeight;
		var rw =$(window).width()/2-box;
		$(".showbox").animate({top:th,opacity:'show',width:600,height:340,right:rw},500);
		$("#zhezhao").css({
			display:"block",height:$(document).height()
		});
		return false;
	});
	$(".showbox .close").click(function(){
		$(this).parents(".showbox").animate({top:0,opacity: 'hide',width:0,height:0,right:0},500);
		$("#zhezhao").css("display","none");
	});
});
</script>
<script type="text/javascript">  
  // 选择或者反选 checkbox  
  function CheckSelect(thisform)  
  {  
    // 遍历 form  
    for ( var i = 0; i < thisform.elements.length; i++)  
    {  
      // 提取控件  
      var checkbox = thisform.elements[i];  
      // 检查是否是指定的控件  
      if (checkbox.name==="med[]" && checkbox.type === "checkbox" && checkbox.checked === false)  
      {  
        // 正选  
        checkbox.checked = true;  
      }  
      else if (checkbox.name==="med[]" && checkbox.type === "checkbox" && checkbox.checked === true)  
      {  
        // 反选  
        checkbox.checked = false;  
      }  
    }  
  }  
</script> 
<script type="text/javascript">  
  // 选择或者反选 checkbox  
  function CheckSelect2(thisform)  
  {  
    // 遍历 form  
    for ( var i = 0; i < thisform.elements.length; i++)  
    {  
      // 提取控件  
      var checkbox = thisform.elements[i];  
      // 检查是否是指定的控件  
      if (checkbox.name==="gene[]" && checkbox.type === "checkbox" && checkbox.checked === false)  
      {  
        // 正选  
        checkbox.checked = true;  
      }  
      else if (checkbox.name==="gene[]" && checkbox.type === "checkbox" && checkbox.checked === true)  
      {  
        // 反选  
        checkbox.checked = false;  
      }  
    }  
  }  
</script> 
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
 if($_GET['cancer2']){ $cancer = $_GET['cancer2']; }else if($_GET['id']){ $cancer = base64_decode(str_replace(" ","+",$_GET['id'])); } $disgene = M("disgene"); $can_data['disease'] = $cancer; $can_list = $disgene->where($can_data)->getField('zb_gene',true); $medtar = M('medtar'); $dismed = M('dismed'); echo "<node id=\"1\">\
         		<data key=\"label\">$cancer</data>\
         		<data key=\"weight\">3.0</data>\
            </node>\ "; for($c=0;$c<count($can_list);$c++){ echo " <node id=\"".($c+2)."\">\
	    			<data key=\"label\">".$can_list[$c]."</data>\
	        		<data key=\"weight\">5.0</data>\
	    			</node>\   "; } for($q=0;$q<count($can_list);$q++){ echo " <edge source=\"1\" target=\"".($q+2)."\">\
	            <data key=\"label\">".$cancer."  to   ".$can_list[$q]."</data>\
	            </edge>\  	"; } for($c=0;$c<count($can_list);$c++){ $can_data2['gene'] = $can_list[$c]; $can_list2 = $medtar->where($can_data2)->getField('medicine',true); for($m=0;$m<count($can_list2);$m++){ $can_data3['medicine'] = $can_list2[$m] ; $can_list3 = $dismed->where($can_data3)->getField('disease',true); for($n=0;$n<count($can_list3);$n++){ if($can_list3[$n] == $cancer){ $medRes[$p++] = $can_list2[$m]; $geneRes[$t++] = $can_list[$c]; } } } } for($t=1;$t<count($medRes);$t++){ echo " <node id=\"".($t+count($can_list)+1)."\">\
    			<data key=\"label\">".$medRes[$t]."</data>\
        		<data key=\"weight\">5.0</data>\
    			</node>\   "; } for($t=1;$t<count($geneRes);$t++){ for($m=0;$m<count($can_list);$m++){ if($geneRes[$t] == $can_list[$m] ){ echo " <edge source=\"".($m+2)."\" target=\"".($t+count($can_list)+1)."\">\
			                  </edge>\  	"; } } } ?>
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
 for($i=0;$i<count($can_list);$i++){ echo "{ attrValue: ".($i+2).", value: \"#0B94B1\" },"; } for($i=0;$i<count($medRes);$i++){ echo "{ attrValue: ".($i+count($can_list)+2).", value: \"#28FF28\" },"; } ?>
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
                    layout: "ForceDirected",
                    
                    // set the style at initialisation
                    visualStyle: visual_style,
                    
                    // hide pan zoom
                    panZoomControlVisible: true 
                };
                
                vis.draw(draw_options);
            };
        </script>
        <style>  
            body {  color: #000000; }
            /* The Cytoscape Web container must have its dimensions set. */
            #cytoscapeweb { width: 1200px; height: 600px; }
        </style>
</head>
<body style="background-color:rgba(92,167,186,0.2);position:relative">
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
</div><br></br>
<!--  
<a class="showdiv">点击我弹出浮层</a>
	<div class="showbox" style="overflow-x:scroll;overflow-y:scroll;">
		<h2>基因选择<a class="close" href="#">【关闭】</a></h2>
		<div class="mainlist">
		</div>
	</div>	
    <div id="zhezhao"></div>
	-->	
<?php
 if($_GET['id']){ $id = base64_decode(str_replace(" ","+",$_GET['id'])); echo "<h4>您选择的癌型： ".$id."</h4><center><a class=\"showdiv2\" style=\"font-size:18px;color:#FF0000;\">【点击此处查看药物基因疾病网络图】</a></center>"; $cancer = $id; } if($_GET['cancer2']){ echo "<h4>您选择的癌型： ".$_GET['cancer2']."</h4><center><a class=\"showdiv2\" style=\"font-size:18px;color:#FF0000;\">【点击此处查看药物基因疾病网络图】</a></center>"; $cancer = $_GET['cancer2']; } $dismed = M("dismed"); $data['disease'] = $cancer; $result = $dismed->where($data)->select(); $disgene = M("disgene"); $result2 = $disgene->where($data)->getField('zb_gene',true); $medinfor = M("medinfor"); if(count($result)==0){ echo "<h4>数据暂缺</h4>"; }else{ echo "<form action=\"\" method=\"post\" name='medci'>"; echo "<h4>请选择您要查询的治疗\"".$cancer."\"的药物：<input name=\"\" type=\"button\" class=\"input_hide\"  style=\"width:70px;height:30px;font-family:Microsoft Yahei;font-weight:bold;\" onClick=\"CheckSelect(this.form);return false;\" value=\"全选/反选\"></h4><br/>"; echo "<div id=\"holder\" ><table style=\"margin:0 auto;margin-left:325px;\"><tr>"; for($i=0;$i<count($result);$i++){ $datamedinfor['medicine'] = $result[$i]['medicine']; $result3 = $medinfor->where($datamedinfor)->getField('注意事项',true); echo "<td width=\"200\"><font style=\"font-size:18px;font-family:Microsoft Yahei;\"><input  type=\"checkbox\" id=\"med".$i."\" class=\"regular-checkbox big-checkbox\" name=\"med[]\" value=\"".$result[$i]['medicine']."\"><label for=\"med".$i."\"></label>&nbsp;<a title=\"".$result3[0]."\" href=\"../Medicine/medicineQuery.html?id=".base64_encode($result[$i]['medicine'])."\">".$result[$i]['medicine']."</a></font></td>"; if(($i+1)%4==0){ echo "</tr>"; } } echo "</table>"; echo "<h4>请选择您要查询的与\"".$cancer."\"有关的致病基因：<input name=\"\" type=\"button\" class=\"input_hide\"  style=\"width:70px;height:30px;font-family:Microsoft Yahei;font-weight:bold;\" onClick=\"CheckSelect2(this.form);return false;\" value=\"全选/反选\"></h4><br/>"; echo "<table style=\"margin:0 auto;margin-left:325px;\"><tr>"; for($i=0;$i<count($result2);$i++){ echo "<td width=\"200\"><font style=\"font-size:18px;font-family:Microsoft Yahei;\"><input  type=\"checkbox\" id=\"gene".$i."\" class=\"regular-checkbox big-checkbox\" name=\"gene[]\" value=\"".$result2[$i]."\"><label for=\"gene".$i."\"></label>&nbsp;".$result2[$i]."</font></td>"; if(($i+1)%4==0){ echo "</tr>"; } } echo "</table></div>"; } echo "<center><input type=\"submit\" name=\"sub\" value=\"查询\" style=\"font-family:'微软雅黑';vertical-align:middle;margin:8px;width:65px;height:30px;font-size:14px\"/></center></form>" ?>
<!--  
<a class="showdiv">点击此处选择您想要查询的癌症基因</a>
	<div class="showbox" style="overflow-x:scroll;overflow-y:scroll;">
		<h2>基因选择<a class="close" >【关闭】</a></h2>
		<div class="mainlist">
<?php
 $medtar=D('medtar'); $list = $medtar->select(); for($r=0;$r<count($list);$r++){ $temp[$r]=$list[$r]['gene']; } $rest=array_unique($temp); $countnum=0; foreach($rest as $key=>$value){ $rest2[$countnum++] = $key; } for($d=0;$d<count($rest);$d++){ $res[$d] = $rest[$rest2[$d]]; } echo "<input type=\"submit\" name=\"sub\" value=\"查询\" style=\"font-family:'微软雅黑';vertical-align:middle;margin:8px;width:65px;height:30px;font-size:14px\"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"reset\" value=\"重置\" style=\"font-family:'微软雅黑';vertical-align:middle;margin:8px;width:65px;height:30px;font-size:14px\"/><br/>"; foreach(range('A','Z') as $letter){ echo "<font style=\"font-size:15px;color:#FF0000;\"><div id=\"holder\">&nbsp;".$letter." :&nbsp;&nbsp;</font>"; echo "<table><tr>"; for($i=0,$n=1;$i<count($res);$i++){ if(substr($res[$i],0,1)==$letter){ echo "<td width=\"240\"><font style=\"font-size:18px;\"><input type=\"checkbox\" id=\"checkbox".$i."\" class=\"regular-checkbox\" name=\"checkbox[]\" value=\"".$res[$i]."\"><label for=\"checkbox".$i."\"></label>&nbsp;".$res[$i]."</font></td>"; $n++; } if(($n-1)%3==0){ echo "</tr>"; } } echo "</table></div>"; } echo "</form>"; ?>
		</div>
	</div>-->
<!--  	 <div id="zhezhao"></div>-->
<?php
 if( $_POST['sub'] ){ $value1 = $_POST['gene']; $value2 = $_POST['med']; echo "<h4> 根据您的选择，我们为您输出药物靶点与致病基因的对应关系</h4><br/>"; echo "<table class=\"bordered\">"; echo "<thead>"; echo "<tr>"; echo "<th>药物名称</th>"; echo "<th colspan=\"".count($value1)."\">致病基因</th>"; echo "</tr>"; echo "</thead>"; echo "<tr>"; echo "<td></td>"; for($i=0;$i<count($value1);$i++){ echo "<td style=\"width:50px;\">"; echo $value1[$i]; echo "</td>"; } echo "</tr>"; $medt = M("medtar"); for($num=0;$num<count($value2);$num++){ $queryData[medicine]=$value2[$num]; $query = $medt->where($queryData)->select(); echo "<tr>"; echo "<td>"; echo $value2[$num]; echo "</td>"; for($k=0;$k<count($value1);$k++){ echo "<td>"; for($p=0;$p<count($query);$p++) if($value1[$k]==$query[$p]['gene']){ echo "<strong><font size=3 color=red><center>★</center></font></strong>"; } echo "</td>"; } echo "</tr>"; } echo "</table><br/><br/>"; } ?>
<div class="showbox2" >
		<h2>药物基因疾病网络图(点击右下角小工具可以放大与移动,图中的小元素也是可以移动的)<a class="close" >【关闭】</a></h2>
	<div id="cytoscapeweb">
        </div>
	</div>	
     <div id="zhezhao"></div>

</body>
</html>