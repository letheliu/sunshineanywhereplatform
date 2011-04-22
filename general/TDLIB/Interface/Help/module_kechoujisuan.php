<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText  = "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
工作量统计说明：<BR>
&nbsp;&nbsp;第一部分：工作量统计部分，数据主要依赖于教师上课考勤数据，即由课表生成的规律教师上课数据，再加上节假日，以及教师的调课，代课，停课，复课等操作，最终形成的一个教师实际上课的天数这是最基本的数据来源。<BR>
&nbsp;&nbsp;第二部分：在此基础之上，再根据课程的新课，旧课系数，班级人数形成的系数，教师带两门以两门以上课程的系数，进行加权计算，得到教师的工作量。<BR>
&nbsp;&nbsp;第三部分：在此基础之上计算教师的教辅工作量和其它工作量，最后进行汇总。<BR>
解释：<BR>
&nbsp;&nbsp;其它工作量指的是有周次属性的工作量，一般指临时性的加班等操作。<BR>
&nbsp;&nbsp;教辅教学工作量指的是每学期基本上面一次的工作量，如改考试卷子，监考工作等。<BR>
&nbsp;&nbsp;第四部分：计算完成教师的工作量之后，根据教师所在的部门信息，进行统计部门（系或科）的工作量统计。<BR>

</font></td></table>";
	print $PrintText;
}


?>