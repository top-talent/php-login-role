<?php

	/**
	* Site : http://www.codingcage.com
	* Facebook : facebook.com/CodingCage
	* Twitter  : twitter.com/CodingCage
	* 
	*/
	 
	
	require_once 'dbconfig.php';

	$keyword = trim($_REQUEST['term']); // this is user input

	$sugg_json = array();    // this is for displaying json data as a autosearch suggestion
	$json_row = array();     // this is for stroring mysql results in json string
 

	$keyword = preg_replace('/\s+/', ' ', $keyword); // it will replace multiple spaces from the input.

	$query = 'SELECT * FROM users WHERE username LIKE :term'; // select query
	
	$stmt = $DBcon->prepare( $query );
	$stmt->execute(array(':term'=>"%$keyword%"));
	
	if ( $stmt->rowCount()>0 ) {
		
		while($recResult = $stmt->fetch(PDO::FETCH_ASSOC)) {
		    // $json_row["id"] = $recResult['postUrl'];
		    $json_row["value"] = $recResult['username'];
		    $json_row["label"] = $recResult['username'];
		    array_push($sugg_json, $json_row);
		}
		
	} else {
	    $json_row["id"] = "#";
	    $json_row["value"] = "";
	    $json_row["label"] = "Nothing Found!";
	    array_push($sugg_json, $json_row);
	}
	
	$jsonOutput = json_encode($sugg_json, JSON_UNESCAPED_SLASHES); 
	print $jsonOutput;