<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

//$MenuArray[] = array('294','node_user','�����ι�����ʱ������','EDU/Interface/EDU/edu_banzhuren_manager_banji_setting.php');

//$MenuArray[] = array('294','node_user','�����ι�����ʱ������','EDU/Interface/EDU/edu_banzhuren_manager_banji_setting.php');


$MenuArray[] = array('294','node_user','�����ι�����ʱ��','EDU/Interface/EDU/edu_banzhuren_manager_banji_setting.php');
$MenuArray[] = array('301','node_user','�����ι���У��ʱ��','EDU/Interface/EDU/edu_banzhuren_xiaoyou_setting.php');
$MenuArray[] = array('301','node_user','ѧ��������ʱ������','EDU/Interface/EDU/edu_student_manager_setting.php');
$MenuArray[] = array('301','node_user','������/��ʦ¼��ɼ�ʱ��','EDU/Interface/EDU/Exam_class_TimeDuan.php');
$MenuArray[] = array('294','node_user','��������д��ĩ����ʱ��','EDU/Interface/EDU/edu_banzhuren_manager_qimopingyu_setting.php');
$MenuArray[] = array('301','node_user','��������д��ҵ����ʱ��','EDU/Interface/EDU/edu_banzhuren_manager_biyejianding_setting.php');
$MenuArray[] = array('301','node_user','��ʦ�޸Ľ̲���Ϣʱ��','EDU/Interface/EDU/edu_teacher_changejiaocaitime_setting.php');
$MenuArray[] = array('301','node_user','�������޸Ľ̲���Ϣʱ��','EDU/Interface/EDU/edu_banzhuren_changejiaocaitime_setting.php');

$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];

$UNIT_NAME = "ʱЧ�Թ���ģ��";

page_css("ʱЧ�Թ���ģ��");


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
   <span>ʱ����Ч������</span></li>\n
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
print "</ul>";




?>