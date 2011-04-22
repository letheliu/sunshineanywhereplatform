<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText = "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
	教师考勤模块原理：<BR>
	&nbsp;&nbsp;1、设置完教学计划和课表以后，可以形成教师每天的上课记录，但这样是规律性的，没有办法排除节假日和临时性的调课行为而带来的变化。<BR>
	&nbsp;&nbsp;2、在此基础上面再经过节假日调课，教学进程的过滤，以及教师自主发起的调课，代课，停课，复课，相互调课等操作，使系统记录的教师上课记录为教师真实的上课记录，从而为计算教师的工作量提供了数据依据。<BR>
	&nbsp;&nbsp;3、教师发起的调课，代课，停课，复课，相互调课等操作，通过我的教学->日常教学->教师考勤里面模块进行操作。<BR>

	</font></td></table>";
	print $PrintText;
}


?>