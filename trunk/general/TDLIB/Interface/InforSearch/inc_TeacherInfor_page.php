<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

$MenuArray[] = array('290','node_user','��ѧ���ݹ���','');
$MenuArray[] = array('290','node_user','��ʦ�̰�����','EDU/Interface/Teacher/edu_jiaoan_view.php');
$MenuArray[] = array('290','node_user','��ʦ�ڿ���־','EDU/Interface/Teacher/school_teachinglog_view.php');
$MenuArray[] = array('290','node_user','��ʦ�ҷü�¼','EDU/Interface/Teacher/edu_jiafang_view.php');
$MenuArray[] = array('290','node_user','��ʦ���⸨����¼','EDU/Interface/Teacher/edu_kewaifudao_view.php');
$MenuArray[] = array('302','node_user','�༶֪ͨ����','EDU/Interface/Teacher/school_notify_view.php');
$MenuArray[] = array('302','node_user','ѧ����ҵ����','EDU/Interface/Teacher/school_homework_view.php');
$MenuArray[] = array('286','node_user','�μ����ع���','EDU/Interface/Teacher/school_download_view.php');
$MenuArray[] = array('268','node_user','ѧ�����ڹ���','EDU/Interface/Teacher/edu_studentkaoqin_view.php');
$MenuArray[] = array('268','node_user','ѧ�����Թ���','EDU/Interface/Teacher/school_gb_view.php');

$SCHOOL_MODEL = parse_ini_file("SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "��ʦ��Ϣ��ѯ";

page_css("��ʦ��Ϣ��ѯ");

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
   <span>��ʦ��Ϣ��ѯ</span></li>\n
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
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main.location='".$�˵���ַ."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$�˵�����</td>
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