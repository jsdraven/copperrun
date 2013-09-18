<?php
$source = '';
$body = "";
//the page with the collection of functions so to be used globally if needed.
require 'functions.php';
if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
    //if it is the hosting computer they will be the only controlling admin with the panel giving them access to other features
    require 'adminPanel.php';
    if ($choice == 'tvView.php') {
        $source = 'tvFeed';
    }elseif (isset($_POST['Search']) && $_POST['Search'] == 'Search') {
        $choice = 'runnerSearch.php';
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
        $choice = 'runnerSearch.php';
        $source = 'Lboard';
    }
    if ($choice == 'raceCat.php') {
        # code...
        $source = 'raceCat';
    }
    require $choice;
}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.10') {
    //data entry IP is the only other computer with access to data entry not controlling at all
    require 'runners.php';

}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.15') {
    //TV Feed only IP to the TV Feed. May open up to others later as another page options. Down side you cannot make it mobile friendly very easy.
    $source = 'tvFeed';
    require 'tvView.php';

}else{
    //all other traffic is directed to the search form to look up racers results and stats.
    require 'runnerSearch.php';
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <script>
            function loadXMLDoc()
            {
                var xmlhttp;
                xmlhttp=new XMLHttpRequest();
          
                xmlhttp.onreadystatechange=function()
                  {
                      if (xmlhttp.readyState==4 && xmlhttp.status==200)
                        {
                        document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                        }
                  }
                xmlhttp.open("GET","feed.php?feed=<?php if (isset($source)) {echo $source;};?>",true);
                xmlhttp.send();
            }
            setInterval("loadXMLDoc();", 1000);
        </script>
    </head>
    <body>

        <?php echo $body; ?>
    </body>
</html>