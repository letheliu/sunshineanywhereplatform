<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText  = "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
课堂教学评价说明：<BR>
&nbsp;&nbsp;又名教师教学评价，是学生对自己本学期的教师上课质量以及其它方面的信息进行综合评价和打分的功能模块，评价名称以及评价项目由管理员进行设定，设置完成以后，学生即可进行评价。<BR>
&nbsp;&nbsp;每个学生只能对自己所上课程的教师进行评价，不能评价其它未上课教师。系统根据教学计划里面的设置，得到学生所在班级在某一学期所上课程列表以及所带教师名称列表。<BR>
&nbsp;&nbsp;计算方法：根据学生输入的评价分数，根据一定的计算方法，进行加权计算，最终得到一个相对公平的评价结果。<BR>


</font></td></table>";
	print $PrintText;
}


?>