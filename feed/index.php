<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/feed/index.php'){
    die("Not allowed back here!");
}

require '../protected/functions.php';
switch($_GET['feed']){
	case 'rSearch':
		if (isset($_GET['id']) && $_GET['id'] > 0) {
				# code...
			$info = rFeed($_GET['id']);
			//array shift pops the first element into the var removing it from the rest of the array.
			$oPlace = array_shift($info);
			$cPlace = array_shift($info);
			if ($cPlace <= 2) {
				# code...
				$count = 5;
			}else{
				$count = 4;
			}

			echo "<p>Your overall place is $oPlace.</ br> Your place in catigory is $cPlace</p>";
			?>
			<p>
			<table>
			<tr>
				<td>
					Name
				</td>
				<td>
					Bib
				</td>
				<td>
					Time
				</td>
			</tr>
			<?php
			for ($i=0; $i < $count; $i++) { 
				# code...
				$tag = $info[$i]['id'];
				$fname = $info[$i]['fname'];
				$bib = $info[$i]['bib'];
				$place = $info[$i]['cPlace'];
				$time = $info[$i]['time'];
				if ($tag == $_GET['id']) {
					# code...
					echo "<tr><td><strong>$place</strong></td><td><strong>$fname</strong></td><td><strong>$bib</strong></td><td><strong>$time</strong></td></tr>";
				}else{
					echo "<tr><td>$place</td><td>$fname</td><td>$bib</td><td>$time</td></tr>";
				}
				
			}
			?>
			</table>
			<?php
			//I will need to format the data with a foreach after I pop the place key from the array only leaving the racers list.
			}else{
				echo "Sorry captain just can't do it. Something went wrong!";
			}	
	break;
	case 'tvFeed':
		require 'fViews/tvFeed/index.php';
	break;
	case 'Lboard':
		echo "Leader board results";
	break;
	case 'raceCat':
		$date = date('Y');
		$sql = "SELECT * FROM raceCat WHERE year=$date";
		$results = DbConnection($sql);
		$tenkf = "";
		$halfmilef = "";
		$twomilef = "";
		$tenkm = "";
		$halfmilem = "";
		$twomilem = "";
		print_r($results);
/*		foreach ($results as $key => $value) {
			# code...
			if (strlen($value['TwoMileF']) > 0) {
				# code...
				$type = 'TwoMileF';
				$item = $value[$type];
				$twomilef .= "<tr><td><label>$item<input type='submit' hidden='true' name='$type' value='$item'></label></td></tr>\n";
			}
			if (strlen($value['TwoMileM']) > 0) {
				# code...
				$type = 'TwoMileM';
				$item = $value[$type];
				$twomilem .= "<tr><td><label>$item<input type='submit' hidden='true' name='$type' value='$item'></label></td></tr>\n";				
			}
			if (strlen($value['HalfMileF']) > 0) {
				# code...
				$item = $value['HalfMileF'];
				$halfmilef .= "<tr><td>$item</td></tr>";
			}
			if (strlen($value['HalfMileM']) > 0) {
				# code...
				$item = $value['HalfMileM'];
				$halfmilem .= "<tr><td>$item</td></tr>";
			}
			if (strlen($value['TenKF']) > 0) {
				# code...
				$item = $value['TenKF'];
				$tenkf .= "<tr><td>$item</td></tr>";
			}
			if (strlen($value['TenKM']) > 0) {
				# code...
				$item = $value['TenKM'];
				$tenkm .= "<tr><td>$item</td></tr>";
			}
		}*/
		echo "<form action='index.php' method='POST'>
<table border=\"1\">
	<tr>
		<td>
			Mens
		</td>
		<td>
			Female
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td>
						<strong>Men's Two Mile </strong> 
					</td>
				</tr>
				$twomilem
			</table>
		</td>
		<td>
			<table>
				<tr>
					<td>
						<strong>Women's Two Mile</strong> 
					</td>
				</tr>
				$twomilef
				
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td>
						<strong>Men's Ten K</strong> 
					</td>
				</tr>
				$tenkm
			</table>
		</td>
		<td>
			<table>
				<tr>
					<td>
						<strong>Women's Ten K</strong> 
					</td>
				</tr>
				$tenkf
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table>
				<tr>
					<td>
						<strong>Men's Half Mile</strong> 
					</td>
				</tr>
				$halfmilem
			</table>
		</td>
		<td>
			<table>
				<tr>
					<td>
						<strong>Women's Half Mile</strong> 
					</td>
				</tr>
				$halfmilef
			</table>
		</td>
	</tr>
</table>
</form>
		";
	break;
}