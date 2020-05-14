const amountTwo = document.getElementById("mevduat_tutar").value; //mevduat tutarının alınması
const headerTwo = document.getElementById("headerTwo"); //card seçimi
const expiryTwo = document.getElementById("inputGroupSelect01").value; //döviz cinsinin alınması
//döviz cinsine göre değişim işlemleri 
if (expiryTwo == "TRY") {
    firstCurrencyType = "TRY";
    thirdCurrencyType = "EUR";
} else if (expiryTwo == "EUR") {
    firstCurrencyType = "EUR";
    thirdCurrencyType = "USD";
} else if (expiryTwo == "USD") {
    firstCurrencyType = "USD";
    thirdCurrencyType = "EUR";
}
class RequestTwo {
    firstCurrencyType;
    thirdCurrencyType;
    amount = amountTwo;
    get(url) {
        return new Promise((resolve, reject) => {
            fetch(url + firstCurrencyType)
                .then(response => response.json())
                .then(data => {
                    // console.log(data.rates.USD); USD DEĞERİ ALMA
                    const parity = data["rates"][thirdCurrencyType];
                    const amount2 = Number(this.amount);
                    let totalTwo = parity * amount2;
                    resolve(totalTwo);
                })
                .catch(err => reject(err))
        })
    }
}
const requestTwo = new RequestTwo();
let totalTwo;

requestTwo.get("https://api.exchangeratesapi.io/latest?base=")

.then(function(totalTwo) {
        parite2 = totalTwo.toFixed(2);
        if (expiryTwo == "TRY") {
            headerTwo.innerHTML = `
        <div class="card-header">Mevduatınızın Euro Karşılığı</div>
        <div class="card-body">
            <h5 class="card-title">${parite2} <i class="fa fa-eur" aria-hidden="true"></i></h5>
            <p class="card-text"><i class="fa fa-bar-chart" aria-hidden="true"></i> </p>
        </div>`
        } else if (expiryTwo == "EUR") {
            headerTwo.innerHTML = `
            <div class="card-header">Mevduatınızın Dolar Karşılığı Karşılığı</div>
            <div class="card-body">
                <h5 class="card-title">${parite2} <i class="fa fa-usd" aria-hidden="true"></i></h5>
                <p class="card-text"><i class="fa fa-bar-chart" aria-hidden="true"></i> </p>
            </div>`
        } else if (expiryTwo == "USD") {
            headerTwo.innerHTML = `
            <div class="card-header">Mevduatınızın Euro Karşılığı</div>
            <div class="card-body">
                <h5  class="card-title">${parite2} <i class="fa fa-eur" aria-hidden="true"></i></h5>
                <p class="card-text"><i class="fa fa-bar-chart" aria-hidden="true"></i></p>
            </div>`
        }
    })
    .catch(err => console.log(err));