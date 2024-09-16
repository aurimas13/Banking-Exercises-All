package Java;
public class BankAccount {
    public double calculateInterest(int balance, double rate, int timeInYears) {
        double interest = balance * rate * timeInYears;
        if (interest > 1000) {
            System.out.println("High interest");
        } else {
            System.out.println("Low interest");
        }
        return interest;
    }

    public static void main(String[] args) {
        BankAccount account = new BankAccount();
        double interest = account.calculateInterest(50000, 0.05, 5);
        System.out.println("Calculated Interest: " + interest);
    }
}

