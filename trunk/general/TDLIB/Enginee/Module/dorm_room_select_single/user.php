<?php
require_once('../../../adodb/adodb.inc.php');
require_once('../../../config.inc.php');
require_once('../../../setting.inc.php');
require_once('../../../adodb/session/adodb-session2.php');

$GLOBAL_SESSION=returnsession();


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
</script><?
echo "\r\n<script Language=\"JavaScript\">\r\nvar parent_window = parent.dialogArguments;\r\n";
if ( $TO_ID == "" || $TO_ID == "undefined" )
{
	$TO_ID = "TO_ID";
	$TO_NAME = "TO_NAME";
}
echo "function add_user(user_id,user_name)\r\n{\r\n  TO_VAL=parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value;\r\n  if(TO_VAL.indexOf(\",\"+user_id+\",\")<0 && TO_VAL.indexOf(user_id+\",\")!=0)\r\n  {\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=user_id;\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=user_name;\r\n  }\r\n  parent.close();\r\n}\r\n</script>\r\n</head>\r\n\r\n<body class=\"bodycolor\" topmargin=\"1\" leftmargin=\"0\" >\r\n\r\n";


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

$NewArray = @array_keys($NewArray);
$房间名称TEXT = "'".@join("','",$NewArray)."'";


if($_GET['宿舍楼']!="")		{
	$AddSql = " where 宿舍楼='".$_GET['宿舍楼']."' and 房间名称 in ($房间名称TEXT)";
}
else if($_GET['action']=="SEARCH")	{
	$KEYVALUE = $_GET['KEYVALUE'];
	$AddSql = " where 房间名称 like '%$KEYVALUE%' and 房间名称 in ($房间名称TEXT)";
}//print_R($_GET);
else	{
	$AddSql = " where 房间名称 in ($房间名称TEXT)";

}
//print $AddSql;

echo "<table class=\"TableBlock trHover\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\"><b>选择房间</b></td>\r\n</tr>\r\n\r\n";

$sql = "select * from dorm_room $AddSql order by 房间性质,房间名称 ";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$房间名称 = $rs_a[$i]['房间名称'];
	$房间性质= $rs_a[$i]['房间性质'];

	echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines\" align=\"center\" onclick=\"javascript:add_user('";
	echo $房间名称;
	echo "','";
	echo "".$房间名称."";
	echo "')\" style=\"cursor:hand\">";
	echo "".$房间名称."[".$房间性质."]";
	echo "</td>\r\n</tr>\r\n";
}

echo "</table>";
echo "\r\n</body>\r\n</html>\r\n";
?><?
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