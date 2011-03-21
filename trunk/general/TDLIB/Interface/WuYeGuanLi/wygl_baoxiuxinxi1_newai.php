<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-公物维修-报修信息");


	增加对查询日期快捷方式的支持("报修时间");

	$filetablename='wygl_baoxiuxinxi';
	$parse_filename = 'wygl_baoxiuxinxi1';

	require_once('include.inc.php');

	?>