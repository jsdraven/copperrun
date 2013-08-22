<?php
$programingCredit = "<h3>And programing is brought to you by Mother Lode Makers</h3>";
if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
	?>
	<table border=1 >
		<tr>
			<td>
				<form action='index.php' method='POST'>
					<input type="submit" name='set'	value='runnerSearch' />
					<input type="submit" name='set' value='runners' />
					<input type="submit" name='set' value='tvFeed' />
				</form>
			</td>
			<td>
				<form action='index.php' method='POST'>
					<!-- <input type='submit' name='reports' value='' /> !-->
					<input type='submit' name='reports' value='missingRunners' />
					<input type='submit' name='reports' value='twoMileResults' />
					<input type='submit' name='reports' value='halfMileResults' />
					<input type='submit' name='reports' value='tenKResults' />
				</td>
		</tr>
	</table>


	<?php
	if (isset($_POST['set'])){
		$choice = $_POST['set'].'.php';
	}elseif (isset($_POST['reports']){
		$choice = 'reports.php';
		$report = $_POST['reports'];
	}
	
	require $choice;

}else{
	
	require 'runnerSearch.php';
	
}
