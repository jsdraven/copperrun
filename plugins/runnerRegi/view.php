<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$body .="

<h1>Copper Run Admin</h1>
    <p>
            <h3>Runners Registration</h3>
        <form action='index.php' method='POST'>
            First Name<input type='text' name='fname' autofocus /><br />
            Last Name<input type='text' name='lname' /><br />
            F / M: M<input type='radio' name='fm' value='M' /> F<input type='radio' name='fm' value='F' tabindex=3 /><br />
            Age<input type='text' name='age' /><br />
            Bib Number<input type='text' name='bib' /><br />
            <input type='submit' name='runner' value='Add/Update' />
        </form>
        <br />
        Total Count of runners for today ($totalcount) Total Two Mile ($TwoMile_count) Total TenK ($TenK_count) Total Half Mile ($HalfMile_count)
   
";