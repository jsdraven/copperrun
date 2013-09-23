<?php
$source = '';
$body = "";
print_r($_POST);

//the page with the collection of functions so to be used globally if needed.
require 'protected/functions.php';
if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
    //if it is the hosting computer they will be the only controlling admin with the panel giving them access to other features
    $path = 'iViews/adminPanel';
    require $path."/index.php";
    echo $path;
    require "iViews/$choice/index.php";
}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.10') {
    //data entry IP is the only other computer with access to data entry not controlling at all
    $path = 'iViews/runners';
    require $path;
}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.114') {
    //TV Feed only IP to the TV Feed. May open up to others later as another page options. Down side you cannot make it mobile friendly very easy.
    $source = 'tvFeed';
    $path = 'iViews/tvView';
    require $path;
}else{
    //all other traffic is directed to the search form to look up racers results and stats.
    $path = 'iViews/runnerSearch';
    require $path;    
}
echo $source;
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
                xmlhttp.open("GET","feed/index.php?feed=<?php if (isset($source)) echo $source;?>",true);
                xmlhttp.send();
            }
            setInterval("loadXMLDoc();", 1000);
        </script>
    </head>
    <body>

        <?php echo $body; ?>
    </body>
</html>