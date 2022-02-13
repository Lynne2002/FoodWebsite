<?php

function connect(){
	$dbserver="localhost";
	$dbuser="root";
	$dbpass='';
	$db="hoteldb";
	$link=mysqli_connect($dbserver, $dbuser, $dbpass, $db) or die("Could not connect");
	
}

function getData($sql){
	$link= connect();
	$result=mysqli_query($link, $sql);

	while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$rows[]=$row;
	}
	return $rows;
}
function setData($sql){
	$link=connect();

	if(mysqli_query($link, $sql)){
		return true;
	}
	else{
		return false;
	}
}

	
	 
	
   
?>