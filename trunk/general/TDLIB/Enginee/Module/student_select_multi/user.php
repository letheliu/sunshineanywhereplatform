<?php
require_once('../../../adodb/adodb.inc.php');
require_once('../../../config.inc.php');
require_once('../../../setting.inc.php');
require_once('../../../adodb/session/adodb-session2.php');

$GLOBAL_SESSION=returnsession();

$sunshine_teacher_banzhuren_class = $_SESSION['sunshine_teacher_banzhuren_class'];
$sunshine_teacher_classTEXT  = $sunshine_teacher_banzhuren_class;
$sunshine_teacher_class_array = explode(',',$sunshine_teacher_classTEXT);

sort($sunshine_teacher_class_array);

if($_GET['���']=="")		{
	$_GET['���'] = $sunshine_teacher_class_array[0];
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
	if(kword.value=="��������������...")
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
	   	   $('search_icon').title="����ؼ���";
	   	   $('search_icon').onclick=function(){kword.value='��������������...';$('search_icon').src="/images/quicksearch.gif";$('search_icon').title="";$('search_icon').onclick=null;};
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
         span.innerHTML = "(����)";
      else if(user_leave.indexOf(user_id+",") == 0 || user_leave.indexOf(","+user_id+",") > 0)
         span.innerHTML = "(���)";
      else if(user_out.indexOf(user_id+",") == 0 || user_out.indexOf(","+user_id+",") > 0)
         span.innerHTML = "(���)";
   }
}
<?

$sql = "select ѧ��,���� from edu_student where ���='".$_GET['���']."' and ѧ��״̬='����״̬' order by ����,ѧ��,����";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$����TEXT .= $rs_a[$i]['����'].",";
	$ѧ��TEXT .= $rs_a[$i]['ѧ��'].",";
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
	parent_window.{$FORM_NAME}.{$TO_ID}.value = '$ѧ��TEXT';
	parent_window.{$FORM_NAME}.{$TO_NAME}.value = '$����TEXT';
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
//ɫ�ʹ���
//style=\"background:#7D95A5;\"
print "}\r\n</script>\r\n</head>\r\n\r\n
<body class=\"bodycolor\" topmargin=\"1\" leftmargin=\"0\"  onload=\"begin_set();\">
\r\n\r\n";

if($_GET['���']!="")		{
	$AddSql = " where ���='".$_GET['���']."' and ѧ��״̬='����״̬'";
}

$sunshine_teacher_banzhuren_class = $_SESSION['sunshine_teacher_banzhuren_class'];
$�༶INTEXT = ereg_replace(",","','",$sunshine_teacher_banzhuren_class);
$�༶INTEXT = "'".$�༶INTEXT."'";

if($_GET['action']=="SEARCH")	{
	$KEYVALUE = $_GET['KEYVALUE'];
	$AddSql = " where (���� like '%$KEYVALUE%' or ѧ�� like '%$KEYVALUE%') and ��� in ($�༶INTEXT) and ѧ��״̬='����״̬'";
}//print_R($_GET);

//print $AddSql;


echo "<table class=\"TableBlock\" width=\"100%\">\r\n
<tr class=\"TableHeader\">\r\n
<td align=\"center\"><b>".$_GET['���']."
<input type=\"button\" class=\"SmallButton\" value=\"���\" onclick=\"clear_user();del_all('1');\">&nbsp;
<input type=\"button\" class=\"SmallButton\" value=\"ȫѡ\" onclick=\"add_all_user();add_all('1');\">&nbsp;
</b></td>\r\n
</tr>\r\n\r\n";

$sql = "select ����,ѧ��,���� from edu_student $AddSql order by ����,ѧ��,����";
//print $sql;
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$���� = $rs_a[$i]['����'];
	$ѧ�� = $rs_a[$i]['ѧ��'];
	$���� = $rs_a[$i]['����'];
	//this.style.value='background:#C0BBB4;'
	echo "\r\n<tr class=\"TableData\">\r\n
	<td class=\"menulines1\" id='$ѧ��' align=\"center\"

	onclick=\"javascript:add_user('";
	echo $ѧ��;
	echo "','";
	echo "".$����."";
	echo "');\" style=\"cursor:pointer\">";
	echo "[".$����."��]".$����."[".$ѧ��."]";
	echo "</td>\r\n</tr>\r\n";
}

echo "</table>";
echo "\r\n</body>\r\n</html>\r\n";
?>
