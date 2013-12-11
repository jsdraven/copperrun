<?php
$source = '';
$body = "";
$lock = 'Key';
//print_r($_POST);

//the page with the collection of functions so to be used globally if needed.
require 'protected/functions.php';
if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
    //if it is the hosting computer they will be the only controlling admin with the panel giving them access to other features
    
    require "plugins/adminPanel/index.php";
    $path = 'landing.php';
    if (isset($choice)) {
        # code...
        $path = "plugins/$choice/index.php";
    }
    if (isset($_POST['report'])) {
        # code...
        $report = $_POST['report'];
        $path = "reports/index.php";
    }
    if (isset($_POST['form'])) {
        # code...
        $form = $_POST['form'];
        $path = "plugins/$form/index.php";
    }
    require $path;
}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.10') {
    //data entry IP is the only other computer with access to data entry not controlling at all
    require 'plugins/dataPanel/index.php';
    $path = 'landing.php';
    if (isset($_POST['form'])) {
        # code...
        $form = $_POST['form'];
        $path = "plugins/$form/index.php";
    }
    require $path;
}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.105') {
    //TV Feed only IP to the TV Feed. May open up to others later as another page options. Down side you cannot make it mobile friendly very easy.
    $source = 'plugins/tvView/feed';
    $path = 'plugins/tvView/index.php';
    require $path;
}else{
    //all other traffic is directed to the search form to look up racers results and stats.
    $path = 'plugins/runnerSearch/index.php';
    require $path;    
}
//$testing = raceCatArray();
//print_r($testing);
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
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
                xmlhttp.open("GET","feed.php?feed=<?php if (isset($source)) echo $source;?><?php if (isset($option)) echo '&'.$option;?>",true);
                xmlhttp.send();
            }
            setInterval("loadXMLDoc();", 1000);
        </script>

    </head>
    <body>

        <?php echo $body; ?>
    </body>
</html>
