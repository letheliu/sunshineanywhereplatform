<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
error_reporting(E_WARNING | E_ERROR);
require_once('lib.inc.php');
$GLOBAL_SESSION=returnsession();



$LOGIN_USER_ID = $_SESSION['LOGIN_USER_ID'];


if($_GET['action']=="登录系统")						{

	print "<TITLE>访问其他系统</TITLE>
	<META http-equiv=Content-Type content=\"text/html; charset=gb2312\">
	<LINK href=\"/theme/3/style.css\" type=text/css rel=stylesheet>
	<script type=\"text/javascript\" language=\"javascript\" src=\"/general/EDU/Enginee/lib/common.js\"></script>
	<STYLE>@media print{input{display:none}}</STYLE>
	";

	$编号 = $_GET['编号'];

	$sql = "select * from other_system_userlogin where 系统='$编号' and 用户='$LOGIN_USER_ID'";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	//print_R($rsX_a);exit;

	if($rsX_a[0]['用户']!="")			{
		print "<BODY class=bodycolor topMargin=5 onload='form1.submit();'>";
	}
	else			{
		print_infor("请先设置您的用户名和密码!",'trip',"".base64_encode("XX=XX&action=配置登录系统&编号=$编号&XX=XX")."","?");
		exit;
	}

	$sql = "select * from other_system_config where 编号='$编号'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$名称			= $rs_a[0]['名称'];
	$登录地址		= $rs_a[0]['登录地址'];
	$登陆用户名字段	= $rs_a[0]['登陆用户名字段'];
	$登陆密码字段	= $rs_a[0]['登陆密码字段'];
	$提交方式		= $rs_a[0]['提交方式'];
	$权限			= $rs_a[0]['权限'];
	$权限			= $rs_a[0]['权限'];
	$扩展登陆1字段名	= $rs_a[0]['扩展登陆1字段名'];
	$扩展登陆1字段值	= $rs_a[0]['扩展登陆1字段值'];
	$扩展登陆2字段名	= $rs_a[0]['扩展登陆2字段名'];
	$扩展登陆2字段值	= $rs_a[0]['扩展登陆2字段值'];
	$扩展登陆3字段名	= $rs_a[0]['扩展登陆3字段名'];
	$扩展登陆3字段值	= $rs_a[0]['扩展登陆3字段值'];
	$备注				= $rs_a[0]['备注'];



	print "<form name=\"form1\" id=\"form1\" action=\"$登录地址\" method=\"$提交方式\">";
	print "<input type=\"hidden\" name=\"$登陆用户名字段\" id=\"$登陆用户名字段\" value=\"".$rsX_a[0]['登录用户名']."\">";
	print "<input type=\"hidden\" name=\"$登陆密码字段\" id=\"$登陆密码字段\" value=\"".base64_decode($rsX_a[0]['登录密码'])."\">";
	if($扩展登陆1字段名!="")				{
		print "<input type=\"hidden\" name=\"$扩展登陆1字段名\" id=\"$扩展登陆1字段名\" value=\"".$扩展登陆1字段值."\">";
	}
	if($扩展登陆2字段名!="")				{
		print "<input type=\"hidden\" name=\"$扩展登陆2字段名\" id=\"$扩展登陆2字段名\" value=\"".$扩展登陆2字段值."\">";
	}
	if($扩展登陆3字段名!="")				{
		print "<input type=\"hidden\" name=\"$扩展登陆3字段名\" id=\"$扩展登陆3字段名\" value=\"".$扩展登陆3字段值."\">";
	}
	print "</form></body></html>";

	exit;
}


page_css("访问其他系统");

if($_GET['action']=="提交配置登录系统")						{

	$编号 = $_GET['编号'];
	$sql = "select * from other_system_config where 编号='$编号'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$sql = "select * from other_system_userlogin where 系统='$编号' and 用户='$LOGIN_USER_ID'";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	//print_R($rsX_a);

	if($rsX_a[0]['用户']!="")			{
		$sql = "update other_system_userlogin set 登录用户名='".$_POST['登录用户名']."',登录密码='".base64_encode($_POST['登录密码'])."' where 系统='$编号' and 用户='$LOGIN_USER_ID'";
	}
	else			{
		$sql = "insert into other_system_userlogin value('','$编号','$LOGIN_USER_ID','".$_POST['登录用户名']."','".base64_encode($_POST['登录密码'])."');";
	}
	//print_R($_POST);
	//print $sql;
	$db->Execute($sql);
	print_infor("您的操作已成功!",'trip',"location='?'","?");

	exit;
}




if($_GET['action']=="配置登录系统")						{

	$编号 = $_GET['编号'];
	$sql = "select * from other_system_config where 编号='$编号'";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();

	$sql = "select * from other_system_userlogin where 系统='$编号' and 用户='$LOGIN_USER_ID'";
	$rs = $db->Execute($sql);
	$rsX_a = $rs->GetArray();
	//print_R($sql);

	form_begin("form1","?".base64_encode("XX=XX&action=提交配置登录系统&编号=$编号&XX=XX")."");
	table_begin("60%");
	print_title("用户名和密码设置",2);

	//if($rsX_a[0]['登录用户名']=="") $rsX_a[0]['登录用户名'] = $LOGIN_USER_ID;;
	?>

   <tr class="TableData">
    <td nowrap class="TableContent" width="120">访问系统名称：</td>
    <td><?=$rs_a[0]['名称'];?></td>
   </tr>
   <tr class="TableData">
    <td nowrap class="TableContent">访问系统地址：</td>
    <td><?=$rs_a[0]['登录地址']?></td>
   </tr>
   <tr class="TableData">
    <td nowrap class="TableContent">登录用户名：</td>
    <td>
        <input type="text" name="登录用户名" value="<?=$rsX_a[0]['登录用户名']?>" class="BigInput" size="30"> <span style="color: #ff0033">*</span>
    </td>
   </tr>
   <tr class="TableData">
    <td nowrap class="TableContent">登录密码：</td>
    <td>
        <input type="password" name="登录密码" value="<?=base64_decode($rsX_a[0]['登录密码'])?>" class="BigInput" size="30"> <span style="color: #ff0033">*</span>
    </td>
   </tr>
   <tr>
    <td nowrap  class="TableControl" colspan="2" align="center">
        <input type="submit" value="确 定" class="BigButton" name="button">&nbsp;&nbsp;
<?
if($ID!="")
{
?>
   <input type="button" value="返 回" class="BigButton" onclick="history.back();">
<?
}
?>
    </td>
  </form>
</table>

<?
exit;
}



	table_begin("100%");
	print_title("访问其他系统",3);
	print "<tr class='TableHeader' align='center'>
     <td width='200'>其他系统</td>
     <td width='100'>操作</td>
     <td>说明</td></tr>";

	$sql = "select * from other_system_config where 权限 like '%$LOGIN_USER_ID,%' order by 排序号";
	$rs = $db->Execute($sql);
	$rs_a = $rs->GetArray();
	for($i=0;$i<sizeof($rs_a);$i++)				{
		$编号			= $rs_a[$i]['编号'];
		$名称			= $rs_a[$i]['名称'];
		$登录地址		= $rs_a[$i]['登录地址'];
		$登陆用户名字段	= $rs_a[$i]['登陆用户名字段'];
		$登陆密码字段	= $rs_a[$i]['登陆密码字段'];
		$提交方式		= $rs_a[$i]['提交方式'];
		$权限			= $rs_a[$i]['权限'];
		$权限			= $rs_a[$i]['权限'];
		$扩展登陆1字段名	= $rs_a[$i]['扩展登陆1字段名'];
		$扩展登陆1字段值	= $rs_a[$i]['扩展登陆1字段值'];
		$扩展登陆2字段名	= $rs_a[$i]['扩展登陆2字段名'];
		$扩展登陆2字段值	= $rs_a[$i]['扩展登陆2字段值'];
		$扩展登陆3字段名	= $rs_a[$i]['扩展登陆3字段名'];
		$扩展登陆3字段值	= $rs_a[$i]['扩展登陆3字段值'];
		$备注				= $rs_a[$i]['备注'];
		$操作 = "<a href=\"?".base64_encode("XX=XX&action=登录系统&编号=$编号&XX=XX")."\" target=_blank>登录</a> <a href=\"?".base64_encode("XX=XX&action=配置登录系统&编号=$编号&XX=XX")."\">设置</a> ";
		print "<tr class='TableData' align='left' >
				 <td width='200'>&nbsp;$名称</td>
				 <td width='100' align='center'>$操作</td>
				 <td>&nbsp;$备注</td></tr>";
	}
	print "</table>";

if($_GET['action']==''||$_GET['action']=='init_default'||$_GET['action']=='init_customer')		{
$PrintText .= "<BR><table  class=TableBlock align=center width=100%>";
$PrintText .= "<TR class=TableContent><td ><font color=green >

使用说明：<BR>
&nbsp;&nbsp;①此处是您可以看到并使用的系统信息，点击设置进行配置您系统的用户名和密码，点击登录即可跳转到其它系统。<BR>
&nbsp;&nbsp;②访问其它系统的权限以及配置情况在数字化校园->单点登录菜单中进行。



</font></td></table>";
	print $PrintText;
}




	exit;
	//数据表模型文件,对应Model目录下面的other_system_userlogin_newai.ini文件
	//如果是需要复制此模块,则需要修改$parse_filename参数的值,然后对应到Model目录 新文件名_newai.ini文件
	$filetablename		=	'other_system_userlogin';
	$parse_filename		=	'other_system_userlogin';
	require_once('include.inc.php');


	?><?
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