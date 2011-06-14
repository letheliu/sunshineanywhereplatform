<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css('CRM客户生日');

$user_id = $_SESSION['LOGIN_USER_ID'];
//$module_func_id = "";
$module_desc = "CRM客户生日提醒";
$MODULE_BODY = "";
/*
                $CUR_DATE = date( "Y-m-d", mktime(1,1,1,date('m'),date('d')-1,date('Y')));
				$END_DATE = date( "Y-m-d", mktime(1,1,1,date('m'),date('d')+7,date('Y')));
				$COUNT1 = 0;
				$COUNT2 = 0;
				$BIRTHDAY_ARRAY1 = $BIRTHDAY_ARRAY2 = array( );
				$query = "
				SELECT 编号,客户名称,第一联系人,DATE_FORMAT(客户生日,'%m-%d') AS 客户生日
				from crm_customer
				where 创建人='$user_id'
				and DATE_FORMAT(客户生日,'%Y-%m-%d')>='$CUR_DATE'
				and DATE_FORMAT(客户生日,'%Y-%m-%d')<='$END_DATE'
				order by 客户名称 ASC";
*/
				$CUR_DATE = date( "Y-m-d", time( ) );
				$END_DATE = date( "Y-m-d", strtotime( "+7 days" ) );
				$COUNT1 = 0;
				$COUNT2 = 0;
				$BIRTHDAY_ARRAY1 = $BIRTHDAY_ARRAY2 = array( );
				$query = "SELECT 编号,客户名称,第一联系人,DATE_FORMAT(客户生日,'%Y-%m-%d') AS 客户生日 from crm_customer where 创建人='$user_id'
				and DATE_FORMAT(客户生日,'%Y-%m-%d')>='$CUR_DATE' and DATE_FORMAT(客户生日,'%Y-%m-%d')<='$END_DATE' order by 客户名称 ASC";
				$rs = $db->CacheExecute(150,$query);
				$ROW = $rs->GetArray();
				if(count($ROW)<=4 and count($ROW)>0){
				  $xh = 4-count($ROW);
				  $sum = 0;
				  for($m=0;$m<count($ROW);$m++){
				     if($ROW[$m]['客户生日'] == date("Y-m-d")){
					    $sum++;
					 }
				  }
				  if($sum>1){
				    $xh = $xh+$sum-1;
				  }
                }
				if(count($ROW)==0){
				  $xh = 3;
				}
				for($i=0;$i<count($ROW);$i++)
				{
					            $ID        = $ROW[$i]['编号'];
								$USER_NAME = $ROW[$i]['客户名称'];
								$BIRTHDAY  = $ROW[$i]['客户生日'];
								$XIANXIREN = $ROW[$i]['第一联系人'];
								$USER_NAME1 = $USER_NAME."<a href=../crm_customer_view_model.php?编号=$ID; title=客户详细信息><font color=green>[".$XIANXIREN."]</font></a>";

								if ( "01-01" <= substr( $BIRTHDAY, 5, 5 ) && substr( $BIRTHDAY, 5, 5 ) <= "01-31" )
								{
												$DATA = substr( $END_DATE, 0, 4 ).substr( $BIRTHDAY, 4, 6 );
								}
								else
								{
												$DATA = substr( $CUR_DATE, 0, 4 ).substr( $BIRTHDAY, 4, 6 );
								}
								if ( !( $DATA < $CUR_DATE ) || !( $END_DATE < $DATA ) || !( $BIRTHDAY == "1900-01-01 00:00:00" ) )
								{
												if ( $BIRTHDAY == "0000-00-00 00:00:00" )
												{
																break;
												}
								}
								else
								{
												continue;
								}
								if ( $CUR_DATE == $DATA )
								{
												++$COUNT1;
												$PERSON_STR1 .= "<img src='../images/cake.png' align='absmiddle'>&nbsp;".$USER_NAME1."，";
								}
								else
								{
												++$COUNT2;
												$PERSON_STR2 .= "<tr class=TableBlock><td valign=Middle align=left>近期生日：<img src='../images/cake.png' align=absmiddle>&nbsp;".$USER_NAME1."(".date( "m-d", strtotime($DATA) ).")</td><td valign=Middle align=left>&nbsp;</td></tr>";
												if ( date( "m", time( ) ) == 12 )
												{
																$M_D = date( "m-d", strtotime( $DATA ) );
																$ARRAY_KEY = "k".$M_D.$COUNT2;
																if ( substr( $M_D, 0, 2 ) == 12 )
																{
																				$BIRTHDAY_ARRAY1["{$ARRAY_KEY}"] = $USER_NAME1;
																}
																else
																{
																				$BIRTHDAY_ARRAY2["{$ARRAY_KEY}"] = $USER_NAME1;
																}
												}
								}
				}

				if ( date( "m", time( ) ) == 12 )
				{
								$PERSON_STR2 = "";
								if ( is_array( $BIRTHDAY_ARRAY1 ) && !empty( $BIRTHDAY_ARRAY1 ) )
								{
												foreach ( $BIRTHDAY_ARRAY1 as $key => $value )
												{
														$PERSON_STR2 .= "<tr class=TableBlock><td valign=Middle align=left>近期生日：<img src='../images/cake.png' align=absmiddle>&nbsp;".$value."(".substr( $key, 1, 5 ).")</td></td><td valign=Middle align=left>&nbsp;</td></tr>";
												}
								}
								if ( is_array( $BIRTHDAY_ARRAY2 ) && !empty( $BIRTHDAY_ARRAY2 ) )
								{
												foreach ( $BIRTHDAY_ARRAY2 as $key => $value )
												{
														$PERSON_STR2 .= "<tr class=TableBlock><td valign=Middle align=left>近期生日：<img src='../images/cake.png' align=absmiddle>&nbsp;".$value."(".substr( $key, 1, 5 ).")</td></td><td valign=Middle align=left>&nbsp;</td></tr>";
												}
								}
				}
				$PERSON_STR1 = substr( $PERSON_STR1, 0, -2 );
				//$PERSON_STR2 = substr( $PERSON_STR2, 0, -2 );

//<div style=\"width:700px; height:150px; overflow:scroll;\"></div>

				$MODULE_BODY .= "<table border=\"0\" class=\"TableBlock\" width=\"100%\">";
				$MODULE_BODY .= "<tr align=\"left\" class=\"TableHeader\"><td colspan=10>&nbsp;".$module_desc."</td></tr>";
				if ( 0 < $COUNT1 )
				{
								$MODULE_BODY .= "<tr class=TableBlock><td valign=Middle align=left><font color=red>今天生日：</font>".$PERSON_STR1."，生日快乐!</td></td><td valign=Middle align=left>&nbsp;</td></tr>";
				}
				if ( 0 < $COUNT2 )
				{
								$MODULE_BODY .= $PERSON_STR2;
				}
				if ( $COUNT1 == 0 && $COUNT2 == 0 )
				{
								$MODULE_BODY .= "<tr class=TableBlock><td valign=Middle align=left><font color=green>近期没有客户生日!</font></td><td valign=Middle align=left>&nbsp;</td></tr>";
				}
				for($n=0;$n<$xh;$n++)
				{
				                $MODULE_BODY .= "<tr class=TableBlock><td valign=Middle align=left>&nbsp;</td></tr>";
				}

                $MODULE_BODY .= "</table>";
echo $MODULE_BODY;

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
