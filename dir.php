<?php

$dir = $_GET['nextDir'];

// Run the recursive function 

$response = scan($dir);

// This function scans  files folder recursively, and builds a large array

function scan($dir){

	$files = array();

	if(file_exists($dir)){
	
		foreach(scandir($dir) as $f) {
		
			$res=substr($f,0,1);

    		if(!$f || $f[0] == '.'||$res=='$') {
				continue; // Ignore hidden files
			
			}else{

        	$path = realpath($dir.DIRECTORY_SEPARATOR.$f);

	       		if(is_dir($path)) {
				// The path is a folder

					$files[] = array(
						"name" => $f,
						"type" => "folder",
						"path" => $path,
						//"items" => scan($path) // Recursively get the contents of the folder
					);
				}
			}
		}
	}

	return $files;
}

// Output the directory listing as JSON

header('Content-type: application/json');

echo json_encode(array(
	"name" => "files",
	"type" => "folder",
	"path" => $dir,
	"items" => $response
));
