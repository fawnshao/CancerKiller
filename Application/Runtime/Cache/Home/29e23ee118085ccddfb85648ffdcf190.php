<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    
    <head>
        <title>Cancer Killer</title>
        <link rel = "Shortcut Icon" href="/CancerKiller/Public/images/logo.ico"/>
        <script type="text/javascript" src="/CancerKiller/Public/js/json2.min.js"></script>
        <script type="text/javascript" src="/CancerKiller/Public/js/AC_OETags.min.js"></script>
        <script type="text/javascript" src="/CancerKiller/Public/js/cytoscapeweb.min.js"></script>
        <script src="/CancerKiller/Public/js/jquery-1.7.1.min.js" type="text/javascript"></script>
		<script src="/CancerKiller/Public/js/guide.js" type="text/javascript"></script>
		<link  rel="stylesheet" href="/CancerKiller/Public/css/demo.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="/CancerKiller/Public/css/jquery.suggest.css" />
 		<script type="text/javascript" src="/CancerKiller/Public/js/jquery-1.4.2.min.js"></script>
 		<script type="text/javascript" src="/CancerKiller/Public/js/j.suggest.js"></script>
 		<script type="text/javascript">
 $(function(){
 $("#geneSearch").suggest(gene,{hot_list:hotGene,dataContainer:'#geneSearch_3word',onSelect:function(){$("#geneSearch2").click();}, attachObject:'#suggest'});
$("#geneSearch2").suggest(gene,{hot_list:hotGene,attachObject:"#suggest2"});
});
</script>
 <script type="text/javascript">
//初始化常用基因
var hotGene=new Array();

hotGene[0]=new Array('','TP53','基因','');
hotGene[1]=new Array('','BCL2','基因','');
hotGene[2]=new Array('','EGFR','基因','');
hotGene[3]=new Array('','KRAS','基因','');
hotGene[4]=new Array('','KIT','基因','');
hotGene[5]=new Array('','ERBB2','基因','');
hotGene[6]=new Array('','CDNK2A','基因','');
hotGene[7]=new Array('','MYC','基因','');
hotGene[8]=new Array('','CCND1','基因','');
hotGene[9]=new Array('','FCGR2A','基因','');
//初始化所有基因
	     var gene=new Array();
<?php
 $medtar=D('medtar'); $list = $medtar->select(); for($r=0;$r<count($list);$r++){ $temp[$r]=$list[$r]['gene']; } $rest=array_unique($temp); $countnum=0; foreach($rest as $key=>$value){ $rest2[$countnum++] = $key; } for($d=0;$d<count($rest);$d++){ $res[$d] = $rest[$rest2[$d]]; } for($i=0;$i<count($res);$i++){ echo "gene[".$i."] = new Array('','".$res[$i]."','基因','') ;"; } ?>
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
 if($_POST['submitGene']){ $gene = $_POST['geneSearch']; }else if($_GET['id']){ $gene = base64_decode(str_replace(" ","+",$_GET['id'])); } $disgene = M("disgene"); $data['zb_gene'] = $gene; $list = $disgene->where($data)->getField('disease',true); $medtar = M("medtar"); $data2['gene'] = $gene; $list2 = $medtar->where($data2)->getField('medicine',true); $dismed = M("dismed"); echo "<node id=\"1\">\
                        	<data key=\"label\">"; if($gene){echo $gene;}else{echo "请在右上方搜索框搜索查询";}echo "</data>\
                        	<data key=\"weight\">3.0</data>\
                        </node>\ "; for($c=0;$c<count($list);$c++){ echo " <node id=\"".($c+2)."\">\
    			<data key=\"label\">".$list[$c]."</data>\
        		<data key=\"weight\">5.0</data>\
    			</node>\   "; } for($c=0;$c<count($list2);$c++){ echo " <node id=\"".($c+count($list)+2)."\">\
            	<data key=\"label\">".$list2[$c]."</data>\
                <data key=\"weight\">4.0</data>\
                </node>\   "; } for($q=0;$q<count($list);$q++){ echo " <edge source=\"1\" target=\"".($q+2)."\">\
            <data key=\"label\">".$gene."  to   ".$list[$q]."</data>\
            </edge>\  	";} for($q=0;$q<count($list2);$q++){ echo " <edge source=\"".($q+count($list)+2)."\" target=\"1\">\
            <data key=\"label\">".$list2[$q]."  to   ".$gene."</data>\
            </edge>\  	";} for($p=0;$p<count($list);$p++){ $data3['disease'] = $list[$p]; $list3 = $dismed->where($data3)->getField('medicine',true); for($m=0;$m<count($list2);$m++){ for($n=0;$n<count($list3);$n++){ if($list3[$n]==$list2[$m]){ echo " <edge source=\"".($m+count($list)+2)."\" target=\"".($p+2)."\">\
			            </edge>\  	";} } } } ?>
                  </graph>\
                </graphml>\
                ';
                

                // visual style we will use
                var visual_style = {
                    global: {
                        backgroundColor: "#ABCFD6",
                    },
                    nodes: {
                    	shape:  "ELLIPSE" ,
                        borderWidth: 3,
                        borderColor: "#ffffff",
                        size: {
                            defaultValue: 55,
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
                		 nodeTooltipsEnabled: true,
                	        edgeTooltipsEnabled: true,
                	        panZoomControlVisible: true,
                	        
                	swfPath: "/CancerKiller/Public/swf/CytoscapeWeb",
                    flashInstallerPath: "/CancerKiller/Public/swf/playerProductInstall",
                    flashAlternateContent: "Le Flash Player est nécessaire." 
                    	
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
<link rel="stylesheet" type="text/css" href="/CancerKiller/Public/css/cyto.css" />
    </head>
    
    <body style="position:relative;background-color:#ABCFD6;">
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
					<li class=""  _t_nav="browse">
						<h2>
							<a href="/CancerKiller/index.php/Home/Gene/../Cancer/index" >&nbsp;&nbsp;癌&nbsp;症&nbsp;&nbsp;</a>
						</h2>
					</li>
					
					<li class="" _t_nav="medicine">
						<h2>
							<a href="/CancerKiller/Home/Medicine/medicineQuery">&nbsp;&nbsp;药&nbsp;物&nbsp;&nbsp;</a>
						</h2>
					</li>
					<li class="nav-up-selected-inpage" _t_nav="gene">
						<h2>
							<a href="">&nbsp;&nbsp;基&nbsp;因&nbsp;&nbsp;</a>
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
		<div style="float:right;margin-right:80px;font-size:18px;height:50px;padding-top:20px;font-family: Helvetica, Arial, Verdana, sans-serif;">
		  <form method="post" action="">
		   <input type="hidden" name="geneSearch_3word" id="geneSearch_3word" value="" />
 		   <!--  <label for="geneSearch" ></label>-->
 		   <input type="text" name="geneSearch" style="width:150px;height:35px" id="geneSearch" /><input type="submit" name="submitGene" value="查 询" style="width:80px;font-family:'微软雅黑';height:39px;" >
 		  <div id='suggest' class="ac_results"></div></form></div> 


        <div id="cytoscapeweb">
        </div>

    </body>
    
</html>