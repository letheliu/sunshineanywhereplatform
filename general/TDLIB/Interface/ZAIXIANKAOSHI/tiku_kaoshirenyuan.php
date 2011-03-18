<?
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();
/*
select BJMC,XH,BZ,XM,SFLX,CZRQ,SSHJ,
SFXM01,SFXM02,SFXM03,SFXM04,SFXM05,SFXM06,SFXM07,SFXM08,SFXM09,SFXM10,
SFXM01+SFXM02+SFXM03+SFXM04+SFXM05+SFXM06+SFXM07+SFXM08+SFXM09+SFXM10 as 总学年交费
from yhsjb
where XH='20053021223' and XN='2005-2006' order by XN
*/
$考试名称 = $_GET['考试名称'];
$编号 = $_GET['编号'];

page_css("参考人员清单");

if($考试名称!=""&&$编号!="")										{

$sql = "select * from tiku_kaoshi where 编号='$编号'";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
$参加考试班级 = $rs_a[0]['参加考试班级'];
$参加考试人员 = $rs_a[0]['参加考试人员'];
$排除参考人员 = $rs_a[0]['排除参考人员'];
$考试日期 = $rs_a[0]['考试日期'];
$考场地点 = $rs_a[0]['考场地点'];
//print_R($rs_a);

$sql = "select * from edu_student where 班号='$参加考试班级'";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();


table_begin("100%");
print_title("参考人员名单: [考试名称:$考试名称 考试日期:$考试日期 考场地点:$考场地点]",4);
print "<tr class=TableHeader><td>学号</td><td>姓名</td><td>学号</td><td>姓名</td></tr>";

for($i=0;$i<sizeof($rs_a);$i++)			{
	if($i%2==0)		print "<tr class=TableData>";
	$学号 = $rs_a[$i]['学号'];
	$姓名 = $rs_a[$i]['姓名'];
	$学号2 = $rs_a[$i+1]['学号'];
	$姓名2 = $rs_a[$i+1]['姓名'];
	print "<td>".($i+1)." $学号</td><td>$姓名</td>";
}
if($i%2==1)		print "<td>&nbsp;</td><td>&nbsp;</td>";
table_end();

print "<BR><div align=center><input type=button accesskey=p name=print value=\" 打印 \" class=SmallButton onClick=\"document.execCommand('Print');\" title=\"快捷键:ALT+p\">
<input type=button accesskey=c name=cancel value=\" 关闭 \" class=SmallButton onClick=\"window.close();\" title=\"快捷键:ALT+c\"></div>";
exit;
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