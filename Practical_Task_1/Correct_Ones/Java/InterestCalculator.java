package Java;
public class InterestCalculator { // Correct naming convention
    public double calculateInterest(double principal, int rate, int time) {
        if (time <= 0 || rate <= 0) {
            throw new IllegalArgumentException("Time and rate must be positive.");
        }

        double interest = (principal * rate * time) / 100;
        System.out.println("Interest calculated successfully.");
        return interest;
    }

    public static void main(String[] args) {
        InterestCalculator calculator = new InterestCalculator(); // Correct class name instantiation
        try {
            double interest = calculator.calculateInterest(1000, 5, 2); // Valid test case
            System.out.println("Calculated Interest: " + interest);
        } catch (IllegalArgumentException e) {
            System.out.println(e.getMessage()); // Handle exceptions gracefully
        }
    }
}

