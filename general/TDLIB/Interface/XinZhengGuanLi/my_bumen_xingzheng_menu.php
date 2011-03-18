<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THEME?>/menu_top.css">
<script>
window.onload=function()
{
	 var type=2-2;
   var menu_id=0,menu=document.getElementById("navMenu");
   if(!menu) return;

   for(var i=0; i<menu.childNodes.length;i++)
   {
      if(menu.childNodes[i].tagName!="A")
         continue;
      if(menu_id==type)
         menu.childNodes[i].className="active";

      menu.childNodes[i].onclick=function(){
         var menu=document.getElementById("navMenu");
         for(var i=0; i<menu.childNodes.length;i++)
         {
            if(menu.childNodes[i].tagName!="A")
               continue;
            menu.childNodes[i].className="";
         }
         this.className="active";
      }
      menu_id++;
   }
};
</script>
</head>
<body>
<div id="navPanel">
  <div id="navMenu">
<?

$MenuArray[] = array("my_bumen_xingzheng_kaoqinmingxi_newai.php","考勤数据","考勤数据明细");
$MenuArray[] = array("edu_xingzheng_kaoqin_newai.php","原始打卡","原始打卡");
$MenuArray[] = array("edu_xingzheng_paiban_bumen.php","行政排班","行政排班设置");
//$MenuArray[] = array("my_bumen_xingzheng_kaoqin_newai.php","原始打卡","原始打卡");
$MenuArray[] = array("my_bumen_xingzheng_qingjia_newai.php","请假外出","请假外出");
$MenuArray[] = array("my_bumen_xingzheng_jiabanbuxiu_newai.php","加班补休","加班补休");
$MenuArray[] = array("my_bumen_xingzheng_tiaoxiububan_newai.php","调休加班","调休加班");
$MenuArray[] = array("my_bumen_xingzheng_tiaoban_newai.php","调班","调班");
$MenuArray[] = array("my_bumen_xingzheng_tiaobanxianghu_newai.php","相互调班","相互调班");
$MenuArray[] = array("my_bumen_xingzheng_kaoqinbudeng_newai.php","考勤补登","考勤补登");
$MenuArray[] = array("my_bumen_xingzheng_kaoqin_static.php","考勤统计","考勤统计");



for($i=0;$i<sizeof($MenuArray);$i++)					{
	$菜单地址 = $MenuArray[$i][0];
	$菜单名称 = $MenuArray[$i][1];
	$菜单TITLE = $MenuArray[$i][2];
	print "<A hideFocus title=$菜单名称 href=\"$菜单地址\" target=menu_main_frame>
	<SPAN><IMG height=16 src=\"images/notify_new.gif\" width=16 align=absMiddle>$菜单名称</SPAN></A> ";
}


?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>