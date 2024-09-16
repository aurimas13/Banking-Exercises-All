package Practical_Task_3.Correct_Ones.Java;
public class LoanCalculator {
    public static void main(String[] args) {
        try {
            double principal = 10000;
            double rate = 5.5;
            int period = 10;
            
            double interest = calculateInterest(principal, rate, period);
            System.out.println("Total Interest: " + interest);
        } catch (Exception e) {
            System.err.println("Error occurred: " + e.getMessage());
        }
    }

    private static double calculateInterest(double principal, double rate, int period) {
        if (principal <= 0 || rate <= 0 || period <= 0) {
            throw new IllegalArgumentException("Principal, rate, and period must be greater than zero.");
        }
        double interest = principal * (rate / 100) * period;
        System.out.println("Interest calculated.");
        return interest;
    }
}

