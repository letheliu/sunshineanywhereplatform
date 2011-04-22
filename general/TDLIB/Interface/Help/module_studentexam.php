<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText  = "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
学生成绩管理说明：<BR>
&nbsp;&nbsp;凡考试不及格的学生，需要参加补考，补考不及格者需要参加重修，重修还没有及格者不能取得这门课程的学分。<BR>
学生学分信息如何查询：<BR>
&nbsp;&nbsp;在学籍管理部分，点击任一学生的查看页面，到成绩学分卡页面，上面显示该学生在校每个学期期间，每一门课程的得分情况以及学分情况。<BR>




</font></td></table>";
	print $PrintText;
}


?>