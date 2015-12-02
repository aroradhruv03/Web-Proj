function updatemenuitem(p,q,r,s,t,u) {
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("message1").innerHTML=xmlhttp.responseText;
	
    }
  }
  xmlhttp.open("GET","update_menu3.php?p="+p+ "&q="+q+ "&r="+r+ "&s="+s+ "&t="+t+ "&u="+u,true);
  xmlhttp.send();
}

$(document).ready(function(){
	
$( "#updatemenus" ).validate({
  rules: {
    menprice: {
	  number: true
    },
	menquant:{
	  number: true
	},
	
  },
  messages: {
            menprice: {
				required: "Please enter price",
				number: "Please enter numeric value"
			},
			menquant: {
				required: "Please enter quantity",
				number: "Please enter numeric value"
			},
			mendesc: {
				required: "Please enter description",
			},
			menitem: {
				required: "Please enter item name",
			}
  },
  submitHandler: function(form) {
            form.submit();
        }
});
document.getElementById("updatemenuitemback").onclick = function () {
        location.href = "updatemenu.php";
};
$("#menusave" ).click( function()
{
    var u = $("#menuid").val();
	var t = $( "#categ" ).val();
	var s = $( "#mendesc" ).val();
	var r = $( "#menquant" ).val();
	var q = $( "#menprice" ).val();
	var p = $( "#menitem" ).val();
	updatemenuitem(p,q,r,s,t,u);
});
});