<?php
/*if ($_SERVER['REQUEST_URI'] == '/copperrun/raceCat.php'){
    die("Not allowed back here!");
}*/
 $body .= "
Race Catigory Setup and Edit

<hr />
<form action='index.php' method='POST'>
Gender: <label>Male<input type='radio' name='gen' value='male' checked="" /></label> or Female<input type='radio' name='gen' value='female' /></label><br />
<label>Min Age<input type='number' maxlength='2' name='minAge' /></label> --- <label>Max Age<input type='number' maxlength='3' name='maxAge'></label><br />
<select name='raceType'>
	<option>
		Choose one.
	</option>
	<option value='twoMile'>
		Two Mile
	</option>
	<option value='halfMile'>
		Half Mile
	</option>
	<option value='tenK'>
		Ten K
	</option>
</select>
<input type='submit' name='setCat' value='Submit' />
</form>
<p>
Remove any of the following by clicking on it.
<div id='myDiv'>One moment while I fetch your information.</div>
";
