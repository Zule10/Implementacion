<?php

echo $pathRepo = __DIR__.'\proyecto';
echo chdir($pathRepo);  
echo exec("git init");
echo exec("git add .");
echo exec("git commit -m 'description del commit'");
echo exec("git remote add origin  https://806bd1a7df9c4f1d5c3a578d3beca3b1dc07e695@github.com/Zule10/Implementacion.git");
echo exec("git push origin master");

 /*require_once dirname(__DIR__) . '/htdocs/php-git-repo/lib/PHPGit/Repository.php';

 $repo = new PHPGit_Repository(dirname(__FILE__) . '/proyecto');
 $repo->git('add -A');
 $repo->git("commit -m 'description del commit'");
 echo 'Ok';*/
?>