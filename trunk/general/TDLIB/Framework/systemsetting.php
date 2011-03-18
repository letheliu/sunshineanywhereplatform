<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);

?><?
require_once('include.inc.php');
$GLOBAL_SESSION=returnsession();
$action_array=explode('_',$_GET['action']);
$mark=$action_array[1];
//$ExecTimeBegin=getmicrotime();
//$lang=returnsystemlang();

//$columns=returntablecolumn($_GET['table_name']);
//$html_etc=returnsystemlang($_GET['table_name']);
//$common_html=returnsystemlang('common_html');

//$file_ini=parse_ini_file("config/".$_GET['table_name']."_newai.ini",true);
//$array_index=array_keys($file_ini);
//$file_array=$file_ini[''.$_GET['table_action'].''];

//$showlistfieldlist=$file_array['showlistfieldlist'];
//$showlistnull=$file_array['showlistnull'];
//$showlistfieldfilter=$file_array['showlistfieldfilter'];

//$formnewvar=formnewvar($file_array,$_GET['FLD_STR']);
//print_R($formnewvar);
//updatesystemsetting($formnewvar);

function formnewvar($file_array,$ereg_replace)	{
	global $_GET,$_POST;
	$showlistfieldlist=$file_array['showlistfieldlist'];
	$showlistfieldlist_array=explode(',',$showlistfieldlist);
	$showlistfieldlist_flip=array_flip($showlistfieldlist_array);
	//print_R($showlistfieldlist_flip);
	$showlistnull=$file_array['showlistnull'];
	$showlistnull_array=explode(',',$showlistnull);
	$showlistfieldfilter=$file_array['showlistfieldfilter'];
	$showlistfieldfilter_array=explode(',',$showlistfieldfilter);
	$ereg_replace_array=explode(',',$ereg_replace);
	for($i=0;$i<sizeof($ereg_replace_array);$i++)		{
		$index_name=$ereg_replace_array[$i];
		$index_id=$showlistfieldlist_flip[$index_name];
		$fieldfilter_array[$i]=$showlistfieldfilter_array[$index_id];
		$fieldnull_array[$i]=$showlistnull_array[$index_id];
	}
	array_pop($fieldfilter_array);
	array_pop($fieldnull_array);
	array_pop($ereg_replace_array);
	$return['newfieldfilter']=join(',',$fieldfilter_array);
	$return['newfieldnull']=join(',',$fieldnull_array);
	$return['newfieldlist']=join(',',$ereg_replace_array);
	return $return;
}


function updatesystemsetting($formnewvar)			{
global $_GET,$_POST,$db;
global $SUNSHINE_USER_NAME_VAR,$SUNSHINE_USER_ID_VAR,$_SESSION;
$USER_ID=$_SESSION[$SUNSHINE_USER_NAME_VAR];
$insert_sql="insert into systemsetting values('','$USER_ID','$_GET[table_name]','$_GET[table_action]','$formnewvar[newfieldlist]','$formnewvar[newfieldnull]','$formnewvar[newfieldfilter]')";
$update_sql="update systemsetting set FIELD_LIST='$formnewvar[newfieldlist]',FIELD_NULL='$formnewvar[newfieldnull]',FIELD_FILTER='$formnewvar[newfieldfilter]' where TABLE_NAME='$_GET[table_name]' and TABLE_ACTION='$_GET[table_action]'";
$select_sql="select * from systemsetting where TABLE_NAME='$_GET[table_name]' and TABLE_ACTION='$_GET[table_action]'";
$rs_select=$db->Execute($select_sql);//print $rs_select->RecordCount();
if($rs_select->RecordCount()>=1)		{
	$rs_update=$db->Execute($update_sql);
}
else	{
	$rs_insert=$db->Execute($insert_sql);//print $insert_sql;
}
return $rs_select->GetArray();
}

function usesystemsetting()			{
global $_GET,$_POST,$db;
global $SUNSHINE_USER_NAME_VAR,$SUNSHINE_USER_ID_VAR,$_SESSION;
$USER_ID=$_SESSION[$SUNSHINE_USER_NAME_VAR];
$delete_sql="delete from systemsetting where TABLE_NAME='$_GET[table_name]' and TABLE_ACTION='$_GET[table_action]'";
$rs_delete=$db->Execute($delete_sql);
}

function systemsetting_view($value)			{
global $_GET,$_POST,$db,$common_html,$mark;
global $SUNSHINE_USER_NAME_VAR,$SUNSHINE_USER_ID_VAR,$_SESSION;
$USER_ID=$_SESSION[$SUNSHINE_USER_NAME_VAR];
?>

<script>

function func_find(select_obj,option_text)
{
 pos=option_text.indexOf("] ")+1;
 option_text=option_text.substr(0,pos);

 for (j=0; j<select_obj.options.length; j++)
 {
   str=select_obj.options(j).text;
   if(str.indexOf(option_text)>=0)
      return j;
 }//for

 return j;
}

function func_color(select_obj)
{
 font_color="red";
 option_text="";
 for (j=0; j<select_obj.options.length; j++)
 {
   str=select_obj.options(j).text;
   if(str.indexOf(option_text)<0)
   {
      if(font_color=="red")
         font_color="blue";
      else
         font_color="red";
   }
   select_obj.options(j).style.color=font_color;

   pos=str.indexOf("] ")+1;
   option_text=str.substr(0,pos);
 }//for

 return j;
}

function func_insert()
{
 for (i=select2.options.length-1; i>=0; i--)
 {
   if(select2.options(i).selected)
   {
     option_text=select2.options(i).text;
     option_value=select2.options(i).value;
     option_style_color=select2.options(i).style.color;

     var my_option = document.createElement("OPTION");
     my_option.text=option_text;
     my_option.value=option_value;
     my_option.style.color=option_style_color;

     pos=func_find(select1,option_text);
     select1.add(my_option,pos);
     select2.remove(i);
  }
 }//for
 
 func_init();
}

function func_delete()
{
 for (i=select1.options.length-1; i>=0; i--)
 {
   if(select1.options(i).selected)
   {
     option_text=select1.options(i).text;
     option_value=select1.options(i).value;

     var my_option = document.createElement("OPTION");
     my_option.text=option_text;
     my_option.value=option_value;

     pos=func_find(select2,option_text);
     select2.add(my_option,pos);
     select1.remove(i);
  }
 }//for
 
 func_init();
}

function func_select_all1()
{
 for (i=select1.options.length-1; i>=0; i--)
   select1.options(i).selected=true;
}

function func_select_all2()
{
 for (i=select2.options.length-1; i>=0; i--)
   select2.options(i).selected=true;
}

function func_init()
{
  func_color(select2);
  func_color(select1);
}

function mysubmit(tablename,tableaction,returnmodel)
{
   fld_str="";
   for (i=0; i< select1.options.length; i++)
   {
      options_value=select1.options(i).value;
      fld_str+=options_value+",";
    }

   location="?action=set_<?=$mark?>_data&table_name="+tablename+"&table_action="+tableaction+"&returnmodel="+returnmodel+"&FLD_STR=" + fld_str;
}
</script>
</head>

<body class="bodycolor" topmargin="5" onload="func_init();">


<table border="0" width="100%" cellspacing="0" cellpadding="3" class="small">
  <tr>
    <td class="Big"><img src="images/edit.gif" WIDTH="22" HEIGHT="20"><b><font color="#FFFFFF"> <?=$common_html['common_html']['setpersonalinfor']?></font></b><br>
    </td>
  </tr>
</table>


<hr width="95%" height="1" align="left" color="#FFFFFF">
<br>

<table width="500" border="1" cellspacing="0" cellpadding="3" align="center" bordercolorlight="#000000" bordercolordark="#FFFFFF" class="big">
  <tr bgcolor="#CCCCCC">
    <td align="center"><b><?=$value['titleleft']?></b></td>
    <td align="center">&nbsp;</td>
    <td align="center" valign="top"><b><?=$value['titleright']?></b></td>
  </tr>
  <tr>
    <td valign="top" align="center" bgcolor="#CCCCCC">
    <select  name="select1" ondblclick="func_delete();" MULTIPLE style="width:200;height:280" >
	<?
	if(sizeof($value['value'])>0)				{
	foreach($value['value'] as $list)		{
		print "<option value=\"".$list['value']."\">[".$list['value']."] ".$list['name']."</option>\n";
	}
	}
	?>
           </select>
    <input type="button" value=" <?=$common_html['common_html']['selectall']?> " onclick="func_select_all1();" class="SmallInput">
    </td>

    <td align="center" bgcolor="#999999">
      <input type="button" class="SmallInput" value=" ← " onclick="func_insert();">
      <br><br>
      <input type="button" class="SmallInput" value=" → " onclick="func_delete();">
    </td>

    <td align="center" valign="top" bgcolor="#CCCCCC">
    <select  name="select2" ondblclick="func_insert();" MULTIPLE style="width:200;height:280">
	<?
	foreach($value['record'] as $list)		{
		print "<option value=\"".$list['value']."\">[".$list['value']."] ".$list['name']."</option>\n";
	}
	?>

           </select>
    <input type="button" value=" <?=$common_html['common_html']['selectall']?> " onclick="func_select_all2();" class="SmallInput">
    </td>
  </tr>

  <tr bgcolor="#CCCCCC">
    <td align="center" valign="top" colspan="3">
    <?=$common_html['common_html']['choosemultiply']?><br>
      <input type="button" class="BigButton" value="<?=$common_html['common_html']['save']?>" onclick="mysubmit('<?=$value['table_name']?>','<?=$value['table_action']?>','<?=$_GET['returnmodel']?>');">&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" class="BigButton" value="<?=$common_html['common_html']['return']?>" onclick="location='?action=init_<?=$mark?>'">
	  &nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" class="BigButton" value="<?=$common_html['common_html']['systemconfig']?>" onclick="location='?action=set_default_config&table_name=<?=$value['table_name']?>&table_action=<?=$value['table_action']?>'">
    </td>
  </tr>
</table>

</body>
</html>
<?
}
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