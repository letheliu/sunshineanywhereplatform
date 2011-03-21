<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-公物维修-用料登记");

	增加对查询日期快捷方式的支持("报修时间");





	$_GET['维修状态'] = "是";


	$filetablename='wygl_baoxiuxinxi';
	$parse_filename = 'wygl_baoxiuxinxi4';

	require_once('include.inc.php');

	?>