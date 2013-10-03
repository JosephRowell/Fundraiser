function init() {

//Globals

var cb = 0;
/*var nh = 0;
var yesR = 0;
var yesNM = 0;
var yesC = 0;
var x = 0;

var homes = 0;
var doors = 0;
var completes = 0;
var yesms = 0;
var yesconts = 0;
 //////////

var NHOutput = document.getElementById("NHOutput");
var yesROutput = document.getElementById("yesROutput");
var yesCOutput = document.getElementById("yesCOutput");
var yesnmOutput = document.getElementById("yesnmOutput");
var xOutput = document.getElementById("xOutput"); */

//var CBOutput = document.getElementById("CBOutput");



function cbstuff() {
//retrieve data
    var sel = document.getElementById('dropage');
//set up output string
var response = "<h5>Callbacks: </h5>";
response += "<ul> \n";
//step through options
	for (i = 0; i < sel.value; i++) {
		currentOption = sel[i]

	var cb = sel.value;
	if (cb == "CB") { //yes
		cb++; 
		response += " <li>" + currentOption.value + "<\/li> \n";
		alert("got selection right!");		
	 } //end if
} else {
	alert("try again");
	} //end for and else
	response += "<\/ul> \n";
	CBOutput = document.getElementById("CBOutput");
	CBOutput.innerHTML = response;
   }
   cbstuff();
}
