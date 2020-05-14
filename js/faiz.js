function getExternalApi() {
    fetch("https://api.exchangeratesapi.io/latest?base=USD")
        .then(response => response.json())
        //.then(data=>console.log(data)) //tüm verileri alma
        .then(data => {
            console.log(data.rates.TRY);
        })
        .catch(err => console.log(err));
}
getExternalApi();




let p = document.getElementById("change");
fetch("https://api.exchangeratesapi.io/latest?base=USD")
    .then(response => response.json())
    //.then(data=>console.log(data)) //tüm verileri alma
    .then(data => {
        console.log("CHANGE" + data.rates.TRY);
        // var change = (data.rates.TRY);
        // change = change.toFixed(3);
        // p.innerHTML += `${change}`
    })
    .catch(err => console.log(err));






