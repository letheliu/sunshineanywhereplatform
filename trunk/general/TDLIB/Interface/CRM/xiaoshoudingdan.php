<?
page_css("���۶�������");
$��ǰ���� = date("Y-m-d");
//print_r($_POST);
?>


<SCRIPT>
var now1 =new Date()
StarTime_S=now1.getTime()
</SCRIPT>

<SCRIPT type=text/Javascript src="images/menu.js"></SCRIPT>
<INPUT value=0 type=hidden name=numdot>
<INPUT value=2 type=hidden name=amtdot>
<INPUT value=1 type=hidden name=P17>
<INPUT value=0.17 type=hidden name=P68>
<SCRIPT type=text/Javascript src="images/sys.js"></SCRIPT>
<SCRIPT type=text/Javascript src="images/insert.js"></SCRIPT>

<SCRIPT>


function outProduct(countStr){
	//alert("ѡ�������outProduct"+countStr);
  var fieldname="productid";
  var cliNo=document.frm("hidDataNo").value;
  //alert(cliNo);
  cliNo=countStr; 
  var stockId=document.all("stockId").value;  
  //var fieldValue=document.frm("id_productid_1_wxd_"+cliNo).value;
  var codeValue=document.frm("id_productid_id"+"_1_wxdid_"+cliNo).value;  
  URL="/app/module/code/getstock.jsp?codeValue="+codeValue+"&countStr="+countStr+"&cliNo="+cliNo+"&stockId="+stockId;
   loc_x=254;
   loc_y=262;
  window.showModalDialog(URL,self,"edge:raised;scroll:1;status:1;help:0;resizable:1;dialogWidth:900px;dialogHeight:400px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
 	//window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function  getStock(field)
{
	//alert("ѡ�������field"+field);
   var obj=document.frm(field);
   if (obj.value==""||obj.value==null){
    //  return;
   } else{
   re=/,/g;
   obj.value=obj.value.replace(re,"");
  }
   var outNum=field.substring(field.indexOf("_"),field.length);
   var outNum=outNum.substring(1,outNum.length);   
   outProduct(outNum);   
}
function  onblurStock(field)
{
   var outNum=field.substring(field.indexOf("_"),field.length);
   var outstr="outRowIdplannum"+outNum;
   var obj=document.frm(outstr).value;
   if (obj==""||obj==null){
   alert("ѡ�������");
   return;
  }else{
   check_value_order(field);   
  }
}
</SCRIPT>

<?
//page_css("���۶�������");
//table_begin("100%");
//<table class=TableBlock align=center width=100% >

?>
<META name=GENERATOR content="MSHTML 8.00.6001.19019"></HEAD>
<BODY class=bodycolor>
<DIV id=pinghead></DIV>
<DIV id=eaId align=center>



<FORM method=post name=frm action='crm_order2_newai.php?action=submit'>
<TABLE class=TableBlock border=0 cellSpacing=0 cellPadding=3 width="100%">
  <TBODY>
	  <TR>
		<TD class=TableHeader colSpan=4 noWrap align=left>
		&nbsp;���۶������� ��������Ŀ��*�ŵ�Ϊ������Ŀ</TD>
	  </TR>
	  <TR>
		<TD class=TableData width="15%" noWrap align=right>���&nbsp;</TD>

		<TD class=TableData width="35%" noWrap align=left>
		<INPUT class=SmallInput  maxLength=50 size=13 name=tablecode> * </TD>

		<TD class=TableData width="15%" noWrap align=right>��������&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<INPUT class=SmallStatic  value=<?=$��ǰ����?> readOnly name=tabledate> 
		<INPUT class=SmallButton onclick="query_date('frm.tabledate');" value=��� type=button name=b1> 
		  * </TD>
	  </TR>

	  <TR>
		<TD class=TableData width="15%" noWrap align=right>�ͻ�&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		
		   
		  <?
			$sql = "select �ͻ����� as ����  from crm_customer";
			$rs = $db->CacheExecute(150,$sql);
			$rs_a = $rs -> GetArray();
			$���� = $rs_a;
			$ѡ������ = $_GET['����'];

			if($_GET['����']=="") {
			$ѡ������ = $����[0]['����'];
			}


		  print	 "<Select name='�ͻ�����' >";
			   for($i=0;$i<sizeof($����);$i++)
			   {
				   if($ѡ������==$����[$i]['����'])
				   {
					   $Selected = "selected";
				   }
				   else
				   {
					   $Selected = "";
				   }
			print		  "<Option value='".$����[$i]['����']."' ".$Selected.">".$����[$i]['����']."</Option>";
			   }
			print	 "</Select>";
		  ?>
		    * 
		  </TD>
		<TD class=TableData width="15%" noWrap align=right>�������(��˰)&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<INPUT 
		  onblur="check_value('amt')" class=SmallInput onfocus="init_value1('amt')" 
		  onkeypress="check_input_num('MONEY')" readOnly maxLength=50 size=15 
		  name=amt>
		  </TD>
	   </TR>
 </TBODY>
</TABLE>



<table class=TableBlock align=center width=100% >
  <TBODY>
    <TR>
		<TD class=TableHeader colSpan=3 height=22 noWrap align=left>&nbsp;<A 
		  href='javascript:toggleSetting("block1");'>
		  <IMG id=block1_tgimg border=0 
		  hspace=2 align=absMiddle src="images/plus.gif">��չ��Ŀ��</A>&nbsp;&nbsp; 
		</TD>
	</TR>
	</TBODY>
</TABLE>


<DIV style="DISPLAY: none" id=block1 class=small>

<TABLE class=tableblock border=0 cellSpacing=0 cellPadding=3 width="100%" >
  <TBODY>
	  <TR>
		<TD class=TableData width="15%" noWrap align=right>���۲���&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<SELECT class=SmallSelect name=stockid> 
		  	<OPTION selected value=1>������</OPTION> 
			<OPTION value=3>�칫��</OPTION>
			<OPTION value=5>ea</OPTION> 
			<OPTION value=6>oa</OPTION>			
			</SELECT> * </TD>

		<TD class=TableData width="15%" noWrap align=right>�������(��˰)&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		 <INPUT  onblur="check_value('factpayamt')" class=SmallInput 
		  onfocus="init_value1('factpayamt')" onkeypress="check_input_num('MONEY')" 
		  readOnly name=factpayamt> 
		  </TD>
	</TR>

	  <TR>
		<TD class=TableData width="15%" noWrap align=right>�ƻ�����&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
			<SELECT class=SmallSelect name=intype> 
		    <OPTION selected value=1>�������ۼƻ�</OPTION>
		  	<OPTION value=2>��ʱ���ۼƻ�</OPTION> 
			<OPTION value=3>�������ۼƻ�</OPTION>
			</SELECT> 
			</TD>

		<TD class=TableData width="15%" noWrap align=right>���տ�(������)&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left><INPUT 
		  onblur="check_value('payamt')" class=SmallInput 
		  onfocus="init_value1('payamt')" onkeypress="check_input_num('MONEY')" 
		  readOnly maxLength=50 size=15 name=payamt> </TD>
	</TR>

	  <TR>
		<TD class=TableData width="15%" noWrap align=right>��Ŀ&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<INPUT class=SmallInput  maxLength=50 size=15 name=stockinsign> </TD>
		 
		<TD class=TableData width="15%" noWrap align=right>��ע&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		 <INPUT class=SmallInput  maxLength=50 size=15 name=rebate> </TD>
	</TR>

	  <TR>
		<TD class=TableData width="15%" noWrap align=right>����ҵ��Ա&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<INPUT class=SmallInput onclick="query_user('buyman');" value=ϵͳ����Ա maxLength=50 size=15   name=buyman> 
		</TD>

		<TD class=TableData width="15%" noWrap align=right>Ԥ���ͻ�����&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<INPUT class=SmallStatic value=<?=$��ǰ����?> readOnly name=sendDate> 
	    <INPUT class=SmallButton onclick="query_date('frm.sendDate');" value=��� type=button name=b1> 
		</TD>
	</TR>

	  <TR>
		<TD class=TableData width="15%" noWrap align=right>�տʽ&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
			<SELECT class=SmallSelectname=payment> 
			<OPTION selected value=46>Ƿ��</OPTION>
			<OPTION value=49>�ֽ�</OPTION> 
			<OPTION value=56>���ｻ��</OPTION>
			</SELECT>
		</TD>

		<TD class=TableData width="15%" noWrap align=right>������Դ&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<SELECT class=SmallSelect name=sellfrom> 
		  <OPTION selected value=1>��˾ֱ��</OPTION> 
			<OPTION value=2>��һ��������</OPTION>
			<OPTION value=3>�Ϻ�����������</OPTION>
			</SELECT> 
			</TD>
	</TR>

	  <TR>
		<TD class=TableData width="15%" noWrap align=right>�Ͷ�����&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		  <INPUT class=SmallInput  maxLength=50 name=customerPO> * </TD>

		<TD class=TableData width="15%" noWrap align=right>Ԥ�ն���&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<INPUT  onblur="check_value('orderamt')" class=SmallInput 
		  onfocus="init_value1('orderamt')" onkeypress="check_input_num('MONEY')" 
		  maxLength=50 size=10 name=orderamt> 
		  </TD>
	</TR>

	  <TR>
		<TD class=TableData width="15%" noWrap align=right>�տ�ʱ��&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		 <INPUT class=SmallInput  onkeypress="check_input_num('NUMBER')" value=0 maxLength=50 size=10  name=datascope> 
		 </TD>
		<TD class=TableData width="15%" noWrap align=right>��������&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		<INPUT   onblur="check_send('sendAmt')" class=SmallInput 
		  onfocus="init_value_order('sendAmt')" maxLength=50 size=10 name=sendAmt> 
		</TD>
	</TR>

	  <TR>
		<TD class=TableData width="15%" noWrap align=right>�ֿ۽��&nbsp;</TD>
		<TD class=TableData width="35%" noWrap align=left>
		 <INPUT  onblur="check_send('subAmt')" class=SmallInput 
		  onfocus="init_value_order('subAmt')" maxLength=50 size=10 name=subAmt> </TD>

		<TD class=TableData width="15%" noWrap align=right>&nbsp;</TD>
		<TD class=TableData width="35%" noWrap>&nbsp;</TD>
		</TR>
	</TBODY>
</TABLE>
</DIV>




<DIV style="DISPLAY: none" id=block2 class=small>
<TABLE class=tableblock border=0 cellSpacing=1 cellPadding=3 width="100%">

  <TBODY></TBODY></TABLE></DIV>
  <INPUT value=19 type=hidden name=a_count> 
  <INPUT value=,tablecode,tabledate,amt,stockid,factpayamt,intype,payamt,stockinsign,rebate,buyman,sendDate,payment,sellfrom,customerPO,orderamt,datascope,sendAmt,subAmt type=hidden name=Add_fieldName> 
<INPUT value=,CHAR,DATE,CHAR,MONEY,CHAR,MONEY,CHAR,MONEY,CHAR,CHAR,CHAR,DATE,CHAR,CHAR,CHAR,MONEY,NUMBER,MONEY,MONEY 
type=hidden name=Add_fieldType> 
<INPUT value=sellplanmain type=hidden name=Add_table> 
<INPUT value=sellplan/add.jsp type=hidden name=Add_url> 
<INPUT value=sellplan/index.jsp type=hidden name=Back_url> 
<INPUT value=tablecode,tabledate,stockid,customerPO, type=hidden name=FLD_MUST_STR> 
<INPUT value="���,��������,���۲���,�Ͷ�����," type=hidden name=FLD_NAME_STR> 
<INPUT value="���,��������,�ͻ�,�������(��˰),���۲���,�������(��˰),�ƻ�����,���տ�(������),��Ŀ,��ע,����ҵ��Ա,Ԥ���ͻ�����,�տʽ,������Դ,�Ͷ�����,Ԥ�ն���,�տ�ʱ��,��������,�ֿ۽��," 
type=hidden name=ALL_NAME_STR> 
<INPUT value=B04 type=hidden name=ModuleId> 
<INPUT value=8.17 type=hidden name=ExchRate> 
<DIV id=tableContainer class=tableContainer>

<TABLE id=PowerTable class=tableblock border=0 cellSpacing=0 cellPadding=3 width="100%" >
		  <TR>
			<TH width=40 noWrap align=middle>���</TH>
			<TH width=200 noWrap align=middle>��Ʒ����*</TH>
			<TH width=100 noWrap align=middle>���*</TH>
			<TH width=100 noWrap align=middle>�ͺ�*</TH>
			<TH width=100 noWrap align=middle>��������*</TH>
			<TH width=100 noWrap align=middle>��˰����</TH>
			<TH width=100 noWrap align=middle>��˰���</TH>
			<TH width=100 noWrap align=middle>˰��</TH>
			<TH width=100 noWrap align=middle>��˰����</TH>
			<TH width=100 noWrap align=middle>��˰���</TH>
			<TH width=100 noWrap align=middle>�ۿ�(%)</TH>
			<TH width=200 noWrap align=middle>��ϸ��ע</TH></TR>
		  <TBODY id=PowerTableTbody class=scrollContent>
		  <TR>
			<TD class=tabledata noWrap align=middle>
			<INPUT value=1 type=hidden name=dataNo> 1 
			</TD>

			<TD class=tabledata noWrap align=left>
			<INPUT id=id_productid_id_1_wxdid_1 
			  type=hidden name=productid_id value=xxx> 

			  <INPUT id=num_productid_id_1_wxdnum_1 
			  type=hidden name=productid_num> 

			  <INPUT id=num_productid_id_1_wxdrate_1 
			  type=hidden name=productid_rate>

			  <INPUT style="WIDTH: 100%" 
			  id=id_productid_1_wxd_1 class=InputMap title=��ѡ����Ʒ..... 
			  ondblclick="dataQuery('productid','B04',1,this.id);" 
			  onkeypress="dataQuery('productid','B04',1,this.id);" 
			  onclick="dataClick('1'); " maxLength=200 name=productid> 
			  </TD>

			<TD class=InputMap noWrap align=left>
			<INPUT style="WIDTH: 100%" 
			  id=standard_1 class=SmallInput2 onkeypress=insertRow(); maxLength=100 
			  name=standard> </TD>

			<TD class=InputMap noWrap align=left>
			<INPUT style="WIDTH: 100%" id=mode_1 
			  class=SmallInput2 onkeypress=insertRow(); maxLength=100 name=mode> </TD>

			<TD class=InputMap noWrap align=left>
			<INPUT 
			  onblur=check_value_order(this.id) style="WIDTH: 100%" id=plannum_1 
			  class=SmallInput2 onfocus=init_value_order(this.id) 
			  onkeypress="check_input_num('NUMBER')" maxLength=100 name=plannum> </TD>
			<TD class=InputMap noWrap align=left><INPUT 
			  onblur=check_value_order(this.id) style="WIDTH: 100%" id=faxprice_1 
			  class=SmallInput2 onfocus=init_value_order(this.id) 
			  onkeypress="check_input_num('MONEY')" maxLength=100 name=faxprice> </TD>
			<TD class=InputMap noWrap align=left><INPUT 
			  onblur=check_value_order(this.id) style="WIDTH: 100%" id=faxamt_1 
			  class=SmallInput2 onfocus=init_value_order(this.id) 
			  onkeypress="check_input_num('MONEY')" readOnly maxLength=100 name=faxamt> 
			</TD>
			<TD class=InputMap noWrap align=left><INPUT 
			  onblur=check_value_order(this.id) style="WIDTH: 100%" id=faxrate_1 
			  class=SmallInput2 onfocus=init_value_order(this.id) 
			  onkeypress="check_input_num('NUMBER')" value=0.17 maxLength=100 
			  name=faxrate> </TD>
			<TD class=InputMap noWrap align=left><INPUT 
			  onblur=check_value_order(this.id) style="WIDTH: 100%" id=price_1 
			  class=SmallInput2 onfocus=init_value_order(this.id) 
			  onkeypress="check_input_num('MONEY')" maxLength=100 name=price> </TD>
			<TD class=InputMap noWrap align=left><INPUT 
			  onblur=check_value_order(this.id) style="WIDTH: 100%" id=money_1 
			  class=SmallInput2 onfocus=init_value_order(this.id) 
			  onkeypress="check_input_num('MONEY')" readOnly maxLength=100 name=money> 
			</TD>
			<TD class=InputMap noWrap align=left><INPUT 
			  onblur=check_value_order(this.id) style="WIDTH: 100%" id=detailrate_1 
			  class=SmallInput2 onfocus=init_value_order(this.id) 
			  onkeypress="check_input_num('NUMBER')" maxLength=100 name=detailrate> </TD>
			<TD class=InputMap noWrap align=left><INPUT style="WIDTH: 100%" 
			  id=sellplandetailsign_1 class=SmallInput2 onkeypress=insertRow(); 
			  maxLength=200 name=sellplandetailsign> </TD>
			 </TR>
	  </TBODY>
</TABLE>
</DIV>
	  
<INPUT type=hidden name=flag> 
<INPUT type=hidden name=flagState> 
<INPUT type=hidden name=actionStateId> 
<INPUT value=11 type=hidden name=s_count> 
<INPUT value=1 type=hidden name=P19>
<INPUT value=1 type=hidden name=P20>
<INPUT value=1 type=hidden name=dataCount>
<INPUT value=0 type=hidden name=StockOutType> 
<INPUT value=1 type=hidden name=StockIsNeg> 
<INPUT value=,productid,standard,mode,plannum,faxprice,faxamt,faxrate,price,money,detailrate,sellplandetailsign 
type=hidden name=secAdd_fieldName>
<INPUT value=,CHAR,CHAR,CHAR,NUMBER,MONEY,MONEY,NUMBER,MONEY,MONEY,NUMBER,CHAR 
type=hidden name=secAdd_fieldType>
<INPUT value=sellplandetail type=hidden 
name=secAdd_table> 
<INPUT value=productid,standard,mode,plannum, type=hidden 
name=secFLD_MUST_STR> 
<INPUT value=��Ʒ����,���,�ͺ�,��������, type=hidden name=secFLD_NAME_STR> 
<INPUT 
value=��Ʒ����,���,�ͺ�,��������,��˰����,��˰���,˰��,��˰����,��˰���,�ۿ�(%),��ϸ��ע, type=hidden 
name=secALL_NAME_STR> 
<INPUT type=hidden name=iaOpen> 
<INPUT type=hidden name=hidDataNo> 
<INPUT type=hidden name=chinaAmt>
</FORM>

<BR 
style="LINE-HEIGHT: 10px">
<SCRIPT> 
  
 
  document.all("pinghead").style.display="none";
 </SCRIPT>

<SCRIPT language=JavaScript1.2>
function window.onload(){
  dragTableInit(true);
}
</SCRIPT>
<INPUT id=btninsert class=SmallButton onclick=javascript:add_row(Main_Tab); value=�����ϸ type=button name=btninsert>&nbsp;&nbsp;&nbsp; 
<INPUT id=btnsave class=SmallButton onclick="javascript:del_row(Main_Tab) ;" value=ɾ����ϸ type=button name=btnsave>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

<INPUT id=btnsave class=SmallButton onclick="javascript:secorderaddnew('2') ;" value=���� type=button name=btnsave>&nbsp;&nbsp;&nbsp; 

<INPUT id=btnlist class=SmallButton onclick=javascript:window.location.reload(true); value=���� type=button name=btnlist>&nbsp;&nbsp;&nbsp; 
</DIV>



<DIV style="DISPLAY: none" id=updateId>
<TABLE class=small border=0 cellSpacing=1 cellPadding=3 width="98%" bgColor=#000000>
  <TBODY>
	  <TR>
		<TD class=TableContent height=100 noWrap 
		  align=middle>�����򱾵�λEA�������ύ���ݣ������ĵȴ�������ˢ�±�ҳ�棡 <BR>
		<SCRIPT language=jscript>
		elt="0123456789ABCDEF";
		var sTBHTMLS="";
		var sTBHTMLE="";
		for(var i=0;i<0xFF-0x99;i+=2)
		{
			var cr="";
			var l;
			var sTBHTML="";
			l=i+0x99;
			for(var j=0;j<2;j++)
			{
				var n=l % 16;
				l=l >> 4;
				cr=elt.charAt(n)+cr;
			}
			l=i+0x33;
			for(var j=0;j<2;j++)
			{
				var n=l % 16;
				l=l >> 4;
				cr=elt.charAt(n)+cr;
			}
			l=i;
			for(var j=0;j<2;j++)
			{
				var n=l % 16;
				l=l >> 4;
				cr=elt.charAt(n)+cr;
			}
			var w=i>(0xFF-0xA0)?8:4
			sTBHTML="<span style='height:6;width:"+w+";background-color:#"+cr+";margin:0;padding:0'></span>"
			sTBHTMLS+=sTBHTML;
			sTBHTMLE=sTBHTML+sTBHTMLE;
		}
		var sTBHTML=sTBHTMLS+sTBHTMLE;
		document.write("<marquee scrollamount='12' direction='right'  scrolldelay='1' height='4' style='width:100%;height:4; font-size:6px;background-color:#003399'>")
		document.write(sTBHTML)
		document.write("</marquee>")
		</SCRIPT>
		</TD>
		</TR>
	</TBODY>
</TABLE>
</DIV>

<DIV style="HEIGHT: 0px" id=hiddenDataId>
<TABLE style="DISPLAY: none" class=small border=0 cellSpacing=0 cellPadding=3 width="100%">
  <TBODY>
	  <TR id=hiddenDataIdtr>
		<TD class=InputMap width=40 noWrap align=middle><INPUT value=1 type=hidden name=dataNo> 1</TD>
		<TD class=InputMap noWrap align=left><INPUT id=id_productid_id_1_wxdid_dxw 
		  type=hidden name=productid_id> <INPUT id=num_productid_id_1_wxdnum_dxw 
		  type=hidden name=productid_num> <INPUT id=num_productid_id_1_wxdrate_dxw 
		  type=hidden name=productid_rate> <INPUT style="WIDTH: 100%" 
		  id=id_productid_1_wxd_dxw class=SmallInput2 title=��ѡ����Ʒ..... 
		  ondblclick="dataQuery('productid','B04',1,this.id);" 
		  onkeypress="dataQuery('productid','B04',1,this.id);" 
		  onclick="dataClick('1'); " maxLength=53 name=productid> 
		</TD>
		<TD class=InputMap noWrap align=left><INPUT style="WIDTH: 100%" 
		  id=standard_dxw class=SmallInput2 onkeypress=insertRow(); maxLength=50 
		  name=standard> 
		</TD>
		<TD class=InputMap noWrap align=left><INPUT style="WIDTH: 100%" 
		  id=mode_dxw class=SmallInput2 onkeypress=insertRow(); maxLength=50 
		  name=mode> 
		</TD>
		<TD class=InputMap noWrap align=left><INPUT 
		  onblur=check_value_order(this.id) style="WIDTH: 100%" id=plannum_dxw 
		  class=SmallInput2 onfocus=init_value_order(this.id) 
		  onkeypress="check_input_num('NUMBER')" maxLength=54 name=plannum> 
		</TD>
		<TD class=InputMap noWrap align=left><INPUT 
		  onblur=check_value_order(this.id) style="WIDTH: 100%" id=faxprice_dxw 
		  class=SmallInput2 onfocus=init_value_order(this.id) 
		  onkeypress="check_input_num('MONEY')" maxLength=10 name=faxprice> 
		</TD>
		<TD class=InputMap noWrap align=left><INPUT 
		  onblur=check_value_order(this.id) style="WIDTH: 100%" id=faxamt_dxw 
		  class=SmallInput2 onfocus=init_value_order(this.id) 
		  onkeypress="check_input_num('MONEY')" readOnly maxLength=10 name=faxamt> 
		</TD>
		<TD class=InputMap noWrap align=left><INPUT 
		  onblur=check_value_order(this.id) style="WIDTH: 100%" id=faxrate_dxw 
		  class=SmallInput2 onfocus=init_value_order(this.id) 
		  onkeypress="check_input_num('NUMBER')" value=0.17 maxLength=10 
		  name=faxrate> 
		 </TD>
		<TD class=InputMap noWrap align=left><INPUT 
		  onblur=check_value_order(this.id) style="WIDTH: 100%" id=price_dxw 
		  class=SmallInput2 onfocus=init_value_order(this.id) 
		  onkeypress="check_input_num('MONEY')" maxLength=56 name=price>
		</TD>
	<TD class=InputMap noWrap align=left><INPUT 
		  onblur=check_value_order(this.id) style="WIDTH: 100%" id=money_dxw 
		  class=SmallInput2 onfocus=init_value_order(this.id) 
		  onkeypress="check_input_num('MONEY')" readOnly maxLength=57 name=money> 
	</TD>
	<TD class=InputMap noWrap align=left><INPUT 
		  onblur=check_value_order(this.id) style="WIDTH: 100%" id=detailrate_dxw 
		  class=SmallInput2 onfocus=init_value_order(this.id) 
		  onkeypress="check_input_num('NUMBER')" maxLength=10 name=detailrate> </TD>
	<TD class=InputMap noWrap align=left><INPUT style="WIDTH: 100%" 
		  id=sellplandetailsign_dxw class=SmallInput2 onkeypress=insertRow(); 
		  maxLength=58 name=sellplandetailsign> 
	</TD>
	</TR>
</TBODY>
</TABLE>
</DIV>
</BODY>
</HTML><?
/*
	��Ȩ����:֣�ݵ���Ƽ�������޹�˾;
	��ϵ��ʽ:0371-69663266;
	��˾��ַ:����֣�ݾ��ü��������������־�����·ͨ�Ų�ҵ԰��¥����;
	��˾���:֣�ݵ���Ƽ�������޹�˾λ���й��в�����-֣��,������2007��1��,�����ڰѻ����Ƚ���Ϣ����������ͨ�ż���������ѹ�����ҵ��ʵ���ռ���������ҵ�ͻ��Ĺ�����ҵ���»�У�ȫ���ṩ��������֪ʶ��Ȩ�Ľ�����������������������������в�������ĸ�У���������������СѧУ��������ṩ�̡�Ŀǰ�����ж�Ҹ�ְ����ְ��ԺУʹ��ͨ���в��з����Ŀ���������ͷ���;

	�������:����Ƽ�������������Լܹ�ƽ̨,�Լ��������֮����չ���κ��������Ʒ;
	����Э��:���ֻ�У԰��ƷΪ��ҵ���,�������ΪLICENSE��ʽ;����CRMϵͳ��SunshineCRMϵͳΪGPLV3Э�����,GPLV3Э����������뵽�ٶ�����;
	��������:�����ʹ�õ�ADODB��,PHPEXCEL��,SMTARY���ԭ��������,���´���������������;
	*/
?>