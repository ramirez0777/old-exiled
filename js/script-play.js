var legends = ['air', 'dark', 'earth', 'fire', 'light', 'unknown', 'water'];

var champion = '';
var support1 = '';
var support2 = '';

var deck = '';

var otherfield = '';
var otherLegend = '';

var graveCount = 0;

var oldID = '';
//Checks if document is ready kind've like onload

console.log("Opponent is: Player " + opponent);

$(document).ready
(
	function()
	{

		//console.log('ready');
		$.getJSON('json/player'+player+'field.json', function (data)
		{
			//console.log(data);	
			//cycle through every object in the document
			$.each(data, function (key, field)
			{
				//console.log(key + '' + field)
				champion = '<img src="img/' + yourlegend + '/' + field.champion + '.jpg" draggable="true" id="champion" ondragstart="drag(event)"><input type="hidden" name="champion" value="'+ field.champion +'">';
				support1 = '<img src="img/' + yourlegend + '/' + field.support1 + '.jpg" draggable="true" id="support1" ondragstart="drag(event)"><input type="hidden" name="support1" value="'+ field.support1 +'">';
				support2 = '<img src="img/' + yourlegend + '/' + field.support2 + '.jpg" draggable="true" id="support2" ondragstart="drag(event)"><input type="hidden" name="support2" value="'+ field.support2 +'">';
				// content = value.champion;

			});
		
			$('#champion-wrap').html(champion);
			$('#support1-wrap').html(support1);
			$('#support2-wrap').html(support2);
		});
		
		$.getJSON('json/player'+player+'deck.json', function (data)
		{
			//console.log(data);	
			//cycle through every object in the document
			$.each(data, function (key, game)
			{
				//console.log(key + '' + game)

				deck += '<div class="card-cover"><img src="img/back.jpg" onclick="showCard(this, '+game.one+')"><img src="img/'+yourlegend+'/'+game.one+'.jpg" alt="'+legend+game.one+'" class="hide" id="'+game.one+'" draggable="true" ondragstart="drag(event)"><input type="hidden" name="deck1" value="'+game.one+'"></div>';
				console.log(game.one);
				
				deck += '<div class="card-cover"><img src="img/back.jpg" onclick="showCard(this, '+game.two+')"><img src="img/'+yourlegend+'/'+game.two+'.jpg" alt="'+legend+game.two+'" class="hide" id="'+game.two+'" draggable="true" ondragstart="drag(event)"><input type="hidden" name="deck2" value="'+game.two+'"></div>';
				console.log(game.two);
				
				deck += '<div class="card-cover"><img src="img/back.jpg" onclick="showCard(this, '+game.three+')"><img src="img/'+yourlegend+'/'+game.three+'.jpg" alt="'+legend+game.three+'" class="hide" id="'+game.three+'" draggable="true" ondragstart="drag(event)"><input type="hidden" name="deck3" value="'+game.three+'"></div>';
				console.log(game.three);
			
			});
			//fills in carousel
			$('#deck').html(deck);
		});
		
		gatherOpponent();
		
		
		  
		  
		$('#champion-wrap').zoom();
		$('#support1-wrap').zoom();
		$('#support2-wrap').zoom();
		$('#legend').zoom();
	}
);

function gatherOpponent()
{
	$.getJSON('json/player'+opponent+'legend.json', function (data)
	{
		// $('#opponentLegend').html(data.legend);
		otherLegend = data.legend;
		//console.log('html set: '+ data.legend);
	});

	
	
	$.getJSON('json/player'+opponent+'field.json', function (data)
	{
		//console.log(data);	
		//cycle through every object in the document

		$.each(data, function (key, field)
		{

			
			//otherLegend = document.getElementById('opponentLegend').innerHTML;
			//console.log('dddd:2 ' + otherLegend);
			//console.log(field.champion);
			//console.log(field.support1);
			//console.log(field.support2);
			//console.log(key + '' + field)
			//im manually typing this in but i need another JSON file to gather the legendaries from each player
			//console.log(otherLegend);
			otherfield += '<h4>Champion</h4><img src="img/'+ otherLegend +'/'+ field.champion +'.jpg">'
			otherfield += '<h4>Support</h4><img src="img/'+ otherLegend +'/'+ field.support1 +'.jpg">'
			otherfield += '<h4>Support</h4><img src="img/'+ otherLegend +'/'+ field.support2 +'.jpg">'

		});
		console.log();
		
		document.getElementById('opponent').innerHTML = otherfield;
		otherfield = '';
	});
}

function showCard(back, card)
{
	back.className = 'hide';support2
	document.getElementById(card).className = 'show';
}

function drag(event)
{
	event.dataTransfer.setData("text", event.target.id);
	
	console.log('What i\'m moving is: ' + event.target.id);
	
	oldID = event.target.id;
}

function allowDrop(event)
{
	event.preventDefault();
}

function drop(event, where)
{
	let JSONchampion = '';
	let JSONsupport1 = '';
	let JSONsupport2 = '';
	let link = '';
	let api = true;
	
	event.preventDefault();
	var data = event.dataTransfer.getData("text");
	event.target.appendChild(document.getElementById(data));
	console.log('Dropping into ' + where);
	

	switch(where)
	{
		case 'grave':
			document.getElementById(oldID).id = ('grave' + graveCount);
			console.log('new ID is: grave' + graveCount);
			graveCount++;
			api = false;
			break;
		case 'support1':
			JSONsupport1 = document.getElementById(oldID).src.charAt(document.getElementById(oldID).src.length-5);
			link = 'gatherJSON.php?player='+ player +'&support1='+ JSONsupport1;
			document.getElementById(oldID).id = ('support1');
			console.log('new ID is: support1');
			break;
		case 'support2':
			JSONsupport2 = document.getElementById(oldID).src.charAt(document.getElementById(oldID).src.length-5);
			link = 'gatherJSON.php?player='+ player +'&support2='+ JSONsupport2;
			document.getElementById(oldID).id = ('support2');
			console.log('new ID is: support2');
			break;
		case 'champion':
			JSONchampion = document.getElementById(oldID).src.charAt(document.getElementById(oldID).src.length-5);
			link = 'gatherJSON.php?player='+ player +'&champion='+ JSONchampion;
			document.getElementById(oldID).id = ('champion');
			console.log('new ID is: champion');
	}
	
	if(api)
	{
	fetch(link)
		.then(res => console.log('new info pushed'))
		.catch(error => console.log('info not pushed :('));
	}
	

	
	
	console.log(link);
}

function flip(lgd, legend)
{
	lgd.src = 'img/flip/'+legend+'.jpg';
}

var intervalId = window.setInterval(function(){
	//document.getElementById('opponent').innerHTML = '';
  gatherOpponent();
}, 1000);