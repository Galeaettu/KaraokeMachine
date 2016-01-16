var dreamCountChris = christianDreams.length;
var dreamCountBen = benjaminDreams.length;
var dreamCountMyr = myriahDreams.length;
var dreamCountGil = gilbertDreams.length;

var personStats = {
    "person0" : {
    	"name":"Christian",
    	"health":"80",
    	"strength":"80",
    	"constitution":"75",
    	"dexterity":"70",
    	"wisdom":"60",
    	"charisma":"45",
    	"stealth":"65",
    	"survival":"60",
    	"medicine":"40",
    	"athletics":"75",
    	"deception":"55",
    	"insight":"55",
    	"religion":"10",
    	"dream":dreamCountChris
    	},
	"person1" : {
		"name":"Benjamin",
		"health":"80",
		"strength":"65",
		"constitution":"75",
		"dexterity":"70",
		"wisdom":"75",
		"charisma":"60",
		"stealth":"60",
		"survival":"45",
		"medicine":"50",
		"athletics":"75",
		"deception":"60",
		"insight":"65",
		"religion":"10",
		"dream":dreamCountBen
		},
	"person2" : {
		"name":"Myriah",
		"health":"75",
		"strength":"60",
		"constitution":"75",
		"dexterity":"60",
		"wisdom":"65",
		"charisma":"75",
		"stealth":"45",
		"survival":"50",
		"medicine":"70",
		"athletics":"45",
		"deception":"55",
		"insight":"65",
		"religion":"60",
		"dream":dreamCountMyr
		},
	"person3" : {
		"name":"Roxanne",
		"health":"80",
		"strength":"55",
		"constitution":"75",
		"dexterity":"50",
		"wisdom":"65",
		"charisma":"60",
		"stealth":"30",
		"survival":"40",
		"medicine":"60",
		"athletics":"55",
		"deception":"70",
		"insight":"80",
		"religion":"70",
		"dream":"0"
		},
	"person4" : {
		"name":"Gilbert",
		"health":"30",
		"strength":"70",
		"constitution":"55",
		"dexterity":"70",
		"wisdom":"65",
		"charisma":"55",
		"stealth":"65",
		"survival":"70",
		"medicine":"80",
		"athletics":"70",
		"deception":"55",
		"insight":"50",
		"religion":"20",
		"dream":dreamCountGil
		},
	"person5" : {
		"name":"Warren",
		"health":"60",
		"strength":"75",
		"constitution":"65",
		"dexterity":"60",
		"wisdom":"60",
		"charisma":"55",
		"stealth":"40",
		"survival":"60",
		"medicine":"55",
		"athletics":"80",
		"deception":"45",
		"insight":"55",
		"religion":"65",
		"dream":"0"
		},
	"person6" : {
		"name":"Mark",
		"health":"75",
		"strength":"85",
		"constitution":"75",
		"dexterity":"60",
		"wisdom":"55",
		"charisma":"100",
		"stealth":"65",
		"survival":"60",
		"medicine":"50",
		"athletics":"45",
		"deception":"45",
		"insight":"60",
		"religion":"75",
		"dream":"0"
		},
	"person7" : {
		"name":"Abigail",
		"health":"80",
		"strength":"50",
		"constitution":"75",
		"dexterity":"60",
		"wisdom":"70",
		"charisma":"70",
		"stealth":"45",
		"survival":"50",
		"medicine":"30",
		"athletics":"60",
		"deception":"45",
		"insight":"65",
		"religion":"75",
		"dream":"0"
		},
	"person8" : {
		"name":"Maria",
		"health":"75",
		"strength":"55",
		"constitution":"75",
		"dexterity":"60",
		"wisdom":"65",
		"charisma":"65",
		"stealth":"35",
		"survival":"40",
		"medicine":"50",
		"athletics":"75",
		"deception":"55",
		"insight":"45",
		"religion":"85",
		"dream":"0"
		}
} 

function statGenerator(){
	var i, j;
	var test;
	var stat = "";
	var health
		,strength
		,constitution
		,dexterity
		,wisdom
		,charisma
		,stealth
		,survival
		,medicine
		,athletics
		,deception
		,insight
		,religion
		,name
		,dream
		,dream1;
	var dreamCount=0;
	var holma = "holma";
	
	for (j = 0; j< 9; j++){	
		dream = Number(eval("personStats.person"+[j]+".dream"));
		dreamCount += dream;
	}

	for (i = 0; i< 9; i++){	
		health = eval("personStats.person"+[i]+".health");
		strength = eval("personStats.person"+[i]+".strength");
		constitution = eval("personStats.person"+[i]+".constitution");
		dexterity = eval("personStats.person"+[i]+".dexterity");
		wisdom = eval("personStats.person"+[i]+".wisdom");
		charisma = eval("personStats.person"+[i]+".charisma");
		stealth = eval("personStats.person"+[i]+".stealth");
		survival = eval("personStats.person"+[i]+".survival");
		medicine = eval("personStats.person"+[i]+".medicine");
		athletics = eval("personStats.person"+[i]+".athletics");
		deception = eval("personStats.person"+[i]+".deception");
		insight = eval("personStats.person"+[i]+".insight");
		religion = eval("personStats.person"+[i]+".religion");
		name = eval("personStats.person"+[i]+".name");
		dream = Number(eval("personStats.person"+[i]+".dream"));
		
		dream1 = (dream/dreamCount)*100;
		
		if(dream > 1){
			holma = "holmiet";
		}
		
		stat += 
			"<div class=\"col-xs-12 col-sm-6 col-md-4\">"+
				"<div class=\"panel panel-default\">"+
					"<div class=\"panel-heading\">"+name+"</div>"+
					"<div class=\"panel-body\">"+
						"<div>"+
							"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Health</span></div>"+
						"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
							"<div class=\"progress\">"+
								"<div class=\"progress-bar progress-bar-danger progress-bar-striped active\" role=\"progressbar\"  style=\"width: "+health+"%\">"+health+"</div>"+
							"</div>"+
						"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Strength</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-warning progress-bar-striped\" role=\"progressbar\"  style=\"width: "+strength+"%\">"+(strength/100*18).toFixed(0)+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
						"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Consitution</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-warning progress-bar-striped\" role=\"progressbar\"  style=\"width: "+constitution+"%\">"+(constitution/100*18).toFixed(0)+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+ 
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Dexterity</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-warning progress-bar-striped\" role=\"progressbar\"  style=\"width: "+dexterity+"%\">"+(dexterity/100*18).toFixed(0)+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Wisdom</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-warning progress-bar-striped\" role=\"progressbar\"  style=\"width: "+wisdom+"%\">"+(wisdom/100*18).toFixed(0)+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Charisma</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-warning progress-bar-striped\" role=\"progressbar\"  style=\"width: "+charisma+"%\">"+(charisma/100*18).toFixed(0)+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Stealth</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\"  style=\"width: "+stealth+"%\">"+stealth+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Survival</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\"  style=\"width: "+survival+"%\">"+survival+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Medicine</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\"  style=\"width: "+medicine+"%\">"+medicine+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Athletics</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\"  style=\"width: "+athletics+"%\">"+athletics+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Deception</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\"  style=\"width: "+deception+"%\">"+deception+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Insight</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\"  style=\"width: "+insight+"%\">"+insight+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
						"<div>"+
								"<div class=\"col-xs-4 col-sm-3 col-md-3\"><span>Religion</span></div>"+
							"<div class=\"col-xs-8 col-sm-9 col-md-9\">"+
					    		"<div class=\"progress\">"+
									"<div class=\"progress-bar progress-bar-success progress-bar-striped\" role=\"progressbar\"  style=\"width: "+religion+"%; min-width: 2em;\">"+religion+"</div>"+
								"</div>"+
							"</div>"+
						"</div>"+
					"</div>"+
					
					
					"<div class=\"progress\" style=\"padding:0; margin:0;\">"+
					"<div class=\"progress-bar progress-bar-striped active\" role=\"progressbar\"  style=\"width: "+dream1+"%\" data-toggle=\"tooltip\" title=\""+dream+" "+holma+"\"></div>"+
				"</div>"+
					
				"</div>"+
				"</div>"+
			"</div>";
		holma = "holma";
	}
	document.getElementById("statOutput").innerHTML = stat;	
}