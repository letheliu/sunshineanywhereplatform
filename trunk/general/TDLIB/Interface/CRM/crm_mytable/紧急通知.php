<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();

$module_func_id = "";
$module_desc = "CRM����֪ͨ";
$module_body = $module_op = "";
if ( $module_func_id == "" || find_id( $user_func_id_str, $module_func_id ) )
{
				$module_op = "";
				$module_body .= "<ul>";
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
																$module_body .= "<li style=\"color:#FF0000;\">".htmlspecialchars( $array[$i] )."</li>";
												}
								}
				}
				if ( $count == 0 )
				{
								$module_body .= "<li>���޽���֪ͨ</li>";
				}
				$module_body .= "<ul>";
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
