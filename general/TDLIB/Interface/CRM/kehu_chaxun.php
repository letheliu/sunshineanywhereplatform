<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();

$module_desc = "CRM�ͻ���ѯ";
$module_body = "";
page_css("CRM�ͻ���ѯ");

$module_body .= "<table border=0 class=TableBlock width=100%>";
$module_body .= "<tr align=\"left\" class=\"TableHeader\"><td colspan=10>&nbsp;".$module_desc."</td></tr>";

				$module_body .= "<form action=\"crm_customer_person_newai.php\" name=\"form1\" method=\"get\">";
				$module_body .= "<tr class=TableBlock>
						<td valign=Middle align=left>&nbsp;�ͻ����ƣ�<input type=\"text\" name=\"searchvalue\" class=\"SmallInput\" size=\"26.5\" maxlength=\"25\"></td></tr>";
				$module_body .= "<tr class=TableBlock>
						<td valign=Middle align=left>
							<input type=hidden name='action' value='init_default_search'>
							<input type=hidden name='searchfield' value='�ͻ�����'>
							&nbsp;�ͻ����ͣ�<select name=\"�ͻ�����\" class=\"SmallSelect\" style=\"width:128pt\">
				                          <option value=\"\" selected></option>";
								$sql = "select �ͻ����� from crm_customer_type order by �ͻ�����";
								$rs = $db->CacheExecute(150,$sql);
								$rs_a = $rs->GetArray();
								for($i=0;$i<sizeof($rs_a);$i++)			{
				$module_body .= "<option value=".$rs_a[$i]['�ͻ�����'].">".$rs_a[$i]['�ͻ�����']."</option>";
								}
				$module_body .= "</select></td></tr>";
				$module_body .= "<tr class=TableBlock>
						        <td valign=Middle align=left>&nbsp;&nbsp;<input type=\"submit\" value=\"��ѯ\" class=\"SmallButton\" title=\"ģ����ѯ\" name=\"button\">&nbsp;<input type=\"reset\" value=\"���\" class=\"SmallButton\" title=\"�������\" name=\"button1\">
						        </td></tr>";
			    $module_body .= "<tr class=TableBlock><td valign=Middle align=left>&nbsp;</td></tr>";
				$module_body .= "</form>";

$module_body .= "</table>";

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
