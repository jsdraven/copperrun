<?php
print_r($_POST);
$body = "";
//the page with the collection of functions so to be used globally if needed.
require 'functions.php';
if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
    //if it is the hosting computer they will be the only controlling admin with the panel giving them access to other features
    require 'adminPanel.php';
    
    if ($choice == 'runnerSearch.php') {
        $source = 'rSearch';
    }elseif ($choice == 'tvView.php') {
        $source = 'tvFeed';
    }elseif (isset($_POST['Search']) && $_POST['Search'] == 'Search') {
        $choice = 'runnerSearch.php';
        $source = 'rSearch';
        if (isset($_POST['fname']) && strlen($_POST['fname']) > 0 && $_POST['bnumber'] <= 0) {
            # code...
            $source .= '&fname='.$_POST['fname'];
        }elseif (isset($_POST['bnumber']) && $_POST['bnumber'] > 0 && strlen($_POST['fname']) <= 0) {
            # code...
            $source .= '&bnumber='.$_POST['bnumber'];
        }else{
            $fname = $_POST['fname'];
            $bnumber = $_POST['bnumber'];
            $source .="&fname=$fname&bnumber=$bnumber";
        }
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
    $source = 'rSearch';
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