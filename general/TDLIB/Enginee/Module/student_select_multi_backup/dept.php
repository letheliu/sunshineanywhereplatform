<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/auth.php");
ob_end_clean();

if($LOGIN_NOT_VIEW_USER)
{
   Message("","�޲鿴�û���Ȩ��","blank");
   exit;
}

if($TO_ID=="" || $TO_ID=="undefined")
{
   $TO_ID="TO_ID";
   $TO_NAME="TO_NAME";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THEME?>/style.css" />
<link rel="stylesheet" type="text/css" href="/theme/<?=$LOGIN_THEME?>/menu_left.css" />
<script src="/inc/js/hover_tr.js"></script>
<script type="text/javascript">
var $ = function(id) {return document.getElementById(id);};
var CUR_ID="2";
function clickMenu(ID)
{
    var el=$("module_"+CUR_ID);
    var link=$("link_"+CUR_ID);
    if(ID==CUR_ID)
    {
       if(el.style.display=="none")
       {
           el.style.display='';
           link.className="active";
       }
       else
       {
           el.style.display="none";
           link.className="";
       }
    }
    else
    {
       el.style.display="none";
       link.className="";
       $("module_"+ID).style.display="";
       $("link_"+ID).className="active";
    }

    CUR_ID=ID;
}
function ShowSelected()
{
   parent.user.location="selected.php?TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>";
}
var ctroltime=null,key="";
function CheckSend()
{
	var kword=$("kword");
	if(kword.value=="���û�������������...")
	   kword.value="";
  if(kword.value=="" && $('search_icon').src.indexOf("/images/quicksearch.gif")==-1)
	{
	   $('search_icon').src="/images/quicksearch.gif";
	}
	if(key!=kword.value && kword.value!="")
	{
     key=kword.value;
	   parent.user.location="query.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>&USER_NAME="+kword.value;
	   if($('search_icon').src.indexOf("/images/quicksearch.gif")>=0)
	   {
	   	   $('search_icon').src="/images/closesearch.gif";
	   	   $('search_icon').title="����ؼ���";
	   	   $('search_icon').onclick=function(){kword.value='���û�������������...';$('search_icon').src="/images/quicksearch.gif";$('search_icon').title="";$('search_icon').onclick=null;};
	   }
  }
  ctroltime=setTimeout(CheckSend,100);
}
function click_node(the_id,checked,para_id,para_value)
{
	parent.user.location="children.php?MODULE_ID=<?=$MODULE_ID?>&DEPT_ID="+the_id+"&CHECKED="+checked+"&"+para_id+"="+para_value;
}
</script>
</head>

<body class="bodycolor"  topmargin="1" leftmargin="0">
<div style="border:1px solid #000000;margin-left:2px;background:#FFFFFF;">
  <input type="text" id="kword" name="kword" value="���û�������������..." onfocus="ctroltime=setTimeout(CheckSend,100);" onblur="clearTimeout(ctroltime);if(this.value=='')this.value='���û�������������...';" class="SmallInput" style="border:0px; color:#A0A0A0;width:145px;"><img id="search_icon" src="/images/quicksearch.gif" align=absmiddle style="cursor:pointer;">
</div>
<ul>
<!--============================ ���� =======================================-->
  <li><a href="javascript:ShowSelected();" id="link_1"><span>��ѡ��Ա</span></a></li>
  <li><a href="javascript:clickMenu('2');" id="link_2" class="active" title="��������б�"><span>������ѡ��</span></a></li>
  <div id="module_2" class="moduleContainer treeList">
<?
$PARA_URL="user.php";
$PARA_TARGET="user";
$PARA_ID="TO_ID";
$PARA_VALUE=$TO_ID.".TO_NAME=".$TO_NAME.".FORM_NAME=".$FORM_NAME.".MANAGE_FLAG=".$MANAGE_FLAG;
$PRIV_NO_FLAG=0;
$xname="user_select";
$showButton=1;
$USER_SELECT_FLAG=1;

include_once($_SERVER['DOCUMENT_ROOT']."/inc/dept_list/index.php");
?>
  </div>
<!--============================ ��ɫ =======================================-->
  <li><a href="javascript:clickMenu('3');" id="link_3" title="��������б�"><span>����ɫѡ��</span></a></li>
  <div id="module_3" class="moduleContainer" style="display:none">
    <table class="TableBlock trHover" width="100%" align="center">
<?
 $PRIV_ID_STR = td_trim($PRIV_ID_STR);
 $query = "SELECT * from USER_PRIV where 1=1";
 if($ROLE_PRIV=="0")
    $query .= " and PRIV_NO>$MY_PRIV_NO";
 else if($ROLE_PRIV=="1")
    $query .= " and PRIV_NO>=$MY_PRIV_NO";
 else if($ROLE_PRIV=="3" && $PRIV_ID_STR != "")
    $query .= " and USER_PRIV in ($PRIV_ID_STR)";
 $query .= " order by PRIV_NO ";
 $cursor= exequery($connection,$query);
 $PRIV_COUNT=0;
 while($ROW=mysql_fetch_array($cursor))
 {
    $PRIV_COUNT++;
    $USER_PRIV =$ROW["USER_PRIV"];
    $PRIV_NAME=$ROW["PRIV_NAME"];
?>
    <tr class="TableData">
      <td align="center" onclick="javascript:parent.user.location='user.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>&USER_PRIV=<?=$USER_PRIV?>&POST_PRIV=<?=$POST_PRIV?>&POST_DEPT=<?=$POST_DEPT?>&MANAGE_FLAG=<?=$MANAGE_FLAG?>';" style="cursor:pointer"><?=$PRIV_NAME?></td>
    </tr>
<?
 }

if($PRIV_COUNT==0)
   Message("","û�ж����ɫ","blank");
?>
    </table>
  </div>

<!--============================ �Զ����� =======================================-->
  <li><a href="javascript:clickMenu('4');" id="link_4" title="��������б�"><span>�Զ�����</span></a></li>
  <div id="module_4" class="moduleContainer" style="display:none">
    <table class="TableBlock trHover" width="100%" align="center">
<?
 //============================ �����Զ����� =======================================
 $query = "SELECT * from USER_GROUP where USER_ID='$LOGIN_USER_ID' order by ORDER_NO ";
 $cursor= exequery($connection,$query);
 $GROUP_COUNT=0;
 while($ROW=mysql_fetch_array($cursor))
 {
    $GROUP_COUNT++;
    $GROUP_ID =$ROW["GROUP_ID"];
    $GROUP_NAME=$ROW["GROUP_NAME"];
    
    if($GROUP_COUNT==1)
    {
?>
    <tr class="TableControl">
      <td align="center">�����Զ�����</td>
    </tr>
<?
    }
?>
    <tr class="TableData">
      <td align="center" onclick="javascript:parent.user.location='user_define.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>&GROUP_ID=<?=$GROUP_ID?>';" style="cursor:pointer"><?=$GROUP_NAME?></td>
    </tr>
<?
 }
 
 //============================ �����Զ����� =======================================
 $query = "SELECT * from USER_GROUP where USER_ID='' order by ORDER_NO ";
 $cursor= exequery($connection,$query);
 $GROUP_COUNT1=0;
 while($ROW=mysql_fetch_array($cursor))
 {
    $GROUP_COUNT1++;
    $GROUP_ID =$ROW["GROUP_ID"];
    $GROUP_NAME=$ROW["GROUP_NAME"];
    
    if($GROUP_COUNT1==1)
    {
?>
    <tr class="TableControl">
      <td align="center">�����Զ�����</td>
    </tr>
<?
    }
?>
    <tr class="TableData">
      <td align="center" onclick="javascript:parent.user.location='user_define.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>&GROUP_ID=<?=$GROUP_ID?>';" style="cursor:pointer"><?=$GROUP_NAME?></td>
    </tr>
<?
 }

if($GROUP_COUNT==0&&$GROUP_COUNT1==0)
   Message("","û���Զ�����","blank");
?>
    </table>
  </div>
<!--============================ ������Ա =======================================-->
  <li><a href="user_online.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>" id="link_5" target="user" title="��������б�"><span>������Ա</span></a></li>
</ul>
<?
$CUR_TIME=date("Y-m-d H:i:s",time());
$EVECTION_ID_STR = $LEAVE_ID_STR = $OUT_ID_STR = "";

$query = "SELECT USER_ID from ATTEND_EVECTION where STATUS='1' and ALLOW='1' and to_days(EVECTION_DATE1)<=to_days('$CUR_TIME') and to_days(EVECTION_DATE2)>=to_days('$CUR_TIME')";
$cursor= exequery($connection,$query);
while($ROW1=mysql_fetch_array($cursor))
{
   $EVECTION_ID_STR.=$ROW1["USER_ID"].",";
}

$query = "SELECT USER_ID from ATTEND_LEAVE where STATUS='1' and ALLOW='1' and LEAVE_DATE1<='$CUR_TIME' and LEAVE_DATE2>='$CUR_TIME'";
$cursor= exequery($connection,$query);
while($ROW1=mysql_fetch_array($cursor))
{
   $LEAVE_ID_STR.=$ROW1["USER_ID"].",";
}

$query = "SELECT USER_ID from ATTEND_OUT where STATUS='0' and ALLOW='1' and to_days(SUBMIT_TIME)=to_days('$CUR_TIME') and OUT_TIME1<='".date("H:i",time())."' and OUT_TIME2>='".date("H:i",time())."'";
$cursor= exequery($connection,$query);
while($ROW1=mysql_fetch_array($cursor))
{
   $OUT_ID_STR.=$ROW1["USER_ID"].",";
}
?>
<div id="user_evection" style="display:none;"><?=$EVECTION_ID_STR?></div>
<div id="user_leave" style="display:none;"><?=$LEAVE_ID_STR?></div>
<div id="user_out" style="display:none;"><?=$OUT_ID_STR?></div>
</body>
</html><?
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