<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once("lib.inc.php");
//��BASE64�������֮��,SESSION���ð�ű���֮ǰ
$��� = $_GET['���'];
//��λ�ò��ܸĶ�

$GLOBAL_SESSION=returnsession();

page_css("�༶��Ϣ����");

if($���=='')		{
	print_infor("���������˵���ѡ��Ҫ���ĵİ༶��Ϣ!");
	exit;
}

table_begin("100%");
print "<tr class=TableHeader><td colspan=10>&nbsp;��ǰ�༶:".$���." ��ѡ����������,�鿴��ͬ��ģ����Ϣ</td></tr>";

print "<tr class=TableData>
<td colspan=1 nowrap>
				&nbsp;<a href=\"../Teacher/school_notify_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�༶֪ͨ</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_meizhoubeiwang1_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�����ص�</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_evaluateclass_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�༶���ٷ���ϸ</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_banjichuangbaifen_tongji.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�༶���ٷ�ͳ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_banjichuangbaifen_paiming.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�༶���ٷ�����</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_ketangjilv_main.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ѧ�����ü���</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_studentkaoqin.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>����������</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_studentkaoqin_tongji.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ѧ������ͳ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_kechengbiao.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�༶�γ̱�</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_banweiguanli_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��ί����</a>

</td></tr><tr class=TableData><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_liusu_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��ĩ���޹���</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_student_dorm.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�������</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_student_dorm_view.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�������</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_wangui_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ѧ��δ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_weizhang_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>����Υ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_susheweisheng_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>������</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/dorm_wenmingsushe_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��������</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_evaluatepersonal_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>���˻��ֹ���</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_evaluatepersonalbj.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>���˻���ͳ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_pingbixiangmu_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�༶�Զ����׼</a>
</td></tr><tr class=TableData><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_pingbixiangmu_xuexiao.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ѧУ���˻��ֱ�׼</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_tanhuajilu_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN≯������</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_tanhuajilu_genzong.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��������</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_weijihuizong_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>����Υ��ͳ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_weijihuizong2_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ѧ����Υ��ͳ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_weizhangxinxi_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>����Υ��ͳ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_WeiJiHuiZong.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>Υ��ͳ�ƻ���</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_zuoweishezhi.php?".base64_encode("action=see&�༶����=".$���."")."\" target=EDU_MAIN>��λ����鿴</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_jiaofei.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�ɷ����</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_banfeiguanli_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��ѹ���</a>
</td></tr><tr class=TableData><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_banjihuodong_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>�༶�</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/wygl_weixiupingjia.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ά������</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_student_banzhuren_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ѧ����������</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_qimopingyu_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��ĩ�������</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_jiafang_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��У��ϵ����</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_guojiazhuxuejin.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>����ѧ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_biyegenzong.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��ҵ���ٹ���</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/edu_biyejianding_newai.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>��ҵ��������</a>

</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/banzhuren_xueshengxinxitongji.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ѧ����Ϣͳ��</a>
</td><td colspan=1 nowrap>&nbsp;<a href=\"../Teacher/Exam_class_change_university.php?".base64_encode("ָ�����=".$���."")."\" target=EDU_MAIN>ѧ���ɼ�����</a>
</td>
</tr>";



table_end();

print "<BR><iframe name=EDU_MAIN width=100% height=100% style=\"border:0PX\" src='nopage.php'>";




 ?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>