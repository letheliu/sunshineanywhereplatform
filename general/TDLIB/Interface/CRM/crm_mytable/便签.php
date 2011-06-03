<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
$GLOBAL_SESSION=returnsession();

$MODULE_FUNC_ID = "";
$MODULE_DESC = "便签";
$MODULE_BODY = $MODULE_OP = "";
if ( $MODULE_FUNC_ID == "" || find_id( $USER_FUNC_ID_STR, $MODULE_FUNC_ID ) )
{
				$query = "select * from NOTES where UID='".$LOGIN_UID."';";
				$cursor = exequery( $connection, $query );
				if ( $ROW = mysql_fetch_array( $cursor ) )
				{
								$MY_NOTES = $ROW['CONTENT'];
				}
				else
				{
								$MY_NOTES = trim( unescape( $_COOKIE[$LOGIN_USER_ID."_NOTE"] ) );
								$query = "insert into NOTES values('".$LOGIN_UID."','{$MY_NOTES}');";
								exequery( $connection, $query );
								setcookie( $LOGIN_USER_ID."_NOTE" );
				}
				$MODULE_BODY .= ( "<textarea id=\"note_".$LOGIN_UID."\" onblur=\"save_notes()\" style=\"overflow-y:auto;width:93%;height:".( $MAX_COUNT * 20 - 15 ) )."px;background:#ffffcc;padding:5px;border:0px;\">".htmlspecialchars( $MY_NOTES )."</textarea>
				<script language=\"JavaScript\">
                var timeout=60000;
                function save_notes()
				{
					var req = getXMLHttpObj();
					req.open(\"POST\", \"notes.php\",true);
					treq.setRequestHeader(\"Method\", \"POST notes.php HTTP/1.1\");
					treq.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded\");
					req.onreadystatechange = function() {
						if (req.readyState == 4){
							var s;
							try {
								   s = req.status;
								}catch (ex){
								   alert(ex.description);
							    }
								if (s == 200){
								   if(req.responseText.substr(0,3)!=\"+OK\"){
										alert(\"保存便签内容错误，错误信息：\\n\"+req.responseText);
										window.setTimeout(\"save_notes()\", timeout);
										timeout = timeout*2;
									}
									else
									{
										timeout=60000;
									}
								}
								else
								{
									alert(\"保存便签内容错误，错误代码：\"+s);
									window.setTimeout(\"save_notes()\", timeout);
									timeout = timeout*2;
								}
						}
					}
					req.send(\"CONTENT=\"+encodeURIComponent(\$(\"note_".$LOGIN_UID."\").value));
                }          
				</script>";
}
?>

<?
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
