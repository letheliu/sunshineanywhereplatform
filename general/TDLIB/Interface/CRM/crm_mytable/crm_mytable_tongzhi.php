<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();

page_css('CRM紧急通知');

$user_id = $_SESSION['LOGIN_USER_ID'];
$module_func_id = "";
$module_desc = "CRM紧急通知";
$module_body = "";
$module_body .= "<table border=0 class=TableBlock width=100% hight=100%>";
$module_body .= "<tr align=\"left\" class=\"TableHeader\"><td colspan=10>&nbsp;".$module_desc."</td></tr>";
if ( $module_func_id == "" || find_id( $user_func_id_str, $module_func_id ) )
{
				$count = 0;
				$notify_file = "notify.txt";
				if (file_exists($notify_file))
				{
								$count = 0;
								$array = file($notify_file);
								for ($i=0;$i<count($array);$i++)
								{
												if (!($array[$i] == "" ))
												{
													
																$count++;
																$jinji_notes = rtrim($array[$i]);
																$module_body .= "<tr class=TableBlock><td valign=Middle align=left><img src='../images/wav.gif' align='absMiddle'>&nbsp;<font color=red><b>".htmlspecialchars( $jinji_notes )."</b></font></td></tr>";
												}
								}
				}
				if ( $count == 0 )
				{
								$module_body .= "<tr class=TableBlock><td valign=Middle align=left><img src='../images/wav.gif' align='absMiddle'>&nbsp;<font color=red><b>暂无紧急通知</b></font></td></tr>";
				}
				if( $count <= 4){
					for($i=0;$i<(4-$count);$i++){
						$module_body .= "<tr class=TableBlock><td valign=Middle align=left>&nbsp;</td></tr>";  
					}
				}
$module_body .= "</table>";
echo $module_body;
}
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>
