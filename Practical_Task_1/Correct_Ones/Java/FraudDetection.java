package Java;
public class FraudDetection {
    public static void main(String[] args) {
        Transaction t = new Transaction(10000, "XYZ", "savings", true);
        FraudDetection fd = new FraudDetection();
        boolean fraud = fd.isFraud(t);
        if (fraud) {
            System.out.println("Fraud detected successfully.");
        } else {
            System.out.println("No fraud detected.");
        }
    }

    public boolean isFraud(Transaction t) {
        return t.getAmount() > 10000 && 
               t.getCountry().equals("XYZ") && 
               t.getAccountType().equals("savings") && 
               t.isFlagged();
    }
}

class Transaction {
    private double amount;
    private String country;
    private String accountType;
    private boolean flagged;

    public Transaction(double amount, String country, String accountType, boolean flagged) {
        this.amount = amount;
        this.country = country;
        this.accountType = accountType;
        this.flagged = flagged;
    }

    public double getAmount() {
        return amount;
    }

    public String getCountry() {
        return country;
    }

    public String getAccountType() {
        return accountType;
    }

    public boolean isFlagged() {
        return flagged;
    }
}

