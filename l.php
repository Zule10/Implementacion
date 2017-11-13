<?php 
$pathRepo ='C:/xampp/htdocs/codigos';
echo chdir($pathRepo);
echo exec("git init");
echo exec("git status");
echo exec("git add .");
echo exec("git commit -m 'codigoss'");
echo exec("git remote add gith https://0a7e44615a6d1f56f6b5fdc6ce4f21821cb3e77d@github.com/Zule10/Implementacion.git");
echo exec("git pull gith master");
echo exec("git push gith master");
?>