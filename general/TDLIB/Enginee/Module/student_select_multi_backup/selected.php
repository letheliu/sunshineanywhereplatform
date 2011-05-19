<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/conn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/utility_all.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/user_online.php");

$TO_ID_STR=urldecode($_POST["TO_ID_STR"]);
if($TO_ID_STR != "")
{
   $TO_ID_STR=iconv("utf-8",ini_get("default_charset"),$TO_ID_STR);
   $RESPONSE_TEXT="";
   $query = "SELECT UID,USER_ID,USER_NAME from USER where find_in_set(USER_ID,'$TO_ID_STR')";
   $cursor= exequery($connection,$query);
   while($ROW=mysql_fetch_array($cursor))
   {
      $UID=$ROW["UID"];
      $USER_ID=$ROW["USER_ID"];
      $USER_NAME=$ROW["USER_NAME"];

      $RESPONSE_TEXT.='<tr class="TableData" onclick="click_user(\''.$USER_ID.'\')" style="cursor:pointer" align="center"><td class="menulines" id="'.$USER_ID.'" user_id="'.$USER_ID.'" title="'.$USER_NAME.'">'.htmlspecialchars($USER_NAME).'<span id="attend_status_'.$UID.'" title="'.$USER_ID.'" style="color:#FF0000;">'.(array_key_exists($UID,$SYS_ONLINE_USER) ? "(在线)" : "").'</span></td></tr>';
   }

   ob_end_clean();
   //header("Content-Type:text/html; charset=gb2312");
   if($RESPONSE_TEXT!="")
   {
      $RESPONSE_TEXT='<table class="TableBlock" width="100%">
  <tr class="TableHeader">
    <td colspan="2" align="center"><b>已选人员</b></td>
  </tr>
  <tr class="TableControl">
    <td onclick="javascript:add_all();" style="cursor:pointer" align="center" colspan="2">全部添加</td>
  </tr>
  <tr class="TableControl">
    <td onclick="javascript:del_all();" style="cursor:pointer" align="center" colspan="2">全部删除</td>
  </tr>
  '.$RESPONSE_TEXT.'
</table>';
   echo $RESPONSE_TEXT;
   }
   exit;
}

if($TO_ID=="" || $TO_ID=="undefined")
{
   $TO_ID="TO_ID";
   $TO_NAME="TO_NAME";
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style>
.menulines{}
</style>
</head>
<script src="/inc/js/utility.js"></script>
<script src="/inc/js/user_select.js"></script>
<script Language="JavaScript">
var parent_window = getOpenner();
var to_form = parent_window.<?=$FORM_NAME?>;
var to_id =   to_form.<?=$TO_ID?>;
var to_name = to_form.<?=$TO_NAME?>;

function click_tr()
{
   var theEvent = window.event || arguments[0];
   var el = theEvent.srcElement || theEvent.target;
   if(el.tagName.toUpperCase()=="TD" && el.id)
      click_user(el.id);
}
function get_selected()
{
   var TO_ID_STR = to_id.value;
   if(TO_ID_STR)
   {
      var args="TO_ID_STR="+encodeURIComponent(TO_ID_STR);
      _post("selected.php",args, show_selected);
   }
   else
   	body.innerHTML="<br>暂无选择人员";
}
function show_selected(req)
{
   if(req.responseText != "")
      body.innerHTML=req.responseText;
   else
   	  body.innerHTML="<br>暂无选择人员";
   begin_set();
}
</script>
<body class="bodycolor" topmargin="0" leftmargin="0" onload="get_selected();">
<div id="body" align="center" class="small"></div>
</body>
</html>