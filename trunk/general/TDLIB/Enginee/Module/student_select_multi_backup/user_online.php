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
</html><?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>