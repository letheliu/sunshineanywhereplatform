<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

//header("Content-Type:text/html;charset=gbk");
//######################�������-Ȩ�޽��鲿��##########################
require_once("lib.inc.php");
require_once("lib.xingzheng.inc.php");
$GLOBAL_SESSION=returnsession();
require_once("systemprivateinc.php");
//CheckSystemPrivate("�������-�ճ���ѧ����-��ʦ����");
//######################�������-Ȩ�޽��鲿��##########################


//����:ֻ����ͬ�����ڻ����ݵ�edu_teacherkaoqin��,ע:�����ڽ�ʦ������ʵ��,�˴����ڱ���ʹ��
//2010-2-26�޸�

$CurXueQi = returntablefield("edu_xueqiexec","��ǰѧ��",'1',"ѧ������");

$�������ݱ����� = "as_record";
$���ڱ�_�û���ʶ�ֶ� = "CustomerID";
$���ڱ�_ˢ��ʱ���ֶ� = "OpDT";
$���ڱ�_��EKY = "ID";
$���ڱ�_���ڻ�IDֵ = "TermID";




/*

TRUNCATE TABLE `edu_xingzheng_kaoqinmingxi` ;
TRUNCATE TABLE `edu_teacherkaoqin` ;

*/

//�õ�����MYSQL�������һ�ο��ڼ�¼ID��ֵ
$sql = "select max(���ڻ�IDֵ) AS ��� from edu_teacherkaoqin";
$rs = $db->Execute($sql);
$���һ�ο��ڼ�¼ID��ֵ = $rs->fields['���'];
if($���һ�ο��ڼ�¼ID��ֵ>0)		 $AddSqlKaoQinJiText = "where $���ڱ�_��EKY>'$���һ�ο��ڼ�¼ID��ֵ'";
else	$AddSqlKaoQinJiText = "";





//#######################################################################################
//ʹ��MSSQL�������Ӳ��ִ���-��ʼ
//#######################################################################################

require_once('../../config_mssql_teacherkaoqin.php');
//$conn=mssql_connect($MS_localhost,$MS_userdb_name,$MS_userdb_pwd) or die("FAILED!") ;
//exit;
if($MS_userdb=="KQXT"&&$MS_userdb_name=="sa"&&$MS_userdb_pwd=="sa")		{
	page_css("�Զ�����Ƿ�װMSSQL���ݿ���Ϣ");
	print_infor("���ķ�����û�м�⵽���ڻ�SQL SERVER���ݿ���Ϣ,��ȷ��װ��ָ���ͺŵĿ��ڻ����ͺ����ݿ���ٽ��ж�ȡ������Ϣ����",'?',"location='?'");
	exit;
}
require_once('../../adodb/adodb.inc.php');
$msdb =&ADONewConnection('odbc_mssql');
$dsn = "Driver={SQL Server};Server=$MS_localhost;Database=$MS_userdb;";
$msdb->Connect($dsn,$MS_userdb_name,$MS_userdb_pwd) or die("SQL SERVER����ʧ��,��ȷ��������Ϣ�Ƿ���ȷ.����:$MS_localhost ������:$MS_userdb ��¼�û�:$MS_userdb_name ����:$MS_userdb_pwd");
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
page_css("�ӿ��ڻ�ͬ������-������Ա�򿨿���");

if($_GET['action']=="")					{

print "
<BR><form name=form2 method=post action='?action=DataDeal'>
<table class=TableBlock align=center width=100% >
<TR class=TableHeader ><TD noWrap colspan=5>�ӿ��ڻ�ͬ������-������Ա�򿨿���</td></tr>
";

$sql="select count($���ڱ�_��EKY) AS NUM from $�������ݱ����� $AddSqlKaoQinJiText ";//print $sql."<BR>";exit;
$msdbRS=$msdb->Execute($sql);
$msdbRSA = $msdbRS->GetArray();
$���п��ڻ�δ���������� = $msdbRSA[0]['NUM'];
if($���п��ڻ�δ����������==0)		{
	$���п��ڻ�δ����������ReadOnly = "disabled";
	$���п��ڻ�δ����������Text = "<font color=red>���������µĿ�������,��ȷ�����ڻ����������µĿ�������</font>";
}
print "<TR class=TableData height=30>
	<TD noWrap align=left>
	&nbsp;���п��ڻ�δ����������:&nbsp;<font color=red><B>$���п��ڻ�δ����������</B></font>&nbsp;��
	<input type=hidden class=BigButton name=action value='DATESEARCH'>
	<input type=submit class=BigButton name=submit $���п��ڻ�δ����������ReadOnly value='��ʼͬ����������'>&nbsp;&nbsp;$���п��ڻ�δ����������Text
	</td></tr>";
print "<TR class=TableData colspan=5>
	<TD noWrap align=left>&nbsp;���һ�ο��ڼ�¼ID��ֵ:$���һ�ο��ڼ�¼ID��ֵ</td>";
print "</table></form><BR>";

exit;

}


if($_GET['action']=="DataDeal")					{

if($���һ�ο��ڼ�¼ID��ֵ>0)		 $AddSqlKaoQinJiText = "where $���ڱ�_��EKY>'$���һ�ο��ڼ�¼ID��ֵ'";
else	$AddSqlKaoQinJiText = "";

//��ȡ�����õ�����,��ɾ��,������ʱû���õ���Ч����
$sql = "select * from $�������ݱ����� $AddSqlKaoQinJiText order by $���ڱ�_��EKY asc";
$msdbRS = $msdb->SelectLimit($sql,6000);
$msdbRSA = $msdbRS->GetArray();
$TempArray = array();

//���´���ԭ����MANANGE�������,����뱾ҳ��,�����������һ����ʾ������ȷ������
//print_R($msdbRSA);
//�Զ�����������
for($i=0;$i<sizeof($msdbRSA);$i++)				{
	$���� = $msdbRSA[$i][$���ڱ�_�û���ʶ�ֶ�];;
	$���� = returnTableFieldMS("Customer","CustomerID",$����,"OutID");
	$sou_jh = $msdbRSA[$i][$���ڱ�_�û���ʶ�ֶ�];;
	$sou_date = $msdbRSA[$i][$���ڱ�_ˢ��ʱ���ֶ�];
	$sou_date_Array = explode(' ',$sou_date);
	$���ڻ�IDֵ = $msdbRSA[$i][$���ڱ�_���ڻ�IDֵ];
	$���ڻ���¼���IDֵ = $msdbRSA[$i][$���ڱ�_��EKY];
	$�û���		= returntablefield("user","BYNAME",$����,"USER_ID");
	$��ʦ����   = returntablefield("user","BYNAME",$����,"USER_NAME");
	$�������� = $sou_date_Array[0];
	$����ʱ�� = $sou_date_Array[1];


	$����ʱ��Array = explode(':',$����ʱ��);
	array_pop($����ʱ��Array);
	$����ʱ�� = join(":",$����ʱ��Array);
	//$ˢ��ʱ�� = $DateTime;
	//print_R($msdbRSA);
	if($�û���!="")				{
		$DealTimeJieCiShangKe = DealTimeJieCiShangKe($��ʦ����,$��������,$����ʱ��);
		$DealTimeJieCiXiaKe = DealTimeJieCiXiaKe($��ʦ����,$��������,$����ʱ��);
		$InsertData++;
		$���ڻ�λ��		= returnTableFieldMS("Base_Term","TermID",$���ڻ�IDֵ,"TermName");
		$���ڻ�IP		= returnTableFieldMS("Base_Term","TermID",$���ڻ�IDֵ,"TermAddr");
		//###############################################################################
		//�ѿ�������ͬ����MYSQL���ݿ���ȥ
		$sql = "insert into edu_teacherkaoqin values('','$�û���','$��ʦ����','$��������','$����ʱ��','$���ڻ���¼���IDֵ','$���ڻ�λ��','$���ڻ�IP')";
		$db->Execute($sql);
		//print "$i - $InsertData - $���ڻ�IDֵ - ".$msdbRSA[$i]['ID']." - ".$sql."<BR>";
		if($DealTimeJieCiShangKe!="")	{
			print "<font color=green>$i - ".$DealTimeJieCiShangKe."</font>";;;
		}
		if($DealTimeJieCiXiaKe!="")	{
			print "<font color=green>$i - ".$DealTimeJieCiXiaKe."</font>";;;
		}
		//if($i>3000)exit;
	//###################################################################################
		//print "<font color=green>����:$���� Ϊ��Ч����,�ɹ�ƥ���ʦ�������� $��ʦ���� $�������� $����ʱ�� </font><BR>";
	}
	else	{
		//�˿���Ϊ��Ч����
		//print "<font color=red>����:$���� Ϊ��Ч����,�޷����û����ж�Ӧ��ʦ��Ϣ.<BR>";
		$InsertData2++;
	}
	//print $sql."<BR>";
	//$sql = "insert into edu_studentjiesong values('','$����','$��ʦ����','$����','$���','$����','$������','$����ʱ��','$�໤����Ƭ','$sou_jh');";
	//print $sql;print "<HR>";exit;
	//if($��ʦ����!=""&&$����!="")$db->Execute($sql);
}
//print_R($msdbRSA);
$Text = "�������ݽ����ϸ: �ɹ�ƥ���ʦ��������:".(int)$InsertData."��,�ǽ�ʦ��������:".(int)$InsertData2."��";
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
<font color=red >$Text<BR><BR><input type=button accesskey='c' name='cancel' value=' �� �� ' class=BigButton onClick=\"location='edu_xingzheng_kaoqinmingxi_automake.php'\" title='��ݼ�:ALT+c'></font>
</td>
</tr>
<tr>
</table>";

����ٵ����˷���������();


exit;
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