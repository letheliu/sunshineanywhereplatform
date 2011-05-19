<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/conn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/utility_org.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/utility_all.php");
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
include_once($_SERVER['DOCUMENT_ROOT']."/inc/my_priv.php");

if($MODULE_ID=="2")
   $EXCLUDE_UID_STR=my_exclude_uid();

 $EXCLUDE_UID_STR = td_trim($EXCLUDE_UID_STR);
//============================ 显示已定义用户 =======================================
$query = "SELECT * from USER_GROUP where GROUP_ID='$GROUP_ID'";
$cursor= exequery($connection,$query);
if($ROW=mysql_fetch_array($cursor))
{
   $GROUP_NAME=$ROW["GROUP_NAME"];
   $USER_STR=$ROW["USER_STR"];
}
?>
<table class="TableBlock" width="100%">
<tr class="TableHeader">
  <td colspan="2" align="center"><?=htmlspecialchars($GROUP_NAME)?></td>
</tr>
<?
if($USER_STR=="")
{
?>
<tr class="TableControl">
  <td style="cursor:pointer" align="center" colspan="2">尚未添加用户</td>
</tr>
<?
   exit;
}
?>
<tr class="TableControl">
  <td onclick="javascript:add_all();" style="cursor:pointer" align="center" colspan="2">全部添加</td>
</tr>
<tr class="TableControl">
  <td onclick="javascript:del_all();" style="cursor:pointer" align="center" colspan="2">全部删除</td>
</tr>
<?
$query = "SELECT UID,USER_ID,USER_NAME,USER.DEPT_ID,DEPT_NAME,PRIV_NO from USER,USER_PRIV,DEPARTMENT where USER.USER_PRIV=USER_PRIV.USER_PRIV and USER.DEPT_ID=DEPARTMENT.DEPT_ID and NOT_LOGIN!='1' and find_in_set(USER_ID,'$USER_STR')";
if($DEPT_PRIV=="3"||$DEPT_PRIV=="4")
   $query .= " and find_in_set(USER.USER_ID,'$USER_ID_STR')";
if($EXCLUDE_UID_STR!="")
   $query .= " and USER.UID not in ($EXCLUDE_UID_STR)";
$query .= " order by DEPT_NO,PRIV_NO,USER_NO,USER_NAME";
$cursor= exequery($connection,$query);
while($ROW=mysql_fetch_array($cursor))
{
   $UID=$ROW["UID"];
   $USER_ID=$ROW["USER_ID"];
   $USER_NAME=$ROW["USER_NAME"];
   $DEPT_ID_I=$ROW["DEPT_ID"];
   $DEPT_NAME=$ROW["DEPT_NAME"];
   $PRIV_NO_I=$ROW["PRIV_NO"];
   
   if(!is_dept_priv($DEPT_ID_I, $DEPT_PRIV, $DEPT_ID_STR, true) || ($ROLE_PRIV=="0" && $PRIV_NO_I<=$MY_PRIV_NO || $ROLE_PRIV=="1" && $PRIV_NO_I< $MY_PRIV_NO || $ROLE_PRIV=="3" && !find_id($PRIV_ID_STR, $PRIV_NO_I)))
      continue;
?>
<tr class="TableData" onclick="javascript:click_user('<?=$USER_ID?>')" style="cursor:pointer" align="center">
  <td id="<?=$USER_ID?>" title="<?=$USER_NAME?>" class="menulines"><?=htmlspecialchars($USER_NAME)?><span id="attend_status_<?=$UID?>" title="<?=$USER_ID?>" style="color:#FF0000;"><?if(array_key_exists($UID,$SYS_ONLINE_USER)) echo "(在线)";?></span></td><td><?=htmlspecialchars($DEPT_NAME)?></td>
</tr>
<?
}
?>
</table>
</body>
</html>