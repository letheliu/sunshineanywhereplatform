<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

$UNIT_NAME = "�����ֵ�";

$MenuArray[] = array('286','node_user','�ͻ��ȼ�','crm_customer_grade_newai.php');
$MenuArray[] = array('286','node_user','�ͻ�����','crm_customer_type_newai.php');
$MenuArray[] = array('286','node_user','�ͻ���Դ','crm_dict_source_newai.php');
$MenuArray[] = array('286','node_user','��������','crm_dict_needsubject_newai.php');
$MenuArray[] = array('286','node_user','��������','crm_dict_expensetypes_newai.php');
$MenuArray[] = array('286','node_user','��������','crm_dict_needtype_newai.php');
$MenuArray[] = array('286','node_user','����ʱ��','crm_dict_needtime_newai.php');
$MenuArray[] = array('286','node_user','���������','crm_dict_satisfaction_newai.php');
$MenuArray[] = array('286','node_user','����׶�','crm_dict_servicepharse_newai.php');
$MenuArray[] = array('286','node_user','������Դ','crm_dict_servicesources_newai.php');
$MenuArray[] = array('286','node_user','����״̬','crm_dict_servicestatus_newai.php');
$MenuArray[] = array('286','node_user','��������','crm_dict_servicetypes_newai.php');
$MenuArray[] = array('286','node_user','��Ʒ����','crm_product_group_newai.php');

$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



page_css($UNIT_NAME);
print "
<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/menu_left.css\" />\n
<script language=\"JavaScript\" src=\"/inc/js/menu_left.js\"></script>\n
<script language=\"JavaScript\" src=\"/inc/js/hover_tr.js\"></script>\n
";

print "\n<style>\nli span{\n
  background: url(\"/theme/$LOGIN_THEME/arrow_d.gif\") no-repeat left;\n
  display:block;\n
  padding-top:3px;\n
  padding-left:16px;\n
}</style>\n";
print "
<ul>\n
   <li>\n
   <span>$UNIT_NAME</span></li>\n
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n
	   ";

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$�˵����� = $MenuArray[$i][1];
	$�˵����� = $MenuArray[$i][2];
	$�˵���ַ = $MenuArray[$i][3];
	if(1)		{
		print "
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='".$�˵���ַ."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$�˵�����</td>
		   </tr>
		   ";
	}
}
print "</table>
   </div>";

print "</ul>";



?><?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>