<?php
	require_once("lib.inc.php");
	
	$GLOBAL_SESSION=returnsession();

	$common_html=returnsystemlang('common_html');
	$_GET['action']=checkreadaction('init_customer');
	
	if($_GET['action']=="")		{
		$sql = "update fixedasset set ����״̬='����δ����' where ����״̬=''";
		$db->Execute($sql);
		$sql = "update fixedasset set ���=����*����";
		$db->Execute($sql);
	}

	$_GET['����״̬'] = "����δ����,�����ѷ���,�ʲ��ѷ���,�ʲ����黹";//�ʲ�������
	$_GET['searchfield'] = '�ʲ�����';
	$_GET['searchvalue'] = $_GET['�ʲ�����'];
	$_GET['action'] = 'init_customer_search';
	
	

	//$NEWAIINIT_VALUE_SYSTEM = "select `���`,`�ʲ����`,`�ʲ�����`,`�ʲ�����`,`����ͺ�`,`����״̬`,`��λ`,`����`,`����`,`���`,`��Ʊ����`,`��������`,`ʹ����Ա`,`��������`,`�ʲ����`,`ƾ֤����`,`��ŵص�`,`��ע`,`������`,`����ʱ��` from fixedasset where (`����״̬`='����δ����' or `����״̬`='�����ѷ���' or `����״̬`='�ʲ��ѷ���' or `����״̬`='�ʲ����黹') order by ��� desc";
	//$NEWAIINIT_VALUE_SYSTEM_NUM = "select count(`���`) as num from fixedasset where (`����״̬`='����δ����' or `����״̬`='�����ѷ���' or `����״̬`='�ʲ��ѷ���' or `����״̬`='�ʲ����黹')";
	//print_R($_GET);

	$filetablename='fixedasset';
	$parse_filename = "fixedasset_pici_details";
	
	//$_GET['action']  = 'init_customer';
	require_once('include.inc.php');
	print "<BR>";
	print_close();
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