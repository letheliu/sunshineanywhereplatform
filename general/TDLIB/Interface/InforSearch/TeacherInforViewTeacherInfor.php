<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once("lib.inc.php");
//在BASE64编码解码之后,SESSION重置USER_ID变量之前
$USER_ID = $_GET['USER_ID'];
//此位置不能改动

$GLOBAL_SESSION=returnsession();

//print_R($_GET);

page_css("班级信息查阅");

if($USER_ID=='')		{
	print_infor("请先在左侧菜单栏选择要查阅的信息!");
	exit;
}


$USER_NAME = returntablefield("user","USER_ID",$_GET['USER_ID'],"USER_NAME");

table_begin("100%");
print "<tr class=TableHeader><td colspan=4>&nbsp;当前用户:".$USER_NAME." 请选择以下链接,查看不同的模块信息</td></tr>";

print "<tr class=TableData>
<td colspan=1>&nbsp;教学情况查询:</td>
<td colspan=3>
&nbsp;<a href=\"../EDU/edu_teacherkaoqin_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>原始打卡数据</a>
&nbsp;<a href=\"../EDU/edu_teacherkaoqinmingxi_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>考勤数据</a>
&nbsp;<a href=\"../EDU/edu_teacherjiaoxueriji_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>教学日记</a>

&nbsp;<a href=\"../EDU/edu_teacherkaoqin_static.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>考勤数据统计</a>
&nbsp;<a href=\"../EDU/edu_scheduletiaoke_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>调课记录</a>
&nbsp;<a href=\"../EDU/edu_scheduledaike_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>代课记录</a>
<BR>
&nbsp;<a href=\"../EDU/edu_teacherkaoqinbudeng_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>考勤补登</a>
&nbsp;<a href=\"../EDU/edu_jiaoxuerijibudeng_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>日记补登</a>

&nbsp;<a href=\"../EDU/edu_scheduletiaokexianghu_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>相互调课</a>
&nbsp;<a href=\"../EDU/edu_scheduletingke_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>停课记录</a>
&nbsp;<a href=\"../EDU/edu_schedulefuke_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>复课记录</a>

&nbsp;<a href=\"../EDU/edu_jiaoan_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>教案</a>
&nbsp;<a href=\"../EDU/school_download_newai.php?".base64_encode("指定人员用户名=".$USER_ID."")."\" target=EDU_MAIN>课件</a>

</td>
</tr>";
//&nbsp;<a href=\"../EDU/edu_pingbixiangmu_zidingyi.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>个人积分应用标准</a>
print "<tr class=TableData>
<td colspan=1>&nbsp;办公用品:</td>
<td colspan=3>
&nbsp;<a href=\"../officeproduct/officeproduct_my_jieyou.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>借用明细</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_lingyou.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>领用明细</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_guihuan.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>归还明细</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_ruku.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>入库明细</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_tiaoku.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>调库明细</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_baofei.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>报废明细</a>


</td>

</tr>";

print "<tr class=TableData>
<td colspan=1>&nbsp;固定资产:</td>
<td colspan=3>
&nbsp;<a href=\"../fixedasset/fixedasset_my_newai.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>所属固定资产</a>
&nbsp;<a href=\"../fixedasset/my_fixedassetout_newai.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>借领明细</a>
&nbsp;<a href=\"../fixedasset/my_fixedassettui_newai.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>归还明细</a>
&nbsp;<a href=\"../fixedasset/my_fixedassetin_newai.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>购置明细</a>
&nbsp;<a href=\"../fixedasset/my_fixedassettiaoku_newai.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>调拨明细</a>
&nbsp;<a href=\"../fixedasset/my_fixedassetweixiu_newai.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>维修明细</a>
&nbsp;<a href=\"../fixedasset/my_fixedassetbaofei_newai.php?".base64_encode("指定人员=".$USER_ID."")."\" target=EDU_MAIN>报废明细</a>


</td>

</tr>";

table_end();

//判断有没有该教师的档案信息,如果有就显示,如果没有就直接输入NOPAGE页面
$sql	= "select 编号 from edu_teachermanage where 用户名='".$_GET['USER_ID']."'";
$rs		= $db->CacheExecute(15,$sql);
$编号   = $rs->fields['编号'];
if($编号!='')				{
	print "<BR><iframe name=EDU_MAIN width=100% height=100% topmargin=\"0\" leftmargin=\"0\" border=0 style=\"border:0PX\" src='../TeacherManage/teacher_chakan.php?".base64_encode("XX=XX&编号=".$编号."&FF=FF")."'>";
}
else	{
	print "<BR><iframe name=EDU_MAIN width=100% height=100% topmargin=\"0\" leftmargin=\"0\" border=0 style=\"border:0PX\" src='../TeacherManage/teacher_chakan_remark.php'>";
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