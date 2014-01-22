<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$body .=<<<HTML

<h1>Copper Run Admin</h1>
    <p>
            <h3>Runners Registration</h3>
        <form action='index.php' method='POST'>
            First Name<input type='text' name='fname' maxlength="12" size="13" autofocus /><br />
            Last Name<input type='text' name='lname' maxlength="12" size='13' /><br />
            F / M: M<input type='radio' name='fm' value='M' /> F<input type='radio' name='fm' value='F' tabindex=3 /><br />
            Age<input type='text' name='age' maxlength="3" size='4' /><br />
            Bib Number<input type='text' name='bib' maxlength="4" size='5' /><br />
            <input type='hidden' name='form' value='runnerRegi' />
            <input type='submit' name='runner' value='Add/Update' />
        </form>
        <br />
    <p>$lastSubmit</p>   
   
HTML;
