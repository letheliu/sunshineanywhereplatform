<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css('CRM�ͻ�����');

$user_id = $_SESSION['LOGIN_USER_ID'];
//$module_func_id = "";
$module_desc = "CRM�ͻ���������";
$MODULE_BODY = "";
/*
                $CUR_DATE = date( "Y-m-d", mktime(1,1,1,date('m'),date('d')-1,date('Y')));
				$END_DATE = date( "Y-m-d", mktime(1,1,1,date('m'),date('d')+7,date('Y')));
				$COUNT1 = 0;
				$COUNT2 = 0;
				$BIRTHDAY_ARRAY1 = $BIRTHDAY_ARRAY2 = array( );
				$query = "
				SELECT ���,�ͻ�����,��һ��ϵ��,DATE_FORMAT(�ͻ�����,'%m-%d') AS �ͻ�����
				from crm_customer
				where ������='$user_id'
				and DATE_FORMAT(�ͻ�����,'%Y-%m-%d')>='$CUR_DATE'
				and DATE_FORMAT(�ͻ�����,'%Y-%m-%d')<='$END_DATE'
				order by �ͻ����� ASC";
*/
				$CUR_DATE = date( "Y-m-d", time( ) );
				$END_DATE = date( "Y-m-d", strtotime( "+7 days" ) );
				$COUNT1 = 0;
				$COUNT2 = 0;
				$BIRTHDAY_ARRAY1 = $BIRTHDAY_ARRAY2 = array( );
				$query = "SELECT ���,�ͻ�����,��һ��ϵ��,DATE_FORMAT(�ͻ�����,'%Y-%m-%d') AS �ͻ����� from crm_customer where ������='$user_id'
				and DATE_FORMAT(�ͻ�����,'%Y-%m-%d')>='$CUR_DATE' and DATE_FORMAT(�ͻ�����,'%Y-%m-%d')<='$END_DATE' order by �ͻ����� ASC";
				$rs = $db->CacheExecute(150,$query);
				$ROW = $rs->GetArray();
				if(count($ROW)<=4 and count($ROW)>0){
				  $xh = 4-count($ROW);
				  $sum = 0;
				  for($m=0;$m<count($ROW);$m++){
				     if($ROW[$m]['�ͻ�����'] == date("Y-m-d")){
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
					            $ID        = $ROW[$i]['���'];
								$USER_NAME = $ROW[$i]['�ͻ�����'];
								$BIRTHDAY  = $ROW[$i]['�ͻ�����'];
								$XIANXIREN = $ROW[$i]['��һ��ϵ��'];
								$USER_NAME1 = $USER_NAME."<a href=../crm_customer_view_model.php?���=$ID; title=�ͻ���ϸ��Ϣ><font color=green>[".$XIANXIREN."]</font></a>";

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
												$PERSON_STR1 .= "<img src='../images/cake.png' align='absmiddle'>&nbsp;".$USER_NAME1."��";
								}
								else
								{
												++$COUNT2;
												$PERSON_STR2 .= "<tr class=TableBlock><td valign=Middle align=left>�������գ�<img src='../images/cake.png' align=absmiddle>&nbsp;".$USER_NAME1."(".date( "m-d", strtotime($DATA) ).")</td><td valign=Middle align=left>&nbsp;</td></tr>";
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
														$PERSON_STR2 .= "<tr class=TableBlock><td valign=Middle align=left>�������գ�<img src='../images/cake.png' align=absmiddle>&nbsp;".$value."(".substr( $key, 1, 5 ).")</td></td><td valign=Middle align=left>&nbsp;</td></tr>";
												}
								}
								if ( is_array( $BIRTHDAY_ARRAY2 ) && !empty( $BIRTHDAY_ARRAY2 ) )
								{
												foreach ( $BIRTHDAY_ARRAY2 as $key => $value )
												{
														$PERSON_STR2 .= "<tr class=TableBlock><td valign=Middle align=left>�������գ�<img src='../images/cake.png' align=absmiddle>&nbsp;".$value."(".substr( $key, 1, 5 ).")</td></td><td valign=Middle align=left>&nbsp;</td></tr>";
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
								$MODULE_BODY .= "<tr class=TableBlock><td valign=Middle align=left><font color=red>�������գ�</font>".$PERSON_STR1."�����տ���!</td></td><td valign=Middle align=left>&nbsp;</td></tr>";
				}
				if ( 0 < $COUNT2 )
				{
								$MODULE_BODY .= $PERSON_STR2;
				}
				if ( $COUNT1 == 0 && $COUNT2 == 0 )
				{
								$MODULE_BODY .= "<tr class=TableBlock><td valign=Middle align=left><font color=green>����û�пͻ�����!</font></td><td valign=Middle align=left>&nbsp;</td></tr>";
				}
				for($n=0;$n<$xh;$n++)
				{
				                $MODULE_BODY .= "<tr class=TableBlock><td valign=Middle align=left>&nbsp;</td></tr>";
				}

                $MODULE_BODY .= "</table>";
echo $MODULE_BODY;

/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>
