var legends = ['air', 'dark', 'earth', 'fire', 'light', 'unknown', 'water'];



function select(legendName)
{
	for(i = 0; i < legends.length; i++)
	{
		document.getElementById(legends[i]).className = 'unselected';
	}
	legendName.className = 'legend-selected';	
	document.getElementById('sub').disabled = false;
}

function start()
{
	document.getElementById('start').className = 'hide';
	document.getElementById('legend-wrap').className = 'legend-wrap';
	var audio = new Audio('audio/choose.mp3');
	audio.play();
}