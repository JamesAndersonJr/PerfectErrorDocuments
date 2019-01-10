/* Windows Phone 8.x [ Mobile IE 10.0 ] view-port recognition script. [BEGIN] */

if (navigator.userAgent.match(/IEMobile\/10\.0/))
	{
		var msViewportStyle = document.createElement("style");
		msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
		document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
	};

/* Windows Phone 8.x [ Mobile IE 10.0 ] view-port recognition script. [END] */