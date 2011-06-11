<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css('CRM桌面');

$user_id = $_SESSION['LOGIN_USER_ID'];
//加载CRM桌面设置参数
include('crm_config_mytable.php');

//得到crm_mytable_newai.php中设置显示数据
$mytable_arr = array();
$CCCCC1 = 0;
$CCCCC2 = 0;
$sql = "select * from crm_mytable where 创建人='".$user_id."' order by 模块编号 ASC";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($IXXXX=0;$IXXXX<count($rs_a);$IXXXX++){
   $模块属性 = $rs_a[$IXXXX]['模块属性'];
   if($模块属性=="用户可选" or $模块属性=="用户必选"){
	   $模块名称 = $rs_a[$IXXXX]['模块名称'];
	   if($rs_a[$IXXXX]['模块位置'] == "左边") {
		   $NewArray1[$CCCCC1] = $模块名称;
		   $CCCCC1++;
	   }
	   if($rs_a[$IXXXX]['模块位置'] == "右边") {
		   $NewArray2[$CCCCC2] = $模块名称;
		   $CCCCC2++;
	   }
	   $mytable_arr[$模块名称]['模块编号'] = $rs_a[$IXXXX]['模块编号'];
	   $mytable_arr[$模块名称]['模块位置'] = $rs_a[$IXXXX]['模块位置'];
	   $mytable_arr[$模块名称]['模块属性'] = $rs_a[$IXXXX]['模块属性'];
	   $mytable_arr[$模块名称]['显示行数'] = $rs_a[$IXXXX]['显示行数'];
	   $mytable_arr[$模块名称]['滚动显示'] = $rs_a[$IXXXX]['滚动显示'];
   }
}
//得到左右两边模块的个数，然后计算出有应该非配多少行
$CCCCC = $CCCCC1>$CCCCC2?$CCCCC1:$CCCCC2;
$n = 0;

print "<table id=\"tblContainer\" border=\"0\"  width=\"100%\">";

for($IXXXX=0;$IXXXX<$CCCCC;$IXXXX++)				{
	print "<tr>";
	$模块名称	= $NewArray1[$IXXXX];
	$valueVVVVVVV		= $mytable_arr[$模块名称];
	if($valueVVVVVVV['模块属性']=="用户可选" or $valueVVVVVVV['模块属性']=="用户必选"){
	   if($valueVVVVVVV['模块位置'] == "左边"){
	   $滚动显示  = $valueVVVVVVV['滚动显示'];
	   $max_count = $valueVVVVVVV['显示行数'];
	   print "<td valign=\"top\" align=\"left\" width=\"$左侧栏目宽度%\">";
	   include_once("$模块名称");
	   print "</td>";
	   }
	}

	$模块名称	= $NewArray2[$IXXXX];
	$valueVVVVVVV		= $mytable_arr[$模块名称];
	if($valueVVVVVVV['模块属性']=="用户可选" or $valueVVVVVVV['模块属性']=="用户必选"){
	if($valueVVVVVVV['模块位置'] == "右边"){
	   $滚动显示  = $valueVVVVVVV['滚动显示'];
	   $max_count = $valueVVVVVVV['显示行数'];
	   print "<td valign=\"top\" align=\"left\" width=\"50%\">";
	   include_once("$模块名称");
	   print "</td>";
	   }
	}
	print "</tr>";
}
print "</table>";

/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
*/
?>


<?
/*
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();
page_css('CRM桌面');

$user_id = $_SESSION['LOGIN_USER_ID'];
//加载CRM桌面设置参数
include('crm_config_mytable.php');
/*
print "<script type=\"text/javascript\">
		var cRows = tblContainer.rows;
		var row;
		for (var i=0; i<cRows.length; i++)
		{
			row = cRows[i];
			row.cells[0].firstChild.height = row.cells[1].offsetHeight;
		}
    </script>";
*/
//得到crm_mytable_newai.php中设置显示数据
/*
$mytable_arr = array();
$count1 = 0;
$count2 = 0;
$sql = "select * from crm_mytable where 创建人='".$user_id."' order by 模块编号 ASC";
$rs = $db->CacheExecute(150,$sql);
$rs_a = $rs->GetArray();
for($i=0;$i<count($rs_a);$i++){
   $模块名称 = $rs_a[$i]['模块名称'];
   if($rs_a[$i]['模块位置'] == "左边") $count1++;
   if($rs_a[$i]['模块位置'] == "右边") $count2++;
   $mytable_arr[$模块名称]['模块编号'] = $rs_a[$i]['模块编号'];
   $mytable_arr[$模块名称]['模块位置'] = $rs_a[$i]['模块位置'];
   $mytable_arr[$模块名称]['模块属性'] = $rs_a[$i]['模块属性'];
   $mytable_arr[$模块名称]['显示行数'] = $rs_a[$i]['显示行数'];
   $mytable_arr[$模块名称]['滚动显示'] = $rs_a[$i]['滚动显示'];
}
//得到左右两边模块的个数，然后计算出有应该非配多少行
$count = $count1>$count2?$count1:$count2;
$n = 0;

print "<table id=\"tblContainer\" border=\"0\"  width=\"100%\" height=\"100%\">";
print "<tr><td valign=\"top\" align=\"left\" width=\"$左侧栏目宽度%\">";

print "<table border=\"0\"  width=\"100%\" height=\"100%\">";
foreach($mytable_arr as $key => $value){
    if($value['模块位置'] == "左边"){
	   $滚动显示  = $value['滚动显示'];
	   $max_count = $value['显示行数'];
	   if($value['模块属性']=="用户可选" or $value['模块属性']=="用户必选"){
		   print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\" width=\"50%\">";
		   include("$key");
		   print "</td></tr>";
	   }
	}
}
print "</table>";
print   "</td><td valign=\"top\" align=\"left\" width=\"50%\">";

print "<table id=\"tblContainer\" border=\"0\"  width=\"100%\" height=\"100%\">";
foreach($mytable_arr as $key => $value){
    if($value['模块位置'] == "右边"){
	   $滚动显示  = $value['滚动显示'];
	   $max_count = $value['显示行数'];
	   if($value['模块属性']=="用户可选" or $value['模块属性']=="用户必选"){
		   print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\" width=\"50%\">";
		   include("$key");
		   print "</td></tr>";
	   }
	}
}
print "</table>";

print "</td></tr>";
print "</table>";


/*
print "<table id=\"tblContainer\" border=\"0\" class=\"TableBlock\" width=\"100%\" height=\"100\">";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\" width=50%>";
include('crm_mytable_kehugaishu.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('crm_kehu_birthday.php');
print   "</td></tr>";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\">";
include('crm_mytable_hetong.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('crm_notes.php');
print   "</td></tr>";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\">";
include('crm_mytable_feiyong.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('crm_mytable_tongzhi.php');
print   "</td></tr>";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\">";
include('crm_mytable_fuwu.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('kehu_chaxun.php');
print   "</td></tr>";

print "<tr class=\"TableBlock\"><td valign=\"top\" align=\"left\">";
include('crm_mytable_dingdan.php');
print   "</td><td valign=\"top\" align=\"left\">";
include('crm_google.php');
print   "</td></tr>";

print "</table>";
*/
?>
<?
/*
	版权归属:郑州单点科技软件有限公司;
	联系方式:0371-69663266;
	公司地址:河南郑州经济技术开发区第五大街经北三路通信产业园四楼西南;
	公司简介:郑州单点科技软件有限公司位于中国中部城市-郑州,成立于2007年1月,致力于把基于先进信息技术（包括通信技术）的最佳管理与业务实践普及到教育行业客户的管理与业务创新活动中，全面提供具有自主知识产权的教育管理软件、服务与解决方案，是中部最优秀的高校教育管理软件及中小学校管理软件提供商。目前已经有多家高职和中职类院校使用通达中部研发中心开发的软件和服务;

	软件名称:单点科技软件开发基础性架构平台,以及在其基础之上扩展的任何性软件作品;
	发行协议:数字化校园产品为商业软件,发行许可为LICENSE方式;单点CRM系统即SunshineCRM系统为GPLV3协议许可,GPLV3协议许可内容请到百度搜索;
	特殊声明:软件所使用的ADODB库,PHPEXCEL库,SMTARY库归原作者所有,余下代码沿用上述声明;
*/
?>



