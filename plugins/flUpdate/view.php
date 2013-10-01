<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$body .="
<p>
<form action='index.php' method='POST'>
<label>Place Number: <input type='number' name='place' tabindex='1' autofocus /></label>
<label>Time:<input type='number' name='bib' tabindex='2' /> </label>
<br />
<select name='race' tabindex='3'>
	<option>
		Choose one..
	</option>
	<option value='half'$half>
		Half Mile
	</option>
	<option value='tenk'$tenk>
		Ten K
	</option>
	<option value='two'$two>
		Two Mile
	</option>
</select>
<input type='submit' name='Submit' value='Submit' tabindex='4' />
<input type='hidden' name='form' value='flUpdate'/>
</form>
$lastSubmit
$error
";