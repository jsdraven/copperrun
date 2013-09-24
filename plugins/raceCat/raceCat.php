<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}

if (isset($list['gender']) && $list['gender'] == 'male') {
	# code...
	$genderSet = "<label>Male<input type='radio' name='gen' value='male' checked=\"\" /></label> or Female<input type='radio' name='gen' value='female' /></label>";
}elseif (isset($list['gender']) && $list['gender'] == 'female') {
	# code...
	$genderSet = "<label>Male<input type='radio' name='gen' value='male' /></label> or Female<input type='radio' name='gen' value='female' checked=\"\" /></label>";
}else{
	$genderSet = "<label>Male<input type='radio' name='gen' value='male' /></label> or Female<input type='radio' name='gen' value='female' /></label>";
}


if (isset($list['type']) && $list['type'] == 'twoMile') {
	# code...
	$options = "	<option>
		Choose one.
	</option>
	<option value='twoMile' selected=\"\">
		Two Mile
	</option>
	<option value='halfMile'>
		Half Mile
	</option>
	<option value='tenK'>
		Ten K
	</option>";
}elseif (isset($list['type']) && $list['type'] == 'halfMile') {
	# code...
	$options = "	<option>
		Choose one.
	</option>
	<option value='twoMile'>
		Two Mile
	</option>
	<option value='halfMile' selected=\"\">
		Half Mile
	</option>
	<option value='tenK'>
		Ten K
	</option>";
}elseif (isset($list['type']) && $list['type'] == 'tenK') {
	# code...
	$options = "	<option>
		Choose one.
	</option>
	<option value='twoMile'>
		Two Mile
	</option>
	<option value='halfMile'>
		Half Mile
	</option>
	<option value='tenK' selected=\"\">
		Ten K
	</option>";
}else{
	$options = "	<option>
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
	</option>";
}


 $body .= "

Race Catigory Setup and Edit

<hr />
<form action='index.php' method='POST'>
Gender: $genderSet<br />
<label>Min Age<input type='number' maxlength='2' name='minAge' /></label> --- <label>Max Age<input type='number' maxlength='3' name='maxAge'></label><br />
<select name='raceType'>
$options
</select>
<input type='submit' name='setCat' value='Submit' />
</form>
<p>
Remove any of the following by clicking on it.
<div id='myDiv'>One moment while I fetch your information.</div>
";
