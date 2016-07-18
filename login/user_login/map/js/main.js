function eligible()
{
var xmlhttp = new XMLHttpRequest();
url="maintim.php?rank="+rank;
//console.log(url);
var info='';
xmlhttp.onreadystatechange = function()
{
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
		info = JSON.parse(xmlhttp.responseText);
		console.log(info);
		if(!(info.el))
		{
			document.getElementById("bk").className="blocked col-md-offset-1 col-xs-offset-1 col-sm-offset-1 col-xs-offset-1 col-md-2 col-lg-2 col-sm-2 col-xs-2";
			document.getElementById("t").innerHTML=info.tim;
		}
		else
		{
			document.getElementById("bk").className="col-md-offset-1 col-xs-offset-1 col-sm-offset-1 col-xs-offset-1 col-md-2 col-lg-2 col-sm-2 col-xs-2";
			document.getElementById("t").innerHTML=info.tim;
		}

	}
}
xmlhttp.open("GET",url,true);
xmlhttp.send();
}

setInterval(eligible,1000);
console.log(adm_no+","+rank);