<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

//######################�������-Ȩ�޽��鲿��##########################
SESSION_START();
require_once("lib.inc.php");
//print_R($_GET);
include("../EDU/edu_student_view_model.php");
exit;
header("Location:../EDU/edu_student_newai.php?action=".$_GET['action']."&ѧ��=".$_GET['ѧ��']."&GOBACK=".$_GET['GOBACK']."");

 ?>