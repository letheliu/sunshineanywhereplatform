<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText  = "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
学籍异动说明：<BR>
&nbsp;&nbsp;如果学生发现学籍异动，导致学生处于退学，开除，转学，休学等状态，那么学生将不能登录教务系统学生端，教师和班主任在管理自己所带班级时也将不显示处理异动状态的学生。<BR>
&nbsp;&nbsp;转班异动由于异动完成以后，学生还处于正常状态，所以转班异动不在上面描述之列。<BR>



</font></td></table>";
	print $PrintText;
}


?>