<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];



$MenuArray[] = array('290','node_user','ѧ��ת���¼','EDU/Interface/EDU/edu_studentflow_newai.php');
$MenuArray[] = array('302','node_user','ѧ��תѧ��¼','EDU/Interface/EDU/student_changelist_zhuanxue.php');
$MenuArray[] = array('286','node_user','ѧ����ѧ��¼','EDU/Interface/EDU/student_changelist_xiuxue.php');
$MenuArray[] = array('268','node_user','ѧ����ѧ��¼','EDU/Interface/EDU/student_changelist_tuixue.php');
$MenuArray[] = array('294','node_user','ѧ��������¼','EDU/Interface/EDU/student_changelist_kaichu.php');
$MenuArray[] = array('302','node_user','ѧ��ת���¼����','EDU/Interface/EDU/edu_studentflow_newai.php?action=export_default');
$MenuArray[] = array('302','node_user','תѧ��ѧ��ѧ������¼','EDU/Interface/EDU/student_changelist_all.php?action=export_default');
$MenuArray[] = array('302','node_user','�����춯״̬ѧ����¼','EDU/Interface/EDU/edu_studentyidong_newai.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "ѧ���춯��Ϣ����";
page_css("ѧ���춯��Ϣ����");

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
   <span>ѧ���춯��Ϣ</span></li>\n
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
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main2.location='../../".$�˵���ַ."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$�˵�����</td>
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


?>