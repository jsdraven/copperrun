<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/adminPanel.php'){
    die("Not allowed back here!");
}
?>
	<table border=1 >
		<tr>
			<td>
				<form action='index.php' method='POST'>
					<input type="submit" name='set'	value='runnerSearch' />
					<input type="submit" name='set' value='runners' />
					<input type="submit" name='set' value='tvFeed' />
					<input type="submit" name='set' value='raceCat' />
				</form>
			</td>
			<td>
				<form action='index.php' method='POST'>
					<!-- <input type='submit' name='reports' value='' /> !-->
					<input type='submit' name='reports' value='missingRunners' />
					<input type='submit' name='reports' value='twoMileResults' />
					<input type='submit' name='reports' value='halfMileResults' />
					<input type='submit' name='reports' value='tenKResults' />
					<input type='submit' name='reports' value='editCatigories' />
				</td>
		</tr>
	</table>


	<?php
	if (isset($_POST['set'])){
		$choice = $_POST['set'].'.php';
	}elseif (isset($_POST['reports'])){
		$choice = 'reports.php';
		$report = $_POST['reports'];
	}else{
		$choice = 'runners.php';
	}
	