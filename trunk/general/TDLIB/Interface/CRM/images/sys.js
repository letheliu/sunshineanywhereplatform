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
       alert("��"+name_array[i]+"������Ϊ�գ�");
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
        alert("��"+name_array[i-1]+"����Ӧ�����ݸ�ʽ����ȷ��");
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
//�޸�--����
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
      alert("��ѡ��һ�");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("ֻ��ѡ��һ�");
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
      alert("��ѡ��һ�");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("ֻ��ѡ��һ�");
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
      alert("ϵͳ���ò������޷��޸ģ�");
      return false;
   }
  }
   
   if(idStr=="")
   {
      alert("��ѡ��һ��༭��");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("ֻ��ѡ��һ��༭��");
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
      alert("��ѡ��һ��༭��");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("ֻ��ѡ��һ��༭��");
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
      alert("��ѡ��һ��༭��");
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
      alert("ϵͳ���ò������޷�ɾ����");
      return false;
   }
  }
   if(idStr=="")
   {
      alert("������ѡ��һ��ɾ����");
      return false;
   }

   if(!window.confirm("ȷ��ɾ����"))
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
	//alert("����");
	var idStr=parent.dept_main.frm.ID_STR.value;

	if (idStr==null){
		idStr="";
		}
  if (idStr=="") {
  	alert("��ѡ��Ҫɾ�������ݣ�");
  	return;
  	}
   frm.ID_STR.value=idStr;  
   frm.flag.value="deleteLevList";   
   frm.submit();
}

var theDefaultColor="#FFFFFF";//��ɫ
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
  	alert("����ȷ����λ");
  	return;
  	}
  }
  if (document.getElementById("CustomerId")!=null&&field!="CustomerId"){
  supplyId=document.frm("CustomerId").value;
   if (supplyId==null||supplyId==""){
  	alert("����ȷ����λ");
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
         var cust=BURSAR_ATTR.substring(0,1);//��λ
         custfield=field+"1";
         if (cust==1)
         {
         document.all(custfield).style.display="";
         }
         else
         {
         document.all(custfield).style.display="none";
         }

         var dept=BURSAR_ATTR.substring(1,2);//����
         deptfield=field+"2";
         if (dept==1)
         {
         document.all(deptfield).style.display="";
         }
         else
         {
         document.all(deptfield).style.display="none";
         }

         var empl=BURSAR_ATTR.substring(2,3);//��Ա
         emplfield=field+"3";
         if (empl==1)
         {
         document.all(emplfield).style.display="";
         }
         else
         {
         document.all(emplfield).style.display="none";
         }

         var class1=BURSAR_ATTR.substring(3,4);//ͳ��
         class1field=field+"4";
         if (class1==1)
         {
         document.all(class1field).style.display="";
         }
         else
         {
         document.all(class1field).style.display="none";
         }
         var class2=BURSAR_ATTR.substring(4,5);//��Ŀ
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
      alert("������ѡ��һ��鿴��ϸ��");
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
      alert("������ѡ��һ��鿴��ϸ��");
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
      alert("������ѡ��һ�");
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
      alert("������ѡ��һ�");
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
      alert("������ѡ��һ��鿴��ϸ��");
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
      alert("������ѡ��һ��鿴��ϸ��");
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
      alert("������ѡ��һ��鿴��ϸ��");
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
      alert("������ѡ��һ��鿴��");
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
      alert("������ѡ��һ������˻���");
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
      alert("��ѡ��һ����д�ӡ��");
      return false;
   }
   
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("ֻ��ѡ��һ����д�ӡ��");
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
      alert("������ѡ��һ��鿴��ϸ��");
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
      alert("������ѡ��һ��鿴��ϸ��");
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
      alert("��ѡ��һ�");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("ֻ��ѡ��һ�");
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
   if(!window.confirm("ȷ��������"))
      return false;

  URL="/app/module/code/workflow/receivestate/index.jsp?rowid="+idStr+"&ModuleId="+ModuleId+"&StateId="+StateId;
  }else  if (flagSate=="5"){
  if(!window.confirm("ȷ��ί����"))
      return false;
  URL="/app/module/code/workflow/changemanstate/index.jsp?rowid="+idStr+"&ModuleId="+ModuleId+"&StateId="+StateId;
  }else  if (flagSate=="6"){
  
  if(!window.confirm("ȷ��ת����"))
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
  alert("��������Ҫ��֤������");
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


function select_all(isCheck){  //ȫѡ
	var objs = document.getElementsByTagName("input");
	for(var i=0; i<objs.length; i++) {
		if(objs[i].type.toLowerCase() == "checkbox" ){
			objs[i].checked = isCheck;
		}
	}
}

function select_chanage(checkBox) {	//ѡ��ı�
	if(checkBox.checked){
		checkBox.checked = true;
		if(is_all_select()){
			document.all.allCheck.checked = true;
		}
	}else{
		document.all.allCheck.checked = false;
	}

}

function is_all_select() {  //�ж��Ƿ�ȫѡ
	var objs = document.getElementsByTagName("input");
	for(var i=0; i<objs.length; i++) {
		if(objs[i].type.toLowerCase() == "checkbox" && objs[i].name.toLowerCase != "allcheck" 
			 && objs[i].checked == false){
			return false;
		}
	}
	return true;
}

function getListOfChecked() {  //��ñ�ѡ�е���
	var objs = document.getElementsByTagName("input");
	var pickListAry = new Array();
	var count = 0;

	for (var i=0; i<objs.length; i++) {
		if(objs[i].type.toLowerCase() == "checkbox" 
				&& objs[i].name.toLowerCase() != "allcheck" && objs[i].checked == true){
			//alert(objs[i].name);
			pickListAry[count++] = objs[i].name.slice(9);  //9���ִ�"checkbox_"�ĳ���
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
      alert("������ѡ��һ��鿴��ϸ��");
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
      alert("ϵͳ���ò������޷�����������");
      return false;
   }
  }
   
   if(idStr=="")
   {
      alert("��ѡ��һ��༭��");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("ֻ��ѡ��һ��༭��");
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
      alert("ϵͳ���ò������޷��޸ģ�");
      return false;
   }
  }
   
   if(idStr=="")
   {
      alert("��ѡ��һ��༭��");
      return false;
   }
   if(idStr.indexOf(",") < idStr.length-1)
   {
      alert("ֻ��ѡ��һ��༭��");
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

var charPYStr = "�������������������������������������������������������������������°ðİŰưǰȰɰʰ˰̰ͰΰϰаѰҰӰ԰հְװذٰڰ۰ܰݰް߰������������������������������������������������������������������������������������������������������������±ñıűƱǱȱɱʱ˱̱ͱαϱбѱұӱԱձֱױرٱڱ۱ܱݱޱ߱������������������������������������������������������������������������������������������������������������²òĲŲƲǲȲɲʲ˲̲ͲβϲвѲҲӲԲղֲײزٲڲ۲ܲݲ޲߲������������������������������������������������������������������������������������������������������������³óĳųƳǳȳɳʳ˳̳ͳγϳгѳҳӳԳճֳ׳سٳڳ۳ܳݳ޳߳������������������������������������������������������������������������������������������������������������´ôĴŴƴǴȴɴʴ˴̴ʹδϴдѴҴӴԴմִ״شٴڴ۴ܴݴ޴ߴ������������������������������������������������������������������������������������������������������������µõĵŵƵǵȵɵʵ˵̵͵εϵеѵҵӵԵյֵ׵صٵڵ۵ܵݵ޵ߵ������������������������������������������������������������������������������������������������������������¶öĶŶƶǶȶɶʶ˶̶Ͷζ϶жѶҶӶԶնֶ׶ضٶڶ۶ܶݶ޶߶������������������������������������������������������������������������������������������������������������·÷ķŷƷǷȷɷʷ˷̷ͷηϷзѷҷӷԷշַ׷طٷڷ۷ܷݷ޷߷������������������������������������������������������������������������������������������������������������¸øĸŸƸǸȸɸʸ˸̸͸θϸиѸҸӸԸոָ׸ظٸڸ۸ܸݸ޸߸������������������������������������������������������������������������������������������������������������¹ùĹŹƹǹȹɹʹ˹̹͹ιϹйѹҹӹԹչֹ׹عٹڹ۹ܹݹ޹߹������������������������������������������������������������������������������������������������������������ºúĺźƺǺȺɺʺ˺̺ͺκϺкѺҺӺԺպֺ׺غٺںۺܺݺ޺ߺ������������������������������������������������������������������������������������������������������������»ûĻŻƻǻȻɻʻ˻̻ͻλϻлѻһӻԻջֻ׻ػٻڻۻܻݻ޻߻������������������������������������������������������������������������������������������������������������¼üļżƼǼȼɼʼ˼̼ͼμϼмѼҼӼԼռּ׼ؼټڼۼܼݼ޼߼������������������������������������������������������������������������������������������������������������½ýĽŽƽǽȽɽʽ˽̽ͽνϽнѽҽӽԽսֽ׽ؽٽھ����������������������������������������������������������¾þľžƾǾȾɾʾ˾̾;ξϾоѾҾӾԾվ־׾ؾپھ۾ܾݾ޾߾����������������������۽ܽݽ޽߽����������������������������������������������������������������������������������������������������������������������������������������¿ÿĿſƿǿȿɿʿ˿̿ͿοϿпѿҿӿԿտֿ׿ؿٿڿۿܿݿ޿߿���������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������������¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶·¸¹º»¼½¾¿������������������������������������������������������������������������������������������������������������������������������áâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿ������������������������������������������������������������������������������������������������������������������������������ġĢģĤĥĦħĨĩĪīĬĭĮįİıĲĳĴĵĶķĸĹĺĻļĽľĿ������������������������������������������������������������������������������������������������������������������������������šŢţŤťŦŧŨũŪūŬŭŮůŰűŲųŴŵŶŷŸŹźŻżŽžſ������������������������������������������������������������������������������������������������������������������������������ơƢƣƤƥƦƧƨƩƪƫƬƭƮƯưƱƲƳƴƵƶƷƸƹƺƻƼƽƾƿ������������������������������������������������������������������������������������������������������������������������������ǢǣǤǥǦǧǨǩǪǫǬǭǮǯǰǱǲǳǴǵǶǷǸǹǺǻǼǽǾǿ������������������������������������������������������������������������������������������������������������������������������ȡȢȣȤȥȦȧȨȩȪȫȬȭȮȯȰȱȲȳȴȵȶȷȸȹȺȻȼȽȾȿ������������������������������������������������������������������������������������������������������������������������������ɡɢɣɤɥɦɧɨɩɪɫɬɭɮɯɰɱɲɳɴɵɶɷɸɹɺɻɼɽɾɿ������������������������������������������������������������������������������������������������������������������������������ʡʢʣʤʥʦʧʨʩʪʫʬʭʮʯʰʱʲʳʴʵʶʷʸʹʺʻʼʽʾʿ������������������������������������������������������������������������������������������������������������������������������ˡˢˣˤ˥˦˧˨˩˪˫ˬ˭ˮ˯˰˱˲˳˴˵˶˷˸˹˺˻˼˽˾˿������������������������������������������������������������������������������������������������������������������������������̴̵̶̷̸̡̢̧̨̣̤̥̦̩̪̫̬̭̮̯̰̱̲̳̹̺̻̼̽̾̿������������������������������������������������������������������������������������������������������������������������������ͣͤͥͦͧͨͩͪͫͬͭͮͯ͢͡ͰͱͲͳʹ͵Ͷͷ͸͹ͺͻͼͽ;Ϳ������������������������������������������������������������������������������������������������������������������������������Ρ΢ΣΤΥΦΧΨΩΪΫάέήίΰαβγδεζηθικλμνξο������������������������������������������������������������������������������������������������������������������������������ϡϢϣϤϥϦϧϨϩϪϫϬϭϮϯϰϱϲϳϴϵ϶ϷϸϹϺϻϼϽϾϿ������������������������������������������������������������������������������������������������������������������������������СТУФХЦЧШЩЪЫЬЭЮЯабвгдежзийклмноп������������������������������������������������������������������������������������������������������������������������������ѡѢѣѤѥѦѧѨѩѪѫѬѭѮѯѰѱѲѳѴѵѶѷѸѹѺѻѼѽѾѿ������������������������������������������������������������������������������������������������������������������������������ҡҢңҤҥҦҧҨҩҪҫҬҭҮүҰұҲҳҴҵҶҷҸҹҺһҼҽҾҿ������������������������������������������������������������������������������������������������������������������������������ӡӢӣӤӥӦӧӨөӪӫӬӭӮӯӰӱӲӳӴӵӶӷӸӹӺӻӼӽӾӿ������������������������������������������������������������������������������������������������������������������������������ԡԢԣԤԥԦԧԨԩԪԫԬԭԮԯ԰ԱԲԳԴԵԶԷԸԹԺԻԼԽԾԿ������������������������������������������������������������������������������������������������������������������������������աբգդեզէըթժիլխծկհձղճմյնշոչպջռսվտ������������������������������������������������������������������������������������������������������������������������������ְֱֲֳִֵֶַָֹֺֻּֽ֢֣֤֥֦֧֪֭֮֡֨֩֫֬֯־ֿ������������������������������������������������������������������������������������������������������������������������������סעףפץצקרשת׫׬׭׮ׯװױײ׳״׵׶׷׸׹׺׻׼׽׾׿��������������������������������������������������������������������������������������������������������������������";
var charBHStr = "һ�Ҷ����˾��˶��˶���˼�������ʮ���������������¸�Ѿ���ô����Ҳϰ���ڿ����ڷ�����ǧ�������ʿϦ��Ů�Ӵ�Сʬɽ���������Ƚ�ɹ㹭���ŷ������ר�зᵤΪ֮�������ƻ��微��ʲ�ʽ��ͳ����Դ��ز���Ԫ�����ڸ��߷��׷���Ȱ�카���Ȼ�ƥ����������������˫������̫������������Ͱͱһÿ�������껧����֧�Ķ��﷽����Ի��ľǷֹ�����ë����ˮ��צ��Ƭ��ţȮ�����ռ��ƶ����ϼ������˳���Τ���������ҵ�Զ�˿��է�������������̸���Ǫ��������������Ƚ��д����͹����������������ұ��ѻܰ�ռ��¬î��ȥ���ž���ֻ���ٰȶ���̨ʷ��Ҷ��˾̾������ʥ�����뺻ʧͷū���������Զ������ɾ��в�˧ƽ�׸��������˰Ǵ��ӳ⵩��δĩ��������ĸ����֭͡�㺺������ϸ�����˦���ɼ�����Ƥ��Ŀìʸʯʾ���Ѩ��������������ѵ��Ѷ������������Ԧ������ƹ���������ǽ���������ټ����ηݷ������鼿���������Ż��ɡΰ������α�����ȹ�ȫ�������پ�ũ������̻�������մ��Ӷ��ٽ��ﻪЭӡΣѹ�����Ը��ϼ���ͬ����������������������ڹ�س���׳���Ŀ�ж����������ױ�����ִ���լ���ذ���Ѱ���⳾Ң������������Ѳ����ʦ�겢ׯ����͢��ʽ�ڵ�æ������Ϸ���п���Ǥִ��ɨ����ּ��Ѯ����ҷ�����Ӷ����ɱ��Ȩ�λ���������ϫ�Ǻ�Ѵ�꽭���������ƻ�үĲ�������׺���Լ�������������Ͽ��������߼�������������ɫ����â֥��Ѫ�������۽�����������Ϸ���þ��긺���Ǩ����Ѹ�������ǰ�а���ʴ�����������ҳ��ѱ�������ϴ����Һ�Ķ�������������Ƶ赫λ��ס��������������Ӷ����ұ���ұ�䶳��ɾ����������Ŭ��������ϻҽ±��ȴ���ؾ��������ͷ�ɶַԺ�����˱��֨�ⳳ�����Ǻ���ѽ���ʸ���ŻԱǺ�ض�԰����Χַ����̮�������ӿ��̳�����׹�����Ѷʼ������׷���Т�������β���ƨ���ڵ�ϣ�ʱӴ���®��Ӧ��Ū������ͮ�۳�����־���ǿ���û��ҽ�Ť�糶�Ű�������Ҽ����������ץͶ�����۸��׿�������������Ĺ���ʱ������ɼ���ӲĴ��ȶ��������������ÿ����̭�����������������ɳ�湵ûŽ���ٲ׻�����������ֲ�ĵ��״�̿�ұ����긦�е�����������˽ͺ����ϵγ��ɴ�������ڷ�ֽ�Ʒ�Ŧ��ǼФ��Ǹظγ����߽�«�Ұ�о������ѿέ���ղ�����֤����ʶթ�����ߴ���ȶ����Ƴ�������������ӭ�˽��������ԶΥ�������ʺ��������������붤���м����谢�Ӹ���½¤���ͷ�������¿�����ɥ������Щ��������ۼ�ʹֶ�����̶��������½�����ȿ�����ߵ侻ƾ�����ε���ˢȯɲ�̹̿�����Ʊ���׿�����Ծ��������ȡ����ζ�������������զ�;�ӽ���乾�������̹�ͼ����̹ƺ��������¢��ҹ�����η�ܱ�������ķʼ�����ί�ϼ���ѧ�ڹ��涨���˱�ʵ�����о�������������������������㲯���ҵ׵�������ӷϽ����һ�¼���������������̬�����²����Թ��ӻ���������̧����ĨѺ�����������Ĵ������������ذ��Ͼ�׾��£��ӵ��š����Ÿ�ն��������������������������ɰ幹��������ö��֦����ǹ�����ŷ����Źå��ĭ�ںӷ������ӹ�մ��й�����ڷ�Ţ�ݲ�����ע��Ӿк����ǳ¯���׳�Ȳ���˾����ְ��������������õ�����ͻ������ű�����äֱ֪����������ѱ�����������ϸ֯�հ����ﾭ����Ү���֫���ʼ緾��������������в���Է̦�����������ɻ��Ӣƻ��ï����é����²ʭ�����Ĺ�������ʫ���ﻰ����ѯ���������Ͱ��˻��ʷ�̰ƶ�Ṻ����ת����������ȵ���������֣�ɽ�ǥ����բ�ָ�ªİ������������Ƕ��꽤�α���ʻ��פ�ռ��������پ�ͤ��������ֱ�ٶ������׷�����������������ð������ǰ�н�������ѫ��ж����ܱ�������ҧ���ۿ����ʰ�Ʒ����۹������ƻ�Ӵ�����ݶ⹸ԫ�ѵ��Ǹ���������Ҧ��������������¦���Ⱥ��Ͽ����һ��ܹ��⽫����ʺ����Ͽ�Ͳ���۴�֡���Ķ�ͥ�������ܻ�����ŭ˼����Թ���ѻк�����޶�����ս�����������˩��ƴקʰ�ֹ�ָ����������̢Ю�ӵ�������Ųͦ����ʩ����ӳ�������������Կݼܼϱ���ĳ����Ⱦ����������������դ��ջ������������жζ�����ձ����Ȫ�ý�����ϴ�嶴�����޻���Ǣ�ɽ��ǲ�û�Ũ��̿�ھ���ը������˸������ǣ�ݽƶ���ʨ�����Უɺ�䷩���½�η�̽��ߴ����Ի�����ӯ���ζ�ʡü��գ��ɰ��������ש����ף�������ֿ��봩ͻ���������Ѱ��޽��ƻ��Ѥ�����ͳ�׷���ˣ��θ����̥����ʤ���������ã��������㾣�ݼ�����Ե��ٻ�ӫ��ҩŰ����Ϻʴ�������ܰ�Ҫ�������������ջ�˵�з��������ó�Ѻظ���ſ�����Աż�׷����������ѡѷ�¿������ظƶ۳����Ʊ���Կ�վ��ٹ�ť����������ұݶ�Ժ��������������˳��ʳ���Ľȱ�������溧�ǹ�Ÿѻ�˸��㰳�������Ⱥ��н賫����ծֵ�㽡����ԩ��׼���������ʰ��������ԭ��Ŷ���������ܲ������������ƻ�����Բ�������Һ����׼������������׺��������ݿ����мչ�����ͷ��ϯ������ͽ����ˡ����Ϣ�Ҷ��ĺ�����������ȭ��ֿ�ΰ���������ͱ��׽�ƺ�����貶����񻻵�Ч�а�ի�����ûν���ɹ������˷�ʲ�˨����У�����˸����Թ���Φ����ͩɣ���۵��Ž�׮��������ѳ����к�����̩�����㿣�ֺ��˸�ԡ����Ϳ������ӿ���������л�������ɬ�Һ������̿����ջ��̽��Ȱ��������������ƿ��������ƣ���۾Ҽ���֢Ӹ�������氻յ�μ�����ѣ������������������������������Ȼ���խ��վ������Ц�ʷ����������������м�ȱ�ո����̳�����Ű��ʳܵ��������ȸ콺�ذ���֬�༹������ŧ����Ҩ���㽢���޺�����ɯĪ������Өç���ð�����˥��Ԭ��̻���౻����ŵ���̿�˭����׻̸�걪�����ֻ���¸���ʸ����ؽν���͸���;��ͨ���ų�����겿������������Ƹ�Ǯǯ�������������Ǧí��������������˶ٰ���Ԥ���ٳ��鿥��Ѽ��ԧ��Ǭ��ƫ��ͣż͵������������ջ˼����տ�����ǻ���Ψ���ٿ����̷�ơɶ��ž��ХȦ������ö�ǵ��¹���Ȣ�������Ӥ�����޼ż����ܿ�ξ��������±�ո��������ӹ�ȵ��ʱ������Ϥ�ƻ������µ��龪����ϧΩ���Ҳѵ��������ݴ������Ƶ���ڵ�������Ҵ����̽�ӿ����ڴ�°���������Ƚ����ָ�б��������޳�������Ͱ��÷��������е�����������Һ���Ե��������������Ե������㻴���������Ԩ�ս�������ϩ������ɺ���ˬ���Բ��Ͳ���è�������������������Ȭ���̺۰��п��ǵ���ʢ�п������������ù���˶Ʊ���������ƻ�Ҥ�Ͼ��µѷ����ڼ������ɴ�ճ�ۼ���������ά�����������׺��������ְ���Ÿ������沰�ϴ����վ��ʲ˲����������Ƽή��өӪ�������������߹Ƶ����δ�Ϯ��ı����гν������������ֺԾ�������������߶������̪Ұͭ��աϳ������ҿ�������ֲ���¡������ȸѩ­���ľ��ڹ�����¹��ƹ���������������ʣ��ļ���ó��俦ι��������ϲ�������������̿�����Ҽ�����ý��ɩ���º�Ԣ�������Ƕñ�ݷ�ǿ����ѭ����ݳͱ��������������ſ��Ƴ����������Ҿ�մ�������Ԯ�����§����ɦ�Ѵ�볨ɢ�ؾ����˹�վ����羧�����������������������ؼ�����ɭ��ù���ֲ׵����Ҭ���ۿ�ֳ̺���������������μ�ۿ��������ĺ���տ��ʪ�����ȳ��̻��ͱ��ٽ���Ȼ����Ϭ���ɺﻫ�������������������趻ʹƦ�������������Ӳȷ��»��ϡ����˰�Ѵ������ѿ�ͯ�Ƚ����Ͳ���ɸ����������������¼��л����Ʊ�Ե��������Ƣ����Ҹ��ǻ����˴ͧ����϶�����п��ٽ�������������ѽֲ���װԣȹ��лҥ��ǫ�������ʹ���ó�Խ���ϵ��ܼ����Թ������������������ź��������������������������п������������϶�����ż��ͺ�������ƭɧ³�����ڶ���ɵ����ڵ���ɤ����������������Ĺϱ�޼�����į��Ļ����΢��������޸д����岫�����°�Я���ҡ��̯��������Ͼů������Ш���㿬¥���ܻ�Ъ����Դ����Ϫ����������Ϲ��������б�̲��Į�ͼ�ɷú����Գ����ɪ�����̵�ձԴ��˾�˯�����޲Ƕ��鰫���µ���鱮������������ɳ�߿����ǩ���������������������ȺƸ�������������������Ⱦ������������������������Ӽ�������������ӽⴥղ���ܽ�á�������������·����������Ǳ�ǲң���ҳ�ͪ�������ê���സ׶���Ƕ���������Ӻ�����ױ�����ѥ������Ƶ��ӱ����걫ȵ����������ɮ�۾����Լθ����ﾳ����ǽ���۷������կ�α���ԸĽ������ˤժ��ġ��Ʋ�������ե��ȶ��ģǸ��Ư��©����������ΫɿϨ��Ѭ���������������ݴ����̼�̼��Ŵ��Ƚ߶˹����������⾫ӧ���Դ���ظ��򲲸�Ĥ������������ε����Ǿ������֩����Ӭ�������������̷���׺�ò׸׬����ӻ��ԯϽշ�����ڽ�ø�������¶Ͷ�þ����農�ؿ��������ʱǽ�Ƨ��������˻����ҭ������ī���Ĵ�Ӱ�»�ο��������¾Ħ�����˺ײ�����˲���׫���ܷ�ĺ���۷�����ӣ������Ǳ��̶���γ�������������̱Ϲ��������Ϳĵ��ڻ������׭ƪ¨���ɴϱ���ϥ���߽�����Ы�Ⱥ�������Ǵ��ԥ��Ȥ̤���߲�����������������������ù��Ь�����ն�Ʈ��������弽���������ɱں�и���������ò����������ȳ�º�輤��ȼ����̡ư��ȳƳĥ�������ݴ���������ǲڽɺ������������ٱ�Ѧн���������������ޱ���������ȩ��������ص��ʵ߲;�ǭĬ�ܺ��纾���ų������̴ϭ�������������˲ͫ�׽���ػ����㿷�����α�ӷ�ܽ�����������Ӯ��̣����˪ϼ����κ��ȣ���ʹ���հ��ź�ٷ��󸲱ĳ���������ӥ�������ر��꽮Ѣ������Ģз���Ų�״��Ҳ���´�½���Ρ���༮Ŵ��ҫ��Ʃ��ħ�۴���¶��������ȿպ����ȧ��";

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


