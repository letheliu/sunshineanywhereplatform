<?php



$isBase64 = isBase64();
//����_GET����ת��
$isBase64==1?CheckBase64():'';
session_start();
include_once( "inc/conn.php" );
include_once( "inc/utility_all.php" );

echo "\r\n<html>\r\n<head>\r\n
<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/".$LOGIN_THEME."/style.css\">
<title>Ȩ�޹���</title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\"><script src=\"/inc/js/module.js\"></script>\r\n</head>\r\n\r\n<body class=\"bodycolor\" topmargin=\"5\">\r\n\r\n";
$query = "select * from td_edu.systemprivateinc where `FILE`='".$_GET['FileName']."' and `MODULE`='".$_GET['ModuleName']."'";
$cursor = exequery( $connection, $query );
if ( $ROW = mysql_fetch_array( $cursor ) )
{	//( [0] => 1 [ID] => 1 [1] => inc_NewStudent_priv.php [FILE] => inc_NewStudent_priv.php [2] => Ȩ�޷����趨 [MODULE] => Ȩ�޷����趨 [3] => 1, [DEPT_ID] => 1, [4] => ϵͳ������, [DEPT_NAME] => ϵͳ������, [5] => 2,4,1,3,5, [ROLE_ID] => 2,4,1,3,5, [6] => �ܾ���,���ž���,OA ����Ա,��������,ְԱ, [ROLE_NAME] => �ܾ���,���ž���,OA ����Ա,��������,ְԱ, [7] => [USER_ID] => [8] => [USER_NAME] => ) 
	//print_R($ROW);exit;
    $PRIV_DEPT  = $ROW['DEPT_ID'];
    $PRIV_ROLE  = $ROW['ROLE_ID'];
    $PRIV_USER  = $ROW['USER_ID'];
	$PRIV_DEPT_NAME  = $ROW['DEPT_NAME'];
	$PRIV_ROLE_NAME  = $ROW['ROLE_NAME'];
	$PRIV_USER_NAME  = $ROW['USER_NAME'];
	//print_R($_GET);
}
echo "\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"3\" class=\"small\">\r\n  <tr>\r\n    <td class=\"small\"><img src=\"/images/edit.gif\" WIDTH=\"22\" HEIGHT=\"20\" align=\"absmiddle\"><span class=\"big3\"> ָ��Ȩ��</span>\r\n";
echo "��ģ���Ӳ˵�Ĭ�������������û����ɷ���,�趨�ɷ�����Ա��Χ�Ժ�ֻ�����������Ա�ɷ���";
echo "    </td>\r\n  </tr>\r\n</table>\r\n\r\n<table class=\"TableBlock\" width=\"100%\" align=\"center\">\r\n  <form action=\"inc_crm_priv_user_submit.php\"  method=\"post\" name=\"form1\">\r\n   <tr>\r\n      <td nowrap class=\"TableContent\"\" align=\"center\">��Ȩ��Χ��<br>����Ա��</td>\r\n      <td class=\"TableData\">\r\n        <input type=\"hidden\" name=\"COPY_TO_ID\" value=\"";
echo $PRIV_USER;
echo "\">\r\n        <textarea cols=40 name=\"COPY_TO_NAME\" rows=6 class=\"BigStatic\" wrap=\"yes\" readonly>";
echo $PRIV_USER_NAME;
echo "</textarea>\r\n        &nbsp;<input type=\"button\" value=\"�� ��\" class=\"SmallButton\" onClick=\"SelectUser('','COPY_TO_ID','COPY_TO_NAME')\" title=\"ѡ����Ա\" name=\"button\">\r\n        &nbsp;<input type=\"button\" value=\"�� ��\" class=\"SmallButton\" onClick=\"ClearUser('COPY_TO_ID','COPY_TO_NAME')\" title=\"�����Ա\" name=\"button\">\r\n      </td>\r\n   </tr>\r\n   <tr>\r\n    <td nowrap  class=\"TableControl\" colspan=\"2\" align=\"center\">\r\n      <input type=\"hidden\" name=\"DISK_ID\" value=\"";
echo $DISK_ID;
echo "\">\r\n 

<input type=\"hidden\" name=\"ModuleName\" value=\"".$_GET['ModuleName']."\"/>
<input type=\"hidden\" name=\"FileName\" value=\"".$_GET['FileName']."\"/>
<input type=\"hidden\" name=\"FileNameSELF\" value=\"".$_GET['FileNameSELF']."\"/>
<input type=\"hidden\" name=\"FIELD_NAME\" value=\"";
echo $FIELD_NAME;
echo "\">\r\n        <input type=\"submit\" value=\"ȷ��\" class=\"BigButton\">&nbsp;&nbsp;\r\n        \r\n    </td>\r\n  </form>\r\n</table>\r\n\r\n</body>\r\n</html>\r\n";


//�ж�GET�����Ƿ�ΪBASE64���룬���Ǻܿ�ѧ����Ҫ��һ���Ľ��˺���
function isBase64()		{
	global $_SERVER;
	$QUERY_STRING = $_SERVER['QUERY_STRING'];
	$Code = base64_decode($QUERY_STRING);//print base64_decode($Code);
	$Array = explode('=',$Code);
	if(sizeof($Array)>1)		{
		return 1;
	}
	else 
		return 0;
}

//����_GET����
function CheckBase64()	{
	global $_GET,$_SERVER;
	$QUERY_STRING = $_SERVER['QUERY_STRING'];
	$QUERY_STRING_ARRAY = explode('&',$QUERY_STRING);
	$QUERY_STRING = $QUERY_STRING_ARRAY[0];
	$QUERY_STRING = base64_decode($QUERY_STRING);
	$Array = explode('&',$QUERY_STRING);
	$_GET = array();
	//�γ��µ�_GET������Ϣ
	$NewArray = array();
	for($i=0;$i<sizeof($Array);$i++)		{
		if($Array[$i]!="")		{
			$ElementArray = explode('=',$Array[$i]);
			$_GET[(String)$ElementArray[0]] = $ElementArray[1];
			$NewArray[$i] = $ElementArray[0]."=".$ElementArray[1];
		}
	}
	//����GET�����γɲ���
	for($i=1;$i<sizeof($QUERY_STRING_ARRAY);$i++)		{
		if($QUERY_STRING_ARRAY[$i]!="")		{
			$ElementArray = explode('=',$QUERY_STRING_ARRAY[$i]);
			$_GET[(String)$ElementArray[0]] = $ElementArray[1];
			$NewArray[$i] = $ElementArray[0]."=".$ElementArray[1];
		}
	}
	//�γ��µ�_SERVER������Ϣ
	$_SERVER['QUERY_STRING'] = join('&',$NewArray);	
	$_SERVER['REQUEST_URI'] = $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
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