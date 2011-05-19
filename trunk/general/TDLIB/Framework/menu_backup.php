<?
require_once('lib.inc.php');
$GLOBA_SESSION=returnsession();
global $SUNSHINE_USER_ID_VAR,$_SESSION,$SUNSHINE_USER_PRIV_VAR;
$lang=returnsystemlang();
$USER_PRIV=$_SESSION[$SUNSHINE_USER_PRIV_VAR];
$USER_ID=$_SESSION[$SUNSHINE_USER_ID_VAR];
$USER_PRIV=($USER_PRIV!='')?$USER_PRIV:returntablefield('user','USER_ID',$USER_ID,'USER_PRIV');
$sql="select FUNC_ID_STR from user_priv where USER_PRIV='".$USER_PRIV."'";
$rs=$db->CacheExecute(150,$sql);
$FUNC_ID_STR_SYS=$rs->fields['FUNC_ID_STR'];
$FUNC_ID_STR_ARRAY=explode(',',$FUNC_ID_STR_SYS);
//print_R($_SESSION);


$LOGIN_THEME = $_SESSION['SUNSHINE_USER_LOGIN_THEME'];
$LOGIN_THEME==""?$LOGIN_THEME=$SYSTEM_THEME:'';
//print_R($_GET);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="../theme/<?=$LOGIN_THEME?>/style.css" rel=stylesheet>
<STYLE type=text/css>A:link {
	COLOR: #000000; TEXT-DECORATION: none
}
A:visited {
	COLOR: #000000; TEXT-DECORATION: none
}
A:active {
	COLOR: #3333ff; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ff0000; TEXT-DECORATION: none
}
</STYLE>

<META content="MSHTML 6.00.2800.1106" name=GENERATOR></HEAD>
<BODY class=panel ><!-- OA树开始-->
<?
$ExecTimeBegin=getmicrotime();
global $db;
if($_GET['MENU_ID']!="")		{
	$whereSql = "where MENU_ID = '".$_GET['MENU_ID']."'";
}
else	{
	$whereSql = "";
}
$sql="select * from sys_function order by MENU_ID";
//print $sql;
//print_R($_GET);
$rs=$db->CacheExecute(150,$sql);
$rs_array=$rs->GetArray();//print_R($rs_array);exit;
$menu_mark='MENU_';
$FUNC_NAME_MENU='FUNC_NAME';
foreach($rs_array as $list)			{
	$FUNC_ID = $list['FUNC_ID'];
	$list['FUNC_LINK'] = $list['FUNC_CODE'];
	$MEMO = $list['MEMO'];
	$ischecked=in_array($FUNC_ID,$FUNC_ID_STR_ARRAY);
	if($ischecked)					{
	$strlen=strlen($list['MENU_ID']);
	switch($strlen)		{
		case 2:
			print $list['MENU_ID']."<BR>";
			break;
		case 4:
			$menu['index'][substr($list['MENU_ID'],0,2)][substr($list['MENU_ID'],2,2)]=$list['MENU_ID'];
			$menu['index_name'][$FUNC_NAME_MENU][''.$list['MENU_ID'].'']=$list[$FUNC_NAME_MENU];
			$menu['index_name']['FUNC_CODE'][''.$list['MENU_ID'].'']=$list['FUNC_CODE'];
			$menu['index_name']['FUNC_LINK'][''.$list['MENU_ID'].'']=$list['FUNC_LINK'];
			$menu['index_name']['FUNC_ID'][''.$list['MENU_ID'].'']=$list['FUNC_ID'];
			$menu['index_name']['MEMO'][''.$list['MENU_ID'].'']=$list['MEMO'];
			break;
		case 6:
			$menu['index'][substr($list['MENU_ID'],0,4)][substr($list['MENU_ID'],4,2)]=$list['MENU_ID'];
			$menu['index_name'][$FUNC_NAME_MENU][''.$list['MENU_ID'].'']=$list[$FUNC_NAME_MENU];
			$menu['index_name']['FUNC_CODE'][''.$list['MENU_ID'].'']=$list['FUNC_CODE'];
			$menu['index_name']['FUNC_LINK'][''.$list['MENU_ID'].'']=$list['FUNC_LINK'];
			$menu['index_name']['FUNC_ID'][''.$list['MENU_ID'].'']=$list['FUNC_ID'];
			$menu['index_name']['MEMO'][''.$list['MENU_ID'].'']=$list['MEMO'];
			break;
	}//end switch
	isset($ischecked);
	}
	else	{
	}
}
//print_R($menu);exit;
//asort($menu['index']);print_R($menu['index']);exit;
//print_R($menu['index']['09']);
//print_R($menu_affixation);
$sql="select * from sys_menu $whereSql order by MENU_ID";//print $sql;
$rs_menu=$db->CacheExecute(150,$sql);
$rs_array_menu=$rs_menu->GetArray();
$i_menu=0;
//print_R($rs_array_menu);

//过滤出管理控制台及普通用户区别
if($_GET['MENU_ID']=="00"||$_GET['MENU_ID']=="")				{
	if(
		$_SESSION['SUNSHINE_USER_NAME']=="admin"&&
		$_SESSION['SUNSHINE_USER_UNIT_NAME']=="郑州单点科技软件有限公司"&&
		$_SESSION['SUNSHINE_USER_PRIV_NAME']=="系统管理员"&&
		$_SESSION['SUNSHINE_UNIT_ID']=="1"
	)		{
		//DO NOTHING
	}
	else			{
		//array_pop($rs_array_menu);
		//array_pop($rs_array_menu);
	}
}

switch($systemlang)					{
	case 'en':
		$MENU_NAME_MENU='ENGLISHNAME';
		break;
	case 'zh':
		$MENU_NAME_MENU='MENU_NAME';
		break;
	default:
		$MENU_NAME_MENU='MENU_NAME';
}

foreach($rs_array_menu as $list_menu)	{
	if(++$i_menu == sizeof($rs_array_menu))		{
		$tree_pic2="tree_transp.gif";
		$image='tree_plusl.gif';
	}
	else		{
		$tree_pic2="tree_line.gif";
		$image='tree_plus.gif';
	}
	//定量时图片选择
	if($_GET['MENU_ID']!=""&&$_GET['MENU_ID']!="00")		{
		$image='tree_minusl.gif';
	}
	//purview begin
	if(sizeof($menu['index'][''.$list_menu['MENU_ID'].''])>0)					{
	parent_table_1($list_menu[$MENU_NAME_MENU],$list_menu['IMAGE'].".gif",$list_menu['MENU_ID'],$image);

	part_table_begin($list_menu['MENU_ID']);
	sort($menu['index'][''.$list_menu['MENU_ID'].'']);
	$i=0;
	foreach($menu['index'][''.$list_menu['MENU_ID'].''] as $menu_list)		{
		$menu_2=$menu['index'][$menu_list];		++$i;
		$pic_array=explode('/',$menu['index_name']['FUNC_CODE'][$menu_list]);
		$pic=$pic_array[0].".gif";
		if(is_array($menu_2))	{

			if(sizeof($menu['index'][''.$list_menu['MENU_ID'].''])==$i )		{
				$tree_plus='tree_plusl.gif';
				$tree_pic3='tree_transp.gif';
			}
			else	{
				$tree_plus='tree_plus.gif';
				$tree_pic3='tree_line.gif';
			}

			$sysfunctionid=$menu['index_name']['FUNC_ID'][$menu_list];

			$ischecked=in_array($sysfunctionid,$FUNC_ID_STR_ARRAY);
			parent_table_2($menu['index_name'][$FUNC_NAME_MENU][$menu_list],$menu['index_name']['MEMO'][$menu_list],$pic,$menu_list,$tree_plus,$tree_pic2);
			part_table_begin($menu_list);
			foreach($menu_2 as $list)			{
			++$ii;
			if(sizeof($menu_2)==$ii)	{
				$tree_pic="tree_blankl.gif";
				$ii=0;
			}
			else		{
				$tree_pic="tree_blank.gif";
			}
			$ischecked=in_array($menu['index_name']['FUNC_ID'][$list],$FUNC_ID_STR_ARRAY);
			$pic_array=explode('/',$menu['index_name']['FUNC_CODE'][$list]);
			$pic=$pic_array[0].".gif";
			menu_table_3($menu['index_name'][$FUNC_NAME_MENU][$list],$menu['index_name']['FUNC_LINK'][$list],$menu['index_name']['MEMO'][$list],$pic,$tree_pic,$tree_pic2,$tree_pic3);
			isset($ischecked);
			}//end foreach
			part_table_end();
		}
		else	{
			if(sizeof($menu['index'][''.$list_menu['MENU_ID'].''])==$i)		{
				$tree_pic="tree_blankl.gif";
			}
			else	{
				$tree_pic="tree_blank.gif";
			}
			//print $menu['index_name']['FUNC_ID'][$menu_list];
			$ischecked=in_array($menu['index_name']['FUNC_ID'][$menu_list],$FUNC_ID_STR_ARRAY);
			//if($ischecked)		{
			menu_table_2($menu['index_name'][$FUNC_NAME_MENU][$menu_list],$menu['index_name']['FUNC_LINK'][$menu_list],$menu['index_name']['MEMO'][$menu_list],$pic,$tree_pic,$tree_pic2);
			isset($ischecked);
			//}
		}
	}
	}//end if purview
	part_table_end();

}




function menu_table_3($showtext,$url,$MEMO,$pic,$tree_pic="tree_blank.gif",$tree_pic2="tree_line.gif",$tree_pic3='tree_line.gif')	{
	if(!is_file("../../../Framework/images/menu/$pic"))		$pic = "2042.gif";
	$MEMO==""?$MEMO = $showtext : '';
	print "<TABLE class=small cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD><IMG src=\"../../../Framework/images/menu/$tree_pic2\"></TD>\n";
    print "<TD><IMG src=\"../../../Framework/images/menu/$tree_pic3\" border=0></TD>\n";
    print "<TD><IMG src=\"../../../Framework/images/menu/$tree_pic\"></TD>\n";
    print "<TD nowrap><A title = '$MEMO' href=\"javascript:openURL('$url')\"><IMG height=17 alt=$showtext src=\"../../../Framework/images/menu/$pic\" \n";
    print "width=17 border=0></a></TD>\n";
    print "<TD nowrap colSpan=2 title = '$MEMO'><A title = '$MEMO'  href=\"javascript:openURL('$url')\">&nbsp;$showtext</A>\n";
	print "</TD></TR></TBODY></TABLE>\n";
}
function menu_table_2($showtext,$url,$MEMO,$pic,$tree_pic="tree_blank.gif",$tree_pic2="tree_line.gif")	{
	$MEMO==""?$MEMO = $showtext : '';
	if(!is_file("../../../Framework/images/menu/$pic"))		$pic = "2042.gif";
	print "<TABLE class=small cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD><IMG src=\"../../../Framework/images/menu/$tree_pic2\"></TD>\n";
    print "<TD><IMG src=\"../../../Framework/images/menu/$tree_pic\"></TD>\n";
    print "<TD nowrap><A title = '$MEMO'  href=\"javascript:openURL('$url')\"><IMG height=17 alt=$showtext src=\"../../../Framework/images/menu/$pic\" \n";
    print "width=17 border=0></a></TD>\n";
    print "<TD nowrap colSpan=2 title = '$MEMO'><A title = '$MEMO' href=\"javascript:openURL('$url')\">&nbsp;$showtext</A>\n";
	print "</TD></TR></TBODY></TABLE>\n";
}
function parent_table_1($showtext="我的办公桌",$pic="mytable.gif",$id="01",$image='tree_plus.gif')	{
	global $menu_mark;
	//if(!is_file("../../../Framework/images/menu/$pic"))		$pic = "2041.gif";
	print "<TABLE class=small cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD nowrap><A href=\"javascript:myclick(".$menu_mark.$id.")\"><IMG class=outline id=".$menu_mark.$id." style=\"CURSOR: hand\" src=\"../../../Framework/images/menu/$image\" border=0></a></TD>\n";
    print "<TD nowrap><A href=\"javascript:myclick(".$menu_mark.$id.")\"><IMG height=17 alt=$showtext src=\"../../../Framework/images/menu/$pic\" width=17 border=0></a></TD>\n";
    print "<TD colSpan=3 nowrap><A href=\"javascript:myclick(".$menu_mark.$id.")\">&nbsp;$showtext</A>\n";
	print "</TD></TR></TBODY></TABLE>\n";
}
function parent_table_2($showtext="电子邮件",$MEMO,$pic="@mail.gif",$id="01",$tree_plus='tree_plus.gif',$tree_pic2='tree_line.gif')	{
	global $menu_mark;
	global $_GET;
	$MEMO==""?$MEMO = $showtext : '';
	//定量时图片选择
	if($_GET['MENU_ID']!=""&&$_GET['MENU_ID']!="00")		{
		$tree_plus='tree_minusl.gif';
	}
	print "<TABLE class=small cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD><IMG src=\"../../../Framework/images/menu/$tree_pic2\" border=0></TD>\n";
    print "<TD><A title = '$MEMO'  href=\"javascript:myclick(".$menu_mark.$id.")\"><IMG class=outline id=".$menu_mark.$id." style=\"CURSOR: hand\" src=\"../../../Framework/images/menu/$tree_plus\" border=0></a></TD>\n";
    print "<TD><A title = '$MEMO'  href=\"javascript:myclick(".$menu_mark.$id.")\"><IMG height=17 alt=$showtext src=\"../../../Framework/images/menu/$pic\" width=17 border=0></a></TD>\n";
    print "<TD colSpan=2 title = '$MEMO'><A title = '$MEMO'  href=\"javascript:myclick(".$menu_mark.$id.")\">&nbsp;$showtext</A>\n";
	print "</TD></TR></TBODY></TABLE>\n";
}
function part_table_begin($id="0104")	{
	global $menu_mark;
	global $_GET;
	if($_GET['MENU_ID']!=""&&$_GET['MENU_ID']!="00")	{
		$hand = "hand";
	}
	else	{
		$hand = "none";
	}
	print "<TABLE class=small id=".$menu_mark.$id."d style=\"DISPLAY: ".$hand."\" cellSpacing=0 cellPadding=0 border=0>\n";
    print "<TBODY>\n";
    print "<TR>\n";
    print "<TD>\n";
}
function part_table_end()	{
	print "</TD></TR></TBODY></TABLE>\n";
}

?>

<SCRIPT language=JavaScript>
var openedid;
var openedid_ft;
var flag=0,sflag=0;

//-------- 菜单点击事件 -------
function myclick(srcelement)
{
  var targetid,srcelement,targetelement;
  var strbuf;

  //-------- 如果点击了展开或收缩按钮---------
  if(srcelement.className=="outline")
  {
     //if(srcelement.title!="" && srcelement.src.indexOf("plus")>-1)
       // menu_shrink();

     targetid=srcelement.id+"d";
     targetelement=document.all(targetid);

     if (targetelement.style.display=="none")
     {
        targetelement.style.display='';
        strbuf=srcelement.src;
        if(strbuf.indexOf("plus.gif")>-1)
                srcelement.src="./images/menu/tree_minus.gif";
        else
                srcelement.src="./images/menu/tree_minusl.gif";
     }
     else
     {
        targetelement.style.display="none";
        strbuf=srcelement.src;
        if(strbuf.indexOf("minus.gif")>-1)
                srcelement.src="./images/menu/tree_plus.gif";
        else
                srcelement.src="./images/menu/tree_plusl.gif";
     }
  }
}
<?
if(is_dir("../../../module/word_model"))		{
	print "function openURL(URL){parent.parent.table_index.table_main.location=URL;}";
}
else	{
	print "function openURL(URL){parent.parent.table_index.table_main.location=\"../../\"+URL;}";
}

?>


</SCRIPT>
</TR></TBODY></TABLE></BODY></HTML>