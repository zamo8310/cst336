            var selectedWord = "";
            var selectedHint = "";
            var board = "";
            var remainingGuesses = 6;
            var words = [{word: "snake", hint: "It's a reptile"}, 
                         {word: "monkey", hint: "It loves banana"},
                         {word: "beetle", hint: "It's an insect"},
                         {word: "octopus", hint: "It has eight legs"},
                         {word: "horse", hint: "Tina Belcher loves this animal"}];
            var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                            'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
   

            
            startGame();
            
            function startGame() {
                
                pickWord();
                initBoard();
                updateBoard();
                createLetters();
            }
            
   
            function initBoard() {
                
                for (var i=0; i < selectedWord.length; i++ ) {
                    
                    board += "_";
                    
                }
                
                console.log(board);
                
            }
    
            
            function pickWord() {
                var randomInt = Math.floor( Math.random() * words.length );
                selectedWord = words[randomInt].word.toUpperCase();
                selectedHint = words[randomInt].hint;
                //console.log(selectedWord);
            }
            
            
            function updateBoard() {
                
                
                $("#word").empty();
                for (var letter of board) {
                    document.getElementById("word").innerHTML += letter + " ";
                }
                $("#word").append("<br />");
                $("#word").append("<button class='hint' id= 'hintBtn'> Hint </button>");
                  
                 $("#hintBtn").click(function(){
                    $("#word").append("<span class= 'hint'>" + selectedHint + "</span>");
                    disableButton($(this));
                     
                    //alert(selectedHint);
                 });
                //$("#word").append("<span class= 'hint'>Hint: " + selectedHint + "</span>");
            }
      
         
         $("#letterBtn").click(function(){
              var boxVal = $("#letterBox").val();
               alert(boxVal);
               
         });
                
                
        $(".replayBtn").click( function(){ 
            location.reload();
        });
                
            function createLetters(){
                
                for (var letter of alphabet) {
                    
                    $("#letters").append("<button class='letter' id='"+letter+"'>" + letter + "</button>");
                }
                
            }
            $(".letter").click( function(){ 
                //alert($(this).attr("id"));
                checkLetter( $(this).attr("id") );
                disableButton($(this));
                });
            
            function checkLetter(letter) {
                
                var positions = new Array();
                
                for (var i=0; i < selectedWord.length; i++) {
                    console.log(selectedWord);
                    if (letter == selectedWord[i]) {
                        
                        positions.push(i);
                    }
                }
                
                if (positions.length > 0) {
                    
                    updateWord(positions, letter);
                    if (!board.includes('_')){
                     endGame(true);
                    }
                } else{
                    
                    remainingGuesses--;
                    $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png" );
                }
                
                if(remainingGuesses <= 0){
                    endGame(false);
                }
                
                
            }
            
            function updateWord(positions, letter){
                for(var pos of positions){
                    board=replaceAt(board, pos, letter);
                }
                updateBoard();
            }
            
            function replaceAt(str, index, value){
                return str.substr(0, index) + value + str.substr(index + value.length);
            }
            //events
            
        
                
            function endGame(win){
                $("#letters").hide();
                
                if(win){
                    $('#won').show();
                } else{
                    $('#lost').show();
                }
                
            }

            function disableButton(btn){
                btn.prop("disabled", true);
                btn.attr("class", "btn btn-danger");
            }