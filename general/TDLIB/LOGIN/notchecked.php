<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

require_once('../config.inc.php');
$LOGIN_THEME=$_SESSION['SUNSHINE_USER_LOGIN_THEME'];
$LOGIN_THEME==""?$LOGIN_THEME=$SYSTEM_THEME:'';
?>
<html>
<head>
<title>ϵͳ��¼(System Login)</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href="/theme/3/style.css" rel=stylesheet>
</head>

<body class="bodycolor" topmargin="5">


<div align="center" title="��ʾ��Ϣ��">
<span style="BACKGROUND:#EEEEEE;COLOR:#FF6633;margin: 10px;border:1px dotted #FF6633;font-weight:bold;padding:8px;width=300px">
<font color="#FF0000"><img src="../Framework/images/attention.gif" height="20"> <b>��ʾ</b></font><hr>
�û������������(ע���Сд)!</span>
</div>
<br>
<div align="center">
  <input type="button" class="SmallButton" value="���µ�¼" onclick="location='index.php'">
</div><?
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