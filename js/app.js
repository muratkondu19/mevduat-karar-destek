// Elementleri Seçme
const amountElement = document.querySelector("#amount");
const firstSelect = document.querySelector("#firstCurrency");
const secondSelect = document.querySelector("#secondCurrency");
//Currency class'ını dahil etme
const currency = new Currency("USD", "TRY");
//UI class'ını dahil etme
const ui = new UI(firstSelect, secondSelect);

eventListeners();
//event atama
function eventListeners() {
    amountElement.addEventListener("input", exchangeCurrency);
    firstSelect.onchange = function() {
        currency.changeFirstCurrency(firstSelect.options[firstSelect.selectedIndex].textContent);
        ui.changeFirst();
    };
    secondSelect.onchange = function() {
        currency.changeSecondCurrency(secondSelect.options[secondSelect.selectedIndex].textContent);
        ui.changeSecond();
    };
}

function exchangeCurrency() {
    currency.changeAmount(amountElement.value);
    currency.exchange() //promise yapısı
        .then(result => {
            ui.displayResult(result);
        })
        .catch(err => console.log(err));
}