window.onload = function(){

/*variaveis cronometro*/
var cron = document.getElementById('cron');
cron.innerHTML = 20;
var restartTimer = false;
var counter = 19;
/*****/

/*variaveis placar*/
var placar_1 = 0;
var placar_2 = 0;
var p1 = document.getElementById('p1');
var p2 = document.getElementById('p2');
p1.innerHTML = placar_1;
p2.innerHTML = placar_2;
var addButton = document.querySelectorAll('.add');
var subButton = document.querySelectorAll('.sub');
/*****************/





for(i = 0; i<addButton.length; i++){
    addButton[i].addEventListener("click", addAcaoBotoes);
    subButton[i].addEventListener("click", subAcaoBotoes);
}

function addAcaoBotoes(e){

    if(this.id == "add1"){
        placar_1++;
        p1.innerHTML = placar_1;
    }else if(this.id == "add2"){
        placar_2++;
        p2.innerHTML = placar_2;
    }
}

function subAcaoBotoes(e){

    if(this.id == "sub1"){
        placar_1--;
        if(placar_1 < 0){
            placar_1 = 0;
        }
        p1.innerHTML = placar_1;
    }else if(this.id == "sub2"){
        placar_2--;
        if(placar_2 < 0){
            placar_2 = 0;
        }
        p2.innerHTML = placar_2;
    }
}



/*****cronômetro****/
initButton = document.getElementById('iniciar');
rnitButton = document.getElementById('reiniciar');

initButton.addEventListener("click", initCronometro);
rnitButton.addEventListener("click", function(){
    if(counter == 0){
        initCronometro();
    }else{
        restartTimer = true;
        counter = 19;
    }

});

function initCronometro(){
    restartTimer = false;
    cron.innerHTML = 20;
     counter = 19;

     function temporizador(){
        var timer = setTimeout(() => {
            console.log(counter);
            cron.innerHTML = counter;
            if(counter > 0){
                counter--;
                temporizador();
            }else if(counter == 0){
                tocarBeep();
            }
        }, 1000);

        if(restartTimer == true){
            clearTimeout(timer);
            cron.innerHTML = 20;
        }
    }

    temporizador();
}
/*******/

/***salvar partida***/
var controlRanking = document.getElementById('control-ranking');
var rankingDiv = document.getElementById('ranking');

controlRanking.addEventListener("click",function(){
  
    rankingDiv.classList.toggle('mostrar');
});


var refreshButton = document.getElementById('refresh');
refreshButton.addEventListener('click',function(){
    location.reload();
});
/******/




/*toca beep quando acaba o tempo*/
var audio = document.getElementById('audio');
function tocarBeep(){
    audio.play();
}
/*********/

















}