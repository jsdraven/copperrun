<?php
if (!isset($lock) || $lock != 'Key'){
    die("Not allowed back here!");
}
	if (isset($_POST['set'])){
		$choice = $_POST['set'];
	}	

    if ($choice == 'tvView') {
        $source = 'tvView';
    }elseif (isset($_POST['Search']) && $_POST['Search'] == 'Search') {
        $choice = 'runnerSearch';
        $itemSet = array();
        if (isset($_POST['fname']) && strlen($_POST['fname']) > 0) {
            $fname = $_POST['fname'];
            $itemSet['fname'] = $fname;
        }
        if (isset($_POST['bnumber']) && $_POST['bnumber'] > 0) {
            $bnumber = $_POST['bnumber'];
            $itemSet['bnumber'] = $bnumber;
        }
        if (isset($_POST['id']) && $_POST['id'] > 0) {
            # code...
            $id = $_POST['id'];
            $source = 'runnerSearch';
            $option = 'id='.$id;
        }
    }elseif (isset($_GET['Search']) && $_GET['Search'] == 'Lboard') {
        # code...
        $choice = 'runnerSearch';
        $option = 'other=Lboard';
    }
    if (isset($_POST['setCat']) && $_POST['setCat'] == 'Submit') {
        # code...
        $list['max'] = $_POST['maxAge'];
        $list['min'] = $_POST['minAge'];
        $list['type'] = $_POST['raceType'];
        $list['gender'] = $_POST['gen'];
        $choice = 'raceCat';
        $source = 'raceCat';
    }elseif ($choice == 'raceCat') {
        # code...
        $source = 'raceCat';
    }
    $views = '';
    $reports = '';
foreach (scandir('plugins') as $key => $value) {
    # code...
    if (strlen($value) < 3 || $value == 'adminPanel' || $value == 'dataPanel' || $value == 'tvView' || $value == 'runnerSearch') {
        # code...
    }elseif (is_dir('plugins/'.$value)) {
        $views .= "<input type=\"submit\" name='set' value='$value' />\n";
    }
}


require "view.php";
