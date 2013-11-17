<?php
//want plan text <<BACK NEXT>> at the bottom of the view.
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}

$body .= "<h3>Runner Search</h3>";
if (isset($_POST['bnumber'])) {
    # code...
    $itemSet['bib'] = $_POST['bnumber'];
}
if (isset($_POST['fname'])) {
    # code...
    $itemSet['fname'] = $_POST['fname'];
}
if (!isset($_POST['resultChoice']) && isset($itemSet)) {
        # code...
        $results = rSearchList($itemSet);
        $rows = "";
        for ($i=0; $i < 5; $i++) {
                $Fname = $results[$i]['fname'];
                $bib = $results[$i]['bib'];
                $ID = $results[$i]['id'];
                $rows .= "<tr><td align='center'><label>$Fname - $bib <input type='submit' style='display: none;' name='resultChoice' value='$ID' /></label></td></tr>\n";
        }
        $body .=" 
                <form action='' method='POST'>
                <input type='hidden' name='Search' value='Search' />
                        <table border='1'>

                                <tr>
                                        <td align='center'>
                                                Select one please.
                                        </td>
                                </tr>
                                $rows
                        </table>
 ";
}elseif (isset($_POST['resultChoice'])) {
        # here is were source is set
        $resultChoice = $_POST['resultChoice'];
        $source = 'runnerSearch';
        $option = 'id='.$resultChoice;
        $rInfo = getRinfo($resultChoice);
        $name = $rInfo['fname'];
        $bib = $rInfo['bib'];
                $body .="
$programingCredit

        <div id='myDiv'>One moment while I fetch your information.</div>
            <form action=''>
                <label>Search Again<input style='display: none;' type='submit' /></label>
                </form>

";
}elseif (isset($_POST['Search']) && $_POST['Search'] == 'Lboard') {
    # code...
    $body .="<div id='myDiv'>One moment while I fetch your information.</div>
        <form action=''>
        <label>Back to Search<input type='submit' hidden='true' /></label>
        </form>
    ";
}else {
        # code...
        $body .="
$programingCredit

                <form action='' method='POST'>
        <table>
                <tr>
                        <td>
                                        <label>First Name <input type='text' name='fname' id='fname' tabeindex='0' autofocus placeholder='Your First Nme' maxlength='13' pattern'[A-Za-z]{3}' /></label>
                        </td>
                </tr>
                <tr>
                        <td align='center'>
                                --Or--
                        </td>
                </tr>
                <tr>
                        <td>
                                        <label>Bib Number <input type='text' name='bnumber' id='bnumber' tabindex='1' placeholder='Bib Number' maxlength='3' /></label>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label>Search<input type='submit' style='display: none;' name='Search' value='Search' /></label> -- or -- <label>Category Leaders<input type='submit' style='display: none;' name='Search' value='Lboard' /></label>
                        </td>
                </tr>
        </table>

";
}

