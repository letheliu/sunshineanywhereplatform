<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/conn.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/utility_org.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/utility_all.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/user_online.php");
include_once($_SERVER['DOCUMENT_ROOT']."/inc/department.php");

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
<body class="bodycolor" topmargin="5" leftmargin="2" onload="begin_set();">

<table class="TableBlock" width="100%">
<tr class="TableHeader">
  <td align="center">人员查询</td>
</tr>
<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/my_priv.php");

if($MODULE_ID=="2")
   $EXCLUDE_UID_STR=my_exclude_uid();

 $EXCLUDE_UID_STR = td_trim($EXCLUDE_UID_STR);
 $query = "SELECT UID,USER_ID,USER_NAME,DEPT_ID,PRIV_NO from USER,USER_PRIV where USER.USER_PRIV=USER_PRIV.USER_PRIV and (USER_ID like '%$USER_NAME%' or USER_NAME like '%$USER_NAME%' or BYNAME like '%$USER_NAME%') and DEPT_ID!=0 and NOT_LOGIN!='1'";
 if($DEPT_PRIV=="3"||$DEPT_PRIV=="4")
    $query .= " and find_in_set(USER.USER_ID,'$USER_ID_STR')";
 if($EXCLUDE_UID_STR!="")
    $query .= " and USER.UID not in ($EXCLUDE_UID_STR)";
 $query .= " order by PRIV_NO,USER_NO,USER_NAME";
 $cursor= exequery($connection,$query);
 $USER_COUNT=0;
 while($ROW=mysql_fetch_array($cursor))
 {
    $UID=$ROW["UID"];
    $USER_ID=$ROW["USER_ID"];
    $USER_NAME=$ROW["USER_NAME"];
    $DEPT_ID_I=$ROW["DEPT_ID"];
    $PRIV_NO_I=$ROW["PRIV_NO"];

    if(!is_dept_priv($DEPT_ID_I, $DEPT_PRIV, $DEPT_ID_STR, true) || ($ROLE_PRIV=="0" && $PRIV_NO_I<=$MY_PRIV_NO || $ROLE_PRIV=="1" && $PRIV_NO_I< $MY_PRIV_NO || $ROLE_PRIV=="3" && !find_id($PRIV_ID_STR, $PRIV_NO_I)))
       continue;
    
    $USER_COUNT++;
    if($USER_COUNT==1)
    {
?>
<tr class="TableData">
  <td onclick="javascript:add_all();" style="cursor:pointer" align="center">全部添加</td>
</tr>
<tr class="TableData">
  <td onclick="javascript:del_all();" style="cursor:pointer" align="center">全部删除</td>
</tr>
<?
    }
?>
<tr class="TableData" onclick="javascript:click_user('<?=$USER_ID?>')" style="cursor:pointer" align="center">
  <td class="menulines" id="<?=$USER_ID?>" title="<?=$USER_NAME?>">
  [<?=htmlspecialchars($SYS_DEPARTMENT[$DEPT_ID_I]["DEPT_NAME"])?>]<?=htmlspecialchars($USER_NAME)?><span id="attend_status_<?=$UID?>" title="<?=$USER_ID?>" style="color:#FF0000;"><?if(array_key_exists($UID,$SYS_ONLINE_USER)) echo "(在线)";?></span>
  </td>
</tr>

<?
 }

 if($USER_COUNT==0)
{
?>
<tr class="TableData">
  <td align="center">未查询到用户</td>
</tr>
<?
}
?>

</table>
</body>
</html>