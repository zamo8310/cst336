var imgPlayer;
var btnCockRoach;
var btnFoot;
var btnBomb;
var btnGo;
var computerChoice, playerChoice;

function startGame(){
	document.getElementById('introScreen').style.display='none';
}

function replay(){
	document.getElementById('endScreen').style.display='none';
}

function init(){
	imgPlayer = document.getElementById("imgPlayer");
	btnCockRoach = document.getElementById("btnCockRoach");
	btnFoot = document.getElementById("btnFoot");
	btnBomb = document.getElementById("btnBomb");
	btnGo = document.getElementById("btnGo");
	deselectPlayer();
}


function deselectPlayer(){
	btnCockRoach.style.backgroundColor='silver';
	btnFoot.style.backgroundColor='silver';
	btnBomb.style.backgroundColor='silver';
	
}

function deselectComputer(){
	document.getElementById('lblcockroach').style.backgroundColor='#EEEEEE';
	document.getElementById('lblfoot').style.backgroundColor='#EEEEEE';
	document.getElementById('lblbomb').style.backgroundColor='#EEEEEE';
}
	
function select(choice){
	playerChoice= choice;
	imgPlayer.src='img/' + choice + '.jpg';
	deselectPlayer();
	switch(choice){
	case "cockroach":
        btnCockRoach.style.backgroundColor='#888888';
        break;
    case "foot":
        btnFoot.style.backgroundColor='#888888';
        break;
    case "bomb":
        btnBomb.style.backgroundColor='#888888';
        break;
	}
	btnGo.style.display='block';
	
}

function go(){
	var numChoice= Math.floor(Math.random()*3);
	var imgComputer= document.getElementById("imgComputer");
	var txtEndMessage = document.getElementById("txtEndMessage");
	var txtEndTitle = document.getElementById("txtEndTitle");
	
	deselectComputer();

	switch(numChoice){
	case 0:
        computerChoice= 'cockroach';
        if(playerChoice=='foot'){
        	txtEndTitle.innerHTML = "Foot stomps Roach"; 
        	txtEndMessage.innerHTML = "YOU WIN";
        }
        else if(playerChoice=='bomb'){
        	txtEndTitle.innerHTML = "Roach survives Bomb"; 
        	txtEndMessage.innerHTML = "YOU LOSE";
        }
        else{
        	txtEndTitle.innerHTML = ""; 
        	txtEndMessage.innerHTML = "TIE";
        }
        break;
    case 1:
        computerChoice= 'foot';
            if(playerChoice=='bomb'){
        	txtEndTitle.innerHTML = "Bomb blows up Foot"; 
        	txtEndMessage.innerHTML = "YOU WIN";
        }
        else if(playerChoice=='cockroach'){
        	txtEndTitle.innerHTML = "Foot stomps Roach"; 
        	txtEndMessage.innerHTML = "YOU LOSE";
        }
        else{
        	txtEndTitle.innerHTML = ""; 
        	txtEndMessage.innerHTML = "TIE";
        }
        break;
    case 2:
        computerChoice = 'bomb';
        if(playerChoice=='cockroach'){
        	txtEndTitle.innerHTML = "Roach survives Bomb"; 
        	txtEndMessage.innerHTML = "YOU WIN";
        }
        else if(playerChoice=='foot'){
        	txtEndTitle.innerHTML = "Bomb blows up Foot"; 
        	txtEndMessage.innerHTML = "YOU LOSE";
        }
        else{
        	txtEndTitle.innerHTML = ""; 
        	txtEndMessage.innerHTML = "TIE";
        }
        break;
	}
	imgComputer.src='img/' + computerChoice + '.jpg';
	document.getElementById('lbl'+computerChoice).style.backgroundColor='silver';
	document.getElementById('endScreen').style.display='block';
}

function replay(){
	document.getElementById('endScreen').style.display = 'none';
	btnGo.style.display = 'none';
	
	deselectPlayer();
	deselectComputer();
	
	imgPlayer.src = 'img/question.png';
	document.getElementById('imgComputer').src = 'img/question.png';
	
}



