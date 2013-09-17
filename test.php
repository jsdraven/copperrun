<?php

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
                xmlhttp.open("GET","feed.php?feed=rSearch",true);
                xmlhttp.send();
            }
            setInterval("loadXMLDoc();", 1000);
        </script>
    </head>
    <body>

        <div id="myDiv"><h2>Let AJAX change this text</h2></div>

    </body>
</html>
