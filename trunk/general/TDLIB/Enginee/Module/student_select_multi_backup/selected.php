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