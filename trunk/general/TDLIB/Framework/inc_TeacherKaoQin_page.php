<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

//רҵ�ƿƳ�,�Լ����Ƴ�Ȩ��ʱ��������,����ϵͳֻ���в鿴Ȩ��,���Բ���ʾ���пɲ����ԵĲ˵�
//����:if($_SESSION['SUNSHINE_BANJI_LIST']=="")			XXXX

if($_SESSION['SUNSHINE_BANJI_LIST']=="")		$MenuArray[] = array('302','node_user','��ʦ���ڳ�ʼ��','EDU/Interface/EDU/edu_teacherkaoqinmingxi_administrator_change.php');
$MenuArray[] = array('290','node_user','��ʦԭʼ������','EDU/Interface/EDU/edu_teacherkaoqin_newai.php');
$MenuArray[] = array('302','node_user','��ʦ����������ϸ','EDU/Interface/EDU/edu_teacherkaoqinmingxi_newai.php');
$MenuArray[] = array('286','node_user','��ʦ��������ͳ��','EDU/Interface/EDU/edu_teacherkaoqin_static.php');
$MenuArray[] = array('302','node_user','��ʦ���μ�¼��ϸ','EDU/Interface/EDU/edu_scheduletiaoke_newai.php');
$MenuArray[] = array('302','node_user','��ʦ���μ�¼��ϸ','EDU/Interface/EDU/edu_scheduledaike_newai.php');
$MenuArray[] = array('302','node_user','��ʦ���ڲ�����ϸ','EDU/Interface/EDU/edu_teacherkaoqinbudeng_newai.php');
$MenuArray[] = array('302','node_user','��ѧ�ռǲ�����ϸ','EDU/Interface/EDU/edu_jiaoxuerijibudeng_newai.php');
$MenuArray[] = array('302','node_user','��ʦ�໥������ϸ','EDU/Interface/EDU/edu_scheduletiaokexianghu_newai.php');
$MenuArray[] = array('302','node_user','��ʦͣ�θ�����ϸ','EDU/Interface/EDU/edu_scheduletingke_newai.php');
//$MenuArray[] = array('302','node_user','��ʦ���μ�¼��ϸ','EDU/Interface/EDU/edu_schedulefuke_newai.php');
$MenuArray[] = array('290','node_user','���ڻ�ʹ��˵��','EDU/Interface/Help/TeacherKaoQin.php');
$MenuArray[] = array('290','node_user','�趨��ʦ������Ϣ','EDU/Interface/EDU/edu_teacherkaoqinmingxi_setting.php');
if($_SESSION['SUNSHINE_BANJI_LIST']=="")		$MenuArray[] = array('290','node_user','�趨����Чʱ������','EDU/Interface/EDU/edu_teacherkaoqinmingxi_type.php');
$MenuArray[] = array('290','node_user','�趨�ڴ��Ͽ�ʱ����Ϣ','EDU/Interface/EDU/schedule_timesetting.php');
if($_SESSION['SUNSHINE_BANJI_LIST']=="")		$MenuArray[] = array('290','node_user','�Զ���ȡ���ڻ�����','EDU/Interface/EDU/edu_teacherkaoqinmingxi_automake.php');
$MenuArray[] = array('290','node_user','��ʦ���ڲ������߼�','EDU/Interface/EDU/edu_teacherkaoqin_tools.php');
$MenuArray[] = array('290','node_user','��ʦ���ڲ�������ͼ','EDU/Interface/Help/flowgraph_teacherkaoqin.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "��ʦ���ڹ���";
page_css("��ʦ���ڹ���");


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
   <span>��ʦ�Ͽο���</span></li>\n
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

?>