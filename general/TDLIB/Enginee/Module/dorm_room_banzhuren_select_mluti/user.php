<?php
require_once('../../../adodb/adodb.inc.php');
require_once('../../../config.inc.php');
require_once('../../../setting.inc.php');
require_once('../../../Enginee/lib/select_menu.php');
require_once('../../../adodb/session/adodb-session2.php');

$GLOBAL_SESSION=returnsession();

$sunshine_teacher_banzhuren_class = $_SESSION['sunshine_teacher_banzhuren_class'];
$sunshine_teacher_classTEXT  = $sunshine_teacher_banzhuren_class;
$sunshine_teacher_class_array = explode(',',$sunshine_teacher_classTEXT);
$sunshine_teacher_class_arrayTEXT = "'".join("','",$sunshine_teacher_class_array)."'";

sort($sunshine_teacher_class_array);

if($_GET['房间名称']=="")		{
	$_GET['房间名称'] = $sunshine_teacher_class_array[0];
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
var allElements=document.getElementsByTagName("*");
var userAgent = navigator.userAgent.toLowerCase();
var isSafari = userAgent.indexOf("Safari")>=0;
var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);
var is_ie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);

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
	   //parent.user.location="user.php?action=SEARCH&TO_ID=<?=$_GET['TO_ID']?>&TO_NAME=<?=$_GET['TO_NAME']?>&FORM_NAME=<?=$_GET['FORM_NAME']?>&KEYVALUE="+kword.value;
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
	//parent.user.location="children.php?MODULE_ID=&DEPT_ID="+the_id+"&CHECKED="+checked+"&"+para_id+"="+para_value;
}
</script>
<?
echo "\r\n<script Language=\"JavaScript\">\r\n
var parent_window = parent.dialogArguments;\r\n
";
if ( $TO_ID == "" || $TO_ID == "undefined" )
{
	$TO_ID = "TO_ID";
	$TO_NAME = "TO_NAME";
}

print "function borderize_on(targetelement)
{
   if(targetelement.className.indexOf(\"TableRowActive\") < 0)
      targetelement.className = \"TableRowActive \" + targetelement.className;
}\n";

print "function borderize_off(targetelement)
{
   if(targetelement.className.indexOf(\"TableRowActive\") >= 0)
      targetelement.className = targetelement.className.substr(15);
}\n";

print "function begin_set()
{
  TO_VAL=parent_window.".$FORM_NAME.".".$TO_ID.".value;

  for (step_i=0; step_i<allElements.length; step_i++)
  {
    if(allElements[step_i].className.indexOf(\"menulines\")>=0)
    {
       user_id=allElements[step_i].id;
       if(TO_VAL.indexOf(\",\"+user_id+\",\")>0 || TO_VAL.indexOf(user_id+\",\")==0)
          borderize_on(allElements[step_i]);
    }
  }
  set_attend_status();
}\n";

?>

function add_all(flag)
{
  for (step_i=0; step_i<allElements.length; step_i++)
  {
    if(allElements[step_i].className.indexOf("menulines"+flag)>=0) borderize_on(allElements[step_i]);
  }
}

function del_all(flag)
{
  for (step_i=0; step_i<allElements.length; step_i++)
  {
    if(allElements[step_i].className.indexOf("menulines"+flag)>=0) borderize_off(allElements[step_i]);
  }
}

function set_attend_status()
{
   var evection = leave = out = null;
   var dept = parent.dept;
   if(dept)
   {
      evection = dept.document.getElementById('user_evection');
      leave = dept.document.getElementById('user_leave');
      out = dept.document.getElementById('user_out');
   }

   if(!evection || !leave || !out)
   {
      window.setTimeout(set_attend_status, 1000);
      return;
   }

   var user_evection = evection.innerText;
   var user_leave = leave.innerText;
   var user_out = out.innerText;

   var spans = document.getElementsByTagName("span");
   for(var i=0; i<spans.length; i++)
   {
      var span = spans[i];
      if(span.id.substr(0, 14) != "attend_status_" || span.innerHTML != "" || span.title == "" || span.title == "undefined")
         continue;

      var user_id = span.title;
      if(user_evection.indexOf(user_id+",") == 0 || user_evection.indexOf(","+user_id+",") > 0)
         span.innerHTML = "(出差)";
      else if(user_leave.indexOf(user_id+",") == 0 || user_leave.indexOf(","+user_id+",") > 0)
         span.innerHTML = "(请假)";
      else if(user_out.indexOf(user_id+",") == 0 || user_out.indexOf(","+user_id+",") > 0)
         span.innerHTML = "(外出)";
   }
}
<?
if($房间名称=="") $房间名称 = "没有所属房间信息";
$sql = "select 床位号,学号,姓名 from edu_student where 学生宿舍='".$房间名称."' and 班号 in ($sunshine_teacher_class_arrayTEXT) and 学生状态='正常状态'";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$姓名TEXT .= $rs_a[$i]['姓名'].",";
	$学号TEXT .= $rs_a[$i]['学号'].",";
}

echo "\r\nfunction clear_user()\r\n{\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value=\"\";\r\n    parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value=\"\";\r\n
}
\r\n
function add_all_user()  {
	parent_window.{$FORM_NAME}.{$TO_ID}.value = '$学号TEXT';
	parent_window.{$FORM_NAME}.{$TO_NAME}.value = '$姓名TEXT';
}
\r\n";

echo "function add_user(user_id,user_name)\r\n{\r\n ";
print "TO_VAL=parent_window.".$FORM_NAME.".".$TO_ID.".value;\r\n";
print "targetelement=$(user_id);\n";
print "TO_NAME_VAL=parent_window.form1.{$TO_NAME}.value;\n";
print "var TO_ID_VAL_Abled = TO_VAL.split(\",\");\n";
print "var TO_NAME_VAL_Abled = TO_NAME_VAL.split(\",\");\n";

print "if(TO_VAL.indexOf(\",\"+user_id+\",\")<0 && TO_VAL.indexOf(user_id+\",\")!=0)\r\n  {\r\n
parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_ID;
echo ".value += user_id+',';\r\n
parent_window.";
echo $FORM_NAME;
echo ".";
echo $TO_NAME;
echo ".value += user_name+',';\r\n
borderize_on(targetelement);
}\r\n";

print "else				{\r\n";
print "	var TO_ID_VALUE = '';\r\n";
print "	var TO_NAME_VALUE = '';\r\n";
print "	for (i = 0; i < TO_ID_VAL_Abled.length; i++)                             {\r\n";
print "	   if(TO_ID_VAL_Abled[i]!=user_id&&TO_ID_VAL_Abled[i]!='')			{\r\n";
print "		   TO_ID_VALUE += TO_ID_VAL_Abled[i]+\",\";\r\n";
print "		   TO_NAME_VALUE += TO_NAME_VAL_Abled[i]+\",\";\r\n";
print "	   }\r\n";
print "	}\r\n";
print "	parent_window.form1.{$TO_ID}.value = TO_ID_VALUE;\r\n";
print " parent_window.form1.{$TO_NAME}.value = TO_NAME_VALUE;\r\n";
print " borderize_off(targetelement);\n";
print "}\r\n";
//色彩过滤
//style=\"background:#7D95A5;\"
print "}\r\n</script>\r\n</head>\r\n\r\n
<body class=\"bodycolor\" topmargin=\"1\" leftmargin=\"0\"  onload=\"begin_set();\">
\r\n\r\n";
//print $sql;


//print $AddSql;

if($_GET['房间名称']!="")					{
	$房间名称 = $_GET['房间名称'];
	$所有床位数组 = array();
	$房间床位数 = returntablefield("dorm_room","房间名称",$房间名称,"房间床位数");
	for($i=1;$i<=$房间床位数;$i++)			{
		$所有床位数组[] = $i;
	}
	$sql = "select 床位号,学号,姓名 from edu_student where 学生宿舍='".$房间名称."' and 班号 in ($sunshine_teacher_class_arrayTEXT) and 学生状态='正常状态'";
	//print $sql;
	$rs = $db->CacheExecute(150,$sql);
	$rs_a = $rs->GetArray();
	$己经用过的床位 = array();
	$学号与床位号对应关系 = array();
	$姓名与床位号对应关系 = array();
	for($i=0;$i<sizeof($rs_a);$i++)			{
		$床位号 = $rs_a[$i]['床位号'];
		$学号 = $rs_a[$i]['学号'];
		$姓名 = $rs_a[$i]['姓名'];
		$己经用过的床位[] = $rs_a[$i]['床位号'];
		$学号与床位号对应关系[$房间名称][$床位号] = $学号;
		$姓名与床位号对应关系[$房间名称][$床位号] = $姓名;
	}
	//$余下床位号 = @array_diff($所有床位数组,$己经用过的床位);
	//$余下床位号 = @array_values($余下床位号);
	$余下床位号 = $己经用过的床位;
}

echo "<table class=\"TableBlock\" width=\"100%\">\r\n
<tr class=\"TableHeader\">\r\n
<td align=\"center\"><b>".$_GET['房间名称']."
<input type=\"button\" class=\"SmallButton\" value=\"清空\" onclick=\"clear_user();del_all('1');\">&nbsp;
<input type=\"button\" class=\"SmallButton\" value=\"全选\" onclick=\"add_all_user();add_all('1');\">&nbsp;
</b></td>\r\n
</tr>\r\n\r\n";
//<input type=\"button\" class=\"SmallButton\" value=\"清空\" onclick=\"clear_user();del_all('1');\">&nbsp;
//<input type=\"button\" class=\"SmallButton\" value=\"全选\" onclick=\"add_all_user();add_all('1');\">&nbsp;

for($i=0;$i<sizeof($余下床位号);$i++)			{
	$床位号 = $余下床位号[$i];
	$学号 = $学号与床位号对应关系[$房间名称][$床位号];
	$姓名 = $姓名与床位号对应关系[$房间名称][$床位号];
	echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines1\" align=\"center\" id='$学号' onclick=\"javascript:add_user('";
	echo $学号;
	echo "','";
	echo "".$房间名称."[$姓名]";
	echo "')\"  style=\"cursor:pointer\">";
	echo "[".$床位号."号]".$姓名."[$房间名称]";
	echo "</td>\r\n</tr>\r\n";
}

if(count($余下床位号)==0)		{
	echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines1\" align=\"center\">";
	print "请先在左边菜单栏选择房间信息";
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