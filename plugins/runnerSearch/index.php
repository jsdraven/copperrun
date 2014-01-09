<?php
//want plan text <<BACK NEXT>> at the bottom of the view.
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
$displayBody = '';
$body .= "<h3>Runner Search</h3>";
if (isset($_POST['bnumber'])) {
    # code...
    $itemSet['bib'] = $_POST['bnumber'];
}
if (isset($_POST['fname'])) {
    # code...
    $itemSet['fname'] = $_POST['fname'];
}
var_dump($_POST);

if (!isset($_POST['resultChoice']) && isset($itemSet)) {
        # code...
        if ($itemSet['bib'] > 0) {
            # code...
            echo "lost in my own code";
/*           $source = $itemSet['bib']['source'];
           $option = $itemSet['bib']['option'];
           $body .=<<<HTML
$programingCredit

        <div id='myDiv'>One moment while I fetch your information.</div>
            <form action=''>
                <label>Search Again<input style='display: none;' type='submit' /></label>
                </form>

HTML;*/
        }else{
            var_dump($_POST);

            $rows = "";
            $name = $itemSet['fname'];
            $sql = "SELECT * FROM runners WHERE FName = '$name'";
            $results = DbConnection($sql);
            while ($row = mysqli_fetch_object($results)) {
                # code...
                $rows .= "<tr><td align='center'><label>$row->FName - $row->Bib <input type='submit' style='display: none;' name='resultChoice' value='$row->id' /></label></td></tr>\n";
            }
            $displayBody = "list";
}
}elseif (isset($_POST['resultChoice'])) {
        # here is were source is set
        $resultChoice = $_POST['resultChoice'];
        $source = 'runnerSearch';
        $option = 'id='.$resultChoice;

                $body .=<<<HTML
$programingCredit

        <div id='myDiv'>One moment while I fetch your information.</div>
            <form action=''>
                <label>Search Again<input style='display: none;' type='submit' /></label>
                </form>

HTML;
}elseif (isset($_POST['Search']) && $_POST['Search'] == 'Lboard') {
    # code...
/*    $body .="<div id='myDiv'>One moment while I fetch your information.</div>
        <form action=''>
        <label>Back to Search<input type='submit' hidden='true' /></label>
        </form>
    ";*/
    $displayBody = "list";
}else {
        # code...
        $displayBody = "form";
}

switch($displayBody){
    case "form":
        $body .=<<<HTML
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
HTML;
        break;
    case "list":
        
        $body .=<<<HTML
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
HTML;
        break;

    case "result":
        $body .=<<<HTML

HTML;
        break;
}