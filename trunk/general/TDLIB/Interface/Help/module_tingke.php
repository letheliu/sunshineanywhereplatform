<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText  = "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
&nbsp;&nbsp;在这里，你可以对教学听课各项内容进行查询和编辑操作，包括教师听课计划、教师听课考勤、教师听课日记、教师听课测评、听课工作量等内容。<BR>
听课计划申请与安排<BR>
&nbsp;&nbsp;由各教学部（专业科）负责安排本科室教师听课计划，听课教师必须按事先安排的计划进行到位听课，形成以下教学听课计划明细列表：<BR>
&nbsp;&nbsp;先有计划，教师才能进行按计划安排的时间听课。一般计划提前一周新建一次，也可以提前随时新建。<BR>
教师要听课，事先（提前一周时间）通过工作流申请，申请步骤：<BR>
&nbsp;&nbsp;听课人申请——被听课教师意见——科室审批结果——听课教师查看情况<BR>
&nbsp;&nbsp;权限分配：按科室指定选择具有权限的人员（计划明细管理的新建权限，类似行政考勤部门级管理功能），本部门管理员只能安排所管辖科室的教师听课计划。<BR>
&nbsp;&nbsp;关键技术：听课申请流程新建记录时，通过选择被听课教师的课表（14天之内），选择自动关联填写课程、班级、教室、星期、节次信息。<BR>



</font></td></table>";
	print $PrintText;
}


?>