<?php
// This function scans the files folder recursively, and builds a large array

function scan($dir){

	$files = array();
	// Is there actually such a folder/file?
		if(file_exists($dir)){

	   		$files = scandir($dir);

	    	foreach($files as $f ){

	    		if(!$f || $f[0] == '.') {
					continue; // Ignore hidden files
				}

	        	$path = realpath($dir.'/'.$f);

		        if(is_dir($path)) {
	    	
				// The path is a folder
					$files[] = array(
						"name" => $f,
						"type" => "folder",
						"path" => $path,
						"items" => scan($path) // Recursively get the contents of the folder
					);
				}/*
			
			else {

				// It is a file

				$files[] = array(
					"name" => $f,
					"type" => "file",
					"path" => $path,
					"size" => filesize($path) // Gets the size of this file
				);
			}*/
		}
	
	}

	return $files;
}


$dir = "C:/Users/Zuleimi/Desktop";

// Run the recursive function 
$response = scan($dir);
//var_dump($response);
// Output the directory listing as JSON

header('Content-type: application/json');

echo json_encode(array(
	"name" => "files",
	"type" => "folder",
	"path" => $dir,
	"items" => $response
));

?>