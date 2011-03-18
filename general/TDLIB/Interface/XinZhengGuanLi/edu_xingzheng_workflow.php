<?
session_start();
require_once('../EDU/lib.inc.php');

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Frameset//EN">
<HTML><HEAD><TITLE>行政考勤工作流管理</TITLE><LINK href="images/style.css" type=text/css
rel=stylesheet>
<SCRIPT src="images/ccorrect_btn.js"></SCRIPT>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content="MSHTML 6.00.6000.16735" name=GENERATOR></HEAD>
<?

$MenuArray[] = array("edu_xingzheng_kaoqinbudeng_newai.php","考勤补登","考勤补登");
$MenuArray[] = array("edu_xingzheng_qingjia_newai.php","请假外出","请假外出");
$MenuArray[] = array("edu_xingzheng_jiabanbuxiu_newai.php","加班补休","加班补休");
$MenuArray[] = array("edu_xingzheng_tiaoxiububan_newai.php","调休补班","调休补班");
$MenuArray[] = array("edu_xingzheng_tiaoban_newai.php","调班记录","调班记录");
$MenuArray[] = array("edu_xingzheng_tiaobanxianghu_newai.php","相互调班","相互调班");

$fileName = $MenuArray[0][0];

//print_R($MenuArray);
//如果下属子菜单也只有一个菜单项,那么直接沿用下属菜单的那个菜单项
if(count($MenuArray)==1)	{
	EDU_Indextopage($MenuArray[0][0]);
	exit;
}

?>
<FRAMESET id=frame1 border=0 frameSpacing=0 rows=30,* frameBorder=NO cols=*>
<FRAME name=menu_top src="edu_xingzheng_workflow_menu.php" frameBorder=0 noResize scrolling=no>
<FRAME name=menu_main src="<?=$fileName?>" frameBorder=0 noResize></FRAMESET>
</HTML><?
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