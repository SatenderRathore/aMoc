//setting 


//window.alert(" Please Select Your Prefrences (maximum 7) ");
var room=-1;
var code;
var x=0;

/* to generate code for the array in backend */
function findcode(idd)
{
	x=0;
	if(idd[0]=='N')
	{		
		if(idd[1]=='B')
			x+=96;

		if(idd[2]=='F')
			x+=32;
		else if(idd[2]=='S')
			x+=64;
	}

	else if(idd[0]=='T')
	{
		x=192;
		if(idd[1]='B')
			x+=96;

		if(idd[2]=='F')
			x+=32;
		else if(idd[2]=='S')
			x+=64;
	}

	else if(idd[0]=='B')
	{
		x=384;
		if(idd[1]=='B')
			x+=30;

	}

	x+=((idd[3]-'0')*10+(idd[4]-'0')-1);
	code=x;
	//window.alert(code.join("\n"));
}

// rooms to be blocked

var xmlhttp = new XMLHttpRequest();
var url= "util/result.php";
var info='';
xmlhttp.onreadystatechange = function()
{
if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	console.log(JSON.parse(xmlhttp.responseText));
	//insert your function here
	info=JSON.parse(xmlhttp.responseText);
	myfunction(info);
	}
}
xmlhttp.open("GET",url,true);
xmlhttp.send();

var myfunction = function (x)
	{
	var str="";
	for(var i=0;i<info.length;i++)
	{
		//str =str +(i+1)+")Hostel : "+x[i].Hostel+"<br>&nbsp;&nbsp;&nbsp;Room No. : "+x[i].room+"<br>";
		var Hostel=x[i].Hostel;
		var room=x[i].room;
		if(Hostel[0]=='B')
			var idd=Hostel[0]+room[0]+room[2]+room[3]+room[4];
		else
			var idd=Hostel[0]+room[0]+room[1]+room[3]+room[4];
		console.log(idd);
		document.getElementById(idd).className="blocked";	
	}
	}


