<?php
session_start();

include_once( "../user_select/setting.inc.php" );
//
print "<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">";
print "<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/style.css\" />
<script type=\"text/javascript\" language=\"javascript\" src=\"../../lib/common.js\"></script>
";

echo "
<html>
<head>
<title></title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">
<script Language=\"JavaScript\"> var parent_window = parent.dialogArguments; ";
if ( $TO_ID == "" || $TO_ID == "undefined" )
{
    $TO_ID = "TO_ID";
    $TO_NAME = "TO_NAME";
}
if ( $FORM_NAME == "" || $FORM_NAME == "undefined" )
{
    $FORM_NAME = "form1";
}
echo " function clear_user() {     parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=\"\";     parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=\"\"; }
</script>
</head>
<body class=\"bodycolor\"  topmargin=\"0\" leftmargin=\"0\">
<table border=\"0\" cellspacing=\"1\" width=\"100%\" class=\"small\"  cellpadding=\"2\" align=\"center\">
<tr>
<td nowrap align=\"right\">
<input type=\"button\" class=\"SmallButton\" value=\"�� ��\" onclick=\"clear_user();\">
&nbsp;&nbsp;
<input type=\"button\" class=\"SmallButton\" value=\"�� ��\" onclick=\"window.close();\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</td>
</tr>
</table>
</body> </html> ";
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