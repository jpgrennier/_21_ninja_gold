<?php 
session_start();

if(!isset($_SESSION["win_lose"])){
	$_SESSION["win_lose"] = array();
}

if(!isset($_SESSION["all_gold"])){ 
	$_SESSION["all_gold"] = 0;
}

if(!isset($_SESSION["msgs"])){ 
		$_SESSION["msgs"] = array();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ninja Gold</title>
	<link rel="stylesheet" type="text/css" href="_21_ninja_gold_style.css">
</head>
<body>
<div id="wrapper">
	<h3 align="center"
	<?php
	if($_SESSION["all_gold"] > 0){
		echo " class='green'";
	}
	else if($_SESSION["all_gold"] < 0){
		echo " class='red'";
	}
	?>
	>Your Gold: <?=$_SESSION["all_gold"]?><h3>
	<div class="bldgs">
		<h3>Farm</h3>
		<p>(earn 10-20 gold)</p>
		<form action="_21_ninja_gold_process.php" method="post">
			<input type="hidden" name="loc" value="farm">
			<button>Find Gold!</button>
		</form>
	</div><div
	class="bldgs">
		<h3>Cave:</h3>
		<p>(earn 5-10 gold)</p>
		<form action="_21_ninja_gold_process.php" method="post">
			<input type="hidden" name="loc" value="cave">
			<button>Find Gold!</button>
		</form>
	</div><div
	class="bldgs">
		<h3>House:</h3>
		<p>(earn 2-5 gold)</p>
		<form action="_21_ninja_gold_process.php" method="post">
			<input type="hidden" name="loc" value="house">
			<button>Find Gold!</button>
		</form>
	</div><div
	class="bldgs">
		<h3>Casino:</h3>
		<p>(earn/take 0-50 gold)</p>
		<form action="_21_ninja_gold_process.php" method="post">
			<input type="hidden" name="loc" value="casino">
			<button>Find Gold!</button>			
		</form>
	</div>
	<h3 align="center">Activities:</h3>
	<div id ="act">  
	<?php
		for($i = count($_SESSION["msgs"])-1; $i >= 0; $i--){
		// foreach($_SESSION["msgs"] as $msg){
				echo "<p class='".$_SESSION["win_lose"][$i]."'>".$_SESSION["msgs"][$i]."</p>";
				// var_dump($_SESSION["msgs"]);
				// var_dump($_SESSION["win_lose"]);	
		} 
	?>
	</div>
	<form action="_21_ninja_gold_reset.php" method="get">
	<button name="reset" value="true">Reset</button>	
	</form>
</div><!-- end wrapper -->	
</body>
</html>