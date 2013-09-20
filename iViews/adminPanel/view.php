<?php

$body .="
	<table border=1 >
		<tr>
			<td>
				<form action='index.php' method='POST'>
					<input type=\"submit\" name='set'	value='runnerSearch' />
					<input type=\"submit\" name='set' value='runnerRegi' />
					<input type=\"submit\" name='set' value='tvView' />
					<input type=\"submit\" name='set' value='raceCat' />
					<input type=\"submit\" name='set' value='publish' />
					<input type=\"submit\" name='set' value='finishLine' />
					<input type=\"submit\" name='set' value='flUpdate' />
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
";