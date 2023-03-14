<?php
	include_once('includes/all.php');
	
	/**
	Idea to add a zoom feature to read cards better
			<div class="zoom">
				<span onclick="zoom()">Zoomed</span>
				<span>Not Zoomed</span>
			</div>
	**/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The Title</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<link type="text/css" rel="stylesheet" href="css/style-home.css">
		<link href="img/icon.jpg" rel="icon" type="image/x-icon">
		<script src="js/script.js"></script>
		<script src="js/script-home.js"></script>
	</head>
	<body>
		<main>
			<img src="img/start.jpg" onclick="start()" id="start" class="start"></div>
			<form method="GET" action="heroes.php" class="hide" id="legend-wrap">
					<?php
						// var_dump($legends);
						echo legends($legends);
						function legends($legends)
						{
							$pics = '';
							foreach ($legends as $legend)
							{
								$pics .= '<input type="radio" class="hide" name="legend"  value="'.$legend.'" id="'.$legend.'-button" >';
								$pics .= '<label for="'.$legend.'-button" class="legend" id="'.$legend.'-label"> <img src="img/legendaries/legend'.$legend.'.jpg" onclick="select(this)" id="'.$legend.'" alt="'.$legend.'" class="unselected"> </label>';
							}
							return $pics;
						}
					?>
					<div class="legend">
						<p>Player 1</p>
						<input type="radio" name="player" value="1">
						<p>Player 2</p>
						<input type="radio" name="player" value="2">
						<input type="submit" class="sub" disabled id="sub">
					</div>
			</form>
		</main>
	</body>
</html>


