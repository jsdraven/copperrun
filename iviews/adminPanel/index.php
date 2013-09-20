<?php
if ($_SERVER['REQUEST_URI'] == '/copperrun/iViews/adminPanel/index.php'){
    die("Not allowed back here!");
}
	if (isset($_POST['set'])){
		$choice = $_POST['set'];
	}elseif (isset($_POST['reports'])){
		$choice = 'reports';
		$report = $_POST['reports'];
	}else{
		$choice = 'runnerRegi';
	}
	

    if ($choice == 'tvView') {
        $source = 'tvFeed';
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
            $source = 'rSearch&id='.$id;
        }
    }elseif (isset($_POST['Search']) && $_POST['Search'] == 'Lboard') {
        # code...
        $choice = 'runnerSearch';
        $source = 'Lboard';
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
require "view.php";
