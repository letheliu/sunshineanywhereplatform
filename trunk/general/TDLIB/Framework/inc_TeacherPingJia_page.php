<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);



require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();


$SCHOOL_MODEL = parse_ini_file("../Interface/EDU/SCHOOL_MODEL.ini");
$SCHOOL_MODEL_TEXT = $SCHOOL_MODEL['SCHOOL_MODEL'];

$��ʾ��Ϣ����['������ʦƽ����P��']	= "�����㷨ִ�й���";
$��ʾ��Ϣ����['��ʦ����ͳ���㷨']	= "�����㷨��ϸ����";
$��ʾ��Ϣ����['��ʦ������������']	= "���۽����������";


$MenuArray[] = array('290','node_user','��ʦ�����趨','EDU/Interface/JiaXuePingJia/edu_pingjia_newai.php');
$MenuArray[] = array('290','node_user','��ʦ������ϸ','EDU/Interface/JiaXuePingJia/edu_pingjiamingxi_newai.php');
$MenuArray[] = array('290','node_user','��ʦ����ͳ�Ƴ�ʼ��','EDU/Interface/JiaXuePingJia/edu_pingjiamingxi_init.php');
$MenuArray[] = array('286','node_user','���в�����Ϣ����','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji.php');
$MenuArray[] = array('286','node_user','������ʦƽ����P��','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_p.php');
$MenuArray[] = array('286','node_user','�����༶ƽ����BP��','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_bp.php');
$MenuArray[] = array('286','node_user','�γ̾�ֵ��BP��TD��','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_td.php');
$MenuArray[] = array('286','node_user','��ʦTD��ֵ��TDP��','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_tdp.php');
$MenuArray[] = array('286','node_user','���ҽ�ʦ��ֵ��ZP��','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_zp.php');
$MenuArray[] = array('286','node_user','ȫУ��ʦ��ֵ��XP��','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_xp.php');
$MenuArray[] = array('286','node_user','���վ�ֵ��X��','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_x.php');
$MenuArray[] = array('286','node_user','��ʦ�����ɼ���M��','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_m.php');
$MenuArray[] = array('286','node_user','��ʦ������������','EDU/Interface/JiaXuePingJia/edu_pingjia_tongji_result.php');
$MenuArray[] = array('286','node_user','��ʦ����ͳ���㷨','EDU/Interface/JiaXuePingJia/help.php');


$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "��ʦ���۹���";
page_css("��ʦ���۹���");


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
				<td nowrap>&nbsp;&nbsp;��ʦ���ý�ѧ����</td>
				</tr>";
for($i=0;$i<sizeof($MenuArray);$i++)			{
	$�˵����� = $MenuArray[$i][1];
	$�˵����� = $MenuArray[$i][2];
	$�˵���ַ = $MenuArray[$i][3];
	$returnPrivMenu = returnPrivMenu($�˵�����);
	if($��ʾ��Ϣ����[$�˵�����]!="")			{
		print "<tr class=TableHeader align=left>
				<td nowrap>&nbsp;&nbsp;".$��ʾ��Ϣ����[$�˵�����]."</td>
				</tr>";
	}
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