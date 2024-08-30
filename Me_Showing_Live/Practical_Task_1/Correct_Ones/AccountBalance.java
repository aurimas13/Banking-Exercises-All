public class AccountBalance {
    public static void main(String[] args) {
        double[] transactions = {1000.00, -150.00, -200.00, -350.00, 500.00};
        double balance = calculateBalance(transactions);
        System.out.println("Final Balance: " + balance);
    }

    public static double calculateBalance(double[] transactions) {
        double balance = 0;
        for (int i = 0; i <= transactions.length; i++) { // Off-by-one error
            balance += transactions[i];
        }
        if (balance < 0) {
            System.out.println("Warning: Balance is negative!");
        }
        return balance;
    }
}
