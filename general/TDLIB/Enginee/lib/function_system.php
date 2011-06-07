<?
/*****************************************************************\
1、本系统为商业软件，受国家著作权法保护，任何人不得在
原作者未同意的基础上进行拷贝，或进行商业用途。
2、本次版本为非开源版，如果你使用，请注意获取许可证。
3、本系统作者保留一切相关的知识产权
\*****************************************************************/

//把数字金额转换成中文大写数字的函数
function num2rmb ($num){
$c1="零壹贰叁肆伍陆柒捌玖";
$c2="分角元拾佰仟万拾佰仟亿";

$num=round($num,2);
$num=$num*100;
$NewNum = ceil($num);
if(strlen($NewNum)>10){
return "金额太大";
}

$i=0;
$c="";

while (1){
if($i==0){
$n=substr($num,strlen($num)-1,1);
}else{
$n=$num %10;
}

$p1=substr($c1,2*$n,2);




$p2=substr($c2,2*$i,2);
if($n!='0' || ($n=='0' &&($p2=='亿' || $p2=='万' || $p2=='元' ))){
$c=$p1.$p2.$c;
}else{
$c=$p1.$c;
}

$i=$i+1;
$num=$num/10;
$num=(int)$num;

if($num==0){
break;
}
}//end of while| here, we got a chinese string with some useless character

//we chop out the useless characters to form the correct output
$j = 0;
$slen=strlen($c);
while ($j< $slen) {
$m = substr($c,$j,4);

if ($m=='零元' || $m=='零万' || $m=='零亿' || $m=='零零'){
$left=substr($c,0,$j);
$right=substr($c,$j+2);
$c = $left.$right;
$j = $j-2;
$slen = $slen-2;
}
$j=$j+2;
}

if(substr($c,strlen($c)-2,2)=='零'){
$c=substr($c,0,strlen($c)-2);
} // if there is a '0' on the end , chop it out

return $c;
}// end of function

//系统帮助文档说明表格形成部分
function systemhelpContent($title,$width='100%')		{
	global $db,$_GET;
	$sql = "select text from systemhelp where systemhelpname='$title'";
	$rs = $db->cacheExecute(15,$sql);
	$rs_a = $rs->GetArray();
	$Content = html_entity_decode($rs_a[0]['text']);
	if($_GET['action']=="init_default"||$_GET['action']=="init_customer")				{
	print "
		<BR>
		<table width='$width' align=center class=TableBlock>
			<tr class='TableContent'>
				<td  align='left'>$title</td>
			</tr>
			<tr class='TableData'>
				<td  align='left'>
				".nl2br($Content)."
			 </td>
			</tr>
		</table>
	";
	}//end if
}


function getmicrotime(){
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}

function idtoname($id,$mode='dept')		{
	global $common_html,$_SESSION,$SUNSHINE_USER_LANG_VAR;
	$systemlang=$_SESSION[$SUNSHINE_USER_LANG_VAR];
	$id_array=explode(',',$id);
	for($j=0;$j<sizeof($id_array);$j++)	{
		switch($mode)	{
			case 'user':
				$NICK_NAME=returntablefield('user','USER_NAME',$id_array[$j],'NICK_NAME');
				if($NICK_NAME!='')
					$name_array[$j]=$NICK_NAME;
				else
					$name_array[$j]=$id_array[$j];
				break;
			case 'course':
				$NICK_NAME=returntablefield('A_Course0','课程号',$id_array[$j],'课程名');
				if($NICK_NAME!='')
					$name_array[$j]=$NICK_NAME;
				else
					$name_array[$j]=$id_array[$j];
				break;
			case 'YuanXi':
				$NICK_NAME=returntablefield('A_YuanXi','院系号',$id_array[$j],'院系名');
				if($NICK_NAME!='')
					$name_array[$j]=$NICK_NAME;
				else
					$name_array[$j]=$id_array[$j];
				break;
			case 'dept':
				if($systemlang=='en')
					$return='ENGLISHNAME';
				else
					$return='DEPT_NAME';
				if($id_array[$j]==0||$id_array[$j]=='')
					$name_array[$j]=$common_html['common_html']['AllDepartment'];
				else
					$name_array[$j]=returntablefield('department','DEPT_ID',$id_array[$j],$return);
				break;
		}//end switch
	}//end for
	$name=join(',',$name_array);
	//print_R($name_array);
	return $name;
}

function returnpageaction($mode='edittodelete',$array_return=array())	{
	global $_GET,$_POST,$_SERVER;
	global $group_element;
	$QUERY_STRING=$_SERVER['QUERY_STRING'];
	if(empty($QUERY_STRING))	$QUERY_STRING="action=".$_GET['action'];
	$array=explode('&',$QUERY_STRING);
	$i=0;	$return_mark=false;		$return_mark2=false;
	foreach($array as $list)	{
		$temp=explode('=',$list);
		switch($temp[0])		{
			case $array_return['index_name']:
				$temp[1]=$array_return['index_id'];
				$return_mark=true;//print $temp[1];exit;
				break;
			case $array_return['index_name2']:
				$temp[1]=$array_return['index_id2'];
				$return_mark2=true;
				break;
			case 'action':
				$temp_=explode('_',$temp[1]);
				switch($mode)	{
					case 'edittodelete':
						$temp_[0]="delete";
						$temp[1]=join('_',$temp_);
						break;
					case 'group_filter':
						$temp_[0]='init';
						$temp[1]=$temp_[0]."_".$temp_[1];
						break;
					case 'edit_init':
						$temp_[0]='init';
						$temp[1]=$temp_[0]."_".$temp_[1];
						break;
					case 'delete_init':
						$temp[1]=$_GET['returnmodel'];
						break;
					case 'init_edit':
						$temp_[0]='edit';
						$temp[1]=$temp_[0]."_".$temp_[1];
						break;
					case 'init_view':
						$temp_[0]='view';
						$temp[1]=$temp_[0]."_".$temp_[1];
						break;
					case 'init_project':
						$temp[1]='framework_default';
						break;
					case 'init_add':
						$temp_[0]='add';
						$temp[1]=$temp_[0]."_".$temp_[1];
						break;
					case 'init_set':
						$temp_[0]='set';
						$temp[1]='set_default';
						break;
					case 'add_data':
						$temp_[0]='add';
						$temp[1]=$temp_[0]."_".$temp_[1]."_data";
						break;
					case 'init_edit_data':
						$temp_[0]='edit';
						$temp[1]=$temp_[0]."_".$temp_[1]."_data";
						break;
					case 'init_share':
						$temp[1]='edit_share';
						break;
					case 'init_move':
						$temp[1]='edit_move';
						break;
					case 'init_reply':
						$temp[1]='edit_reply';
						break;
					case 'init_forward':
						$temp[1]='edit_forward';
						break;
					case 'init_delete':
						$temp[1]='delete_array';
						break;
					case 'delete_inbox':
						$temp[1]='delete_inbox';
						break;
					case 'delete_outbox':
						$temp[1]='delete_outbox';
						break;
					case 'pageid':
						$temp[1]=$array_return['index_id2'];
						break;
				}
				break;
		}
		$returnstring[$i]=join('=',$temp);
		$i++;
	}
	//print_R($array_return);
	$return=join('&',$returnstring);
	switch($mode)		{
		case 'edittodelete':
			$return=$return."&returnmodel=init_".$temp_[1];
			break;
		case 'group_filter':
			if(!$return_mark)
			$return=$return."&".$array_return['index_name']."=".$array_return['index_id'];
			if(!$return_mark2&&$array_return['index_name2'])
			$return=$return."&".$array_return['index_name2']."=1";
			break;
		case 'init_set':
			$return=$return."&".$array_return['index_name']."=".$array_return['index_id'];
			$return=$return."&".$array_return['index_name2']."=".$array_return['index_id2'];
			$return=$return."&".$array_return['index_name3']."=".$array_return['index_id3'];
			break;
			break;
		case 'page':
		case 'init_edit_data':
		case 'init_delete':
		case 'delete_inbox':
		case 'delete_outbox':
		case 'init_view':
		case 'init_project':
		case 'init_edit':
			if(!$return_mark)
			$return=$return."&".$array_return['index_name']."=".$array_return['index_id'];
			break;
		case 'init_share':
			if(!$return_mark)
			$return=$return."&".$array_return['index_name']."=".$array_return['index_id'];
			break;
		case 'init_move':
			if(!$return_mark)
			$return=$return."&".$array_return['index_name']."=".$array_return['index_id'];
			break;
		case 'edit_init':
			break;
	}
	unset($returnstring);//print $return;
	return $return;
}
//------------------------------------------------------------------------------
//pageindexto
//------------------------------------------------------------------------------
function print_infor($var,$infor='trip',$return='',$indexto='',$SYSTEM_SECOND2=0)			{
	global $common_html;
	global $SYSTEM_SECOND;
	if($SYSTEM_SECOND=='')			{
		$SYSTEM_SECOND = $SYSTEM_SECOND2;
	}
	//$return="history.back();";
	print "<div align=\"center\" title=\"".$common_html['common_html'][$infor]."\">\n";

	print "
		<center><table class='MessageBox' align='center' width='320' height='90'>
	   <tr class='head-no-title'>
		  <td class='left'></td>
		  <td class='center'></td>
		  <td class='right'></td>
	   </tr>
	   <tr class='msg'>
		  <td class='info'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		  <td>
			 <div class='msg-content'>
			 &nbsp;&nbsp;$var</div>
		  </td>
		  <td class='right'></td>
	   </tr>
	   <tr class='foot'>
		  <td class='left'></td>
		  <td class='center'></td>
		  <td class='right'></td>
	   </tr>
	</table>
	</center>";

	if($return=='close')		{
		print "<br>\n";
		print "<div align=center>\n";
		print "  <input type=button accesskey='r' value=\"关闭\" class=\"SmallButton\" onclick=\"javascript:window.opener=null;window.close();\">\n";
		print "</div>\n";
	}
	else if($return!='')		{
		print "<br>\n";
		print "<div align=center>\n";
		print "  <input type=button accesskey='r' value=\"返回\" class=\"SmallButton\" onclick=\"$return\">\n";
		print "</div>\n";
	}//exit;
	//print $SYSTEM_SECOND;
	$SYSTEM_SECOND!=""?'':$SYSTEM_SECOND=0;
	$indexto==''?'':print "<META HTTP-EQUIV=REFRESH CONTENT='$SYSTEM_SECOND;URL=$indexto'>\n";
}


function print_close()			{
	global $common_html;
	global $SYSTEM_SECOND;
	//$return="history.back();";
	print "<div align=center><input type=button value=\"".$common_html['common_html']['close']."\" class=\"SmallButton\" onclick=\"window.close();\"></div>";
}

function print_nouploadfile($string='你还没有提交上传的文件',$return='history.back();')		{
	global $db;
	$LOGIN_THEME = $_SESSION['LOGIN_THEME'];
	print "
<LINK href='../../theme/<?=$LOGIN_THEME?>/style.css' type=text/css rel=stylesheet>
<LINK href='../theme/<?=$LOGIN_THEME?>/style.css' type=text/css rel=stylesheet>
<LINK href='theme/<?=$LOGIN_THEME?>/style.css' type=text/css rel=stylesheet>
	<style type='text/css'>
	.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
</style>
<BODY class=bodycolor topMargin=5 >
<BR>
<table width='450'  border='0' align='center' cellpadding='0' cellspacing='0' class='small' style='border:1px solid #006699;'>
<tr>
<td height='80' valign=middle align='middle' colspan=2  bgcolor='#E0F2FC'>
<font color=red >$string<BR><BR><input type=button accesskey='c' name='cancel' value=' 点击返回 ' class=SmallButton onClick=\"$return\" title='快捷键:ALT+c'></font>
</td>
</tr>
<tr>
</table>";
}
//-----------------------------------------------------------------------------
//page_css()
//-----------------------------------------------------------------------------
function page_css($add="",$title="Sunshine20",$相对路径="1")	{
	global $choose_lang,$framework_html,$LOGIN_THEME;
	global $_SESSION;
	//$LOGIN_THEME=$_SESSION['SUNSHINE_USER_LOGIN_THEME'];
	$LOGIN_THEME==""?$LOGIN_THEME=9:'';
	if($title=='Sunshine20')		{
		$title=$framework_html[$choose_lang]['index_title'];
		$pageText = $add;
	}
	else	{
		$pageText = $title." - ".$add;
	}
	//print $LOGIN_THEME;print_R($_SESSION);;exit;
	//判断类型
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	array_pop($PHP_SELF_ARRAY);
	array_shift($PHP_SELF_ARRAY);
	//print_R($PHP_SELF_ARRAY);
	if(in_array("TDLIB",$PHP_SELF_ARRAY))		{
		$DIRNAME = "TDLIB";
	}
	elseif(in_array("WUYE",$PHP_SELF_ARRAY))		{
		$DIRNAME = "WUYE";
	}
	elseif(in_array("ERP",$PHP_SELF_ARRAY))		{
		$DIRNAME = "ERP";
	}
	else	{
		$DIRNAME = "EDU";
	}

	if($_SESSION['LOGIN_THEME']!="") $LOGIN_THEME_TEXT = $_SESSION['LOGIN_THEME'];
	else	 $LOGIN_THEME_TEXT = 3;
	print "<TITLE>$pageText</TITLE>
	<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">
	<LINK href=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/theme/$LOGIN_THEME_TEXT/style.css\" type=text/css rel=stylesheet>
	<script type=\"text/javascript\" language=\"javascript\" src=\"http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/general/$DIRNAME/Enginee/lib/common.js\"></script>
	<STYLE>
	print{input{display:none}}
	xmp{page-break-before: always}
	</STYLE>
	<BODY class=bodycolor topMargin=5 >";
}
/*系统调试函数
主要是调用php的内部函数print_r()，其实print_r就是用来调试用的，只是有些地方不够好，比如缩进关系，每次写还要在前面加上echo "<pre>" ，其实这很不爽的！还有内部的var_dump(),反正效果不怎么理想的，所以就写了这个，在配置文件中加上此函数、每次调用只要dump($var) $var不管是变量、数组、类库都能打印出来
2010-8-2
*/
function dump($vars, $label = '', $return = false) {
    if (ini_get('html_errors')) {
        $content = "<pre>\n";
        if ($label != '') {
            $content .= "<STRONG>{$label} :</STRONG>\n";
        }
        $content .= htmlspecialchars(print_r($vars, true));
        $content .= "\n<pre>\n";
    }else {
        $content = $label . " :\n" . print_r($vars, true);
    }
    if($return) {
        return $content;
    }else {
        echo $content;
        return null;
    }
}
?>