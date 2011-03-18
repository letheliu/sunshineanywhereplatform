<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################
$status_qingjia = "请假状态分析";
function status_qingjia_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;

	//print $i;
	//用户类型限制条件##########################结束
	//print $fieldvalue;
	$审核状态	= $fieldvalue;
	if($审核状态==0||$审核状态==''||$审核状态=='否')		return '否';

	$人员	= strip_tags($fields['value'][$i]['人员']);
	$人员用户名	= strip_tags($fields['value'][$i]['人员用户名']);

	$时间		= strip_tags($fields['value'][$i]['时间']);
	$班次		= strip_tags($fields['value'][$i]['班次']);
	$学期		= strip_tags($fields['value'][$i]['学期']);
	$审核状态	= strip_tags($fields['value'][$i]['审核状态']);

	$TEXT = '';

	$sql = "select 编号 from edu_xingzheng_kaoqinmingxi where 人员='$人员' and 人员用户名='$人员用户名' and 班次='$班次' and 日期='$时间'";
	//print $sql."<BR>";
	$rs = $db->Execute($sql);
	$请假编号 = $rs->fields['编号'];


	if($审核状态==1)					{
		if($请假编号=='')			{
			执行插入某人某天考勤信息($学期,$人员,$人员用户名,$时间,$班次);;
			$TEXT = "<font color=red title='请假成功'>请假数据补充成功</font><BR>";
		}

		$sql = "update  td_edu.edu_xingzheng_kaoqinmingxi
			set
			上班实际刷卡='请假外出',
			上班考勤状态='请假外出',
			下班实际刷卡='请假外出',
			下班考勤状态='请假外出'
			where
			人员用户名='$人员用户名'
			and 班次='$班次'
			and 日期='$时间'
			and 学期='$学期'";
		$db->Execute($sql);
		$TEXT .= " <font color=green>请假成功</font>";
	}
	else	{
		$TEXT = " <font color=red>审核不通过</font>";
	}





	return $TEXT;
}
//require_once('lib.xiaoli.inc.php');
//修正人员相互调课异常操作信息();
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