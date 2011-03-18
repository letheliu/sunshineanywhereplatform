	<SCRIPT>

	function set_page(init)
	{
	pageid=PAGE_NUM.value;
	location="?action=" + init + "&pageid="+pageid;
	}

	function delete_element(init,deleteindex)
	{
	delete_str="";
	for(i=0;i<document.all("selectid").length;i++)
		{

		el=document.all("selectid").item(i);
		if(el.checked)
		{  val=el.value;
         delete_str+=val + ",";
		}
	}
  
		if(i==0)
		{
		el=document.all("selectid");
		if(el.checked)
		{  val=el.value;
         delete_str+=val + ",";
		}
	}

	if(delete_str=="")
	{
		alert("<?=$common_html['common_html']['deletechooseone']?>");
		return;
	}

	msg="<?=$common_html['common_html']['reallydelete']?>";
	pageid=PAGE_NUM.value;
	action_page_=action_page.value;
	action_page_value_=action_page_value.value;
	if(window.confirm(msg))
	{
		url="action="+deleteindex+"&returnmodel="+init+"&"+action_page_value_+"&selectid="+ delete_str +"&pageid="+ pageid;//url
		location = "?"+base64encode(utf16to8(url));
	}
	}



	function edit_element(mark,returnadd)
	{
	edit_str = "";
	counter=0;
	for(i=0;i<document.all("selectid").length;i++)
		{

		el=document.all("selectid").item(i);
		if(el.checked)
		{  
		 val=el.value;
         edit_str+=val + ",";
		 counter++;
		}
	}

	if(i==0)
	{
		el=document.all("selectid");
		if(el.checked)
		{  
			val=el.value;
			edit_str+=val + ",";
			counter++;
		}
	}
	
	if(edit_str=="")
	{
		alert("<?=$common_html['common_html']['editchooseone'].$html_etc[$tablename]['edit_default']?>");
		return;
	}

	if(counter!=1)			
	{
		alert("<?=$common_html['common_html']['editchooseonlyone']?>");
		return;
	}

	pageid = PAGE_NUM.value;
	url = returnadd+"&selectid="+ edit_str +"&pageid="+ pageid;//url
	location = "?"+base64encode(utf16to8(url));
	}

	function operation_element(returnadd)
	{
	edit_str = "";
	counter=0;
	for(i=0;i<document.all("selectid").length;i++)
		{

		el=document.all("selectid").item(i);
		if(el.checked)
		{  
		 val=el.value;
         edit_str+=val + ",";
		 counter++;
		}
	}

	if(i==0)
	{
		el=document.all("selectid");
		if(el.checked)
		{  
			val=el.value;
			edit_str+=val + ",";
			counter++;
		}
	}
	
	if(edit_str=="")
	{
		alert("<?=$common_html['common_html']['operationchooseone']?>");
		return;
	}

	pageid = PAGE_NUM.value;
	url = returnadd+"&selectid="+ edit_str +"&pageid="+ pageid;//url
	location = "?"+base64encode(utf16to8(url));
	}

	function reply_element()
	{
	edit_str = "";
	counter=0;
	for(i=0;i<document.all("selectid").length;i++)
		{

		el=document.all("selectid").item(i);
		if(el.checked)
		{  
		 val=el.value;
         edit_str+=val + ",";
		 counter++;
		}
	}

	if(i==0)
	{
		el=document.all("selectid");
		if(el.checked)
		{  
			val=el.value;
			edit_str+=val + ",";
			counter++;
		}
	}
	
	if(edit_str=="")
	{
		alert("<?=$common_html['common_html']['replychooseone']?>");
		return;
	}

	if(counter!=1)			
	{
		alert("<?=$common_html['common_html']['replychooseonlyone']?>");
		return;
	}

	pageid=PAGE_NUM.value;
	url="action=edit_reply&selectid="+ edit_str +"&pageid="+ pageid;//url
	location = "?"+base64encode(utf16to8(url));
	}

	function forward_element()
	{
	edit_str = "";
	counter=0;
	for(i=0;i<document.all("selectid").length;i++)
		{

		el=document.all("selectid").item(i);
		if(el.checked)
		{  
		 val=el.value;
         edit_str+=val + ",";
		 counter++;
		}
	}

	if(i==0)
	{
		el=document.all("selectid");
		if(el.checked)
		{  
			val=el.value;
			edit_str+=val + ",";
			counter++;
		}
	}
	
	if(edit_str=="")
	{
		alert("<?=$common_html['common_html']['forwardchooseone']?>");
		return;
	}

	if(counter!=1)			
	{
		alert("<?=$common_html['common_html']['forwardchooseone']?>");
		return;
	}

	pageid=PAGE_NUM.value;
	url="action=edit_forward&selectid="+ edit_str +"&pageid="+ pageid;//url
	location = "?"+base64encode(utf16to8(url));
	}

	function share_element(mark,selfname)
	{
	edit_str = "";
	counter=0;
	for(i=0;i<document.all("selectid").length;i++)
		{

		el=document.all("selectid").item(i);
		if(el.checked)
		{  
		 val=el.value;
         edit_str+=val;
		 counter++;
		}
	}

	if(i==0)
	{
		el=document.all("selectid");
		if(el.checked)
		{  
			val=el.value;
			edit_str+=val;
			counter++;
		}
	}
	
	if(edit_str=="")
	{
		alert("<?=$common_html['common_html']['operationchooseone']?>");
		return;
	}

	if(counter!=1)			
	{
		alert("<?=$common_html['common_html']['operationchooseone']?>");
		return;
	}

	url="action=edit_"+mark+"&"+selfname+"="+edit_str;
	location = "?"+base64encode(utf16to8(url));
	}

	function move_element(init)
	{
	move_str="";
	for(i=0;i<document.all("selectid").length;i++)
		{

		el=document.all("selectid").item(i);
		if(el.checked)
		{  val=el.value;
         move_str+=val + ",";
		}
	}
  
		if(i==0)
		{
		el=document.all("selectid");
		if(el.checked)
		{  val=el.value;
         move_str+=val + ",";
		}
	}

	if(move_str=="")
	{
		alert("<?=$common_html['common_html']['operationchooseone']?>");
		return;
	}

	pageid=PAGE_NUM.value;
	action_page_=action_page.value;
	action_page_value_=action_page_value.value;
	url="action=edit_move&returnmodel="+init+"&"+action_page_value_+"&selectid="+ move_str +"&pageid="+ pageid;//url
	location = "?"+base64encode(utf16to8(url));
	}


	function check_all()
	{
		//alert(document.all("selectid").length);
	for (i=0;i<document.all("selectid").length;i++)
	{	
		//alert(document.all("selectid").item(i).disabled);
		if(allbox.checked && document.all("selectid").item(i).disabled == false)		{
			//document.all("selectid").item(i).disabled = true;
			document.all("selectid").item(i).checked=true;
		}
		else if(document.all("selectid").item(i).disabled == false)		{
			//document.all("selectid").item(i).disabled = false;
			document.all("selectid").item(i).checked=false;
		}
	}
	
	
	if(i==0)
	{
		if(allbox.checked && document.all("selectid").disabled == false)		{
			//document.all("selectid").disabled = true;
			document.all("selectid").checked=true;
		}
		else if(document.all("selectid").disabled == false)		{
			//document.all("selectid").disabled = false;
			document.all("selectid").checked=false;
		}
	}
	

	}

	function changeGroup(url)		{
		location=url;
	}
	
	function GetResult(str)
	{
		var oBao = new ActiveXObject("Microsoft.XMLHTTP");
		oBao.open("GET",str,false);
		oBao.send();
	}

	</SCRIPT>