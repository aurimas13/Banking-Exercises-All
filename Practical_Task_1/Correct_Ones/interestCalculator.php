<?php

class InterestCalculator { // Correct naming convention
    public function calculateInterest($principal, $rate, $time) {
        if ($time <= 0 || $rate <= 0) {
            throw new InvalidArgumentException("Time and rate must be positive."); // Similar to Java's IllegalArgumentException
        }

        $interest = ($principal * $rate * $time) / 100;
        echo "Interest calculated successfully.\n";
        return $interest;
    }
}

try {
    $calculator = new InterestCalculator(); // Correct class name instantiation
    $interest = $calculator->calculateInterest(1000, 5, 2); // Valid test case
    echo "Calculated Interest: " . $interest . "\n";
} catch (InvalidArgumentException $e) {
    echo $e->getMessage(); // Handle exceptions gracefully
}

?>