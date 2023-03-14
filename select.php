<?php
	include_once('includes/all.php');
	//this makes sure that there is enough selections
	$counter = 0;
	for($x = 0; $x < 11; $x++)
	{	
		if (isset($_POST[$x]))
		{
			$_SESSION['cards'][$counter] = $_POST[$x];
			$counter++;
		}
	}
	if($counter != 6)
	{
		header('location:heroes.php?legend='.$_SESSION['legend']);
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The Title</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<link type="text/css" rel="stylesheet" href="css/style-select.css">
		<link href="img/icon.jpg" rel="icon" type="image/x-icon">
		<script src="js/script.js"></script>
	</head>
	<body>
		<main>
			<h2 style="text-align: center; padding: 10px;">Circle for Champion, Squares for Supports</h2>
			<form class="starter-wrap" method="post" action="play.php">
				<?php
					echo startingHeroes();
					function startingHeroes()
					{
						$starters = '';
						$usedArray = array();
						$supportCounter = 1;
						while (!isset($usedArray[2]))
						{	
							$starter = mt_rand(0, 5);

							if(!in_array($_SESSION['cards'][$starter], $usedArray))
							{
								$starters .= '<div class="card-wrap">';
									$starters .= '<input type="radio" name="champion" value="'.$_SESSION['cards'][$starter].'">';
									$starters .= '<input type="checkbox" name="support'.$supportCounter.'" value="'.$_SESSION['cards'][$starter].'">';
									$starters .= '<img src="img/'.$_SESSION['legend'].'/'.$_SESSION['cards'][$starter].'.jpg" alt="fuck you w3">';
								$starters .= '</div>';
								array_push($usedArray, $_SESSION['cards'][$starter]);
								$supportCounter++;

							}
						}
						$counter = 0;
						for($i = 0; $i < 10; $i++)
						{
							$x = strval($i);
							if(!in_array($x, $usedArray) && in_array($x, $_SESSION['cards']))
							{
								$_SESSION['deck'][$counter] = $x;
								$counter++;
							}
						}
						// var_dump($usedArray);
						// var_dump($_SESSION['deck']);
						return $starters;
					}
				?>
				<input type="submit">
			</form>
		</main>
	</body>
</html>
