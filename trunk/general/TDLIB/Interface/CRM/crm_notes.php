<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css("CRM�����ǩ");



$user_id = $_SESSION['LOGIN_USER_ID'];

$MAX_COUNT= "6";
$module_desc = "CRM�����ǩ";
$module_body = "";
//if ( $MODULE_FUNC_ID == "" || find_id( $USER_FUNC_ID_STR, $MODULE_FUNC_ID ) )
//{
				$query = "select * from crm_mytable_notes where ������ID='".$user_id."';";
				$rs = $db->Execute($query);
				$rs_a = $rs->GetArray();
                if(count($rs_a)>0){
					for($i=0;$i<count($rs_a);$i++){
						$MY_NOTES .= $rs_a[$i]['��ǩ����'];
						$MY_NOTES .= "[";
						$MY_NOTES .= $rs_a[$i]['����ʱ��'];
						$MY_NOTES .= "]";
					}
				}
                $module_body .= "<table border=\"0\" class=\"TableBlock\" width=\"100%\">";
				$module_body .= "<tr align=\"left\" class=\"TableHeader\"><td colspan=10>&nbsp;".$module_desc."</td></tr>";
				$module_body .= "</table>";
				$module_body .= ( "<textarea id=\"update\" onblur=\"save_notes()\" style=\"overflow-y:auto;width:100%;height:".( $MAX_COUNT * 20 - 15 ) )."px;background:ccFFFF;padding:5px;border:0px;\">��".htmlspecialchars( $MY_NOTES )."</textarea>
				<script language=\"JavaScript\">
                var timeout=60000;
                function save_notes()
				{
					var req = getXMLHttpObj();
					req.open(\"POST\", \"crm_config_notes.php\",true);
					treq.setRequestHeader(\"Method\", \"POST crm_config_notes.php HTTP/1.1\");
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
					req.send(\"CONTENT=\"+encodeURIComponent(\$\"update\").value));
                }          
				</script>";
				//encodeURIComponent()

echo $module_body;
//}
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
