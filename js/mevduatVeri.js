//Döviz çeviricisindeki tutarla işlem yapmak isteyen kullanıcı için verilerin aktarılması işlemi
const mevduatTutar=document.getElementById("outputResult");
const mevduatCins=document.getElementById("secondCurrency");
const veriAl=document.getElementById("mevduat_veri");
const veriTutar=document.getElementById("mevduat_tutar");
const veriCins=document.getElementById("cins");
eventListeners();

function eventListeners(){
    veriAl.addEventListener("click",mevduatVeri);
}

function mevduatVeri(){
    tutar=Number(mevduatTutar.value);
    cins=mevduatCins.options[mevduatCins.selectedIndex].textContent;
    veriTutar.value=tutar;
    getVeri=veriCins.options[veriCins.selectedIndex].textContent;
    if (cins=="TRY"){
       veriCins.innerHTML=(`<option value="TRY">TRY</option>`);
    }else if(cins=="USD"){
        veriCins.innerHTML=(`<option value="USD">USD</option>`);
    }else if(cins==`EUR`){
        veriCins.innerHTML=(` <option value="EUR">EUR</option>`);
    }
}
