<?
include_once("lib.inc.php");
if($_GET['action']=='')		{
?>


<link rel='stylesheet' type='text/css' href='/theme/1/style.css'>
<FORM name=form1 action="?action=login" method=post encType=multipart/form-data>
<table border=1 cellspacing=0 class=small bordercolor=#000000 cellpadding=3 align=center width=550 style="border-collapse:collapse">
<TR><TD class=TableHeader align=center colSpan=4>&nbsp;Sunshine Anywhere �������ƽ̨(SAP)</TD></TR>
<TR><TD class=TableContent align=center width=25% colSpan=1 nowrap>&nbsp;���룺
<input  type=password name=password class=SmallInput value="">
</TD></TR>
<TR><TD class=TableContent align=center width=25% colSpan=1 nowrap>
<INPUT class=SmallButton title=����ƽ̨ type=submit value="����ƽ̨" name=button>
</TD></TR>
</table></form>

<?
}
else if($_GET['action']=='login'&&addslashes($_POST['password'])=='8336405@')		{
echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=main.php?action=action_init'>\n";
}
else		{
//print_R($_POST);
print "<link rel='stylesheet' type='text/css' href='/theme/9/style.css'>\n";
print "<div align=center><INPUT class=SmallButton onclick=\"location='?'\" type=button value='�ص���ҳ'></div>";
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