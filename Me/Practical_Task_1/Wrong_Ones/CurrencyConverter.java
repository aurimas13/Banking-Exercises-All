import java.util.HashMap;

public class CurrencyConverter {
    public static void main(String[] args) {
        HashMap<String, Double> exchangeRates = new HashMap<>();
        exchangeRates.put("USD", 1.0);
        exchangeRates.put("EUR", 0.85);
        exchangeRates.put("JPY", 110.0);

        double convertedAmount = convertCurrency("USD", "JPY", 1000, exchangeRates);
        System.out.println("Converted Amount: " + convertedAmount);
    }

    public static double convertCurrency(String fromCurrency, String toCurrency, double amount, HashMap<String, Double> exchangeRates) {
        double fromRate = exchangeRates.get(fromCurrency);
        double toRate = exchangeRates.get(toCurrency);
        return amount * fromRate / toRate; // Incorrect conversion logic
    }
}
