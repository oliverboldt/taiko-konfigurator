﻿function isMobile()
{
	return navigator.userAgent.match(/(iPhone|iPod|iPad|blackberry|android|Kindle|htc|lg|midp|mmp|mobile|nokia|opera mini|palm|pocket|psp|sgh|smartphone|symbian|treo mini|Playstation Portable|SonyEricsson|Samsung|MobileExplorer|PalmSource|Benq|Windows Phone|Windows Mobile|IEMobile|Windows CE|Nintendo Wii)/i);
}

function userId()
{
	var id = localStorage.getItem("ui");

	if (id == null)
	{
		var date2021 = new Date(2021,0,1);
		var secs = ((new Date()).getTime()-date2021.getTime()) / 1000;

		id = 'ui' + Math.floor(secs);

		localStorage.setItem("ui",id);
	}

	return id;
}

function logPage(page)
{
	var filtered = localStorage.getItem("filtered");
	var lang = localStorage.getItem("lang");
	var tld = window.location.hostname.includes("mytaikodrum.eu") ? "eu" : "de";
	var request = new XMLHttpRequest();

	request.onreadystatechange = function() 
	{
	    if (this.readyState == 4 && this.status == 200) 
	    {
	       	console.log(request.responseText);
	       
	       	var response_obj = JSON.parse(request.responseText);
	       
	       	if (lang == "??")
	       	{
	       		lang = response_obj.lang;
	       		localStorage.setItem("lang", lang);
	       	}
	    }
	}

	request.open("POST","logging/log.php");
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // ?
	request.send('lang=' + lang 
		+ '&tld=' + tld
		+ '&page=' + page 
		+ '&referrer=' + encodeURI(document.referrer) 
		+ "&filtered=" + filtered 
		+ "&userId=" + userId());
}

function logDrum(page, drum)
{
	var filtered = localStorage.getItem("filtered");
	var lang = localStorage.getItem("lang");
	var tld = window.location.hostname.includes("mytaikodrum.eu") ? "eu" : "de";
	var request = new XMLHttpRequest();

	request.open("POST","logging/log.php");
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // ?

	var params = "";

	if (drum.id != "")
	{
		params += "drumId="+drum.id;
		params += "&woodId="+drum.woodId;
		params += "&colorId="+drum.colorId;

		if (! drum.id.includes("SHIME_DAIKO"))
			params += "&handleId="+drum.handleId;

		params += "&";
	}
	params += "filtered=" + filtered;
	params += "&lang=" + lang;
	params += '&tld=' + tld;
	params += "&userId=" + userId();
	params += "&page=" + page;
	params += "&referrer=" + encodeURI(document.referrer); // ?
	request.send(params);
}
