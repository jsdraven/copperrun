<?php
//want plan text <<BACK NEXT>> at the bottom of the view.
if ($_SERVER['REQUEST_URI'] == '/copperrun/runnerSearch.php'){
    die("Not allowed back here!");
}
if (!isset($resultChoice) && strlen($source) > strlen('rSearch')) {
        # code...
        $results = rSearchList($items);
        $rows = "";
        for ($i=0; $i < 5; $i++) {
                $Fname = $results[$i]['fname'];
                $bib = $results[$i]['bib'];
                $ID = $results[$i]['id'];
                $rows .= "<tr><td><label>$Fname - $bib <input type='submit' hidden='true' name='resultChoice' value='$ID' /></label></td></tr>\n";
        }
        $body .=" 
                <form action='index.php' method='POST'>
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
}elseif (isset($resultChoice)) {
        # here is were source is set
        $source = 'rSearch&id='.$resultChoice;
        $rInfo = getRinfo($resultChoice);
        $name = $rInfo['fname'];
        $bib = $rInfo['bib'];
                $body .="<h1>Runner Search</h1>
$programingCredit

        <div id='myDiv'>One moment while I fetch your information.</div>
                <form action='index.php' method='POST'>
        <table>
                <tr>
                        <td>
                                        <label>First Name <input type='text' name='fname' id='fname' tabeindex='0' autofocus placeholder='$name' maxlength='13' pattern='[A-Za-z]{3}' /></label>
                        </td>
                </tr>
                <tr>
                        <td align='center'>
                                --Or--
                        </td>
                </tr>
                <tr>
                        <td>
                                        <label>Bib Number <input type='text' name='bnumber' id='bnumber' tabindex='1' placeholder='$bib' maxlength='3' /></label>
                        </td>
                </tr>
                <tr>
                        <td>
                                <input type='submit' name='Search' value='Search' />
                        </td>
                </tr>
        </table>

";
}else {
        # code...
        $body .="<h1>Runner Search</h1>
$programingCredit

                <form action='index.php' method='POST'>
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
                                <input type='submit' name='Search' value='Search' />
                        </td>
                </tr>
        </table>

";
}

