<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

$MenuArray[] = array('290','node_user','�칫��Ʒ��Ϣ����','../officeproduct/officeproduct_view.php','1');
$MenuArray[] = array('290','node_user','�칫��Ʒ������ϸ','../officeproduct/officeproductout_view.php','1');
$MenuArray[] = array('302','node_user','�칫��Ʒ������ϸ','../officeproduct/officeproductlingyong_view.php');
$MenuArray[] = array('286','node_user','�칫��Ʒ�黹��ϸ','../officeproduct/officeproducttui_view.php');
$MenuArray[] = array('268','node_user','�칫��Ʒ�����ϸ','../officeproduct/officeproductin_view.php');
$MenuArray[] = array('268','node_user','�칫��Ʒ������ϸ','../officeproduct/officeproducttiaoku_view.php');
$MenuArray[] = array('268','node_user','�칫��Ʒ������ϸ','../officeproduct/officeproductbaofei_view.php');
$MenuArray[] = array('290','node_user','�칫��Ʒ�ֿ�ͳ��','../officeproduct/officeproduct_tongji.php','0');
$MenuArray[] = array('290','node_user','�칫��Ʒ����ͳ��','../officeproduct/officeproduct_fenxiang.php','0');

$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "�칫��Ʒ";

page_css("�칫��Ʒ");

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
   <span>�칫��Ʒ</span></li>\n
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