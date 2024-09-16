async function getCurrencyRate(fromCurrency, toCurrency) {
    const response = await fetch(`https://api.exchangerate-api.com/v4/latest/${fromCurrency}`);
    const data = await response.json();
    const rate = data.rates[toCurrency];
    return rate;
    console.log("Currency rate fetched successfully.");
}

let fromCurrency = "USD";
let toCurrency = "EUR";
getCurrencyRate(fromCurrency, toCurrency).then(rate => {
    console.log(`Exchange rate from ${fromCurrency} to ${toCurrency}: ${rate}`);
});


