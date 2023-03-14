<?php
	include_once('includes/all.php');


	if(empty($_POST['sub-button']))
	{
		if(isset($_POST['support1']))
		{
			$support1 = $_POST['support1'];
			if(isset($_POST['support2']))
			{
				$support2 = $_POST['support2'];
			}
			else if (isset($_POST['support3']))
			{
				$support2 = $_POST['support3'];
			}
			
		}
		else
		{

			$support1 = $_POST['support2'];
			$support2 = $_POST['support3'];
		}

		$champion = $_POST['champion'];
	}
	else if ($_POST['sub-button'])
	{
		$champion = $_POST['champion'];
		if(!empty($_POST['support1']))
		{
			$support1 = $_POST['support1'];
		}
		else
		{
			$support1 = 0;
		}
		
		if(!empty($_POST['support2']))
		{
			$support2 = $_POST['support2'];
		}
		else
		{
			$support2 = 0;
		}
		
		if(!empty($_POST['deck1']))
		{
			$_SESSION['deck'][0] = $_POST['deck1'];
			
			
		}
		else
		{
			$_SESSION['deck'][0] = 0;
		}
		
		if(!empty($_POST['deck2']))
		{
			$_SESSION['deck'][1] = $_POST['deck2'];
		}
		else
		{
			$_SESSION['deck'][1] = 0;
		}
		
		if(!empty($_POST['deck3']))
		{
			$_SESSION['deck'][2] = $_POST['deck3'];
		}
		else
		{
			$_SESSION['deck'][2] = 0;
		}
	}
	
			//Load the file. Make a variable to differentiate player
		$contents = file_get_contents('json/player'.$_SESSION['player'].'field.json');
		 
		//Decode the JSON data into a PHP array.
		$contentsDecoded = json_decode($contents, true);
		 
		//Modify the counter variable.
		$contentsDecoded['field']['champion'] = $champion;
		$contentsDecoded['field']['support1'] = $support1;
		$contentsDecoded['field']['support2'] = $support2;
		 
		//Encode the array back into a JSON string.
		$json = json_encode($contentsDecoded);
		 
		//Save the file.
		file_put_contents('json/player'.$_SESSION['player'].'field.json', $json);
		
		
		
		
		//Load the file. Make a variable to differentiate player
		$contents = file_get_contents('json/player'.$_SESSION['player'].'deck.json');
		 
		//Decode the JSON data into a PHP array.
		$contentsDecoded = json_decode($contents, true);
		 
		//Modify the counter variable.
		$contentsDecoded['deck']['one'] = $_SESSION['deck'][0];
		$contentsDecoded['deck']['two'] = $_SESSION['deck'][1];
		$contentsDecoded['deck']['three'] = $_SESSION['deck'][2];
		 
		//Encode the array back into a JSON string.
		$json = json_encode($contentsDecoded);
		 
		//Save the file.
		file_put_contents('json/player'.$_SESSION['player'].'deck.json', $json);
		
		
		//Load the file. Make a variable to differentiate player
		$contents = file_get_contents('json/player'.$_SESSION['player'].'legend.json');
		 
		//Decode the JSON data into a PHP array.
		$contentsDecoded = json_decode($contents, true);
		 
		//Modify the counter variable.
		$contentsDecoded['legend'] = $_SESSION['legend'];

		 
		//Encode the array back into a JSON string.
		$json = json_encode($contentsDecoded);
		 
		//Save the file.
		file_put_contents('json/player'.$_SESSION['player'].'legend.json', $json);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>The Title</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<link type="text/css" rel="stylesheet" href="css/style-play.css">
		<link href="img/icon.jpg" rel="icon" type="image/x-icon">	
		<script src="js/jquery.js"></script>
		<script src="js/zoom.js"></script>
		<script src="js/jquery-cycle-all.js"></script>
		<script>
			<?php 
				echo 'var player = "'.$_SESSION['player'].'"; var yourlegend = "'.$_SESSION['legend'].'";'; 
				if($_SESSION['player'] == 1)
				{
					echo 'var opponent = 2;';
					echo 'console.log("I am Player 1");';
				}
				else
				{
					echo 'var opponent = 1;';
					echo 'console.log("I am Player 2");';
				}
			?>
		</script>
		<script src="js/script.js"></script>
		<script src="js/script-play.js"></script>


	</head>
	<body onload="">
		<form method="post" action="?s=">
		<main onload="">
			<div class="left-wrap";>
				<?php 
					echo field($champion, $support1, $support2);
					function field($champion, $support1, $support2)
					{
						$inPlay = '';
						$inPlay .= '<div class="front-wrap">';
							$inPlay .= '<div class="champion-wrap" ondragover="allowDrop(event)" ondrop="drop(event, \'champion\')">';
								$inPlay.= '<div class="size" id="champion-wrap"></div><input type="text" class="number, bane" ><input type="text" class="number, damage">';
								// $inPlay .= '<img src="img/'.$_SESSION['legend'].'/'.$_SESSION[$champion].'.jpg" draggable="true" class="show" id="champion" ondragstart="drag(event)"> <input type="text" class="number, bane" ><input type="text" class="number, damage">';
							$inPlay .= '</div>';
							
						
							$inPlay .= '<div class="support-wrap">';
								$inPlay.= '<div class="size" id="support1-wrap" ondragover="allowDrop(event)" ondrop="drop(event, \'support1\')"></div>
									<input type="text" class="number, bane"><input type="text" class="number, damage">';
								// $inPlay .= '<img src="img/'.$_SESSION['legend'].'/'.$_SESSION[$support1].'.jpg" draggable="true class="show" ondragstart="drag(event)" id="support1"> <input type="text" class="number, bane" ><input type="text" class="number, damage">'; 
								$inPlay.= '<div class="size" id="support2-wrap"ondragover="allowDrop(event)" ondrop="drop(event, \'support2\')"></div>
									<input type="text" class="number, bane"><input type="text" class="number, damage">';
								// $inPlay .= '<img src="img/'.$_SESSION['legend'].'/'.$_SESSION[$support2].'.jpg" draggable="true" class="show" ondragstart="drag(event)" id="support2"> <input type="text" class="number, bane"><input type="text" class="number, damage">'; 
							$inPlay .= '</div>';
						$inPlay .= '</div>';
						return $inPlay;
					}
				?>
				
				<div class="deck-wrap" id="deck">
					
				</div>
			</div>
			<div class="right-wrap">
				<div class="grave" ondragover="allowDrop(event)" ondrop="drop(event, 'grave')"><div class="size1"></div></div>
				<div class="legend"><img src="img/legendaries/legend<?php echo $_SESSION['legend'];?>.jpg" draggable="true" ondragstart="drag(event)" id="legend" onclick="flip(this, '<?php echo $_SESSION['legend'];?>')"><input type="submit" name="sub-button" value="Click Me To Refresh!"></div>
			</div>
		</main>
		</form>
		<div class="opponent" id="opponent">
			blah blah blah
		</div>
		<span class="hide" id="opponentLegend"></span>
	</body>
</html>
