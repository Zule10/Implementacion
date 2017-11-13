<?php
$pathRepo = 'C:\Users\Zuleimi\Desktop\EIA\EIA 2017\Admon Redes';
echo chdir($pathRepo);
echo exec("git init");   
echo exec("git add .");
echo exec("git commit -m 'Adding Files'");
echo exec("git remote add 'github' https://540156383f3b53f568efb65dead48ea5f76d84ef@github.com/Zule10/Implementacion.git");
echo exec("git pull 'github' master");
echo exec("git push 'github' master --progress 2>&1");
?>
