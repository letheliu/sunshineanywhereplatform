<?php


include_once( "inc/conn.php" );
echo "\r\n<html>\r\n<head>\r\n<title></title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">\r\n</head>\r\n\r\n<body class=\"bodycolor\" topmargin=\"5\">\r\n\r\n";
	

	$FILE = $_POST['FileName'];
	$MODULE = $_POST['ModuleName'];
	$DEPT_ID = $_POST['TO_ID'];
	$DEPT_NAME = $_POST['TO_NAME'];
	$USER_ID = $_POST['COPY_TO_ID'];
	$USER_NAME = $_POST['COPY_TO_NAME'];
	$ROLE_ID = $_POST['PRIV_ID'];
	$ROLE_NAME = $_POST['PRIV_NAME'];
	$FileNameSELF = $_POST['FileNameSELF'];
	
	//print_R($_POST);exit;

	$query1 = "select MODULE from td_edu.systemprivateinc where `FILE`='$FILE' and `MODULE`='$MODULE'";
	$cursor1 = exequery( $connection, $query1 );
    $ROW = mysql_fetch_array( $cursor1 );
	//print_R($cursor1);exit;
    $MODULE2 = TRIM($ROW['MODULE']);
	//print $MODULE2;
	if($MODULE2!="")		{		
		$query = "update td_edu.systemprivateinc set `DEPT_ID`='$DEPT_ID',`USER_ID`='$USER_ID',`ROLE_ID`='$ROLE_ID',`DEPT_NAME`='$DEPT_NAME',`USER_NAME`='$USER_NAME',`ROLE_NAME`='$ROLE_NAME' where `FILE`='$FILE' and `MODULE`='$MODULE'";
	}
	else	{
		$query = "insert into td_edu.systemprivateinc values('','$FILE','$MODULE','$DEPT_ID','$DEPT_NAME','$ROLE_ID','$ROLE_NAME','$USER_ID','$USER_NAME')";		
	}
	//$query = "insert into systemprivateinc values('','$FILE','$MODULE','$DEPT_ID','$DEPT_NAME','$ROLE_ID','$ROLE_NAME','$USER_ID','$USER_NAME')";	
	//print $query;
	exequery( $connection, $query );
	//message( "", "Ȩ���������" );
	print "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=".$FileNameSELF."'>";
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