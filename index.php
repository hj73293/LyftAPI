<?php
require_once("Lyft.php");

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Lyft</title>
	</head>

	<body>
		<header>
			Welcome to Lyft?
		</header>
		<?php
			$dollarConv = 100;
			foreach( $RideData->ride_types as $ride ){
				echo '<h3>'. $ride->display_name . '</h3>';
				echo '<img src='.$ride->image_url.'>';
				echo '<p>Pricing details: <br>';
				foreach( $ride->pricing_details as $names => $prices)
				{
					if($names == 'base_charge'){

					}
					
				}
			}
		?>
	</body>
</html>
