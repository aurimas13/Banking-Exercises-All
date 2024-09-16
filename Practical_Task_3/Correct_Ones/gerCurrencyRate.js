async function getCurrencyRate(fromCurrency, toCurrency) {
    try {
        const response = await fetch(`https://api.exchangerate-api.com/v4/latest/${fromCurrency}`);
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        const rate = data.rates[toCurrency];
        if (!rate) {
            throw new Error(`Exchange rate not available for ${toCurrency}.`);
        }
        console.log("Currency rate fetched successfully.");
        return rate;
    } catch (error) {
        console.error(`Error fetching currency rate: ${error.message}`);
        return null;
    }
}

let fromCurrency = "USD";
let toCurrency = "EUR";
getCurrencyRate(fromCurrency, toCurrency).then(rate => {
    if (rate) {
        console.log(`Exchange rate from ${fromCurrency} to ${toCurrency}: ${rate}`);
    } else {
        console.log("Failed to fetch the exchange rate.");
    }
});


