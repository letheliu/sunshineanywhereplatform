<?php
require_once('../../../adodb/adodb.inc.php');
require_once('../../../config.inc.php');
require_once('../../../setting.inc.php');
require_once('../../../adodb/session/adodb-session2.php');

$GLOBAL_SESSION=returnsession();

$sunshine_teacher_banzhuren_class = $_SESSION['sunshine_teacher_banzhuren_class'];
$sunshine_teacher_classTEXT  = $sunshine_teacher_banzhuren_class;
$sunshine_teacher_class_array = explode(',',$sunshine_teacher_classTEXT);
$sunshine_teacher_class_array_TEXT = "'".join("','",$sunshine_teacher_class_array)."'";

sort($sunshine_teacher_class_array);
$ARRAYNAME = explode('_',$_GET['MODULE_ID']);
if($ARRAYNAME[1]=="排座位"&&$_GET['班号']=="")		{
	$_GET['班号'] = $ARRAYNAME[0];
}
else if($_GET['MODULE_ID']==""&&$_GET['班号']=="")		{
	$_GET['班号'] = $sunshine_teacher_class_array[0];
}
//print_R($_GET);
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

if($_GET['班号']!="")		{
	$AddSql = " where 班号='".$_GET['班号']."' and 学生状态='正常状态'";
}

if($_GET['action']=="SEARCH")	{
	$KEYVALUE = $_GET['KEYVALUE'];
	$AddSql = " where (姓名 like '%$KEYVALUE%' or 学号 like '%$KEYVALUE%')  and 学生状态='正常状态'";
}//print_R($_GET);

//print $AddSql;




if($_GET['action2']=='')				{

	if($ARRAYNAME[1]=="排座位")			{
		$sql = "select 座号,学号,姓名 from edu_student $AddSql and 学号 not in
				(select 学生学号 from edu_zuoweixinxi where 所属班级='".$_GET['班号']."')
				order by 座号,学号,姓名";
	}
	else	{
		$sql = "select 座号,学号,姓名 from edu_student $AddSql order by 座号,学号,姓名";
	}
	//print $sql;
	$rs = $db->CacheExecute(15,$sql);
	$rs_a = $rs->GetArray();
	echo "<table class=\"TableBlock trHover\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\"><b>".$_GET['班号']."[".sizeof($rs_a)."人]</b></td>\r\n</tr>\r\n\r\n";
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$姓名 = $rs_a[$i]['姓名'];
		$学号 = $rs_a[$i]['学号'];
		$座号 = $rs_a[$i]['座号'];
		echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines\" align=\"center\" onclick=\"javascript:add_user('";
		echo $学号;
		echo "','";
		echo "".$姓名."";
		echo "')\" style=\"cursor:hand\">";
		echo "".$姓名."[".$学号."][".$座号."]";
		echo "</td>\r\n</tr>\r\n";
	}

}

elseif($_GET['action2']=='按班委选择')				{
	echo "<table class=\"TableBlock trHover\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\"><b>学生列表[按班委选择]</b></td>\r\n</tr>\r\n\r\n";
	$sql = "select 所属班级,学号,姓名 from edu_banweiguanli
			where 所属班级 in ($sunshine_teacher_class_array_TEXT) and 学号!='' order by 姓名";
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs->GetArray();
	//print $sql;
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$姓名 = $rs_a[$i]['姓名'];
		$学号 = $rs_a[$i]['学号'];
		$所属班级 = $rs_a[$i]['所属班级'];

		echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines\" align=\"center\" onclick=\"javascript:add_user('";
		echo $学号;
		echo "','";
		echo "".$姓名."";
		echo "')\" style=\"cursor:hand\">";
		echo "".$姓名."[".$学号."][".$所属班级."]";
		echo "</td>\r\n</tr>\r\n";
	}
}

elseif($_GET['action2']=='按宿舍长选择')				{
	echo "<table class=\"TableBlock trHover\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\"><b>学生列表[按宿舍长选择]</b></td>\r\n</tr>\r\n\r\n";
	$sql = "select 宿舍长,房间名称 from dorm_room
			where
			(
			(所属班级 in ($sunshine_teacher_class_array_TEXT))
			or (所属班级一 in ($sunshine_teacher_class_array_TEXT))
			or (所属班级二 in ($sunshine_teacher_class_array_TEXT))
			or (所属班级三 in ($sunshine_teacher_class_array_TEXT))
			or (所属班级四 in ($sunshine_teacher_class_array_TEXT))
			or (所属班级五 in ($sunshine_teacher_class_array_TEXT))
			or (所属班级六 in ($sunshine_teacher_class_array_TEXT))
			or (所属班级七 in ($sunshine_teacher_class_array_TEXT))
			or (所属班级八 in ($sunshine_teacher_class_array_TEXT))
			)
			and 宿舍长!=''
			order by 宿舍长";
	//print $sql;
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$姓名 = $rs_a[$i]['宿舍长'];
		$房间名称 = $rs_a[$i]['房间名称'];
		$sql = "select 学号 from edu_student where 班号 in ($sunshine_teacher_class_array_TEXT) and 姓名='$姓名'";
		$rs = $db->CacheExecute(150,$sql);
		$学号 = $rs->fields['学号'];
		if($学号!="")				{
			echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines\" align=\"center\" onclick=\"javascript:add_user('";
			echo $学号;
			echo "','";
			echo "".$姓名."";
			echo "')\" style=\"cursor:hand\">";
			echo "".$姓名."[".$学号."][".$所属班级."]";
			echo "</td>\r\n</tr>\r\n";
		}
	}
}



echo "</table>";
echo "\r\n</body>\r\n</html>\r\n";
?>
