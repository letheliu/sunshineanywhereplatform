<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();

$module_desc = "CRM�ͻ���ѯ";
$module_body = "";
page_css("CRM�ͻ���ѯ");


				$module_body .= "<form action=\"kehu_search.php?check=crmkehu\" name=\"form1\" method=\"post\">
				                �ͻ����ƣ�<input type=\"text\" name=\"kehu_name\" class=\"SmallInput\" size=\"20\" maxlength=\"25\"><br>
				                �ͻ����ͣ�<select name=\"kehu_type\" class=\"SmallSelect\" style=\"width:128pt\">
				                          <option value=\"\" selected>����</option>";

								$sql = "select �ͻ����� from crm_customer_type order by �ͻ�����";
								$rs = $db->Execute($sql);
								$rs_a = $rs->GetArray();
								for($i=0;$i<sizeof($rs_a);$i++)			{
								    $module_body .= "<option value=<?echo $rs_a[$i]['�ͻ�����'];?>>$rs_a[$i]['�ͻ�����']</option>";
								}
				                $module_body .= "</select><br>
								<input type=\"submit\" value=\"��ѯ\" class=\"SmallButton\" title=\"ģ����ѯ\" name=\"button\">
								</form>";

echo $module_body;

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
