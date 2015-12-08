<?php
	session_start();
	date_default_timezone_set("America/Los_Angeles");

//===== session checks =====//
	
//===== loc & gold determination =====//
	
	$loc = $_POST["loc"];
	if($loc == "farm"){
		$rand_gold = rand(10, 20);		 
	}
	if($loc == "cave"){
		$rand_gold = rand(5, 10);		 
	}
	if($loc == "house"){
		$rand_gold = rand(2, 5);		 
	}
	if($loc == "casino"){
		$rand_gold = rand(-50, 50);		 
	}
	$_SESSION["all_gold"] += $rand_gold; 

//===== msg determination =====//
	
	$msg = "You entered a ".$loc." and ";
	if($rand_gold < 0){
		$msg = $msg ." lost ";
		$p = "red right";
	}
	else{
		$msg = $msg ." earned ";
		$p = "green left";

	}
	$msg = $msg .abs($rand_gold)." gold pieces. ".date("(F dS, Y h:i a)", time());

	$_SESSION["msgs"][] = $msg; // 2nd [] same as - array_push($SESSION["msgs"], $msg);
	$_SESSION["win_lose"][] = $p;
//===== reset =====//
	// if($_POST["reset"] === true){
	// 	session_destroy();
	// }
	// $_POST["reset"] === false;

	header("location: _21_ninja_gold_index.php");
?>










