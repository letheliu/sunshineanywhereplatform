<?php

include_once( "inc/auth.php" );
$MENU_LEFT = array( );
$target = "user_main";
$user_list = array(
	"PARA_URL1" => "",
	"PARA_URL2" => "/general/system/user/user_edit.php",
	"PARA_TARGET" => $target,
	"PRIV_NO_FLAG" => "3",
	"MANAGE_FLAG" => "1",
	"xname" => "system_user",
	"showButton" => "0",
	"include_file" => "inc/user_list/index.php"
);
$MENU_LEFT[count( $MENU_LEFT )] = array(
	"text" => "��ְ��Ա",
	"href" => "",
	"onclick" => "clickMenu",
	"target" => $target,
	"title" => "��������б�",
	"img" => "",
	"module" => $user_list,
	"module_style" => ""
);
$query = "SELECT * from USER where USER_ID='".$LOGIN_USER_ID."'";
$cursor = exequery( $connection, $query );
if ( $ROW = mysql_fetch_array( $cursor ) )
{
	$POST_PRIV = $ROW['POST_PRIV'];
}
if ( $POST_PRIV == "1" )
{
	$query = "SELECT * from USER_PRIV where USER_PRIV=".$LOGIN_USER_PRIV;
	$cursor = exequery( $connection, $query );
	if ( $ROW = mysql_fetch_array( $cursor ) )
	{
		$PRIV_NO = $ROW['PRIV_NO'];
	}
	$user_out = "<table class=\"TableBlock\" width=\"100%\" align=\"center\">";
	if ( $LOGIN_USER_PRIV != "1" )
	{
		$query = "SELECT * from USER,USER_PRIV where DEPT_ID=0 and USER.USER_PRIV=USER_PRIV.USER_PRIV and USER_PRIV.PRIV_NO>".$PRIV_NO." and USER_PRIV.USER_PRIV!=1 order by PRIV_NO,USER_NO,USER_NAME";
	}
	else
	{
		$query = "SELECT * from USER,USER_PRIV where DEPT_ID=0 and USER.USER_PRIV=USER_PRIV.USER_PRIV order by PRIV_NO,USER_NO,USER_NAME";
	}
	$cursor = exequery( $connection, $query );
	while ( $ROW = mysql_fetch_array( $cursor ) )
	{
		++$USER_COUNT;
		$USER_ID = $ROW['USER_ID'];
		$USER_NAME = $ROW['USER_NAME'];
		$USER_PRIV = $ROW['USER_PRIV'];
		$query1 = "SELECT * from USER_PRIV where USER_PRIV='".$USER_PRIV."'";
		$cursor1 = exequery( $connection, $query1 );
		if ( $ROW = mysql_fetch_array( $cursor1 ) )
		{
			$USER_PRIV = $ROW['PRIV_NAME'];
		}
		$user_out .= "\r\n   <tr class=\"TableData\" align=\"center\">\r\n     <td nowrap width=\"80\">".$USER_PRIV."</td>\r\n     <td nowrap><a href=\"user_edit.php?USER_ID=".$USER_ID."&DEPT_ID=0\" target=".$target.">".$USER_NAME."</a></td>\r\n   </tr>";
	}
	$user_out .= "</table>";
	$module_style = "display:none;";
	
}

include_once( "inc/menu_left.php" );
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