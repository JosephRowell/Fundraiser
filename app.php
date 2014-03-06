<!DOCTYPE>
<html>
<head>
	<meta http-equiv="content-type" content="text/xml;
		charset=utf-8" />
		<link rel = "stylesheet" type="text/css" href="sauce.css" />
		<script src ="formjs.js"></script>
		 <script src="jquery-1.10.2.min.js"></script>
		 <script src="jquery-ui-1.10.3\ui\jquery-ui.js"></script>
		<!-- <script src ="bigone.js"></script> -->

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
		
		Canvasser: <input type="text" name="Canvasser" value="" size="40" min="1" max="30" /><br />
        Field Manager:  <input type="text" name="Field_Manager" value="" size="40" min="0" max="30" /><br />
		Municipality: <input type="text" name="Municipality" value="" size="20" min="0" max="20" /><br />
		Day: <input type="text" name="Day" value="<?php echo date("D-m-d-Y")?>" /><br />
		Zip: <input type="text" name="Zip" size="5" pattern="^[0-9]{5}$" /> <br />
		
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
	<div class="travel">
    <form action=" ">
        <fieldset>
            <label>Travel:</label>
            <input type="number" size="3" max="200" id="mileage" name="mileage" />
            <button type="button" onclick="calcGas()">Get Gas</button>
			
			<!-- EXPERIMENTAL STUFF! NONE OF THIS ACTUALLY DOES ANYTHING YET! -->
				<label>Cash</label>
					<input type = "text" size="5" min="0"
					id = "cash" name = "cash" />
				<label>Check</label>
					<input type = "text" size="5" min="0"
					id = "check" name = "check" />
				<label>CD</label>
					<input type = "text" size="5" min="0"
					id = "cd" name = "cd" />
				<label>Total<label>
					<input type = "text" size="6" min="0"
					id = "dailytotal" name = "dailytotal" />
		                     <!-- -->
			</fieldset>
		</form>
 
   <div id = "divOutput">
Watch space
   </div>
</div>

<table id="dynatable" class="thelist"> <!--if I needed to start over, I'd do it from here -->
    <thead>
        <tr>
            <th>Number</th>
            <th>Address</th>
            <th>Code</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody class="tbod"> <!-- Append function starts here -->
        <tr>
            <td><input type="text" class="snumber" placeholder="#" name="snumber" autofocus  /> </td>
            <td><input type="text" class="address" placeholder="StreetName" name="address"     /> </td>
            <td>
                <select name="turfcode" class="turfcode">
                    <option value="">SELECT</option>
                    <option value="NH">NH</option>
                    <option value="CB">CB</option>
					<option value="X">X</option>
					<option value="YES-R">YES-R</option>
					<option value="YES-NM">YES-NM</option>
					<option value="YES-C">YES-C</option>
                </select>
            </td>
            <td><input type="text" name="amount" placeholder="Amount" /> </td>

			<!-- <td> <button class="addRow" id="addRow">+</button> </td> -->
			<td> <button class="remRow">-</button> </td>

        </tr>
    </tbody> 
	<tfoot>
		<tr>
            <td colspan="5" style="text-align: left;">
                <input type="button" class="addRow" value="Add Row" />
            </td>
        </tr>  
			
		<tr>
			<td colspan="">Amount Raised: $ <span id="totalnight"></span>   </td>
			<td colspan="">Homes: <span id="Homes"></span>  </td>
			<td colspan="">Callbacks: <span id="Callbacks"></span>  </td>
			<td colspan="">Completes: <span id="Completes"></span>  </td>
		</tr>
	</tfoot>
</table>
<script>
$(document).ready(function() {
	$(".remRow").hide();
	$("input[autofocus]").focus(); //move cursor to number
	
	//counts
	counter = 0;
	counter = $('#dynatable tr').length -2; // -2 because of addRow button and footer
	
	calls = 0;
    	calls = $('#dynatable tr').length -2;
	
	completes = 0;
    	completes = $('#dynatable tr').length -2;
	
	//turfval = $(this).closest('.turfcode').val()
	// 
	pp = $(this).closest('tr').prev().prev().children('.turfcode').val();
	pp2 = $(this).parent().prev('.turfcode').val();
	pp3 = $(this).parent().prev('tr').val();
	
		$('.turfcode').change(function() {   //Commented lines below for Debugging.
	//var tv = $(this).val();
  
 //calcCB( $('.addRow').prev('tr')[0] )
	//calcCB( $(this).closest("tr") ) //This 'works' but not quite what I want.
	//calcCB( $(this).closest('.turfcode').val() )
	//calcCB( row.prev() )
	//calcCB(turfval);
	//calcCB( pp2 );
   //calcCB( $(this).val() );
   //calcCB($(this).row);
   //alert (tv);
});    


$(".addRow").on("click", function () {

	    var newRow = $("<tr>");
        	var cols = "";
		
		
		cols += '<td><input type="text" placeholder="#" name="snumber' + counter +  '" /> </td>';
        	
        	cols += '<td><input type="text" placeholder="StreetName" class="address" name="address' + counter +  '"   /> </td>';
		
		cols += '<td><select name="turfcode' + counter + '" ><option value="">SELECT</option> <option value="NH">NH</option><option value="CB">CB</option><option value="X">X</option><option value="YES-R">YES-R</option><option value="YES-NM">YES-NM</option><option value="YES-C">YES-C</option></select></td>';
		
        	cols += '<td><input type="text" placeholder="Amount" name="amount' + counter + '" /> </td>';
		
		//cols += '<td> <button class="addRow">+</button> </td>';
		cols +=	'<td> <button class="remRow">-</button> </td>';  
		//calcCB($(this).closest("tr") ) //'works' but not the way I want it to.
		calcCB( $('.addRow').prev('tr') ) 
		
		
		
	$('.turfcode').on ("change", function() {
	//TODO: Debugging
});  
		
		
        newRow.append(cols);
        jQuery("table.thelist").append(newRow);
        counter++;
	$("#Homes").text((counter)-1); //display Homes in the designated spot.
	jQuery('html,body').animate({scrollTop:4000});
		
		
		
    }); //END ON CLICK
	
    $("table.thelist").on("change", 'input[name^="amount"]', function (event) {  //magical amounts
        calculateRow($(this).closest("tr"));
        calculateGrandTotal();	
    });
    
    $("table.thelist").on("click", ".remRow", function (event) {
        $(this).closest("tr").remove();
        calculateGrandTotal();
        counter --;
	$("#Homes").text((counter)-1);	
    });                                                                             
	

	
  }); //END READY
  


function calculateRow(row) {
	var price = +row.find('input[name^="amount"]').val();
	
}

function calculateGrandTotal() { 
	var grandTotal = 0;
	$("table.thelist").find('input[name^="amount"]').each(function () {
		grandTotal += +$(this).val();
	});
	$("#totalnight").text(grandTotal.toFixed(2)); 
}


function calcCB(row) { 
	var vala = row.find('.turfcode').val(); 
	var valb = row.find('.turfcode').parent().prev('.turfcode');                    
	
	alert('i selected: ' + valb +" " + vala + " " +pp+ " " +pp2 + " " + pp3 ); //Debugging
		if (vala == 'CB' || vala == 'NH'){
			alert('doing it right!')
			$("#Callbacks").text((calls)-1);
			calls++;
		} else if(vala !== 'CB' || vala !== 'NH')
			{
			alert('try again')
			$("#Completes").text((completes)-1);
			completes++;
			}		
				alert(vala); 
			}

//Test out some CSS
/*
            $("input").css("outline-color", "#ACAB99");
*/

 
</script> 

</body>
</html>
