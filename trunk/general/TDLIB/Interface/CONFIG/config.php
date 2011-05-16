<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);

require_once('lib.inc.php');

$GLOBAL_SESSION=returnsession();

//print_R($_GET);
page_css("系统设置");
if($_SESSION['LOGIN_USER_ID']!="admin")			{
	print_infor("超越权限!",'',"window.close();");;
	exit;
}


$common_html=returnsystemlang('common_html');

$FileIniname	= $_GET['FileIniname'];
$Tablename		= $_GET['Tablename'];
$action			= $_GET['action'];
$FileDirName	= $_GET['FileDirName'];
$GOBACKFILENAME	= $_GET['GOBACKFILENAME'];

$SHOW_STOP		= 0;

//允许可以进行自定义的字段类型
$允许可以进行自定义的字段类型 =
				array("input","textarea","boolean","money","number","userdefine","tablefilter","tablefiltercolor","");
if($action=="add_default"||$action=="edit_default")
		$允许可以进行自定义的字段类型 =
				array("input","textarea","boolean","money","number","","","","");

$Columns=returntablecolumn($Tablename);
$html_etc=returnsystemlang($Tablename);

$filepath_system= "../$FileDirName/Model/".$FileIniname."_newai.ini";
$file_ini		= @parse_ini_file($filepath_system,true);
$file_ini		= $file_ini[$action];

$showlistfieldlistArray		= explode(',',$file_ini['showlistfieldlist']);
$showlistnullArray			= explode(',',$file_ini['showlistnull']);
$showlistfieldfilterArray	= explode(',',$file_ini['showlistfieldfilter']);


//print_R($file_ini);
//print_R($_GET);
if($_GET['action2']=="恢复初始化状态")			{

	//print_R($_POST);exit;
	//得到用户自定义的数据
	$sql	= "delete from  systemprivateconfig
			where 目录='$FileDirName' and 表='$Tablename' and 对象='$FileIniname' and 视图='$action'";
	$rs		= $db->Execute($sql);
	$actionURL = "?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&XX=XX")."";
	print_infor("你已经清除当前模块配置信息.","","location='$actionURL'",$actionURL);
	exit;
}


if($_GET['actionconfig']=="config_data")			{

	//print_R($_POST);exit;
	//得到用户自定义的数据
	$sql	= "select 字段,其它 from systemprivateconfig
			where 目录='$FileDirName' and 表='$Tablename' and 对象='$FileIniname' and 视图='$action'";
	$rs		= $db->Execute($sql);
	$rs_a	= $rs->GetArray();
	$已有字段	= $rs_a[0]['字段'];
	$其它信息	= $rs_a[0]['其它'];
	$action		= $_GET['action'];
	$NewArray	= array();
	for($i=0;$i<sizeof($showlistfieldlistArray);$i++)			{
		$FieldIndex  = $showlistfieldlistArray[$i];
		$FieldNULL	 = strtolower($showlistnullArray[$i]);
		$FieldFilterArray = explode(':',$showlistfieldfilterArray[$i]);
		$FieldFilter = $FieldFilterArray[0];
		$字段名称 = $Columns[$FieldIndex];
		$字段描述 = $html_etc[$Tablename][$字段名称];
		$字段类型 = $showlistfieldfilterArray[$i];
		if($action=="add_default"||$action=="edit_default")		{
			if($FieldNULL=="notnull")	$SHOW_STOP = 1;
			else						$SHOW_STOP = 0;
		}

		if(in_array($FieldFilter,$允许可以进行自定义的字段类型)&&$SHOW_STOP==0)	{
			if(($FieldFilter=="tablefilter"||$FieldFilter=="tablefiltercolor"))	{
				$PRINT_MODE = "SYSTEM";
				//&&$_GET[$字段名称]!=""
				//$PRINT_MODE = "CONFIG";
			}
			else	{
				$PRINT_MODE = "CONFIG";
			}
		}
		else		{
			$PRINT_MODE = "SYSTEM";
		}

		if($PRINT_MODE == "CONFIG")		{
			//print '自定义字段_'.$FieldIndex;自定义字段,可以由用户控制是否进行显示
			$自定义字段的值 = $_POST['自定义字段_'.$FieldIndex];
			if($自定义字段的值=="on")		{
				$NewArray[$i] = $FieldIndex;
			}
			else		{
				//不显示字段
			}
		}
		else	{
			//SYSTEM字段,一定要显示
			$NewArray[$i] = $FieldIndex;
		}
	}

	//对最后落实显示的字段进行自定义排序操作
	$action_orderindex = $_POST['action_orderindex'];
	//对排序信息进行排序,得到的值是已经排好的,得到的KEYS值是对应字段的索引
	@asort($action_orderindex);
	$action_orderindex_KEYS = array_keys($action_orderindex);
	//print_R($action_orderindex);
	$NewArrayNEW = array();
	for($i=0;$i<sizeof($action_orderindex_KEYS);$i++)			{
		$序列值  = $action_orderindex_KEYS[$i];
		if($NewArray[$序列值]!="")		{
			$NewArrayNEW[] = $NewArray[$序列值];
		}
	}
	$更新字段 = join(',',$NewArrayNEW);
	//print $更新字段;exit;
	//处理其它信息
	$其它 = array();
	if($_POST['每页显示记录条数']!="")			{
		$其它['每页显示记录条数'] = $_POST['每页显示记录条数'];
	}
	if(sizeof($_POST['action_model'])>0)			{
		$其它['action_model'] = join(',',$_POST['action_model']);;
	}
	if(sizeof($_POST['row_element'])>0)			{
		$其它['row_element'] = join(',',$_POST['row_element']);;
	}
	if(sizeof($_POST['bottom_element'])>0)			{
		$其它['bottom_element'] = join(',',$_POST['bottom_element']);;
	}
	if($_POST['排序字段0']!='')			{
		for($i=0;$i<5;$i++)				{
			$排序字段 = "排序字段".$i;
			$排序方式 = "排序方式".$i;
			if($_POST[$排序字段]!="")	{
				$系统排序区域设置Array[] .= $_POST[$排序字段].":".$_POST[$排序方式];
			}
		}
		$系统排序区域设置 = join(',',$系统排序区域设置Array);
		$其它['systemorder'] = $系统排序区域设置;
	}

	if(sizeof($_POST['action_search'])>0)			{
		$其它['action_search'] = join(',',$_POST['action_search']);;
	}

	//print_R($其它);exit;





	$其它信息 = serialize($其它);

	if($已有字段=="")		{
		$sql = "insert into systemprivateconfig values('','$FileDirName','$Tablename','$FileIniname','$action','$更新字段','$其它信息','".$_SESSION['LOGIN_USER_ID']."','".date("Y-m-d H:i:s")."');";
	}
	else	{
		$sql = "update systemprivateconfig
					set 字段='$更新字段',其它='$其它信息'
				where
					目录='$FileDirName'
					and 表='$Tablename'
					and 对象='$FileIniname'
					and 视图='$action'
				";
	}
	$rs = $db->Execute($sql);
	//print_R($_GET);print_R($_POST);print_R($NewArray);
	//print $sql;
	$actionURL = "../$FileDirName/$GOBACKFILENAME";
	print_infor("你的设置已经完成,请返回[系统设置最迟在150秒后生效].","","location='$actionURL'",$actionURL);
	exit;
}

/*
DROP TABLE IF EXISTS `systemprivateconfig`;
CREATE TABLE IF NOT EXISTS `systemprivateconfig` (
  `编号` int(44) NOT NULL auto_increment,
  `目录` varchar(200) NOT NULL default '',
  `表` varchar(200) NOT NULL default '',
  `对象` varchar(200) NOT NULL default '',
  `视图` varchar(200) NOT NULL default '',
  `字段` varchar(200) NOT NULL default '',
  `其它` varchar(200) NOT NULL default '',
  `创建人` varchar(200) NOT NULL default '',
  `创建时间` datetime,
  PRIMARY KEY  (`编号`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=1 comment='用户自定义界面' ;

*/

if($_GET['actionconfig']=="config")			{

	//得到用户自定义的数据
	$sql = "select 字段,其它 from systemprivateconfig
			where 目录='$FileDirName' and 表='$Tablename' and 对象='$FileIniname' and 视图='$action'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	$已有字段 = $rs_a[0]['字段'];
	$其它 = $rs_a[0]['其它'];
	$其它信息 = unserialize($其它);
	//没有时全部显示
	if($已有字段=='')				{
		$已有字段 = $file_ini['showlistfieldlist'];
		$配置信息TEXT = "<font color=gray>现有状态:本模块不存在配置信息</font>";
	}
	else	{
		//已经有配置信息
		$配置信息TEXT = "<font color=green>本模块已经存在配置信息,</font><a href=\"javascript:if(confirm('你真的想要恢复初始化状态吗？'))location='?".base64_encode("XX=XX&action2=恢复初始化状态&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&XX=XX")."'\" title='如果你对当前模块已有配置信息不满意,可以清除配置,恢复初始化状态'>点击恢复初始化状态</a>";
	}
	$已有字段Array = explode(',',$已有字段);



	//Array ( [XX] => XX [action] => init_default [Tablename] => edu_jiaocai [FileIniname] => edu_jiaocai [FileDirName] => EDU [actionconfig] => config [pageid] => 1 )
	$actionURL = "XX=XX&actionconfig=config_data&action=$action&Tablename=$Tablename&FileIniname=$FileIniname&FileDirName=$FileDirName&GOBACKFILENAME=$GOBACKFILENAME";
	form_begin("form1",$actionURL);
	table_begin("700");
	print "<tr class=TableContent><td colspan=5>&nbsp;
	开始配置当前页面要显示的字段信息 $配置信息TEXT
	<input type=Button class=SmallButton value='修改界面语言'
	onClick=\"location='systemlang.php?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&GOBACKFILENAME=".$_GET['GOBACKFILENAME']."&ACTION_NAME=html_etc&XX=XX")."'\">

	<input type=Button class=SmallButton value='返回主程序'
	onClick=\"location='../".$_GET['FileDirName']."/".$_GET['GOBACKFILENAME']."?".base64_encode("XX=XX&action=".$_GET['action']."&Tablename=".$_GET['Tablename']."&FileIniname=".$_GET['FileIniname']."&FileDirName=".$_GET['FileDirName']."&actionconfig=".$_GET['actionconfig']."&ACTION_NAME=html_etc&XX=XX")."'\">
	</td></tr>";

	print "<tr class=Tableheader><td colspan=5>&nbsp;表名:$Tablename 对象:$FileIniname 视图:$action
	</td></tr>";
	if($action=="init_default"||$action=="init_customer"||$action=="init_default2")		{




		//$数组来源 = explode(',',"add_default:new:n,export_default:export:x,import_default:import:i");;
		$action_model = $file_ini['action_model'];
		if($其它!="")
			$实际数据 = $其它信息['action_model'];
		else
			$实际数据 = $action_model;
		$实际数据Array = explode(',',$实际数据);
		$数组来源 = explode(',',$action_model);
		if($数组来源[0]!="")	$SHOWTEXT .= "&nbsp;左上新增区域设置:";
		for($i=0;$i<sizeof($数组来源);$i++)			{
			if(@in_array($数组来源[$i],$实际数据Array))	{
				$checked = "checked";
			}
			else	{
				$checked = "";
			}
			$动作数组 = explode(':',$数组来源[$i]);
			$动作名称 = $动作数组[1];

			if($数组来源[$i]!="")	$SHOWTEXT .= "<input name='action_model[]' type=checkbox value='".$数组来源[$i]."' $checked>".$common_html['common_html'][$动作名称]." ";
		}
		if($数组来源[0]!="")	$SHOWTEXT .= "<BR>";


		//$数组来源 = explode(',',"view:view_default,edit:edit_default,delete:delete_array");;
		$row_element = $file_ini['row_element'];
		if($其它!="")
			$实际数据 = $其它信息['row_element'];
		else
			$实际数据 = $row_element;
		$实际数据Array = explode(',',$实际数据);
		$数组来源 = explode(',',$row_element);
		if($数组来源[0]!="")	$SHOWTEXT .= "&nbsp;每行记录区域设置:";
		for($i=0;$i<sizeof($数组来源);$i++)			{
			if(@in_array($数组来源[$i],$实际数据Array))	{
				$checked = "checked";
			}
			else	{
				$checked = "";
			}
			$动作数组 = explode(':',$数组来源[$i]);
			$动作名称 = $动作数组[0];

			if($数组来源[$i]!="")	$SHOWTEXT .= "<input name='row_element[]' type=checkbox value='".$数组来源[$i]."' $checked>".$common_html['common_html'][$动作名称]." ";
		}
		if($数组来源[0]!="")	$SHOWTEXT .= "<BR>";

		//$数组来源 = explode(',',"view:view_default,edit:edit_default,delete:delete_array");;
		$bottom_element = $file_ini['bottom_element'];
		if($其它!="")
			$实际数据 = $其它信息['bottom_element'];
		else
			$实际数据 = $bottom_element;
		$实际数据Array = explode(',',$实际数据);
		$数组来源 = explode(',',$bottom_element);
		if($数组来源[0]!="")	$SHOWTEXT .= "&nbsp;每行记录区域设置:";
		for($i=0;$i<sizeof($数组来源);$i++)			{
			if(@in_array($数组来源[$i],$实际数据Array))	{
				$checked = "checked";
			}
			else	{
				$checked = "";
			}
			$动作数组 = explode(':',$数组来源[$i]);
			if($动作数组[0]=="operation")	$动作名称 = $动作数组[1];
			else	$动作名称 = $动作数组[0];

			if($数组来源[$i]!="")	$SHOWTEXT .= "<input name='bottom_element[]' type=checkbox value='".$数组来源[$i]."' $checked>".$common_html['common_html'][$动作名称]." ";
		}
		if($数组来源[0]!="")	$SHOWTEXT .= "<BR>";

		//pagenums_model = 25
		$pagenums_model = $file_ini['pagenums_model'];
		if($pagenums_model=='')		$pagenums_model = 25;
		if($其它信息['每页显示记录条数']!="")
			$每页显示记录条数 = $其它信息['每页显示记录条数'];
		else
			$每页显示记录条数 = $pagenums_model;
		$SHOWTEXT .= "&nbsp;每页显示记录条数:<input type=input name=每页显示记录条数 value='$每页显示记录条数' class=SmallInput size=4><BR>";

		//systemorder = 4:desc,3:desc
		$systemorder = $file_ini['systemorder'];
		if($systemorder=="")	$systemorder = "0:desc";
		if($其它信息['systemorder']!="")
			$系统排序区域设置 = $其它信息['systemorder'];
		else
			$系统排序区域设置 = $systemorder;
		if($系统排序区域设置!="")				{
			$SHOWTEXT .= "&nbsp;系统排序区域设置:";
			$系统排序区域设置Array = explode(',',$系统排序区域设置);
			for($i=0;$i<sizeof($系统排序区域设置Array);$i++)		{
				$系统排序区域设置TEXT = $系统排序区域设置Array[$i];
				$系统排序区域设置TEXTArray = explode(':',$系统排序区域设置TEXT);
				$SHOWTEXT .= "<select name=排序字段".$i.">";
				for($iD=0;$iD<sizeof($Columns);$iD++)		{
					$字段名称 = $Columns[$iD];
					if($iD==$系统排序区域设置TEXTArray[0])	{
						$Selected = "selected";
					}
					else	{
						$Selected = "";
					}
					$SHOWTEXT .= "<option value='$iD' $Selected>[$iD]".$字段名称."</option>";
				}
				$SHOWTEXT .= "</select>";
				$SHOWTEXT .= "<select name=排序方式".$i.">";
				$排序方式Array = array("desc","asc");
				for($iD=0;$iD<sizeof($排序方式Array);$iD++)		{
					$字段名称 = $排序方式Array[$iD];
					if($字段名称==$系统排序区域设置TEXTArray[1])	{
						$Selected = "selected";
					}
					else	{
						$Selected = "";
					}
					$SHOWTEXT .= "<option value='$字段名称' $Selected>$字段名称</option>";
				}
				$SHOWTEXT .= "</select>&nbsp;&nbsp;&nbsp;&nbsp;";
			}
		}

		//systemorder = 4:desc,3:desc
		$action_search = $file_ini['action_search'];
		if($其它信息['action_search']!="")
			$列表区域搜索设置 = $其它信息['action_search'];
		else
			$列表区域搜索设置 = $action_search;
		$搜索HEADER = "<td>&nbsp;搜索</td>";


		print "<tr class=TableData><td colspan=5>
		$SHOWTEXT
		</td></tr>";
	}

	print "<tr class=Tableheader>
	<td>&nbsp;字段名称</td>
	<td>&nbsp;字段描述</td>
	$搜索HEADER
	<td>&nbsp;排序</td>
	<td>&nbsp;字段类型(配置是否显示)</td>
	</tr>";

	for($i=0;$i<sizeof($showlistfieldlistArray);$i++)			{
		$FieldIndex  = $showlistfieldlistArray[$i];
		$FieldNULL	 = strtolower($showlistnullArray[$i]);
		$FieldFilterArray = explode(':',$showlistfieldfilterArray[$i]);
		$FieldFilter = $FieldFilterArray[0];
		$字段名称 = $Columns[$FieldIndex];
		$字段描述 = $html_etc[$Tablename][$字段名称];
		$字段类型 = $showlistfieldfilterArray[$i];
		if($action=="add_default"||$action=="edit_default")		{
			if($FieldNULL=="notnull")	$SHOW_STOP = 1;
			else						$SHOW_STOP = 0;
			$非空显示 = "非空";
		}
		else	{
			//在列表或是查看页面,不需要使用非空属性
			$非空显示 = "";
		}
		if(in_array($FieldFilter,$允许可以进行自定义的字段类型)&&$SHOW_STOP==0)	{
			if(($FieldFilter=="tablefilter"||$FieldFilter=="tablefiltercolor"))	{
				$PRINT_MODE = "SYSTEM";
				//&&$_GET[$字段名称]!=""
				//$PRINT_MODE = "CONFIG";
			}
			else	{
				$PRINT_MODE = "CONFIG";
			}
		}
		else		{
			$PRINT_MODE = "SYSTEM";
		}

	if($action=="init_default"||$action=="init_customer"||$action=="init_default2")		{
		$列表区域搜索设置Array = explode(',',$列表区域搜索设置);
		if(in_array($FieldIndex,$列表区域搜索设置Array))	{
			$搜索 = "<td>&nbsp;<input name='action_search[]' type=checkbox value='".$FieldIndex."' checked></td>
					";
		}
		else	{
			$搜索 = "<td>&nbsp;<input name='action_search[]' type=checkbox value='".$FieldIndex."' ></td>";
		}


	}

	//得到行排序的值
	$已有字段Array反序 = array_flip($已有字段Array);
	$行排序值 = $已有字段Array反序[$FieldIndex];
	$行排序值TEXT = "<td>&nbsp;<input name='action_orderindex[]' type=input size=3 class=SmallInput value='".$行排序值."' checked></td>";

		if($PRINT_MODE == "CONFIG")							{
			if(in_array($FieldIndex,$已有字段Array))		{
				$checkbox = "checked";
			}
			else		{
				$checkbox = "";
			}
			print "<tr class=TableData>
			<td>&nbsp;".($i+1)." $字段名称</td>
			<td>&nbsp;$字段描述</td>
			$搜索 $行排序值TEXT
			<td>&nbsp;<input type=checkbox $checkbox name=自定义字段_".$FieldIndex.">
			是否进行显示
			类型:$FieldFilter
			</td>
			</tr>";
		}
		else	{
			print "<tr class=TableData>
			<td>&nbsp;".($i+1)." $字段名称</td>
			<td>&nbsp;$字段描述</td>
			$搜索 $行排序值TEXT
			<td title='系统使用字段不能进行自定义显示'>&nbsp;<font color=gray>系统使用字段 类型:$FieldFilter $非空显示</font></td>
			</tr>";
		}
	}
	print_submit("提交",5);
	print "<tr class=TableData><td colspan=5>&nbsp;数据保存以后,系统会在150秒以后进行生效[系统缓存的周期是150秒].
	</td></tr>";
	table_end();
	form_end();

}

//print_R($_GET);
?>