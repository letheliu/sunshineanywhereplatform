<?
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
	error_reporting(E_WARNING | E_ERROR);

	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");
	CheckSystemPrivate("人力资源-人员考核-行政人员年度考核量化表");

	if($_GET['action']=="edit_default_data")		{
	//	print_R($_GET);
		//print_R($_POST);
			global $db;
		$学期=$_POST['学期'];$用户名=$_POST['用户名'];

        $品德态度能力自测得分=$_POST['品德态度能力自测得分'];
		$出勤表现自测得分=$_POST['出勤表现自测得分'];
		$工作量自测得分=$_POST['工作量自测得分'];
		$工作纪律自测得分=$_POST['工作纪律自测得分'];
		$工作规范自测得分=$_POST['工作规范自测得分'];
		$工作效果自测得分=$_POST['工作效果自测得分'];
		$班主任工作自测得分=$_POST['班主任工作自测得分'];
		$临时工作自测得分=$_POST['临时工作自测得分'];
		$教研论文及成果自测得分=$_POST['教研论文及成果自测得分'];
		$教学效果自测得分=$_POST['教学效果自测得分'];
		$自测SUM=$品德态度能力自测得分+$出勤表现自测得分+$工作量自测得分+$工作纪律自测得分+$工作规范自测得分+$工作效果自测得分+$班主任工作自测得分+$临时工作自测得分+$教研论文及成果自测得分+$教学效果自测得分;

		$品德态度能力核实得分=$_POST['品德态度能力核实得分'];
		$出勤表现核实得分=$_POST['出勤表现核实得分'];
		$工作量核实得分=$_POST['工作量核实得分'];
		$工作纪律核实得分=$_POST['工作纪律核实得分'];
		$工作规范核实得分=$_POST['工作规范核实得分'];
		$工作效果核实得分=$_POST['工作效果核实得分'];
		$班主任工作核实得分=$_POST['班主任工作核实得分'];
		$临时工作核实得分=$_POST['临时工作核实得分'];
		$教研论文及成果核实得分=$_POST['教研论文及成果核实得分'];
		$教学效果核实得分=$_POST['教学效果核实得分'];
		$核实SUM=$品德态度能力核实得分+$出勤表现核实得分+$工作量核实得分+$工作纪律核实得分+$工作规范核实得分+$工作效果核实得分+$班主任工作核实得分+$临时工作核实得分+$教研论文及成果核实得分+$教学效果核实得分;


		$sql="update edu_xingzheng_yearcheck set 品德态度能力自测得分=$品德态度能力自测得分,出勤表现自测得分=$出勤表现自测得分,工作量自测得分=$工作量自测得分,工作纪律自测得分=$工作纪律自测得分,工作规范自测得分=$工作规范自测得分,工作效果自测得分=$工作效果自测得分,班主任工作自测得分=$班主任工作自测得分,临时工作自测得分=$临时工作自测得分,教研论文及成果自测得分=$教研论文及成果自测得分,教学效果自测得分=$教学效果自测得分,总评自测得分=$自测SUM";
		$sql.=",品德态度能力核实得分=$品德态度能力核实得分,出勤表现核实得分=$出勤表现核实得分,工作量核实得分=$工作量核实得分,工作纪律核实得分=$工作纪律核实得分,工作规范核实得分=$工作规范核实得分,工作效果核实得分=$工作效果核实得分,班主任工作核实得分=$班主任工作核实得分,临时工作核实得分=$临时工作核实得分,教研论文及成果核实得分=$教研论文及成果核实得分,教学效果核实得分=$教学效果核实得分,总评核实得分=$核实SUM";
		$sql.=" where 学期='$学期' and 用户名='$用户名'";
		//print $sql;
    $db->Execute($sql);
		//exit;

	}

	//数据表模型文件,对应Model目录下面的edu_xingzheng_yearcheck_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'edu_xingzheng_yearcheck';
	$parse_filename		=	'edu_xingzheng_yearcheck';
	require_once('include.inc.php');
	if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >备注:本模块通过工作流实现操作,此处仅用于管理工作流生成之后的数据,如果需要实施工作流部分,具体详见<a href=\"http://edu.tongda2000.com/buy/service.php\" target=_blank>工作流实施收费标准</a>.</font></td></table>";
	print $PrintText;
}
	?>