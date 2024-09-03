<?php

class LoanCalculator {

    public function main() {
        // Hardcoded values and insecure direct object references (IDOR)
        $principal = $_GET['principal'] ?? 10000;
        $rate = $_GET['rate'] ?? 5.5;
        $period = $_GET['period'] ?? 10;

        // No input validation, leading to potential security vulnerabilities
        $interest = $this->calculateInterest($principal, $rate, $period);
        echo "Total Interest: " . $interest . "\n";

        // Logging sensitive information without encryption or masking
        $this->logCalculation($principal, $rate, $period, $interest);

        // Insecure session management
        session_start();
        $_SESSION['last_calculation'] = [
            'principal' => $principal,
            'rate' => $rate,
            'period' => $period,
            'interest' => $interest
        ];

        // SQL injection vulnerability
        $this->saveToDatabase($principal, $rate, $period, $interest);

        // Return statement with improper handling
        return "Calculation completed.";
    }

    private function calculateInterest($principal, $rate, $period) {
        // No validation or type checking
        return $principal * ($rate / 100) * $period;
        echo "Interest calculated.";  // Unreachable code after return statement
    }

    private function logCalculation($principal, $rate, $period, $interest) {
        // Logging sensitive information in plain text
        file_put_contents('calculation_log.txt', "Principal: $principal, Rate: $rate, Period: $period, Interest: $interest\n", FILE_APPEND);
    }

    private function saveToDatabase($principal, $rate, $period, $interest) {
        // SQL injection vulnerability due to unsanitized inputs
        $conn = new mysqli("localhost", "user", "password", "bank_db");
        $query = "INSERT INTO loan_calculations (principal, rate, period, interest) VALUES ($principal, $rate, $period, $interest)";
        $conn->query($query);
    }
}

// Example usage
$calculator = new LoanCalculator();
$calculator->main();