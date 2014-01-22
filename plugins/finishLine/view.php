<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$body .=<<<HTML
<p>
<form action='index.php' method='POST'>
<label>Bib Number:<input type='text' name='bib' tabindex='1' size='4' maxlength="3" autofocus/> </label>
<label>Place Number: <input type='text' name='place' tabindex='2' size='4' maxlength='3' /></label>
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
<input type='submit' name='fLine' value='Submit' tabindex='4' />
<input type='hidden' name='form' value='finishLine'/>
</form>

$lastSubmit
$error
HTML;
