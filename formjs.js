function calcGas() {
    mileage = document.getElementById("mileage");
    divOutput = document.getElementById("divOutput");
	if (mileage.value < 250) {
		mileage == mileage;
	} else {
		return false;
	}

    function askToll() {
        toll = parseFloat(prompt("What is the toll value?"));
        if (toll < 5 && toll > .15) {
            return Math.floor(toll * 100) / 100;
        } else {
            return false;
        }
    }

    function askcorFM() {
        corfm = prompt("Field Manager or Canvasser? f or c?");
        if (corfm == 'f') {
            corfm = parseInt(24);
        	return corfm;
        } else if (corfm == 'c') {
            corfm = parseInt(12);
		return corfm;
        } else {
            alert("something wrong ");
	    return false;
        }
    }

    gasm = mileage.value * .12 + askcorFM() + askToll();

    divOutput.innerHTML = gasm;
}
//This function is for clearing the number field when you press the "+" button. It does not work yet.
function clearaddy() {
     space = document.getElementById("Number");
     if (space != ""){
	return false;
     }
	
}
