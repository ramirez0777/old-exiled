<?php
	function changeJSON($player, $whatImChanging, $whatImChangingToo)
	{
		print_r($whatImChanging, $whatImChangingToo);
		//Load the file. Make a variable to differentiate player
		$contents = file_get_contents('json/player'.$player.'field.json');
		 
		//Decode the JSON data into a PHP array.
		$contentsDecoded = json_decode($contents, true);
		 
		//Modify the counter variable.
		$contentsDecoded['field'][$whatImChanging] = $whatImChangingToo;
		 
		//Encode the array back into a JSON string.
		$json = json_encode($contentsDecoded);
		 
		//Save the file.
		file_put_contents('json/player'.$player.'field.json', $json);
		return 'field updated';
	}
	
	if(isset($_GET['player']) && isset($_GET['champion']))
	{
		$result = changeJSON($_GET['player'], 'champion', $_GET['champion']);
		print_r($result);
	}
	elseif(isset($_GET['player']) && isset($_GET['support1']))
	{
		$result = changeJSON($_GET['player'], 'support1', $_GET['support1']);
		print_r($result);
	}
	elseif(isset($_GET['player']) && isset($_GET['support2']))
	{
		$result = changeJSON($_GET['player'], 'support2', $_GET['support2']);
		print_r($result);
	}
	
	if(isset($_GET['player']) && isset($_GET['champion']))
	{
		echo 'fuck2';
	}
?>