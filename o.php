<?php
function getDirContents($dir, &$results = array()){

	if(file_exists($dir)){

   		$files = scandir($dir);

    	foreach($files as $key ){

        $res=substr($key,0,1);

    		if(!$key || $key[0] == '.'||$res=='$') {
				  continue; // Ignore hidden files
			  }else{

        	$path = realpath($dir.DIRECTORY_SEPARATOR.$key);

	        if(is_dir($path)) {
	            $results[] = $path;
	        } 
    	}
    }
  }

   return $results;
}

$pa='C:';
echo "$pa\n";
$m=getDirContents($pa);
var_dump($m);
echo "\n--------------------------------------------------------------------------------------------------------------------------------------------------------";
$s=$m[16];
$p=getDirContents($s);
var_dump($p);
echo "\n--------------------------------------------------------------------------------------------------------------------------------------------------------";
$s=$p[3];
$p=getDirContents($s);
var_dump($p);
echo "\n--------------------------------------------------------------------------------------------------------------------------------------------------------";
$s=$p[7];
$p=getDirContents($s);
var_dump($p);

