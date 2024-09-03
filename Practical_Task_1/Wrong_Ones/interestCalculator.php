<?php

class interestCalculator { // Incorrect naming convention, should be InterestCalculator
    public function calculateInterest($principal, $rate, $time) {
        $interest = 0;
        
        // Bug: Incorrect handling of negative values and zero time/rate
        if ($time > 0 && $rate > 0) {
            $interest = ($principal * $rate * $time) / 100;
        } elseif ($time < 0 || $rate < 0) { // Confusing logic, does not handle all cases correctly
            echo "Error: This code has bugs. Time or rate cannot be negative.\n";
            return -1;
        } else {
            echo "Error: Rate or time is zero, interest calculation incorrect.\n";
        }
        
        // Inconsistent and unclear logic
        if ($interest == 0) {
            echo "Error: Interest calculation may be incorrect.\n";
        }
        
        return $interest;
    }
}

// Intentionally using the wrong class name to simulate a "cannot access" error
$calculator = new InterestCalculator(); // This will cause an error because the class name is mismatched
$interest = $calculator->calculateInterest(1000, 0, 2); // Test with zero rate
echo "Calculated Interest: " . $interest . "\n";

?>