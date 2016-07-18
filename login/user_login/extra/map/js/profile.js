function check()
{
    var xmlhttp = new XMLHttpRequest();
    url="check.php?adm="+adm_no;
    var info='';
    xmlhttp.onreadystatechange = function()
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            info = JSON.parse(xmlhttp.responseText);
            //window.location();
            console.log(info.link);
            if(info.link == "invalid")
            {
                alert("You are still not eligible for booking");
            }
            else
            {
                window.location = info.link;
            }
        }
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}

