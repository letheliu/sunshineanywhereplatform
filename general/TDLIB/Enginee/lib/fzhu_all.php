<?php

//Ҫ���˵ķǷ��ַ�

$ArrFiltrate=array("'",";","union");

//�����Ҫ��ת��url,������Ĭ��ǰһҳ

$StrGoUrl="";

//�Ƿ���������е�ֵ

function FunStringExist($StrFiltrate,$ArrFiltrate){

foreach ($ArrFiltrate as $key=>$value){

if (eregi($value,$StrFiltrate)){

return true;

}

}

return false;

}

//�ϲ�$_POST �� $_GET

if(function_exists(array_merge)){

$ArrPostAndGet=array_merge($HTTP_POST_VARS,$HTTP_GET_VARS);

}else{

foreach($HTTP_POST_VARS as $key=>$value){

$ArrPostAndGet[]=$value;

}

foreach($HTTP_GET_VARS as $key=>$value){

$ArrPostAndGet[]=$value;

}

}

//��֤��ʼ

foreach($ArrPostAndGet as $key=>$value){

if (FunStringExist($value,$ArrFiltrate)){

echo "<script language=\"javascript\">alert(\"Neeao��ʾ���Ƿ��ַ�\");</script>";

if (empty($StrGoUrl)){

echo "<script language=\"javascript\">history.go(-1);</script>";

}else{

echo "<script language=\"javascript\">window.location=\"".$StrGoUrl."\";</script>";

}

exit;

}

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