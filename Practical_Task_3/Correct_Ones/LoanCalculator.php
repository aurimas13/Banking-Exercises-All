<?php

/**
 * Class LoanCalculator
 * Handles the calculation of loan interest with proper validation, security, and coding standards.
 */

session_start(); // Start session at the beginning before any output

class LoanCalculator {

    public function main() {
        $principal = $this->sanitizeInput($_GET['principal'] ?? 10000);
        $rate = $this->sanitizeInput($_GET['rate'] ?? 5.5);
        $period = $this->sanitizeInput($_GET['period'] ?? 10);

        if (!$this->validateInputs($principal, $rate, $period)) {
            echo "Invalid input values.";
            return;
        }

        $interest = $this->calculateInterest($principal, $rate, $period);
        echo "Total Interest: " . $interest . "\n";

        $this->logCalculation($principal, $rate, $period, $interest);

        $_SESSION['last_calculation'] = [
            'principal' => $this->encryptData($principal),
            'rate' => $this->encryptData($rate),
            'period' => $this->encryptData($period),
            'interest' => $this->encryptData($interest)
        ];

        $this->saveToDatabase($principal, $rate, $period, $interest);

        echo "Calculation completed.\n";
    }

    private function sanitizeInput($input) {
        return htmlspecialchars(strip_tags($input));
    }

    private function validateInputs($principal, $rate, $period): bool {
        return is_numeric($principal) && $principal > 0 &&
               is_numeric($rate) && $rate > 0 &&
               is_numeric($period) && $period > 0;
    }

    private function calculateInterest($principal, $rate, $period): float {
        $interest = $principal * ($rate / 100) * $period;
        echo "Interest calculated.\n";
        return $interest;
    }

    private function logCalculation($principal, $rate, $period, $interest): void {
        $logData = sprintf(
            "Principal: %s, Rate: %s, Period: %s, Interest: %s\n",
            $this->maskSensitiveData($principal),
            $this->maskSensitiveData($rate),
            $this->maskSensitiveData($period),
            $this->maskSensitiveData($interest)
        );
        file_put_contents('calculation_log.txt', $logData, FILE_APPEND);
    }

    private function encryptData($data): string {
        return base64_encode($data);
    }

    private function maskSensitiveData($data) {
        $visibleLength = 4;
        $maskedLength = max(0, strlen($data) - $visibleLength);
        return str_repeat('*', $maskedLength) . substr($data, -$visibleLength);
    }

    private function saveToDatabase($principal, $rate, $period, $interest): void {
        $conn = new mysqli("localhost", "user", "password", "bank_db");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO loan_calculations (principal, rate, period, interest) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ddid", $principal, $rate, $period, $interest);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}

// Example usage
$calculator = new LoanCalculator();
$calculator->main();