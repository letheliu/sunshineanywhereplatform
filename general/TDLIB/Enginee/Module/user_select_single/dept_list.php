<?php
session_start();
include_once( "../user_select/setting.inc.php" );
print "<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"xtree.css\" />\r\n<div id=\"xtree\" class=\"xtree\" xname=\"";
echo $xname;
echo "\" showButton=\"";
echo $showButton;
echo "\" XmlSrc=\"tree.php?DEPT_ID=0&PARA_URL=";
echo $PARA_URL;
echo "&e=";
echo $e;
echo "&PARA_TARGET=";
echo $PARA_TARGET;
echo "&PRIV_NO_FLAG=";
echo $PRIV_NO_FLAG;
echo "&PARA_ID=";
echo $PARA_ID;
echo "&PARA_VALUE=";
echo $PARA_VALUE;
echo "&showButton=";
echo $showButton;
echo "\"></div>\r\n\r\n";
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