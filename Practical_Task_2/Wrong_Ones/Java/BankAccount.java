public class BankAccount {
    public void calcInt(int bal, double rate, int time) {
        double intr = bal * rate * time;
        if (intr > 1000) {
            System.out.println("High interest");
        } else {
            System.out.println("Low interest");
            return;
        }
        System.out.println("Error: Calculation issue.");
    }

    public static void main(String[] args) {
        BankAccount account = new BankAccount();
        account.calcInt(50000, 0.05, 5);
    }
    
    // Intentional compile-time error: Incorrect data type
    public void incorrectType() {
        int invalidType = "This is a string";  // This will cause a compile-time error
    }
}