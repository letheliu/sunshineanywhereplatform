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
	if(kword.value=="��������������...")
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
	   	   $('search_icon').title="����ؼ���";
	   	   $('search_icon').onclick=function(){kword.value='��������������...';$('search_icon').src="/images/quicksearch.gif";$('search_icon').title="";$('search_icon').onclick=null;};
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
$sql = "select * from dorm_building where ������ʦһ = '$LOGIN_USER_NAME' or ������ʦ�� = '$LOGIN_USER_NAME' or ������ʦ�� = '$LOGIN_USER_NAME' or ������ʦ�� = '$LOGIN_USER_NAME'";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)				{
	$����¥���� = $rs_a[$i]['����¥����'];
	$������ʦһ = $rs_a[$i]['������ʦһ'];
	$������ʦ�� = $rs_a[$i]['������ʦ��'];
	$������ʦ�� = $rs_a[$i]['������ʦ��'];
	$����Χһ = $rs_a[$i]['����Χһ'];
	$����Χ�� = $rs_a[$i]['����Χ��'];
	$����Χ�� = $rs_a[$i]['����Χ��'];

	$������ʦ�� = $rs_a[$i]['������ʦ��'];
	$����Χ�� = $rs_a[$i]['����Χ��'];

	if($������ʦһ==$LOGIN_USER_NAME)		{
		$����ΧһArray = explode(',',$����Χһ);
		for($ii=0;$ii<sizeof($����ΧһArray);$ii++)		{
			$¥���� = $����ΧһArray[$ii];
			if($¥����!="")		{
				$sql = "select �������� from dorm_room where ¥���� = '$¥����' and ����¥ = '$����¥����'";
				$rsX = $db->CacheExecute(150,$sql);
				$rsX_a = $rsX->GetArray();
				for($iX=0;$iX<sizeof($rsX_a);$iX++)				{
					$�������� = $rsX_a[$iX]['��������'];
					$NewArray[$��������] = $��������;
				}
			}
		}
	}
	if($������ʦ��==$LOGIN_USER_NAME)		{
		$����Χ��Array = explode(',',$����Χ��);
		for($ii=0;$ii<sizeof($����Χ��Array);$ii++)		{
			$¥���� = $����Χ��Array[$ii];
			if($¥����!="")		{
				$sql = "select �������� from dorm_room where ¥���� = '$¥����' and ����¥ = '$����¥����'";
				$rsX = $db->CacheExecute(150,$sql);
				$rsX_a = $rsX->GetArray();
				for($iX=0;$iX<sizeof($rsX_a);$iX++)				{
					$�������� = $rsX_a[$iX]['��������'];
					$NewArray[$��������] = $��������;
				}
			}
		}
	}
	if($������ʦ��==$LOGIN_USER_NAME)		{
		$����Χ��Array = explode(',',$����Χ��);
		for($ii=0;$ii<sizeof($����Χ��Array);$ii++)		{
			$¥���� = $����Χ��Array[$ii];
			if($¥����!="")		{
				$sql = "select �������� from dorm_room where ¥���� = '$¥����' and ����¥ = '$����¥����'";
				$rsX = $db->CacheExecute(150,$sql);
				$rsX_a = $rsX->GetArray();
				for($iX=0;$iX<sizeof($rsX_a);$iX++)				{
					$�������� = $rsX_a[$iX]['��������'];
					$NewArray[$��������] = $��������;
				}
			}
		}
	}

	if($������ʦ��==$LOGIN_USER_NAME)		{
		$����Χ��Array = explode(',',$����Χ��);
		for($ii=0;$ii<sizeof($����Χ��Array);$ii++)		{
			$¥���� = $����Χ��Array[$ii];
			if($¥����!="")		{
				$sql = "select �������� from dorm_room where ¥���� = '$¥����' and ����¥ = '$����¥����'";
				$rsX = $db->CacheExecute(150,$sql);
				$rsX_a = $rsX->GetArray();
				for($iX=0;$iX<sizeof($rsX_a);$iX++)				{
					$�������� = $rsX_a[$iX]['��������'];
					$NewArray[$��������] = $��������;
				}
			}
		}
	}
}

$NewArray = @array_keys($NewArray);
$��������TEXT = "'".@join("','",$NewArray)."'";


if($_GET['����¥']!="")		{
	$AddSql = " where ����¥='".$_GET['����¥']."' and �������� in ($��������TEXT)";
}
else if($_GET['action']=="SEARCH")	{
	$KEYVALUE = $_GET['KEYVALUE'];
	$AddSql = " where �������� like '%$KEYVALUE%' and �������� in ($��������TEXT)";
}//print_R($_GET);
else	{
	$AddSql = " where �������� in ($��������TEXT)";

}
//print $AddSql;

echo "<table class=\"TableBlock trHover\" width=\"100%\">\r\n<tr class=\"TableHeader\">\r\n  <td align=\"center\"><b>ѡ�񷿼�</b></td>\r\n</tr>\r\n\r\n";

$sql = "select * from dorm_room $AddSql order by ��������,�������� ";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<sizeof($rs_a);$i++)			{
	$�������� = $rs_a[$i]['��������'];
	$��������= $rs_a[$i]['��������'];

	echo "\r\n<tr class=\"TableData\">\r\n  <td class=\"menulines\" align=\"center\" onclick=\"javascript:add_user('";
	echo $��������;
	echo "','";
	echo "".$��������."";
	echo "')\" style=\"cursor:hand\">";
	echo "".$��������."[".$��������."]";
	echo "</td>\r\n</tr>\r\n";
}

echo "</table>";
echo "\r\n</body>\r\n</html>\r\n";
?><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>