<?
session_start();
$SYSTEM_EDU_CRM_WUYE = $_SESSION['SYSTEM_EDU_CRM_WUYE'];
//print_R($SYSTEM_EDU_CRM_WUYE);
require_once('cache.inc.php');
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">

<script>
var menu_id=1;

//----------- 设置选择的演示 -----------
function setPointer(element,over_flag,menu_id_over)
{
  if(menu_id!=menu_id_over)                        // 判断当前位置是否已经被选中
  {
     if(over_flag==1)
        element.className='menu_operation_3';      // 鼠标进入显示颜色
     else
        element.className='menu_operation_2';      // 鼠标离开显示演示
  }
}

//----------- 初始话显示面板 -------------
var init_flag=0;
function init_menu()
{
 // init_flag++;
 // if(init_flag==2)
     view_menu();
}

//------------ 查看面板中的页 ------------
function view_menu(id)
{
  //if(menu_id==id)
    // return;
  menu_id=id;


  if(id==1)
  {
     menu_main.location="<?=$菜单信息一地址?>";
  }
  else if(id==2)
  {
     //menu_main.location="general/EDU/Framework/user_online.php";
	 parent.parent.table_index.table_main.location="<?=$菜单信息二地址?>";
  }
  else if(id==3)
  {
     parent.parent.table_index.table_main.location="<?=$菜单信息三地址?>";
  }

}


</script>
</head>


<!-- 普通状态登录 -->
<frameset rows="47,*,8"  cols="*" frameborder="NO" border="0" framespacing="0" id="frame1">
<frame name="menu_info" scrolling="no" noresize src="menu_info.php" frameborder="0">
<frame name="menu_main" scrolling="auto" noresize src="/general/<?=$SYSTEM_EDU_CRM_WUYE?>/Interface/Framework/menufromsystempriv.php" frameborder="0">
<frame name="menu_operation" scrolling="no" noresize src="menu_operation.php" frameborder="0">
</frameset>







</html><?
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