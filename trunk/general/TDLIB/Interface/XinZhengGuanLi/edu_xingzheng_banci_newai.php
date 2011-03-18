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