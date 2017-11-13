<?php

$directorio = opendir(".");

echo "<ul>";
while($archivo = readdir($directorio))
    {    
        if(is_dir($archivo))
        {
            echo "<li>".$archivo."</li>";
        }
    }

echo "</ul>";

closedir($directorio);  

?>