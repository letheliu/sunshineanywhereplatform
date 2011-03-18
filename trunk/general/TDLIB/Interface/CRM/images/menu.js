

	var childActive = null 

    var menuActive = null

    var lastHighlight = null

    var active = false

   

    function getReal(el) {

      // Find a table cell element in the parent chain */

      temp = el

      while ((temp!=null) && (temp.tagName!="TABLE") && (temp.className!="root") && (temp.id!="menuBar")) {

        if (temp.tagName=="TD")

          el = temp

        temp = temp.parentElement

      }

      return el

    }



    function raiseMenu(el) {
      el.style.borderLeft = "1px #08246B solid"

      el.style.borderTop = "1px #08246B solid"

      el.style.borderRight = "1px #08246B solid"

      el.style.borderBottom = "1px #08246B solid"

      el.style.background = "#B5BED6"

    }



    function clearHighlight(el) {

      if (el==null) return

      el.style.borderRight = "1px lightgrey solid"

      el.style.borderBottom = "1px lightgrey solid"

      el.style.borderTop = "1px lightgrey solid"

      el.style.borderLeft = "1px lightgrey solid" 

      el.style.background = "rgb(212,208,200)"

    }



    function sinkMenu(el) {

      el.style.borderRight = "1px #EEEEEE solid"

      el.style.borderBottom = "1px #EEEEEE solid"

      el.style.borderTop = "1px gray solid"

      el.style.borderLeft = "1px gray solid"

      el.style.background = "rgb(212,208,200)"

    }



    function menuHandler(menuItem) {

      // Write generic menu handlers here!

      // Returning true collapses the menu. Returning false does not collapse the menu

      return true

    }



    function getOffsetPos(which,el,tagName) {

      var pos = 0 // el["offset" + which]

      while (el.tagName!=tagName) {

        pos+=el["offset" + which]

        el = el.offsetParent

      }

      return pos	

    }



    function getRootTable(el) {

      el = el.offsetParent

      if (el.tagName=="TR") 

        el = el.offsetParent

      return el

    }



    function getElement(el,tagName) {

      while ((el!=null) && (el.tagName!=tagName) )

        el = el.parentElement

      return el

    }



    function processClick() {

      var el = getReal(event.srcElement)
      //alert("123="+getRootTable(el).id);
      if ((getRootTable(el).id=="menuBar") && (active)) {        

        cleanupMenu(menuActive)

        clearHighlight(menuActive)

        active=false

        lastHighlight=null

        doHighlight(el)

      }

      else {
//alert("123");
        if ((el.className=="root") || (!menuHandler(el))){
//alert("1234");
          doMenuDown(el)
}
        else {

          if (el._childItem==null) 

            el._childItem = getChildren(el)

          if (el._childItem!=null)  return;

          if ((el.id!="break") && (el.className!="disabled") && (el.className!="disabledhighlight") && (el.className!="clear"))  {

            if (menuHandler(el)) {

              cleanupMenu(menuActive)

              clearHighlight(menuActive)

              active=false

              lastHighlight=null

            }

          }

        }

      }

    }



    function getChildren(el) {

      var tList = el.children.tags("TABLE")

      var i = 0

      while ((i<tList.length) && (tList[i].tagName!="TABLE"))

        i++

      if (i==tList.length)

        return null

      else

        return tList[i]

    }



    function doMenuDown(el) {

      if (el._childItem==null) 
{
        el._childItem = getChildren(el)
       // alert("2345");
        }
      if ((el._childItem!=null) && (el.className!="disabled") && (el.className!="disabledhighlight")) {

        // Performance Optimization - Cache child element
//alert("12345");
        ch = el._childItem

        if (ch.style.display=="block") {

          removeHighlight(ch.active)

          return

        }

        ch.style.display = "block"

        if (el.className=="root") {
       // alert("aaaa");

          ch.style.pixelTop = el.offsetHeight + el.offsetTop + 20

          ch.style.pixelLeft = el.offsetLeft + event.clientX 

	  if (ch.style.pixelWidth==0)

            ch.style.pixelWidth = ch.rows[0].offsetWidth+50

          sinkMenu(el)

          active = true

          menuActive = el

        } else {
//alert("bbbb");
          childActive = el

          ch.style.pixelTop = getOffsetPos("Top",el,"TABLE") -3 // el.offsetTop + el.offsetParent.offsetTop - 3

          ch.style.pixelLeft = el.offsetLeft + el.offsetWidth+event.clientX 

	  if (ch.style.pixelWidth==0)

            ch.style.pixelWidth = ch.offsetWidth+50

        }//else     

      }//if (el.className
//alert("23456789");
    }//if ((el._childItem!=null)

 

    function doHighlight(el) {

      el = getReal(el)

      if ("root"==el.className) {

        if ((menuActive!=null) && (menuActive!=el)) {

          clearHighlight(menuActive)

        }

        if (!active) {

          raiseMenu(el)

        }          

        else 

          sinkMenu(el)

        if ((active) && (menuActive!=el)) {

          cleanupMenu(menuActive)          

          doMenuDown(el)

        }

        menuActive = el  

        lastHighlight=null

      }

      else {

        if (childActive!=null) 

          if (!childActive.contains(el)) 

            closeMenu(childActive, el)    



        if (("TD"==el.tagName) && ("clear"!=el.className)) {

          var ch = getRootTable(el)         

          if (ch.active!=null) {

            if (ch.active!=el) {

              if (ch.active.className=="disabledhighlight")  

                ch.active.className="disabled"

              else

                ch.active.className=""

              }

            }

          ch.active = el

          lastHighlight = el

          if ((el.className=="disabled") || (el.className=="disabledhighlight") || (el.id=="break")) 

            el.className = "disabledhighlight"

          else {

            if (el.id!="break") {

              el.className = "highlight"

              if (el._childItem==null) 

                el._childItem = getChildren(el)

              if (el._childItem!=null) {

                doMenuDown(el)

              }

            }  

          }

        }

      }

    }



    function removeHighlight(el) {

      if (el!=null)

        if ((el.className=="disabled") || (el.className=="disabledhighlight"))  

          el.className="disabled"

        else

          el.className=""

    }



    function cleanupMenu(el) {

      if (el==null) return

      for (var i = 0; i < el.all.length; i++) {

        var item = el.all[i]

        if (item.tagName=="TABLE")

         item.style.display = ""

        removeHighlight(item.active)

        item.active=null

      }

    }





    function closeMenu(ch, el) {

      var start = ch

      while (ch.className!="root") {

          ch = ch.parentElement

          if (((!ch.contains(el)) && (ch.className!="root"))) {

            start=ch

          }

      }

      cleanupMenu(start)

    }

 

    function checkMenu() {      

      if (document.all.menuBar==null) return

      if ((!document.all.menuBar.contains(event.srcElement)) && (menuActive!=null)) {

        clearHighlight(menuActive)

        closeMenu(menuActive)

        active = false

        menuActive=null

        choiceActive = null

      }

    }



    function doCheckOut() {

      var el = event.toElement      

      if ((!active) && (menuActive!=null) && (!menuActive.contains(el))) {

        clearHighlight(menuActive)

        menuActive=null

      }

    }





    function processKey() {

      if (active) {

        switch (event.keyCode) {

         case 13: lastHighlight.click(); break;

         case 39:  // right

           if ((lastHighlight==null) || (lastHighlight._childItem==null)) {

             var idx = menuActive.cellIndex

//             if (idx==menuActive.offsetParent.cells.length-2)

             if (idx==getElement(menuActive,"TR").cells.length-2)

               idx = 0

             else

               idx++

             newItem = getElement(menuActive,"TR").cells[idx]

           } else

           {

             newItem = lastHighlight._childItem.rows[0].cells[0]

           }

           doHighlight(newItem)

           break; 

         case 37: //left

           if ((lastHighlight==null) || (getElement(getRootTable(lastHighlight),"TR").id=="menuBar")) {

             var idx = menuActive.cellIndex

             if (idx==0)

               idx = getElement(menuActive,"TR").cells.length-2

             else

               idx--

             newItem = getElement(menuActive,"TR").cells[idx]

           } else

           {

             newItem = getElement(lastHighlight,"TR")

             while (newItem.tagName!="TD")

               newItem = newItem.parentElement

           }

           doHighlight(newItem)

           break; 

         case 40: // down

            if (lastHighlight==null) {

              itemCell = menuActive._childItem

              curCell=0

              curRow = 0

            }

            else {

              itemCell = getRootTable(lastHighlight)

              if (lastHighlight.cellIndex==getElement(lastHighlight,"TR").cells.length-1) {

                curCell = 0

                curRow = getElement(lastHighlight,"TR").rowIndex+1

                if (getElement(lastHighlight,"TR").rowIndex==itemCell.rows.length-1)

                  curRow = 0

              } else {

                curCell = lastHighlight.cellIndex+1

                curRow = getElement(lastHighlight,"TR").rowIndex

              }

            }

            doHighlight(itemCell.rows[curRow].cells[curCell])

            break;

         case 38: // up

            if (lastHighlight==null) {

              itemCell = menuActive._childItem

              curRow = itemCell.rows.length-1

              curCell= itemCell.rows[curRow].cells.length-1



            }

            else {

              itemCell = getRootTable(lastHighlight)

              if (lastHighlight.cellIndex==0) {

                curRow = getElement(lastHighlight,"TR").rowIndex-1

                if (curRow==-1)

                  curRow = itemCell.rows.length-1

                curCell= itemCell.rows[curRow].cells.length-1



              } else {

                curCell = lastHighlight.cellIndex - 1

                curRow = getElement(lastHighlight,"TR").rowIndex

              }

            }

            doHighlight(itemCell.rows[curRow].cells[curCell])

            break;

           if (lastHighlight==null) {

              curCell = menuActive._childItem

              curRow = curCell.rows.length-1

            }

            else {

              curCell = getRootTable(lastHighlight)

              if (getElement(lastHighlight,"TR").rowIndex==0)

                curRow = curCell.rows.length-1

              else

                curRow = getElement(lastHighlight,"TR").rowIndex-1

            }

            doHighlight(curCell.rows[curRow].cells[0])

            break;

        }

      }

    }





function make_menu() {

//document.write("<table  cellpadding='0' cellspacing='0' border='0' style='background=rgb(212,208,200); BACKGROUND: buttonface; BORDER-BOTTOM: buttonshadow 1px solid; BORDER-LEFT: buttonhighlight 1px solid; BORDER-RIGHT: buttonshadow 1px solid; BORDER-TOP: buttonhighlight 1px solid;'>");

document.write("<td>");

document.write("<TABLE ID=menuBar ONSELECTSTART='return false' ONCLICK='processClick()' ONMOUSEOVER='doHighlight(event.toElement)' ONMOUSEOUT='doCheckOut()' ONKEYDOWN='processKey()' style='background=rgb(212,208,200); BACKGROUND: buttonface; BORDER-BOTTOM: buttonshadow 1px solid; BORDER-LEFT: buttonhighlight 1px solid; BORDER-RIGHT: buttonshadow 1px solid; BORDER-TOP: buttonhighlight 1px solid;'>");
	j=1;
	while(eval("window.OutBarFolder"+j))
	j++;
	i=1;
	while(i<j)
	{
		Folder=eval("OutBarFolder"+i)
        document.write("<TD NOWRAP CLASS=root>"+Folder[0]+"<TABLE CELLSPACING=0 CELLPADDING=0>");
		MakeItems(Folder);
        document.write("</TABLE>");
		i++;
	}
document.write("</TD></TABLE>");
document.write("</td>");
}



function MakeItems(Folder)

{

	var items=0;

	while(Folder[items+1])

		items+=5;

	items/=5;

	for(var i=1;i<items*5;i+=5)

	{


			document.write("<TR><TD NOWRAP"+((Folder[i+0]=="none")?"":" ID='"+Folder[i+0]+"'")+((Folder[i+3]=="none")?"":" onclick=\""+Folder[i+4]+"\"")+">"+((Folder[i+1]=="default")?"":"<font color="+Folder[i+1]+">")+Folder[i+2]+((Folder[i+1]=="default")?"":"</font>")+"</TD></TR>");

//alert("<TR><TD NOWRAP "+((Folder[i+0]=="none")?"":"ID='"+Folder[i+0]+"'")+((Folder[i+3]=="none")?"":" onclick=\"javascript:"+Folder[i+4]+"\"")+">"+((Folder[i+1]=="default")?"":"<font color="+Folder[i+1]+">")+Folder[i+2]+((Folder[i+1]=="default")?"":"</font>")+"</TD></TR>");

	}	

}



function go(i,iurl) {

iurl="detailquery\('17'\)";

	switch (i) 

	{

		case 1 : iurl; alert(iurl); break; //返回首页

		case 2 : top.main.location='login.htm';break;  //登录

		case 3 : top.main.location='shenqing.htm';break;  //注册

		case 4 : top.main.location='addnew.asp';break;   //增加新贴

		case 5 : top.main.location='index1.asp';break;   //第一页

		case 6 : //上一页

			var obj=top.main

			var str=obj.location.href;	

			if(str.indexOf("index1")>0)

				obj.location="index1.asp@page="+obj.document.all("ppage").value;

			else

				obj.location="index1.asp";

			break;   

		case 7 : //下一页

			var obj=top.main

			var str=obj.location.href;	

			if(str.indexOf("index1")>0)

				obj.location="index1.asp@page="+obj.document.all("npage").value;

			else

				obj.location="index1.asp";

			break;   

		case 8 :  //最后一页

			var obj=top.main

			var str=obj.location.href;	

			if(str.indexOf("index1")>0)

				obj.location="index1.asp@page="+obj.document.all("epage").value;

			else

				obj.location="index1.asp";

			break;   

		case 9: top.main.location='editinfo.asp';break;

		case 10: top.main.location='quit.asp';break;

		case 11: top.main.location='userinfo.asp';break;			

		case 12: 

			var newwin=top.open("../../../../waha.3322.net/default.htm");

			newwin.focus();

			break;

	}

}

