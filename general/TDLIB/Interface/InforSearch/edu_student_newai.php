<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

//######################教育组件-权限较验部分##########################
SESSION_START();
require_once("lib.inc.php");
//print_R($_GET);
include("../EDU/edu_student_view_model.php");
exit;
header("Location:../EDU/edu_student_newai.php?action=".$_GET['action']."&学号=".$_GET['学号']."&GOBACK=".$_GET['GOBACK']."");

 ?>