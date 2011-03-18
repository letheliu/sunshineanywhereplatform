<?php

require_once('../../../adodb/adodb.inc.php');
require_once('../../../config.inc.php');
require_once('../../../setting.inc.php');
require_once('../../../adodb/session/adodb-session2.php');

$GLOBAL_SESSION=returnsession();
//print_R($db);exit;

?>

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
   parent.user.location="user.php?TO_ID=TO_ID&TO_NAME=TO_NAME&FORM_NAME=form1";
}
var ctroltime=null,key="";
function CheckSend()
{
	var kword=$("kword");
	if(kword.value=="按房间名称搜索...")
	   kword.value="";
  if(kword.value=="" && $('search_icon').src.indexOf("/images/quicksearch.gif")==-1)
	{
	   $('search_icon').src="/images/quicksearch.gif";
	}
	if(key!=kword.value && kword.value!="")
	{
     key=kword.value;
	   parent.user.location="user.php?action=SEARCH&TO_ID=<?=$_GET['TO_ID']?>&TO_NAME=<?=$_GET['TO_NAME']?>&FORM_NAME=<?=$_GET['FORM_NAME']?>&KEYVALUE="+kword.value;
	   if($('search_icon').src.indexOf("/images/quicksearch.gif")>=0)
	   {
	   	   $('search_icon').src="/images/closesearch.gif";
	   	   $('search_icon').title="清除关键字";
	   	   $('search_icon').onclick=function(){kword.value='按房间名称搜索...';$('search_icon').src="/images/quicksearch.gif";$('search_icon').title="";$('search_icon').onclick=null;};
	   }
  }
  ctroltime=setTimeout(CheckSend,100);
}
function click_node(the_id,checked,para_id,para_value)
{
	parent.user.location="children.php?MODULE_ID=&DEPT_ID="+the_id+"&CHECKED="+checked+"&"+para_id+"="+para_value;
}
</script>
</head>

<body class="bodycolor"  topmargin="1" leftmargin="0">


<table class="TableBlock trHover" width="100%" align="center">

<?
print "
	<tr class=TableHeader>
	<td align=center >可管理房间列表</td>
	</tr>
	";
$MANAGE_FLAG = $_GET['MANAGE_FLAG'];

$sunshine_teacher_banzhuren_class = $_SESSION['sunshine_teacher_banzhuren_class'];
$sunshine_teacher_banzhuren_class_array = explode(',',$sunshine_teacher_banzhuren_class);
$sunshine_teacher_banzhuren_class_Text = "'".join("','",$sunshine_teacher_banzhuren_class_array)."'";
$sql = "select distinct 房间名称 from dorm_room where						(
			所属班级 in ($sunshine_teacher_banzhuren_class_Text) or
			所属班级一 in ($sunshine_teacher_banzhuren_class_Text) or
			所属班级二 in ($sunshine_teacher_banzhuren_class_Text) or
			所属班级三 in ($sunshine_teacher_banzhuren_class_Text) or
			所属班级四 in ($sunshine_teacher_banzhuren_class_Text) or
			所属班级五 in ($sunshine_teacher_banzhuren_class_Text) or
			所属班级六 in ($sunshine_teacher_banzhuren_class_Text) or
			所属班级七 in ($sunshine_teacher_banzhuren_class_Text) or
			所属班级八 in ($sunshine_teacher_banzhuren_class_Text) )
			and 性别='$MANAGE_FLAG' order by 房间名称";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
//print $sql;
for($i=0;$i<sizeof($rs_a);$i++)			{
	$房间名称 = $rs_a[$i]['房间名称'];
	print "
	<tr class=TableData>
	<td align=center onclick=\"javascript:parent.user.location='user.php?房间名称=$房间名称&TO_ID=".$_GET['TO_ID']."&TO_NAME=".$_GET['TO_NAME']."&FORM_NAME=".$_GET['FORM_NAME']."';\" style=\"cursor:pointer\">[".$MANAGE_FLAG."生宿舍]".$房间名称."</td>
	</tr>
	";
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