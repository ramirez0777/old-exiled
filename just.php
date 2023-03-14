
<!DOCTYPE html>
<html lang="en">
	<head>
				<link type="text/css" rel="stylesheet" href="css/style-heroes.css">
				<link type="text/css" rel="stylesheet" href="css/style-select.css">
				<link type="text/css" rel="stylesheet" href="css/style.css">
		<link href="img/icon.jpg" rel="icon" type="image/x-icon">
		<script src="js/script.js"></script>
		<script src="js/script-heroes.js"></script>
		<script> 
		
		var otherpage = '<h1 style="text-align: center; padding: 20px;">Choose Your 6 <span id="type">Earth</span> Heroes!</h1><form class="hero-wrap" method="post" action="select.php"><label for="earth1" class="label"><input type="checkbox" name="1" value="1" id="earth1"><img src="img/earth/1.jpg" alt="earth1" onclick="select(this)" class="unselected"></label><label for="earth2" class="label"><input type="checkbox" name="2" value="2" id="earth2"><img src="img/earth/2.jpg" alt="earth2" onclick="select(this)" class="unselected"></label><label for="earth3" class="label"><input type="checkbox" name="3" value="3" id="earth3"><img src="img/earth/3.jpg" alt="earth3" onclick="select(this)" class="unselected"></label><label for="earth4" class="label"><input type="checkbox" name="4" value="4" id="earth4"><img src="img/earth/4.jpg" alt="earth4" onclick="select(this)" class="unselected"></label><label for="earth5" class="label"><input type="checkbox" name="5" value="5" id="earth5"><img src="img/earth/5.jpg" alt="earth5" onclick="select(this)" class="unselected"></label><label for="earth6" class="label"><input type="checkbox" name="6" value="6" id="earth6"><img src="img/earth/6.jpg" alt="earth6" onclick="select(this)" class="unselected"></label><label for="earth7" class="label"><input type="checkbox" name="7" value="7" id="earth7"><img src="img/earth/7.jpg" alt="earth7" onclick="select(this)" class="unselected"></label><label for="earth8" class="label"><input type="checkbox" name="8" value="8" id="earth8"><img src="img/earth/8.jpg" alt="earth8" onclick="select(this)" class="unselected"></label><label for="earth9" class="label"><input type="checkbox" name="9" value="9" id="earth9"><img src="img/earth/9.jpg" alt="earth9" onclick="select(this)" class="unselected"></label><label for="earth10" class="label"><input type="checkbox" name="10" value="10" id="earth10"><img src="img/earth/10.jpg" alt="earth10" onclick="select(this)" class="unselected"></label><input type="submit" class="sub"></form>';
			
		var otherpage2 = '<img src="img/start.jpg" onclick="start()" id="start" class="start"></div><form method="GET" action="heroes.php" class="hide" id="legend-wrap"><input type="radio" class="hide" name="legend"  value="air" id="air-button" ><label for="air-button" class="legend" id="air-label"> <img src="img/legendaries/legendair.jpg" onclick="select(this)" id="air" alt="air" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="dark" id="dark-button" ><label for="dark-button" class="legend" id="dark-label"> <img src="img/legendaries/legenddark.jpg" onclick="select(this)" id="dark" alt="dark" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="earth" id="earth-button" ><label for="earth-button" class="legend" id="earth-label"> <img src="img/legendaries/legendearth.jpg" onclick="select(this)" id="earth" alt="earth" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="fire" id="fire-button" ><label for="fire-button" class="legend" id="fire-label"> <img src="img/legendaries/legendfire.jpg" onclick="select(this)" id="fire" alt="fire" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="light" id="light-button" ><label for="light-button" class="legend" id="light-label"> <img src="img/legendaries/legendlight.jpg" onclick="select(this)" id="light" alt="light" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="unknown" id="unknown-button" ><label for="unknown-button" class="legend" id="unknown-label"> <img src="img/legendaries/legendunknown.jpg" onclick="select(this)" id="unknown" alt="unknown" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="water" id="water-button" ><label for="water-button" class="legend" id="water-label"> <img src="img/legendaries/legendwater.jpg" onclick="select(this)" id="water" alt="water" class="unselected"> </label>					<div class="legend"><p>Player 1</p><input type="radio" name="player" value="1">layer 2</p><input type="radio" name="player" value="2"><input type="submit" class="sub" disabled id="sub"></div></form>';
		
		var counter = 0;
		
		function start()
		{
			console.log('me: ' + counter);
			if(counter == 1)
			{
				console.log(' hey ')
				document.getElementById('main').InnerHTML = otherpage2;
				counter = counter - 1;
				console.log('fuck me: ' + counter);

			}
			else(counter == 0)
			{
				
				document.getElementById('main').InnerHTML = otherpage;
				counter++;
			}
			
			console.log(counter);
		}
		
		</script>
	</head>
	<body>
		<main id="main" onclick="start()">
			<img src="img/start.jpg" onclick="start()" id="start" class="start"></div>
			<form method="GET" action="heroes.php" class="hide" id="legend-wrap">
					<input type="radio" class="hide" name="legend"  value="air" id="air-button" ><label for="air-button" class="legend" id="air-label"> <img src="img/legendaries/legendair.jpg" onclick="select(this)" id="air" alt="air" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="dark" id="dark-button" ><label for="dark-button" class="legend" id="dark-label"> <img src="img/legendaries/legenddark.jpg" onclick="select(this)" id="dark" alt="dark" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="earth" id="earth-button" ><label for="earth-button" class="legend" id="earth-label"> <img src="img/legendaries/legendearth.jpg" onclick="select(this)" id="earth" alt="earth" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="fire" id="fire-button" ><label for="fire-button" class="legend" id="fire-label"> <img src="img/legendaries/legendfire.jpg" onclick="select(this)" id="fire" alt="fire" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="light" id="light-button" ><label for="light-button" class="legend" id="light-label"> <img src="img/legendaries/legendlight.jpg" onclick="select(this)" id="light" alt="light" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="unknown" id="unknown-button" ><label for="unknown-button" class="legend" id="unknown-label"> <img src="img/legendaries/legendunknown.jpg" onclick="select(this)" id="unknown" alt="unknown" class="unselected"> </label><input type="radio" class="hide" name="legend"  value="water" id="water-button" ><label for="water-button" class="legend" id="water-label"> <img src="img/legendaries/legendwater.jpg" onclick="select(this)" id="water" alt="water" class="unselected"> </label>					<div class="legend">
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


