<?
//##########################################################
//格式：_add _view _Value		说明性表述方式
//userDefineInforStatus_add		新增与编辑的函数编制，两个参数：前者为数组图，后者为字段索引值
//userDefineInforStatus_view	查阅视图函数说明
//userDefineInforStatus_Value	列表视图说明
//#########################################################
//提供图书管理部分中图书状态的部分信息设定。
//#########################################################
$bookstatus = "在图书列表视图部分管理各种状态的图书";
function bookstatus_Value($fieldvalue,$fields,$i)		{
	global $db;
	global $tablename,$html_etc,$common_html;
	$Text = "";
	$所属状态 = strip_tags($fields['value'][$i]['所属状态']);
	$图书编号 = strip_tags($fields['value'][$i]['图书编号']);
	$图书名称 = strip_tags($fields['value'][$i]['图书名称']);
	$图书类别 = strip_tags($fields['value'][$i]['图书类别']);
	$采购标识 = strip_tags($fields['value'][$i]['采购标识']);
	$所属部门 = strip_tags($fields['value'][$i]['所属部门']);


	$Text .= $所属状态."(";

	if($所属状态!="图书已分配"&&$所属状态!="图书已报废"&&$所属状态!="图书已丢失") $Text .= "<a class=OrgAdd href=\"bookssetout_newai.php?".base64_encode("action=add_default&图书编号=$图书编号&图书编号_NAME=图书编号&图书编号_disabled=disabled&图书名称=$图书名称&图书名称_NAME=图书名称&图书名称_disabled=disabled&所属部门=$所属部门&所属部门_NAME=DEPT_NAME&所属部门_disabled=disabled")."\">借领</a> ";

	if($所属状态!="图书已报废"&&$所属状态!="图书已丢失") $Text .= "<a class=OrgAdd href=\"bookstuihuan_newai.php
?".base64_encode("action=add_default&图书编号=$图书编号&图书编号_NAME=图书编号&图书编号_disabled=disabled&图书名称=$图书名称&图书名称_NAME=图书名称&图书名称_disabled=disabled&所属部门=$所属部门&所属部门_NAME=DEPT_NAME&所属部门_disabled=disabled")."\">归还</a> ";

	if($所属状态!="图书已报废"&&$所属状态!="图书已丢失") $Text .= "<a class=OrgAdd href=\"bookssetin_newai.php
?".base64_encode("action=add_default&图书编号=$图书编号&图书编号_NAME=图书编号&图书编号_disabled=disabled&图书名称=$图书名称&图书名称_NAME=图书名称&图书名称_disabled=disabled&所属部门=$所属部门&所属部门_NAME=DEPT_NAME&所属部门_disabled=disabled&采购标识=$采购标识&图书类别=$图书类别")."\">采购</a> ";

	if($所属状态!="图书已报废"&&$所属状态!="图书已丢失") $Text .= "<a class=OrgAdd href=\"bookstiaobo_newai.php
?".base64_encode("action=add_default&图书编号=$图书编号&图书编号_NAME=图书编号&图书编号_disabled=disabled&图书名称=$图书名称&图书名称_NAME=图书名称&图书名称_disabled=disabled&原有所属部门=$所属部门&原有所属部门_NAME=DEPT_NAME&原有所属部门_disabled=disabled")."\">调拨</a> ";

	if($所属状态!="图书已报废"&&$所属状态!="图书已丢失") $Text .= "<a class=OrgAdd href=\"booksdiushi_newai.php?".base64_encode("action=add_default&图书编号=$图书编号&图书编号_NAME=图书编号&图书编号_disabled=disabled&图书名称=$图书名称&图书名称_NAME=图书名称&图书名称_disabled=disabled&所属部门=$所属部门&所属部门_NAME=DEPT_NAME&所属部门_disabled=disabled")."\">丢失</a> ";

	if($所属状态!="图书已报废"&&$所属状态!="图书已丢失") $Text .= "<a class=OrgAdd href=\"bookssetbaofei_newai.php
?".base64_encode("action=add_default&图书编号=$图书编号&图书编号_NAME=图书编号&图书编号_disabled=disabled&图书名称=$图书名称&图书名称_NAME=图书名称&图书名称_disabled=disabled&所属部门=$所属部门&所属部门_NAME=DEPT_NAME&所属部门_disabled=disabled")."\">报废</a>";

	if($所属状态=="图书已报废") $Text .= "<font color=green>该图书已经处于报废状态
	</font>";
	if($所属状态=="图书已丢失") $Text .= "<font color=green>该图书已经处于丢失状态
    </font>";
	$Text .= ")";


	return $Text;
}
?>