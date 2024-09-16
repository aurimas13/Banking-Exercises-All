<?php

class InterestCalculator {
    public function calculateInterest($principal, $rate, $time) {
        // Corrected: Handle division by zero properly
        if ($rate == 0 || $time == 0) {
            throw new ArithmeticError("Rate or time cannot be zero. Cannot divide by zero.\n");
        }

        // Corrected: Proper handling of negative principal
        if ($principal < 0) {
            throw new InvalidArgumentException("Principal cannot be negative.\n");
        }

        // Corrected: Ensure correct interest calculation logic
        $interest = ($principal * $rate * $time) / 100;  // Fixed negative interest issue
        return $interest;
    }
}

// Handling the instantiation and testing the calculateInterest function
try {
    $calculator = new InterestCalculator();
    // Test case: valid values for calculation
    $interest = $calculator->calculateInterest(1000, 5, 2); // Principal: 1000, Rate: 5%, Time: 2 years
    echo "Calculated Interest: " . $interest . "\n";
} catch (ArithmeticError $e) {
    echo "Fatal ArithmeticError caught: " . $e->getMessage() . "\n";
} catch (InvalidArgumentException $e) {
    echo "InvalidArgumentException caught: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "General Exception caught: " . $e->getMessage() . "\n";
}

?>

