<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################

$kaoshi = "查阅试卷";
function kaoshi_value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	//print_R($fields['value']);
	$考试名称 = strip_tags($fields['value'][$i]['考试名称']);
	$考试试卷 = strip_tags($fields['value'][$i]['考试试卷']);
	$编号 = $fields['value'][$i]['编号'];
	//用户类型限制条件##########################结束
	$sql = "select COUNT(*) AS NUM from tiku_examdata where 考试名称='$考试名称'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$NUM = $rs_a[0]['NUM'];
	$Text  = $fieldvalue;
	$Text .= " <a href=\"tiku_kaoshirenyuan.php?".base64_encode("action2=MakeShiJuan&考试名称=$考试名称&编号=$编号")."\" target=_blank ><font color=blue>参考人员清单</font></a>";
	if($NUM==0)		{
		//$Text .= " <a href=\"?".base64_encode("action2=MakeShiJuan&试卷标题=$fieldvalue")."\"><font color=blue>重新生成试卷</font></a>";
		$Text .= " <font color=green>还没有人员参加考试</font>";
	}
	else	{

		$Text .= " <a href=\"tiku_shijuanku_newai.php?".base64_encode("考试试卷=$考试试卷")."\" target=_blank><font colo=blue>查阅试卷(总试题数:$NUM)</font></a>";
	}


	return $Text;
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