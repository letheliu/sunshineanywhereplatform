<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
$GLOBAL_SESSION=returnsession();

$MODULE_FUNC_ID = "";
$MODULE_DESC = "��ǩ";
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
										alert(\"�����ǩ���ݴ��󣬴�����Ϣ��\\n\"+req.responseText);
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
									alert(\"�����ǩ���ݴ��󣬴�����룺\"+s);
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
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>
