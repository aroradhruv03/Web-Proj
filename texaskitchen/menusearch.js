function searchmenus(a) {
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("menusearchresults").innerHTML=xmlhttp.responseText;
	
    }
  }
  xmlhttp.open("GET","menusearch.php?p="+a,true);
  xmlhttp.send();
}

$(document).ready(function(){

$("#mcategory").change(function() {
	var t = $( "#mcategory" ).val();
	if(t=="")
	{
		document.getElementById("menu_message").innerHTML="Please Select a Category";
	}
	searchmenus(t);
});
});
