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
  if(kword.value=="" && $('search_icon').src.indexOf("../../../Framework/images/quicksearch.gif")==-1)
	{
	   $('search_icon').src="../../../Framework/images/quicksearch.gif";
	}
	if(key!=kword.value && kword.value!="")
	{
     key=kword.value;
	   parent.user.location="user.php?action=SEARCH&TO_ID=<?=$_GET['TO_ID']?>&TO_NAME=<?=$_GET['TO_NAME']?>&FORM_NAME=<?=$_GET['FORM_NAME']?>&KEYVALUE="+kword.value;
	   if($('search_icon').src.indexOf("../../../Framework/images/quicksearch.gif")>=0)
	   {
	   	   $('search_icon').src="/images/closesearch.gif";
	   	   $('search_icon').title="清除关键字";
	   	   $('search_icon').onclick=function(){kword.value='按房间名称搜索...';$('search_icon').src="../../../Framework/images/quicksearch.gif";$('search_icon').title="";$('search_icon').onclick=null;};
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
<div style="border:1px solid #000000;margin-left:2px;background:#FFFFFF;">
  <input type="text" id="kword" name="kword" value="按房间名称搜索..." onfocus="ctroltime=setTimeout(CheckSend,100);" onblur="clearTimeout(ctroltime);if(this.value=='')this.value='按房间名称搜索...';" class="SmallInput" style="border:0px; color:#A0A0A0;width:145px;"><img id="search_icon" src="../../../Framework/images/quicksearch.gif" align=absmiddle style="cursor:pointer;">
</div>

<table class="TableBlock trHover" width="100%" align="center">

<?

$LOGIN_USER_NAME = $_SESSION['LOGIN_USER_NAME'];
$sql = "select * from dorm_building where 生管老师一 = '$LOGIN_USER_NAME' or 生管老师二 = '$LOGIN_USER_NAME' or 生管老师三 = '$LOGIN_USER_NAME' or 生管老师四 = '$LOGIN_USER_NAME'";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$宿舍楼名称 = $rs_a[$i]['宿舍楼名称'];
	$生管老师一 = $rs_a[$i]['生管老师一'];
	$生管老师二 = $rs_a[$i]['生管老师二'];
	$生管老师三 = $rs_a[$i]['生管老师三'];
	$管理范围一 = $rs_a[$i]['管理范围一'];
	$管理范围二 = $rs_a[$i]['管理范围二'];
	$管理范围三 = $rs_a[$i]['管理范围三'];

	$生管老师四 = $rs_a[$i]['生管老师四'];
	$管理范围四 = $rs_a[$i]['管理范围四'];

	if($生管老师一==$LOGIN_USER_NAME)		{
		$管理范围一Array = explode(',',$管理范围一);
		for($ii=0;$ii<sizeof($管理范围一Array);$ii++)		{
			$楼层数 = $管理范围一Array[$ii];
			if($楼层数!="")		{
				$sql = "select 房间名称 from dorm_room where 楼层数 = '$楼层数' and 宿舍楼 = '$宿舍楼名称'";
				$rsX = $db->CacheExecute(150,$sql);
				$rsX_a = $rsX->GetArray();
				for($iX=0;$iX<sizeof($rsX_a);$iX++)				{
					$房间名称 = $rsX_a[$iX]['房间名称'];
					$NewArray[$房间名称] = $房间名称;
				}
			}
		}
	}
	if($生管老师二==$LOGIN_USER_NAME)		{
		$管理范围二Array = explode(',',$管理范围二);
		for($ii=0;$ii<sizeof($管理范围二Array);$ii++)		{
			$楼层数 = $管理范围二Array[$ii];
			if($楼层数!="")		{
				$sql = "select 房间名称 from dorm_room where 楼层数 = '$楼层数' and 宿舍楼 = '$宿舍楼名称'";
				$rsX = $db->CacheExecute(150,$sql);
				$rsX_a = $rsX->GetArray();
				for($iX=0;$iX<sizeof($rsX_a);$iX++)				{
					$房间名称 = $rsX_a[$iX]['房间名称'];
					$NewArray[$房间名称] = $房间名称;
				}
			}
		}
	}
	if($生管老师三==$LOGIN_USER_NAME)		{
		$管理范围三Array = explode(',',$管理范围三);
		for($ii=0;$ii<sizeof($管理范围三Array);$ii++)		{
			$楼层数 = $管理范围三Array[$ii];
			if($楼层数!="")		{
				$sql = "select 房间名称 from dorm_room where 楼层数 = '$楼层数' and 宿舍楼 = '$宿舍楼名称'";
				$rsX = $db->CacheExecute(150,$sql);
				$rsX_a = $rsX->GetArray();
				for($iX=0;$iX<sizeof($rsX_a);$iX++)				{
					$房间名称 = $rsX_a[$iX]['房间名称'];
					$NewArray[$房间名称] = $房间名称;
				}
			}
		}
	}

	if($生管老师四==$LOGIN_USER_NAME)		{
		$管理范围四Array = explode(',',$管理范围四);
		for($ii=0;$ii<sizeof($管理范围四Array);$ii++)		{
			$楼层数 = $管理范围四Array[$ii];
			if($楼层数!="")		{
				$sql = "select 房间名称 from dorm_room where 楼层数 = '$楼层数' and 宿舍楼 = '$宿舍楼名称'";
				$rsX = $db->CacheExecute(150,$sql);
				$rsX_a = $rsX->GetArray();
				for($iX=0;$iX<sizeof($rsX_a);$iX++)				{
					$房间名称 = $rsX_a[$iX]['房间名称'];
					$NewArray[$房间名称] = $房间名称;
				}
			}
		}
	}
}
//print_R($NewArray);
$NewArray = @array_keys($NewArray);
$房间名称TEXT = "'".@join("','",$NewArray)."'";


if($_GET['房间号']=="")				{
	$_GET['房间号'] = @join(',',$NewArray);
	if($_GET['房间号']=="")			{
		$_GET['房间号'] = "所属下面没有班级信息";
	}
}

print "
	<tr class=TableHeader>
	<td align=center >宿舍楼列表</td>
	</tr>
	";


$sql = "select distinct 宿舍楼 from dorm_room where 房间名称 in ($房间名称TEXT) order by 宿舍楼";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$宿舍楼 = $rs_a[$i]['宿舍楼'];
	print "
	<tr class=TableData>
	<td align=center onclick=\"javascript:parent.user.location='user.php?宿舍楼=$宿舍楼&TO_ID=".$_GET['TO_ID']."&TO_NAME=".$_GET['TO_NAME']."&FORM_NAME=".$_GET['FORM_NAME']."';\" style=\"cursor:pointer\">".$宿舍楼."</td>
	</tr>
	";
}
?>

</table>

</body>
</html>
