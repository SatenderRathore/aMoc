//setting


//window.alert(" Please Select Your Prefrences (maximum 7) ");
var room=-1;
var code;
var x=0;
var idd;
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

var prev_select="";
var ctr=0;
var flag=1;

function toggleclass(el,id)
{
	idd=id;
	//console.log(prev_select);
	if (idd[0]=='N')
	var no='(NEHRU)'+idd[1]+idd[2]+'-'+idd[3]+idd[4];
	else if(idd[0]=='T')
	var no='(TAGORE)'+idd[1]+idd[2]+'-'+idd[3]+idd[4];
	else
	var no='(BHABHA)'+idd[1]+'-'+idd[2]+idd[3]+idd[4];


	if (el.className == "available")
	{
		el.className = "selected";
		room=no;
		findcode(idd);
		ctr++;
		flag=0;
	}

	if(ctr>1)
	{
		if(prev_select != id)
		{
			document.getElementById(prev_select).className="available";
		}
	}

	prev_select=id;
    xmlhttp = new XMLHttpRequest();
	url="util/dynplan.php?rmo="+idd;
	var info='';
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			info=JSON.parse(xmlhttp.responseText);
			//console.log(info);
			if(info.length==0)
			{
				document.getElementById("Roll").innerHTML="None";
			}
			else
			{
				var str='';
				for(x in info)
				{
					str+=info[x]+"<br>";
				}
				document.getElementById("Roll").innerHTML=str;
			}

		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	//window.alert(roomno);
 }

/* to check prefrence*/
 function checkpref ()
 {
 	if(room===-1)
 		window.alert("No Room Entered");
 	else
	 	window.alert(room);
 }

 /* call function showplan on double click*/




/* check other people choice on click */
function showplan()
{

	document.getElementById("Roll").innerHTML=room;
}
showplan();


/* to show the prefrence before submitting in html */

function showpref()
{
	//window.alert(room);
	//console.log(room);
	if(room==-1)
	{
		document.getElementById("contentt").innerHTML="None";
	}
	else
	{
		document.getElementById("contentt").innerHTML=room;
	}

}
showpref();

function send()
{
	var xmlhttp = new XMLHttpRequest();
	var url = "util/getup.php?rmo="+idd+"&adm="+adm;
	console.log(url);
	var info = "";
	xmlhttp.onreadystatechange = function()
	{
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			info = JSON.parse(xmlhttp.responseText);
			console.log(info);
			alert(info.m);
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}

