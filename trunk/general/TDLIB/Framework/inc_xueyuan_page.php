<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


//$MenuArray[] = array('302','node_user','ѧԺ��Ϣ����','EDU/Interface/EDU/edu_xueyuan_newai.php');
//$MenuArray[] = array('290','node_user','ѧУ������Ϣ','EDU/Interface/EDU/edu_schoolbaseinfor_newai.php');
$MenuArray[] = array('286','node_user','ѧУУ����Ϣ','EDU/Interface/EDU/edu_xiaoqu_newai.php');
//$MenuArray[] = array('290','node_user','��Ҫ�ʲ���Ϣ','EDU/Interface/EDU/edu_schoolmainasset_newai.php');
//$MenuArray[] = array('290','node_user','��֯��������ְ��','EDU/Interface/EDU/edu_schooldeptteacher_newai.php');
//$MenuArray[] = array('290','node_user','ѧУ��ѧ���','EDU/Interface/EDU/edu_schoolbanxueinfor_newai.php');
$MenuArray[] = array('302','node_user',"ѧУ".$_SESSION['SUNSHINE_REGISTER_XI'].'����','EDU/Interface/EDU/edu_xi_newai.php');
$MenuArray[] = array('290','node_user','ѧУרҵ����','EDU/Interface/EDU/edu_zhuanye_newai.php');




$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "ѧУ������Ϣ";

page_css("ѧУ������Ϣ");

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
   <span>ѧУ������Ϣ</span></li>\n
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