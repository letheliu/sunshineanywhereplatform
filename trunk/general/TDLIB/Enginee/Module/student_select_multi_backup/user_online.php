<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/conn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/utility_org.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/user_online.php");

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
</script>
<body class="bodycolor" topmargin="0" leftmargin="0" onload="begin_set()">

<?
if(count($SYS_ONLINE_USER)==0)
{
   Message("","无在线人员!","blank");
   exit;
}
?>
<table class="TableBlock" width="100%">
<tr class="TableHeader">
  <td colspan="2" align="center"><b>全部在线人员</b></td>
</tr>
<tr class="TableControl">
  <td onclick="javascript:add_all();" style="cursor:pointer" align="center" colspan="2">全部添加</td>
</tr>
<tr class="TableControl">
  <td onclick="javascript:del_all();" style="cursor:pointer" align="center" colspan="2">全部删除</td>
</tr>
<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/my_priv.php");

if($MODULE_ID=="2")
   $EXCLUDE_UID_STR=my_exclude_uid();

while(list($UID, $USER) = each($SYS_ONLINE_USER))
{
   if(!find_id($EXCLUDE_UID_STR, $UID))
      $ONLINE_UID_STR.=$UID.",";
}

$ONLINE_UID_STR = td_trim($ONLINE_UID_STR);
if($ONLINE_UID_STR != "")
{
   $query = "SELECT USER_ID,USER_NAME,USER.DEPT_ID,PRIV_NO from USER,USER_PRIV where USER.USER_PRIV=USER_PRIV.USER_PRIV and NOT_LOGIN!='1' and UID in ($ONLINE_UID_STR)";
   if($DEPT_PRIV=="3"||$DEPT_PRIV=="4")
      $query .= " and find_in_set(USER.USER_ID,'$USER_ID_STR')";
   $query .= " order by PRIV_NO,USER_NO,USER_NAME";
   $cursor= exequery($connection,$query);
   while($ROW=mysql_fetch_array($cursor))
   {
      $USER_ID=$ROW["USER_ID"];
      $USER_NAME=$ROW["USER_NAME"];
      $DEPT_ID_I=$ROW["DEPT_ID"];
      $PRIV_NO_I=$ROW["PRIV_NO"];
      
      if(!is_dept_priv($DEPT_ID_I, $DEPT_PRIV, $DEPT_ID_STR, true) || ($ROLE_PRIV=="0" && $PRIV_NO_I<=$MY_PRIV_NO || $ROLE_PRIV=="1" && $PRIV_NO_I< $MY_PRIV_NO || $ROLE_PRIV=="3" && !find_id($PRIV_ID_STR, $PRIV_NO_I)))
         continue;
?>
<tr class="TableData" onclick="javascript:click_user('<?=$ROW["USER_ID"]?>')" style="cursor:pointer" align="center">
  <td class="menulines" id="<?=$ROW["USER_ID"]?>" title="<?=$ROW["USER_NAME"]?>"><?=htmlspecialchars($ROW["USER_NAME"])?></td><td><?=htmlspecialchars($SYS_ONLINE_DEPT[$ROW["DEPT_ID"]]["DEPT_NAME"])?></td>
</tr>
<?
   }
}
?>
</table>
</body>
</html>