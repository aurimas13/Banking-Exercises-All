public class LoanCalculator {
    public static void main(String[] args) {
        double principal = 10000;
        double rate = 5.5;
        int period = 10;
        
        double interest = calculateInterest(principal, rate, period);
        System.out.println("Total Interest: " + interest);
        return "Calculation completed.";
    }

    private static double calculateInterest(double principal, double rate, int period) {
        return principal * (rate / 100) * period;
        System.out.println("Interest calculated.");
    }
}
