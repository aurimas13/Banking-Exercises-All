import java.util.HashMap;
import java.util.Scanner;

public class CurrencyConverter {
    private HashMap<String, Double> exchangeRates;

    public CurrencyConverter() {
        exchangeRates = new HashMap<>();
        exchangeRates.put("USD", 1.0);
        exchangeRates.put("EUR", 0.85);
        exchangeRates.put("JPY", 110.0);
        exchangeRates.put("GBP", 0.75);
    }

    public double convert(String fromCurrency, String toCurrency, double amount) {
        if (amount <= 0) {
            System.out.println("Error: Amount must be positive.");
            return 0;
        }

        // Bug 1: Possible NullPointerException if fromCurrency or toCurrency is not in exchangeRates
        double fromRate = exchangeRates.get(fromCurrency);
        double toRate = exchangeRates.get(toCurrency);

        // Bug 2: Incorrect formula for currency conversion
        double convertedAmount = amount / fromRate * toRate; 

        // Bug 3: Incorrect null check placement, should be before using fromRate and toRate
        if (fromRate == null || toRate == null) {
            System.out.println("Error: Conversion rate not found.");
            return -1;
        }

        // Bug 4: Division by zero error possibility if fromRate or toRate is zero
        if (fromRate == 0 || toRate == 0) {
            System.out.println("Error: Conversion rate cannot be zero.");
            return -1;
        }

        // Bug 5: Syntax error due to incomplete expression
        double finalAmount = convertedAmount + amount / ; 

        // Bug 6: Output formatting issue, amount not properly rounded
        System.out.println("Converted amount from " + fromCurrency + " to " + toCurrency + ": " + finalAmount);

        // Bug 7: Incorrect return value in case of an error, might return uncalculated or erroneous finalAmount
        return finalAmount;
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        CurrencyConverter converter = new CurrencyConverter();

        System.out.print("Enter source currency: ");
        String fromCurrency = scanner.nextLine();

        System.out.print("Enter target currency: ");
        String toCurrency = scanner.nextLine();

        System.out.print("Enter amount: ");
        double amount = scanner.nextDouble();

        double result = converter.convert(fromCurrency, toCurrency, amount);
        System.out.println("Result: " + result);
    }
}

// import java.util.HashMap;
// import java.util.Scanner;

// public class CurrencyConverter {
//     private HashMap<String, Double> exchangeRates;

//     public CurrencyConverter() {
//         exchangeRates = new HashMap<>();
//         exchangeRates.put("USD", 1.0);
//         exchangeRates.put("EUR", 0.85);
//         exchangeRates.put("JPY", 110.0);
//         exchangeRates.put("GBP", 0.75);
//     }

//     public double convert(String fromCurrency, String toCurrency, double amount) {
//         if (amount <= 0) {
//             System.out.println("Error: Amount must be positive.");
//             return 0;
//         }

//         double fromRate = exchangeRates.get(fromCurrency); 
//         double toRate = exchangeRates.get(toCurrency); 

//         // Bug: Incorrect formula with a misplaced semicolon, causing a logic error
//         double convertedAmount = amount / fromRate * toRate;

//         // Intentional compile-time errors:
//         if (toRate == null) {  // Bug: Null check incorrectly placed after usage
//             System.out.println("Error: Conversion rate not found for currency: " + toCurrency);
//             return -1;
//         }

//         if (fromRate == null) { // Bug: Null check incorrectly placed after usage
//             System.out.println("Error: Conversion rate not found for currency: " + fromCurrency);
//             return -1;
//         }

//         // Intentional compile-time errors:
//         double finalAmount = convertedAmount + amount / ; // Bug: Syntax error due to misplaced slash

//         System.out.println("Converted amount from " + fromCurrency + " to " + toCurrency + ": " + finalAmount);
//         return finalAmount;
//     }

//     public static void main(String[] args) {
//         Scanner scanner = new Scanner(System.in);
//         CurrencyConverter converter = new CurrencyConverter();

//         System.out.print("Enter source currency: ");
//         String fromCurrency = scanner.nextLine();

//         System.out.print("Enter target currency: ");
//         String toCurrency = scanner.nextLine();

//         System.out.print("Enter amount: ");
//         double amount = scanner.nextDouble();

//         double result = converter.convert(fromCurrency, toCurrency, amount);
//         System.out.println("Result: " + result);
//     }
// }

// // import java.util.HashMap;
// // import java.util.Scanner;

// // public class CurrencyConverter {
// //     private HashMap<String, Double> exchangeRates;

// //     public CurrencyConverter() {
// //         exchangeRates = new HashMap<>();
// //         exchangeRates.put("USD", 1.0);
// //         exchangeRates.put("EUR", 0.85);
// //         exchangeRates.put("JPY", 110.0);
// //         exchangeRates.put("GBP", 0.75);
// //     }

// //     public double convert(String fromCurrency, String toCurrency, double amount) {
// //         if (amount <= 0) {
// //             System.out.println("Error: Amount must be positive.");
// //             return 0;
// //         }

// //         double fromRate = exchangeRates.get(fromCurrency); 
// //         double toRate = exchangeRates.get(toCurrency); 

// //         // Bug: Incorrect formula with a misplaced semicolon, causing a logic error
// //         double convertedAmount = amount / fromRate * toRate;;

// //         // Intentional compile-time errors:
// //         if (toRate == null) {  // Bug: Null check incorrectly placed after usage
// //             System.out.println("Error: Conversion rate not found for currency: " + toCurrency);
// //             return -1;
// //         }

// //         if (fromRate == null) { // Bug: Null check incorrectly placed after usage
// //             System.out.println("Error: Conversion rate not found for currency: " + fromCurrency);
// //             return -1;
// //         }

// //         // Intentional compile-time errors:
// //         double finalAmount = convertedAmount + amount / ; // Bug: Syntax error due to misplaced slash

// //         System.out.println("Converted amount from " + fromCurrency + " to " + toCurrency + ": " + finalAmount);
// //         return finalAmount;
// //     }

// //     public static void main(String[] args) {
// //         Scanner scanner = new Scanner(System.in);
// //         CurrencyConverter converter = new CurrencyConverter();

// //         System.out.print("Enter source currency: ");
// //         String fromCurrency = scanner.nextLine();

// //         System.out.print("Enter target currency: ");
// //         String toCurrency = scanner.nextLine();

// //         System.out.print("Enter amount: ");
// //         double amount = scanner.nextDouble();

// //         double result = converter.convert(fromCurrency, toCurrency, amount);
// //         System.out.println("Result: " + result);
// //     }
// // }

