<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


/*****************************************************************\
1����ϵͳΪ��ҵ������ܹ�������Ȩ���������κ��˲�����
ԭ����δͬ��Ļ����Ͻ��п������������ҵ��;��
2�����ΰ汾Ϊ�ǿ�Դ�棬�����ʹ�ã���ע���ȡ���֤��
3����ϵͳ���߱���һ����ص�֪ʶ��Ȩ
4��������������������
\*****************************************************************/
//----------------------------------------------------------
//������������sms_index/Ŀ¼
//----------------------------------------------------------

require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
$common_html=returnsystemlang('common_html');
$systemlang=$_SESSION[$SUNSHINE_USER_LANG_VAR];
require_once('./sms_index/single_select.php');
page_css($_GET['title']." - - System ");
//add_department_all();
$elementid=$_GET['field'];
$elementname=$_GET['field2'];
$elementname==""?$elementname=$elementid."name":'';
frame_user_js_($elementid,$elementname);
//frame_user_header_();
frame_user_data_departmentlist($_GET['tablename'],$_GET['fieldid'],$_GET['fieldname'],$_GET['title']);
?>

