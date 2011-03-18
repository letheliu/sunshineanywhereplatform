
var amtdot=document.all("amtdot").value;
if  (amtdot==""||amtdot==null){
	amtdot=2;
	}
var numdot=document.all("numdot").value;
if  (numdot==""||numdot==null){
	numdot=2;
	}
var outType=document.all("P17").value;
var numdotValue="";
var amtdotValue="";
for (i=0;i<numdot;i++){
	numdotValue=numdotValue+"0";
	}
for (i=0;i<amtdot;i++){
	amtdotValue=amtdotValue+"0";
	}	
 var tmpStr="";
 var temInt=1;
 var standtmpStr="";
 var dataTemStr="";
 var fieldNum2="";
  function refreshClienArea() {
    var tempStr=hiddenDataId.innerHTML.replace("style=\"DISPLAY:","");
    //alert(tempStr);
    var repStr="value="+temInt+" name=dataNo> <B>"+temInt+"</B>";
    tempStr=tempStr.replace("value=1 name=dataNo> <B>1</B>",repStr);
    tempStr=tempStr.replace("none\"","");
    var repStr2="_wxd_"+temInt;//
    tempStr=tempStr.replace("_wxd_1",repStr2);
    var repStr3="_wxdid_"+temInt;//
    tempStr=tempStr.replace("_wxdid_1",repStr3);
    var repStr5="_wxdnum_"+temInt;//
    tempStr=tempStr.replace("_wxdnum_1",repStr5);
    var repStr6="_wxdrate_"+temInt;//
    tempStr=tempStr.replace("_wxdrate_1",repStr6);
    var repStr4="dataClick('"+temInt+"')";//
    tempStr=tempStr.replace("dataClick('1')",repStr4);
    var sStr=/dxw/g;
    tempStr=tempStr.replace(sStr,temInt);
    //alert(tempStr);
    if (tmpStr=="")
    {
    standtmpStr=tempStr; 
    tmpStr = tempStr;   	
    }else{
    tmpStr += tempStr;
    }    
    clientArea.innerHTML = tmpStr;   
  }
  function deleteClienArea() {
  	var dataCount=document.frm("dataCount").value;
  	//alert("dataCount"+dataCount);
  	//alert("tmpStr"+tmpStr);
    if (tmpStr==""||dataCount=="1")
    {
     temInt=1;
     alert("无法删除！");   	
     return;
    }else{
    var cuntMon=0;
    //alert("temInt"+temInt);
    for (var i=1;i<=temInt;i++)
    {    	
    	if (document.frm("money_"+i).value!=""&&document.frm("money_"+i).value!=null){
    	cuntMon=cuntMon+parseFloat(document.frm("money_"+i).value);
        }
    }
    if (cuntMon!=0&&cuntMon!=null){
    document.frm("amt").value=cuntMon;
    }
    var lastInt=tmpStr.lastIndexOf("<TABLE class=small cellSpacing=1 cellPadding=3 width=\"");

    tmpStr = tmpStr.substring(0,lastInt);
    document.frm("dataCount").value=parseFloat(dataCount)-1;
    }
    if (clientArea.innerHTML==null||clientArea.innerHTML==""){
    dataId.innerHTML = tmpStr;   
    }else {
  	clientArea.innerHTML = tmpStr;  
  	}
  }
  
  function deleteUpdateClienArea() {   
  	temInt--; 
  	
    if (tmpStr=="")
    {
    	if (dataTemStr!="")     
    	{    	

         dataId.innerHTML = dataTemStr.substring(0,dataTemStr.lastIndexOf("<TABLE"));
         var intDel=dataId.innerHTML.substring(dataId.innerHTML.lastIndexOf("money_")+6,dataId.innerHTML.lastIndexOf("money_")+7)
        var cuntMon=0;
    for (var i=1;i<=parseInt(intDel);i++)
    {

    	if (document.frm("money_"+i).value!=""&&document.frm("money_"+i).value!=null){
    	cuntMon=cuntMon+parseFloat(document.frm("money_"+i).value);
        }
    }
    if (cuntMon!=0&&cuntMon!=null){
    document.frm("amt").value=cuntMon;
    }
        }
    }else{
    tmpStr = tmpStr.substring(0,tmpStr.length-standtmpStr.length);
    clientArea.innerHTML = tmpStr;
    var intDel=clientArea.innerHTML.substring(clientArea.innerHTML.lastIndexOf("money_")+6,clientArea.innerHTML.lastIndexOf("money_")+7)
        var cuntMon=0;
    for (var i=1;i<=parseInt(intDel);i++)
    {
    	if (document.frm("money_"+i).value!=""&&document.frm("money_"+i).value!=null){
    	cuntMon=cuntMon+parseFloat(document.frm("money_"+i).value);
        }
    }
    if (cuntMon!=0&&cuntMon!=null){
    document.frm("amt").value=cuntMon;
    }
    }       
  }
  function insertRow() {
  if (event.keyCode == 10){  
    tmpStr = clientArea.innerHTML;
    
    temInt++;
    refreshClienArea();
    }
  }
  function dataQuery(fieldname,moduleId,countStr,thisRow) {
 if (event.keyCode == 13||event.keyCode == 0){
  var cliNo=document.frm("hidDataNo").value;

  cliNo=thisRow.substring(thisRow.lastIndexOf("_")+1,thisRow.length);

  var supplyId="";
  var stockId="";
  var typeId="0";
  if (document.getElementById("supplyid")!=null){
  supplyId=document.frm("supplyid").value;
  if (supplyId==null||supplyId==""){
  	alert("请先确定单位");
  	return;
  	}
  }
  var customerPO="";
  if (document.getElementById("customerPO")!=null){
  customerPO=document.frm("customerPO").value;
  if (customerPO==null){
  	customerPO==""
  	}
  }
  
  
  
  if (document.getElementById("intype")!=null){
  typeId=document.all("intype").value;  
  }
  if (document.getElementById("outtype")!=null){
  typeId=document.all("outtype").value;  
  }
  if (document.getElementById("stockId")!=null){

stockId=document.all("stockId").value;  

  }
  //alert("id_"+fieldname+"_"+countStr+"_wxd_"+cliNo);
  var fieldValue=document.frm("id_"+fieldname+"_"+countStr+"_wxd_"+cliNo).value;
  var codeValue=document.frm("id_"+fieldname+"_id"+"_"+countStr+"_wxdid_"+cliNo).value;  
  
  URL="/app/module/code/dataquery/index.jsp?moduleId="+moduleId+"&fieldname="+fieldname+"&fieldValue="+fieldValue+"&codeValue="+codeValue+"&countStr="+countStr+"&cliNo="+cliNo+"&supplyId="+supplyId+"&stockId="+stockId+"&typeId="+typeId+"&customerPO="+customerPO;
   loc_x=0;
   loc_y=0;
window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:1000px;dialogHeight:500px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=900px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");
  }
  }  
  function orderQuery(fieldname,moduleId,countStr) {	
 if (event.keyCode == 13){
  var cliNo=document.frm("hidDataNo").value;
  var fieldValue=document.frm("id_"+fieldname+"_"+countStr+"_wxd_"+cliNo).value;
  var codeValue=document.frm("id_"+fieldname+"_id"+"_"+countStr+"_wxdid_"+cliNo).value;
  var supplyId=document.frm("supplyid").value;
  var tableDate=document.frm("tabledate").value;
  URL="/app/module/code/orderquery/index.jsp?moduleId="+moduleId+"&fieldname="+fieldname+"&fieldValue="+fieldValue+"&codeValue="+codeValue+"&countStr="+countStr+"&cliNo="+cliNo+"&supplyId="+supplyId+"&tableDate="+tableDate;
   loc_x=354;
   loc_y=262;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:350px;dialogHeight:250px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  }    
  }  
  function amtQuery(fieldname,moduleId,countStr,thisRow) {
  if (event.keyCode == 13||event.keyCode == 0){
  var cliNo=document.frm("hidDataNo").value;
  cliNo=thisRow.substring(thisRow.lastIndexOf("_")+1,thisRow.length);
  
  var supplyId=document.frm("supplyid").value;
  var fieldValue=document.frm("id_"+fieldname+"_"+countStr+"_wxd_"+cliNo).value;
  var codeValue=document.frm("id_"+fieldname+"_id"+"_"+countStr+"_wxdid_"+cliNo).value;
  URL="/app/module/code/amtquery/index.jsp?moduleId="+moduleId+"&fieldname="+fieldname+"&fieldValue="+fieldValue+"&codeValue="+codeValue+"&countStr="+countStr+"&cliNo="+cliNo+"&supplyId="+supplyId;
   loc_x=0;
   loc_y=0;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:1000px;dialogHeight:500px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  }    
  }
  function clickInsertRow() {
    var dataStr=dataId.innerHTML;
    var hasInt1=dataStr.lastIndexOf("name=dataNo")-2;
    var hasInt2=dataStr.lastIndexOf("name=dataNo")-1;
    var hasInt=dataStr.substring(dataStr.lastIndexOf("name=dataNo")-2,dataStr.lastIndexOf("name=dataNo")-1)
    if (temInt==1){
       if (hasInt>temInt){
       temInt=hasInt;
       }
    }
    temInt++;
    var dataCount=document.frm("dataCount").value;
    var addDataCount=parseFloat(dataCount)+1;
    temInt=addDataCount;
    dataCount=addDataCount.toString();
    document.frm("dataCount").value=dataCount;
    tmpStr = clientArea.innerHTML;    
    refreshClienArea();
  }
  function clickDeleteRow() {
    tmpStr = clientArea.innerHTML;
    if (tmpStr==""||tmpStr==null){
    tmpStr = dataId.innerHTML;	
    	}
    temInt--;
    deleteClienArea();
  }
function secaddnew()
{
   if(value_empty("FLD_MUST_STR","FLD_NAME_STR"))
      return (false);
   frm.flag.value="secaddnew";
   frm.submit();
}
function secupdate()
{
   if(value_empty("FLD_MUST_STR","FLD_NAME_STR"))
      return (false);
   frm.flag.value="secupdate";
   frm.submit();
}
function secamtaddnew()
{
   var i=0;   
   var tableName=document.all.frm.Add_table.value
   var idValue="id_stockinid_id_1_wxdid_";
   if (tableName=="getmain")
   {
   idValue="id_stockoutid_id_1_wxdid_";	
   }
   var idValue2="thispaymoney_";
   
   //var dataArea=dataId.innerHTML;
   //数字校验
   if(value_check("Add_fieldType","ALL_NAME_STR","Add_fieldName"))
      return (false);   
    //明细数据校验  
   if(value_check("secAdd_fieldType","secALL_NAME_STR","secAdd_fieldName"))
      return (false);   
   //提交单据处理   
   if (document.getElementById("updateId")!=null&&document.getElementById("eaId")!=null){
      if (document.all["updateId"].style.display == "none") {
		document.all["updateId"].style.display = "block";
      }
      document.all["eaId"].style.display = "none";
  
     }
     
     
   var dataClient=tableContainer.innerHTML;
   var dataLast="";
   if (tableName=="getmain")
   {
   dataLast=dataClient.lastIndexOf("id_stockoutid_id_1_wxdid");
   }else{
   dataLast=dataClient.lastIndexOf("id_stockinid_id_1_wxdid");
   }
   
   var dataLast2=dataClient.indexOf("thispaymoney_");

   var int1=-1;
   if (tableName=="getmain")
   {
   int1=dataClient.substring(dataLast+25,dataLast+26);
   }else{
   int1=dataClient.substring(dataLast+24,dataLast+25);
   }
   var int2=dataClient.substring(dataLast2+13,dataLast2+14);
   if(dataLast==-1){
   	int1=1;
   	}
   var value1;
   var value2;
   var value3=0;
   for (i=1;i<=int1;i++){  	
   if (tableName=="getmain")
   {
   idValue=idValue.substring(0,25)+i;  
   }else{
   idValue=idValue.substring(0,24)+i;  
   }
   idValue2=idValue2.substring(0,13)+i;
   if (i==1){
   if (tableName=="getmain")
   {
   value1=document.all.frm.id_stockoutid_id_1_wxdid_1.value;
   }else{
   value1=document.all.frm.id_stockinid_id_1_wxdid_1.value;
   }
   }else{
   value1=document.all(idValue).value;
   }
   if (i==1){
   value2=document.all.frm.thispaymoney_1.value;
   }else{
   value2=document.all(idValue2).value;
   }
       if (value1==null||value1==""){
   	alert("请在第"+i+"行第1列通过双击选择商品信息");
   	return;
   	}
      if (value2==null||value2==""){
   	alert("请在第"+i+"行第4列输入商品数量");
   	return;
   	}
   	var sStr=/,/g;
         value2=value2.replace(sStr,"");
     value3=value3+parseFloat(value2);   
   }
   var checkamt="0";

   if (document.getElementById("factgetamt")!=null||document.getElementById("checkamt")!=null){
   	checkamt=document.all("checkamt").value;
   	if (checkamt==null||checkamt==""){
   		checkamt="0";
   		}
   	if (parseFloat(value3)-parseFloat(checkamt)<0){
   		alert("核销金额大于总金额，请重新核销！");
   		return;
   		}
   	document.all("factgetamt").value=parseFloat(value3)-parseFloat(checkamt);
  }

  if (document.getElementById("factgetamt")!=null){
   	var checkamt2="";
   	if (document.getElementById("otherfee")!=null){
   	checkamt2=document.all("otherfee").value;
   	}
   	if (checkamt2==null||checkamt2==""){
   		checkamt2="0";
   		}
   		
   	if (parseFloat(value3)-parseFloat(checkamt2)<0){
   		alert("抵扣费用金额大于总金额，请重新确定！");
   		return;
   		}
   	document.all("factgetamt").value=parseFloat(value3)-parseFloat(checkamt)-parseFloat(checkamt2);
  }

   document.all.frm.paymoney.value=value3;
   frm.flag.value="secorderaddnew";
   
   if(value_empty("FLD_MUST_STR","FLD_NAME_STR"))
      return (false);
      
   frm.submit();
}
function secamtupdate()
{
	 var i=0;   
   var tableName=document.all("Update_table").value;
   var dataCount=document.all("dataCount").value;
   //alert(dataCount);
   var idValue="id_stockinid_id_1_wxdid_";
   if (tableName=="getmain")
   {
   idValue="id_stockoutid_id_1_wxdid_";	
   }
   var idValue2="thispaymoney_";   
   //var dataArea=dataId.innerHTML;
   //数字校验
   if(value_check("Add_fieldType","ALL_NAME_STR","Add_fieldName"))
      return (false);   
    //明细数据校验  
   if(value_check("secAdd_fieldType","secALL_NAME_STR","secAdd_fieldName"))
      return (false);   
   //提交单据处理   
   if (document.getElementById("updateId")!=null&&document.getElementById("eaId")!=null){
      if (document.all["updateId"].style.display == "none") {
		document.all["updateId"].style.display = "block";
      }
      document.all["eaId"].style.display = "none";
  
     }
   
   var dataClient=tableContainer.innerHTML;
   var dataLast="";
   if (tableName=="getmain")
   {
   dataLast=dataClient.lastIndexOf("id_stockoutid_id_1_wxdid");
   }else{
   dataLast=dataClient.lastIndexOf("id_stockinid_id_1_wxdid");
   }
   var dataLast2=dataClient.indexOf("thispaymoney_");
   var int2=dataClient.substring(dataLast2+13,dataLast2+14);
   var value1;
   var value2;
   var value3=0;
   for (i=1;i<=dataCount;i++){  	
   if (tableName=="getmain")
   {
   idValue=idValue.substring(0,25)+i;  
   }else{
   idValue=idValue.substring(0,24)+i;  
   }
   //alert("idValue"+idValue);
   idValue2=idValue2.substring(0,13)+i;
   //alert("tableName"+tableName);
   if (i==1){
   if (tableName.indexOf("getmain")>=0)
   {
   value1=document.all.frm.id_stockoutid_id_1_wxdid_1.value;
   }else{
   value1=document.all.frm.id_stockinid_id_1_wxdid_1.value;
   }
   }else{
   value1=document.all(idValue).value;
   }
   if (i==1){
   value2=document.all.frm.thispaymoney_1.value;
   }else{
   value2=document.all(idValue2).value;
   }
       if (value1==null||value1==""){
   	alert("请在第"+i+"行第1列通过双击选择商品信息");
   	return;
   	}
      if (value2==null||value2==""){
   	alert("请在第"+i+"行第4列输入金额");
   	return;
   	}
   	var sStr=/,/g;
         value2=value2.replace(sStr,"");
     value3=value3+parseFloat(value2);   
   }
   var checkamt="0";
   if (document.getElementById("factgetamt")!=null||document.getElementById("checkamt")!=null){
   	checkamt=document.all("checkamt").value;
   	if (checkamt==null||checkamt==""){
   		checkamt="0";
   		}
   	if (parseFloat(value3)-parseFloat(checkamt)<0){
   		alert("核销金额大于总金额，请重新核销！");
   		return;
   		}
   	document.all("factgetamt").value=parseFloat(value3)-parseFloat(checkamt);
  }
  if (document.getElementById("factgetamt")!=null||document.getElementById("otherfee")!=null){
   	var checkamt2=document.all("otherfee").value;
   	if (checkamt2==null||checkamt2==""){
   		checkamt2="0";
   		}
   		
   	if (parseFloat(value3)-parseFloat(checkamt2)<0){
   		alert("抵扣费用金额大于总金额，请重新确定！");
   		return;
   		}
   	document.all("factgetamt").value=parseFloat(value3)-parseFloat(checkamt)-parseFloat(checkamt2);
  }
   document.all.frm.paymoney.value=value3;
   if(value_empty("FLD_MUST_STR","FLD_NAME_STR"))
      return (false);
      
   frm.flag.value="secorderupdate";
   frm.submit();
}
function clickDeleteUpdateRow() {
    tmpStr = clientArea.innerHTML;
    dataTemStr = dataId.innerHTML;    
    
    deleteUpdateClienArea();
  }
function secorderaddnew(state)
{
   if(value_empty("FLD_MUST_STR","FLD_NAME_STR"))
      return (false);
    //数字校验
   if(value_check("Add_fieldType","ALL_NAME_STR","Add_fieldName"))
      return (false);   
    //明细数据校验  
   if(value_check("secAdd_fieldType","secALL_NAME_STR","secAdd_fieldName"))
      return (false);   
  
  
   frm.flag.value="secorderaddnew";
   var i=0;
   var idValue="id_productid_id_1_wxdid_";
   var idValue2="plannum_";
   //var dataArea=dataId.innerHTML;
   var dataClient=tableContainer.innerHTML;
   var dataLastf=dataClient.lastIndexOf("name=dataNo");
   var dataLastl=dataClient.lastIndexOf("><INPUT type=hidden value=");
   var dataLast=dataClient.lastIndexOf("id_productid_id_1_wxdid");
   var dataLast2=dataClient.indexOf("plannum_");
   var subLast=dataClient.substring(dataLastl+26,dataLastf);
   var int1=dataClient.substring(dataLast+24,dataLast+25);
   var int2=dataClient.substring(dataLast2+8,dataLast2+9);
   
   var StockIsNeg=document.frm("StockIsNeg").value; //付库存标志位
 
   var value1;
   var value2;  
   var nextMoney;
   var nexthasFaxMoney;
   var countMoney=0;
   var counthasFaxMoney=0;
   var dataCount=document.frm("dataCount").value;
   
   document.frm("actionStateId").value=state;
   
   var ModuleId=document.frm("ModuleId").value;

//预收款处理

if (document.getElementById("orderamt")!=null){

	var orderamt=document.frm("orderamt").value;
	
		if (document.getElementById("payamt")!=null){
		
		document.frm("payamt").value=orderamt;
		}
}


 if (ModuleId!="S15"&&ModuleId!="S16"&&ModuleId!="S21"){

   for (i=1;i<=dataCount;i++){
   idValue=idValue.substring(0,24)+i;  
   idValue2=idValue2.substring(0,8)+i;
   if (i==1){
   value1=document.all.frm.id_productid_id_1_wxdid_1.value;
   }else{
   value1=document.all(idValue).value;
   }
   if (i==1){
   value2=document.all.frm.plannum_1.value;
   }else{
   value2=document.all(idValue2).value;
   }
       if (value1==null||value1==""){
   	alert("请在第"+i+"行第1列通过双击选择商品信息");
   	return;
   	}
      if (value2==null||value2==""){
   	alert("请在第"+i+"行第4列输入商品数量");   	
   	return;
  }else{
  	planNum=parseFloat(value2);
  	if (isNaN(planNum)){
  	alert("请输入正确的数量");
  	return;
  }  
  	}   	
   var planNum=document.frm("plannum_"+i).value;
   
      if (document.getElementById("storenum_"+i)!=null){
   var storenumNum=document.frm("storenum_"+i).value;
   var storenumNumFlo=parseFloat(storenumNum);
   if (isNaN(storenumNumFlo)){
   	storenumNum="0";
   	document.frm("storenum_"+i).value="0";
  }   
   	if (parseFloat(planNum)>parseFloat(storenumNum)&&(ModuleId=="S04"||ModuleId=="S17")){
   		var alertName="";
   		if (ModuleId=="S04"){
   			alertName="出库";
   		}else if (ModuleId=="S17"){
   			alertName="需求";
   		}
   		//alert("StockIsNeg="+StockIsNeg);
				   		if (StockIsNeg=="1"){
					   		if(!window.confirm("商品  "+value1+"  "+alertName+"数量大于库存数量,把"+alertName+"数量修改为库存数量吗？")){
						   			if (outType=="1"){
						   			document.frm("plannum_"+i).value="0";
						   		    }
				               return false;
				       }else{
				    	document.frm("plannum_"+i).value=storenumNum;
				    	}
    	}
   		}
  }  
 if (document.getElementById("price_"+i)!=null){//在没有单价和金额的情况下
   //针对税率的处理
    var detailrate= "100";
      if (document.getElementById("detailrate_"+i)!=null){
   //折扣的处理
     var detailrate=  document.frm("detailrate_"+i).value;
    
     if (isNaN(parseFloat(detailrate))){
     detailrate="100";
     }
     if (parseFloat(detailrate)==100){
     document.frm("detailrate_"+i).value="";
     }
     }
     
   if (document.getElementById("faxrate_"+i)!=null){
   var faxrate=document.frm("faxrate_"+i).value;
   var faxrateFlo=parseFloat(faxrate);
   if (isNaN(faxrateFlo)){
   	faxrate="0";
   	document.frm("faxrate_"+i).value="0";
  }
 
  var faxprice=document.frm("faxprice_"+i).value;
  var nofaxprice=document.frm("price_"+i).value;
  faxprice =faxprice.replace(/,/g,"");
   nofaxprice =nofaxprice.replace(/,/g,"");
  if (isNaN(parseFloat(faxprice))){
  	document.frm("faxprice_"+i).value=0;
  	faxprice="0"
  }
  if (isNaN(parseFloat(nofaxprice))){
  	document.frm("price_"+i).value=0;
  	nofaxprice="0"
  } 
  faxprice =faxprice.replace(/,/g,"");
    if (!isNaN(faxprice)){
    if (ModuleId=="B04"||ModuleId=="S04"){
    document.frm("price_"+i).value=parseFloat(document.frm("faxprice_"+i).value.replace(/,/g,""))/(1+parseFloat(document.frm("faxrate_"+i).value));
   
    }else{
    document.frm("price_"+i).value=parseFloat(document.frm("faxprice_"+i).value.replace(/,/g,""))/(1+parseFloat(document.frm("faxrate_"+i).value));
   
    }
   
   }else{
   if (ModuleId=="B04"||ModuleId=="S04"){
   document.frm("faxprice_"+i).value=parseFloat(document.frm("price_"+i).value.replace(/,/g,""))/(1+parseFloat(document.frm("faxrate_"+i).value));
   	
   }else{
   document.frm("faxprice_"+i).value=parseFloat(document.frm("price_"+i).value.replace(/,/g,""))*(1+parseFloat(document.frm("faxrate_"+i).value));
   	
   }
   
  	}
  	// alert("faxprice=="+document.frm("faxprice_"+i).value);
  	 addMoneyStr("price_"+i);
  	 addMoneyStr("faxprice_"+i);
   document.frm("money_"+i).value=parseFloat(document.frm("plannum_"+i).value)*parseFloat(document.frm("price_"+i).value.replace(/,/g,""))*(parseFloat(detailrate)/100);
  
  	  document.frm("faxamt_"+i).value=parseFloat(document.frm("plannum_"+i).value)*parseFloat(document.frm("faxprice_"+i).value.replace(/,/g,""))*(parseFloat(detailrate)/100);

 addMoneyStr("faxamt_"+i);

}else{

 document.frm("money_"+i).value=parseFloat(document.frm("plannum_"+i).value)*parseFloat(document.frm("price_"+i).value.replace(/,/g,""))*(parseFloat(detailrate)/100);

}


 addMoneyStr("money_"+i);


 init_value_order("money_"+i);	
   nextMoney=parseFloat(document.frm("money_"+i).value);
 addMoneyStr("money_"+i);
 
  if (document.getElementById("faxamt_"+i)!=null){
   init_value_order("faxamt_"+i);
  nexthasFaxMoney=document.frm("faxamt_"+i).value;
  }else{
  nexthasFaxMoney=nextMoney;
  }
   if (isNaN(nextMoney)){
   	nextMoney="0";
   	}
   	if (isNaN(nexthasFaxMoney)){
   	nexthasFaxMoney="0";
   	}
   	//document.frm("money_"+i).value=nextMoney;
   		
   	if (document.getElementById("faxamt_"+i)!=null){
   	addMoneyStr("faxamt_"+i);
   	}
   if (nextMoney!=null&&nextMoney!=""){
   countMoney=countMoney+parseFloat(nextMoney);
   }
   if (nexthasFaxMoney!=null&&nexthasFaxMoney!=""){
   counthasFaxMoney=counthasFaxMoney+parseFloat(nexthasFaxMoney);
   }
   
   }
   }
   
   
   var sendAmt="0";
   if (document.getElementById("sendAmt")!=null){
   	sendAmt=document.frm("sendAmt").value;
   	if (sendAmt==null||sendAmt==""){
   		sendAmt="0";
   		}
   	if (sendAmt.indexOf(",")>0){
  	   sendAmt=sendAmt.replace(/,/g,"");
       }		
   	addMoneyStr("sendAmt");	
   	}
   	
   	var subAmt="0";
   if (document.getElementById("subAmt")!=null){
   	subAmt=document.frm("subAmt").value;
   	if (subAmt==null||subAmt==""){
   		subAmt="0";
   		}
   	if (subAmt.indexOf(",")>0){
  	   subAmt=subAmt.replace(/,/g,"");
       }		
   	addMoneyStr("subAmt");	
   	}
   	
   	var sendAmt1="0";
   	if (document.getElementById("sendAmt1")!=null){
   	sendAmt1=document.frm("sendAmt1").value;
   	if (sendAmt1==null||sendAmt1==""){
   		sendAmt1="0";
   		}
   	if (sendAmt1.indexOf(",")>0){
  	   sendAmt1=sendAmt1.replace(/,/g,"");
       }		
   	addMoneyStr("sendAmt1");	
   	}
   	
   	var sendAmt2="0";
   	if (document.getElementById("sendAmt2")!=null){
   	sendAmt2=document.frm("sendAmt2").value;
   	if (sendAmt2==null||sendAmt2==""){
   		sendAmt2="0";
   		}
   	if (sendAmt2.indexOf(",")>0){
  	   sendAmt2=sendAmt2.replace(/,/g,"");
       }		
   	addMoneyStr("sendAmt2");	
   	}
   	
   	var HandlingAmt1="0";
   	if (document.getElementById("HandlingAmt1")!=null){
   	HandlingAmt1=document.frm("HandlingAmt1").value;
   	if (HandlingAmt1==null||HandlingAmt1==""){
   		HandlingAmt1="0";
   		}
   	if (HandlingAmt1.indexOf(",")>0){
  	   HandlingAmt1=HandlingAmt1.replace(/,/g,"");
       }		
   	addMoneyStr("HandlingAmt1");	
   	}
   	
   	var HandlingAmt2="0";
   	if (document.getElementById("HandlingAmt2")!=null){
   	HandlingAmt2=document.frm("HandlingAmt2").value;
   	if (HandlingAmt2==null||HandlingAmt2==""){
   		HandlingAmt2="0";
   		}
   	if (HandlingAmt2.indexOf(",")>0){
  	   HandlingAmt2=HandlingAmt2.replace(/,/g,"");
       }		
   	addMoneyStr("HandlingAmt2");	
   	}
   	
   	
   	if (document.getElementById("amt")!=null){   
   	document.frm("amt").value=countMoney+parseFloat(sendAmt)+parseFloat(sendAmt1)+parseFloat(sendAmt2)+parseFloat(HandlingAmt1)+parseFloat(HandlingAmt2);
    var xiaoxieAmt=frm.amt.value;
     if (document.getElementById("factpayamt")!=null){   
      	document.frm("factpayamt").value=counthasFaxMoney+parseFloat(sendAmt)+parseFloat(sendAmt1)+parseFloat(sendAmt2)+parseFloat(HandlingAmt1)+parseFloat(HandlingAmt2)-parseFloat(subAmt);//修改成含税金额
      	
      	xiaoxieAmt=frm.factpayamt.value;
      	addMoneyStr("factpayamt");
      	}        

	 var daxieAmt=atoc(xiaoxieAmt);
	 frm.chinaAmt.value=daxieAmt;   
	 
	 addMoneyStr("amt");
	 }
	 }
	 
	  //提交单据处理   
   if (document.getElementById("updateId")!=null&&document.getElementById("eaId")!=null){
      if (document.all["updateId"].style.display == "none") {
		document.all["updateId"].style.display = "block";
      }
      document.all["eaId"].style.display = "none";
  
     }
     
 frm.submit();
 
}

function check_send(field)
{

   var obj=document.all(field);
   if(obj.value=="")
      return;
   
   var thisamt=obj.value;
   
 var this_value=document.all(field).value;
        if (this_value!=null&&this_value!=""){
        if (isNaN(this_value)){
        alert("数据格式不正确！");
        document.all(field).focus();
         return (true);
        }
       }
      
}

function checkRate(field)
{
alert("field"+field);
   var obj=document.all(field);
   if(obj.value=="")
      return;

   var allamt=document.all("amt").value;
   var thisRate=obj.value;
   if (allamt==""||allamt==null){
   	allamt="0";
   	}else{
   		if (allamt.indexOf(",")>0){
  	   allamt=allamt.replace(/,/g,"");
       }
     }
    

   	if (field=="rebate"){
   document.all("factpayamt").value=parseFloat(allamt)*(parseFloat(thisRate)/10);
   addMoneyStr("factpayamt");
   }
   if (field=="isfax"){
   	if (thisRate==""||thisRate==null){
      		thisRate="0";
      		}
   document.all("noFaxAmt").value=parseFloat(allamt)/(1+parseFloat(thisRate));
   addMoneyStr("noFaxAmt");
   }
}
function secorderupdate(state)
{   

if(value_empty("FLD_MUST_STR","FLD_NAME_STR"))
      return (false);  
   frm.flag.value="secorderupdate";
frm.actionStateId.value=state;
   
    //数字校验
   if(value_check("Add_fieldType","ALL_NAME_STR","Add_fieldName"))
      return (false);   
    //明细数据校验  
   if(value_check("secAdd_fieldType","secALL_NAME_STR","secAdd_fieldName"))
      return (false);   
   
  

   var i=0;
   var idValue="id_productid_id_1_wxdid_";
   var idValue2="plannum_";
   //var dataArea=dataId.innerHTML;
   var dataClient=tableContainer.innerHTML;
   //alert("dataClient"+dataClient);
   var dataLast=dataClient.lastIndexOf("id_productid_id_1_wxdid");
   var dataLast2=dataClient.indexOf("plannum_");

   var int1=dataClient.substring(dataLast+24,dataLast+25);
   var int2=dataClient.substring(dataLast2+8,dataLast2+9);
   if(dataLast==-1){
   	int1=1;
   	}
   var value1
   var value2  
   var nextMoney;
   var countMoney=0;
   var nexthasFaxMoney;
   var counthasFaxMoney=0;
   var dataCount=document.frm("dataCount").value;
   var ModuleId=document.frm("ModuleId").value;
//预收款处理   
   if (document.getElementById("orderamt")!=null){

	var orderamt=document.frm("orderamt").value;
	
		if (document.getElementById("payamt")!=null){
		
		document.frm("payamt").value=orderamt;
		}
}
   
   
   //alert("dataCount"+dataCount);
if (ModuleId!="S15"&&ModuleId!="S16"&&ModuleId!="S21"){
   for (i=1;i<=dataCount;i++){
   idValue=idValue.substring(0,24)+i;  
   idValue2=idValue2.substring(0,8)+i;
   if (i==1){
   value1=document.all.frm.id_productid_id_1_wxdid_1.value;
   }else{
   value1=document.all(idValue).value;
   }
   if (i==1){
   value2=document.all.frm.plannum_1.value;
   }else{
   value2=document.all(idValue2).value;
   }
       if (value1==null||value1==""){
   	alert("请在第"+i+"行第1列输入商品信息");
   	return;
   	}
      if (value2==null||value2==""){
   	alert("请在第"+i+"行第4列输入商品数量");
   	return;
   	}
   	
   var planNum=document.frm("plannum_"+i).value;
 
if (document.getElementById("price_"+i)!=null){
  //针对税金的处理
  
  var detailrate= "100";
      if (document.getElementById("detailrate_"+i)!=null){
     //折扣的处理
     var detailrate=  document.frm("detailrate_"+i).value;
    
     if (isNaN(parseFloat(detailrate))){
     detailrate="100";
     }
     if (parseFloat(detailrate)==100){
     document.frm("detailrate_"+i).value="";
     }
     }//if (document.getElementById("detailrate_"+i)
     
  if (document.getElementById("faxrate_"+i)!=null){
   var faxrate=document.frm("faxrate_"+i).value;
   var faxrateFlo=parseFloat(faxrate);
   if (isNaN(faxrateFlo)){
   	faxrate="0";
   	document.frm("faxrate_"+i).value="0";
  }
  
  
     
  var faxprice=document.frm("faxprice_"+i).value;
   
  var nofaxprice=document.frm("price_"+i).value;
  faxprice =faxprice.replace(/,/g,"");
   nofaxprice =nofaxprice.replace(/,/g,"");
  if (isNaN(parseFloat(faxprice))){
  	document.frm("faxprice_"+i).value=0;
  	faxprice="0"
  }
  if (isNaN(parseFloat(nofaxprice))){
  	document.frm("price_"+i).value=0;
  	nofaxprice="0"
  }
  
   if (!isNaN(faxprice)){
    if (ModuleId=="B04"||ModuleId=="S04"){
    document.frm("price_"+i).value=parseFloat(document.frm("faxprice_"+i).value.replace(/,/g,""))/(1+parseFloat(document.frm("faxrate_"+i).value));
   
    }else{
    document.frm("price_"+i).value=parseFloat(document.frm("faxprice_"+i).value.replace(/,/g,""))/(1+parseFloat(document.frm("faxrate_"+i).value));
   
    }
   
   }else{
   if (ModuleId=="B04"||ModuleId=="S04"){
   document.frm("faxprice_"+i).value=parseFloat(document.frm("price_"+i).value.replace(/,/g,""))/(1+parseFloat(document.frm("faxrate_"+i).value));
   	
   }else{
   document.frm("faxprice_"+i).value=parseFloat(document.frm("price_"+i).value.replace(/,/g,""))*(1+parseFloat(document.frm("faxrate_"+i).value));
   	
   }
   
  	}//if (!isNaN(faxprice))
  	
  	 addMoneyStr("faxprice_"+i);
  	  addMoneyStr("price_"+i);
  	  
  document.frm("money_"+i).value=parseFloat(document.frm("plannum_"+i).value)*parseFloat(document.frm("price_"+i).value.replace(/,/g,""))*(parseFloat(detailrate)/100);
 
  	  document.frm("faxamt_"+i).value=parseFloat(document.frm("plannum_"+i).value)*parseFloat(document.frm("faxprice_"+i).value.replace(/,/g,""))*(parseFloat(detailrate)/100);

 addMoneyStr("faxamt_"+i);

}else{
document.frm("money_"+i).value=parseFloat(document.frm("plannum_"+i).value)*parseFloat(document.frm("price_"+i).value.replace(/,/g,""))*(parseFloat(detailrate)/100);
 
}

 addMoneyStr("money_"+i);



   init_value_order("money_"+i);	
   nextMoney=parseFloat(document.frm("money_"+i).value);
 
  if (document.getElementById("faxamt_"+i)!=null){
   init_value_order("faxamt_"+i);
  nexthasFaxMoney=document.frm("faxamt_"+i).value;
  }else{
  nexthasFaxMoney=nextMoney;
  }
   if (isNaN(nextMoney)){
   	nextMoney="0";
   	}
   	if (isNaN(nexthasFaxMoney)){
   	nexthasFaxMoney="0";
   	}
   	//document.frm("money_"+i).value=nextMoney;
   	addMoneyStr("money_"+i);	
   	if (document.getElementById("faxamt_"+i)!=null){
   	addMoneyStr("faxamt_"+i);
   	}
   if (nextMoney!=null&&nextMoney!=""){
   countMoney=countMoney+parseFloat(nextMoney);
   }
   if (nexthasFaxMoney!=null&&nexthasFaxMoney!=""){
   counthasFaxMoney=counthasFaxMoney+parseFloat(nexthasFaxMoney);
   }
   
   }
   //alert("countMoney"+countMoney);
   //alert("counthasFaxMoney"+counthasFaxMoney);
  }

 
   var sendAmt="0";
   if (document.getElementById("sendAmt")!=null){
   	sendAmt=document.frm("sendAmt").value;
   	if (sendAmt==null||sendAmt==""){
   		sendAmt="0";
   		}
   	if (sendAmt.indexOf(",")>0){
  	   sendAmt=sendAmt.replace(/,/g,"");
       }		
   	addMoneyStr("sendAmt");	
   	}
   	
   	var sendAmt1="0";
   	if (document.getElementById("sendAmt1")!=null){
   	sendAmt1=document.frm("sendAmt1").value;
   	if (sendAmt1==null||sendAmt1==""){
   		sendAmt1="0";
   		}
   	if (sendAmt1.indexOf(",")>0){
  	   sendAmt1=sendAmt1.replace(/,/g,"");
       }		
   	addMoneyStr("sendAmt1");	
   	}
   	
   	var sendAmt2="0";
   	if (document.getElementById("sendAmt2")!=null){
   	sendAmt2=document.frm("sendAmt2").value;
   	if (sendAmt2==null||sendAmt2==""){
   		sendAmt2="0";
   		}
   	if (sendAmt2.indexOf(",")>0){
  	   sendAmt2=sendAmt2.replace(/,/g,"");
       }		
   	addMoneyStr("sendAmt2");	
   	}
   	
   	var HandlingAmt1="0";
   	if (document.getElementById("HandlingAmt1")!=null){
   	HandlingAmt1=document.frm("HandlingAmt1").value;
   	if (HandlingAmt1==null||HandlingAmt1==""){
   		HandlingAmt1="0";
   		}
   	if (HandlingAmt1.indexOf(",")>0){
  	   HandlingAmt1=HandlingAmt1.replace(/,/g,"");
       }		
   	addMoneyStr("HandlingAmt1");	
   	}
   	
   	var HandlingAmt2="0";
   	if (document.getElementById("HandlingAmt2")!=null){
   	HandlingAmt2=document.frm("HandlingAmt2").value;
   	if (HandlingAmt2==null||HandlingAmt2==""){
   		HandlingAmt2="0";
   		}
   	if (HandlingAmt2.indexOf(",")>0){
  	   HandlingAmt2=HandlingAmt2.replace(/,/g,"");
       }		
   	addMoneyStr("HandlingAmt2");	
   	}
   	 	var subAmt="0";
   if (document.getElementById("subAmt")!=null){
   	subAmt=document.frm("subAmt").value;
   	if (subAmt==null||subAmt==""){
   		subAmt="0";
   		}
   	if (subAmt.indexOf(",")>0){
  	   subAmt=subAmt.replace(/,/g,"");
       }		
   	addMoneyStr("subAmt");	
   	}
   	
 if (document.getElementById("amt")!=null){   
   	document.frm("amt").value=countMoney+parseFloat(sendAmt)+parseFloat(sendAmt1)+parseFloat(sendAmt2)+parseFloat(HandlingAmt1)+parseFloat(HandlingAmt2);;
 var xiaoxieAmt=frm.amt.value;
 

     if (document.getElementById("factpayamt")!=null){   
      	document.frm("factpayamt").value=counthasFaxMoney+parseFloat(sendAmt)+parseFloat(sendAmt1)+parseFloat(sendAmt2)+parseFloat(HandlingAmt1)+parseFloat(HandlingAmt2)-parseFloat(subAmt);//修改成含税金额
      	
      	xiaoxieAmt=frm.factpayamt.value;
      	addMoneyStr("factpayamt");
      	}        

   
	 var daxieAmt=atoc(xiaoxieAmt);
	 frm.chinaAmt.value=daxieAmt;   
	  addMoneyStr("amt");
	  
	  }
	  
}

//提交单据处理   
   if (document.getElementById("updateId")!=null&&document.getElementById("eaId")!=null){
      if (document.all["updateId"].style.display == "none") {
		document.all["updateId"].style.display = "block";
      }
      document.all["eaId"].style.display = "none";
  
     }
   frm.submit();

}
function secorderquery()
{
   Qfrm.qflag.value="secorderquery";  
   Qfrm.submit();
}
function doIn()
{   
   var idRowid=document.all("ID_STR").value;	
   if(idRowid=="")
   {
      alert("请至少选中一项进行入库！");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);   
   var ModuleId=document.all("ModuleId").value;
   URL="/app/module/code/doStock.jsp?mainrowid="+idRowid+"&ModuleId="+ModuleId+"&doState='0'";
   loc_x=254;
   loc_y=162;
  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function doOut()
{   
   var idRowid=document.all("ID_STR").value;	
   if(idRowid=="")
   {
      alert("请至少选中一项进行出库！");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);   
   var ModuleId=document.all("ModuleId").value;
   URL="/app/module/code/outStock.jsp?mainrowid="+idRowid+"&ModuleId="+ModuleId+"&doState='1'";
   loc_x=254;
   loc_y=162;
  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function stockin()
{
   frm.flag.value="stockin";
   frm.submit();
}
function stockout()
{
   frm.flag.value="stockout";
   frm.submit();
}
function dataClick(dataNo){
frm.hidDataNo.value=dataNo
}
function check_value_order(field)
{  
 //  alert("234");
var fieldNo=field.substring(field.lastIndexOf("_")+1,field.length);
   var ModuleId=document.all("ModuleId").value;   
  if (ModuleId!="S15"&&ModuleId!="S16"&&ModuleId!="S25"&&ModuleId!="S26"){
  
   	var thisPlanNum=document.frm("plannum_"+fieldNo).value;
   	
   	
   	if (thisPlanNum==null||thisPlanNum==""){
   	thisPlanNum="0";
   	}
   	 	
        if (isNaN(parseFloat(thisPlanNum))){
           alert("请输入正确的数据");
        return;
        }
     document.frm("plannum_"+fieldNo).value=thisPlanNum;          
        var thisNum=thisPlanNum;
        
        
   	if (ModuleId=="S04"){
   	var stockStr="storenum_"+fieldNo;
    var stocknum=document.frm(stockStr).value;
   
    if (stocknum==null||stocknum==""){
    	stocknum=thisNum;
    	}
    if (parseFloat(stocknum)<parseFloat(thisNum))
    {
    	if (document.frm("StockIsNeg").value=="1"){
     var subnum=parseFloat(thisNum)-parseFloat(stocknum);     
    alert("该商品的出库数量大与库存数量"+subnum);
    document.frm("plannum_"+fieldNo).value="0";    
    }
    }    
   }//s04
   var obj=document.frm(field);

   var dataCount=document.frm("dataCount").value;
      var nofaxprice="0";
      if (document.getElementById("price_"+fieldNo)!=null){
      nofaxprice=document.frm("price_"+fieldNo).value;
      if (nofaxprice==null||nofaxprice==""){
    	nofaxprice="0";
    	}
      nofaxprice =nofaxprice.replace(/,/g,"");
      if (isNaN(parseFloat(nofaxprice))){
      document.frm("price_"+fieldNo).value=0;
      }
      }
      //折扣的处理
      var detailrate= "100";
      if (document.getElementById("detailrate_"+fieldNo)!=null){
     detailrate=  document.frm("detailrate_"+fieldNo).value;
    
     if (isNaN(parseFloat(detailrate))){
     detailrate="100";
     }
     if (parseFloat(detailrate)==100){
     document.frm("detailrate_"+fieldNo).value="";
     }
     }
     //税率的处理
      var pricerate= "0";
      if (document.getElementById("faxrate_"+fieldNo)!=null){
     pricerate=  document.frm("faxrate_"+fieldNo).value;
    
     if (isNaN(parseFloat(detailrate))){
     pricerate="0";
     }

     }
  var faxprice="0";
    if (document.getElementById("faxprice_"+fieldNo)!=null){
    faxprice=document.frm("faxprice_"+fieldNo).value;
    if (faxprice==null||faxprice==""){
    	faxprice="0";
    	}
    faxprice =faxprice.replace(/,/g,"");
      if (isNaN(parseFloat(faxprice))){
  	document.frm("faxprice_"+fieldNo).value=0;
  	faxprice="0"
  }
  }
if (parseFloat(faxprice)!=0)  {
nofaxprice=parseFloat(faxprice)/(1+parseFloat(pricerate));
}else{
faxprice=parseFloat(nofaxprice)*(1+parseFloat(pricerate));
}
if (document.getElementById("price_"+fieldNo)!=null){
document.frm("price_"+fieldNo).value=nofaxprice;
 addMoneyStr("price_"+fieldNo);
}
 if (document.getElementById("faxprice_"+fieldNo)!=null){
 document.frm("faxprice_"+fieldNo).value=faxprice;
 addMoneyStr("faxprice_"+fieldNo);
 }
   
    
    if (document.getElementById("money_"+fieldNo)!=null){
    document.frm("money_"+fieldNo).value=parseFloat(thisPlanNum)*parseFloat(nofaxprice)*parseFloat(detailrate)/100;
     addMoneyStr("money_"+fieldNo);
 }
  if (document.getElementById("faxamt_"+fieldNo)!=null){
  	document.frm("faxamt_"+fieldNo).value=parseFloat(thisPlanNum)*parseFloat(faxprice)*parseFloat(detailrate)/100;
    addMoneyStr("faxamt_"+fieldNo);
   }


    sendAmt="0";
   //针对运费的处理  
   if (document.getElementById("sendAmt")!=null){
   	sendAmt=document.frm("sendAmt").value;
   	if (sendAmt==null||sendAmt==""){
   		sendAmt="0";
   		}
   
   	addMoneyStr("sendAmt");
   	
   	}


   var i=0;
   var nextMoney;
   var nexthasFaxMoney;
   var countMoney=0;
   var counthasFaxMoney=0;
   for (i=1;i<=dataCount;i++)
   {
   
   init_value_order("money_"+i);  
   
   nextMoney=document.frm("money_"+i).value;
   
   if (nextMoney!=null&&nextMoney!=""){
   countMoney=countMoney+parseFloat(nextMoney);
   }
   if (document.getElementById("faxamt_"+i)!=null){
   init_value_order("faxamt_"+i);  	
   nexthasFaxMoney=document.frm("faxamt_"+i).value;
   
   }else{
  nexthasFaxMoney=nextMoney;
  }
   
   if (nexthasFaxMoney!=null&&nexthasFaxMoney!=""){
   counthasFaxMoney=counthasFaxMoney+parseFloat(nexthasFaxMoney);
   }
   
   
   }//for   
   document.frm("amt").value=countMoney+parseFloat(sendAmt);//扣税金额
   addMoneyStr("amt");
   if (document.getElementById("factpayamt")!=null){
   document.frm("factpayamt").value=counthasFaxMoney+parseFloat(sendAmt);   
   }
    

   addNumberStr("plannum_"+fieldNo);
   if (field.indexOf("price")>=0){
   if(obj.value.substring(0,1)=="-")
   {
   	   op="-";
   	   obj.value=obj.value.substring(1,obj.value.length);
   }
   else
       op="";
       
   val=parseFloat(obj.value);   
   if(isNaN(val))
   {
      alert("非法的数字");
      obj.focus();
      return;
   }
}





}
 
 
}
function  init_value_order(field)
{

	if (document.getElementById(field)!=null){
   var obj=document.frm(field);
   
   if (obj.value==""||obj.value==null)
      return;
   re=/,/g;
   obj.value=obj.value.replace(re,"");
  }
}

function check_value_amt(field)
{
   var obj=document.frm(field);
   if(obj.value==""||obj.value==null)
      return;
   
   if (field.indexOf("allpaymoney_")>=0){
   	 return;
   	}
   	if (field.indexOf("haspaymoney_")>=0){
   	 return;
   	}
   	//alert(field);
   var oldAmt=document.frm("tempAmt").value;
   var allAmt=document.frm("paymoney").value;   
   var newAmt=obj.value;
   var fieldNo=field.substring(field.lastIndexOf("_")+1,field.length);
   var allAmtName="allpaymoney_"+fieldNo;
   var hasAmtName="haspaymoney_"+fieldNo;   
   var thisAllAmt=document.frm(allAmtName).value; 
   var thishasAmt=document.frm(hasAmtName).value; 
   var moduelId=document.frm(moduelId).value;
   thisAllAmt=subsymb(thisAllAmt);
   thishasAmt=subsymb(thishasAmt);
   var toPayAmt=parseFloat(thisAllAmt)-parseFloat(thishasAmt);
   var thisSubAmt=parseFloat(newAmt)-toPayAmt;
   if (thisSubAmt>0)
   {
    if(!window.confirm("本次付款金额大于应付款金额:"+thisSubAmt+",继续进行吗？"))
      {
      document.frm(field).value=addsymb(parseFloat(oldAmt));
      return false;
      }
   }   
   allAmt=subsymb(allAmt);
   oldAmt=subsymb(oldAmt);   
   var tempAmt=parseFloat(allAmt)-parseFloat(oldAmt)+parseFloat(newAmt);
   allAmt=addsymb(tempAmt);
   document.frm("paymoney").value=allAmt;
   document.frm(field).value=addsymb(parseFloat(newAmt));
}
function  init_value_amt(field)
{
   var obj=document.frm(field);
   if (obj.value==""||obj.value==null)
      return;
   re=/,/g;
   obj.value=obj.value.replace(re,"");   
   document.frm("tempAmt").value=obj.value;//临时金额
}
function addsymb(fieldValue)
{
	fieldValue=fieldValue.toString();
   if(fieldValue=="")
      return;   
   if(fieldValue.substring(0,1)=="-")
   {
   	   op="-";
   	   fieldValue=fieldValue.substring(1,fieldValue.length);
   }
   else
       op="";
       
   val=parseFloat(fieldValue);
   if(isNaN(val))
   {
      alert("非法的数字");
      return;
   }
  if(fieldValue.indexOf(".")<0){
  	fieldValue=fieldValue+".00";
  	} 
   var value_array=fieldValue.split(".");
   start=0;
   len=0;
   val_int="";
   while(1)
   {
   	  if((value_array[0].length-start)%3==0)
   	     len=3;
   	  else
   	  	 len=value_array[0].length%3;

      if(val_int=="")
         val_int=value_array[0].substring(start,start+len);
      else
         val_int=val_int+","+value_array[0].substring(start,start+len);
   	  start=len+start;

   	  if(start>=value_array[0].length)
   	     break;
   }
   if(val_int!="")
      value_array[0]=val_int;
   if(value_array.length==1)
   	  value_array[1]="00";
   else if(value_array.length==amtdot)
   {
   	  if(value_array[1].length==0)
   	    value_array[1]="00";
   	  else if(value_array[1].length==1)
   	    value_array[1]=value_array[1]+"0";
   	  else if(value_array[1].length>=amtdot)
   	    value_array[1]=value_array[1].substr(0,amtdot);
   }

   fieldValue=op+value_array[0]+"."+value_array[1];

    return fieldValue;
}

function  subsymb(fieldValue)
{
   if (fieldValue=="")
      return;

   re=/,/g;
   fieldValue=fieldValue.replace(re,"");
   
   return fieldValue;
}
function atoc(numberValue){  
  var numberValue=new String(Math.round(numberValue*100)); // 数字金额
  var chineseValue="";          // 转换后的汉字金额
  var String1 = "零壹贰叁肆伍陆柒捌玖";       // 汉字数字
  var String2 = "万仟佰拾亿仟佰拾万仟佰拾元角分";     // 对应单位
  var len=numberValue.length;         // numberValue 的字符串长度
  var Ch1;             // 数字的汉语读法
  var Ch2;             // 数字位的汉字读法
  var nZero=0;            // 用来计算连续的零值的个数
  var String3;            // 指定位置的数值
  if(len>15){
   alert("超出计算范围");
   return "";
  }
  if (numberValue==0){   
   chineseValue = "零元整";
   return chineseValue;   
  }  
  String2 = String2.substr(String2.length-len, len);   // 取出对应位数的STRING2的值
  
  for(var i=0; i<len; i++){
   
   String3 = parseInt(numberValue.substr(i, 1),10);   // 取出需转换的某一位的值
   //alert(String3);
   if ( i != (len - 3) && i != (len - 7) && i != (len - 11) && i !=(len - 15) ){
    
    if ( String3 == 0 ){
     
     Ch1 = "";
     Ch2 = "";
     nZero = nZero + 1;
     
    }else if ( String3 != 0 && nZero != 0 ){
     
     Ch1 = "零" + String1.substr(String3, 1);
     Ch2 = String2.substr(i, 1);
     nZero = 0;
     
    }else{
     
     Ch1 = String1.substr(String3, 1);
     Ch2 = String2.substr(i, 1);
     nZero = 0;
    }
   }else{              // 该位是万亿，亿，万，元位等关键位
    if( String3 != 0 && nZero != 0 ){
     
     Ch1 = "零" + String1.substr(String3, 1);
     Ch2 = String2.substr(i, 1);
     nZero = 0;
     
    }else if ( String3 != 0 && nZero == 0 ){
     
     Ch1 = String1.substr(String3, 1);
     Ch2 = String2.substr(i, 1);
     nZero = 0;
     
    }else if( String3 == 0 && nZero >= 3 ){     
     Ch1 = "";
     Ch2 = "";
     nZero = nZero + 1;     
    }else{     
     Ch1 = "";
     Ch2 = String2.substr(i, 1);
     nZero = nZero + 1;     
    }    
    if( i == (len - 11) || i == (len - 3)) {    // 如果该位是亿位或元位，则必须写上
     Ch2 = String2.substr(i, 1);
    }
    
   }
   chineseValue = chineseValue + Ch1 + Ch2;   
  }  
  if ( String3 == 0 ){           // 最后一位（分）为0时，加上“整”
   chineseValue = chineseValue + "整";
  }  
  return chineseValue;
 }
 
 function addMoneyStr(moneyField){
 	
 	  if (document.frm(moneyField).value.indexOf(",")>=0){
 	  	return;
 	  	}
 	
   if(document.frm(moneyField).value=="")
      return;
    if(document.frm(moneyField).value.substring(0,1)=="-")
   {
   	   op_Money="-";
   	   document.frm(moneyField).value=document.frm(moneyField).value.substring(1,document.frm(moneyField).value.length);
   }
   else
       op_Money="";
       
    val_Money=document.frm(moneyField).value;      
    document.frm(moneyField).value=ForDight(val_Money,amtdot);    
    var value_array_Money=document.frm(moneyField).value.split(".");

   start_Money=0;
   len_Money=0;
   val_int_Money="";

   while(1)
   {
   	  if((value_array_Money[0].length-start_Money)%3==0)
   	     len_Money=3;
   	  else
   	  	 len_Money=value_array_Money[0].length%3;

      if(val_int_Money=="")
         val_int_Money=value_array_Money[0].substring(start_Money,start_Money+len_Money);
      else
         val_int_Money=val_int_Money+","+value_array_Money[0].substring(start_Money,start_Money+len_Money);
   	  start_Money=len_Money+start_Money;

   	  if(start_Money>=value_array_Money[0].length)
   	     break;
   }
   if(val_int_Money!="")
      value_array_Money[0]=val_int_Money;
   
   if(value_array_Money.length==1)
   	  value_array_Money[1]=amtdotValue;
   else 
   {
  
   	  if(value_array_Money[1].length==0)
   	    value_array_Money[1]=amtdotValue;
   	  else if(value_array_Money[1].length==1)
   	    value_array_Money[1]=value_array_Money[1]+"0";
   	  else 
   	    value_array_Money[1]=value_array_Money[1].substr(0,amtdot);
 
   	 if (value_array_Money[1].length<amtdot){
   	   var amtInt=value_array_Money[1].length;
   	   for(;amtInt<amtdot;amtInt++){
   	   value_array_Money[1]=value_array_Money[1]+"0";
   	   }
   	 }

   }
   if (amtdot==0){
   document.frm(moneyField).value=op_Money+value_array_Money[0];
   }else {
   document.frm(moneyField).value=op_Money+value_array_Money[0]+"."+value_array_Money[1];	
  }
 	}
 function addNumberStr(moneyField){
 	
 	  if (document.frm(moneyField).value.indexOf(",")>=0){
 	  	return;
 	  	}
   if(document.frm(moneyField).value=="")
      return;
    if(document.frm(moneyField).value.substring(0,1)=="-")
   {
   	   op_Money="-";
   	   document.frm(moneyField).value=document.frm(moneyField).value.substring(1,document.frm(moneyField).value.length);
   }
   else
       op_Money="";
       
    val_Money=parseFloat(document.frm(moneyField).value);   
    document.frm(moneyField).value=ForDight(val_Money,numdot);
  	var value_array_Money=document.frm(moneyField).value.split(".");
   start_Money=0;
   len_Money=0;
   val_int_Money="";
   if(val_int_Money!="")
      value_array_Money[0]=val_int_Money;

   if(value_array_Money.length==1)
   	  value_array_Money[1]=numdotValue;
   else 
   {
   	  if(value_array_Money[1].length==0)
   	    value_array_Money[1]=numdotValue;
   	  else if(value_array_Money[1].length==1)
   	    value_array_Money[1]=value_array_Money[1]+"0";
   	  else 
   	    value_array_Money[1]=value_array_Money[1].substr(0,numdot);
   	    
   	    if (value_array_Money[1].length<numdot){
   	   var amtInt=value_array_Money[1].length;
   	   for(;amtInt<numdot;amtInt++){
   	   value_array_Money[1]=value_array_Money[1]+"0";
   	   }
   	 }
   	 
   }
   if (numdot==0){
   document.frm(moneyField).value=op_Money+value_array_Money[0];
   }else {
   document.frm(moneyField).value=op_Money+value_array_Money[0]+"."+value_array_Money[1];	
  }
  
}
 	
 		function flowedit(flowId)
{


 var objs = document.getElementsByTagName("input");
 var thisStr="";
 var checkStr="";
  for(var i=0; i<objs.length; i++) {
    if(objs[i].type.toLowerCase() == "checkbox" ){
      if (objs[i].checked == true){
         thisStr=objs[i].name;
         checkStr=checkStr+thisStr.substring(thisStr.indexOf("_")+1,thisStr.length)+",";
         }
  }
}
   var idStr=document.all("ID_STR").value;   
   var ModuleId=document.all("ModuleId").value;   
   if (checkStr!=""){
   idStr=checkStr;
   }   

   //var idStr=document.all("ID_STR").value;
   if(idStr=="")
   {
      alert("请选中一项！");
      return false;
   }
   /*
    if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("只能选中一项！");
      return false;
   }
   */
   if(idStr.indexOf(",") < idStr.length-1)
   {
    if (flowId=="100"){
     openrul="/app/module/dataflow/muteditindex.jsp";
      }else{
      alert("只能选中一项！");
      return false;
      }
   }else{
   openrul=document.all("secediturl").value;
   if (flowId=="100"){
   if (ModuleId=="S18"){
   //var openrul=openrul.substring(0,openrul.indexOf("/edit"))+"edit.jsp";
   }else if (ModuleId=="S17"){
  var openrul=openrul.substring(0,openrul.indexOf("/edit"))+"flow/editflow.jsp";
   }else{
   var openrul=openrul.substring(0,openrul.indexOf("/edit"))+"flow/edit.jsp";
   }
   }
   
   }
   URL=openrul+"?rowid="+idStr+"&flowId="+flowId+"&ModuleId="+ModuleId;
//alert("URL"+URL);
   loc_x=0;
   loc_y=0;
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=650px,Top="+loc_y+"px,Left="+loc_x+"px");
}

