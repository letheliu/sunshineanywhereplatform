<?
	require_once('lib.inc.php');

	$GLOBAL_SESSION=returnsession();

	require_once("systemprivateinc.php");

	CheckSystemPrivate("人力资源-行政考勤-班次");
	$当前学期 = returntablefield("edu_xueqiexec","当前学期",'1',"学期名称");
	if($_GET['学期']=="") $_GET['学期'] = $当前学期;




	$filetablename='edu_xingzheng_banci';
	require_once('include.inc.php');


	if($_GET['action']==''||$_GET['action']=='init_default')		{
		$PrintText .= "<BR><table class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableContent><td ><font color=green >
		&nbsp;&nbsp;备注：班次管理一和班次管理二两个字段，设置完成以后主要用于限定该班次下面所属考勤记录的管理权限。<BR>
		&nbsp;&nbsp;示例：早操是学生科负责管理,晚督修是教务科负责管理，其他班次是人事科负责管理等。<BR>

		&nbsp;&nbsp;班次：<BR>
&nbsp;&nbsp;①就是日常上班中的班次信息，常见的如上午班，下午班，不是很常见的如例行会议班，早操班等。<BR>
&nbsp;&nbsp;②一个班次对应一个开始时间和结束时间。<BR>
&nbsp;&nbsp;③不同班次的起止时间应当不要有冲突现象，如从早上到晚上按时间线进行设置班次。<BR>
&nbsp;&nbsp;④如果有时间重叠的班次存在，那么在排班的时候需要注意，一个人员在同一时间段内不要同时拥有两个班次（这个不是强制的，也可以这样安排）。
		</font></td></table>";
		print $PrintText;

		//过滤非法数据
		定时执行函数("过滤行政考勤非法数据",30);

	}

	function 过滤行政考勤非法数据()		{
		global $db;
		$sql = "delete from edu_xingzheng_kaoqinmingxi where 班次 not in (select 班次名称 from edu_xingzheng_banci)";
		$db->Execute($sql);
	}
	?>