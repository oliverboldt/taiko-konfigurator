
function buttonHighlightStart(element)
{
	element.style.backgroundColor = 'lightblue';
}

function buttonHighlightStop(element)
{
	element.style.backgroundColor = 'lightgrey';
}

function switchLanguage(section)
{
	var lang = localStorage.getItem("lang");


	localStorage.setItem("lang", lang == "de" ? "en" : "de");

	var params = "?lang="+localStorage.getItem("lang");

	if (section != null)
	{
		params += "&section=" + section;
	}

	document.location.assign(params);
}
