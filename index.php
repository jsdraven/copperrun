<!DOCTYPE html>
<html>
    <head>
        <script>
        function loadXMLDoc(source)
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
                xmlhttp.open("GET","index.php?test=1",true);
                xmlhttp.send();
            }

<?php
//the page with the collection of functions so to be used globally if needed.
require 'functions.php';

if ($_SERVER['REMOTE_ADDR'] == $_SERVER['SERVER_ADDR']){
	//if it is the hosting computer they will be the only controlling admin with the panel giving them access to other features
	require 'adminPanel.php';
	require $choice;

}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.10') {
	//data entry IP is the only other computer with access to data entry not controlling at all
	require 'runners.php';

}elseif ($_SERVER['REMOTE_ADDR'] == '192.168.200.15') {
	//TV Feed only IP to the TV Feed. May open up to others later as another page options. Down side you cannot make it mobile friendly very easy.
	require 'tvView.php';

}elseif (isset($_POST[test])) {
	require 'tvFeed.php';
}else{
	//all other traffic is directed to the search form to look up racers results and stats.
	require 'runnerSearch.php';
	
}
