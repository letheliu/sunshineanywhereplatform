<?php
	require_once("lib.inc.php");

	$GLOBAL_SESSION=returnsession();
	require_once("systemprivateinc.php");

	CheckSystemPrivate("���ڹ���-�̶��ʲ�-���ż�����");

	$common_html=returnsystemlang('common_html');

	if($_GET['action']=="")		{
		$sql = "update fixedasset set ����״̬='����δ����' where ����״̬=''";
		$db->Execute($sql);
		$sql = "update fixedasset set ���=����*����";
		$db->Execute($sql);
	}



	//###########################################
	//����ֲ��Ź���Ȩ�޲���
	//###########################################
	$SCRIPT_NAME	= "fixedasset_newai.php";
	$LOGIN_USER_ID		= $_SESSION['LOGIN_USER_ID'];
	$sql = "select * from systemprivateinc where `FILE`='$SCRIPT_NAME' and USER_ID like '%".$LOGIN_USER_ID.",%'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$MODULE_ARRAY = array();
	for($i=0;$i<sizeof($rs_a);$i++)		{
		$MODULE_ARRAY[] = $rs_a[$i]['MODULE'];
	}
	$MODULE_TEXT = join(',',$MODULE_ARRAY);
	if($MODULE_TEXT=="")  $MODULE_TEXT = "δָ��������Ϣ";
	//if($_GET['action']==""||$_GET['action']=="init_default")
	$_GET['��������'] = $MODULE_TEXT;

	$_GET['����״̬'] = "����δ����,�����ѷ���,�ʲ��ѷ���,�ʲ����黹";

	$filetablename='fixedasset';
	$parse_filename = 'fixedasset_department';
	require_once('include.inc.php');


	if($_GET['action']==''||$_GET['action']=='init_default')		{
	$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
	$PrintText .= "<TR class=TableContent><td ><font color=green >
�̶��ʲ����ż�������<BR>
&nbsp;&nbsp;1��Ȩ��˵��:��ֻ�ܹ������������ŵĹ̶��ʲ���Ϣ��<BR>
&nbsp;&nbsp;2��ʹ�÷���:����Ա�����ڹ̶��ʲ������������ʲ�����������,Ȼ���ڹ̶��ʲ�����Ȩ�޹����˵��з����ĸ��û����Թ����ĸ����ŵ��ʲ���<BR>

</font></td></table>";
	print $PrintText;
}

?><?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>