<?php
session_start();

include_once( "../user_select/setting.inc.php" );
//
print "<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">";
print "<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/$LOGIN_THEME/style.css\" />";

ob_end_clean( );

if ( $TO_ID == "" || $TO_ID == "undefined" )
{
    $TO_ID = "TO_ID";
    $TO_NAME = "TO_NAME";
}

if ( $FORM_NAME == "" || $FORM_NAME == "undefined" )
{
    $FORM_NAME = "form1";
}

echo "\r\n<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n<title></title>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=gb2312\">\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/";
echo $LOGIN_THEME;
echo "/style.css\" />\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"/theme/";
echo $LOGIN_THEME;
echo "/menu_left.css\" />\r\n<script src=\"hover_tr.js\"></script>\r\n<script language=\"JavaScript\">\r\nvar \$ = function(id) {return document.getElementById(id);};\r\nvar CUR_ID=\"1\";\r\nfunction clickMenu(ID)\r\n{\r\n    var el=\$(\"module_\"+CUR_ID);\r\n    var link=\$(\"link_\"+CUR_ID);\r\n    if(ID==CUR_ID)\r\n    {\r\n       if(el.style.display==\"none\")\r\n       {\r\n           el.style.display='';\r\n           link.className=\"active\";\r\n       }\r\n       else\r\n       {\r\n           el.style.display=\"none\";\r\n           link.className=\"\";\r\n       }\r\n    }\r\n    else\r\n    {\r\n       el.style.display=\"none\";\r\n       link.className=\"\";\r\n       \$(\"module_\"+ID).style.display=\"\";\r\n       \$(\"link_\"+ID).className=\"active\";\r\n    }\r\n\r\n    CUR_ID=ID;\r\n}\r\n</script>\r\n</head>\r\n\r\n<body class=\"bodycolor\"  topmargin=\"1\" leftmargin=\"0\">\r\n";
?>
<script language="JavaScript">
var interval=null,key="";
function CheckSend()
{
	if(KWORD.value=="���û�������������...")
	   KWORD.value="";
  if(KWORD.value=="" && $('search_icon').src.indexOf("../../../Framework/images/quicksearch.gif")==-1)
	{
	   $('search_icon').src="../../../Framework/images/quicksearch.gif";
	}
	if(key!=KWORD.value && KWORD.value!="")
	{
     key=KWORD.value;
	   parent.user.location="query.php?TO_ID=<?=$_GET['TO_ID']?>&TO_NAME=<?=$_GET['TO_NAME']?>&FORM_NAME=<?=$_GET['FORM_NAME']?>&USER_NAME="+KWORD.value;
	   if($('search_icon').src.indexOf("../../../Framework/images/quicksearch.gif")>=0)
	   {
	   	   $('search_icon').src="../../../Framework/images/closesearch.gif";
	   	   $('search_icon').title="����ؼ���";
	   	   $('search_icon').onclick=function(){KWORD.value='���û�������������...';$('search_icon').src="../../../Framework/images/quicksearch.gif";$('search_icon').title="";$('search_icon').onclick=null;};
	   }
  }
}
</script>
<div style="border:1px solid #000000;margin-left:2px;background:#FFFFFF;">
  <input type="text" id="kword" name="KWORD" value="���û�������������..."
  onfocus="interval=setInterval(CheckSend,100);"
  onblur="clearInterval(interval);if(KWORD.value=='')KWORD.value='���û�������������...';"
  class="SmallInput" style="border:0px; color:#A0A0A0;width:145px;">
  <img id="search_icon" src="../../../Framework/images/quicksearch.gif" align=absmiddle style="cursor:hand;">
</div>
<?
echo "<ul>\r\n<!--============================ ���� =======================================-->\r\n  <li><a href=\"javascript:clickMenu('1');\" id=\"link_1\" class=\"active\" title=\"��������б�\"><span>������ѡ��</span></a></li>\r\n  <div id=\"module_1\" class=\"moduleContainer\">\r\n";
$PARA_URL = "user.php";
$PARA_TARGET = "user";
$PARA_ID = "TO_ID";
$PARA_VALUE = $TO_ID.".TO_NAME=".$TO_NAME.".FORM_NAME=".$FORM_NAME;
$PRIV_NO_FLAG = 0;
$xname = "user_select_single";
$showButton = 0;
include_once( "dept_list.php" );
echo "  </div>\r\n  <li><a href=\"javascript:clickMenu('2');\" id=\"link_2\" title=\"��������б�\"><span>����ɫѡ��</span></a></li>\r\n  <div id=\"module_2\" class=\"moduleContainer\" style=\"display:none\">\r\n    <table class=\"TableBlock trHover\" width=\"100%\" align=\"center\">\r\n";
$query = "SELECT * from USER_PRIV order by PRIV_NO ";
$cursor = exequery( $connection, $query );
$PRIV_COUNT = 0;
while ( $ROW = mysql_fetch_array( $cursor ) )
{
    ++$PRIV_COUNT;
    $USER_PRIV = $ROW['USER_PRIV'];
    $PRIV_NAME = $ROW['PRIV_NAME'];
    echo "<tr class=\"TableData\">\r\n  <td align=\"center\" onclick=\"javascript:parent.user.location='user.php?TO_ID=";
    echo $TO_ID;
    echo "&TO_NAME=";
    echo $TO_NAME;
    echo "&FORM_NAME=";
    echo $FORM_NAME;
    echo "&USER_PRIV=";
    echo $USER_PRIV;
    echo "&POST_PRIV=";
    echo $POST_PRIV;
    echo "&POST_DEPT=";
    echo $POST_DEPT;
    echo "&MANAGE_FLAG=";
    echo $MANAGE_FLAG;
    echo "';\" style=\"cursor:hand\">";
    echo $PRIV_NAME;
    echo "</td>\r\n</tr>\r\n";
}
if ( $PRIV_COUNT == 0 )
{
    message( "", "û�ж����ɫ", "blank" );
}
echo "    </table>\r\n  </div>\r\n</ul>\r\n\r\n</body>\r\n</html>\r\n";
?><?
/*
	��Ȩ����:֣�ݵ���Ƽ��������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ��������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ������������������������������в�������ĸ�У����������������СѧУ���������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ����������ͷ���;

	��������:����Ƽ��������������Լܹ�ƽ̨,�Լ��������֮����չ���κ���������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ����,��������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э������,GPLV3Э�����������뵽�ٶ�����;
	��������:������ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>