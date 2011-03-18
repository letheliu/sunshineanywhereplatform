<?
session_start();
global $framework_html;
$choose_lang=$_GET['choose_lang'];
if($choose_lang=='')		{
	$choose_lang='zh';
}

$framework_html['zh']['shutdown']="关闭";
$framework_html['zh']['calendar']="日历";
$framework_html['zh']['ThisMonth']="本月";
$framework_html['zh']['Year']="年";
$framework_html['zh']['NextYear']="下一年";
$framework_html['zh']['LastYear']="上一年";
$framework_html['zh']['Month']="月";
$framework_html['zh']['NextMonth']="下一月";
$framework_html['zh']['LastMonth']="上一月";

$framework_html['en']['shutdown']="Close";
$framework_html['en']['calendar']="Calendar";
$framework_html['en']['ThisMonth']="Month";
$framework_html['en']['Year']="Year";
$framework_html['en']['NextYear']="Next Year";
$framework_html['en']['LastYear']="Last Year";
$framework_html['en']['Month']="Month";
$framework_html['en']['NextMonth']="Next Month";
$framework_html['en']['LastMonth']="Last Month";

$datetime=$_GET[datetime];
if($datetime=='')	{
	$datetime='BEGIN_DATE';
}


print "<LINK href=\"/theme/$LOGIN_THEME/style.css\" rel=stylesheet>";

?>

<html>
<head>
<title><?=$framework_html[$choose_lang]['calendar']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">


<script language="JavaScript">
function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function doCal()
{
  n=new Date();
  var n = new Date();
  var cy = n.getFullYear();
  var cm = n.getMonth();
  var cd = n.getDate();
  n.setFullYear(cy);
  n.setMonth(cm);

  writeMonth(n);
}

function set_year(op)
{
  if(op==-1 && document.form1.YEAR.selectedIndex==0)
     return;
  if(op==1 && document.form1.YEAR.selectedIndex==(document.form1.YEAR.options.length-1))
     return;

  document.form1.YEAR.selectedIndex=document.form1.YEAR.selectedIndex+op;

  yr=document.form1.YEAR.value;
  cm=document.form1.MONTH.value;
  doOther(yr,cm);
}

function set_mon(op)
{
  if(op==-1 && document.form1.MONTH.selectedIndex==0)
     return;
  if(op==1 && document.form1.MONTH.selectedIndex==(document.form1.MONTH.options.length-1))
     return;

  document.form1.MONTH.selectedIndex=document.form1.MONTH.selectedIndex+op;

  yr=document.form1.YEAR.value;
  cm=document.form1.MONTH.value;
  doOther(yr,cm);
}

function doOther(yr,cm)
{
  n=new Date();
  n.setFullYear(yr);
  n.setMonth(cm-1);
  writeMonth(n);
}

function writeMonth(n)
{
	var Today = new Date();
	var tY = Today.getFullYear();
	var tM = Today.getMonth();
	var tD = Today.getDate();
  yr=document.form1.YEAR.value;
  cm=document.form1.MONTH.value;
  n.setDate(1);dow=n.getDay();moy=n.getMonth();

  for (i=0;i<41;i++)
  {
    if ((i<dow)||(moy!=n.getMonth()))
       dt="&nbsp;";
    else
    {
      dt=n.getDate();
      n.setDate(n.getDate()+1);

      if(dt==tD&&moy==tM&&yr==tY)
         dt="<a href='#' onclick='dateClick("+dt+")'><font color=red>"+dt+"</font></a>";
      else
         dt="<a href='#' onclick='dateClick("+dt+")'>"+dt+"</a>";
    }

    MM_findObj('day')[i].innerHTML="<b>"+dt+"</b>";
  }
}

function setPointer(theRow, thePointerColor)
{
   theRow.bgColor = thePointerColor;
}

var parent_window = window.dialogArguments;

function dateClick(theDate)
{
   yr=document.form1.YEAR.value;
   cm=document.form1.MONTH.value;
   if(theDate<10)	theDate="0"+theDate;
   date_str=yr+"-"+cm+"-"+theDate;
   parent_window.form1.<?=$datetime?>.value=date_str;
   window.close();
}

function thisMonth()
{
	var Today = new Date();
	var tY = Today.getFullYear();
	var tM = Today.getMonth();
	var tD = Today.getDate();
<?php if($_GET['datetime']=='出生年月'||$_GET['datetime']=='出生日期') {	?>
   document.form1.YEAR.selectedIndex=(tY-1950-18);
<? } else   {?>
   document.form1.YEAR.selectedIndex=(tY-1950);
<? } ?>
   document.form1.MONTH.selectedIndex=(tM-0);
   doCal();
}
</script>
</head>

<body class="bodycolor" onload="thisMonth();" topmargin="0" leftmargin="0">
<form action="#"  method="post" name="form1">
<table width="100%" border="0" cellspacing="1" class="small" bgcolor="" cellpadding="3" align="center">
  <tr align="center" class="bodycolor">
    <td colspan="7" class="big1">
      <!-------------- 年 ------------>
        <input type="button" value="〈" class="SmallButton" title="<?=$framework_html[$choose_lang]['Lastyear']?>" onclick="set_year(-1);"><select name="YEAR" class="SmallSelect" onchange="set_year(0);">
		  <?
			for($i=1950;$i<2038;$i++)		{
				$index = (int)date("Y");
				if($i==$index)
					$selectText = "selected";
				print "<option value=\"$i\" $selectText>$i</option>";
				$selectText = '';
			}
		  ?>
        </select>
        <input type="button" value="〉" class="SmallButton" title="<?=$framework_html[$choose_lang]['NextYear']?>" onclick="set_year(1);"> <b><?=$framework_html[$choose_lang]['Year']?></b>

<!-------------- 月 ------------>
        <input type="button" value="〈" class="SmallButton" title="<?=$framework_html[$choose_lang]['LastMonth']?>" onclick="set_mon(-1);"><select name="MONTH" class="SmallSelect" onchange="set_mon(0);">
          <option value="01" >01</option>
          <option value="02" >02</option>
          <option value="03" >03</option>
          <option value="04" >04</option>
          <option value="05" >05</option>
          <option value="06" >06</option>
          <option value="07" >07</option>
          <option value="08" >08</option>
          <option value="09" >09</option>
          <option value="10" >10</option>
          <option value="11" >11</option>
          <option value="12" >12</option>
        </select><input type="button" value="〉" class="SmallButton" title="<?=$framework_html[$choose_lang]['NextMonth']?>" onclick="set_mon(1);"> <b><?=$framework_html[$choose_lang]['Month']?></b>

    </td>
  </tr>
  <tr align="center" class="TableHeader">
    <td width="14%" bgcolor="#FFCCFF"><b>日</b></td>
    <td width="14%"><b>一</b></td>
    <td width="14%"><b>二</b></td>
    <td width="14%"><b>三</b></td>
    <td width="14%"><b>四</b></td>
    <td width="14%"><b>五</b></td>
    <td width="14%" bgcolor="#CCFFCC"><b>六</b></td>
  </tr>
  <tr bgcolor="#FFFFFF" align="center" style="cursor:hand">
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
  </tr>
  <tr bgcolor="#FFFFFF" align="center" style="cursor:hand">
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
  </tr>
  <tr bgcolor="#FFFFFF" align="center" style="cursor:hand">
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
  </tr>
  <tr bgcolor="#FFFFFF" align="center" style="cursor:hand">
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
  </tr>
  <tr bgcolor="#FFFFFF" align="center" style="cursor:hand">
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
  </tr>
  <tr bgcolor="#FFFFFF" align="center" style="cursor:hand">
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%" id="day" onmouseover="setPointer(this,'#E2E8FA')" onmouseout="setPointer(this,'')"></td>
    <td width="14%"><a href="#" onclick="thisMonth();"><b><?=$framework_html[$choose_lang]['ThisMonth']?></b></a></td>
  </tr>
</table>
</form>

</body>
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