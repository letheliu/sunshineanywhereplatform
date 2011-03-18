<?

	require_once('lib.inc.php');



	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("后勤管理-固定资产-操作明细");



if($_GET['action']=="add_default_data")		{
	page_css('报废');
	$资产编号 = $_POST['资产编号'];
	$资产名称 = $_POST['资产名称'];
	$报废申请人 = $_POST['报废申请人'];
	if($_POST['批准人']!=""&&$_POST['报废申请人']!="")	{
		$_POST['单价'] = returntablefield("fixedasset","资产编号",$资产编号,"单价");
		$_POST['数量'] = returntablefield("fixedasset","资产编号",$资产编号,"数量");
		$_POST['金额'] = returntablefield("fixedasset","资产编号",$资产编号,"金额");
		$sql = "update fixedasset set 使用人员='$报废申请人',所属状态='资产己报废' where 资产编号='$资产编号'";
		$db->Execute($sql);
		//print $sql;
	}
	else			{
		$SYSTEM_SECOND = 1;
		print_infor("批准人或借领人为空,您的操作没有执行成功!",$infor='该参数新版本没有被使用',$return="location='fixedasset_newai.php'",$indexto='fixedasset_newai.php');
		exit;
	}
}

	//$_GET['action']=="init_default"||$_GET['action']==""
	if(0)		{
		//$sql = "update fixedasset set 所属状态='购置已分配' where 所属状态='资产己报废'";
		//$db->Execute($sql);
		$sql = "select * from fixedassetbaofei";
		$rs = $db->Execute($sql);
		$rs_a = $rs->GetArray();
		for($i=0;$i<sizeof($rs_a);$i++)		{
			$资产编号 = $rs_a[$i]['资产编号'];
			$编号 = $rs_a[$i]['编号'];
			$单价 = returntablefield("fixedasset","资产编号",$资产编号,"单价");
			$数量 = returntablefield("fixedasset","资产编号",$资产编号,"数量");
			$金额 = $单价*$数量;
			$sql = "update fixedassetbaofei set 金额='$金额',数量='$数量',单价='$单价' where 编号='$编号'";
			$db->Execute($sql);
			//print $sql."<BR>";;
			$sql = "update fixedasset set 所属状态='资产己报废' where 资产编号='$资产编号'";
			$db->Execute($sql);
			//print $sql."<BR>";;
		}
	}



	//exit;

	$filetablename='fixedassetbaofei';

	require_once('include.inc.php');

	if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
		$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableContent><td ><font color=green >

	注意：<BR>
	&nbsp;&nbsp;①此部分只是记录资产进行报废时产生的状态信息。<BR>
	&nbsp;&nbsp;②如果您在固定资产导入或直接修改固定资产的状态信息为报废状态时则不会产生此信息。
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