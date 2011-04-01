<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);
	require_once('lib.inc.php');
	$GLOBAL_SESSION=returnsession();

	//消息中心是否启用配置文件
	$goalfile = "crm_clendar_rule_isuse.ini";


	if($_GET['action2']=="启用消息中心")			{

		page_css("启用消息中心");
		//$file = file($goalfile);
		$_POST2['当前消息中心状态'] = "启用";
		$DataText = serialize($_POST2);
		@!$handle = fopen($goalfile, 'w');
		fwrite($handle, $DataText);
		fclose($handle);
		print_infor("你的数据操作己经成功,请返回","location='?'","location='?'",'?');
		exit;

	}


	if($_GET['action2']=="关闭消息中心")			{

		page_css("关闭消息中心");
		//$file = file($goalfile);
		$_POST2['当前消息中心状态'] = "关闭";
		$DataText = serialize($_POST2);
		@!$handle = fopen($goalfile, 'w');
		fwrite($handle, $DataText);
		fclose($handle);
		print_infor("你的数据操作己经成功,请返回","location='?'","location='?'",'?');
		exit;

	}


	//数据表模型文件,对应Model目录下面的crm_clendar_ruletime_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'crm_clendar_ruletime';
	$parse_filename		=	'crm_clendar_ruletime';
	require_once('include.inc.php');

if($_GET['action']==''||$_GET['action']=='init_default')		{
	//print_R($_GET);
	print "<BR><FORM name=form1 action=\"?action=DataDealDelte&pageid=1\" method=post encType=multipart/form-data>";
	print "<table class=TableBlock width=100%>";
	print "<tr class=TableContent><td>";

	$file = file($goalfile);
	$Text = join('',$file);
	$DataText = unserialize($Text);
	//print_r($Text);
	$当前消息中心状态 = $DataText['当前消息中心状态'];

	print "<font color=green>当前消息中心状态:</font><font color=red>$当前消息中心状态</font>&nbsp;&nbsp;";
	if($当前消息中心状态=="关闭")		{
		print "<input type=button class=BigButton name='启用消息中心' onClick=\"location='?".base64_encode("xx=xx&学期名称=".$_GET['学期名称']."&action2=启用消息中心&xx=xx")."'\" value='启用'>";
	}
	else		{
		print "<input type=button class=BigButton name='关闭消息中心' onClick=\"location='?".base64_encode("xx=xx&学期名称=".$_GET['学期名称']."&action2=关闭消息中心&xx=xx")."'\" value='关闭'>";
	}
	print "<font color=green>&nbsp;消息中心运行可能会增加一些系统开销,为加快系统运行速度,你可以关闭消息中心.</font></td></tr>";
	print "</table>";
	print "</FORM>";
}

	?>