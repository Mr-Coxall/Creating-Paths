<?php

// Returns a randomized list of cache pathways.
function getPathways($numberOfCaches) {
    $pathways = array();
	
    if ($numberOfCaches <= 1){
        // you can only have a single node
        // if you get anything less than 1, it just assumes 1
		$pathways[] = 1;
		
        return $pathways;  
    }
    else {
        // start creating paths recursively
        $currentPath = array();
		$allFinalPaths = array();
        generateAllPath($numberOfCaches, $currentPath, $allFinalPaths);
          
		//shuffle($allFinalPaths);    
        return $allFinalPaths;    
    }
}


function generateAllPath($numberOfCaches, $currentPath, &$allFinalPaths) {
    // generates all the paths recursively
	// note: $allFinalPaths is passed by reference (I know can be dangerous!)
		
    if (count($currentPath) >= $numberOfCaches) {
        // found a full path
        array_push($allFinalPaths, $currentPath);
    }
    else {
        // add a node to each path
        for ($i = 1; $i <= $numberOfCaches; $i++) {
		    // if the current value of $i is already in the array, do nothing
			// that node has already been visited
		    $valueInArray = false;
		    if (!in_array($i, $currentPath)) {
			    // if the $i value is not in the path, then add it in and recurse
			    $tempCurrentPath = $currentPath;	  
			    array_push($tempCurrentPath, $i);
				generateAllPath($numberOfCaches, $tempCurrentPath, $allFinalPaths);  
		    }
        }    
    }	
}

// call the function
$results = getPathways(8); 

print_r(array_values($results));
