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
<title></title>
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

<body class="bodycolor" topmargin="1" leftmargin="0" onload="begin_set()">

<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/my_priv.php");
if($MODULE_ID=="2")
   $EXCLUDE_UID_STR=my_exclude_uid();

 $EXCLUDE_UID_STR = td_trim($EXCLUDE_UID_STR);
 if($DEPT_ID=="")
 { 	  
    if(is_dept_priv($LOGIN_DEPT_ID, $DEPT_PRIV, $DEPT_ID_STR, 1))
    {
       $DEPT_ID=$LOGIN_DEPT_ID;
    }
    else
    {
       Message("","请选择部门");
       exit;
    }
 }

 //============================ 显示人员信息 =======================================
 if($USER_PRIV=="")
 {
    $query = "SELECT UID,USER_ID,USER_NAME,PRIV_NO,USER.USER_PRIV from USER,USER_PRIV where (DEPT_ID='$DEPT_ID' or find_in_set('$DEPT_ID',DEPT_ID_OTHER)) and USER.USER_PRIV=USER_PRIV.USER_PRIV";
    if(!$MANAGE_FLAG)
        $query .= " and NOT_LOGIN!='1'";
    if($DEPT_PRIV=="3"||$DEPT_PRIV=="4")
       $query .= " and find_in_set(USER.USER_ID,'$USER_ID_STR')";
    if($EXCLUDE_UID_STR!="")
       $query .= " and USER.UID not in ($EXCLUDE_UID_STR)";
    $query .= " order by PRIV_NO,USER_NO,USER_NAME";
    
    $TITLE=$SYS_DEPARTMENT[$DEPT_ID]["DEPT_NAME"];
 }
 else
 {
    $query = "SELECT UID,USER_ID,USER_NAME,DEPT_ID from USER where USER_PRIV='$USER_PRIV' and DEPT_ID!=0";
    if(!$MANAGE_FLAG)
        $query .= " and NOT_LOGIN!='1'";
    if($DEPT_PRIV=="3"||$DEPT_PRIV=="4")
       $query .= " and find_in_set(USER.USER_ID,'$USER_ID_STR')";
    if($EXCLUDE_UID_STR!="")
       $query .= " and USER.UID not in ($EXCLUDE_UID_STR)";
    $query .= " order by USER_NO,USER_NAME";
    
    $query1 = "select PRIV_NAME from USER_PRIV where USER_PRIV='$USER_PRIV'";
    $cursor1= exequery($connection,$query1);
    if($ROW=mysql_fetch_array($cursor1))
       $TITLE=$ROW["PRIV_NAME"];
 }
?>

<table class="TableBlock" width="100%">
<tr class="TableHeader">
  <td colspan="2" align="center"><b><?=$TITLE?></b></td>
</tr>

<?
 $cursor= exequery($connection,$query);
 $USER_COUNT=0;
 while($ROW=mysql_fetch_array($cursor))
 {
    $UID=$ROW["UID"];
    $USER_ID=$ROW["USER_ID"];
    $USER_NAME=$ROW["USER_NAME"];
    $DEPT_ID_I=$ROW["DEPT_ID"];
    $PRIV_NO_I=$ROW["PRIV_NO"];
    $USER_PRIV_I=$ROW["USER_PRIV"];
             
    if($USER_PRIV=="" && ($ROLE_PRIV=="0" && $PRIV_NO_I<=$MY_PRIV_NO || $ROLE_PRIV=="1" && $PRIV_NO_I< $MY_PRIV_NO || $ROLE_PRIV=="3" && !find_id($PRIV_ID_STR, $USER_PRIV_I)))
       continue;
    else if($USER_PRIV!="" && !is_dept_priv($DEPT_ID_I, $DEPT_PRIV, $DEPT_ID_STR, true))
       continue;

    $USER_COUNT++;
    if($USER_COUNT==1)
    {
?>
<tr class="TableControl">
  <td onclick="add_all('1');" style="cursor:pointer" align="center">全部添加</td>
</tr>
<tr class="TableControl">
  <td onclick="del_all('1');" style="cursor:pointer" align="center">全部删除</td>
</tr>
<?
    }
?>

<tr class="TableData" style="cursor:pointer">
  <td class="menulines1" id="<?=$USER_ID?>" title="<?=$USER_NAME?>" align="center" onclick="javascript:click_user('<?=$USER_ID?>')">
  <?=htmlspecialchars($USER_NAME)?><span id="attend_status_<?=$UID?>" title="<?=$USER_ID?>" style="color:#FF0000;"><?if(array_key_exists($UID,$SYS_ONLINE_USER)) echo "(在线)";?></span>
  </td>
</tr>

<?
 }

//============================ 显示辅助角色 =======================================
if($USER_PRIV!="")
{
   $query = "SELECT UID,USER_ID,USER_NAME,DEPT_ID from USER where (USER_PRIV_OTHER like '$USER_PRIV,%' or USER_PRIV_OTHER like '%,$USER_PRIV,%') and USER_PRIV!='$USER_PRIV' and DEPT_ID!=0";
   if(!$MANAGE_FLAG)
       $query.= " and NOT_LOGIN!='1'";
    if($DEPT_PRIV=="3"||$DEPT_PRIV=="4")
       $query .= " and find_in_set(USER.USER_ID,'$USER_ID_STR')";
   if($EXCLUDE_UID_STR!="")
      $query .= " and USER.UID not in ($EXCLUDE_UID_STR)";
   $query.= " order by USER_NO,USER_NAME";
  
   $cursor= exequery($connection,$query);
   $USER_COUNT1=0;
   while($ROW=mysql_fetch_array($cursor))
   {
      $UID=$ROW["UID"];
      $USER_ID=$ROW["USER_ID"];
      $USER_NAME=$ROW["USER_NAME"];
      $DEPT_ID_I=$ROW["DEPT_ID"];
      
      if(!is_dept_priv($DEPT_ID_I, $DEPT_PRIV, $DEPT_ID_STR, true))
         continue;
      
      $USER_COUNT++;
      $USER_COUNT1++;
      if($USER_COUNT1==1)
      {
?>
<tr class="TableHeader">
  <td colspan="2" align="center"><b>辅助角色</b></td>
</tr>
<tr class="TableControl">
  <td onclick="add_all('2');" style="cursor:pointer" align="center">全部添加</td>
</tr>
<tr class="TableControl">
  <td onclick="del_all('2');" style="cursor:pointer" align="center">全部删除</td>
</tr>
<?
      }
?>

<tr class="TableData" onclick="javascript:click_user('<?=$USER_ID?>')" style="cursor:pointer" align="center">
  <td class="menulines2" id="<?=$USER_ID?>" title="<?=$USER_NAME?>">
  <?=htmlspecialchars($USER_NAME)?><span id="attend_status_<?=$UID?>" title="<?=$USER_ID?>" style="color:#FF0000;"><?if(array_key_exists($UID,$SYS_ONLINE_USER)) echo "(在线)";?></span>
  </td>
</tr>

<?
   }//while
}

if($USER_COUNT==0)
{
?>
<tr class="TableData">
  <td align="center">未定义用户</td>
</tr>
<?
}
?>

</table>
</body>
</html>
