<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/feed.php'){
    die("Not allowed back here!");
}
require 'functions.php';
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
		echo "TV Feed Result Page!";
	break;
	case 'Lboard':
		echo "Leaber board results";
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
		foreach ($results as $key => $value) {
			# code...
			if ($key == 'TwoMileF') {
				# code...
				$twomilef = "<tr><td>$value</td></tr>";
			}
			if ($key == 'TwoMileM') {
				# code...
				$twomilem = "<tr><td>$value</td></tr>";
			}
			if ($key == 'HalfMileF') {
				# code...
				$halfmilef = "<tr><td>$value</td></tr>";
			}
			if ($key == 'HalfMileM') {
				# code...
				$halfmilem = "<tr><td>$value</td></tr>";
			}
			if ($key == 'TenKF') {
				# code...
				$tenkf .= "<tr><td>$value</td></tr>";
			}
			if ($key == 'TenKM') {
				# code...
				$tenkm = "<tr><td>$value</td></tr>";
			}
		}
		echo "
<table>
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
<tr><td>Two Mile</td></tr>


		";
	break;
}