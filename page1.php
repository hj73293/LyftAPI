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

function getTotal($RideData){
	if( isset($_GET['minutes']) ){
		$totalPrices = array();
		foreach($RideData->ride_types as $ride){
			$total = 0;
			foreach($ride->pricing_details as $names => $prices){					
				if($names == 'base_charge'){
                           	     $total = $total + ($prices/100);
                                }
                                elseif($names == 'cost_per_minute'){
                	                $total = $total + (($prices/100) * $_GET['minutes']);
                                }				
			}
			$totalPrices[$ride->ride_type] = $total;
		}
	return $totalPrices;
	}
}

function printAllTotal($priceArray){
	if( isset($_GET['minutes']) ){
		echo '<br>';
		foreach($priceArray as $name => $value){
			echo 'Estimated cost of a ' . $name . ': ' . '$' . $value . '<br>';
		}
	}
}

function printTip($total){
	if( isset($_GET['tip']) ){
		echo '<br>Estimated tip amount: $' . round($total * $_GET['tip']/100, 2) . '<br>';
	}
}

function printTotal($priceArray){
	if( isset($_GET['minutes']) ){
		echo '<br>';
		echo 'Estimated cost of a ';
		echo $_GET['ride_type'] . ': $';
		if( $_GET['ride_type'] == "Lyft Line" ){
			$total = $priceArray['lyft_line'];
			echo $total;
			printTip($total);
		}
		elseif( $_GET['ride_type'] == "Lyft" ){
                        $total = $priceArray['lyft'];
			echo $total;
			printTip($total);
                }
		elseif( $_GET['ride_type'] == "Lyft Plus" ){
			$total = $priceArray['lyft_plus'];
			echo $total;
			printTip($total);
		}
	}
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
		</headeri>
		<?php
			$totalArray = getTotal($RideData);
			printTotal($totalArray, $RideData);
		?>
		<form action="index.php" method="GET">
			<label for="ride_type">Select a ride type: </label>
			<select name="ride_type">
				<?php
				foreach( $RideData->ride_types as $ride ){
				?>
					 <option value="<?php echo $ride->display_name; ?>"><?php echo $ride->display_name; ?></option>
				<?php
				}
				?>
			</select>
			<br><label for="minutes">Estimate minute to destination: </label>
			<input type="text" name="minutes" id="minutes" required>
			<br><label for="tip">Enter tip(%)</label>
	     		<input type="text" name="tip" id="tip">
			<br><input type="submit" name="submit" id="submit">	
		</form>
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
