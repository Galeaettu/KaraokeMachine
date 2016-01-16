var christianDreams = [
    {"name":"Christian","id":"ch1","title":"Wrecking of Miley","dream":"Illum hlomt li jien kont ma Emily Osment u hi kienet undercover blogger, qed tikteb fuq miley. Kont hdejha waqt li qed iggib xi evidenza kontriha. Imbad morna naraw film u il line kien twil, raha l bouncer tas cinema u dahhalna bxejn. Qabel il film beda trailer u bdejna nidhqu bil vuci tieghu.  Wara rajna lil miley u kienet libsa flokk roza imma kien imxaqleb u kellha spalla u boob barra, in nipple kienet kannella mqabbza.  Ghal xi raguni il post waqa fuq miley u beda jinzel slo motion fuqha waqt li tghid nooooo."},
    {"name":"Christian","id":"ch2","title":"Lobsters u monasteri","dream":"Hlomt li konna go monasteru kbir ghal live in bhafna kmamar u kien f post fejn l ghelieqi u l gonna. Qadna nduru fil kampanja u nilabu. Konna qedin nieklu xi haga f sala kbira u jien m ghogobnix l ikel, kellimt lil patri u ghamilli ross bil king prawns u lobster. Jien kont qed nitkellem makom chat u bdejt nara l kliem tieghi jinbidel fuq l screen, imbad ninduna li Ben skopra l password tieghi u beda jbiddilli kollox. Imma kont cert li ma seta jamel xejn bil Google ghax ghandi t 2 factor authentication."},
    {"name":"Christian","id":"ch3","title":"Sausage rolls imqaddsa","dream":"Hlomt li kont qijad namel sausage rolls imma l ghagina kienet blue u vjola. Qadt nirrumblaha u nghaginha. Gibtha dritta, qadt naqta z zliezet u npoggihom gol ghagina. Imbad qabel ma nahmihom kelli bzonn nitfa stampa ta min se jiekol is sausage roll fuq l ghagina. Qadt niehu passport photo, nillaminah u nwahhlu. Imma biex niehu ritratt tagghom kelli nkun cert li jemmnu f Gesu. Wara kelli zalzett kbir li kien se jkun ta 3 min nies imma ma kellix ghagina bizejjed allura tfajtu go borza tal karti kannella u wahhalt ir ritratti u imbad hmejt kollox. Wara xi ftit ftaht il forn biex indawwarhom ha jsiru sew u giet ommi insaqsi ghala iz zalzett qijad gol karti."},
];

var benjaminDreams = [
	{"name":"Benjamin","id":"be1","title":"Jeff il-fann","dream":"Qieghed trapped go kamra taht l-art. qieghed mall-karattri ta community. Jeff jghidilna li hiereg jiccekkja xi haga. Kollha nghidulu biex ma jmurx imma jinsisti. Wara ftit nibdew insaqsu lil xulxin fejn hu Jeff. F'daqqa wahda jinxteghel fann. Indur lejn il-fann u jisparixxi. Indur inhares fejn kont u nara l-fann quddiemi. Jaqa l-cover tal-fann u l-fann jibda riesaq lejja. Nirrealizza li Jeff sar fann. Ikompli jersaq lejja (hopping). Jien nersaq lura ghadni ma rridx nemmen. Jasal go fija u nghajjat \"JEEEFFF\". Inqum mahsud."},
	{"name":"Benjamin","id":"be2","title":"Traps and computer chairs","dream":"kont qieghed il-belt, kont liebes gakketta, kelli l-kartiera u l-mobile fiha. rajt wahda mara u bdejt nistalkja a la cia f'homeland eventwalment spiccajt id-dar. Irrealizzajt li hallejt il-gakketta bl-affarijiet fiha l-belt. Ma kellix karozza allura l-unika mod ta trasport kien is-siggu tal-computer. Hrigt bis-siggu tal-computer fit-toroq ta' malta, inkaxkru b'sieqi. Kull tant inqum u ngorr lis-siggu fuq dari, umbghad nergaw niswitchjaw. Nasal il-belt u ma nsibx l-affarijiet li hallejt warajja. Ninza l-gakketta ghax inkun qed inhoss is-shana. Nirrealizza li l-istess gakketta li tlift actually kienet fuq spallti, nijjogja lura d-dar u nghaddi minn quddiem vetrina jghaddi xih minn quddiem il-vettrina, warajja tghajjat tfajla minn gol vettrina biex tghidlu li qas hu kapaci jigri hazin daqsi ahseb u ara jigri normali. Indur ishockjat, u f'qalbi bdejt nahseb \"bitch i can run better than you can walk\". umbghad hi tghid lix-xih l-istess haga. issa mahruq, immur inkellem lix-xih biex nikkumpatih u f'daqqa wahda jsir zewg tfajliet. nippanicja u nqum"},
	{"name":"Benjamin","id":"be3","title":"Starks and Porn","dream":"Dal-lejl hlomt li kelli noqghod nispjega porn site lil ommi u li kien joqghod tony stark id-dar, qaltli \"ghandek account ma porn site?!\" ghidtilha \"le le b'xej\". Dahlu l-puluzija jfittxu d-dar u sabu xebgha pupi ta tony stark."},
];

var myriahDreams = [
	{"name":"Myriah","id":"my1","title":"Draped desire","dream":"I moved in go palazz barokk vera sabih, hitan indurati u paintings, u tlajt fuq nett u kien em il kamra ta' mara hoxna u wiccha kien ta actress ta kathy bates! u f'kamarta kien em qisu show modern dancers lebsin kolla white anke wiccom motti bid drapp u qisom kolonni bojod bxi statute fuqom u kont naf li kelli option jew nibqa nara is show jew immur ma kathy bates for some action!!!!"},
];

var gilbertDreams = [
	{"name":"Gilbert","id":"gi1","title":"Il-giri tal-hut","dream":"Hlomt li konna go fetha quddiem il bahar u telet oarfish tigri warajja u bdejna nigru minn isu kurutur tal gebel sakemm flahhar addejna minn bieb ahmar li inalaq warajna. Wara gie Brock ta' Pokemon jghidilkom li se jsalvani hu."}
];
                     
//{"name":"","id":"ch2","title":"","dream":""},


function changeClass(id){
	applyChangeClass(id);
	setTimeout(function(){ document.getElementById(id).className = "panel panel-default"; }, 3000);
}

function applyChangeClass(id) {
    document.getElementById(id).className = "panel panel-primary";
}



var dreamC;
var dreamOut ="";
var dreamOut1 ="";
function generateDream(dreamIn){
	for (dreamC=0;dreamC<dreamIn.length;dreamC++){
		dreamOut +=
		"<div id="+dreamIn[dreamC].id+" class=\"panel panel-default\">"+
		"<div class=\"panel-heading\">"+
			"<h3 class=\"panel-title\">"+dreamIn[dreamC].title+"</h3>"+
			"</div>"+
			"<div class=\"panel-body\">"+
				"<p>"+dreamIn[dreamC].dream+"</p>"+
			"</div>"+
		"</div>";
	}
	dreamOut1 = dreamOut;
	dreamOut ="";
	return dreamOut1;
}


var listOut;
var ListOut1;
function dreamDropdown(dreamIn){
	listOut =
		"<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">"+dreamIn[0].name+"&nbsp<span class=\"badge\">"+dreamIn.length+"</span><span class=\"caret\"></span></a>"+
		"<ul class=\"dropdown-menu\">";
	
	for (dreamC=0;dreamC<dreamIn.length;dreamC++){		
		var h;
		listOut += "<li onclick=\"changeClass('"+dreamIn[dreamC].id+"')\"><a href=\"#"+dreamIn[dreamC].id+"\">"+dreamIn[dreamC].title+" </a></li>";
	}
	
	listOut += "</ul>";
	
	listOut1 = listOut;
	listOut ="";
	return listOut1;
}

document.getElementById("christianDream").innerHTML= dreamDropdown(christianDreams);
document.getElementById("benjaminDream").innerHTML= dreamDropdown(benjaminDreams);
document.getElementById("myriahDream").innerHTML= dreamDropdown(myriahDreams);
document.getElementById("gilbertDream").innerHTML= dreamDropdown(gilbertDreams);

document.getElementById("chDream").innerHTML= generateDream(christianDreams);
document.getElementById("beDream").innerHTML= generateDream(benjaminDreams);
document.getElementById("myDream").innerHTML= generateDream(myriahDreams);
document.getElementById("giDream").innerHTML= generateDream(gilbertDreams);
	
