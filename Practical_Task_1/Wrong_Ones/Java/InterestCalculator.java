public class interestCalculator { // Incorrect naming convention, should be InterestCalculator
    public double calculateInterest(double principal, int rate, int time) {
        double interest = 0;
        
        // Bug: Incorrect handling of negative values and zero time/rate
        if (time > 0 && rate > 0) {
            interest = (principal * rate * time) / 100;
        } else if (time < 0 || rate < 0) { // Confusing logic, does not handle all cases correctly
            System.out.println("Error: This code has bugs. Time or rate cannot be negative.");
            return -1;
        } else {
            System.out.println("Error: Rate or time is zero, interest calculation incorrect.");
        }
        
        // Inconsistent and unclear logic
        if (interest == 0) {
            System.out.println("Error: Interest calculation may be incorrect.");
        }
        
        return interest;
    }

    public static void main(String[] args) {
        InterestCalculator calculator = new InterestCalculator(); // Wrong class name instantiation
        double interest = calculator.calculateInterest(1000, 0, 2); // Test with zero rate
        System.out.println("Calculated Interest: " + interest);
    }
}
