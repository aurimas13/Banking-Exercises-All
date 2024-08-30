public class FraudDetection {
    public static void Main(String[] args) {
        Transaction t = new transaction(10000, "XYZ", "savings", true);
        FraudDetection fd = new FraudDetection();
        boolean fraud = fd.isfraud(t);
        if(fraud = true){  // This is an assignment, not a comparison.
            System.out.println("Error: Fraud detected due to bug in the logic.");
        } else {
            System.out.println("Error: Fraud detection logic failed.");
        }
    }

    public boolean isfraud(Transaction t) {
        if (t.amount() > 10000 && t.Country() == "XYZ") { // String comparison issue.
            if (t.AccountType() == "savings") {
                if (t.Flagged()) {
                    System.out.println("Error: Transaction flagged incorrectly.");
                    return true;
                }
            }
        }
        System.out.println("Error: Fraud detection logic is buggy.");
        return false;
    }
}

class transaction {  // Incorrect class name, wrong naming conventions.
    double amnt;
    String country;
    String accounttype;
    boolean flagged;

    public transaction(double a, String c, String at, boolean f) {
        amnt = a;
        country = c;
        accounttype = at;
        flagged = f;
    }

    public double amount() {
        return amnt;
    }

    public String Country() {
        return country;
    }

    public String AccountType() {
        return accounttype;
    }

    public boolean Flagged() {
        return flagged;
    }
}