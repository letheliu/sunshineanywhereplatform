<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText  = "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
说明：<BR>
&nbsp;&nbsp;1 生管老师：就是管理学生宿舍的教师，一个教师可以管理一栋楼，也可以由多个教师管理一栋楼等。<BR>
&nbsp;&nbsp;2 每个宿舍楼需要设置楼层数和住宿的学生性别。<BR>
&nbsp;&nbsp;3 每个宿舍楼最多可以设置三个生管老师，分别指定每个生管老师所负责的楼层楼。<BR>
&nbsp;&nbsp;4 【生管老师管理宿舍房间部分】在宿舍房间管理里面，需要指定每个宿舍房间所在的学生楼和楼层数，从而可以对应找到负责的生管老师。<BR>
&nbsp;&nbsp;5 【班主任管理学生宿舍部分】每个宿舍房间里面最多可以设置八个所属班级，从而可以使班主任可以设置自己班级下面学生所住宿的房间信息和床位信息。<BR>
&nbsp;&nbsp;6 【生管老师日常事务管理部分】生管老师分配的菜单是在学生管理-》学生宿舍-》日常事务管理菜单，下属功能：房间信息管理，周末留宿明细，周末回家统计，周末回家明细，学生未归管理，学生违纪管理，宿舍检查评比，文明宿舍评比，宿舍检查统计，文明宿舍统计等功能。<BR>



</font></td></table>";
	print $PrintText;
}


?>