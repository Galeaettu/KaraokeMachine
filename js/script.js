document.getElementById("foot01").innerHTML =
"<p>&copy;  " + new Date().getFullYear() + " Cirku.</p>";



document.getElementById("nav01").innerHTML = 
 "<nav class=\"navbar navbar-inverse navbar-fixed-top\"id='menu')\""+
	"<div class=\"container-fluid\">"+
		"<div class=\"navbar-header\">"+
			"<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">"+
				"<span class=\"icon-bar\"></span>"+
				"<span class=\"icon-bar\"></span>"+
				"<span class=\"icon-bar\"></span> "+
			"</button>"+
			"<a class=\"navbar-brand\" onclick=\"window.location.replace('index.html')\">Cirku</a>"+
		"</div>"+
		"<div class=\"collapse navbar-collapse\" id=\"myNavbar\">"+
			// "<div>"+
			// 	"<ul class=\"nav navbar-nav\">"+
			// 		"<li><a onclick=\"window.location.replace('letter.html?letter=ALL\')\">Kliem Kollha</a></li>"+
			// 	"</ul>"+
			// "</div>"+
			// "<div>"+
			// "<ul class=\"nav navbar-nav\">"+
			// 	"<li><a onclick=\"window.location.replace('dreams.html\')\">Holm</a></li>"+
			// "</ul>"+
		"</div>"+


	
		"</div>"+
	"</div>"+
"</nav>";





document.getElementById("nav02").innerHTML =
"<div class=\"jumbotron\">"+
	"<div class=\"container\">"+
		"<h1>Karaoke <small>Kant u stunar bejn il-hbieb.</small></h1>"+
		"<p>Skopri talenti godda!</p>"+
	"</div>"+
"</div>";
var winPathname = window.location.pathname;

if (winPathname.indexOf("dreams.html")>-1){
	document.getElementById("nav02").innerHTML =
	"<div class=\"jumbotron\">"+
	"<div class=\"container\">"+
		"<h1>Holm <small>Grajjiet u Rakkonti</small></h1>"+
		"<p>Kollezzjoni ta' holm li ntqalu.</p>"+
	"</div>"+
"</div>";
}