<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


//$MenuArray[] = array('290','node_user','��ʦְ��ѧ������','EDU/Interface/EDU/edu_teacher_zhicheng_newai.php');
//$MenuArray[1]['title'] = '�γ�����������';
//$MenuArray[1]['menucode'] = 'node_user';
$MenuArray[] = array('302','node_user','��ͨ�γ̰༶ϵ����','EDU/Interface/DICT/dict_kechouclassnumber1_newai.php');
//$MenuArray[] = array('302','node_user','ʵѵ�γ̰༶ϵ����','EDU/Interface/EDU/dict_kechouclassnumber2_newai.php');
$MenuArray[] = array('302','node_user','���ۿι��������㷽��','EDU/Interface/DICT/dict_kechouworking_newai.php');
//$MenuArray[] = array('302','node_user','��ʦ��ʱ���ʽ������','EDU/Interface/EDU/kechou_setting.php');
$MenuArray[] = array('302','node_user','��ʦ�α���������','EDU/Interface/EDU/edu_kechoujisuan_kechou.php');
$MenuArray[] = array('286','node_user','�α������б���ʾ','EDU/Interface/EDU/edu_kechoujisuan_newai.php');
//$MenuArray[] = array('268','node_user','������ѧ���̸�����������','EDU/Interface/EDU/edu_kechoutongji_qitagongzuoliang.php');
$MenuArray[] = array('268','node_user','��ʦ������ͳ�����','EDU/Interface/EDU/edu_kechoutongji.php');
$MenuArray[] = array('268','node_user','������ѧ����������','EDU/Interface/EDU/edu_kechouqita_newai.php');
$MenuArray[] = array('268','node_user','�̸���ѧ����������','EDU/Interface/EDU/edu_kechoujiaofu_newai.php');
$MenuArray[] = array('268','node_user','���Ź���������','EDU/Interface/EDU/edu_kechoutongji_bumen.php');
//$MenuArray[] = array('302','node_user','��ѧ�������ҵ����������','EDU/Interface/EDU/edu_kechoukeyan_newai.php');
//$MenuArray[] = array('286','node_user','��ѧ�������ҵ��н�����','EDU/Interface/EDU/edu_kechoukeyan_newai.php');
//$MenuArray[] = array('286','node_user','��ʦѧ����Ϣ����','EDU/Interface/EDU/dict_education_newai.php');
//$MenuArray[] = array('286','node_user','��ʦְ����Ϣ����','EDU/Interface/EDU/dict_zhicheng_newai.php');
//$MenuArray[] = array('268','node_user','Ȩ�޷����趨','EDU/Framework/inc_kechou_priv.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "��ʦ�������������";

page_css("��ʦ�������������");



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
   <span>��ʦ����������</span></li>\n
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n
	   ";

for($i=0;$i<sizeof($MenuArray);$i++)			{
	$�˵����� = $MenuArray[$i][1];
	$�˵����� = $MenuArray[$i][2];
	$�˵���ַ = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($�˵�����);
	if($returnPrivMenu)		{
		print "
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='../../".$�˵���ַ."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$�˵�����</td>
		   </tr>
		   ";
	}
}
print "</table>
   </div>";
/*
print "
<li>
	<a href=\"group\" onclick=\"\" target=\"address_main\" title=\"�������\" id=\"link_4\">
	<span>�������</span>
	</a>
</li>";
*/
print "</ul>";



?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>