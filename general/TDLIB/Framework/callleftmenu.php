<?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// display warnings and errors
error_reporting(E_WARNING | E_ERROR);


if($_GET[rows]=='')	{
	$rows=200;
}
else	{
	$rows=$_GET[rows];
}

$LOGIN_THEME=$_SESSION['SUNSHINE_USER_LOGIN_THEME'];
$LOGIN_THEME==""?$LOGIN_THEME=1:'';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>控制左菜单显隐</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<LINK href="../theme/<?=$LOGIN_THEME?>/style.css" rel=stylesheet>
<SCRIPT language=JavaScript>

var LEFT_MENU_VIEW=0;

function leftmenu_open()
{
   LEFT_MENU_VIEW=0;
   leftmenu_ctrl();
}

function leftmenu_ctrl()
{
   if(LEFT_MENU_VIEW==0)
   {
      parent.frame2.cols="<?=$rows?>,8,*";
      LEFT_MENU_VIEW=1;
      myarrow.src="./images/arrow_l.gif";
   }
   else
   {
      parent.frame2.cols="0,8,*";
      LEFT_MENU_VIEW=0;
      myarrow.src="./images/arrow_r.gif";
   }
}

function setPointer(theRow, thePointerColor)
{
    if (typeof(theRow.style) == 'undefined' || typeof(theRow.cells) == 'undefined')
    {
        return false;
    }

    var row_cells_cnt=theRow.cells.length;
    for (var c = 0; c < row_cells_cnt; c++)
    {
        theRow.cells[c].bgColor = thePointerColor;
    }

    return true;
}

</SCRIPT>

<META content="MSHTML 6.00.2800.1106" name=GENERATOR></HEAD>
<BODY leftMargin=0 topMargin=0 onload=leftmenu_ctrl()>

<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" align=center 
background="../theme/<?=$LOGIN_THEME?>/images/index0_02.gif">
  <TBODY>
  <TR>
    <TD>
      <TABLE height=50 cellSpacing=0 borderColorDark=#ffffff cellPadding=0 
      width="100%" bgColor=#eeeeee borderColorLight=#000000 border=1>
        <TBODY>
        <TR onmouseover="setPointer(this, '#D3E5FF')" onclick=leftmenu_ctrl() 
        onmouseout="setPointer(this, '#EEEEEE')">
          <TD style="CURSOR: hand"><IMG id=myarrow 
            src="./images/arrow_l.gif"> 
  </TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>


  </BODY></HTML><?
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