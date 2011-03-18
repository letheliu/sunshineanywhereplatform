var amtdot;
var sellrate;
 if (document.getElementById("amtdot")!=null){
 amtdot=document.all("amtdot").value;
 }
  if (document.getElementById("P68")!=null){
  sellrate=document.all("P68").value;
 }
if  (isNaN(amtdot)){
	amtdot=2;
}
function mult_Select(rowId)
{
  var idStr=document.all("rowId_STR").value;  
  if (idStr=="")
  {
  idStr=rowId+"|";
  }
  else
  {
  if(idStr.search(rowId)!=-1)
  {
     idStr=idStr.replace(rowId+"|","");
  }
   else
  idStr=idStr+rowId+"|";	
  }
  document.all("rowId_STR").value=idStr;  
}

function converUrlStr(urlStr) {  
  var reArray = new Array(
    /[%]{1}/g,
    /[#]{1}/g,    
    /[&]{1}/g,  
    /[+]{1}/g,
    /[\\]{1}/g,
    /[=]{1}/g,
    /[?]{1}/g
  );
  var strArray = new Array(
    "%25",
    "%23",    
    "%26",
    "%2B",
    "%2F",
    "%3D",
    "%3F"
  );
  var newStr = urlStr;
  for (var i = 0; i < reArray.length; i++) {
    var newStr = newStr.replace(reArray[i], strArray[i]);
  }
  return newStr;
}
function value_empty(fld_must,fld_name)
{
var thisV;
   fld_str_obj=document.all(fld_must);
   name_str_obj=document.all(fld_name);
   if(fld_str_obj.value=="")
      return false;
   fld_array=fld_str_obj.value.split(",");
   name_array=name_str_obj.value.split(",");
   for(i=0;i<=fld_array.length;i++)
   {
     if(fld_array[i]=="")
        break;
     fld_obj=document.all(fld_array[i]);
     thisV=fld_obj.value;     
     thisV=thisV.replace(/^\s+|\s+$/g,""); 
     if(thisV=="")
     {
       alert("°º"+name_array[i]+"°Ω≤ªƒ‹Œ™ø’£°");
       if(fld_obj.readonly=="")
         fld_obj.focus();
         return (true);
     }
   }
   return (false);
}

function value_check(fld_type,all_name,fld_id)
{


   fld_str_obj=document.all(fld_type);
   name_str_obj=document.all(all_name);
   id_str_obj=document.all(fld_id);
   var sStr=/,/g;
   if (document.getElementById(fld_id)==null){
   return (false);
   }
   if (document.getElementById(all_name)==null){
   return (false);
   }
   fld_array=fld_str_obj.value.split(",");
   name_array=name_str_obj.value.split(",");
   id_array=id_str_obj.value.split(",");
   for(i=0;i<=fld_array.length;i++)
   {
    
  
     if(fld_array[i]=="NUMBE"||fld_array[i]=="numbe"||fld_array[i]=="MONEY")
     {
     
       this_value=document.all(id_array[i]).value;
       
        if (this_value!=null&&this_value!=""){
        this_value=this_value.replace(sStr,"");
        if (isNaN(this_value)){
        alert("°º"+name_array[i-1]+"°Ω∂‘”¶µƒ ˝æ›∏Ò Ω≤ª’˝»∑£°");
        document.all(id_array[i]).focus();
         return (true);
        }
       }
       
     }
     
     
   }
   return (false);
   
}

function find_id(theId,idStr)
{
	//alert("theId"+theId);
	//alert("idStr"+idStr);
   if(theId=="" || idStr=="")
      return false;
   if(idStr.search(theId)==-1)
      return false;
   return true;
}

function add(openurl)
{
   loc_x=300;
   loc_y=200;
window.open(openurl,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=150px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function secadd(openurl)
{
   loc_x=300;
   loc_y=200;
window.open(openurl,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=900px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");
}
//–ﬁ∏ƒ--œƒ”¬
function order()
{
  var ModuleId=document.all("ModuleId").value;
  URL="/app/module/code/order.jsp?ModuleId="+ModuleId;
  loc_x=150;
  loc_y=100;
  //window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:700px;dialogHeight:450px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"11","edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:400px;dialogHeight:350px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=700px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");

}

function selectMan(ModuleId)
{
	 var idStr=document.all("ID_STR").value;
	 
   if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓ£°");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("÷ªƒ‹—°÷–“ªœÓ£°");
      return false;
   }
  idStr=idStr.substring(0,idStr.indexOf(","));
  URL="/app/module/flow/index/orderprod.jsp?FolderID="+idStr+"&ModuleId="+ModuleId;
  loc_x=150;
  loc_y=100;
  window.showModalDialog(URL,self,"edge:raised;scroll:1;status:0;help:0;resizable:1;dialogWidth:700px;dialogHeight:450px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"11","edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:400px;dialogHeight:350px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=700px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");

}

function flowGrap(fromModuleId)
{
	 var idStr="0";
	 var ModuleId=document.all("ModuleId").value;
  
  URL="/app/module/flow/index/graph.jsp?FolderID="+idStr+"&fromModuleId="+fromModuleId+"&ModuleId="+ModuleId;
  loc_x=200;
  loc_y=200;
  window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=600px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");

}
function viewGrap(fromModuleId,ModuleId,idStr)
{
	
  URL="/app/module/flow/index/graph.jsp?FolderID="+idStr+"&fromModuleId="+fromModuleId+"&ModuleId="+ModuleId;
  loc_x=200;
  loc_y=200;
  window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=600px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");

}
function selectField(ModuleId)
{
	 var idStr=document.all("ID_STR").value;
	 
   if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓ£°");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("÷ªƒ‹—°÷–“ªœÓ£°");
      return false;
   }
  idStr=idStr.substring(0,idStr.indexOf(","));
  URL="/app/module/flow/index/orderfield.jsp?FolderID="+idStr+"&ModuleId="+ModuleId;
  loc_x=150;
  loc_y=100;
  window.showModalDialog(URL,self,"edge:raised;scroll:1;status:0;help:0;resizable:1;dialogWidth:700px;dialogHeight:450px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"11","edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:400px;dialogHeight:350px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=700px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");

}
function lookquery(ModuleId)
{
  URL="/app/search/index.jsp?ModuleId="+ModuleId;
  loc_x=250;
  loc_y=150;
    // window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:600px;dialogHeight:350px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  
 window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=600px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}

function data_out()
{

 document.all("thisModuleId").value=document.all("ModuleId").value;
outfrm.submit();
}

function data_select(ModuleId,ModuleName)
{
if (ModuleId=="K06"||ModuleId=="K05"||ModuleId=="K71"){
URL="/app/module/code/setSql9.jsp?ModuleId="+ModuleId;
}else{
  URL="/app/module/code/setSql.jsp?ModuleId="+ModuleId;
}
  loc_x=450;
  loc_y=250;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:400px;dialogHeight:350px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=350px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function data_query(ModuleId,ModuleName)
{
  URL="/app/module/code/query.jsp?ModuleId="+ModuleId+"&ModuleName="+ModuleName;
  loc_x=450;
  loc_y=250;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:400px;dialogHeight:150px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=300px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function edit(openrul)
{
   var idStr=document.all("ID_STR").value;
   //var idRowid=idStr.substring(0,18)+",";
   var idStr2=idStr.substring(0,idStr.length-1);
   //alert(idStr2);
   if (document.getElementById("NotDel_"+idStr2)!=null){
   var NotDel=document.all("NotDel_"+idStr2).value;
   //alert(NotDel);
   if(NotDel=="1")
   {
      alert("œµÕ≥…Ë÷√≤Œ ˝£¨Œﬁ∑®–ﬁ∏ƒ£°");
      return false;
   }
  }
   
   if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("÷ªƒ‹—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   URL=openrul+"?rowid="+idStr;
   loc_x=300;
   loc_y=200;
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=150px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function secedit(openrul)
{
   var idStr=document.all("ID_STR").value;
   var idRowid=idStr.substring(0,18)+",";
   if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("÷ªƒ‹—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   URL=openrul+"?rowid="+idStr;
   loc_x=100;
   loc_y=200;
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=800px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");
}

function bathedit(openrul)
{
   var idStr=document.all("ID_STR").value;
   var idRowid=idStr.substring(0,18)+",";
   if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   
   URL=openrul+"?rowid="+idStr;
   loc_x=300;
   loc_y=200;
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=150px,Top="+loc_y+"px,Left="+loc_x+"px");
}


function del()
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
   if (checkStr!=""){
   idStr=checkStr;
   }   

   //var idStr=document.all("ID_STR").value;
   var ModuleId=document.all("ModuleId").value;
   var userIdStr=document.all("userIdStr").value;
   var idStr2=idStr.substring(0,idStr.length-1);
   //alert(idStr2);
   if (document.getElementById("NotDel_"+idStr2)!=null){
   var NotDel=document.all("NotDel_"+idStr2).value;
   //alert(NotDel);
   if(NotDel=="1")
   {
      alert("œµÕ≥…Ë÷√≤Œ ˝£¨Œﬁ∑®…æ≥˝£°");
      return false;
   }
  }
   if(idStr=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ…æ≥˝£°");
      return false;
   }

   if(!window.confirm("»∑∂®…æ≥˝¬£ø"))
      return false;
   //alert(idStr);
   Qfrm.qflag.value="delete";
   Qfrm.deletevalue.value=idStr;
   Qfrm.submit();
}

function query()
{
   Qfrm.qflag.value="query";
   Qfrm.submit();
}
function addnew()
{
   if(value_empty("FLD_MUST_STR","FLD_NAME_STR"))
      return (false);
      
    if(value_check("Add_fieldType","ALL_NAME_STR","Add_fieldName"))
      return (false);   
      
   frm.flag.value="addnew";
   frm.submit();
}
function update()
{
   if(value_empty("FLD_MUST_STR","FLD_NAME_STR"))
      return (false);

   frm.flag.value="update";
   frm.submit();
}
function updateDelete()
{
   
   frm.flag.value="deleteLev";
   
   frm.submit();
}
function delLeverList()
{
	//alert("≤‚ ‘");
	var idStr=parent.dept_main.frm.ID_STR.value;

	if (idStr==null){
		idStr="";
		}
  if (idStr=="") {
  	alert("«Î—°‘Ò“™…æ≥˝µƒ ˝æ›£°");
  	return;
  	}
   frm.ID_STR.value=idStr;  
   frm.flag.value="deleteLevList";   
   frm.submit();
}

var theDefaultColor="#FFFFFF";//∞◊…´
var thePointerColor="#D9E8FF";
var theMarkColor="#003FBF";
function setKeyId(){
	document.all("keyId").value=event.keyCode;
}
function retKeyId(){
	document.all("keyId").value="";
}

function setPointer(theRow, theId, theAction)
{
	 
   var idStr=document.all("ID_STR").value;
   
   theId+=",";
   
    if(theAction=="click")
   {
      document.all("ID_STR").value=theId;      
    }


}

function query_code(field)
{
  init_value=document.all(field).value;
  code=document.all(field+"_CODE").value;
  table=document.all(field+"_TABLE").value;
  var supplyId=""  
  if (document.getElementById("supplyid")!=null&&field!="supplyid"&&field!="SupplyId"){
  supplyId=document.frm("supplyid").value;
   if (supplyId==null||supplyId==""){
  	alert("«Îœ»»∑∂®µ•Œª");
  	return;
  	}
  }
  if (document.getElementById("CustomerId")!=null&&field!="CustomerId"){
  supplyId=document.frm("CustomerId").value;
   if (supplyId==null||supplyId==""){
  	alert("«Îœ»»∑∂®µ•Œª");
  	return;
  	}
  }
  if (field=="nextflow"){
  URL="/app/module/code/queryflow/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value+"&supplyId="+supplyId;
  }else{
  URL="/app/module/code/query/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value+"&supplyId="+supplyId;
  }
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;  
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:450px;dialogHeight:250px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
}
function query_user(field)
{
  init_value=document.all(field).value;
  var P20;
  var ModuleId=document.all("ModuleId").value;
  if (document.getElementById("P20")!=null){
  P20=document.all("P20").value;
  }
  var P19;
  if (document.getElementById("P19")!=null){
  P19=document.all("P19").value;
  }
  var userfrom="";
  if (ModuleId=="S04"||ModuleId=="B04"||ModuleId=="S14"){
  userfrom=P20;
  }else{
  userfrom=P19;
  }
  code="1";
  if (userfrom=="1"){
  table="eauser";
  URL="/app/module/code/queryeauser/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value;
  
  }else{
  table="TD_OA.user";
  URL="/app/module/code/queryuser/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value;
  
  }
  
  
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:450px;dialogHeight:250px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
}
function query_userid(field)
{
  init_value=document.all(field).value;
  code="1";
  table="TD_OA.user";
  URL="/app/module/code/queryuserid/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value;
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:450px;dialogHeight:250px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function query_bath(field)
{
  //alert(field);
  init_value=document.all(field).value;
  code=document.all(field+"_CODE").value;
  table=document.all(field+"_TABLE").value;
  URL="/app/module/code/bathquery/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value;
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:300px;dialogHeight:250px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function query_two(field)
{
  //alert(field);
  init_value=document.all(field).value;
  code=document.all(field+"_CODE").value;
  table=document.all(field+"_TABLE").value;
  URL="/app/lever/code/query/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value;
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:300px;dialogHeight:250px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}

function query_pay(field)
{
  init_value=document.all(field).value;
  code=document.all(field+"_CODE").value;
  table=document.all(field+"_TABLE").value;
  URL="/app/module/code/payquery/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value;
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:300px;dialogHeight:250px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}


function query_date(fieldname)
{
	
  myleft=document.body.scrollLeft+event.clientX-event.offsetX-80;
  mytop=document.body.scrollTop+event.clientY-event.offsetY+140;
 window.showModalDialog("/inc/calendar.php?FIELDNAME="+fieldname,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:300px;dialogHeight:230px;dialogTop:"+mytop+"px;dialogLeft:"+myleft+"px");
}


var fld_name_display="";
function set_explain(field,BURSAR_ATTR)
{
  document.all(field).style.display="";
  if(fld_name_display!="")
  document.all(fld_name_display).style.display="none";
  fld_name_display=field;
  //alert(BURSAR_ATTR);
  if (BURSAR_ATTR.length>0)
         {
         var cust=BURSAR_ATTR.substring(0,1);//µ•Œª
         custfield=field+"1";
         if (cust==1)
         {
         document.all(custfield).style.display="";
         }
         else
         {
         document.all(custfield).style.display="none";
         }

         var dept=BURSAR_ATTR.substring(1,2);//≤ø√≈
         deptfield=field+"2";
         if (dept==1)
         {
         document.all(deptfield).style.display="";
         }
         else
         {
         document.all(deptfield).style.display="none";
         }

         var empl=BURSAR_ATTR.substring(2,3);//»À‘±
         emplfield=field+"3";
         if (empl==1)
         {
         document.all(emplfield).style.display="";
         }
         else
         {
         document.all(emplfield).style.display="none";
         }

         var class1=BURSAR_ATTR.substring(3,4);//Õ≥º∆
         class1field=field+"4";
         if (class1==1)
         {
         document.all(class1field).style.display="";
         }
         else
         {
         document.all(class1field).style.display="none";
         }
         var class2=BURSAR_ATTR.substring(4,5);//œÓƒø
         class2field=field+"5";
         if (class2==1)
         {
         document.all(class2field).style.display="";
         }
         else
         {
         document.all(class2field).style.display="none";
         }
         }

}


function  ForDight(Dight,How)
{
           Dight  =  Math.round  (Dight*Math.pow(10,How))/Math.pow(10,How);
           return  Dight;
}

function check_value(field)
{
   var obj=document.all(field);
   if(obj.value=="")
      return;
      
   addMoneyStr(field);
   
}

function  init_value1(field)
{
   var obj=document.all(field);   
   if (obj.value=="")
      return;

   re=/,/g;
   obj.value=obj.value.replace(re,"");
}
function uploadFromFile() {
  openurl="/app/fileupload/index.jsp";
  loc_x=300;
  loc_y=200;
  window.open(openurl,"fileupload","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}

function detailclick(idRowid,ModuleId)
{  
//alert("ModuleId"+ModuleId);
if (ModuleId=="K11"){
	edit();
	 }else if (ModuleId=="K23"){
	 	stockexch();
	 	}else if (ModuleId=="K02"){
	 	querytable();
	 	}else if (ModuleId=="K01"){
	 	querytable();
	 	}else if (ModuleId=="J70"){
	 	productorg();
	 	}else if (ModuleId=="J69"||ModuleId=="J66"
	 	||ModuleId=="J67"||ModuleId=="K58"||ModuleId=="K59"
	 	||ModuleId=="K45"||ModuleId=="K44"||ModuleId=="K07"
	 	||ModuleId=="K09"||ModuleId=="S10"||ModuleId=="K46"
	 	||ModuleId=="K08"||ModuleId=="K45"||ModuleId=="K10"
	 	||ModuleId=="S11"||ModuleId=="K54"||ModuleId=="K55"
	 	||ModuleId=="K56"||ModuleId=="K53"||ModuleId=="K47"
	 	||ModuleId=="K16"||ModuleId=="K20"){
	 	return;
	 	}else{
   URL="/app/module/code/detail.jsp?rowid="+idRowid+"&ModuleId="+ModuleId;
   loc_x=100;
   loc_y=100;
  window.showModalDialog(URL,self,"edge:raised;scroll:1;status:1;help:1;resizable:1;dialogWidth:1000px;dialogHeight:500px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=350px,Top="+loc_y+"px,Left="+loc_x+"px");
}
}


function open_pic(idRowid,ModuleId)
{  

   URL="/app/module/code/picture.jsp?rowid="+idRowid+"&ModuleId="+ModuleId;
   loc_x=100;
   loc_y=100;
  //window.showModalDialog(URL,self,"edge:raised;scroll:1;status:1;help:1;resizable:1;dialogWidth:900px;dialogHeight:900px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");

}
function datadetailclick(idRowid,ModuleId)
{   

if (ModuleId=="K26"||ModuleId=="K74"||ModuleId=="K73"||ModuleId=="K72"||ModuleId=="K71"
||ModuleId=="K80"||ModuleId=="K79"||ModuleId=="K82"||ModuleId=="K81"||ModuleId=="K84"
||ModuleId=="K76"||ModuleId=="K51"||ModuleId=="J83"||ModuleId=="K48"||ModuleId=="K77"
||ModuleId=="K49"||ModuleId=="K78"||ModuleId=="K07"||ModuleId=="K63"||ModuleId=="B16"
||ModuleId=="K43"||ModuleId=="K08"||ModuleId=="K62"||ModuleId=="K52"||ModuleId=="K42"
||ModuleId=="K06"||ModuleId=="K28"||ModuleId=="K03"||ModuleId=="K04"||ModuleId=="K16"
||ModuleId=="K20"||ModuleId=="B15"||ModuleId=="K05"||ModuleId=="K50"){
return true;

}
 var idRowid=document.all("ID_STR").value;	
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥√˜œ∏£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);
   
   var ModuleId=document.all("ModuleId").value;
   var dataState="4";
   URL="/app/module/code/detailflow.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&dataState="+dataState;
   loc_x=100;
   loc_y=100;
  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=800px,Top="+loc_y+"px,Left="+loc_x+"px");

/*
	 var stockName=document.Qfrm("stockName").value;
	 var fromdata=document.Qfrm("fromdata").value;
	 var enddata=document.Qfrm("enddata").value;
	 
   URL="/app/module/code/datadetail.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&stockName="+stockName+"&fromdata="+fromdata+"&enddata="+enddata;
   loc_x=254;
   loc_y=162;
  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
*/
}

function datadetail(State)
{   
   var idRowid=document.all("ID_STR").value;	
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥√˜œ∏£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);
   
   var ModuleId=document.all("ModuleId").value;
   var stockName=document.Qfrm("stockName").value;
	 var fromdata=document.Qfrm("fromdata").value;
	 var enddata=document.Qfrm("enddata").value;
   URL="/app/module/code/datadetail.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&stockName="+stockName+"&fromdata="+fromdata+"&enddata="+enddata+"&State="+State;
   loc_x=100;
   loc_y=100;

  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=900px,height=400px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function datadetailchart(chartState)
{   
   var idRowid=document.all("ID_STR").value;	
   if (chartState=="1"){
      if(idRowid=="")
      {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ£°");
      return false;
      }
   }
   idRowid=idRowid.substring(0,idRowid.length-1);
   var ModuleId=document.all("ModuleId").value;
	 var fromdata=document.Qfrm("fromdata").value;
	 var enddata=document.Qfrm("enddata").value;
	 var groupByStr=document.Qfrm("groupByStr").value;
	 var flowState=document.Qfrm("flowState").value;
	 var dataState=document.Qfrm("dataState").value;
	 
   URL="/app/module/code/setSql6.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&groupByStr="+groupByStr+"&fromdata="+fromdata+"&enddata="+enddata+"&flowState="+flowState+"&dataState="+dataState+"&chartState="+chartState;//
   loc_x=254;
   loc_y=162;
   //alert(URL);
   window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:400px;dialogHeight:350px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
   //window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function dataPrint()
{   
   var idRowid=document.all("ID_STR").value;	

      if(idRowid=="")
      {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ£°");
      return false;
      }

   idRowid=idRowid.substring(0,idRowid.length-1);
   var ModuleId=document.all("ModuleId").value;
	 
   URL="/app/module/code/setSqlPrint.jsp?rowid="+idRowid+"&ModuleId="+ModuleId;//
   loc_x=254;
   loc_y=162;
   //alert(URL);
   //window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:400px;dialogHeight:350px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
   window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function datachart()
{   
   var idRowid=document.all("ID_STR").value;	
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥√˜œ∏£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);
   
   var ModuleId=document.all("ModuleId").value;
   var stockName=document.Qfrm("stockName").value;
	 var fromdata=document.Qfrm("fromdata").value;
	 var enddata=document.Qfrm("enddata").value;
   URL="/app/module/code/datachart.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&stockName="+stockName+"&fromdata="+fromdata+"&enddata="+enddata;
   loc_x=254;
   loc_y=162;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:770px;dialogHeight:500px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=750px,height=450px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function detail()
{   
   var idRowid=document.all("ID_STR").value;	
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥√˜œ∏£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);
   
   var ModuleId=document.all("ModuleId").value;
   URL="/app/module/code/detail.jsp?rowid="+idRowid+"&ModuleId="+ModuleId;
   loc_x=154;
   loc_y=162;
  window.showModalDialog(URL,self,"edge:raised;scroll:1;status:1;help:1;resizable:1;dialogWidth:870px;dialogHeight:300px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=850px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function detailquery(state)
{   
   var idRowid=document.all("ID_STR").value;
   var ModuleId=document.all("ModuleId").value;	
   if (state=="1"&&ModuleId=="S02"){
   URL="/app/buypay/buyscale/index.jsp?ModuleId="+ModuleId;
   }else if(state=="2"&&ModuleId=="S02"){
   URL="/app/buydetail/index.jsp?ModuleId="+ModuleId;
   }else if(state=="3"&&ModuleId=="S04"){
   URL="/app/selldetail/index.jsp?ModuleId="+ModuleId;
   }else if(state=="4"&&ModuleId=="S04"){
   URL="/app/stockoutrate/index.jsp?ModuleId="+ModuleId;
   }else if(state=="5"&&ModuleId=="S04"){
   URL="/app/areasell/index.jsp?ModuleId="+ModuleId;
   }else if(state=="6"&&ModuleId=="S04"){
   URL="/app/employeesell/index.jsp?ModuleId="+ModuleId;
   }else if(state=="7"&&ModuleId=="S04"){
   URL="/app/ordersell/index.jsp?ModuleId="+ModuleId;
   }else if(state=="8"&&ModuleId=="S04"){
   URL="/app/stockoutdetail/index.jsp?ModuleId="+ModuleId;
   }else if(state=="9"&&ModuleId=="S04"){
   URL="/app/report/sellreport/index.jsp?ModuleId="+ModuleId;
   }else if(state=="10"&&ModuleId=="S04"){
   URL="/app/customersell/index.jsp?ModuleId="+ModuleId;
   }else if(state=="11"&&ModuleId=="S04"){
   URL="/app/customerproductcount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="12"&&ModuleId=="S04"){
   URL="/app/profit/index.jsp?ModuleId="+ModuleId;
   }else if(state=="13"&&ModuleId=="K46"){
   URL="/app/sellplanrate/index.jsp?ModuleId="+ModuleId;
   }else if(state=="14"&&ModuleId=="K45"){
   URL="/app/buyplanrate/index.jsp?ModuleId="+ModuleId;
   }else if(state=="15"&&ModuleId=="K44"){
   URL="/app/requirerate/index.jsp?ModuleId="+ModuleId;
   }else if(state=="16"&&ModuleId=="S02"){
   URL="/app/stockinrate/index.jsp?ModuleId="+ModuleId;
   }else if(state=="17"&&ModuleId=="S02"){
   URL="/app/yearbuy/index.jsp?ModuleId="+ModuleId;
   }else if(state=="18"&&ModuleId=="S02"){
   URL="/app/buycost/index.jsp?ModuleId="+ModuleId;
   }else if(state=="18"&&ModuleId=="S02"){
   URL="/app/buycost/index.jsp?ModuleId="+ModuleId;
   }else if(state=="19"&&ModuleId=="S02"){
   URL="/app/stockindetail/index.jsp?ModuleId="+ModuleId;
   }else if(state=="20"&&ModuleId=="S02"){
   URL="/app/report/buyreport/index.jsp?ModuleId="+ModuleId;
   }else if(state=="21"&&ModuleId=="S02"){
   URL="/app/supplysell/index.jsp?ModuleId="+ModuleId;
   }else if(state=="22"&&ModuleId=="S02"){
   URL="/app/supplyproductcount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="23"&&ModuleId=="K10"){
   URL="/app/cashin/index.jsp?ModuleId="+ModuleId;
   }else if(state=="24"&&ModuleId=="K10"){
   URL="/app/sellmoney/index.jsp?ModuleId="+ModuleId;
   }else if(state=="25"&&ModuleId=="K09"){
   URL="/app/cashout/index.jsp?ModuleId="+ModuleId;
   }else if(state=="26"&&ModuleId=="K09"){
   URL="/app/stockinpayquery/index.jsp?ModuleId="+ModuleId;
   }else if(state=="27"&&ModuleId=="K09"){
   URL="/app/paymoney/index.jsp?ModuleId="+ModuleId;
   }else if(state=="28"&&ModuleId=="S02"){
   URL="/app/supplyproductbuycount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="29"&&ModuleId=="S04"){
   URL="/app/customerproductsellcount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="30"){
   URL="/app/customerproductplancount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="31"){
   URL="/app/supplyproductplancount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="32"){
   URL="/app/deptproductplancount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="33"){
   URL="/app/manuquery/manuproductplancount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="34"){
   URL="/app/manuquery/setproductplancount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="35"){
   URL="/app/manuquery/manuproductincount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="36"){
   URL="/app/manuquery/manuproductoutcount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="37"){
   URL="/app/stockaccount/monthquery/index.jsp?ModuleId="+ModuleId;
   }else if(state=="38"){
   URL="/app/sellprice/rate/index.jsp?ModuleId="+ModuleId;
   }else if(state=="39"){
   URL="/app/sellprice/customerproductpricecount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="40"){
   URL="/app/stockexch/querydetail/index.jsp?ModuleId="+ModuleId;
   }else if(state=="41"){
   URL="/app/stockbom/querydetail/index.jsp?ModuleId="+ModuleId;
   }else if(state=="42"){
   URL="/app/stocksplit/querydetail/index.jsp?ModuleId="+ModuleId;
   }else if(state=="43"){
   URL="/app/accountquery/planget/index.jsp?ModuleId="+ModuleId;
   }else if(state=="44"){
   URL="/app/accountquery/planpay/index.jsp?ModuleId="+ModuleId;
   }else if(state=="45"){
   URL="/app/logistics/rate/index.jsp?ModuleId="+ModuleId;
   }else if(state=="46"){
   URL="/app/logistics/logisticsproductpricecount/index.jsp?ModuleId="+ModuleId;
   }else if(state=="47"){
   URL="/app/logistics/sendfeequery/index.jsp?ModuleId="+ModuleId;
   }else{
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥√˜œ∏£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1); 
   URL="/app/module/code/detail.jsp?rowid="+idRowid+"&ModuleId="+ModuleId;
   }
   loc_x=0;
   loc_y=0;
  //window.showModalDialog(URL,self,"edge:raised;scroll:1;status:1;help:1;resizable:1;dialogWidth:1000px;dialogHeight:1000px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=650px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function flow()
{   
   var idRowid=document.all("ID_STR").value;	
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);
   
   var ModuleId=document.all("ModuleId").value;
   URL="/app/module/code/flowdetail.jsp?rowid="+idRowid+"&ModuleId="+ModuleId;
   loc_x=254;
   loc_y=162;
  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function backStock()
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
   var idRowid=document.all("ID_STR").value;   
   if (checkStr!=""){
   idRowid=checkStr;
   }  
   //alert("idRowid"+idRowid);
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓΩ¯––ÕÀªı£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);
   
   var ModuleId=document.all("ModuleId").value;
   URL="/app/module/code/back.jsp?rowid="+idRowid+"&ModuleId="+ModuleId;
   loc_x=0;
   loc_y=0;
  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=950px,height=550px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function printDetail(openrul)
{
   var idStr=document.all("ID_STR").value;
   var ModuleId=document.all("ModuleId").value;
   if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓΩ¯––¥Ú”°£°");
      return false;
   }
   
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("÷ªƒ‹—°÷–“ªœÓΩ¯––¥Ú”°£°");
      return false;
   }
   idStr=idStr.substring(0,idStr.length-1);
   URL=openrul+"?rowid="+idStr+"&ModuleId="+ModuleId;//
   loc_x=300;
   loc_y=200;
   window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=650px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function secorderInput(thisBut){
if (event.keyCode == 13)
{
secorderquery();	
}
//thisBut.onfocus();
}
function queryInput(thisBut){
if (event.keyCode == 13)
{
query();	
}
//thisBut.onfocus();
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
       
    val_Money=parseFloat(document.frm(moneyField).value);   
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
   	  value_array_Money[1]="00";
   else if(value_array_Money.length==amtdot)
   {
   	  if(value_array_Money[1].length==0)
   	    value_array_Money[1]="00";
   	  else if(value_array_Money[1].length==1)
   	    value_array_Money[1]=value_array_Money[1]+"0";
   	  else if(value_array_Money[1].length>=amtdot)
   	    value_array_Money[1]=value_array_Money[1].substr(0,amtdot);
   }
   document.frm(moneyField).value=op_Money+value_array_Money[0]+"."+value_array_Money[1];
 	}
 	function detailFlow(dataState)
{   
   var idRowid=document.all("ID_STR").value;	
   if (dataState=="1"||dataState=="2"||dataState=="4"){
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥√˜œ∏£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);
   
   var ModuleId=document.all("ModuleId").value;
   URL="/app/module/code/detailflow.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&dataState="+dataState;
     loc_x=0;
   loc_y=0;
   //window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=850px,height=250px,Top="+loc_y+"px,Left="+loc_x+"px");
   window.showModalDialog(URL,self,"edge:raised;scroll:1;status:1;help:1;resizable:1;dialogWidth:1000px;dialogHeight:650px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
 
   }else if (dataState=="3"){
   
   var oldModuleId=document.all("ModuleId").value;
   var fromDataValue="";
   if (document.getElementById("fromDataValue")!=null){
   	fromDataValue=document.all("fromDataValue").value;
  }
  
   var endDataValue="";
   if (document.getElementById("endDataValue")!=null){
   	endDataValue=document.all("endDataValue").value;
  }
  
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥√˜œ∏£°");
      return false;
   }
   idRowid=idRowid.substring(0,idRowid.length-1);   
   var ModuleId="K40";
   var stockName="";
   if (document.getElementById("stockName")!=null){
   	stockName=document.all("stockName").value;
  }
   URL="/app/stockaccount/detailflow.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&dataState="+dataState+"&fromDataValue="+fromDataValue+"&endDataValue="+endDataValue+"&stockName="+stockName+"&oldModuleId="+oldModuleId;
   loc_x=0;
   loc_y=0;
   //alert(URL);
  window.showModalDialog(URL,self,"edge:raised;scroll:1;status:1;help:1;resizable:1;dialogWidth:1000px;dialogHeight:650px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
 
   }
}

function query_stock(field)
{
  init_value=document.all(field).value;
  code=document.all(field+"_CODE").value;
  table=document.all(field+"_TABLE").value;
  ModuleId=document.all("ModuleId").value;
  URL="/app/module/code/querystock/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value+"&ModuleId="+ModuleId;
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:750px;dialogHeight:450px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}

	function editSate(StateId,flagSate)
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
   
     if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓ£°");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("÷ªƒ‹—°÷–“ªœÓ£°");
      return false;
   }
 
 
      
   if (flagSate=="1"){
   URL="/app/module/code/changestate/index.jsp?rowid="+idStr+"&ModuleId="+ModuleId+"&StateId="+StateId;
   }else if (flagSate=="3"){
   idStr=idStr.substring(0,idStr.length-1);
    URL="/general/eaworkflow/list/turn/turn_next.php?rowid="+idStr+"&ModuleId="+ModuleId+"&StateId="+StateId;
  
   }else if (flagSate=="2"){
   idStr=idStr.substring(0,idStr.length-1);
    URL="/general/eaworkflow/list/others/others.php?rowid="+idStr+"&ModuleId="+ModuleId+"&StateId="+StateId;
  
   }else  if (flagSate=="4"){
       if (checkStr!=""){
   idStr=checkStr;
   }  
   if(!window.confirm("»∑∂®Ω” ’¬£ø"))
      return false;

  URL="/app/module/code/workflow/receivestate/index.jsp?rowid="+idStr+"&ModuleId="+ModuleId+"&StateId="+StateId;
  }else  if (flagSate=="5"){
  if(!window.confirm("»∑∂®ŒØÕ–¬£ø"))
      return false;
  URL="/app/module/code/workflow/changemanstate/index.jsp?rowid="+idStr+"&ModuleId="+ModuleId+"&StateId="+StateId;
  }else  if (flagSate=="6"){
  
  if(!window.confirm("»∑∂®◊™Ωª¬£ø"))
      return false;
  URL="/app/module/code/workflow/changeflowstate/index.jsp?rowid="+idStr+"&ModuleId="+ModuleId+"&StateId="+StateId;
  }
  
   loc_x=100;
   loc_y=100;
   
   
   
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=800px,height=550px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function query_supply(field)
{
  init_value=document.all(field).value;
  code=document.all(field+"_CODE").value;
  table=document.all(field+"_TABLE").value;
  ModuleId=document.all("ModuleId").value;
  URL="/app/module/code/querycustomer/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value+"&ModuleId="+ModuleId;
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:750px;dialogHeight:450px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}


var imgpath = "./images";


function toggleSetting(id) {
	var div = document.all[id];
	var img = document.all[id+"_tgimg"];
	//var stockInitButton = document.all["stockInitButton"];
	if (div.style.display == "none") {
		div.style.display = "block";
		img.src = imgpath + "/minus.gif";
		//stockInitButton.style.display = "block";
	}
	else {
		div.style.display = "none";
		//stockInitButton.style.display = "none";
		img.src = imgpath + "/plus.gif";
	}
}

function check_value2(field)
{
  //alert(field);
  init_value=document.all(field).value;
  ModuleId=document.all("ModuleId").value;
  Add_table=document.all("Add_table").value;
  if (init_value==null||init_value==""){
  alert("«Îœ» ‰»Î“™—È÷§µƒƒ⁄»›");
  return false;
  	}
  URL="/app/module/code/checkvalue/index.jsp?ModuleId="+ModuleId+"&Add_table="+Add_table+"&INIT_VALUE="+init_value+"&field="+field;
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:450px;dialogHeight:250px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}

var isNS4 = (navigator.appName=="Netscape")?1:0;

function check_input_num(num_type)
{
  if(num_type=="NUMBER")
  {
     if(!isNS4)
     {
     	 if((event.keyCode < 48 || event.keyCode > 57)&&event.keyCode != 46)
     	    event.returnValue = false;
     }
     else
     {
     	 if((event.which < 48 || event.which > 57)&&event.keyCode != 46)
     	    return false;
     }
  }
  else if(num_type=="MONEY")
  {
     if(!isNS4)
     {
     	 if((event.keyCode < 45 || event.keyCode > 57)&&event.keyCode != 47)
     	    event.returnValue = false;
     }
     else
     {
     	 if((event.which < 45 || event.which > 57)&&event.which != 47)
     	    return false;
     }
  }
}


function check_value(field)
{
   var obj=document.all(field);
   if(obj.value=="")
      return;
      
   addMoneyStr(field);
   
}

function  init_value(field)
{

   var obj=document.all(field);   
   if (obj.value=="")
      return;

   re=/,/g;
   obj.value=obj.value.replace(re,"");
   
}


function select_all(isCheck){  //»´—°
	var objs = document.getElementsByTagName("input");
	for(var i=0; i<objs.length; i++) {
		if(objs[i].type.toLowerCase() == "checkbox" ){
			objs[i].checked = isCheck;
		}
	}
}

function select_chanage(checkBox) {	//—°‘Ò∏ƒ±‰
	if(checkBox.checked){
		checkBox.checked = true;
		if(is_all_select()){
			document.all.allCheck.checked = true;
		}
	}else{
		document.all.allCheck.checked = false;
	}

}

function is_all_select() {  //≈–∂® «∑Ò»´—°
	var objs = document.getElementsByTagName("input");
	for(var i=0; i<objs.length; i++) {
		if(objs[i].type.toLowerCase() == "checkbox" && objs[i].name.toLowerCase != "allcheck" 
			 && objs[i].checked == false){
			return false;
		}
	}
	return true;
}

function getListOfChecked() {  //ªÒµ√±ª—°÷–µƒœÓ
	var objs = document.getElementsByTagName("input");
	var pickListAry = new Array();
	var count = 0;

	for (var i=0; i<objs.length; i++) {
		if(objs[i].type.toLowerCase() == "checkbox" 
				&& objs[i].name.toLowerCase() != "allcheck" && objs[i].checked == true){
			//alert(objs[i].name);
			pickListAry[count++] = objs[i].name.slice(9);  //9 «◊÷¥Æ"checkbox_"µƒ≥§∂»
		   // alert(pickListAry[count++]);
		}
	}

	return pickListAry;
}

function querytable()
{   
   var idRowid=document.all("ID_STR").value;	
   if(idRowid=="")
   {
      alert("«Î÷¡…Ÿ—°÷–“ªœÓ≤Èø¥√˜œ∏£°");
      return false;
   }
   var ModuleId=document.all("ModuleId").value;
   var dataState="4";
   if (document.getElementById("dataState")!=null){
   dataState=document.all("dataState").value;
   }
if (dataState=="4"&&ModuleId=="K01"){
ModuleId="K02";
   URL="/app/module/code/detailflow.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&dataState="+dataState;
}else{
   URL="/app/module/code/querytable/index.jsp?rowid="+idRowid+"&ModuleId="+ModuleId+"&dataState="+dataState+"&queryOnly=1";
}
   loc_x=0;
   loc_y=0;
//alert("URL"+URL);
window.showModalDialog(URL,self,"edge:raised;scroll:1;status:1;help:1;resizable:1;dialogWidth:1000px;dialogHeight:650px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
 
//  window.open(URL,"qq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=800px,Top="+loc_y+"px,Left="+loc_x+"px");
}

function condetionedit(openrul,flowModuleId)
{
 var ModuleId=document.all("ModuleId").value;
 //flowModuleId=document.all("flowModuleId").value;
   var idStr=document.all("ID_STR").value;
   //var idRowid=idStr.substring(0,18)+",";
   var idStr2=idStr.substring(0,idStr.length-1);
   if (document.getElementById("NotDel_"+idStr2)!=null){
   var NotDel=document.all("NotDel_"+idStr2).value;
   //alert(NotDel);
   if(NotDel=="1")
   {
      alert("œµÕ≥…Ë÷√≤Œ ˝£¨Œﬁ∑®…Ë÷√Ãıº˛£°");
      return false;
   }
  }
   
   if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("÷ªƒ‹—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   //ModuleId="S02";
   URL=openrul+"?rowid="+idStr+"&ModuleId="+ModuleId+"&flowModuleId="+flowModuleId;
   loc_x=0;
   loc_y=0;
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=650px,Top="+loc_y+"px,Left="+loc_x+"px");
}

function secadd3()
{
 var ModuleId=document.all("ModuleId").value;
 var ModuleActionId="3";
var openurl="/app/module/code/queryflowdate/index.jsp";
  URL=openurl+"?ModuleId="+ModuleId+"&ModuleActionId="+ModuleActionId;
   loc_x=0;
   loc_y=0;
window.open(URL,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=650px,Top="+loc_y+"px,Left="+loc_x+"px");
}



function query_product(field)
{
  //alert(field);
  var supplyStr="";
  if (document.getElementById("supplyId")!=null){
  supplyStr=document.all("supplyId").value;  
  }
  var stockId="";
  if (document.getElementById("stockid")!=null){
  stockId=document.all("stockid").value;  
  }
  init_value=document.all(field).value;
  code=document.all(field+"_CODE").value;
  table=document.all(field+"_TABLE").value; 
  ModuleId=document.all("ModuleId").value; 
  URL="/app/module/code/queryproduct/index.jsp?CODE="+code+"&TABLE="+table+"&FIELD="+field+"&INIT_VALUE="+init_value+"&supplyStr="+supplyStr+"&ModuleId="+ModuleId+"&stockId="+stockId;
  loc_x=document.body.scrollLeft+event.clientX-event.offsetX+350;
  loc_y=document.body.scrollTop+event.clientY-event.offsetY+100;
  window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:650px;dialogHeight:450px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
  //window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=300px,Top="+loc_y+"px,Left="+loc_x+"px");
}




function addflow(openurl)
{
 var ModuleId=document.all("ModuleId").value;
   loc_x=0;
   loc_y=0;
   openurl=openurl+"?ModuleId="+ModuleId;
  //  window.showModalDialog(openurl,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:1000px;dialogHeight:650px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
window.open(openurl,"qqq","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=650px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function editflow(openrul)
{
 var ModuleId=document.all("ModuleId").value;
   var idStr=document.all("ID_STR").value;   
   var idStr2=idStr.substring(0,idStr.length-1);
   if (document.getElementById("NotDel_"+idStr2)!=null){
   var NotDel=document.all("NotDel_"+idStr2).value;
   if(NotDel=="1")
   {
      alert("œµÕ≥…Ë÷√≤Œ ˝£¨Œﬁ∑®–ﬁ∏ƒ£°");
      return false;
   }
  }
   
   if(idStr=="")
   {
      alert("«Î—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("÷ªƒ‹—°÷–“ªœÓ±‡º≠£°");
      return false;
   }
   URL=openrul+"?rowid="+idStr+"&ModuleId="+ModuleId;
   loc_x=0;
   loc_y=0;
 //   window.showModalDialog(URL,self,"edge:raised;scroll:0;status:0;help:0;resizable:1;dialogWidth:1000px;dialogHeight:650px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px");
 
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=650px,Top="+loc_y+"px,Left="+loc_x+"px");
}

function editquery(moduleId,supplyId)
{
supplyId=supplyId+",";
   openrul="/app/module/dataquery/index.jsp";
   URL=openrul+"?ModuleId="+moduleId+"&rowid="+supplyId+"&queryOnly=1";
   loc_x=300;
   loc_y=0;
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=400px,height=150px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function seceditquery(moduleId,supplyId)
{
supplyId=supplyId+",";
   openrul="/app/module/dataquery/secindex.jsp";
   URL=openrul+"?ModuleId="+moduleId+"&rowid="+supplyId+"&queryOnly=1";
   loc_x=0;
   loc_y=0;
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=650px,Top="+loc_y+"px,Left="+loc_x+"px");
}
function productquery(productId)
{
productId=productId+",";
   openrul="/app/product/edit.jsp";
   URL=openrul+"?rowid="+productId+"&queryOnly=1";
   loc_x=0;
   loc_y=0;
window.open(URL,"","menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1,width=1000px,height=650px,Top="+loc_y+"px,Left="+loc_x+"px");
}
////////////////////////////////// zhuyaoming 20080514

var Main_Tab	= null;
var cur_row	= null;
var cur_col	= null;
var cur_cell	= null;
var Org_con	= "";
var sort_col	= null;

var show_col	= false;
var charMode	= true;
var act_bgc	= "#BEC5DE";
var act_fc	= "black";
var cur_bgc	= "#ccffcc";
var cur_fc	= "black";
var firstCol= true;

function dragTableInit(firstParm){
    firstCol=firstParm;
	cur_row			= null;
	cur_col			= null;
	cur_cell		= null;
	sort_col		= null;
	Main_Tab 		= PowerTable;
	read_def(Main_Tab)
	Main_Tab.onmouseover	= overIt;
	Main_Tab.onmouseout	= outIt;
	Main_Tab.onclick	= clickIt;
	Org_con			= Main_Tab.outerHTML;

  document.onselectstart	= function(){return false;}
	document.onmouseup	= drag_end;
	
	arrowUp = document.createElement("SPAN");
	arrowUp.innerHTML	= "5";
	arrowUp.style.cssText 	= "PADDING-RIGHT: 0px; MARGIN-TOP: -3px; PADDING-LEFT: 0px; FONT-SIZE: 10px; MARGIN-BOTTOM: 2px; PADDING-BOTTOM: 2px; OVERFLOW: hidden; WIDTH: 10px; COLOR: blue; PADDING-TOP: 0px; FONT-FAMILY: webdings; HEIGHT: 11px";

	arrowDown = document.createElement("SPAN");
	arrowDown.innerHTML	= "6";
	arrowDown.style.cssText = "PADDING-RIGHT: 0px; MARGIN-TOP: -3px; PADDING-LEFT: 0px; FONT-SIZE: 10px; MARGIN-BOTTOM: 2px; PADDING-BOTTOM: 2px; OVERFLOW: hidden; WIDTH: 10px; COLOR: blue; PADDING-TOP: 0px; FONT-FAMILY: webdings; HEIGHT: 11px";
	drag = document.createElement("DIV");
	drag.innerHTML		= "";
	drag.style.textAlign 	= "center";
	drag.style.position 	= "absolute";
	drag.style.cursor 	= "hand";
	drag.style.border 	= "1 solid black";
	drag.style.display 	= "none";
	drag.style.zIndex 	= "999";
	
	document.body.insertBefore(drag);
}

function clear_color(){
	the_table=Main_Tab;
	if(cur_col!=null){
		for(i=0;i<the_table.rows.length;i++){
			with(the_table.rows[i].cells[cur_col]){
				style.backgroundColor=oBgc;
				style.color=oFc;
			}
		}
	}
	if(cur_row!=null){
		for(i=0;i<the_table.rows[cur_row].cells.length;i++){
			with(the_table.rows[cur_row].cells[i]){
				style.backgroundColor=oBgc;
				style.color=oFc;
			}
		}
	}
	if(cur_cell!=null){
		cur_cell.children[0].contentEditable = false;
		with(cur_cell.children[0].runtimeStyle){
			borderLeft=borderTop="";
			borderRight=borderBottom="";
			backgroundColor="";
			paddingLeft="";
			textAlign="";
		}
	}
}

function document.onclick(){
	window.status = "";
	clear_color();
	cur_row  = null;
	cur_col  = null;
	cur_cell = null;
}

function read_def(the_table){
	for(var i=0;i<the_table.rows.length;i++){
		for(var j=0;j<the_table.rows[i].cells.length;j++){
			with(the_table.rows[i]){
				cells[j].oBgc = cells[j].currentStyle.backgroundColor;
				cells[j].oFc  = cells[j].currentStyle.color;
				if(i==0){
					cells[j].onmousedown	= drag_start;
					cells[j].onmouseup	= drag_end;
				}
			}
		}
	}
}

function get_Element(the_ele,the_tag){
	the_tag = the_tag.toLowerCase();
	if(the_ele.tagName.toLowerCase()==the_tag)return the_ele;
	while(the_ele=the_ele.parentElement){
		if(the_ele.tagName.toLowerCase()==the_tag)return the_ele;
	}
	return(null);
}

var dragStart		= false;
var dragColStart	= null;
var dragColEnd		= null;

function drag_start(){
	var the_td	= get_Element(event.srcElement,"td");
	if(the_td==null)
	{
		 the_td = get_Element(event.srcElement,"th");
		 if (the_td==null)
		 		return;
	}
	var the_div = get_Element(the_td,"div");
	dragStart	= true;
	dragColStart	= the_td.cellIndex;
	drag.style.width	= the_td.offsetWidth;
	drag.style.height	= the_td.offsetHeight;
	function document.onmousemove(){
		drag.style.display	= "";
		drag.style.top		= event.clientY - drag.offsetHeight/2;
		drag.style.left		= event.clientX - drag.offsetWidth/2;
		for(var i=0;i<Main_Tab.rows[0].cells.length;i++)
		{
				with(Main_Tab.rows[0].cells[i])
				{
					if((event.y > offsetTop+parseInt(the_div.offsetTop)  && 
					    event.y < offsetTop+offsetHeight+parseInt(the_div.offsetTop))  &&  
					   (event.x > offsetLeft+parseInt(the_div.offsetLeft)  && 
					    event.x < offsetLeft+offsetWidth+parseInt(the_div.offsetLeft)))
					 {
						runtimeStyle.backgroundColor=act_bgc;
						dragColEnd=cellIndex;
					}
					else{
						runtimeStyle.backgroundColor="";
					}
				}
		}
		if(!(event.y>Main_Tab.rows[0].offsetTop+parseInt(the_div.offsetTop)  && 
		     event.y<Main_Tab.rows[0].offsetTop+Main_Tab.rows[0].offsetHeight+parseInt(the_div.offsetTop))) 
		     dragColEnd=null;
	}
	drag.innerHTML = the_td.innerHTML;
	drag.style.backgroundColor = the_td.oBgc;
	drag.style.color = the_td.oFc;
}

function drag_end(){
	dragStart = false;
	drag.style.display="none";
	drag.innerHTML = "";
	drag.style.width = 0;
	drag.style.height = 0;
	for(var i=0;i<Main_Tab.rows[0].cells.length;i++){
		Main_Tab.rows[0].cells[i].runtimeStyle.backgroundColor="";
	}
	if(dragColStart!=null  &&  dragColEnd!=null  &&  dragColStart!=dragColEnd){
		change_col(Main_Tab,dragColStart,dragColEnd);
		if(dragColStart==sort_col)sort_col=dragColEnd;
		else if(dragColEnd==sort_col)sort_col=dragColStart;
		document.onclick();
	}
	dragColStart = null;
	dragColEnd = null;
	document.onmousemove=null;
}

function clickIt(){
	event.cancelBubble=true;
	var the_obj = event.srcElement;
	var i = 0 ,j = 0;
	if(cur_cell!=null  &&  cur_row!=0){
		cur_cell.children[0].contentEditable = false;
		with(cur_cell.children[0].runtimeStyle){
			borderLeft=borderTop="";
			borderRight=borderBottom="";
			backgroundColor="";
			paddingLeft="";
			textAlign="";
		}
	}
	
	if(the_obj.tagName.toLowerCase() != "table"  &&  
		the_obj.tagName.toLowerCase() != "tbody"  &&  
		the_obj.tagName.toLowerCase() != "tr")
	{
		var the_td	= get_Element(the_obj,"td");
		if(the_td==null)
		{
			 the_td = get_Element(the_obj,"th");
			 if (the_td==null)
			 		return;
		}
		var the_tr	= the_td.parentElement;
		var the_table	= get_Element(the_td,"table");
		var i 		= 0;
		clear_color();
		cur_row = the_tr.rowIndex;
		cur_col = the_td.cellIndex;
		if(cur_row!=0){
			for(i=0;i<the_tr.cells.length;i++){
				with(the_tr.cells[i]){
					style.backgroundColor=cur_bgc;
					style.color=cur_fc;
				}
			}
		}else{
			if(show_col){
				for(i=1;i<the_table.rows.length;i++){
					with(the_table.rows[i].cells[cur_col]){
						style.backgroundColor=cur_bgc;
						style.color=cur_fc;
					}
				}
			}
			

			the_td.mode = !the_td.mode;
			if(sort_col!=null){
				with(the_table.rows[0].cells[sort_col])
					removeChild(lastChild);
			}
			
			with(the_table.rows[0].cells[cur_col])
				appendChild(the_td.mode?arrowUp:arrowDown);
			sort_tab(the_table,cur_col,the_td.mode);
			sort_col=cur_col;
		}
	}
	
}


function overIt(){
	if(dragStart)return;
	var the_obj = event.srcElement;
	var i = 0;
	if(the_obj.tagName.toLowerCase() != "table"){
		var the_td	= get_Element(the_obj,"td");
		if(the_td==null) 
		{
			 the_td = get_Element(the_obj,"th");
			 if (the_td==null)
			 		return;
		}
		var the_tr	= the_td.parentElement;
		var the_table	= get_Element(the_td,"table");
		if (the_table == null)
				return;
		if(the_tr.rowIndex!=0){
			for(i=0;i<the_tr.cells.length;i++){
				with(the_tr.cells[i]){
					runtimeStyle.backgroundColor=act_bgc;
					runtimeStyle.color=act_fc;					
				}
			}
		}else{
			for(i=1;i<the_table.rows.length;i++){
				with(the_table.rows[i].cells(the_td.cellIndex)){
					runtimeStyle.backgroundColor=act_bgc;
					runtimeStyle.color=act_fc;
				}
			}
			if(the_td.mode==undefined)the_td.mode = false;
			the_td.style.cursor=the_td.mode?"n-resize":"s-resize";
		}
	}
}

function outIt(){
	var the_obj = event.srcElement;
	var i=0;
	if(the_obj.tagName.toLowerCase() != "table"){
		var the_td	= get_Element(the_obj,"td");
		if(the_td==null) 
		{
			 the_td = get_Element(the_obj,"th");
			 if (the_td==null)
			 	return;
		}
		var the_tr	= the_td.parentElement;
		var the_table	= get_Element(the_td,"table");
		if (the_table == null)
				return;
		if(the_tr.rowIndex!=0){
			for(i=0;i<the_tr.cells.length;i++){
				with(the_tr.cells[i]){
					runtimeStyle.backgroundColor='';
					runtimeStyle.color='';				
				}
			}
		}else{
			var the_table=the_tr.parentElement.parentElement;
			for(i=0;i<the_table.rows.length;i++){
				with(the_table.rows[i].cells(the_td.cellIndex)){
					runtimeStyle.backgroundColor='';
					runtimeStyle.color='';
				}
			}
		}
	}
}

var charPYStr = "∞°∞¢∞£∞§∞•∞¶∞ß∞®∞©∞™∞´∞¨∞≠∞Æ∞Ø∞∞∞±∞≤∞≥∞¥∞µ∞∂∞∑∞∏∞π∞∫∞ª∞º∞Ω∞æ∞ø∞¿∞¡∞¬∞√∞ƒ∞≈∞∆∞«∞»∞…∞ ∞À∞Ã∞Õ∞Œ∞œ∞–∞—∞“∞”∞‘∞’∞÷∞◊∞ÿ∞Ÿ∞⁄∞€∞‹∞›∞ﬁ∞ﬂ∞‡∞·∞‚∞„∞‰∞Â∞Ê∞Á∞Ë∞È∞Í∞Î∞Ï∞Ì∞Ó∞Ô∞∞Ò∞Ú∞Û∞Ù∞ı∞ˆ∞˜∞¯∞˘∞˙∞˚∞¸∞˝∞˛±°±¢±£±§±•±¶±ß±®±©±™±´±¨±≠±Æ±Ø±∞±±±≤±≥±¥±µ±∂±∑±∏±π±∫±ª±º±Ω±æ±ø±¿±¡±¬±√±ƒ±≈±∆±«±»±…± ±À±Ã±Õ±Œ±œ±–±—±“±”±‘±’±÷±◊±ÿ±Ÿ±⁄±€±‹±›±ﬁ±ﬂ±‡±·±‚±„±‰±Â±Ê±Á±Ë±È±Í±Î±Ï±Ì±Ó±Ô±±Ò±Ú±Û±Ù±ı±ˆ±˜±¯±˘±˙±˚±¸±˝±˛≤°≤¢≤£≤§≤•≤¶≤ß≤®≤©≤™≤´≤¨≤≠≤Æ≤Ø≤∞≤±≤≤≤≥≤¥≤µ≤∂≤∑≤∏≤π≤∫≤ª≤º≤Ω≤æ≤ø≤¿≤¡≤¬≤√≤ƒ≤≈≤∆≤«≤»≤…≤ ≤À≤Ã≤Õ≤Œ≤œ≤–≤—≤“≤”≤‘≤’≤÷≤◊≤ÿ≤Ÿ≤⁄≤€≤‹≤›≤ﬁ≤ﬂ≤‡≤·≤‚≤„≤‰≤Â≤Ê≤Á≤Ë≤È≤Í≤Î≤Ï≤Ì≤Ó≤Ô≤≤Ò≤Ú≤Û≤Ù≤ı≤ˆ≤˜≤¯≤˘≤˙≤˚≤¸≤˝≤˛≥°≥¢≥£≥§≥•≥¶≥ß≥®≥©≥™≥´≥¨≥≠≥Æ≥Ø≥∞≥±≥≤≥≥≥¥≥µ≥∂≥∑≥∏≥π≥∫≥ª≥º≥Ω≥æ≥ø≥¿≥¡≥¬≥√≥ƒ≥≈≥∆≥«≥»≥…≥ ≥À≥Ã≥Õ≥Œ≥œ≥–≥—≥“≥”≥‘≥’≥÷≥◊≥ÿ≥Ÿ≥⁄≥€≥‹≥›≥ﬁ≥ﬂ≥‡≥·≥‚≥„≥‰≥Â≥Ê≥Á≥Ë≥È≥Í≥Î≥Ï≥Ì≥Ó≥Ô≥≥Ò≥Ú≥Û≥Ù≥ı≥ˆ≥˜≥¯≥˘≥˙≥˚≥¸≥˝≥˛¥°¥¢¥£¥§¥•¥¶¥ß¥®¥©¥™¥´¥¨¥≠¥Æ¥Ø¥∞¥±¥≤¥≥¥¥¥µ¥∂¥∑¥∏¥π¥∫¥ª¥º¥Ω¥æ¥ø¥¿¥¡¥¬¥√¥ƒ¥≈¥∆¥«¥»¥…¥ ¥À¥Ã¥Õ¥Œ¥œ¥–¥—¥“¥”¥‘¥’¥÷¥◊¥ÿ¥Ÿ¥⁄¥€¥‹¥›¥ﬁ¥ﬂ¥‡¥·¥‚¥„¥‰¥Â¥Ê¥Á¥Ë¥È¥Í¥Î¥Ï¥Ì¥Ó¥Ô¥¥Ò¥Ú¥Û¥Ù¥ı¥ˆ¥˜¥¯¥˘¥˙¥˚¥¸¥˝¥˛µ°µ¢µ£µ§µ•µ¶µßµ®µ©µ™µ´µ¨µ≠µÆµØµ∞µ±µ≤µ≥µ¥µµµ∂µ∑µ∏µπµ∫µªµºµΩµæµøµ¿µ¡µ¬µ√µƒµ≈µ∆µ«µ»µ…µ µÀµÃµÕµŒµœµ–µ—µ“µ”µ‘µ’µ÷µ◊µÿµŸµ⁄µ€µ‹µ›µﬁµﬂµ‡µ·µ‚µ„µ‰µÂµÊµÁµËµÈµÍµÎµÏµÌµÓµÔµµÒµÚµÛµÙµıµˆµ˜µ¯µ˘µ˙µ˚µ¸µ˝µ˛∂°∂¢∂£∂§∂•∂¶∂ß∂®∂©∂™∂´∂¨∂≠∂Æ∂Ø∂∞∂±∂≤∂≥∂¥∂µ∂∂∂∑∂∏∂π∂∫∂ª∂º∂Ω∂æ∂ø∂¿∂¡∂¬∂√∂ƒ∂≈∂∆∂«∂»∂…∂ ∂À∂Ã∂Õ∂Œ∂œ∂–∂—∂“∂”∂‘∂’∂÷∂◊∂ÿ∂Ÿ∂⁄∂€∂‹∂›∂ﬁ∂ﬂ∂‡∂·∂‚∂„∂‰∂Â∂Ê∂Á∂Ë∂È∂Í∂Î∂Ï∂Ì∂Ó∂Ô∂∂Ò∂Ú∂Û∂Ù∂ı∂ˆ∂˜∂¯∂˘∂˙∂˚∂¸∂˝∂˛∑°∑¢∑£∑§∑•∑¶∑ß∑®∑©∑™∑´∑¨∑≠∑Æ∑Ø∑∞∑±∑≤∑≥∑¥∑µ∑∂∑∑∑∏∑π∑∫∑ª∑º∑Ω∑æ∑ø∑¿∑¡∑¬∑√∑ƒ∑≈∑∆∑«∑»∑…∑ ∑À∑Ã∑Õ∑Œ∑œ∑–∑—∑“∑”∑‘∑’∑÷∑◊∑ÿ∑Ÿ∑⁄∑€∑‹∑›∑ﬁ∑ﬂ∑‡∑·∑‚∑„∑‰∑Â∑Ê∑Á∑Ë∑È∑Í∑Î∑Ï∑Ì∑Ó∑Ô∑∑Ò∑Ú∑Û∑Ù∑ı∑ˆ∑˜∑¯∑˘∑˙∑˚∑¸∑˝∑˛∏°∏¢∏£∏§∏•∏¶∏ß∏®∏©∏™∏´∏¨∏≠∏Æ∏Ø∏∞∏±∏≤∏≥∏¥∏µ∏∂∏∑∏∏∏π∏∫∏ª∏º∏Ω∏æ∏ø∏¿∏¡∏¬∏√∏ƒ∏≈∏∆∏«∏»∏…∏ ∏À∏Ã∏Õ∏Œ∏œ∏–∏—∏“∏”∏‘∏’∏÷∏◊∏ÿ∏Ÿ∏⁄∏€∏‹∏›∏ﬁ∏ﬂ∏‡∏·∏‚∏„∏‰∏Â∏Ê∏Á∏Ë∏È∏Í∏Î∏Ï∏Ì∏Ó∏Ô∏∏Ò∏Ú∏Û∏Ù∏ı∏ˆ∏˜∏¯∏˘∏˙∏˚∏¸∏˝∏˛π°π¢π£π§π•π¶πßπ®π©π™π´π¨π≠πÆπØπ∞π±π≤π≥π¥πµπ∂π∑π∏πππ∫πªπºπΩπæπøπ¿π¡π¬π√πƒπ≈π∆π«π»π…π πÀπÃπÕπŒπœπ–π—π“π”π‘π’π÷π◊πÿπŸπ⁄π€π‹π›πﬁπﬂπ‡π·π‚π„π‰πÂπÊπÁπËπÈπÍπÎπÏπÌπÓπÔππÒπÚπÛπÙπıπˆπ˜π¯π˘π˙π˚π¸π˝π˛∫°∫¢∫£∫§∫•∫¶∫ß∫®∫©∫™∫´∫¨∫≠∫Æ∫Ø∫∞∫±∫≤∫≥∫¥∫µ∫∂∫∑∫∏∫π∫∫∫ª∫º∫Ω∫æ∫ø∫¿∫¡∫¬∫√∫ƒ∫≈∫∆∫«∫»∫…∫ ∫À∫Ã∫Õ∫Œ∫œ∫–∫—∫“∫”∫‘∫’∫÷∫◊∫ÿ∫Ÿ∫⁄∫€∫‹∫›∫ﬁ∫ﬂ∫‡∫·∫‚∫„∫‰∫Â∫Ê∫Á∫Ë∫È∫Í∫Î∫Ï∫Ì∫Ó∫Ô∫∫Ò∫Ú∫Û∫Ù∫ı∫ˆ∫˜∫¯∫˘∫˙∫˚∫¸∫˝∫˛ª°ª¢ª£ª§ª•ª¶ªßª®ª©ª™ª´ª¨ª≠ªÆªØª∞ª±ª≤ª≥ª¥ªµª∂ª∑ª∏ªπª∫ªªªºªΩªæªøª¿ª¡ª¬ª√ªƒª≈ª∆ª«ª»ª…ª ªÀªÃªÕªŒªœª–ª—ª“ª”ª‘ª’ª÷ª◊ªÿªŸª⁄ª€ª‹ª›ªﬁªﬂª‡ª·ª‚ª„ª‰ªÂªÊªÁªËªÈªÍªÎªÏªÌªÓªÔªªÒªÚªÛªÙªıªˆª˜ª¯ª˘ª˙ª˚ª¸ª˝ª˛º°º¢º£º§º•º¶ºßº®º©º™º´º¨º≠ºÆºØº∞º±º≤º≥º¥ºµº∂º∑º∏ºπº∫ºªºººΩºæºøº¿º¡º¬º√ºƒº≈º∆º«º»º…º ºÀºÃºÕºŒºœº–º—º“º”º‘º’º÷º◊ºÿºŸº⁄º€º‹º›ºﬁºﬂº‡º·º‚º„º‰ºÂºÊºÁºËºÈºÍºÎºÏºÌºÓºÔººÒºÚºÛºÙºıºˆº˜º¯º˘º˙º˚º¸º˝º˛Ω°Ω¢Ω£Ω§Ω•Ω¶ΩßΩ®Ω©Ω™Ω´Ω¨Ω≠ΩÆΩØΩ∞Ω±Ω≤Ω≥Ω¥ΩµΩ∂Ω∑Ω∏ΩπΩ∫ΩªΩºΩΩΩæΩøΩ¿Ω¡Ω¬Ω√ΩƒΩ≈Ω∆Ω«Ω»Ω…Ω ΩÀΩÃΩÕΩŒΩœΩ–Ω—Ω“Ω”Ω‘Ω’Ω÷Ω◊ΩÿΩŸΩ⁄æ•æ¶æßæ®æ©æ™æ´æ¨æ≠æÆæØæ∞æ±æ≤æ≥æ¥æµæ∂æ∑æ∏æπæ∫æªæºæΩæææøæ¿æ¡æ¬æ√æƒæ≈æ∆æ«æ»æ…æ æÀæÃæÕæŒæœæ–æ—æ“æ”æ‘æ’æ÷æ◊æÿæŸæ⁄æ€æ‹æ›æﬁæﬂæ‡æ·æ‚æ„æ‰æÂæÊæÁæËæÈæÍæÎæÏæÌæÓæÔææÒæÚæÛæÙΩ€Ω‹Ω›ΩﬁΩﬂΩ‡Ω·Ω‚Ω„Ω‰ΩÂΩÊΩÁΩËΩÈΩÍΩÎΩÏΩÌΩÓΩÔΩΩÒΩÚΩÛΩÙΩıΩˆΩ˜Ω¯Ω˘Ω˙Ω˚Ω¸Ω˝Ω˛æ°æ¢æ£æ§æıæˆæ˜æ¯æ˘æ˙æ˚æ¸æ˝æ˛ø°ø¢ø£ø§ø•ø¶øßø®ø©ø™ø´ø¨ø≠øÆøØø∞ø±ø≤ø≥ø¥øµø∂ø∑ø∏øπø∫øªøºøΩøæøøø¿ø¡ø¬ø√øƒø≈ø∆ø«ø»ø…ø øÀøÃøÕøŒøœø–ø—ø“ø”ø‘ø’ø÷ø◊øÿøŸø⁄ø€ø‹ø›øﬁøﬂø‡ø·ø‚ø„ø‰øÂøÊøÁøËøÈøÍøÎøÏøÌøÓøÔøøÒøÚøÛøÙøıøˆø˜ø¯ø˘ø˙ø˚ø¸ø˝ø˛¿°¿¢¿£¿§¿•¿¶¿ß¿®¿©¿™¿´¿¨¿≠¿Æ¿Ø¿∞¿±¿≤¿≥¿¥¿µ¿∂¿∑¿∏¿π¿∫¿ª¿º¿Ω¿æ¿ø¿¿¿¡¿¬¿√¿ƒ¿≈¿∆¿«¿»¿…¿ ¿À¿Ã¿Õ¿Œ¿œ¿–¿—¿“¿”¿‘¿’¿÷¿◊¿ÿ¿Ÿ¿⁄¿€¿‹¿›¿ﬁ¿ﬂ¿‡¿·¿‚¿„¿‰¿Â¿Ê¿Á¿Ë¿È¿Í¿Î¿Ï¿Ì¿Ó¿Ô¿¿Ò¿Ú¿Û¿Ù¿ı¿ˆ¿˜¿¯¿˘¿˙¿˚¿¸¿˝¿˛¡°¡¢¡£¡§¡•¡¶¡ß¡®¡©¡™¡´¡¨¡≠¡Æ¡Ø¡∞¡±¡≤¡≥¡¥¡µ¡∂¡∑¡∏¡π¡∫¡ª¡º¡Ω¡æ¡ø¡¿¡¡¡¬¡√¡ƒ¡≈¡∆¡«¡»¡…¡ ¡À¡Ã¡Õ¡Œ¡œ¡–¡—¡“¡”¡‘¡’¡÷¡◊¡ÿ¡Ÿ¡⁄¡€¡‹¡›¡ﬁ¡ﬂ¡‡¡·¡‚¡„¡‰¡Â¡Ê¡Á¡Ë¡È¡Í¡Î¡Ï¡Ì¡Ó¡Ô¡¡Ò¡Ú¡Û¡Ù¡ı¡ˆ¡˜¡¯¡˘¡˙¡˚¡¸¡˝¡˛¬°¬¢¬£¬§¬•¬¶¬ß¬®¬©¬™¬´¬¨¬≠¬Æ¬Ø¬∞¬±¬≤¬≥¬¥¬µ¬∂¬∑¬∏¬π¬∫¬ª¬º¬Ω¬æ¬ø¬¿¬¡¬¬¬√¬ƒ¬≈¬∆¬«¬»¬…¬ ¬À¬Ã¬Õ¬Œ¬œ¬–¬—¬“¬”¬‘¬’¬÷¬◊¬ÿ¬Ÿ¬⁄¬€¬‹¬›¬ﬁ¬ﬂ¬‡¬·¬‚¬„¬‰¬Â¬Ê¬Á¬Ë¬È¬Í¬Î¬Ï¬Ì¬Ó¬Ô¬¬Ò¬Ú¬Û¬Ù¬ı¬ˆ¬˜¬¯¬˘¬˙¬˚¬¸¬˝¬˛√°√¢√£√§√•√¶√ß√®√©√™√´√¨√≠√Æ√Ø√∞√±√≤√≥√¥√µ√∂√∑√∏√π√∫√ª√º√Ω√æ√ø√¿√¡√¬√√√ƒ√≈√∆√«√»√…√ √À√Ã√Õ√Œ√œ√–√—√“√”√‘√’√÷√◊√ÿ√Ÿ√⁄√€√‹√›√ﬁ√ﬂ√‡√·√‚√„√‰√Â√Ê√Á√Ë√È√Í√Î√Ï√Ì√Ó√Ô√√Ò√Ú√Û√Ù√ı√ˆ√˜√¯√˘√˙√˚√¸√˝√˛ƒ°ƒ¢ƒ£ƒ§ƒ•ƒ¶ƒßƒ®ƒ©ƒ™ƒ´ƒ¨ƒ≠ƒÆƒØƒ∞ƒ±ƒ≤ƒ≥ƒ¥ƒµƒ∂ƒ∑ƒ∏ƒπƒ∫ƒªƒºƒΩƒæƒøƒ¿ƒ¡ƒ¬ƒ√ƒƒƒ≈ƒ∆ƒ«ƒ»ƒ…ƒ ƒÀƒÃƒÕƒŒƒœƒ–ƒ—ƒ“ƒ”ƒ‘ƒ’ƒ÷ƒ◊ƒÿƒŸƒ⁄ƒ€ƒ‹ƒ›ƒﬁƒﬂƒ‡ƒ·ƒ‚ƒ„ƒ‰ƒÂƒÊƒÁƒËƒÈƒÍƒÎƒÏƒÌƒÓƒÔƒƒÒƒÚƒÛƒÙƒıƒˆƒ˜ƒ¯ƒ˘ƒ˙ƒ˚ƒ¸ƒ˝ƒ˛≈°≈¢≈£≈§≈•≈¶≈ß≈®≈©≈™≈´≈¨≈≠≈Æ≈Ø≈∞≈±≈≤≈≥≈¥≈µ≈∂≈∑≈∏≈π≈∫≈ª≈º≈Ω≈æ≈ø≈¿≈¡≈¬≈√≈ƒ≈≈≈∆≈«≈»≈…≈ ≈À≈Ã≈Õ≈Œ≈œ≈–≈—≈“≈”≈‘≈’≈÷≈◊≈ÿ≈Ÿ≈⁄≈€≈‹≈›≈ﬁ≈ﬂ≈‡≈·≈‚≈„≈‰≈Â≈Ê≈Á≈Ë≈È≈Í≈Î≈Ï≈Ì≈Ó≈Ô≈≈Ò≈Ú≈Û≈Ù≈ı≈ˆ≈˜≈¯≈˘≈˙≈˚≈¸≈˝≈˛∆°∆¢∆£∆§∆•∆¶∆ß∆®∆©∆™∆´∆¨∆≠∆Æ∆Ø∆∞∆±∆≤∆≥∆¥∆µ∆∂∆∑∆∏∆π∆∫∆ª∆º∆Ω∆æ∆ø∆¿∆¡∆¬∆√∆ƒ∆≈∆∆∆«∆»∆…∆ ∆À∆Ã∆Õ∆Œ∆œ∆–∆—∆“∆”∆‘∆’∆÷∆◊∆ÿ∆Ÿ∆⁄∆€∆‹∆›∆ﬁ∆ﬂ∆‡∆·∆‚∆„∆‰∆Â∆Ê∆Á∆Ë∆È∆Í∆Î∆Ï∆Ì∆Ó∆Ô∆∆Ò∆Ú∆Û∆Ù∆ı∆ˆ∆˜∆¯∆˘∆˙∆˚∆¸∆˝∆˛«¢«£«§«•«¶«ß«®«©«™«´«¨«≠«Æ«Ø«∞«±«≤«≥«¥«µ«∂«∑«∏«π«∫«ª«º«Ω«æ«ø«¿«¡«¬«√«ƒ«≈«∆«««»«…« «À«Ã«Õ«Œ«œ«–«—«“«”«‘«’«÷«◊«ÿ«Ÿ«⁄«€«‹«›«ﬁ«ﬂ«‡«·«‚«„«‰«Â«Ê«Á«Ë«È«Í«Î«Ï«Ì«Ó«Ô««Ò«Ú«Û«Ù«ı«ˆ«˜«¯«˘«˙«˚«¸«˝«˛»°»¢»£»§»•»¶»ß»®»©»™»´»¨»≠»Æ»Ø»∞»±»≤»≥»¥»µ»∂»∑»∏»π»∫»ª»º»Ω»æ»ø»¿»¡»¬»√»ƒ»≈»∆»«»»»…» »À»Ã»Õ»Œ»œ»–»—»“»”»‘»’»÷»◊»ÿ»Ÿ»⁄»€»‹»›»ﬁ»ﬂ»‡»·»‚»„»‰»Â»Ê»Á»Ë»È»Í»Î»Ï»Ì»Ó»Ô»»Ò»Ú»Û»Ù»ı»ˆ»˜»¯»˘»˙»˚»¸»˝»˛…°…¢…£…§…•…¶…ß…®…©…™…´…¨…≠…Æ…Ø…∞…±…≤…≥…¥…µ…∂…∑…∏…π…∫…ª…º…Ω…æ…ø…¿…¡…¬…√…ƒ…≈…∆…«…»……… …À…Ã…Õ…Œ…œ…–…—…“…”…‘…’…÷…◊…ÿ…Ÿ…⁄…€…‹…›…ﬁ…ﬂ…‡…·…‚…„…‰…Â…Ê…Á…Ë…È…Í…Î…Ï…Ì…Ó…Ô……Ò…Ú…Û…Ù…ı…ˆ…˜…¯…˘…˙…˚…¸…˝…˛ ° ¢ £ § • ¶ ß ® © ™ ´ ¨ ≠ Æ Ø ∞ ± ≤ ≥ ¥ µ ∂ ∑ ∏ π ∫ ª º Ω æ ø ¿ ¡ ¬ √ ƒ ≈ ∆ « » …   À Ã Õ Œ œ – — “ ” ‘ ’ ÷ ◊ ÿ Ÿ ⁄ € ‹ › ﬁ ﬂ ‡ · ‚ „ ‰ Â Ê Á Ë È Í Î Ï Ì Ó Ô  Ò Ú Û Ù ı ˆ ˜ ¯ ˘ ˙ ˚ ¸ ˝ ˛À°À¢À£À§À•À¶ÀßÀ®À©À™À´À¨À≠ÀÆÀØÀ∞À±À≤À≥À¥ÀµÀ∂À∑À∏ÀπÀ∫ÀªÀºÀΩÀæÀøÀ¿À¡À¬À√ÀƒÀ≈À∆À«À»À…À ÀÀÀÃÀÕÀŒÀœÀ–À—À“À”À‘À’À÷À◊ÀÿÀŸÀ⁄À€À‹À›ÀﬁÀﬂÀ‡À·À‚À„À‰ÀÂÀÊÀÁÀËÀÈÀÍÀÎÀÏÀÌÀÓÀÔÀÀÒÀÚÀÛÀÙÀıÀˆÀ˜À¯À˘À˙À˚À¸À˝À˛Ã°Ã¢Ã£Ã§Ã•Ã¶ÃßÃ®Ã©Ã™Ã´Ã¨Ã≠ÃÆÃØÃ∞Ã±Ã≤Ã≥Ã¥ÃµÃ∂Ã∑Ã∏ÃπÃ∫ÃªÃºÃΩÃæÃøÃ¿Ã¡Ã¬Ã√ÃƒÃ≈Ã∆Ã«Ã»Ã…Ã ÃÀÃÃÃÕÃŒÃœÃ–Ã—Ã“Ã”Ã‘Ã’Ã÷Ã◊ÃÿÃŸÃ⁄Ã€Ã‹Ã›ÃﬁÃﬂÃ‡Ã·Ã‚Ã„Ã‰ÃÂÃÊÃÁÃËÃÈÃÍÃÎÃÏÃÌÃÓÃÔÃÃÒÃÚÃÛÃÙÃıÃˆÃ˜Ã¯Ã˘Ã˙Ã˚Ã¸Ã˝Ã˛Õ°Õ¢Õ£Õ§Õ•Õ¶ÕßÕ®Õ©Õ™Õ´Õ¨Õ≠ÕÆÕØÕ∞Õ±Õ≤Õ≥Õ¥ÕµÕ∂Õ∑Õ∏ÕπÕ∫ÕªÕºÕΩÕæÕøÕ¿Õ¡Õ¬Õ√ÕƒÕ≈Õ∆Õ«Õ»Õ…Õ ÕÀÕÃÕÕÕŒÕœÕ–Õ—Õ“Õ”Õ‘Õ’Õ÷Õ◊ÕÿÕŸÕ⁄Õ€Õ‹Õ›ÕﬁÕﬂÕ‡Õ·Õ‚Õ„Õ‰ÕÂÕÊÕÁÕËÕÈÕÍÕÎÕÏÕÌÕÓÕÔÕÕÒÕÚÕÛÕÙÕıÕˆÕ˜Õ¯Õ˘Õ˙Õ˚Õ¸Õ˝Õ˛Œ°Œ¢Œ£Œ§Œ•Œ¶ŒßŒ®Œ©Œ™Œ´Œ¨Œ≠ŒÆŒØŒ∞Œ±Œ≤Œ≥Œ¥ŒµŒ∂Œ∑Œ∏ŒπŒ∫ŒªŒºŒΩŒæŒøŒ¿Œ¡Œ¬Œ√ŒƒŒ≈Œ∆Œ«Œ»Œ…Œ ŒÀŒÃŒÕŒŒŒœŒ–Œ—Œ“Œ”Œ‘Œ’Œ÷Œ◊ŒÿŒŸŒ⁄Œ€Œ‹Œ›ŒﬁŒﬂŒ‡Œ·Œ‚Œ„Œ‰ŒÂŒÊŒÁŒËŒÈŒÍŒÎŒÏŒÌŒÓŒÔŒŒÒŒÚŒÛŒÙŒıŒˆŒ˜Œ¯Œ˘Œ˙Œ˚Œ¸Œ˝Œ˛œ°œ¢œ£œ§œ•œ¶œßœ®œ©œ™œ´œ¨œ≠œÆœØœ∞œ±œ≤œ≥œ¥œµœ∂œ∑œ∏œπœ∫œªœºœΩœæœøœ¿œ¡œ¬œ√œƒœ≈œ∆œ«œ»œ…œ œÀœÃœÕœŒœœœ–œ—œ“œ”œ‘œ’œ÷œ◊œÿœŸœ⁄œ€œ‹œ›œﬁœﬂœ‡œ·œ‚œ„œ‰œÂœÊœÁœËœÈœÍœÎœÏœÌœÓœÔœœÒœÚœÛœÙœıœˆœ˜œ¯œ˘œ˙œ˚œ¸œ˝œ˛–°–¢–£–§–•–¶–ß–®–©–™–´–¨–≠–Æ–Ø–∞–±–≤–≥–¥–µ–∂–∑–∏–π–∫–ª–º–Ω–æ–ø–¿–¡–¬–√–ƒ–≈–∆–«–»–…– –À–Ã–Õ–Œ–œ–––—–“–”–‘–’–÷–◊–ÿ–Ÿ–⁄–€–‹–›–ﬁ–ﬂ–‡–·–‚–„–‰–Â–Ê–Á–Ë–È–Í–Î–Ï–Ì–Ó–Ô––Ò–Ú–Û–Ù–ı–ˆ–˜–¯–˘–˙–˚–¸–˝–˛—°—¢—£—§—•—¶—ß—®—©—™—´—¨—≠—Æ—Ø—∞—±—≤—≥—¥—µ—∂—∑—∏—π—∫—ª—º—Ω—æ—ø—¿—¡—¬—√—ƒ—≈—∆—«—»—…— —À—Ã—Õ—Œ—œ—–———“—”—‘—’—÷—◊—ÿ—Ÿ—⁄—€—‹—›—ﬁ—ﬂ—‡—·—‚—„—‰—Â—Ê—Á—Ë—È—Í—Î—Ï—Ì—Ó—Ô——Ò—Ú—Û—Ù—ı—ˆ—˜—¯—˘—˙—˚—¸—˝—˛“°“¢“£“§“•“¶“ß“®“©“™“´“¨“≠“Æ“Ø“∞“±“≤“≥“¥“µ“∂“∑“∏“π“∫“ª“º“Ω“æ“ø“¿“¡“¬“√“ƒ“≈“∆“«“»“…“ “À“Ã“Õ“Œ“œ“–“—“““”“‘“’“÷“◊“ÿ“Ÿ“⁄“€“‹“›“ﬁ“ﬂ“‡“·“‚“„“‰“Â“Ê“Á“Ë“È“Í“Î“Ï“Ì“Ó“Ô““Ò“Ú“Û“Ù“ı“ˆ“˜“¯“˘“˙“˚“¸“˝“˛”°”¢”£”§”•”¶”ß”®”©”™”´”¨”≠”Æ”Ø”∞”±”≤”≥”¥”µ”∂”∑”∏”π”∫”ª”º”Ω”æ”ø”¿”¡”¬”√”ƒ”≈”∆”«”»”…” ”À”Ã”Õ”Œ”œ”–”—”“”””‘”’”÷”◊”ÿ”Ÿ”⁄”€”‹”›”ﬁ”ﬂ”‡”·”‚”„”‰”Â”Ê”Á”Ë”È”Í”Î”Ï”Ì”Ó”Ô””Ò”Ú”Û”Ù”ı”ˆ”˜”¯”˘”˙”˚”¸”˝”˛‘°‘¢‘£‘§‘•‘¶‘ß‘®‘©‘™‘´‘¨‘≠‘Æ‘Ø‘∞‘±‘≤‘≥‘¥‘µ‘∂‘∑‘∏‘π‘∫‘ª‘º‘Ω‘æ‘ø‘¿‘¡‘¬‘√‘ƒ‘≈‘∆‘«‘»‘…‘ ‘À‘Ã‘Õ‘Œ‘œ‘–‘—‘“‘”‘‘‘’‘÷‘◊‘ÿ‘Ÿ‘⁄‘€‘‹‘›‘ﬁ‘ﬂ‘‡‘·‘‚‘„‘‰‘Â‘Ê‘Á‘Ë‘È‘Í‘Î‘Ï‘Ì‘Ó‘Ô‘‘Ò‘Ú‘Û‘Ù‘ı‘ˆ‘˜‘¯‘˘‘˙‘˚‘¸‘˝‘˛’°’¢’£’§’•’¶’ß’®’©’™’´’¨’≠’Æ’Ø’∞’±’≤’≥’¥’µ’∂’∑’∏’π’∫’ª’º’Ω’æ’ø’¿’¡’¬’√’ƒ’≈’∆’«’»’…’ ’À’Ã’Õ’Œ’œ’–’—’“’”’‘’’’÷’◊’ÿ’Ÿ’⁄’€’‹’›’ﬁ’ﬂ’‡’·’‚’„’‰’Â’Ê’Á’Ë’È’Í’Î’Ï’Ì’Ó’Ô’’Ò’Ú’Û’Ù’ı’ˆ’˜’¯’˘’˙’˚’¸’˝’˛÷°÷¢÷£÷§÷•÷¶÷ß÷®÷©÷™÷´÷¨÷≠÷Æ÷Ø÷∞÷±÷≤÷≥÷¥÷µ÷∂÷∑÷∏÷π÷∫÷ª÷º÷Ω÷æ÷ø÷¿÷¡÷¬÷√÷ƒ÷≈÷∆÷«÷»÷…÷ ÷À÷Ã÷Õ÷Œ÷œ÷–÷—÷“÷”÷‘÷’÷÷÷◊÷ÿ÷Ÿ÷⁄÷€÷‹÷›÷ﬁ÷ﬂ÷‡÷·÷‚÷„÷‰÷Â÷Ê÷Á÷Ë÷È÷Í÷Î÷Ï÷Ì÷Ó÷Ô÷÷Ò÷Ú÷Û÷Ù÷ı÷ˆ÷˜÷¯÷˘÷˙÷˚÷¸÷˝÷˛◊°◊¢◊£◊§◊•◊¶◊ß◊®◊©◊™◊´◊¨◊≠◊Æ◊Ø◊∞◊±◊≤◊≥◊¥◊µ◊∂◊∑◊∏◊π◊∫◊ª◊º◊Ω◊æ◊ø◊¿◊¡◊¬◊√◊ƒ◊≈◊∆◊«◊»◊…◊ ◊À◊Ã◊Õ◊Œ◊œ◊–◊—◊“◊”◊‘◊’◊÷◊◊◊ÿ◊Ÿ◊⁄◊€◊‹◊›◊ﬁ◊ﬂ◊‡◊·◊‚◊„◊‰◊Â◊Ê◊Á◊Ë◊È◊Í◊Î◊Ï◊Ì◊Ó◊Ô◊◊Ò◊Ú◊Û◊Ù◊ı◊ˆ◊˜◊¯◊˘";
var charBHStr = "“ª““∂°∆ﬂƒÀæ≈¡À∂˛»À∂˘»Î∞Àº∏µ∂µÛ¡¶ Æ≤∑≥ß”÷ÕÚ’…»˝…œœ¬∏ˆ—æÕËæ√√¥“Â∆Ú“≤œ∞œÁ”⁄ø˜Õˆ“⁄∑≤»–…◊«ßŒ¿≤Êø⁄Õ¡ øœ¶¥Û≈Æ◊”¥Á–° ¨…Ω¥®π§º∫“—À»ΩÌ∏…π„π≠≤≈√≈∑…¬Ì≤ª”Î≥Û◊®÷–∑·µ§Œ™÷ÆŒ⁄ È”Ë‘∆ª•ŒÂæÆø∫ ≤» Ωˆ∆Õ≥ΩÒΩÈ»‘¥”¬ÿ≤÷‘ ‘™π´¡˘ƒ⁄∏‘»ﬂ∑Ô–◊∑÷«–»∞∞Ïπ¥Œ‘»ªØ∆•«¯…˝ŒÁ±Â∂ÚÃ¸¿˙º∞”—À´∑¥»…ÃÏÃ´∑Úø◊…Ÿ”»“¸≥ﬂÕÕ∞Õ±“ª√ø™“˝–ƒ“‰∏Íªß ÷‘˙÷ßŒƒ∂∑ΩÔ∑ΩŒﬁ»’‘ª‘¬ƒæ«∑÷π¥ıŒ„±»√´ œ∆¯ÀÆª◊¶∏∏∆¨—¿≈£»ÆÕıÕﬂ“’º˚º∆∂©∏º»œº•±¥≥µµÀ≥§∂”Œ§∑Á«“ ¿«±˚“µ¥‘∂´Àø÷˜’ß∫ı∑¶¿÷◊– ÀÀ˚’Ã∏∂œ…«™¥˙¡Ó“‘“«√«–÷¿º»Ω≤·–¥∂¨∑ÎÕπ∞º≥ˆª˜øØπ¶º”ŒÒ∞¸¥“±±‘—ª‹∞Î’ºø®¬¨√Æ¿˜»•∑¢π≈æ‰¡Ì÷ªΩ–’Ÿ∞»∂£ø…Ã® ∑”““∂∫≈ÀæÃæµ«ÙÀƒ •¥¶Õ‚—Î∫ª ßÕ∑≈´ƒÃ‘–ƒ˛À¸∂‘∂˚ƒ·◊Û«…æﬁ –≤ºÀß∆Ω”◊∏•∫ÎπÈ±ÿŒÏ∆À∞«¥Ú»”≥‚µ©æ…Œ¥ƒ©±æ‘˝ ı’˝ƒ∏√Ò”¿Õ°÷≠ª„∫∫√∑∏–˛”Òπœ∏ …˙”√À¶ÃÔ”…º◊…ÍµÁ∞◊∆§√Ûƒø√¨ ∏ Ø æ¿Ò∫Ã—®¡¢æ¿∞¨Ω⁄Ã÷»√∆˝—µ“È—∂º«‘˛±ﬂ¡……¡º¢‘¶ƒÒ¡˙∂™∆π≈“««¬Ú’˘—«Ωª∫•“‡≤˙—ˆ÷Ÿº˛º€»Œ∑›∑¬∆Û“¡ŒÈºø∑¸∑•–›÷⁄”≈ªÔª·…°Œ∞¥´…À¬◊Œ±≥‰’◊œ»π‚»´π≤πÿ–À‘Ÿæ¸≈©±˘≥Âæˆ–ÃªÆ¡–¡ı‘Ú∏’¥¥¡”∂Ø–ŸΩ≥øÔª™–≠”°Œ£—π—·”ı≥‘∏˜∫œº™µıÕ¨√˚∫Û¿ÙÕ¬œÚœ≈¬¿¬ªÿ“ÚÕ≈‘⁄πÁµÿ≥°ª¯◊≥∂‡“ƒø‰º–∂·ºÈÀ˝∫√»ÁÕ˝◊±∏æ¬Ë◊÷¥ÊÀÔ’¨”Ó ÿ∞≤À¬—∞µºº‚≥æ“¢æ°“Ÿ”ÏÀÍ∆Ò÷›—≤πÆ∑´ ¶ƒÍ≤¢◊Ø«Ï—”Õ¢“Ï Ω≥⁄µ±√¶–Á ˘»÷œ∑≥…Õ–ø∏ø€«§÷¥¿©…®—Ô ’÷º‘Á—Æ–Ò«˙“∑”–÷Ï∆”∂‰ª˙–‡…±‘”»®¥Œª∂¥ÀÀ¿±œƒ œ´…«∫π—¥»ÍΩ≠≥ÿŒ€Ã¿º≥µ∆ª““Øƒ≤∞Ÿ∆Ó÷Ò√◊∫ÏœÀ‘ºº∂ºÕ»“Õ¯—Ú”¿œøº∂¯∂˙»‚¿ﬂº°≥º◊‘÷¡æ …‡÷€…´”Û…÷√¢÷•≥Ê—™––“¬Œ˜π€Ω≤ª‰—»–Ì∂Ô¬€Àœ∑Ì…Ë∑√æ˜’Í∏∫πÏ¥Ô«®”ÿ∆˘—∏π˝¬ı–œƒ«∞Ó–∞±’Œ ¥≥»Ó∑¿—Ù“ı’ÛΩ◊“≥Õ‘—±≥€∆Î¡Ω—œ¥Æ¿ˆ¬“∫‡ƒ∂≤Æπ¿∞È¡Ê…ÏÀ≈À∆µËµ´ŒªµÕ◊°◊Ù””ÃÂ∫Œ”‡∑◊˜ƒ„”∂øÀ√‚∂“±¯øˆ“±¿‰∂≥≥ı…æ≈–≈Ÿ¿˚±÷˙≈¨ΩŸ¿¯æ¢¿Õœª“Ω¬±º¥»¥¬—œÿæ˝¡ﬂÕÃ“˜∑Õ∑Ò∞…∂÷∑‘∫¨Ã˝ø‘À±∆Ù÷®Œ‚≥≥Œ¸¥µŒ«∫Œ·—Ω¥Ù≥ ∏Êƒ≈≈ª‘±«∫Œÿ∂⁄‘∞¿ß¥—Œß÷∑æ˘∑ªÃÆø≤ªµ◊¯ø”øÈº·Ã≥∞”ŒÎ∑ÿ◊π…˘ø«»—∂ ºÀ—˝√ÓÕ◊∑¡◊Œ–¢ÀŒÕÍ∫Í ŸŒ≤ƒÚæ÷∆®≤„≤Ì∏⁄µ∫œ£’ ±”¥≤–Ú¬Æø‚”¶∆˙≈™µ‹’≈–ŒÕÆ“€≥πº…»Ã÷æÕ¸”«øÏ≥¿–√ª≥Œ“Ω‰≈§∞Á≥∂»≈∞‚∑ˆ≈˙∂Û’“ºº≥≠æÒ∞—“÷ „◊•Õ∂∂∂øπ’€∏ß≈◊øŸ¬’«¿ª§±®æ‹ƒ‚∏ƒπ•∫µ ±øı∏¸∏À…º¿Ó–”≤ƒ¥Â’»∂≈ ¯∏‹Ãı¿¥—Óº´≤Ωºﬂ√ø«ÛπØÕÙÃ≠–⁄∆˚∑⁄«ﬂ“ Œ÷…Ú≥¡∆„…≥≈Êπµ√ª≈Ω¡§¬Ÿ≤◊ª¶∑∫¡È‘Óæƒ◊∆‘÷≤”ƒµ¿Œ◊¥”ÃøÒµ“±∑æ¡¬Í∏¶ƒ–µÈ¡∆‘Ì∂¢“”…Á–„ÀΩÕ∫æø«ÓœµŒ≥¥ø…¥∏Ÿƒ…◊›¬⁄∑◊÷ΩŒ∆∑ƒ≈¶∫±«º–§÷‚∂«∏ÿ∏Œ≥¶¡ºŒﬂΩÊ¬´∑“∞≈–æª®∑º«€—øŒ≠≤‘À’≤πΩ«—‘÷§∆¿◊Á ∂’©Àﬂ’Ô÷ﬂ¥ “Îπ»∂ππ±≤∆≥‡◊ﬂ◊„…Ì–˘–¡≥Ω”≠‘ÀΩ¸∑µªπ’‚Ω¯‘∂Œ•¡¨≥Ÿ“ÿ” ∫™«Ò…€◊ﬁ¡⁄”œ¿Ô’Î∂§»Úœ–º‰√∆◊Ë∞¢Õ”∏Ωº ¬Ω¬§≥¬»Õ∑π“˚«˝≤µ¬øº¶¬ÛπÍ…•π‘»È ¬–©œÌæ©≈Â¿–—∞€º— π÷∂≥ﬁ¿˝ Ã∂±π©“¿œ¿¬¬Ωƒ’Ï≤‡«»øÎÕ√∆‰æﬂµ‰æª∆æø≠∫ØπŒµΩ÷∆À¢»Ø…≤¥ÃøÃπÙ∂Áº¡ ∆±∞◊‰◊øµ•¬ÙŒ‘æÌ≤ﬁ»˛≤Œ Â»°ƒÿ÷‹Œ∂∫«≈ﬁ…Î∫Ù√¸æ◊≈ÿ’¶∫ÕæÃ”Ω∏¿÷‰πæøß¡¸∞•πÃπ˙Õº∆¬¿§Ãπ∆∫≈˜ø¿¥π¿¨¬¢±∏“π—Ÿ∆ÊƒŒ∑Ó∑‹±ºƒ›√√∆ﬁƒ∑ ºΩ„π√–’ŒØ√œºæπ¬—ß◊⁄πŸ÷Ê∂®Õ“À±¶ µ≥Ë…Û…–æ”«¸ÃÎΩÏ—“¡Î‘¿∞∂ø˘Œ◊≈¡Ã˚¡±÷„≤Ø÷ƒ–“µ◊µÍ√Ì∏˝∏Æ≈”∑œΩ®√÷œ“ª°¬º±ÀÕ˘’˜æ∂÷“ƒÓ∫ˆ∑ﬁÃ¨ÀÀ’˙≈¬≤¿¡Ø–‘π÷«”ªÚ∑øÀ˘≥–≈Í≈˚Ãß±ßµ÷ƒ®—∫≥È√Ú∑˜÷Ùµ£≤ƒ¥ƒÈ¿≠∞Ë≈ƒ¡‡π’Õÿ∞ŒÕœæ–◊æ’–¬£º”µ¿π≈°≤¶‘Ò∑≈∏´’∂Õ˙∞∫¿•≤˝√˜ªË“◊ŒÙ≈Û∑˛∫º±≠Ω‹À…∞ÂππÕ˜Œˆ’Ì¡÷√∂π˚÷¶ ‡‘Ê«π∑„πÒ–¿≈∑Œ‰∆Á≈π√•∑’ƒ≠æ⁄∫”∑–”Õ÷Œ’”π¡’¥—ÿ–π«ˆ≤¥√⁄∑®≈¢≈›≤®∆¸ƒ‡◊¢¿·”æ–∫∆√‘Û«≥¬Ø¥∂—◊≥¥»≤øª÷ÀæÊ≈¿∞÷∞Êƒ¡ŒÔ∫¸π∑æ—ƒ¸ÕÊ√µª∑œ÷ŒÕª≠≥©∏ÌæŒ≈±—Òµƒ”€√§÷±÷™Œ˘∑ØøÛ¬Î∆Ì∏—±¸ø’œﬂ¡∑◊È…œ∏÷Ø÷’∞Ì…‹“Ôæ≠¬ﬁ’ﬂ“ÆÀ‡π…÷´∑Ù∑ ºÁ∑æ∞πøœ”˝∑Œ…ˆ÷◊’Õ–≤…·ºË‘∑Ã¶√Áø¡∞˙π∂»Ùø‡…ª±Ω”¢∆ª◊¬√Ø∑∂«—√©æ•ª¢¬≤ ≠±Ì…¿≥ƒπÊ√Ÿ ” ‘ ´≥œ÷Ôª∞µÆπÓ—Ø“Ë∏√œÍ≤Ô‘œÕ∞‹’Àªı÷ ∑∑Ã∞∆∂±·π∫÷¸π·◊™¬÷»Ì∫‰Ãˆµœ∆»µ¸ ˆ”ÙΩº¿…÷£≤…Ω«•∑∞µˆ’¢ƒ÷∏∑¬™ƒ∞Ωµœﬁ…¬¡•”Í«‡∑«∂•«ÍΩ§ Œ±•À« ªæ‘◊§Õ’º›”„√˘≥›¡ŸæŸÕ§¡¡«◊ŒÍ∫Ó«÷±„¥Ÿ∂Ìø°«Œ¿˛À◊∑˝±£”·–≈¡©ºÛ–ﬁ◊»—¯√∞π⁄ÃÍœ˜«∞π–Ω£≤™”¬√„—´ƒœ–∂¿Â∫Ò ‹±‰–≈—◊…“ßø©‘€ø»œÃ— ∞ß∆∑∫Â∂ﬂÕ€π˛‘’œÏ—∆ª©”¥ƒƒ–Õ¿›∂‚π∏‘´ø—µÊøÂ≥«∏¥ø¸◊‡∆ıΩ±“¶Ω™¿—“Ã“ˆ◊ÀÕ˛Õﬁ¬¶Ωøƒ»∫¢¬œøÕ–˚ “ª¬œ‹π¨∑‚Ω´≥¢Œ› ∫∆¡÷≈œø¬Õ≤ÓœÔµ€¥¯÷°∞Ô”ƒ∂»Õ•Õ‰—Â±Î¥˝∫‹ª≤¬…‘ı≈≠Àºµ°º±‘π◊‹ —ª–∫„ª÷–Ù∫ﬁ∂≤ÃÒƒ’’Ω±‚∞›¿® √’¸π∞À©øΩ∆¥◊ß ∞≥÷π“÷∏∞¥øÊÃÙÕ⁄ŒŒÃ¢–Æƒ”µ≤’ıº∑ª”≈≤Õ¶’˛π  ©º»–«”≥¥∫√¡◊Ú’— «÷Áœ‘ø›º‹ºœ±˙∞ÿƒ≥∏Ã∆‚»æ»·◊ıƒ˚≤ÈºÌø¬÷˘¡¯ ¡’§±Í’ª∂∞¿∏ ˜Õ·—Í¥˘≤–∂Œ∂æ±—≈˛’±∑˙«‚»™±√Ω‡—Û»˜œ¥¬Â∂¥ΩÚ∫È∂˝÷ﬁªÓÕ›«¢≈…ΩΩ◊«≤‚º√ªÎ≈®œ—Ãø≈⁄æº±˛’®µ„¡∂≥„À∏¿√Ã˛…¸«£∫›Ω∆∂¿œ¡ ®’¯”¸¡·≤£…∫’‰∑©…ı±¬ΩÁŒ∑∞ÃΩÍ“ﬂ¥Ø∑ËπÔΩ‘ª ÷—≈Ë”Øœ‡≈Œ∂‹ °√ºø¥’£æÿ…∞∆ˆø≥≈¯—–◊©—‚◊Ê◊£…Ò”Ì«Ô÷÷ø∆√Î¥©Õª«‘ ˙∏Õ¿‡◊—∞Û»ﬁΩ·»∆ªÊ∏¯—§¬Áæ¯Ω Õ≥∏◊∑£√¿À£ƒÕŒ∏µ®±≥Ã•≈÷≈ﬂ §∞˚∫˙¬ˆºÎ¥ƒ√£≤Á“≤Ë»◊»„æ£≤›ºˆªƒ¿Ûº‘µ¥»ŸªÁ”´“Ò“©≈∞∫ÁÀ‰œ∫ ¥“œ¬Ï‘È—‹∞¿“™¿¿æıΩÎŒ‹”ÔŒÛ”’ªÂÀµÀ–∑°º˙Ã˘πÛ¥˚√≥∑—∫ÿ∏∞’‘≈ø÷·«·√‘±≈º£◊∑ÕÀÀÕ  Ã”ƒÊ—°—∑∫¬ø§‘««ı÷ÿ∏∆∂€≥Æ÷”ƒ∆±µ∏÷‘ø«’æ˚ŒŸπ≥≈•πÎŒ≈√ˆ∑ß∏Û∫“±›∂∏‘∫≥˝‘…œ’√Ê∏Ôæ¬“ÙœÓÀ≥–Î ≥∂¸»ƒΩ»±˝ ◊œ„¬ÓΩæ¬Ê∫ßπ«πÌ≈∏—ª≥À∏©æ„∞≥±∂µπæÛÃ»∫Ú“–ΩË≥´æÎƒﬂ’Æ÷µ«„Ω°µ≥ºÊ‘©∆‡◊º¡πµÚ¡ËÃﬁ∆ ∞˛æÁ∑Àƒ‰«‰‘≠∏Á≈∂…⁄¡®øﬁœ¯’‹≤∏∫ﬂ—‰ÀÙ¥Ω∞¶Ã∆ªΩ∞°∆‘‘≤π°∞£¬Ò∆“∫¯œƒÃ◊ºßƒÔæÍ…Ô∂√‰”È‘◊∫¶—Áœ¸º“»›øÌ±ˆ…‰–º’π∂Î”¯«Õ∑Âæ˛œØ◊˘»ı–ÏÕΩ¡µø÷À°∂˜πßœ¢ø“∂Ò«ƒ∫∑ª⁄ŒÚ‘√√ı…»»≠ƒ√÷ø¬Œ∞§¥Ï’ÒÕÏŒÊÕ±¿¶◊Ω∞∆∫¥…”ƒÛæË≤∂¿ÃÀºÒªªµ∑–ßµ–∞Ω’´¡œ≈‘¬√ªŒΩ˙…Œ…πœ˛‘ŒÕÌÀ∑¿ ≤ÒÀ®∆‹¿ı–£÷Í—˘∫À∏˘∏Ò‘‘πÃ“Œ¶øÚ∞∏◊¿Õ©…£ª∏Ω€µµ«≈Ω∞◊Æ∞…“Œ‡¿Ê—≥ ‚“Û±–∫§—ı∞±Ã©¡˜Ω¨’„ø£∆÷∫∆¿À∏°‘°∫£Ω˛Õøƒ˘œ˚…Ê”øÃÈÃŒ¿‘¡∞Œ–ª¡µ”»ÛΩß’«…¨¡“∫Ê¿”÷Ú—Ãøæ∑≥…’ª‚ÃÃΩ˝»»∞Æµ˘ÃÿŒ˛¿Í¿«÷È∞‡∆ø¥…≈œ¡Ù–Û∆£’ÓÃ€æ“º≤≤°÷¢”∏æ∑∏ﬁ÷Â“Ê∞ª’µ—Œº‡’Ê√ﬂ—£’Ë≈È∆∆…È‘“¿˘¥°ÀÓœÈ¿Î√ÿ◊‚≥”«ÿ—Ì÷»ª˝≥∆’≠«œ’ææ∫∞ ÀÒ–¶± ∑€Œ…ÀÿÀ˜ΩÙæÓ–ÂÀÁÃ–ºÃ»±∞’∏·–ﬂŒÃ≥·∏˚∫ƒ‘≈∞“À ≥‹µ¢π¢ƒÙøË“»∏ÏΩ∫–ÿ∞∑ƒ‹÷¨¥‡ºπ‘‡∆Íƒ‘≈ß≥Ù÷¬“®∫Ω∞„Ω¢≤’—ﬁ∫…∆Œ¿Ú…Øƒ™¿≥¡´ªÒ”®√ß¬«Œ√∞ˆ≤œ—¡À•÷‘‘¨≈€Ãª–‰Õ‡±ª«Î÷Ó≈µ∂¡∑ÃøŒÀ≠µ˜¡¬◊ªÃ∏“Í±™≤Ú‘Ùº÷ªﬂ¡ﬁ¬∏‘ﬂ◊ ∏œ∆π™‘ÿΩŒΩœ»ËÕ∏÷µ›Õæ∂∫Õ®π‰ ≈≥—ÀŸ‘Ï∑Í≤øπ˘≥ªµ¶∂º◊√≈‰æ∆∏™«Æ«Ø≤ß◊Íºÿ”ÀÃ˙≤¨¡Â«¶√≠‘ƒ≈„¡ÍÃ’œ›ƒ—ÕÁπÀ∂Ÿ∞‰ÀÃ‘§∂ˆƒŸ≥“—Èø•∏ﬂ—º—Ï‘ßÕ“«¨ºŸ∆´◊ˆÕ£≈ºÕµ≥•ø˛∂µ ﬁ√·ºı¥’ªÀºÙ∏±¿’ø±≥◊œ·æ«ª£ €Œ®≥™ÕŸø–◊ƒ…Ã∑»∆°…∂¿≤≈æƒˆ–•»¶”Ú≤∫≈‡ª˘Ã√∂—«µ∂È∂¬πª…›»¢∆≈ÕÒªÈ¿∑”§…Ù ÎÀﬁº≈ºƒ“˙√‹ø‹ŒæÕ¿≥Á∆È¥ﬁ—¬±¿’∏≥≤≥£ ¸øµ”π¿»µØ≤ ±Úµ√≈«”¡œ§”∆ªºƒ˙–¸º¬µø«Èæ™ÕÔÃËœßŒ©µÎæÂ≤“≤—µ¨πﬂ∆›≈ıæ›¥∑Ω›ƒÌœ∆µ‡∂ﬁ ⁄µÙÃÕ∆˛≈≈“¥æÚ¬”ÃΩΩ”øÿÕ∆—⁄¥Î¬∞÷¿µß≤Ù√Ùæ»ΩÃ¡≤±÷∏“–±∂œ–˝◊ÂŒÓªﬁ≥ø≤‹¬¸Õ˚Õ∞¡∫√∑π£√ŒÀÛÃ›–µ ·ºÏ”˚∫¡∏¢—ƒ“∫∫≠∫‘µÌ◊Õœ˝¡‹Ã  Áƒ◊Ã‘µ≠”Ÿ“˘¥„ª¥…Ó¥æªÏ—ÕÃÌ«Â‘®◊’Ω•”Ê…¯«˛œ©ÕÈ≈Î∑È—…∫∏ª¿À¨¿Á¡‘≤˛√Õ≤¬÷Ì√®¬ «Ú¿≈¿Ì¡ÀˆÃ¬‘∆Ë¥√»¨—˜÷Ã∫€∞®∫–ø¯∏«µ¡≈Ã ¢√–øÙæÏÃ˜—€◊≈’ˆΩ√πËŒ¯À∂∆±º¿µªªˆΩ’“∆ª‡“§÷œæπ’¬µ—∑˚±øµ⁄º„¡˝¡£∆…¥÷’≥¿€º®–˜–¯¥¬…˛Œ¨√‡±¡≥Ò◊€’¿¬Ã◊∫¡Á“Ó¡ƒ¡˚÷∞≤±Ω≈∏¨Õ—¡≥∂Ê≤∞œœ¥¨πΩæ’æ˙∫ ≤À≤§∆–¡‚∑∆Ã—√»∆ºŒÆ¬‹”©”™œÙ»¯÷¯–È÷˚«˘…ﬂπ∆µ∞–∆œŒ¥¸œÆ∏§ƒ±µ˝ª—–≥ŒΩ≤˜—Ë√’œÛ…ﬁ…‚÷∫‘ææ‡«˚∏®¡æ¥˛“›¬ﬂ∂ı–Ô∑”‘ÕÃ™“∞Õ≠¬¡’°œ≥∏ı√˙Ω¬“ø≤˘“¯—À—÷≤˚”Á¬°ÀÂÀÊ“˛»∏—©¬≠¡Ï∆ƒæ±œ⁄π›∆Ô∏Î∫Ë¬π¬Èª∆π®∏µ¿¸∞¯¥ˆ¥¢∞¡‘‰ £∏Óƒº≤©œ√≥¯Ã‰ø¶Œπ…∆¿Æ∫Ì∫∞¥≠œ≤∫»–˙‘˚≈Á”˜±§µÃø∞—ﬂÀ˛“ºµÏ∞¬–ˆ√Ω√ƒ…©∏ª√¬∫Æ‘¢◊æÕ Ù¬≈«∂√±√›∑˘«ø≈Ì”˘—≠±ØªÛª›≥Õ±π∂ËªÃ»«– ”‰∑ﬂ¿¢ª≈øÆ’∆≥∏»‡◊·√ËÃ·≤Â“æŒ’¥ßø´ææΩ“‘Æ¿ø≤Û∏È¬ßΩ¡¥Í…¶À—¥Ó≤Î≥®…¢∂ÿæ¥±Û∞ﬂÀπ∆’æ∞Œ˙«Áæß÷«¡¿‘› Ó‘¯ÃÊ◊Ó≥Ø∆⁄√ﬁ∆Âπ˜∞Ù◊ÿº¨≈ÔÃƒ…≠¿‚ø√π◊“Œ÷≤◊µΩ∑Õ÷“¨¿∆∆€øÓ÷≥Ã∫µ™¬»«Ë”Â∂…‘¸≤≥Œ¬Œº∏€ø ”Œ√Ï≈»Õƒ∫˛œÊ’øÕÂ ™¿£Ω¶∏»≥¸◊Ãª¨÷Õ±∫∑ŸΩπ—Ê»ª÷Û≈∆œ¨∂ø–…∫Ôª´◊¡¡’«Ÿ≈˝≈√«Ì…˚∑¨≥Î Ë∂ªÕ¥∆¶¡°ªæµ«ÕÓ∂Ãœı¡Ú”≤»∑ºÔ¬ª«›œ°≥Ã…‘À∞Ω—¥∞æΩ¥‹Œ—ø¢ÕØµ»ΩÓ∑§ø÷˛Õ≤¥≤ﬂ…∏À⁄‘¡÷‡∑‡◊œ–ıºÍ√Â¿¬º©∂–ª∫µﬁ¬∆±‡‘µœ€œË«Ã¡™∆¢ÃÛ¿∞“∏∏≠«ªÕÛ ÊÀ¥Õß¬‰∏∆œ∂≠∫˘‘·¥–ø˚µŸΩØª◊Õ‹÷Î∏Ú¬˘’›——Ω÷≤√¡—◊∞‘£»πø„–ª“•∞˘«´∏≥∂ƒ Í…Õ¥Õ≈‚≥√≥¨‘Ω«˜∞œµ¯≈‹º˘±≤ª‘πıπº±∆”‚∂›ÀÏ”ˆ±È∂Ùµ¿“≈∫®À÷”‘ Õ¡ø÷˝∆Ã¡¥œ˙À¯≥˙π¯–‚∑Ê–ø»ÒÃ‡¿ª¿´∏Ù∞Øœ∂—„–€—≈ºØπÕ∫´º’¿°≤ˆ∆≠…ß¬≥æÈ∂Ï Ú∫⁄∂¶¥ﬂ…µœÒΩÀ«⁄µ˛–·…§ »ŒÀÀ√À˙À‹Ã¡»˚ÃÓƒπœ±ºﬁºµœ”«ﬁƒØªœƒª¡Æ¿™Œ¢œÎ≥Ó”˙“‚”ﬁ∏–¥»…˜…Â≤´¥§∏„Ã¬∞·–Ø…„∞⁄“°±˜ÃØ√˛ ˝’Â–¬œæ≈Ø∞µ¥™¥ª–®≥˛¿„ø¨¬•∏≈”‹ª±–™∏ËµÓªŸ‘¥¡Ô“Áœ™À›»‹ƒÁµ·◊“Ãœπˆ¬˙¬À¿ƒ¬–±ıÃ≤¿ÏƒÆªÕºÂ…∑√∫’’œ◊‘≥∫˜»…™πÂ’Áª˚Ãµ≥’±‘¥·√Àæ¶ÀØ∂Ωƒ¿Ωﬁ≤«∂√√È∞´≈µÔ¬µ∞≠ÀÈ±ÆÕÎµ‚≈ˆΩ˚∏£∞ﬁ÷…≥Ìøﬂø˙øÍ≥Ô«©ºÚ¡∏¡ªæ¨∏ø∑Ï≤¯’÷◊Ô÷√ »∫∆∏“ﬁÀ¡–»»˘—¸∏πœŸƒÂÃ⁄Õ»æÀ√…À‚∆—’Ù–Ó»ÿÀÚ±Õ¿∂ºª≈Ó”›”º∂Í∑‰Õ…Œœ—√“·¬„π”Ω‚¥•’≤”˛Ã‹Ω˜√°√˝ªø∫—¿µ∏˙øÁπÚ¬∑Ã¯∂Â∂„∑¯º≠ ‰¥«±Ÿ«≤“£±…¿“≥ÍÕ™Ω¥º¯’‡¥Ì√™Œ˝¬‡¥∏◊∂Ωıœ«∂ßº¸æ‚√Ã’œ”∫≥˚¡„¿◊±¢ŒÌæ∏Ω˘—•∞–‘œ“√∆µÕ«”±¡Ûø˝ªÍ±´»µ≈Ùπƒ Û¡‰¡≈…ÆÀ€æ§µ À‘ºŒ∏¬–Í¬Ôæ≥ ˚… «Ωµ’ƒ€∑ı≤Ïπ—¡»’Ø¡Œ±◊’√‘∏ƒΩ¬˝ø∂ΩÿÀ§’™¥›ƒ°¡Ã∆≤«√Œ”∆Ï∞Ò’•¡Ò»∂º˜ƒ£«∏µŒ∆Ø∆·¬©—›¬˛ ˛’ƒ—˙Œ´…øœ®–‹—¨»€Œı∞æ—˛¡ß“…Œ¡ ›¥Ò≥Úµ˙±ÃºÓÃº≤Í¥≈¥ËŒ»Ωﬂ∂Àπø≤≠ª˛À„π‹¬·¥‚æ´”ßÀıµ‘¥‰æ€’ÿ∏Ø∞Ú≤≤∏‡ƒ§”ﬂÃÚŒË√Ô¬˚’·Œµ≤ÃƒË«æ∞™±Œ Ò÷©√€¿Ø”¨≤ı…—≈·π¸∫÷Õ  ƒÃ∑¿æ∆◊∫¿√≤◊∏◊¨»¸∫’”ª≥Ï‘ØœΩ’∑¿±‘‚’⁄ΩÕ√∏ø·À·ƒ«¬∂Õ∂∆√æÀÌ¥∆–Ëæ≤…ÿø≈¬¯¬‚∆«œ ±«Ω©∆ß¡›≈¸÷ˆ≥∞ÀªŒ˚∫Ÿ“≠∏¡‘ˆ–Êƒ´∂’¬ƒ¥±”∞µ¬ª€Œø±Ô‘˜∫©∂Æ¬æƒ¶æÔ≥≈»ˆÀ∫◊≤≥∑¡√«À≤•¥È◊´ƒÏ«‹∑Ûƒ∫±©≤€∑Æ’¡∫·”£œ“„≈À«±¡ Ã∂≥±≥Œ≥∫≈Ï¿Ω∞ƒ Ï¡ˆ±ÒÃ±œπ¬˜ƒÎ∞ı¿⁄≈Õøƒµæº⁄ª¸∏Âº˝œ‰◊≠∆™¬®∫˝……¥œ±ÏÃ≈œ•À“ ﬂΩ∂»Ô‘Ã–´ª»∫˚µ˚∞˝»Ï«¥Õ„‘•ÃÀ»§Ã§æ·Ãﬂ≤»◊ŸÃ…◊Ò¥º◊Ì¥◊’Úƒ˜ƒ¯∏‰∞˜œˆ’√πøø–¨∞∞Ã‚—’∂Ó∆Æ∫°¿∫◊¿Ë»ÂºΩƒ˝◊Ï∆˜‘Î …±⁄∫∂–∏∞√¿¡∫≥¿ﬁ…√≤Ÿ«ÊÀ”’˚«¡≥»≥˜¬∫‘Ëº§±Ù»º¡«—‡Ã°∆∞’Œ»≥∆≥ƒ•ª«ƒ¬¡˛∏›¥€¿∫¿È≈Ò∏‚Ã«≤⁄Ω…∫≤∞ø≈’≈Ú…≈’È¿Ÿ±°—¶–Ω Ì»⁄√¯∫‚‘ﬁ‘˘Ã„’ﬁ±Ê±Á±‹—˚–—√—»©æµµÒªÙƒﬁ¡ÿµÂ« µﬂ≤Õæ®«≠ƒ¨¿‹∫øÃÁ∫æ»Êª’≈≥¥˜≤¡ ÔÃ¥œ≠√ ‘ÔæÙ∞©«∆÷ıµ…À≤Õ´¡◊Ω∏ÀÎ¥ÿª…√”‘„ø∑∑±“ÌÕŒ±€”∑“‹ΩÂ≤ÿ√Í¬›œÂªÌ…ƒ”Æµ∏Ã£±Ë¡ÕÀ™œºæœ÷ËŒ∫»˙»£œ˘“Õ¥¡∆Ÿ’∞∑≠≈∫ÃŸ∑™ΩÛ∏≤±ƒ≥˘¿ÿ¡≠±ﬁ◊◊”•ƒı≈ ‘‹∆ÿ±¨∞ÍΩÆ—¢≤æ∏˛‘Âƒ¢–∑æØµ≈≤‰∂◊¥⁄√“≤¸±Ó¬¥»¬Ω¿»¿Œ°»¡π‡ºÆ≈¥◊Î“´»‰∆©‘Íƒß¡€¥¿∏”¬∂∞‘≈˘ÀËƒ“»ø’∫œ‚æπﬁ»ß¥£";

function judge_CN(char1,char2,mode){
	var charSet=charMode?charPYStr:charBHStr;
	for(var n=0;n<(char1.length>char2.length?char1.length:char2.length);n++){
		if(char1.charAt(n)!=char2.charAt(n)){
			if(mode) return(charSet.indexOf(char1.charAt(n))>charSet.indexOf(char2.charAt(n))?1:-1);
			else	 return(charSet.indexOf(char1.charAt(n))<charSet.indexOf(char2.charAt(n))?1:-1);
			break;
		}
	}
	return(0);
}

function sort_tab(the_tab,col,mode){
	var tab_arr = new Array();
	var i;
	var start=new Date;
	for(i=1;i<the_tab.rows.length;i++){
		tab_arr.push(new Array(the_tab.rows[i].cells[col].innerText.toLowerCase(),the_tab.rows[i]));
	}
	function SortArr(mode) {
		return function (arr1, arr2){
			var flag;
			var a,b;
			a = arr1[0];
			b = arr2[0];
			if(/^(\+|-)?\d+($|\.\d+$)/.test(a)  &&  /^(\+|-)?\d+($|\.\d+$)/.test(b)){
				a=eval(a);
				b=eval(b);
				flag=mode?(a>b?1:(a<b?-1:0)):(a<b?1:(a>b?-1:0));
			}else{
				a=a.toString();
				b=b.toString();
				if(a.charCodeAt(0)>=19968  &&  b.charCodeAt(0)>=19968){
					flag = judge_CN(a,b,mode);
				}else{
					flag=mode?(a>b?1:(a<b?-1:0)):(a<b?1:(a>b?-1:0));
				}
			}
			return flag;
		};
	}
	tab_arr.sort(SortArr(mode));

	for(i=0;i<tab_arr.length;i++){
		the_tab.lastChild.appendChild(tab_arr[i][1]);
	}

	window.status = " (Time spent: " + (new Date - start) + "ms)";
	if (firstCol)
		tablesortevent()
}

function tablesortevent()
{
	select_all(document.all.allCheck.checked);	
}

function change_row(the_tab,line1,line2){
	the_tab.rows[line1].swapNode(the_tab.rows[line2])
}

function change_col(the_tab,line1,line2){
	for(var i=0;i<the_tab.rows.length;i++)
		the_tab.rows[i].cells[line1].swapNode(the_tab.rows[i].cells[line2]);
}



function add_row(the_table) {
	event.cancelBubble=true;
	clear_color();
  var PowerTableTbody=document.getElementById("PowerTableTbody");  
  var hiddenDataIdtr=document.getElementById("hiddenDataIdtr");
  var myNewNode=hiddenDataIdtr.cloneNode(true);    
  PowerTableTbody.appendChild(myNewNode);  
  var nRows = the_table.rows.length;
  var newRow= the_table.rows[nRows-1];
  newRow.cells[0].innerText=nRows-1;
  newRow.id = nRows-2;
  var sStr=/dxw/g;
  var thisRow;
  for (i=1;i<newRow.cells.length;i++){
  	var thisPut=newRow.cells[i].children;

  	  for (j=0;j<thisPut.length;j++){
  	  	thisRow=nRows-1;
  	  	//alert("thisRow="+thisRow);
  	   thisPut[j].id = thisPut[j].id.replace(sStr,thisRow);
     }
  	}
  document.frm("dataCount").value=nRows-1;
  read_def(the_table);
}

function del_row(the_table) {
	if(the_table.rows.length==2) return;
	var the_row;
	the_row = -1;
	the_table.deleteRow(the_row);
	cur_row = null;
	cur_cell=null;
	var nRows = the_table.rows.length;
	document.frm("dataCount").value=nRows-1;
	
}

function add_col(the_table) {
	event.cancelBubble=true;
	var the_col,i,the_cell;
	the_col = cur_col==null?-1:(cur_col+1);
	var the_title=prompt("Please input the title: ","Untitled");
	if(the_title==null)return;
	if(the_col!=-1  &&  the_col<=sort_col  &&  sort_col!=null)sort_col++;
	the_title=the_title==""?"Untitled":the_title
	clear_color();
	for(var i=0;i<the_table.rows.length;i++){
		the_cell=the_table.rows[i].insertCell(the_col);
		the_cell.innerText=i==0?the_title:("NewCol_" + the_cell.cellIndex);
	}
	read_def(the_table);
}

function del_col(the_table) {
	if(the_table.rows[0].cells.length==1) return;
	var the_col,the_cell;
	the_col = cur_col==null?(the_table.rows[0].cells.length-1):cur_col;
	if(the_col!=-1  &&  the_col<sort_col  &&  sort_col!=null)sort_col--;
	else if(the_col==sort_col)sort_col=null;
	for(var i=0;i<the_table.rows.length;i++) the_table.rows[i].deleteCell(the_col);
	cur_col = null;
	cur_cell=null;
}

function res_tab(the_table){
	the_table.outerHTML=Org_con;
	init();
}

function exp_tab(the_table){
	var the_content="";
	document.onclick();
	the_content=the_table.outerHTML;
	the_content=the_content.replace(/ style=\"[^\"]*\"/g,"");
	the_content=the_content.replace(/ mode=\"(false|true)"/g,"");
	the_content=the_content.replace(/ oBgc=\"[\w#\d]*\"/g,"");
	the_content=the_content.replace(/ oFc=\"[\w#\d]*\"/g,"");
	the_content=the_content.replace(/<DIV contentEditable=false>([^<]*)<\/DIV>/ig,"$1");
	the_content="<style>table{font-size: 9pt;word-break:break-all;cursor: default;BORDER: black 1px solid;background-color:#eeeecc;border-collapse:collapse;border-Color:#999999;align:center;}</style>\n"+the_content;
	var newwin=window.open("about:blank","_blank","");
	newwin.document.open();
	newwin.document.write(the_content);
	newwin.document.close();
	newwin=null;
}

///////////////////////////////zhuyaoming 20080514

var userAgent = navigator.userAgent.toLowerCase();
var is_opera = userAgent.indexOf('opera') != -1 && opera.version();
var is_moz = (navigator.product == 'Gecko') && userAgent.substr(userAgent.indexOf('firefox') + 8, 3);

var is_ie = (userAgent.indexOf('msie') != -1 && !is_opera) && userAgent.substr(userAgent.indexOf('msie') + 5, 3);


function LoadDialogWindow(URL, parent, loc_x, loc_y, width, height)
{
  if(is_ie)
     window.showModalDialog(URL,parent,"edge:raised;scroll:1;status:0;help:0;resizable:1;dialogWidth:"+width+"px;dialogHeight:"+height+"px;dialogTop:"+loc_y+"px;dialogLeft:"+loc_x+"px",true);
  else
     window.open(URL,parent,"height="+height+",width="+width+",status=0,toolbar=no,menubar=no,location=no,scrollbars=yes,top="+loc_y+",left="+loc_x+",resizable=yes,modal=yes,dependent=yes,dialog=yes,minimizable=no",true);
}

function SelectUserSingle(TO_ID, TO_NAME, MANAGE_FLAG, FORM_NAME)
{
  URL="/module/eauser_select_single?TO_ID="+TO_ID+"&TO_NAME="+TO_NAME+"&MANAGE_FLAG="+MANAGE_FLAG+"&FORM_NAME="+FORM_NAME;
  loc_y=loc_x=200;
  if(is_ie)
  {
     loc_x=document.body.scrollLeft+event.clientX-event.offsetX-100;
     loc_y=document.body.scrollTop+event.clientY-event.offsetY+170;
  }
  
  LoadDialogWindow(URL,self,loc_x, loc_y, 400, 350);
}


