/* DEPENDENCIES: NONE */

/* USAGE INSTRUCTIONS: Keep this JavaScript file before any other script, in the head of the HTML file it's included in. */
 
/* Windows Phone 8 view-port recognition script. [BEGIN] */

if (navigator.userAgent.match(/IEMobile\/10\.0/)) 
	{
		var msViewportStyle = document.createElement("style");
		msViewportStyle.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
		document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
	};

/* Windows Phone 8 view-port recognition script. [END] */