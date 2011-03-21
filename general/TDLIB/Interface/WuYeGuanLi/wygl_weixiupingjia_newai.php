<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-公物维修-服务评价");

	增加对查询日期快捷方式的支持("报修时间");




	$_GET['是否评价'] = "是";

	$filetablename='wygl_weixiupingjia';

	require_once('include.inc.php');

	?>