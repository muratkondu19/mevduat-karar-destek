const amount1 = document.getElementById("mevduat_tutar").value; //mevduat tutarını alma
const headerOne = document.getElementById("headerOne"); //card seçme 
const expiry = document.getElementById("inputGroupSelect01").value; //döviz cinsini alma 
//döviz cinsine göre değişim işlemleri 
if (expiryTwo == "TRY") {
    firstCurrencyType = "TRY";
    secondCurrencyType = "USD";
} else if (expiryTwo == "EUR") {
    firstCurrencyType = "EUR";
    secondCurrencyType = "TRY";
} else if (expiryTwo == "USD") {
    firstCurrencyType = "USD";
    secondCurrencyType = "TRY";
}
//Fetch kullanarak asenkron veri alma işlemi
class Request {
    firstCurrencyType;
    secondCurrencyType;
    amount = amount1;
    get(url) {
        return new Promise((resolve, reject) => {
            fetch(url + firstCurrencyType)
                .then(response => response.json())
                .then(data => {
                    // console.log(data.rates.USD); USD DEĞERİ ALMA
                    const parity = data["rates"][secondCurrencyType];
                    const amount2 = Number(this.amount);
                    let total = parity * amount2;
                    resolve(total);
                })
                .catch(err => reject(err))
        })
    }
}

const request = new Request();
let total;
request.get("https://api.exchangeratesapi.io/latest?base=")

.then(function(total) {
        parite2 = total.toFixed(2);
        if (expiry == "TRY") {
            headerOne.innerHTML = `
        <div class="card-header">Mevduatınızın Dolar Karşılığı</div>
        <div class="card-body">
            <h5 class="card-title">${parite2} <i class="fa fa-usd" aria-hidden="true"></i></h5>
            <p class="card-text"><i class="fa fa-bar-chart" aria-hidden="true"></i></p>
            
        </div>`
        } else if (expiryTwo == "EUR") {
            headerOne.innerHTML = `
            <div class="card-header">Mevduatınızın Türk Lirası Karşılığı</div>
            <div class="card-body">
                <h5 class="card-title">${parite2} <i class="fa fa-try" aria-hidden="true"></i></h5>
                <p class="card-text"><i class="fa fa-bar-chart" aria-hidden="true"></i> </p>
            </div>`
        } else if (expiryTwo == "USD") {
            headerOne.innerHTML = `
            <div class="card-header">Mevduatınızın Türk Lirası Karşılığı</div>
            <div class="card-body">
                <h5 class="card-title">${parite2} <i class="fa fa-try" aria-hidden="true"></i></h5>
                <p class="card-text"><i class="fa fa-bar-chart" aria-hidden="true"></i> </p>
            </div>`
        }
    })
    .catch(err => console.log(err));