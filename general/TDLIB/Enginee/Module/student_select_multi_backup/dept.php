<?
include_once($_SERVER['DOCUMENT_ROOT']."/inc/auth.php");
ob_end_clean();

if($LOGIN_NOT_VIEW_USER)
{
   Message("","无查看用户的权限","blank");
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
	if(kword.value=="按用户名或姓名搜索...")
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
	   	   $('search_icon').title="清除关键字";
	   	   $('search_icon').onclick=function(){kword.value='按用户名或姓名搜索...';$('search_icon').src="/images/quicksearch.gif";$('search_icon').title="";$('search_icon').onclick=null;};
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
  <input type="text" id="kword" name="kword" value="按用户名或姓名搜索..." onfocus="ctroltime=setTimeout(CheckSend,100);" onblur="clearTimeout(ctroltime);if(this.value=='')this.value='按用户名或姓名搜索...';" class="SmallInput" style="border:0px; color:#A0A0A0;width:145px;"><img id="search_icon" src="/images/quicksearch.gif" align=absmiddle style="cursor:pointer;">
</div>
<ul>
<!--============================ 部门 =======================================-->
  <li><a href="javascript:ShowSelected();" id="link_1"><span>已选人员</span></a></li>
  <li><a href="javascript:clickMenu('2');" id="link_2" class="active" title="点击伸缩列表"><span>按部门选择</span></a></li>
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
<!--============================ 角色 =======================================-->
  <li><a href="javascript:clickMenu('3');" id="link_3" title="点击伸缩列表"><span>按角色选择</span></a></li>
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
   Message("","没有定义角色","blank");
?>
    </table>
  </div>

<!--============================ 自定义组 =======================================-->
  <li><a href="javascript:clickMenu('4');" id="link_4" title="点击伸缩列表"><span>自定义组</span></a></li>
  <div id="module_4" class="moduleContainer" style="display:none">
    <table class="TableBlock trHover" width="100%" align="center">
<?
 //============================ 个人自定义组 =======================================
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
      <td align="center">个人自定义组</td>
    </tr>
<?
    }
?>
    <tr class="TableData">
      <td align="center" onclick="javascript:parent.user.location='user_define.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>&GROUP_ID=<?=$GROUP_ID?>';" style="cursor:pointer"><?=$GROUP_NAME?></td>
    </tr>
<?
 }
 
 //============================ 公共自定义组 =======================================
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
      <td align="center">公共自定义组</td>
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
   Message("","没有自定义组","blank");
?>
    </table>
  </div>
<!--============================ 在线人员 =======================================-->
  <li><a href="user_online.php?MODULE_ID=<?=$MODULE_ID?>&TO_ID=<?=$TO_ID?>&TO_NAME=<?=$TO_NAME?>&FORM_NAME=<?=$FORM_NAME?>" id="link_5" target="user" title="点击伸缩列表"><span>在线人员</span></a></li>
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
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前己经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
	*/
?>