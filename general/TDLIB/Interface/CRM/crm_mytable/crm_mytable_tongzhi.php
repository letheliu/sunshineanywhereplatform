<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css('CRM����֪ͨ');

$user_id = $_SESSION['LOGIN_USER_ID'];
$module_func_id = "";
$module_desc = "CRM����֪ͨ";
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
								$module_body .= "<tr class=TableBlock><td valign=Middle align=left><img src='../images/wav.gif' align='absMiddle'>&nbsp;<font color=red><b>���޽���֪ͨ</b></font></td></tr>";
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
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�Ѿ��ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>
