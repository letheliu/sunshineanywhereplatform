<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once("lib.inc.php");
//在BASE64编码解码之后,SESSION重置班号变量之前
$班号 = $_GET['班号'];
//此位置不能改动

$GLOBAL_SESSION=returnsession();

page_css("班级信息查阅");

if($班号=='')		{
	print_infor("请先在左侧菜单栏选择要查阅的班级信息!");
	exit;
}

table_begin("100%");
print "<tr class=TableHeader><td colspan=10>&nbsp;当前班级:".$班号." 请选择以下链接,查看不同的模块信息</td></tr>";

print "<tr class=TableData>
<td colspan=1 nowrap>
				&nbsp;<a href=\"../Teacher/school_notify_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班级通知</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_meizhoubeiwang1_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>工作重点</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_evaluateclass_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班级创百分明细</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_banjichuangbaifen_tongji.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班级创百分统计</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_banjichuangbaifen_paiming.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班级创百分排名</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_ketangjilv_main.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>学生课堂纪律</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_studentkaoqin.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>考勤审核情况</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_studentkaoqin_tongji.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>学生考勤统计</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_kechengbiao.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班级课程表</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_banweiguanli_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班委管理</a>

</td></tr><tr class=TableData><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_liusu_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>周末留宿管理</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_student_dorm.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>宿舍管理</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_student_dorm_view.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>宿舍分配</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_wangui_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>学生未归</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_weizhang_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>宿舍违纪</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_susheweisheng_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>宿舍检查</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_wenmingsushe_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>文明宿舍</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_evaluatepersonal_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>个人积分管理</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_evaluatepersonalbj.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>个人积分统计</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_pingbixiangmu_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班级自定义标准</a>
</td></tr><tr class=TableData><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_pingbixiangmu_xuexiao.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>学校个人积分标准</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_tanhuajilu_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>谈话管理</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_tanhuajilu_genzong.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>后续跟踪</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_weijihuizong_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>综治违纪统计</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_weijihuizong2_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>学生科违纪统计</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_weizhangxinxi_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>宿舍违纪统计</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_WeiJiHuiZong.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>违纪统计汇总</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_zuoweishezhi.php?".base64_encode("action=see&班级名称=".$班号."")."\" target=EDU_MAIN>座位情况查看</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_jiaofei.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>缴费情况</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_banfeiguanli_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班费管理</a>
</td></tr><tr class=TableData><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_banjihuodong_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>班级活动</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/wygl_weixiupingjia.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>维修评价</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_student_banzhuren_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>学生档案管理</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_qimopingyu_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>期末评语管理</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_jiafang_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>家校联系管理</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_guojiazhuxuejin.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>奖助学金</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_biyegenzong.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>毕业跟踪管理</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_biyejianding_newai.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>毕业鉴定管理</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_xueshengxinxitongji.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>学生信息统计</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/Exam_class_change_university.php?".base64_encode("指定班号=".$班号."")."\" target=EDU_MAIN>学生成绩管理</a>
</td>
</tr>";



table_end();

print "<BR><iframe name=EDU_MAIN width=100% height=100% style=\"border:0PX\" src='nopage.php'>";




 ?>