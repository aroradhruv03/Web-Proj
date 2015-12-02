function searchorder(str) {
    if (str.length == 0) { 
        document.getElementById("searchresult").innerHTML = "";

        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("searchresult").innerHTML = "";
				 document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
            }
        }
		if(str == "Delivered")
			s=0;
		else
			s=1;
        xmlhttp.open("GET", "view_order.php?q=" + s, true);
        xmlhttp.send();
    }
}

$(function()
{
$(":submit" ).click( function()
{
	e.preventDefault();
    e.stopPropagation(); 
var status = $( "#ostatus" ).val();
searchorder(status);
});
document.getElementById("vieworderback").onclick = function () {
        location.href = "orderhistory.php";
};
});
