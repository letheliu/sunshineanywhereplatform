<?
function summarize_template($infor)		{
global $common_html;
?>
<table border="0" width="100%" cellspacing="0" cellpadding="3" class="small">
  <tr>
    <td class="Small"><img src="images/yesbox.gif" ><b> <?=$infor['title']?></b>
    </td>
    </tr>
</table>

<br>

<table border="0" cellspacing="1" width="500" class="small" bgcolor="#000000" cellpadding="3" align="center">
    <tr class="TableHeader">
      <td nowrap align="center" width="200"><?=$common_html['common_html']['folder']?></td>
      <td nowrap align="center"><?=$common_html['common_html']['num']?></td>
    </tr>
    <tr class="TableData">
      <td nowrap width="200"><img src="images/inbox.gif">&nbsp;&nbsp;<a href="?action=init_inbox"><?=$common_html['common_html']['inbox']?></a>
      </td>
      <td>　　　　　<?=$infor['inbox']['num']?> （<?=$infor['inbox']['new']?> <?=$common_html['common_html']['notread']?>）</td>
    </tr>
    <tr class="TableData">
      <td nowrap width="200"><img src="images/outbox.gif">&nbsp;&nbsp;<a href="?action=init_outbox"><?=$common_html['common_html']['outbox']?></a></td>
      <td>　　　　　<?=$infor['outbox']['num']?></td>
    </tr>
    <tr class="TableControl">
      <td align="center" colspan="3">
       <input type="button" value="　<?=$common_html['common_html']['compose']?>　" class="SmallButton" onclick="location='?action=add_outbox'" title="<?=$common_html['common_html']['compose']?>">
      </td>
    </tr>
</table>
<?
}

function summarize_template_mytable($infor)		{
global $common_html;//print_R($infor);
$file_ini=parse_ini_file("Model/mytable_newai.ini",true);
$array_index=array_keys($file_ini);
$modulename='email';
$tablename=$file_ini[$modulename]['tablename'];
$link=$file_ini[$modulename]['link'];
$width=$file_ini[$modulename]['width'];

?>
<table border="0" cellspacing="1" width="<?=$width?>" class="small" bgcolor="#000000" cellpadding="3">
<TBODY>
<TR class=TableHeader>
<TD noWrap><?=$infor['title']?>&nbsp;</TD>
</TR>
    <tr class="TableData">
      <td nowrap width="200">&nbsp;&nbsp;<a href="<?=$link?>?action=init_inbox"><?=$common_html['common_html']['inbox']?></a>
      <?=$infor['inbox']['num']?> （<?=$infor['inbox']['new']?> <?=$common_html['common_html']['notread']?>）</td>
    </tr>
    <tr class="TableData">
      <td nowrap width="200">&nbsp;&nbsp;<a href="<?=$link?>?action=init_outbox"><?=$common_html['common_html']['outbox']?></a>
	  <?=$infor['outbox']['num']?></td>
    </tr>
    <tr class="TableControl">
      <td align="right" colspan="3">
       <a href="email_newai.php?action=add_outbox"><?=$common_html['common_html']['write']?></a>..
      </td>
    </tr>
</table>
<?
}

function project_framework($mode='project_framework')		{
	global $menu_top,$common_html,$html_etc,$columns,$primary;
	$primarykey_index=$columns[$primary];
	$linktext=$primarykey_index."=".$_GET[$primarykey_index];
	$menu_top_array=explode(',',$menu_top);
	switch($mode)			{
		case 'project_framework':
			print "<frameset rows='30,*'  cols='*' frameborder='yes' border='0' framespacing='0' id='frame1'>
			<frame name=menu_top scrolling=no src='project_newai.php?action=menutop_default&$linktext' frameborder=0>
			<frame name='menu_main' scrolling='auto' src='project_newai.php?action=view_default&$linktext' frameborder='1'>
			</frameset>\n";
			break;
		case 'project_fw_menu':
			print "<script>
			var menu_id=0;
			function setPointer(theRow, thePointerColor,menu_id_over)
			{
			  if(menu_id!=menu_id_over)
			     theRow.bgColor = thePointerColor;
			}";
			$counter=1;
			foreach($menu_top_array as $list)		{
			$list_array=explode(':',$list);
			print "
			function view_menu".$counter."()
			{
			  if(menu_id!=0)
 			  parent.menu_main.location='".$list_array[2]."?action=".$list_array[3]."&".$linktext."';
 			  menu_id=".$counter.";
			  ";//end print
			  for($i=1;$i<=sizeof($menu_top_array);$i++)	{
				  if($counter==$i)
					  print "menu_$i.bgColor='#D9E8FF';";
				  else	
					  print "menu_$i.bgColor='#DDDDDD';";
			  }
			  $counter++;
			print "}\n";
			}//end foreach
			print " 
			</script>
			</head>

			<body topmargin='0' leftmargin='0' onload='view_menu1()'>

			<TABLE class='Small' cellspacing='0' height='100%' width='100%' bgcolor='#DDDDDD' border='1' cellpadding='1' bordercolorlight='#000000' bordercolordark='#FFFFFF'>
			 <TR>";
			$counter=1;
			foreach($menu_top_array as $list)		{
			$list_array=explode(':',$list);
			print "			
			   <TD width='150' title='".$list_array[0]."' id='menu_".$counter."' onclick='view_menu".$counter."()' onmouseover=\"setPointer(this, '#B3D1FF','$counter')\" onmouseout=\"setPointer(this, '#DDDDDD','$counter')\" style=\"cursor:hand\">
			       <img src='images/".$list_array[1]."' WIDTH='22' HEIGHT='18'><b><font color='#000000'>".$common_html['common_html'][(string)$list_array[0]]."</span>
			   </TD>";
			$counter++;
			}

			print "   
			   <TD>
			   </TD>

			   </TR>
			</TABLE>";
			break;

	}

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