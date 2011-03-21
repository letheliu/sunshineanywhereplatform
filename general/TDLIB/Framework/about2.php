<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);
session_start();

require_once('lib.inc.php');

$软件版本号FILE = @file("../Interface/EDU/version.ini");
$软件版本号 = $软件版本号FILE[0];
returnRemoteRegisterInfor();
CheckSystemVersionInformation();
//较验远程注册码情况，如果有验证信息，则在本地进行注册，没有远程没有，则删除本地注册文件
function returnRemoteRegisterInfor()					{
	$MACHINE_CODE = returnmachinecode();
	$SERVER_NAME = $_SERVER['SERVER_NAME'];
	$PHP_SELF_ARRAY = explode('/',$_SERVER['PHP_SELF']);
	array_pop($PHP_SELF_ARRAY);
	array_shift($PHP_SELF_ARRAY);
	//print_R($PHP_SELF_ARRAY);
	if(in_array("TDLIB",$PHP_SELF_ARRAY))		{
		$SOFTWARE = "TDLIB";
	}
	else	{
		$SOFTWARE = "EDU";
	}
	$URL = "http://www.sndg.net/tryout/register_check_code.php?".base64_encode("MACHINE_CODE=$MACHINE_CODE&SERVER_NAME=$SERVER_NAME&SOFTWARE=$SOFTWARE");;
	//print $URL;exit;
	$File = @file($URL);
	$TYPE_ARRAY = explode('||',$File['0']);
	$TYPE = $TYPE_ARRAY[0];
	$REGISTER_CODE = $TYPE_ARRAY[2];
	$SERVER_NAME = $TYPE_ARRAY[3];
	$SCHOOL_NAME = $TYPE_ARRAY[4];
	$软件版本 = $TYPE_ARRAY[5];
	$授权时间 = $TYPE_ARRAY[6];


	//print_R($TYPE);
	switch($TYPE)				{
		case 'Normal':
			MakeResiterFile($MACHINE_CODE,$REGISTER_CODE,$SERVER_NAME,$SCHOOL_NAME,$软件版本,$授权时间);
			break;
		case 'NoRegisterInfor':
			@unlink("license.ini");
			break;
		case 'NoCheckOut':
			@unlink("license.ini");
			break;
	}
	//exit;
}



function CheckSystemVersionInformation()					{
	global $db;
	if(is_file("license.ini"))		{
		$ini_file	=	parse_ini_file('license.ini');
		$SOFTWARE_TYPE = $ini_file['SOFTWARE_TYPE'];
		$SOFTWARE_TYPE_ARRAY = explode("-",$SOFTWARE_TYPE);
		if($SOFTWARE_TYPE_ARRAY[0]=="中小学版")				{
			$sql = "delete from TD_OA.sys_function where MENU_ID = 'c804'";		$db->Execute($sql);	//print $sql."<BR>";		//招生就业管理
			//重新设置SCHOOL_MODEL内容
			$filename = "../Interface/EDU/SCHOOL_MODEL.ini";
			@unlink($filename);
			$somecontent="[section]\nSCHOOL_MODEL=4";
			$handle = fopen($filename, 'w');
			if (!fwrite($handle, $somecontent)) {
				exit;
			}
			fclose($handle);
		}
		elseif($SOFTWARE_TYPE_ARRAY[0]=="高校版")				{
			$sql = "INSERT INTO TD_OA.sys_function VALUES('362','c804','招生就业管理','EDU/Interface/EDU/MAIN_JIUYE.php');";		$db->Execute($sql);	//print $sql."<BR>";		//招生就业管理
			//重新设置SCHOOL_MODEL内容
			$filename = "../Interface/EDU/SCHOOL_MODEL.ini";
			@unlink($filename);
			$somecontent="[section]\nSCHOOL_MODEL=2";
			$handle = fopen($filename, 'w');
			if (!fwrite($handle, $somecontent)) {
				exit;
			}
			fclose($handle);

		}

		if($SOFTWARE_TYPE_ARRAY[1]=="标准版")				{
			//去除后勤和人事模块
			$sql = "delete from TD_OA.sys_menu where MENU_ID='c1';";			$db->Execute($sql);	//print $sql."<BR>";		//我的资产
			$sql = "delete from TD_OA.sys_menu where MENU_ID='c7';";			$db->Execute($sql);	//print $sql."<BR>";		//后勤管理
			$sql = "delete from TD_OA.sys_menu where MENU_ID='c5';";			$db->Execute($sql);	//print $sql."<BR>";		//部门管理
			$sql = "delete from TD_OA.sys_function where MENU_ID like 'c1%';";  $db->Execute($sql);	//print $sql."<BR>";		//我的资产
			$sql = "delete from TD_OA.sys_function where MENU_ID like 'c7%';";  $db->Execute($sql);	//print $sql."<BR>";		//后勤管理
			$sql = "delete from TD_OA.sys_function where MENU_ID like 'c5%';";  $db->Execute($sql);	//print $sql."<BR>";		//部门管理
			$sql = "delete from TD_OA.sys_function where MENU_ID = 'c810'";		$db->Execute($sql);	//print $sql."<BR>";		//人事管理
		}
		elseif($SOFTWARE_TYPE_ARRAY[1]=="完美服务版")				{
			$sql = "INSERT INTO TD_OA.SYS_MENU VALUES('c1','我的资产','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";		//我的资产
			$sql = "INSERT INTO TD_OA.SYS_MENU VALUES('c5','我的部门','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";		//后勤管理
			$sql = "INSERT INTO TD_OA.SYS_MENU VALUES('c7','后勤管理','EDU');";			$db->Execute($sql);	//print $sql."<BR>";		//部门管理
			$sql = "INSERT INTO TD_OA.sys_function VALUES('281','c102','我的办公用品','EDU/Interface/officeproduct/officeproduct_my.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('295','c104','我的固定资产','EDU/Interface/fixedasset/my_fixedasset.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.SYS_FUNCTION VALUES('391','c106','我的行政考勤','EDU/Interface/XinZhengGuanLi/my_xingzheng.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.SYS_FUNCTION VALUES('346','c108','网上公物报修','EDU/Interface/Teacher/wygl_teacher.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.SYS_FUNCTION VALUES('370','c502','固定资产部门级管理','EDU/Interface/fixedasset/fixedasset_department_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.SYS_FUNCTION VALUES('371','c504','行政考勤部门级管理','EDU/Interface/XinZhengGuanLi/my_bumen_xingzheng.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('280','c730','办公用品管理','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('282','c73001','办公用品信息查阅','EDU/Interface/officeproduct/officeproduct_view.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('283','c73002','办公用品信息管理','EDU/Interface/officeproduct/officeproduct_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('284','c73004','办公用品借用明细','EDU/Interface/officeproduct/officeproductout_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('285','c73005','办公用品领用明细','EDU/Interface/officeproduct/officeproductlingyong_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('286','c73006','办公用品归还明细','EDU/Interface/officeproduct/officeproducttui_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('287','c73008','办公用品入库明细','EDU/Interface/officeproduct/officeproductin_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('288','c73010','办公用品调库明细','EDU/Interface/officeproduct/officeproducttiaoku_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('289','c73012','办公用品报废明细','EDU/Interface/officeproduct/officeproductbaofei_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('290','c73020','办公用品仓库设置','EDU/Interface/officeproduct/officeproductcangku_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('291','c73022','办公用品仓库统计','EDU/Interface/officeproduct/officeproduct_tongji.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('292','c73026','办公用品分类设置','EDU/Interface/officeproduct/officeproductgroup_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('293','c73024','办公用品分项统计','EDU/Interface/officeproduct/officeproduct_fenxiang.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('294','c732','固定资产','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('296','c73203','固定资产全权限管理','EDU/Interface/fixedasset/fixedasset_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('297','c73204','固定资产管理员管理','EDU/Interface/fixedasset/fixedasset_admin_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('299','c73206','固定资产借领明细','EDU/Interface/fixedasset/fixedassetout_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('300','c73207','固定资产归还明细','EDU/Interface/fixedasset/fixedassettui_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('301','c73209','固定资产购置明细','EDU/Interface/fixedasset/fixedassetin_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('302','c73211','固定资产调拨明细','EDU/Interface/fixedasset/fixedassettiaoku_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('303','c73212','固定资产维修明细','EDU/Interface/fixedasset/fixedassetweixiu_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('304','c73213','固定资产报废明细','EDU/Interface/fixedasset/fixedassetbaofei_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('305','c73215','固定资产部门总括统计','EDU/Interface/fixedasset/fixedasset_tongjijianjie.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('306','c73216','固定资产部门明细统计','EDU/Interface/fixedasset/fixedasset_tongji.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('307','c73224','固定资产按批次统计','EDU/Interface/fixedasset/fixedasset_pici.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('308','c73226','己报废资产明细','EDU/Interface/fixedasset/fixedasset_baofei.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('309','c73228','固定资产分类设置','EDU/Interface/fixedasset/fixedassetgroup_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('310','c73230','固定资产部门权限管理','EDU/Interface/fixedasset/inc_fixedasset_priv.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('311','c740','公物维修','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('312','c74002','报修信息','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi1_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('313','c74004','修复确认','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi3_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('314','c74003','报修受理','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi2_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('315','c74005','用料登记','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi4_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('316','c74006','费用结算','EDU/Interface/WuYeGuanLi/wygl_baoxiuxinxi5_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('317','c74007','服务评价','EDU/Interface/WuYeGuanLi/wygl_weixiupingjia_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('318','c74008','类型设置','EDU/Interface/WuYeGuanLi/MAIN_SETTING.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('319','c750','水电工程','@EDU');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('320','c75001','工程信息管理','EDU/Interface/WuYeGuanLi/wygl_gongchengxinxi_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('321','c75002','工程进度管理','EDU/Interface/WuYeGuanLi/wygl_gongchengjindu_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";
			$sql = "INSERT INTO TD_OA.sys_function VALUES('322','c75003','工程合同管理','EDU/Interface/WuYeGuanLi/wygl_gongchenghetong_newai.php');";			$db->Execute($sql);	//print $sql."<BR>";

			$sql = "INSERT INTO TD_OA.sys_function VALUES('388','c810','人力资源','EDU/Interface/XinZhengGuanLi/MAIN_RENLIZIYUAN.php');";		$db->Execute($sql);	//print $sql."<BR>";		//人事管理

		}




	}
}
?>
<HTML>
<?
page_css("软件授权信息");
?>

</HEAD>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
-->
</style>

<body class="bodycolor">

<table id="about" width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0" >
  <tr>
    <td align="center" valign="middle">

		<table width="410"  border="0" align="center" cellpadding="0" cellspacing="0" class="small" style="border:1px solid #006699;">
          <tr>
		    <td height="30" align="middle" colspan=2  bgcolor="#E0F2FC">
			<font color=red>通达中部研发中心(单点科技)软件授权信息说明</font>
			</td>
          </tr>
          <tr>
            <td bgcolor="#E9F6FD" colspan=2>
			<table width="100%" height="100"  border="0" cellpadding="0" cellspacing="12" bordercolor="#333333" class="small">
				<?
				//print_R($_SERVER['SERVER_NAME']);
				$returnmachinecode = returnmachinecode();
				$ini_file=@parse_ini_file('license.ini');
				if($ini_file['REGISTER_CODE']=="")	{
					$ini_file['REGISTER_CODE']	= "软件未注册-试用版本";
					$ini_file['USER_NUMBER']	= "软件未注册-试用版本";
					$ini_file['SERVER_NAME']	= "软件未注册-试用版本";
					$ini_file['SCHOOL_NAME']	= "软件未注册-试用版本";
					$ini_file['SOFTWARE_TYPE']	= "软件未注册-试用版本";
					$ini_file['SOFTWARE_DATE']	= "软件未注册-试用版本";
					@unlink('license.ini');
				}
				else	{
					$ini_file['USER_NUMBER'] = "不限制";
				}
				?>
				<tr>
                <td height="50" colspan="2" valign="top">
				<p class="td">
				服务器版本：<b></b><font color=red><?=$_SERVER['SERVER_SOFTWARE']?></font><br>
				软件版本号：<b></b><font color=red>1.<?=$软件版本号S?>.<?=$软件版本号?></font><br>
				软件机器码：<b></b><font color=red><?=$returnmachinecode?></font><br>

				软件注册码：<b></b><font color=red><?=$ini_file['REGISTER_CODE']?></font><br>

				软件用户数：<b></b><font color=red><?=$ini_file['USER_NUMBER']?></font><br>
				软件注册域名：<b></b><font color=red><?=$ini_file['SERVER_NAME']?></font><br>
				软件注册单位：<b></b><font color=red><?=$ini_file['SCHOOL_NAME']?></font><br>
				软件注册类型：<b></b><font color=red><?=$ini_file['SOFTWARE_TYPE']?></font><br>
				软件授权时间：<b></b><font color=red><?=$ini_file['SOFTWARE_DATE']?></font><br>
				</td>
                </tr>
				<tr>
                  <td colspan="2" valign="top"><p class="td"><font color=red>对数据操作区快捷键使用的说明(使用ALT键)：</font>
				  </td>
                </tr>
                <tr>
                  <td width="50%" valign="top"><font color=green>ALT+N</font>：新建(<U>N</U>ew)</td>
                  <td width="50%" valign="top"><font color=green>ALT+F</font>：查找(<U>F</U>ind)</td>
                </tr>
                <tr>
                  <td width="50%" valign="top"><font color=green>ALT+X</font>：导出(E<U>x</U>port)</td>
                  <td width="50%" valign="top"><font color=green>ALT+I</font>：导入(<U>I</U>mport)</td>
                </tr>
                <tr>
                  <td width="50%" valign="top"><font color=green>ALT+1</font>：第1行记录(<U>1</U>)</td>
				  <td width="50%" valign="top"><font color=green>ALT+2</font>：第2行记录(<U>2</U>)</td>

                </tr>
                <tr>
				  <td width="50%" valign="top"><font color=green>ALT+E</font>：对选中记录编辑(<U>E</U>dit)</td>
                  <td width="50%" valign="top"><font color=green>ALT+D</font>：对记录删除(<U>D</U>elete)</td>
                </tr>
                <tr>
				  <td width="50%" valign="top"><font color=green>ALT+S</font>：保存(<U>S</U>ave)</td>
                  <td width="50%" valign="top"><font color=green>ALT+C</font>：返回(<U>C</U>ancel)</td>
                </tr>
				<tr>
				  <td width="50%" valign="top"><font color=green>ALT+P</font>：打印(<U>P</U>rint)</td>
                  <td width="50%" valign="top"><font color=green>ALT+R</font>：报表(<U>R</U>eport)</td>
                </tr>

                <tr>
                  <td height="50" colspan="2" valign="top"><p class="td">警告：本计算机程序受著作权法和国际公约的保护，未经授权擅自复制或散布本程序的部分或全部，将承受严厉的民事和刑事处罚，对已知的违反者将给予法律范围内的全面制裁。 </p></td>
                </tr>
            </table>
			</td>
          </tr>
        </table>

	</td>
  </tr>
</table>

</body>
</HTML>
