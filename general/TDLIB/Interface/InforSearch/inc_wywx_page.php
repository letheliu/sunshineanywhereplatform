<? /*eNqFkltKw0AYRrfSDQRmMrlMX9WN1NSFtUOhtHkwpTEmzcVqSWJCk2BqWgreRVARxBvVh2KHLuB/P+ebA/MP0/jNXR8+xV2iEQ2T+n6TSoqqYZmqDQkjihtNlSJJPrCfk69yWbHqyuyYD0Houtwsi/za7qc+ZKe/ZcH0oGe1L2+YM/12p7MQcpgeZ04Wht694fO3zInZyUajjyQ6/olT2DZ8znt9iLw4sbreqijmlh/kt/Zi9h5nkNNi2yarPXATw30EaxwRIVVARECY6RDN/+P8JXrly8yB6O0yFQiCl+ftwd12dWNRAUkbqwZJ415uWl7iwSmYyHVKZZFQGUJriKhYUOqKQkRFARv4kZmLyoIbnHKSJy1+qElRsaN+cRqtdnf2xn/OeviZn6lI/Ad/ECwS*/
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');


$GLOBAL_SESSION=returnsession();

$MenuArray[] = array('290','node_user','������Ϣ','../WuYeGuanLi/wygl_baoxiuxinxi1_view.php');
$MenuArray[] = array('302','node_user','��������','../WuYeGuanLi/wygl_baoxiuxinxi2_view.php');
$MenuArray[] = array('286','node_user','�޸�ȷ��','../WuYeGuanLi/wygl_baoxiuxinxi3_view.php');
$MenuArray[] = array('268','node_user','���ϵǼ�','../WuYeGuanLi/wygl_baoxiuxinxi4_view.php');
$MenuArray[] = array('268','node_user','���ý���','../WuYeGuanLi/wygl_baoxiuxinxi5_view.php');
$MenuArray[] = array('268','node_user','��������','../WuYeGuanLi/wygl_weixiupingjia_view.php');



$DateY = Date("Y");
$DateM = Date("m");
$U = $_GET['PRIV_NO_FLAG'];

$DEPT_PARENT = $_GET['DEPT_PARENT'];



$UNIT_NAME = "��ҵ����";

page_css("��ҵ����");

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
   <span>��ҵ����</span></li>\n
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