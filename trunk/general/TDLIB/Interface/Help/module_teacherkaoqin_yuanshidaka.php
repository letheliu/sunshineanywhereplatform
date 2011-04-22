<?

if($_GET['action']==''||$_GET['action']=='init_default')		{
		$PrintText = "<BR><table class=TableBlock align=center width=100%>";
		$PrintText .= "<TR class=TableContent><td ><font color=green >
		原始打卡记录：<BR>
&nbsp;&nbsp;①就是教师每天上课下课的打卡记录，一般需要一个课堂的开始的时候打卡，结束的时候打卡,如果是两节边上,中间打一次就可以了。<BR>
&nbsp;&nbsp;②这一模块需要数字化校园和考勤机连接，具体连接方法参考“教师考勤－》考勤机”模块。
		</font></td></table>";
		print $PrintText;
}

?>