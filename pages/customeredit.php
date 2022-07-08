<?php
	
	$PAGETITLE = "";
	$CANONICAL = "";
	$KEYWORDS = "";
	$METADESCRIPTION = "";
	
	require_once "../includes/classes.php";
	
	//Using the globals class, get the customer's ID (alpha) from the URL
	$alpha = globals::GetEncryptedInt('customer');
	
	//If no alpha was found, redirect to customers list
	if($alpha <= 0){
		header('location:customers.php');
	}

	//Otherwise, use the alpha to draw customer data from the database, convert to JSON string for JS to use.
	$customer = new Customer($connection, $alpha);
	$customerJSON = $customer->ReturnJSON();

	//Begin Page Output
	require_once "../includes/head.php";
	require_once "../includes/header.php";
?>
		
		<div id='content'>
			<h2>Customer Edit</h2>
				<span class='delete' onclick='Delete("<?php echo Encrypt::encrypt_url($customer->alpha); ?>")'>Delete Customer</span><br>
				<span id='fademessage' style='opacity:1'></span><br>
			
				<table>
				
				<?php
			
				echo "<tr><td>ID</td><td>".$customer->alpha."</td></tr>";
				echo "<tr><td>First</td><td><input type='text' value='".$customer->first."' id='first'/></td></tr>";
				echo "<tr><td>Last</td><td><input type='text' value='".$customer->last."' id='last'/></td></tr>";
				echo "<tr><td>Sex</td><td>";
					echo "<select id='sex'>";
					echo "<option value='1' ";
					echo $customer->sex == 1 ? "selected" : "";
					echo ">Male</option>";
					echo "<option value='0' ";
					echo $customer->sex == 0 ? "selected" : "";
					echo ">Female</option>";
					echo "</select>";
				echo "</td></tr>";
				echo "<tr><td>Birthdate</td><td><input type='date' id='birthdate' value='".$customer->birthdateValue."'/></td></tr>";
				
				echo "<tr><td>Phone</td><td><input type='text' id='phone' value='".$customer->phone."'/></td></tr>";
				
				echo "<tr><td>Email</td><td><input type='text' id='email' value='".$customer->email."'/></td></tr>";
				
				echo "<tr><td colspan='2'><button onclick=Save()>Save</button></td></tr>";
			
				?>
			
				</table>
			
		</div>
		
		<script src='../scripts/fademessage.js'></script>
		<script src='../scripts/ajax.js'></script>
		<script>
			/*
				Really, it would probably be easier to create a form and then Post data to a page to handle 
				saving to the database, but this method looks smoother, and gives us a chance to show off 
				a little JSON/AJAX
			*/
		
			//Transfer JSON from PHP to JS
			json = JSON.parse("<?php echo $customerJSON; ?>");
			
			function Save(){
				//Modify JSON with new data
				json.first 		= document.getElementById('first').value;
				json.last 		= document.getElementById('last').value;
				json.sex 		= document.getElementById('sex').value;
				json.birthdate 	= document.getElementById('birthdate').value;
				json.phone 		= document.getElementById('phone').value;
				json.email 		= document.getElementById('email').value;
				
				//Implement ajax.js
				fix = saveout;
				url = "../ajax/customeredit.php";
				string = "JSON="+JSON.stringify(json);
				
				request(fix, url, string);
			}

			//Output result
			function saveout(text){
				if(text == "true"){
					fademessage.innerHTML = "Your customer was saved.";
				}else{
					fademessage.innerHTML = "Your customer was not saved.";
				}
				fademessage.style.opacity = 1;
			}
			
			function Delete(customerString){
				if(confirm("Are you sure you want to delete this customer forever?")){
					window.location.assign('customerdelete.php?delete='+customerString);
				}
			}
		
		</script>
		
<?php

	require_once "../includes/footer.php";

?>