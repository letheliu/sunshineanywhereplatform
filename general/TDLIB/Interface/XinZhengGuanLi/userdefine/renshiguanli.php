<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################
//提供资产管理部分中资产状态的部分信息设定。
//#########################################################
$renshiguanli = "注视";
function renshiguanli_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$工作状态 = strip_tags($fields['value'][$i]['工作状态']);
	$工号 = strip_tags($fields['value'][$i]['工号']);
	$姓名 = strip_tags($fields['value'][$i]['姓名']);
	$所属部门  = strip_tags($fields['value'][$i]['所属部门']);
	$性别 = strip_tags($fields['value'][$i]['性别']);
	$民族 = strip_tags($fields['value'][$i]['民族']);
	$学历 = strip_tags($fields['value'][$i]['学历']);
	$出生年月 = strip_tags($fields['value'][$i]['出生年月']);
		$电话 = strip_tags($fields['value'][$i]['电话']);



	$Text .= $工作状态."(";

	if($工作状态=="在职") {$Text .= "<a class=OrgAdd href=\"hrms_file_lizhi_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled&性别=$性别&性别_NAME=性别&性别_disabled=disabled&民族=$民族&民族_NAME=民族&民族_disabled=disabled&学历=$学历&学历_NAME=学历&学历_disabled=disabled&出生年月=$出生年月&出生年月_NAME=出生年月&出生年月_disabled=disabled&电话=$电话&电话_NAME=电话&电话_disabled=disabled")."\">离职</a> ";




	$Text .= "<a class=OrgAdd href=\"hrms_worker_hetong_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">合同</a> ";

	$Text .= "<a class=OrgAdd href=\"hrms_reward_punishment_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">奖惩</a> ";



	$Text .= "<a class=OrgAdd href=\"hrms_worker_zhengzhao_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">证照</a> ";


	$Text .= "<a class=OrgAdd href=\"hrms_transfer_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">调动</a> ";


	$Text .= "<a class=OrgAdd href=\"hrms_worker_zhicheng_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">职称</a> ";

	/*
   学习经历  工作经历  劳动技能   社会关系
	*/
   $Text .= "<a class=OrgAdd href=\"hrms_educationalexperience_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">学习经历</a> ";

    $Text .= "<a class=OrgAdd href=\"hrms_workexperience_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">工作经历</a> ";


    $Text .= "<a class=OrgAdd href=\"hrms_laboringskill_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">劳动技能</a> ";


	$Text .= "<a class=OrgAdd href=\"hrms_socialrelation_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled")."\">社会关系</a> ";

	}

if($工作状态=="离职") $Text .= "<a class=OrgAdd href=\"hrms_file_fuzhi_newai.php?".base64_encode("action=add_default&工号=$工号&工号_NAME=工号&工号_disabled=disabled&姓名=$姓名&姓名_NAME=姓名&姓名_disabled=disabled&所属部门=$所属部门&所属部门_NAME=所属部门&所属部门_disabled=disabled&性别=$性别&性别_NAME=性别&性别_disabled=disabled&民族=$民族&民族_NAME=民族&民族_disabled=disabled&学历=$学历&学历_NAME=学历&学历_disabled=disabled&出生年月=$出生年月&出生年月_NAME=出生年月&出生年月_disabled=disabled&电话=$电话&电话_NAME=电话&电话_disabled=disabled")."\">复职</a> ";



	$Text .= ")";


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