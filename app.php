<!DOCTYPE>
<html>
	<head>
		<meta http-equiv="content-type" content="text/xml;
		charset=utf-8" />
		<link rel = "stylesheet" type="text/css" href="sauce.css" />
		<script src ="formjs.js"></script>
		 <script src="jquery-1.10.2.min.js"></script>
		 <script src="jquery-ui-1.10.3\ui\jquery-ui.js"></script>
		 <script src ="bigone.js"></script>

		<title>TURF LOG </title>

	</head>
 <body>
	 
<h1> TURF LOG </h1>

<div id ="cleartop">

 <div id = "leftdata">
   <p class ="fonts">
   <!-- The Form here is more just for style and I might do something with it later. -->
   <form action = "better.php"
		method = "post">
		
		Canvasser: <input type="text" name="Canvasser" value="" size="12" min="1" max="30" /><br />
        Field Manager:  <input type="text" name="Field_Manager" value="" size="12" min="0" max="30" /><br />
		Municipality: <input type="text" name="Municipality" value="" size="20" min="0" max="20" /><br />
		Day: <input type="text" name="Day" value="<?php echo date("D-m-d-Y")?>" /><br />
		Zip: <input type="text" name="Zip" size="5" min="0" max="999999" /> <br />
		
		<input type = "submit">
		</form>

   </p>
  </div>

  <div id = "rightdata">
   <p class = "fonts"> 
		<strong>Codes for Comments:</strong><br />
		<strong>NH</strong> = Not Home<br />
		<strong>CB</strong> = Come Back (specify reason, time later that night or another date)<br />
		<strong>Yes-R</strong> = Yes, renewed membership (write amount in Result box)<br />
		<strong>Yes-NM</strong> = Yes, became a new member (write amount in Result box)<br />
		<strong>Yes-C</strong> = Yes, gave a contribution (write amount in Result box)<br />
		<strong>X</strong> = Not interested, or refused to contribute<br />

		
    </p> 
   </div>
</div>

<div id = "travel">
		<form action = " ">
			<fieldset>
				<label>Travel: </label>
					<input type = "number" size="5" max="250"
					id = "mileage"  />
		<button type = "button"
		onclick = "calcGas()">
	Get Gas
		</button> <!-- EXPERIMENTAL STUFF! NONE OF THIS ACTUALLY DOES ANYTHING YET! -->
				<label>R/A</label>
					<input type = "text"
					id = "ra" />
				<label>Can</label>
					<input type = "number" size="3" min="0" max="200"
					id = "can" />
				<label>Cash</label>
					<input type = "text" size="5" min="0"
					id = "cash" />
				<label>Check</label>
					<input type = "text" size="5" min="0"
					id = "check" />
				<label>CD</label>
					<input type = "text" size="5" min="0"
					id = "cd" />
				<label>Total<label>
					<input type = "text" size="6" min="0"
					id = "dailytotal" />
		                     <!-- -->
			</fieldset>
		</form>
 
   <div id = "divOutput">
Watch space
   </div>
</div>

<div id= "main">
<script type="text/javascript"> <!-- THIS IS WHERE ALL THE MAGIC HAPPENS! -->
function addRow(r) {
    var root = r.parentNode; //the root
    var allRows = root.getElementsByTagName('tr'); //the rows' collection
    var cRow = allRows[0].cloneNode(true); //the clone of the 1st row
    var cInp = cRow.getElementsByTagName('input'); //the inputs' collection of the 1st row
    for (var i = 0; i < cInp.length; i++) { //changes the inputs' names (indexes the names)
        cInp[i].setAttribute('name', cInp[0].getAttribute('name') + '_' + (allRows.length + 1));
    }
    var cSel = cRow.getElementsByTagName('select')[0];
    cSel.setAttribute('name', cSel.getAttribute('name') + '_' + (allRows.length + 1)); //change the selecet's name
    root.appendChild(cRow); //appends the cloned row as a new row
}
<!-- This code "works" but what it really needs is some error checking to make sure you can't delete the first row. -->

function delRow(node) {
    node.parentNode.removeChild(node);
}

<!-- Still working on this function because I don't like the address number getting repeated -->
function clearaddy() {
	space = document.getElementById("Number");
	if (space != ""){
	space = "";
	}
}

</script>

<form action="" method="get">
    <table width="766" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="180">
                <input type="number" name="Number" size="5" placeholder="#" min="0" max="99999" value="" />
            </td>
            <td width="180">
                <input type="text" name="Street" placeholder="StreetName" max="25" />
            </td>
            <td width="180">
                <select id="dropage">
                    <option value="" selected="selected">Select Value</option>
                    <option value="NH">NH</option>
                    <option value="CB">CB</option>
                    <option value="Yes-R">Yes-R</option>
                    <option value="Yes-NM">Yes-NM</option>
                    <option value="Yes-C">Yes-C</option>
                    <option value="X">X</option>
                    <td width="191">
                        <input type="number" name="Amount" size = "7" placeholder="Amount" min = "0" max = "10000" />
                    </td>
                </select>
            </td>
            <td width="286">
                <input name="button" type="button" value="+" onclick="addRow(this.parentNode.parentNode);clearaddy();"> <!--remember to insert init(); when bigone.js is done -->
				<input name="button" type="button" value="-" onclick="delRow(this.parentNode.parentNode);">
            </td>
        </tr>
    </table>
    <br />
    <br />
    <input name="" type="submit" value="Submit" />

    <!-- Math checks!!!! **********PROBABLY GOING TO USE PHP PRINTS INSTEAD-->
    <div id="CBOutput">Callbacks</div>
    <div id="NHOutput">Not Homes</div>
    <div id="YESROutput">Renewals</div>
    <div id="YESCOutput">Yes Contributors</div>
    <div id="YESNMOutput">New Members</div>
    <div id="XOutput">Refusals</div>
	<div id="Grandtotal">Total</div>
</form>
</div> <!-- Ending div for main -->

  </body>
 </html>
