//setting 


//window.alert(" Please Select Your Prefrences (maximum 7) ");

// timer 
/*var showTime = function()
{
var xmlhttp = new XMLHttpRequest();
var url= "timer.php";
var info='';
var hr='';
var min='';
var sec='';
xmlhttp.onreadystatechange = function()
{
if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	//console.log(JSON.parse(xmlhttp.responseText));
	//insert your function here
	info=JSON.parse(xmlhttp.responseText);
	//console.log(info);
	if(info.hour%12<=9)
		hr='0';
	if(info.minute<=9)
		min='0';
	if(info.second<=9)
		sec='0';
	document.getElementById("t").innerHTML= hr+(info.hour%12)+":"+min+info.minute+":"+sec+info.second;
	}
}
xmlhttp.open("GET",url,true);
xmlhttp.send();
}
setInterval(showTime,100);

function grptime(hr,min,sec)
{
	var time=(hr*3600)+(min*60)+sec;
	var grp=(rank-1)%7;
	var strt_time=grp*180+start;
	var end_time=strt_time+180;
	if(time==end_time)
	{
		window.alert("Your Time Is Up !");
		send();
		window.location("main.php");
	}
}*/

// timer

function timer()
{
var xmlhttp = new XMLHttpRequest();
var url= "timer.php?rank="+rank;
var info='';
xmlhttp.onreadystatechange = function()
{
if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	//console.log(JSON.parse(xmlhttp.responseText));
	//insert your function here
	info=JSON.parse(xmlhttp.responseText);
	//console.log(info.tl);
	if(info.tl>0)
	{
		document.getElementById("t").innerHTML="Time Left : "+info.tl;
	}
	else
	{
		//document.getElementById("t").innerHTML="Times UP!!";
		send();
		window.location="main.php";
		//window.location="main.html";
	}
	//document.write("Successfull!!");
	}
}
xmlhttp.open("GET",url,true);
xmlhttp.send();
}
//timer();
stTimer=setInterval(timer,100);


/*.....................*/


var room=[];
var code=[];
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
	code.push(x);
	//window.alert(code.join("\n"));
}

// function to change class name when room is clicked
function toggleclass(el,id)
{
	var idd=id;
	if (idd[0]=='N')
	var no='(NEHRU)'+idd[1]+idd[2]+'-'+idd[3]+idd[4];
	else if(idd[0]=='T')
	var no='(TAGORE)'+idd[1]+idd[2]+'-'+idd[3]+idd[4];
	else
	var no='(BHABHA)'+idd[1]+'-'+idd[2]+idd[3]+idd[4];

	if (el.className == "available")
	{
		if(room.length>=7)
		{
			window.alert("You Have Reached Maximum Number Of Prefrences(7)!");
		}
		else
		{
			el.className = "selected";
			room.push(no);
			findcode(idd);

		}
	}
	else
	{
		el.className = "available";
		var a=room.indexOf(no);
		room.splice(a,1);
		code.splice(a,1);
	}    
      
 }

/* to check prefrence*/
 function checkpref ()
 {
 	if(room.length===0)
 		window.alert("No Prefrences Entered");
 	else
	 	window.alert(room.join("\n"));
 }


/* to show the prefrence before submitting in html */

function showpref()
{
	var rooms="";
	for(x in room)
	{
		rooms+=room[x]+"<br>";
	}
	//window.alert(room);
	console.log(room);
	document.getElementById("contentt").innerHTML=rooms;

}
showpref();



//----------------------------------------------
/*var m=angular.module("func",[]);
m.controller("show",function($scope,$http){
	$scope.send=function(){
		$scope.pref=code;
		console.log($scope.pref);
		var link="fillpref.php?rank="+rank+"&Adm_no="+adm+"&p1="+$scope.pref[0]+"&p2="+$scope.pref[1]+"&p3="+$scope.pref[2]+"&p4="+$scope.pref[3]+"&p5="+$scope.pref[4]+"&p6="+$scope.pref[5]+"&p7="+$scope.pref[6];
		$http.get(link).success(function(data){
		$scope.msg=data;
		//alert("Data received successfully!!");

		console.log(data);
		}).error(function(){
		alert("There is an error in sending data");
		});
	}

});*/
//-----------------------------------------
function send()
{
var xmlhttps = new XMLHttpRequest();
var url= "fillpref.php?rank="+rank+"&Adm_no="+adm+"&p1="+code[0]+"&p2="+code[1]+"&p3="+code[2]+"&p4="+code[3]+"&p5="+code[4]+"&p6="+code[5]+"&p7="+code[6];
var info='';
xmlhttps.onreadystatechange = function()
{
if(xmlhttps.readyState == 4 && xmlhttps.status == 200)
	{
	console.log(JSON.parse(xmlhttps.responseText));
	//insert your function here
	info=JSON.parse(xmlhttps.responseText);
	alert(info.m);
	window.location="main.php";
	}
}
xmlhttps.open("GET",url,true);
xmlhttps.send();
}

// rooms to be blocked

var xmlhttp = new XMLHttpRequest();
var url= "result.php";
var info='';
xmlhttp.onreadystatechange = function()
{
if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
	{
	//console.log(JSON.parse(xmlhttp.responseText));
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
		str =str +(i+1)+")Hostel : "+x[i].Hostel+"<br>&nbsp;&nbsp;&nbsp;Room No. : "+x[i].room+"<br>";
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