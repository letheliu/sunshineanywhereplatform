<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once("lib.inc.php");
//��BASE64�������֮��,SESSION����USER_ID����֮ǰ
$USER_ID = $_GET['USER_ID'];
//��λ�ò��ܸĶ�

$GLOBAL_SESSION=returnsession();

//print_R($_GET);

page_css("�༶��Ϣ����");

if($USER_ID=='')		{
	print_infor("���������˵���ѡ��Ҫ���ĵ���Ϣ!");
	exit;
}


$USER_NAME = returntablefield("user","USER_ID",$_GET['USER_ID'],"USER_NAME");

table_begin("100%");
print "<tr class=TableHeader><td colspan=4>&nbsp;��ǰ�û�:".$USER_NAME." ��ѡ����������,�鿴��ͬ��ģ����Ϣ</td></tr>";

print "<tr class=TableData>
<td colspan=1>&nbsp;��ѧ�����ѯ:</td>
<td colspan=3>
&nbsp;<a href=\"../EDU/edu_teacherkaoqin_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>ԭʼ������</a>
&nbsp;<a href=\"../EDU/edu_teacherkaoqinmingxi_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>��������</a>
&nbsp;<a href=\"../EDU/edu_teacherjiaoxueriji_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>��ѧ�ռ�</a>

&nbsp;<a href=\"../EDU/edu_teacherkaoqin_static.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>��������ͳ��</a>
&nbsp;<a href=\"../EDU/edu_scheduletiaoke_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>���μ�¼</a>
&nbsp;<a href=\"../EDU/edu_scheduledaike_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>���μ�¼</a>
<BR>
&nbsp;<a href=\"../EDU/edu_teacherkaoqinbudeng_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>���ڲ���</a>
&nbsp;<a href=\"../EDU/edu_jiaoxuerijibudeng_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>�ռǲ���</a>

&nbsp;<a href=\"../EDU/edu_scheduletiaokexianghu_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>�໥����</a>
&nbsp;<a href=\"../EDU/edu_scheduletingke_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>ͣ�μ�¼</a>
&nbsp;<a href=\"../EDU/edu_schedulefuke_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>���μ�¼</a>

&nbsp;<a href=\"../EDU/edu_jiaoan_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>�̰�</a>
&nbsp;<a href=\"../EDU/school_download_newai.php?".base64_encode("ָ����Ա�û���=".$USER_ID."")."\" target=EDU_MAIN>�μ�</a>

</td>
</tr>";
//&nbsp;<a href=\"../EDU/edu_pingbixiangmu_zidingyi.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>���˻���Ӧ�ñ�׼</a>
print "<tr class=TableData>
<td colspan=1>&nbsp;�칫��Ʒ:</td>
<td colspan=3>
&nbsp;<a href=\"../officeproduct/officeproduct_my_jieyou.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>������ϸ</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_lingyou.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>������ϸ</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_guihuan.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>�黹��ϸ</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_ruku.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>�����ϸ</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_tiaoku.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>������ϸ</a>
&nbsp;<a href=\"../officeproduct/officeproduct_my_baofei.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>������ϸ</a>


</td>

</tr>";

print "<tr class=TableData>
<td colspan=1>&nbsp;�̶��ʲ�:</td>
<td colspan=3>
&nbsp;<a href=\"../fixedasset/fixedasset_my_newai.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>�����̶��ʲ�</a>
&nbsp;<a href=\"../fixedasset/my_fixedassetout_newai.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>������ϸ</a>
&nbsp;<a href=\"../fixedasset/my_fixedassettui_newai.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>�黹��ϸ</a>
&nbsp;<a href=\"../fixedasset/my_fixedassetin_newai.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>������ϸ</a>
&nbsp;<a href=\"../fixedasset/my_fixedassettiaoku_newai.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>������ϸ</a>
&nbsp;<a href=\"../fixedasset/my_fixedassetweixiu_newai.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>ά����ϸ</a>
&nbsp;<a href=\"../fixedasset/my_fixedassetbaofei_newai.php?".base64_encode("ָ����Ա=".$USER_ID."")."\" target=EDU_MAIN>������ϸ</a>


</td>

</tr>";

table_end();

//�ж���û�иý�ʦ�ĵ�����Ϣ,����о���ʾ,���û�о�ֱ������NOPAGEҳ��
$sql	= "select ��� from edu_teachermanage where �û���='".$_GET['USER_ID']."'";
$rs		= $db->CacheExecute(15,$sql);
$���   = $rs->fields['���'];
if($���!='')				{
	print "<BR><iframe name=EDU_MAIN width=100% height=100% topmargin=\"0\" leftmargin=\"0\" border=0 style=\"border:0PX\" src='../TeacherManage/teacher_chakan.php?".base64_encode("XX=XX&���=".$���."&FF=FF")."'>";
}
else	{
	print "<BR><iframe name=EDU_MAIN width=100% height=100% topmargin=\"0\" leftmargin=\"0\" border=0 style=\"border:0PX\" src='../TeacherManage/teacher_chakan_remark.php'>";
}



 ?>