function updatemenu(item,cat) {
		if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("menusearchresult").innerHTML=xmlhttp.responseText;
	
    }
  }
  xmlhttp.open("GET","update_menu1.php?p="+cat+ "&q="+item,true);
  xmlhttp.send();
}

$(document).ready(function(){

$("#searchmenu" ).click( function()
{
	var mcategory = $( "#mcate" ).val();
	var meitem = $( "#meitem" ).val();
	updatemenu(meitem,mcategory);
});

});
