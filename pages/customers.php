<?php
	
	$PAGETITLE = "";
	$CANONICAL = "";
	$KEYWORDS = "";
	$METADESCRIPTION = "";
	
	require_once "../includes/classes.php";
	
	$deleted = globals::GetPlainString('deleted');
	$output = "";
	if($deleted == "true"){
		$output = "Your customer was successfully deleted.";
	}else if($deleted = "false"){
		$output = "Your customer was not deleted.";
	}
	
	$customers = Customers::GetAll($connection);
	$customersJSON = json_encode($customers);
	
	require_once "../includes/head.php";
	require_once "../includes/header.php";

?>
	
		<div id='content'>
			<h2>Customers</h2>

			<span id='fademessage' style='opacity:1'><?php echo $output; ?></span><br>
			
			<table id='customertable'>
			
			<?php
				
				/*
					Note that we're using PHP to output our table here, 
					but front end developers might be more comfortable 
					using the customersJSON variable provided to output a 
					table.
				*/
				
				foreach($customers as $k => $v){
					echo "<tr>";
					echo "<td>";
						echo "<a href='customeredit.php?customer=";
						echo Encrypt::encrypt_url($v['alpha']);
						echo "'>".$v['alpha']."</a>";
					echo "</td>";
					echo "<td>".$v['first']."</td>";
					echo "<td>".$v['last']."</td>";
					echo "<td>".$v['birthdateWord']."</td>";
					echo "<td>".$v['sexWord']."</td>";
					
					echo "<td>".$v['phone']."</td>";
					echo "<td>".$v['email']."</td>";
					echo "</tr>";
				}
			
			?>
			
			</table>
			
		</div>
		
		<script src='../scripts/fademessage.js'></script>
		
<?php

	require_once "../includes/footer.php";

?>