<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$filename = "../Interface/EDU/SCHOOL_MODEL.ini";
if(is_file($filename))	{
	$file = parse_ini_file($filename);			//print_R($file);
	$SCHOOL_MODEL = $file['SCHOOL_MODEL'];
}
else	{
	$SCHOOL_MODEL = 1;
}

//רҵ�ƿƳ�,�Լ����Ƴ�Ȩ��ʱ��������,����ϵͳֻ���в鿴Ȩ��,���Բ���ʾ���пɲ����ԵĲ˵�
//����:if($_SESSION['SUNSHINE_BANJI_LIST']=="")			XXXX

require_once('../Interface/EDU/systemprivateinc.php');

$TARGET_TITLE = "�������-�α�";

$TARGET_ARRAY = $PRIVATE_SYSTEM['�������']['�α�'];

$MenuArray = SystemPrivateInc($TARGET_ARRAY,$TARGET_TITLE);


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "�α����ģ��";

page_css("�α����ģ��");



$��ʾ��Ϣ����['����ʦ��α�']	= "�α���Ϣ��ѯ";
$��ʾ��Ϣ����['��Ϣʱ����趨']	= "�α���ع��߼�";



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
   <div id=module_1 class=moduleContainer style=\"display:;\">\n
	   <table class=\"TableBlock trHover\" width=100% align=center>\n
	   ";
print "<tr class=TableHeader align=left>
				<td nowrap>&nbsp;&nbsp;�α����</td>
				</tr>";
for($i=0;$i<sizeof($MenuArray);$i++)			{
	$�˵����� = $MenuArray[$i][2];
	$�˵���ַ = $MenuArray[$i][0];
	$returnPrivMenu = returnPrivMenu($�˵�����);
	if($��ʾ��Ϣ����[$�˵�����]!="")			{
		print "<tr class=TableHeader align=left>
				<td nowrap>&nbsp;&nbsp;".$��ʾ��Ϣ����[$�˵�����]."</td>
				</tr>";
	}
	if($returnPrivMenu)		{
		print "
		 <tr class=TableData align=left><td nowrap onclick=\"parent.edu_main_frame.location='../Interface/EDU/".$�˵���ַ."'\" style=\"cursor:pointer;\">&nbsp;&nbsp;$�˵�����</td>
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