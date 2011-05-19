<?php
require_once('../../../adodb/adodb.inc.php');
require_once('../../../config.inc.php');
require_once('../../../setting.inc.php');
require_once('../../../adodb/session/adodb-session2.php');

$GLOBAL_SESSION=returnsession();

$sunshine_teacher_class = $_SESSION['sunshine_teacher_class'];
$sunshine_teacher_class_array = explode(',',$sunshine_teacher_class);
sort($sunshine_teacher_class_array);

if($_GET['组别名称']=="")		{
	$_GET['组别名称'] = $sunshine_teacher_class_array[0];
}

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
echo ".value += user_id+',';\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value += user_name+',';\r\n  }\r\n  }\r\n</script>\r\n</head>\r\n\r\n<body class=\"bodycolor\" topmargin=\"1\" leftmargin=\"0\" >\r\n\r\n";
//parent.close();\r\n

if($_GET['组别名称']!="")		{
	$AddSql = " and 组别名称='".$_GET['组别名称']."' ";
}

if($_GET['action']=="SEARCH")	{
	$KEYVALUE = $_GET['KEYVALUE'];
	$AddSql = " and (姓名 like '%$KEYVALUE%' or 学号 like '%$KEYVALUE%')  and 学生状态='正常状态'";
}//print_R($_GET);

//print $AddSql;

if($_GET['组别名称']=="")			{
	$_GET['组别名称'] = "请先选择班级";
}

$当前时间 = date("Y-m-d",mktime(1,1,1,7,30,date('Y')+1));

echo "<table class=\"TableBlock trHover\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\" nowrap><b>成员列表[".$_GET['组别名称']."]</b></td>\r\n</tr>\r\n\r\n";
$组别名称=$_GET['组别名称'];
$sql = "select 组成员 from ceping_renyuan_grop where 组别名称='$组别名称'";
$rs = $db->CacheExecute(150,$sql);
$组成员 = $rs->fields['组成员'];
$arr = split(",",$组成员);
//echo $组成员;exit;
for($i=0;$i<sizeof($arr);$i++)			{
	$用户ID = $arr[$i];
	if($用户ID=="") continue;
	$msql	= "select USER_NAME from user where USER_ID='$用户ID'";
	$mrs	= $db->CacheExecute(150,$msql);
	$姓名	= $mrs->fields['USER_NAME'];
if($姓名==null) $姓名=$用户ID;
	echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines\" title=\"".$姓名."[".$用户ID."][".$_GET['组别名称']."]\" align=\"center\" onclick=\"javascript:add_user('";
	echo $用户ID;
	echo "','";
	echo "".$姓名."";
	echo "')\" style=\"cursor:hand\">";
	echo "".$姓名."[".$用户ID."]";
	echo "</td>\r\n</tr>\r\n";
}

echo "</table>";
echo "\r\n</body>\r\n</html>\r\n";
?>
