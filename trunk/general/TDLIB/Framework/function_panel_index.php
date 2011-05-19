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







</html>
