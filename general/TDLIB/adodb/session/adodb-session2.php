<?php

//ͨ�����ֻ�У԰SESSION��¼�жϲ��� 2010-8-13 17:07

function returnsession()			{
	global $db,$_SERVER,$_SESSION,$_COOKIE;

	//print_R($connection);

	session_start();
	//print_R($_COOKIE);//exit;
	//$ServerInfo = print_r($db->ServerInfo());
	//�жϵ�ǰ�汾��2009����2010
	//Array ( [PHPSESSID] => 593ca32ab7a3343c6f590904bf26d633 [USER_NAME_COOKIE] => admin [SID_1] => 2e0d5357 [UI_COOKIE] => 0 [SID_10] => a76b05df )
	
	//�ж�������汾���Ƕ�����ϵͳ
	session_register("SYSTEM_IS_TD_OA");
	session_register("SYSTEM_OA_VERSION");
	$MetaDatabases = $db->MetaDatabases();
	if(in_array("TD_OA",$MetaDatabases))						{
		$_SESSION['SYSTEM_IS_TD_OA']		=	"1";
		$sql = "select TABLE_NAME from INFORMATION_SCHEMA.TABLES where TABLE_SCHEMA='TD_OA' and TABLE_NAME='session'";
		$rs = $db->CacheExecute(150,$sql);
		$rs_a = $rs->GetArray();
		//�ж�OA�汾��2010����2009		
		if($rs_a[0]['TABLE_NAME']=="session")		{
			$SYSTEM_PRE_TABLE = "TD_OA.";
			$_SESSION['SYSTEM_OA_VERSION']		=	"TDOA2010";
		}
		else	{
			$SYSTEM_PRE_TABLE = "";
			$_SESSION['SYSTEM_OA_VERSION']		=	"TDOA2009";
		}
	}
	else	{
		$_SESSION['SYSTEM_IS_TD_OA']		=	"0";
		$_SESSION['SYSTEM_OA_VERSION']		=	"";
		$SYSTEM_PRE_TABLE					= 	"";
	}

	//print_R($rs_a);
	//ǿ�Ƴ�ʼ��OA2010�汾SESSION
	//$_SESSION['LOGIN_USER_ID']="";


	//�ж��ǽ����������CRM����Լ���ҵ���
	session_register("SYSTEM_EDU_CRM_WUYE");
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	array_pop($PHP_SELF_ARRAY);
	array_shift($PHP_SELF_ARRAY);
	//print_R($PHP_SELF_ARRAY);
	if(in_array("TDLIB",$PHP_SELF_ARRAY))		{
		$_SESSION['SYSTEM_EDU_CRM_WUYE']		=	"TDLIB";
	}
	elseif(in_array("EDU",$PHP_SELF_ARRAY))		{
		$_SESSION['SYSTEM_EDU_CRM_WUYE']		=	"EDU";
	}
	elseif(in_array("WUYE",$PHP_SELF_ARRAY))		{
		$_SESSION['SYSTEM_EDU_CRM_WUYE']		=	"WUYE";
	}

	if(
		(
			$_SESSION['LOGIN_USER_ID']==""||
			($_SESSION['LOGIN_PHPSESSID']!=$_COOKIE['PHPSESSID']&&$_SESSION['LOGIN_PHPSESSID']!="")||
			($_COOKIE['OA_USER_ID']!=$_SESSION['LOGIN_USER_ID'])

		)
		&&$_COOKIE['PHPSESSID']!=""
		&&$_SESSION['SYSTEM_OA_VERSION']=="TDOA2010"
		)		{
		global $SYSTEM_ADD_STRIP;
		//2010�汾,����ע������Ҫ����
		session_register("LOGIN_UID");
		session_register("LOGIN_USER_ID");
		session_register("LOGIN_DEPT_ID");
		session_register("LOGIN_USER_PRIV");
		session_register("LOGIN_THEME");
		session_register("LOGIN_USER_NAME");
		session_register("LOGIN_USER_PRIV_OTHER");
		session_register("LOGIN_PHPSESSID");

		$SYSTEM_PRE_TABLE = "TD_OA.";
		if($_SESSION['SYSTEM_OA_VERSION']=="TDOA2010")		{
			$sql = "select SESS_DATA from ".$SYSTEM_PRE_TABLE."session where SESS_ID='".$_COOKIE['PHPSESSID']."'";
			$rs = $db->CacheExecute(150,$sql);
			$rs_a = $rs->GetArray();
			$SESS_DATA = $rs_a[0]['SESS_DATA'];
			$SESS_DATA_ARRAY = explode(';',$SESS_DATA);
			for($i=0;$i<sizeof($SESS_DATA_ARRAY);$i++)						{
				$INDEX_NAME_ARRAY	= explode('|',$SESS_DATA_ARRAY[$i]);
				$KEY_NAME			= $INDEX_NAME_ARRAY[0];
				$VALUES_ARRAY		= array();
				$VALUES_ARRAY		= explode(':',$INDEX_NAME_ARRAY[1]);
				//print_R($VALUES_ARRAY);
				$VALUE_NAME			= array_pop($VALUES_ARRAY);
				if(substr($VALUE_NAME,0,1)=='"')				{
					$VALUE_NAME = substr($VALUE_NAME,1,-1);
				}
				$_SESSION[$KEY_NAME] = $VALUE_NAME;
			}
			$_COOKIE['OA_USER_ID']			= $_SESSION['LOGIN_USER_ID'];
			$_SESSION['LOGIN_PHPSESSID']	= $_COOKIE['PHPSESSID'];
			//print_R($_SESSION);exit;
			$sql = "select * from ".$SYSTEM_PRE_TABLE."user where USER_ID='".$_COOKIE['OA_USER_ID']."'";
			$rs = $db->CacheExecute(150,$sql);
			$rs_a = $rs->GetArray();
			//print_R($_SESSION);exit;
			$_SESSION['LOGIN_UID']		=	$rs_a[0]['UID'];
			$_SESSION['LOGIN_USER_ID']	=	$rs_a[0]['USER_ID'];
			$_SESSION['LOGIN_DEPT_ID']	=	$rs_a[0]['DEPT_ID'];
			$_SESSION['LOGIN_USER_PRIV']=	$rs_a[0]['USER_PRIV'];
			//ͨ����2011-02-24�ٴθ���SESSION������ʹ�ù淶,�����������
			if($_SESSION['LOGIN_THEME']=='')									{
				$_SESSION['LOGIN_THEME']	=	$rs_a[0]['THEME'];
			}
			$_SESSION['LOGIN_USER_NAME']=	$rs_a[0]['USER_NAME'];
			$_SESSION['LOGIN_USER_PRIV_OTHER']=	$rs_a[0]['USER_PRIV_OTHER'];
		}
		//print_R($_SESSION);
	}
	else	{
		//2009�汾,����ִ��
	}
	//exit;
	session_register("SUNSHINE_USER_ID");
	session_register("SUNSHINE_USER_NAME");
	session_register("SUNSHINE_USER_DEPT");
	session_register("SUNSHINE_USER_PRIV");
	session_register("SUNSHINE_USER_LOGIN_THEME");
	session_register("SUNSHINE_USER_AVATAR");
	session_register("SUNSHINE_USER_NICK_NAME");
	session_register("SUNSHINE_BANJI_LIST");
	session_register("SUNSHINE_REGISTER_XI");
	session_register("SUNSHINE_MYSQL_VERSION");
	session_register("SUNSHINE_TEST_SYSTEM");
	session_register("SUNSHINE_COPY_TIME");
	//session_register("LOGIN_USER_PRIV_OTHER");

	$_SESSION['SUNSHINE_USER_ID']		=$_SESSION['LOGIN_UID'];
	$_SESSION['SUNSHINE_USER_NAME']		=$_SESSION['LOGIN_USER_ID'];
	$_SESSION['SUNSHINE_USER_DEPT']		=$_SESSION['LOGIN_DEPT_ID'];
	$_SESSION['SUNSHINE_USER_PRIV']		=$_SESSION['LOGIN_USER_PRIV'];
	$_SESSION['SUNSHINE_USER_LOGIN_THEME']=$_SESSION['LOGIN_THEME'];
	$_SESSION['SUNSHINE_USER_AVATAR']	=$_SESSION['LOGIN_AVATAR'];
	$_SESSION['SUNSHINE_USER_NICK_NAME']=$_SESSION['LOGIN_USER_NAME'];
	if($_SESSION['SUNSHINE_COPY_TIME']=="")	$_SESSION['SUNSHINE_COPY_TIME']=time();

	$sql = "select USER_PRIV_OTHER from ".$SYSTEM_PRE_TABLE."user where USER_ID='".TRIM($_SESSION['LOGIN_USER_ID'])."'";
	$rsXX = $db->CacheExecute(15,$sql);
	$_SESSION['LOGIN_USER_PRIV_OTHER']	= $rsXX->fields['USER_PRIV_OTHER'];


	//print_R($_COOKIE);print_R($_SESSION);exit;
	//��ʾרҵ����ϵ������
	if(is_file($_SERVER['DOCUMENT_ROOT']."/general/EDU/Interface/EDU/SCHOOL_MODEL.ini"))				{
		$SCHOOL_MODEL = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/general/EDU/Interface/EDU/SCHOOL_MODEL.ini");
		$SCHOOL_MODEL_TEXT = TRIM($SCHOOL_MODEL['SCHOOL_MODEL']);
		if($SCHOOL_MODEL_TEXT=="1")			{
			$_SESSION['SUNSHINE_REGISTER_XI'] = "Ժϵ";
		}
		else if($SCHOOL_MODEL_TEXT=="2")	{
			$_SESSION['SUNSHINE_REGISTER_XI'] = "רҵ��";
		}
		else	{
			$_SESSION['SUNSHINE_REGISTER_XI'] = "";
		}
	}//print_R($SCHOOL_MODEL_TEXT);exit;
	//MYSQL 4 �� 5���������
	//$ServerInfo = $db->ServerInfo();
	//$mysql_version = $ServerInfo['version'];
	//$_SESSION['SUNSHINE_MYSQL_VERSION'] = $mysql_version;
	//�Ƿ���ʾ�����SQL
	//$_SESSION['SUNSHINE_TEST_SYSTEM'] = 1;
	/* 2010-10-18 ���ִ˹���Ӱ��߼��������ֵĵ�������,��Ӧ��������,���Խ���ȡ���˹���
	//�˲���������֤�ֹ�У��Ȩ�޺�רҵ�ƿƳ�Ȩ���Լ�רҵ�Ƹ��Ƴ�Ȩ��
	$LOGIN_USER_NAME = $_SESSION['LOGIN_USER_NAME'];
	$sql = "select COUNT(*) AS XIAOQU_NUM from edu_xiaoqu where (
					У��='$LOGIN_USER_NAME' or
					�ֹ�У��һ='$LOGIN_USER_NAME' or
					�ֹ�У����='$LOGIN_USER_NAME' or
					�ֹ�У����='$LOGIN_USER_NAME' or
					�ֹ�У����='$LOGIN_USER_NAME'
					)";
	//print $sql;
	$rs = $db->CacheExecute(150,$sql);
	$XIAOQU_NUM = $rs->fields['XIAOQU_NUM'];
	$����ʱ�� = date("Y-m-d");
	if($XIAOQU_NUM>0)			{
		//���ڷֹ�У��Ȩ��
		$sql = "select �༶���� from edu_banji where edu_banji.��ҵʱ��>='$����ʱ��'";
	}
	else		{
		//����רҵ�ƿƳ�Ȩ���ж�
		$sql = "select distinct edu_banji.�༶����  AS �༶����
			from edu_banji,edu_zhuanye,edu_xi
			where
			edu_banji.����ϵ=edu_xi.ϵ���� and
			edu_banji.����רҵ=edu_zhuanye.רҵ���� and
			edu_zhuanye.����ϵ=edu_xi.ϵ���� and
			edu_banji.��ҵʱ��>='$����ʱ��' and
			( edu_xi.רҵ�ƿƳ�='$LOGIN_USER_NAME' or edu_xi.רҵ�Ƹ��Ƴ�='$LOGIN_USER_NAME' )
			";
	}
	//print $sql;
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$�༶����_SHOWTEXT = array();
	for($i=0;$i<sizeof($rs_a);$i++)						{
		$�༶����_SHOWTEXT[] .= $rs_a[$i]['�༶����'];
	}
	$_SESSION['SUNSHINE_BANJI_LIST'] = join(',',$�༶����_SHOWTEXT);
	//print_R($�༶����_SHOWTEXT);
	if($_SESSION['SUNSHINE_BANJI_LIST']!="")		{
		if($_GET['���']=="")		$_GET['���'] = $_SESSION['SUNSHINE_BANJI_LIST'];
		if($_GET['�༶']=="")		$_GET['�༶'] = $_SESSION['SUNSHINE_BANJI_LIST'];
		if($_GET['�༶����']=="")	$_GET['�༶����'] = $_SESSION['SUNSHINE_BANJI_LIST'];
		if($_GET['�����༶']=="")	$_GET['�����༶'] = $_SESSION['SUNSHINE_BANJI_LIST'];
		//$_GET['ϵͳ˵��'] = " 1 �����˱���,��ʾGET����İ��,�༶,�༶����,�����༶�ȼ�������,��רҵ�ƿƳ�,�Լ����Ƴ�Ȩ��ʱ��������,����ϵͳֻ���в鿴Ȩ��; 2 ͬʱ��INI�ļ���ϵͳ���ж�action_model row_element bottom_element�ȼ��������������¶���";
	}
	//print_R($_SESSION);
	*/
	$notloginindexpage='/general/relogin.php';

	//���д������ݿ���ͬ������
	$����ʱ���� = time();
	$ʱ��� = $����ʱ���� - $_SESSION['SUNSHINE_COPY_TIME'];
	$ʱ���CEIL = ceil($ʱ���/60);
	//print $PHP_SELF_LEFT."<BR>";
	//print $PHP_SELF_BEGIN."<BR>";
	global $SYSTEM_DB_TYPE;


	if($ʱ���CEIL>10&&$SYSTEM_DB_TYPE=="MYSQL")													{
		$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
		$PHP_SELF = array_pop($PHP_SELF_ARRAY);
		$PHP_SELF_LEFT = substr($PHP_SELF,-9);
		$PHP_SELF_BEGIN = substr($PHP_SELF,0,4);
		$MetaDatabases = $db->MetaDatabases();
		if($PHP_SELF_LEFT=='_MENU.php'&&$PHP_SELF_BEGIN=='MAIN'&&in_array("TD_OA",$MetaDatabases))		{

			$sql = "DROP TABLE IF EXISTS `TD_EDU`.`user`";$db->Execute($sql);
			$sql = "create table `TD_EDU`.`user` select * from `TD_OA`.`user`";$db->Execute($sql);

			$sql = "DROP TABLE IF EXISTS `TD_EDU`.`user_priv`";$db->Execute($sql);
			$sql = "create table `TD_EDU`.`user_priv` select * from `TD_OA`.`user_priv`";$db->Execute($sql);

			$sql = "DROP TABLE IF EXISTS `TD_EDU`.`department`";$db->Execute($sql);
			$sql = "create table `TD_EDU`.`department` select * from `TD_OA`.`department`";$db->Execute($sql);

			$sql = "DROP TABLE IF EXISTS `TD_EDU`.`unit`";$db->Execute($sql);
			$sql = "create table `TD_EDU`.`unit` select * from `TD_OA`.`unit`";$db->Execute($sql);

			$sql = "DROP TABLE IF EXISTS `TD_EDU`.`sys_function`";$db->Execute($sql);
			$sql = "create table `TD_EDU`.`sys_function` select * from `TD_OA`.`sys_function`";$db->Execute($sql);

			$sql = "DROP TABLE IF EXISTS `TD_EDU`.`sys_menu`";$db->Execute($sql);
			$sql = "create table `TD_EDU`.`sys_menu` select * from `TD_OA`.`sys_menu`";$db->Execute($sql);

			//���±��ʱ��
			$_SESSION['SUNSHINE_COPY_TIME'] = time();

		}

	}

	//print_R($_SESSION);exit;

	//���³�ʼ������,Ӧ��REGISTER_GLOBALSΪOFFʱ���
	global $LOGIN_THEME;
	$LOGIN_THEME = $_SESSION['LOGIN_THEME'];
	global $LOGIN_USER_ID;
	$LOGIN_USER_ID = $_SESSION['LOGIN_USER_ID'];
	global $LOGIN_USER_NAME;
	$LOGIN_USER_NAME = $_SESSION['LOGIN_USER_NAME'];

	if(TRIM($_SESSION['LOGIN_USER_ID'])=="")	{
		echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=$notloginindexpage'>\n";
	}
	else	{
		return $GLOBAL_SESSION;
	}
	exit;
}

function returnsession2($key="")		{

}


function returnSessKey()	{
	/*
	global $_SERVER;
	$HTTP_COOKIE=$_SERVER['HTTP_COOKIE'];
	$array=explode(' ',$HTTP_COOKIE);
	for($i=0;$i<sizeof($array);$i++)		{
		$array_element=explode('=',$array[$i]);
		$PHPSESSID[(String)$array_element[0]] = $array_element[1];
	}
	$SESSKEY=$PHPSESSID['PHPSESSID'];
	if(substr($SESSKEY,strlen($SESSKEY)-1,strlen($SESSKEY))==";")	{
			$SESSKEY=substr($SESSKEY,0,strlen($SESSKEY)-1);
	}
	return $SESSKEY;
	*/
}

?>