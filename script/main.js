var tab = [ [{value:1,html:''}, {value:2,html:''}, {value:3,html:''}, {value:4,html:''}],
[{value:5,html:''}, {value:6,html:''}, {value:7,html:''}, {value:8,html:''}],
[{value:9,html:''}, {value:10,html:''}, {value:11,html:''}, {value:12,html:''}],
[{value:13,html:''}, {value:14,html:''}, {value:15,html:''}, {value:null,html:''}] ];

let divs = [];

let kontener = null;

let liczbaRuchow = 0;

let start = 0;
let stop = 0;
let time = 0;

let czlowiek = 0;

function postjson (){
    $.ajax({
        url         : "../pietnascie/game.php",
        method      : "post",
        data        : {
            liczbaRuchow_json : liczbaRuchow,
            time_json : time
        }
    })
}


function przeszukaj(){
    let indeks = [0,0];
    for (let i = 0; i < 4; i++){
        for (let j = 0; j < 4; j++){
            if(tab[i][j].value == null){
                indeks[0] = i;
                indeks[1] = j;
                return indeks;
            }
        }
    }
}

function sprawdzCzyAktywna(i,j){
    pi = przeszukaj()[0];
    pj = przeszukaj()[1];
    if((i-pi) == 0 && (j-pj) == 0){return false}
    else if ((i-pi) == 0 && Math.abs(j-pj) == 1){return true}
    else if ((j-pj) == 0 && Math.abs(i-pi) == 1){return true}
    else {return false}
}

function zamianaPol(i,j){
    pi = przeszukaj()[0];
    pj = przeszukaj()[1];
    if(sprawdzCzyAktywna(i,j)){
        if(tab[pi][pj].value == null){
            tab[pi][pj].value = tab[i][j].value;
            tab[i][j].value = null;
            liczbaRuchow++;
            render();
        }
    }
}

function  render(){
    if(kontener != null){document.body.removeChild(kontener);}
     kontener = document.createElement("div");
    document.body.appendChild(kontener);
    let k = 0;
    for (let i = 0; i < 4; i++){
        divs[i] = document.createElement("div");
        divs[i].classList.add("linijka")
        kontener.appendChild(divs[i]);
        for(let j = 0; j < 4; j++){
            if(tab[i][j].value == 4*i+j+1){
                k++;
            }
            let x = tab[i][j].value;
            tab[i][j].html = document.createElement("div");
            tab[i][j].html.innerText = x;
            tab[i][j].html.id = x;
            tab[i][j].html.classList.add("komorka");
            tab[i][j].html.addEventListener('click', zamianaPol.bind(this,i,j));
            divs[i].appendChild(tab[i][j].html);

        }
    }
    if(czlowiek && k == 15){
        let date = new Date();
        stop = date.getTime();
        time = (stop - start)/1000;
        postjson();
        
    }
}

function generator(){
    czlowiek = 0;
    let date = new Date();
    start = date.getTime();
    const min = 0;
    const max = 3;
    for(let i = 0; i < 10000; i++){
        let x = Math.floor(Math.random() * (max-min+1) + min);
        let y = Math.floor(Math.random() * (max-min+1) + min);
        zamianaPol(x,y);
    }
    czlowiek = 1;
    liczbaRuchow = 0;
}

render();

let button = document.querySelector('#losuj');
button.addEventListener('click', generator);



