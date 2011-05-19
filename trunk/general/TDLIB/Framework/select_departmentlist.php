<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


/*****************************************************************\
1、本系统为商业软件，受国家著作权法保护，任何人不得在
原作者未同意的基础上进行拷贝，或进行商业用途。
2、本次版本为非开源版，如果你使用，请注意获取许可证。
3、本系统作者保留一切相关的知识产权
4、本作者姓名：王纪云
\*****************************************************************/
//----------------------------------------------------------
//本函数来自于sms_index/目录
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

