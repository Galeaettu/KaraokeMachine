var personQuotes = [];
personQuotes[0] = {
			"name":"Christian",
			"pictureID":"1002676115",
			"quote": [],
		};
personQuotes[1] = {
			"name":"Benjamin",
			"pictureID":"1261672574",
			"quote": [],
		};

personQuotes[2] = {
			"name":"Myriah",
			"pictureID":"1566515029",
			"quote": [],
		};		
		
personQuotes[3] = {
			"name":"Roxanne",
			"pictureID":"790284957",
			"quote": [],
		};		

personQuotes[0]["quote"].push("ok");
personQuotes[0]["quote"].push("nos puede dar un tenedor por favor?");

personQuotes[1]["quote"].push("U haqq ghal madonna kif qazzist l'alla roxanne");

personQuotes[2]["quote"].push("Kwazi kwazi kwazi");

personQuotes[3]["quote"].push("Dahhluni");

personQuotes[1]["quote"].push("gil jitqarben bla ma jqerr");

function generateQuotes(){
	var quotesOut = "";
	var i, j;
	
	for(i =0; i<personQuotes.length; i++){		
		for(j =0; j<personQuotes[i]["quote"].length; j++){
			quotesOut += 
				
			"<div class=\"row myrow quote\">"+
				"<div class=\"col-xs-9 col-xs-offset-3 col-sm-offset-1 facebookQuoteSuper pull-right\"><p>"+eval("personQuotes[i].name")+"</p></div>"+
				"<div style=\"clear: left;\"></div>"+
				"<div class=\"col-xs-3 col-sm-2 col-md-1\"><img src=\"http://graph.facebook.com/"+eval("personQuotes[i].pictureID")+"/picture?type=square&width=200&height=200\" class=\"img-circle facebookImage\" alt=\"http://graph.facebook.com/"+eval("personQuotes[i].pictureID")+".pictureID\"></div>"+
				"<div class=\"col-xs-9 col-sm-10 col-md-11 quoteHolder\"><h2 class=\"facebookQuote\" >"+eval("personQuotes[i]['quote'][j]")+"</h2></div>"+
			"</div>";
		}
	}
	document.getElementById("quoteOut").innerHTML = quotesOut;
}

//"http://graph.facebook.com/"+eval("personQuotes.person"+[i]+".pictureID"