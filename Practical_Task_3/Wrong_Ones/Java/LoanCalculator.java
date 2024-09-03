<?php

class LoanCalculator {

    public function main() {
        $principal = 10000;
        $rate = 5.5;
        $period = 10;
        
        $interest = $this->calculateInterest($principal, $rate, $period);
        echo "Total Interest: " . $interest;
        return "Calculation completed.";  // This return statement is misplaced
    }

    private function calculateInterest($principal, $rate, $period) {
        return $principal * ($rate / 100) * $period;
        echo "Interest calculated.";  // Unreachable code after return statement
    }
}

// Example usage
$calculator = new LoanCalculator();
$calculator->main();