<?php

	include_once('includes/all.php');
	if (empty($_GET['legend']) || !in_array($_GET['legend'], $legends))
	{
		header ('location:index.php');
	}
	else
	{
		$_SESSION['legend'] = $_GET['legend'];
		$legend = $_SESSION['legend'];
	}
	if(empty($_GET['player']))
	{
		header ('location:index.php');
	}
	else
	{
		$_SESSION['player'] = $_GET['player'];
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The Title</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<link type="text/css" rel="stylesheet" href="css/style-heroes.css">
		<link href="img/icon.jpg" rel="icon" type="image/x-icon">
		<script src="js/script.js"></script>
		<script src="js/script-heroes.js"></script>
	</head>
	<body>
		<main onmouseover="getType()" id="main">
			<h1 style="text-align: center; padding: 20px;">Choose Your 6 <span id="type"><?php echo ucfirst($legend);?></span> Heroes!</h1>
			<form class="hero-wrap" method="post" action="select.php">
				<?php
					echo displayHeroes($legend);
					
					function displayHeroes($legend)
					{
						$pics = '';

						for ($x = 1; $x < 11; $x++)
						{
							$pics .= '<label for="'.$legend.$x.'" class="label">';				
								$pics .= '<input type="checkbox" name="'.$x.'" value="'.$x.'" id="'.$legend.$x.'">';
								$pics .= '<img src="img/'.$legend.'/'.$x.'.jpg" alt="'.$legend.$x.'" onclick="select(this)" class="unselected">';
							$pics .= '</label>';
						}
						return $pics;
					}
				?>
				<input type="submit" class="sub">
			</form>
		</main>
	</body>
</html>
