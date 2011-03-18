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
	//message( "", "权限设置完成" );
	print "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=".$FileNameSELF."'>";
?><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>