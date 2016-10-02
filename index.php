<?php
require_once("Lyft.php");

function dollarConversion($convNum, $dollarConv){
	$cents = (int)($convNum % $dollarConv);
       	$dollar = (int)($convNum/$dollarConv);
        if( $cents < 10 ) {
        	$cents = '0' . $cents;
        }
	echo '$' . $dollar . '.' . $cents;
}

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
						echo 'Base Charge: ';
						dollarConversion($prices, $dollarConv);
						echo '<br>';
					}
					elseif($names == 'cost_per_mile'){
						echo 'Cost per Mile: ';
						dollarConversion($prices, $dollarConv);
						echo '<br>';
					}
					elseif($names == 'cost_per_minute'){
						echo 'Cost per Minute: ';
						dollarConversion($prices, $dollarConv);
						echo '<br>';
					}
					elseif($names == 'cost_minimum')
					{
						echo 'Minimum Cost: ';
						dollarConversion($prices, $dollarConv);
						echo '<br>';
					}
					elseif($names == 'trust_and_service')
					{
						echo 'Trust and Service Fee: ';
						dollarConversion($prices, $dollarConv);
						echo '<br>';
					}
					elseif($names == 'currency')
					{
						echo 'Currency: '. $prices;
						echo '<br>';
					}
					elseif($names == 'cancel_penalty_amount')
					{
						echo 'Cancal Penalty Fee: ';
						dollarConversion($prices, $dollarConv);
						echo '<br>';
					}	
				}
			}
		?>
	</body>
</html>
