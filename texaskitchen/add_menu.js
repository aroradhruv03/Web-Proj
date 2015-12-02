function addmenu(a,b,c,d,e) {
    
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("messageaddmenu").innerHTML=xmlhttp.responseText;
	
    }
  }
  xmlhttp.open("GET","add_menu.php?p="+a+ "&q=" +b+ "&r=" +c+ "&s=" +d+ "&t=" +e,true);
  xmlhttp.send();
}

$(document).ready(function(){
$( "#addmenu" ).validate({
  rules: {
    mprice: {
      required: true,
	  number: true
    },
	mquantity:{
	  required: true,
	  number: true
	},
	mdesc:{
	  required: true,
	},
	mitem:{
		required: true,
	}
	
  },
  messages: {
            mprice: {
				required: "Please enter price",
				number: "Please enter numeric value"
			},
			mquantity: {
				required: "Please enter quantity",
				number: "Please enter numeric value"
			},
			mdescription: {
				required: "Please enter description",
			},
			mitem: {
				required: "Please enter item name",
			}
  },
  submitHandler: function(form) {
            form.submit();
        }
});
$("#addmenubutton" ).click( function()
{
if(!$( "#mquantity" ).val() || !$( "#mprice" ).val() ||!$( "#mitem" ).val() )
	{
	document.getElementById("messageaddmenu").innerHTML="Please enter all the Details";
	}
else {
		
	var t = $( "#cate" ).val();
	var s = $( "#mdesc" ).val();
	var r = $( "#mquantity" ).val();
	var q = $( "#mprice" ).val();
	var p = $( "#mitem" ).val();

	addmenu(p,q,r,s,t);
}
});
});
