<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	
	<title>Responsive Table</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="../css/Alt-style.css">
	
	<!--[if !IE]><!-->
	<style>
	
	/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 992px){
	
		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr { 
			display: block; 
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; }
		
		td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #eee; 
			position: relative;
			padding-left: 50%; 
		}
		
		td:before { 
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			top: 6px;
			left: 6px;
			width: 45%; 
			padding-right: 10px; 
			white-space: nowrap;
		}
		
		/*
		Label the data
		*/
		td:nth-of-type(1):before { content: "Username"; }
		td:nth-of-type(2):before { content: "First Name"; }
		td:nth-of-type(3):before { content: "Last Name"; }
		td:nth-of-type(4):before { content: "Email Id"; }
		td:nth-of-type(5):before { content: "Contact"; }
		/*td:nth-of-type(6):before { content: "Porn Name"; }
		td:nth-of-type(7):before { content: "Date of Birth"; }
		td:nth-of-type(8):before { content: "Dream Vacation City"; }
		td:nth-of-type(9):before { content: "GPA"; }
		td:nth-of-type(10):before { content: "Arbitrary Data"; }*/
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 320px; }
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: 495px; 
		}
	}
	
	</style>
	<!--<![endif]-->

</head>

<body>
<?php
	$con = new MongoClient();
			$db = $con->ICMAM;

			$collection = $db->users;

			$query= $collection->find();
			//$query->sort(array('UsersRegistered'=>-1));
			$results = iterator_to_array($query);
			//print_r($results);
			$temp=sizeof($results);
			$array_of_results[0]=current($results);
			//print_r($array_of_results[0]['UsersRegistered']);
			for($i=1; $i<sizeof($results);$i++)
			{
			
					$array_of_results[$i]=next($results);
			}
			//print_r($array_of_results);
			//exit();
?>

	<div id="page-wrap">

	<h1>Registered Users</h1>
  
	<!-- <p>Go to <a href="index.html">Non-Responsive Table</a></p>
    
	<p>This is the exact same table, only has @media queries applied to is so that when the screen is too narrow, it reformats (via only CSS) to make each row a bit like it's own table. This makes for much more repetition and vertical space needed, but it fits within the horizontal space, so only natural vertical scrolling is needed to explore the data.</p>
     -->
    <?php
		echo '<table>';
		echo '<thead>
		<tr>
			<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email Id</th>
			<th>Contact</th>

		</tr>
		</thead>';
		
		for($i=0;$i<sizeof($results);$i++)
		{
			echo '<tbody>
			<tr>
			<td>'.$array_of_results[$i]['Username'].'</td>
			<td>'.$array_of_results[$i]['FirstName'].'</td>
			<td>'.$array_of_results[$i]['LastName'].'</td>
			<td>'.$array_of_results[$i]['Email'].'</td>
			<td>'.$array_of_results[$i]['Contact'].'</td>
			
		</tr>
		</tbody>';
		}
		
		

		
	echo '</table>';
	?>
	
	</div>
		
</body>

</html>