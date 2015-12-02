function searchorder(str) {    if (str.length == 0) { 
        document.getElementById("searchresult").innerHTML = "";
        return;
    }
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
	
    }
  }
  xmlhttp.open("GET","vieworder.php?q="+str,true);
  xmlhttp.send();
}

function searchorderdate(str) {
    if (str.length == 0) { 
        document.getElementById("searchresult").innerHTML = "";
        return;
    }
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
	
    }
  }
  xmlhttp.open("GET","vieworder.php?r="+str,true);
  xmlhttp.send();
}

function saveorder(order,stat) {
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			  searchorder(stat);
      document.getElementById("message").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","saveorder.php?q="+JSON.stringify(order),true);
  xmlhttp.send();
}

$(document).ready(function(){
$("#button1" ).click( function()
{
document.getElementById("message").innerHTML = "";
if($( "#selection" ).val()=="date"){

	if($( "#odate" ).val())
	{
					document.getElementById("mainmessage").innerHTML="";
	var date = $( "#odate" ).val();
	searchorderdate(date);
	}else
	{
	document.getElementById("mainmessage").innerHTML="Please enter the date";
	}
}else if($( "#selection" ).val()=="status")
{
		if($( "#ostatus" ).val())
		{
			document.getElementById("mainmessage").innerHTML="";
			var status = $( "#ostatus" ).val();
			searchorder(status);
		}else
		{
		document.getElementById("mainmessage").innerHTML="Please enter status";

		}
}else
{
		document.getElementById("mainmessage").innerHTML="Please select view order by";

}
});
$('#button2').live('click',function () {  
if($('input.delivered:checked').length != 0)
{
	var selected = new Array();
	$('input.delivered:checked').each(function() {
    selected.push($(this).val());
});
saveorder(selected,status);
}
else {
	 document.getElementById("message").innerHTML="Please select at least one order as delivered";
}
});
});
