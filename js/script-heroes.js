var amountSelected = 0;
var legends = ['Air', 'Dark', 'Earth', 'Fire', 'Light', 'Unknown', 'Water'];



var legend = '';

function getType()
{
	legend = document.getElementById('type').innerHTML;
	document.getElementById('main').onmouseover = 'maxSelects()';
	console.log(legend);
}

function select(card)
{
	if(amountSelected < 6 )
	{
		if (card.className != 'selected' )
		{
			card.className = 'selected';
			amountSelected++;
			console.log(amountSelected);
		}
		else 
		{
			card.className = 'unselected';
			amountSelected--;
			console.log(amountSelected);
		}
	}
	else
	{
		if(card.className != 'selected')
		{
			alert('You have selected the max amount of heroes');
		}
		else
		{
			
			card.className = 'unselected';
			amountSelected--;
			console.log(amountSelected);
		}
	}	
}

// function maxSelects()
// {
	// if(amountSelected >= 6)
	// {
		// for (x = 1; x < 11; x++)
		// {	
			// document.getElementsByClassName('label').setAttribute('for', null);
		// }
	// }
// }