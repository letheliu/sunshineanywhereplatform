<?

$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
$PHP_SELF_FILE = @array_pop($PHP_SELF_ARRAY);
if($PHP_SELF_FILE=="1.php")		{
	//�Ƿ�ִ��
	print "�Ƿ�ִ��";exit;
}

$EXPORT_DATE = Date("Y-m-d-H-i");

if(is_file("../index.php"))        {
    require_once('../general/TDLIB/include.inc.php');
    $sql = "../general/TDLIB/databackup/sunshine20CRM.sql";
}
else if(is_file("general/TDLIB/include.inc.php"))        {
    require_once('general/TDLIB/include.inc.php');
    $sql = "general/TDLIB/databackup/sunshine20CRM.sql";
}
//print_R($_SESSION);
//print_R($sql);exit;
//


//exit;


if(is_file($sql))    {
		global $_SESSION,$db;
		$SUNSHINE_MYSQL_VERSION = $_SESSION['SUNSHINE_MYSQL_VERSION'];
		if($SUNSHINE_MYSQL_VERSION=="")				{
			$ServerInfo = $db->ServerInfo();
			$_SESSION['SUNSHINE_MYSQL_VERSION'] = $ServerInfo['version'];
			$SUNSHINE_MYSQL_VERSION = $_SESSION['SUNSHINE_MYSQL_VERSION'];
		}//�õ�MYSQL VERSION��ֵ
		if($SUNSHINE_MYSQL_VERSION>='5.0.0')				{
			//MYSQL 4�汾,����ִ��SET NAMES GBK�Ȳ���
			$db->Execute("set names gbk");
		}
        $file = file($sql);
        $fileText = join('',$file);
        $FileArray = explode(';',$fileText);
        //print "<BR>����ִ�����ݿ���������Ժ�...";
        for($i=0;$i<sizeof($FileArray);$i++)        {
			$sql = TRIM($FileArray[$i]);
			if($sql=="SET USER PRIV ALL")		{
				$sql = "select FUNC_ID from TD_OA.sys_function";
				$rs = $db->Execute($sql);
				$rs_a = $rs->GetArray();
				$NewText = '';
				for($iX=0;$iX<sizeof($rs_a);$iX++)		{
					$FUNC_ID = $rs_a[$iX]['FUNC_ID'];
					$NewText .= "$FUNC_ID,";
				}
				$sql = "update TD_OA.user_priv set FUNC_ID_STR='$NewText' where USER_PRIV='1'";
				$rs = $db->Execute($sql);
				//print $sql;exit;
			}
			else	{
				//print "<BR>".$sql;
				//print "\n".$i;
				$rs = $db->Execute($FileArray[$i]);
				//print $rs->EOF;
				//print $sql;exit;
			}
        }
		//exit;

}
else    {
    print $sql."������";
}
//exit;

include_once( "inc/utility.php" );
include_once( "inc/conn.php" );
include_once( "inc/update.php" );
include_once( "inc/td_core.php" );
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