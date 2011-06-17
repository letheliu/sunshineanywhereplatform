<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

$UNIT_NAME = "��Ա����";

$MenuArray[] = array('100','node_user','��Ա����',"EDU/Interface/TuanWuGuanLi/xingzheng_leaguemember_newai.php","��Ա����");
$MenuArray[] = array('100','node_user','�ŷѽ���',"EDU/Interface/TuanWuGuanLi/xingzheng_leaguefeein_newai.php","�ŷѽ���");
$MenuArray[] = array('100','node_user','����ͳ��',"EDU/Interface/TuanWuGuanLi/xingzheng_leaguefeein.static.php","����ͳ��");
$MenuArray[] = array('100','node_user','�ŷ�֧��',"EDU/Interface/TuanWuGuanLi/xingzheng_leaguefeeout_newai.php","�ŷ�֧��");
$MenuArray[] = array('100','node_user','֧��ͳ��',"EDU/Interface/TuanWuGuanLi/xingzheng_leaguefeeout.static.php","֧��ͳ��");
$MenuArray[] = array('100','node_user','����֯�',"EDU/Interface/TuanWuGuanLi/xingzheng_leagueactive_newai.php","����֯�");
$MenuArray[] = array('100','node_user','��֧������',"EDU/Interface/TuanWuGuanLi/xingzheng_leagueunit_newai.php","��֧������");


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