<?
//#######################################################################################
//ͬ������ԭ�в���ϵͳ�����ֻ�У԰֮�� ԭ�в����Ǹ���ʡͳһ�·�ʹ�õĲ��񵥻��汾���
//#######################################################################################


require_once('lib.inc.php');

//���  ѧ��  ����  �༶  �ɷѽ��  �ɷ�ʱ��  �ɷ����  ��Ʊ���  ��Ʊ��֤��  �жϱ��  �ɷ���ϸ
//ͬ��MYSQL��������
$sql = "select * from edu_caiwutemp where �жϱ��!='1' order by ���";
$rs = $db->SelectLimit($sql,300);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$���		= $rs_a[$i]['���'];;
	$ѧ��		= $rs_a[$i]['ѧ��'];;
	$����		= $rs_a[$i]['����'];;
	$�༶		= $rs_a[$i]['�༶'];;
	$�ɷѽ��		= $rs_a[$i]['�ɷѽ��'];;
	$�ɷ�ʱ��		= $rs_a[$i]['�ɷ�ʱ��'];;
	$�ɷ����		= $rs_a[$i]['�ɷ����'];;
	$��Ʊ���		= $rs_a[$i]['��Ʊ���'];;
	$��Ʊ��֤��		= $rs_a[$i]['��Ʊ��֤��'];;
	$�жϱ��		= $rs_a[$i]['�жϱ��'];;
	$�ɷ���ϸ		= $rs_a[$i]['�ɷ���ϸ'];;
	$רҵ���� = returntablefield("edu_banji","�༶����",$�༶,"����רҵ");
	$רҵ���� = returntablefield("edu_zhuanye","רҵ����",$רҵ����,"רҵ����");
	ѧ�������ɷ��Զ��ۿ��($ѧ��,$����,$�༶,$רҵ����,$�ɷ����,$�ɷѽ��,$��Ʊ���,$�ɷ�ʱ��,$��Ʊ��֤��);
	$sql = "update edu_caiwutemp set �жϱ��='1' where ���='$���'";
	$db->Execute($sql);
	print $sql."<BR>";

}




//#######################################################################################
//ʹ��MSSQL�������Ӳ��ִ���-��ʼ
//#######################################################################################

$MS_localhost	= "10.105.140.83";
$MS_userdb_name = "cwk";
$MS_userdb_pwd	= "heartsea0038";
$MS_userdb		= "BS_2010";


//ͬ��MSSQL���ݿ�����
require_once('../../adodb/adodb.inc.php');
$msdb =&ADONewConnection('odbc_mssql');
$dsn = "Driver={SQL Server};Server=$MS_localhost;Database=$MS_userdb;";
$msdb->Connect($dsn,$MS_userdb_name,$MS_userdb_pwd) or die("SQL SERVER����ʧ��,��ȷ��������Ϣ�Ƿ���ȷ.����:$MS_localhost ������:$MS_userdb ��¼�û�:$MS_userdb_name ����:$MS_userdb_pwd");
$MetaTables = $msdb->MetaTables();
//print_R($MetaTables);//exit;

//MS���涨��ĺ���
function returnTableFieldMS($tablename,$what,$value,$return)		{
	global $msdb;
	$sql="select $return from $tablename where $what='$value'";//print $sql."<BR>";//exit;
	$msdbRS=$msdb->Execute($sql);
	return trim($msdbRS->fields[$return]);
}


//#######################################################################################
//#######################################################################################
//#######################################################################################
//�ӿ��ڻ�ͬ������
page_css("ͬ������");

if(1)					{
$sql = "select max(���) AS NUM from edu_caiwutemp";
$rs = $db->SelectLimit($sql,30);
print $����� = (int)$rs->fields['NUM'];

//��ȡ�����õ�����,��ɾ��,������ʱû���õ���Ч����
$sql = "select * from T001_Nk_Kp_Pj1 where F_Lx='002001001' and F_Qt1!='' and (F_Qt1 like '%082900%' or F_Qt1 like '%092964%' or F_Qt1 like '%102964%') and F_ID>'$�����' and F_Date>='20101019'";
$msdbRS = $msdb->SelectLimit($sql,3000);
$msdbRSA = $msdbRS->GetArray();
$TempArray = array();
print $sql;

//print_R($msdbRSA);exit;
//���´���ԭ����MANANGE�������,����뱾ҳ��,�����������һ����ʾ������ȷ������

//�Զ�����������
for($i=0;$i<sizeof($msdbRSA);$i++)				{
	$ѧ��		= $msdbRSA[$i]['F_Qt1'];;
	$����		= returntablefield("edu_student","ѧ��",$ѧ��,"����");
	$�༶		= returntablefield("edu_student","ѧ��",$ѧ��,"���");
	$�ɷѽ��	= $msdbRSA[$i]['F_Je'];
	$�ɷ�ʱ��   = substr($msdbRSA[$i]['F_Date'],0,4)."-".substr($msdbRSA[$i]['F_Date'],4,2)."-".substr($msdbRSA[$i]['F_Date'],6,2);
	$�ɷ����	= $msdbRSA[$i]['F_Year'];
	$��Ʊ���	= $msdbRSA[$i]['F_Bh'];
	$��Ʊ��֤�� = $msdbRSA[$i]['F_Reg'].$msdbRSA[$i]['F_Key'];

	$�жϱ��   = $msdbRSA[$i]['F_ID'];
	//$�ɷ���ϸ   = $msdbRSA[$i]['F_ID'];

	//��ϸ
	$sql = "select * from T001_Nk_Kp_Pj2 where F_ID='$�жϱ��'";
	$msdbRS = $msdb->Execute($sql);
	$msdb2RSA = $msdbRS->GetArray();
	$�ɷ���ϸ = '';
	for($ic=0;$ic<sizeof($msdb2RSA);$ic++)				{
		$��ϸ���  = $msdb2RSA[$ic]['F_Je'];;
		$��ϸ����  = $msdb2RSA[$ic]['F_XmMc'];;
		$�ɷ���ϸ .= "$��ϸ����:$��ϸ���||";
	}


	$sql = "select COUNT(*) AS NUM from edu_caiwutemp where �жϱ��='$�жϱ��'";
	$msdbRS = $msdb->Execute($sql);
	$NUM = $msdbRS->fields['NUM'];

	if($NUM=='')				{
		$sql = "insert into edu_caiwutemp values('$�жϱ��','$ѧ��','$����','$�༶','$�ɷѽ��','$�ɷ�ʱ��','$�ɷ����','$��Ʊ���','$��Ʊ��֤��','$�жϱ��','$�ɷ���ϸ')";
		$db->Execute($sql);
		$InsertData++;
	}
	else	{
		//�˿���Ϊ��Ч����
		//print "<font color=red>����:$���� Ϊ��Ч����,�޷����û����ж�Ӧ��ʦ��Ϣ.<BR>";
		$InsertData2++;
	}
}
//print_R($msdbRSA);
$Text = "�������ݽ����ϸ: �ɹ�ƥ������:".(int)$InsertData."��,��Ч����:".(int)$InsertData2."��";
$DateMonth = substr($��������,0,7);
//print_nouploadfile($Text,"location='?'");
print "<style type='text/css'>
	.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
</style>
<BODY class=bodycolor topMargin=5 >
<BR>
<table width='450'  border='0' align='center' cellpadding='0' cellspacing='0' class='small' style='border:1px solid #006699;'>
<tr>
<td height='80' valign=middle align='middle' colspan=2  bgcolor='#E0F2FC'>
<font color=red >$Text<BR><BR><input type=button accesskey='c' name='cancel' value=' �� �� ' class=BigButton onClick=\"location='edu_teacherkaoqinmingxi_automake.php'\" title='��ݼ�:ALT+c'></font>
</td>
</tr>
<tr>
</table>";

//exit;
}

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