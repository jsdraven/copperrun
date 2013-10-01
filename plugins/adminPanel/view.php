<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$body .="
	<table border=1 >
		<tr>
			<td>
				<form action='index.php' method='POST'>
					$views
				</form>
			</td>
			<td>
				<form action='index.php' method='POST'>
					$reports
				</td>
		</tr>
	</table>
";