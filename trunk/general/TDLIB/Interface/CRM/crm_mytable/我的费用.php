<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();


$user_id = $_SESSION['LOGIN_USER_ID'];
$user_name = $_SESSION['LOGIN_USER_NAME'];
//$user_name = returntablefield(user,);
$module_desc = "我的费用";
$module_body = "";

$sql = "select * from crm_expense order by 创建时间 desc";
$rs = $db->Execute($sql);
$rs_a = $rs->GetArray();
if(count($rs_a)>0){
  for($i=0;$i<count($rs_a);$i++){
     $module_body .= "<li>".$rs_a[$i]['客户名称']."&nbsp;".$rs_a[$i]['费用沟通概述']."(".$rs_a[$i]['穿件时间'].")<li>" 
  }
}
if(count($rs_a) == 0){
   $module_body .= "<li><font color=red>暂无费用</font></li>";
}

$module_body .= "<ul>\r\n<script>\r\nfunction plan_detail(PLAN_ID)\r\n{\r\n URL='/general/work_plan/show/plan_detail.php?PLAN_ID='+PLAN_ID;\r\n myleft=(screen.availWidth-500)/2;\r\n window.open(URL,'read_work_plan','height=500,width=600,status=1,toolbar=no,menubar=no,location=no,scrollbars=yes,top=120,left='+myleft+',resizable=yes');\r\n}\r\n</script>";

echo $module_body;
?>