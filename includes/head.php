<html>
	<!-- 
		Aside from CSS, nothing in the document head is being implemented for this demonstration.
		In live circumstances, we would assign each of these variables before requiring the head.php
		script. Most of the info here is for SEO.
	-->
	<head>
		<title><?php echo $PAGETITLE; ?></title>
		
		<?php
		
			if(isset($ROBOTS)){
				if(gettype($ROBOTS) == "string"){
					echo $ROBOTS;
				}else if($ROBOTS === false){
					echo "<meta name='robots' content='noindex'>";
				}
			}
		
			if(isset($CANONICAL)){
				echo "<link rel='canonical' href='".$CANONICAL."' />";
			}
				
			if(isset($METADESCRIPTION)){
				echo "<meta name='description' content='".$METADESCRIPTION."'/>";
			}
			
			if(isset($KEYWORDS)){
				echo "<meta name='keywords' content='".$KEYWORDS."'/>";
			}
	
		?>
		
		<link rel="stylesheet" type="text/css" href="../style/style.css" />
		<link rel="shortcut icon" type="image/x-icon" href="../image/icon.ico" />
	</head>
	<body>