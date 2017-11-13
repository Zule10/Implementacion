<?php

//$rootpath = realpath ("img");
//$rootpath = 'C:\Users\Zuleimi\Documents';
$rootpath=dirname(__DIR__);	
echo $rootpath;
/*$fileinfos = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootpath),
     RecursiveIteratorIterator::SELF_FIRST
);
foreach($fileinfos as $pathname => $fileinfo) {
    if (!$fileinfo->isFile()) continue;
    echo $pathname;
    //var_dump($pathname);
}*/
?>