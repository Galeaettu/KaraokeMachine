//Getting Letter Used
function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}	
var letter1 = getUrlParameter('letter');	

var letterChosen;
if (letter1 == 'ALL'){
	letterChosen = 'Kliem Kollha';
}
else{
	letterChosen = letter1;
}
//----

var words = [
{"Kelma":"Aska","Tifsira":"Tfajla mil-lvant, mehudha izda hielsa, sorm tajjeb, taghti ratings gholjin."},
{"Kelma":"Borma","Tifsira":"Kazzola normali."},
{"Kelma":"Coffee Girl","Tifsira":"Qatt ma waslu sa kafe."},
{"Kelma":"Convenience","Tifsira":"'Konvenjenti' kienet il-kelma li ghenet lil Gilbert fl-interview biex jakkwista post bhala Mr.Facing at Hal Qormi"},
{"Kelma":"Cirku","Tifsira":"L-istat naturali tal-Companeros"},
{"Kelma":"Dan","Tifsira":"ara 'Sess'."},
{"Kelma":"Dreadlokku","Tifsira":"Bniedem misterjuz b'access ghal haxixa projbita."},
{"Kelma":"Dahhluni","Tifsira":"Kelma li tlissen roxanne kull darba li nuzaw skype."},
{"Kelma":"Empiriku","Tifsira":"Kelma tqila ta Gilbert"},
{"Kelma":"Fahga","Tifsira":"Persuna inkompetenti, ccassata, u li qas biss tipprova titjieb."},
{"Kelma":"Farmhouse ta' Larissa","Tifsira":"Zmien ikrah - uhud jafuh bhala world war 3."},
{"Kelma":"Firkas","Tifsira":"Derivazzjoni rroxxjata ta' filkas."},
{"Kelma":"Flirting","Tifsira":"Ghal iktar pariri ikkuntattja lil Mark Deguara fuq 79909817 - espert fil-qasam."},
{"Kelma":"Farmhouse","Tifsira":"Kelma li tqabbad dagha u affarijiet mixtieqa."},
{"Kelma":"Gastarbayterami","Tifsira":"L-ewwel isem ufficjali tac-chat"},
{"Kelma":"Herb","Tifsira":"Tfajla wisq 'cute, intelligenti' (mehudha mid-djarju ta' G. Tanti)."},
{"Kelma":"Ingombranti","Tifsira":"Meta xi hadd jaghti fastidju lil zammitellu."},
{"Kelma":"Inkapaci","Tifsira":"Il-hairdresser ta gilbert"},
{"Kelma":"IC","Tifsira":"'jien qed nara' - uzata l-iktar minn M.Deguara u Karl; projbita ghall-bqija."},
{"Kelma":"IT Services","Tifsira":"Kamra fl-universita ppjanata ghal student diligenti biex jahdmu - uzata ghal Pictionary, luana sightings, movie shootings, showing ta ftit xeni minn 50 shades of grey"},
{"Kelma":"Johnnies","Tifsira":"It-tfajliet identici ta' John-Luke - sharing is caring."},
{"Kelma":"Kiwi Dance","Tifsira":"zifna ezotika mibnija fuq il-mossi senswali ta R.Borg - intweriet ghal-ewwel darba fuq il-bajja ramlija tal-Gnejna."},
{"Kelma":"Karaoke","Tifsira":"Ghawg ghal min ikollu joqghod ghalihom (earplugs suggested)"},
{"Kelma":"Karl","Tifsira":"Il-guvni ta R.Borg li kien student mal-bqija tal-companeros; kurjuz; ihobb ir-ramel. Frazijiet li ghandhom jibqghu imfakkra: 'fuqiex qed tahseb?', 'u issa?', 'kif taghmel french kiss?'"},
{"Kelma":"Kwazi","Tifsira":"Normalment repetuta, tintqal meta tkun kwazi hemm."},
{"Kelma":"LAW","Tifsira":"1) love 2) adventure 3) wisdom: terminologija msejsa minn G.Tanti; fil-prattika tohrog fid-dieher f' 1) Luana - 2) Tiekol kappara - 3) tippostja l-kitkats fuq xulxin."},
{"Kelma":"L-ispera","Tifsira":"Derivazzjoni bbenjata ta' nispera."},
{"Kelma":"Luana","Tifsira":"Xofftejha messew dawk ta' G.Tanti u M. Deguara f'din l-ordni - tfajla specjali."},
{"Kelma":"Loky","Tifsira":"Missier iswed li bbumja birra kiesha bl-irhis"},
{"Kelma":"Myreah","Tifsira":"Djalett ta' larissa"},
{"Kelma":"Prom","Tifsira":"G. Tanti u Luana esprimew xi affarijiet lejn xulxin (allegatament G.Tanti staqsa ghan-numru taghha qabel, ghal xi 'notes'. Fatti mhux konkluzivi - raguni dubjuza)."},
{"Kelma":"Qahba","Tifsira":"Nom propju ghal omm gilbert."},
{"Kelma":"Qallut","Tifsira":"Haga li giet f'ras Gilbert meta ra lil Myriah."},
{"Kelma":"Rosie","Tifsira":"iz-zija ta' Gilbert, li dejjem tisma izda le tidher."},
{"Kelma":"Rose","Tifsira":"Ghal ghoxxi!"},
{"Kelma":"Sess","Tifsira":"lol"},
{"Kelma":"Stukku tal-Knorr","Tifsira":"L-ikel favorit tan-nanna."},
{"Kelma":"Serp","Tifsira":"Animal imxebbah ma' Myriah."},
{"Kelma":"Spaucy","Tifsira":"Amalgamazzjoni ta' spicy u saucy."},
{"Kelma":"Sur","Tifsira":"Maqrut, tazza te/cafe, ftit cajt doppju sens - ljieli sajfin"},
{"Kelma":"Skype","Tifsira":"Teknologija avvanzata li ftit persuni jafu juzawha."},
{"Kelma":"Te","Tifsira":"Ix-xarba ideali biex tirrilassa qabel xi storja, jew qabel xi glieda"},
{"Kelma":"V-Card","Tifsira":"Il-fjura ghadha ma gietx ippenetrata miz-zunzana."},
{"Kelma":"Vexillina","Tifsira":"Il-hanut ta' Mark il-bjond li ssibblu kollox, mil-izghar gomma, sa l-ikbar pitazz."},
{"Kelma":"Vodka Milk","Tifsira":"Ix-xarba ideali ta' Mark."},
{"Kelma":"Xlendi","Tifsira":"L-art imwieghda."},
{"Kelma":"BOV","Tifsira":"Ara Blue Creek"},
{"Kelma":"Blue Creek","Tifsira":"Fejn jahdem Chris"},
{"Kelma":"Gilbertata","Tifsira":"Taghmel xi haga minghajr ma tahsibha."},
{"Kelma":"Bennata","Tifsira":"Tikxef sigriet ta' siehbek"},
{"Kelma":"Gbejniet","Tifsira":"Daqs l-ghogol tad-deheb nafu jezistux"},
];


words.sort(function(a, b){
    if(a.Kelma.toLowerCase() < b.Kelma.toLowerCase()) return -1;
    if(a.Kelma.toLowerCase() > b.Kelma.toLowerCase()) return 1;
    return 0;
})

//Printing table
var i;
var wordFound = 0;
var out = 
		"<div class=\"panel panel-default\">"+
			"<div class=\"panel-heading\"><h1>"+letterChosen+"</h1></div>"+
				"<table class=\"table table-striped table-hover\">"+
					"<tr>"+
					  "<th class=\"kelma\">Kelma</th>"+
					  "<th>Tifsira</th>"+
					"</tr>";

for(i = 0; i < words.length; i++) {
	if (letter1 == 'ALL'){
		wordFound = 1;
		out += 
			"<tr>"+
			  "<td class=\"kelma\">"+words[i].Kelma+"</td>"+
			  "<td>"+words[i].Tifsira+"</td>"+
			"</tr>";
	}
	else if (words[i].Kelma.charAt(0) == letter1){
		wordFound++;
		out += 
		"<tr>"+
		  "<td class=\"kelma\">"+words[i].Kelma+"</td>"+
		  "<td>"+words[i].Tifsira+"</td>"+
		"</tr>";
	}	
}
if (wordFound == 0){
	for(i = 0; i < 1; i++) {
		out += 
			"<tr>"+
			  "<td class=\"kelma\">N/A</td>"+
			  "<td>N/A</td>"+
			"</tr>";	
	}
}

out += "</table></div>";
document.getElementById("wordsTable").innerHTML = out;

var alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

var charKelma = [];

var l;
for(l = 0; l < words.length; l++) {
	charKelma[l] = words[l].Kelma.charAt(0);
}
charKelma = charKelma.sort();

function isInArray(s,charKelma) {
    for (var i = 0; i < charKelma.length; i++) {
        if (charKelma[i].toLowerCase() === s.toLowerCase()) return true;
    }
    return false;
}

var z;
function missingLetterAdd(){
	var check;
	for (z = 0; z < alphabet.length; z++){
		check = isInArray(alphabet[z], charKelma);
		if (check == false||true){
			charKelma.push(alphabet[z]);		
		}
	}
}

function foo(charKelma) {
    var b = [], prev;
    missingLetterAdd();

    charKelma.sort();
    for ( var i = 0; i < charKelma.length; i++ ) {
        if ( charKelma[i] !== prev ) {

            b.push(1);
        } else {
            b[b.length-1]++;
        }
        prev = charKelma[i];
    }
    var j;
    var k;
    for (j = 0; j < b.length; j++){
    	k = b[j] - 1;
    	b[j] = k;
    }
    
    return [b];
}

var result = foo(charKelma);


function wrongPage(){
	var letterError =		
		"<div class=\"alert alert-danger col-md-4\" role=\"alert\">"+
		  "Din il-pagna ma tezistix. Mur lura ghad-<a onclick=\"window.location.href('index.html')\" class=\"alert-link\">Dizzjunarju</a>."+
		"</div>";
	var check = 0;
	for(var i = 0; i<alphabet.length; i++){
		if (alphabet[i].indexOf(letter1) != -1 || letter1 == 'ALL'){
			check = 1;
			break;
		}
	}
	if (check == 0){
		document.getElementById("letterError").innerHTML = letterError;	
	}
}

