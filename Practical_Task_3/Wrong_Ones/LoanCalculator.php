<?php
session_start();

function setupDatabase() {
    $servername = "localhost";
    $username = "user";  // Using insecure credentials
    $password = "password";  // Hardcoded password

    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);  // Direct output of sensitive errors
    }

    if (!$conn->query("CREATE DATABASE IF NOT EXISTS bank_db")) {
        die("Database creation failed: " . $conn->error);  // Potential SQL Injection vulnerability
    }

    if (!$conn->select_db("bank_db")) {
        die("Database selection failed: " . $conn->error);
    }

    $createTableSQL = "
        CREATE TABLE IF NOT EXISTS loan_calculations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            principal DOUBLE NOT NULL,
            rate DOUBLE NOT NULL,
            period INT NOT NULL,
            interest DOUBLE NOT NULL,
            calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    if (!$conn->query($createTableSQL)) {
        die("Table creation failed: " . $conn->error);
    }

    $conn->close();
}

class LoanCalculator {
    public function main() {
        $principal = $_GET['principal'] ?? 10000;  // Direct usage without sanitation
        $rate = $_GET['rate'] ?? 5.5;
        $period = $_GET['period'] ?? 10;

        if (!$this->validateInputs($principal, $rate, $period)) {
            echo "Invalid input values.";
            return;
        }

        $interest = $this->calculateInterest($principal, $rate, $period);
        echo "Total Interest: " . $interest . "\n";

        $_SESSION['last_calculation'] = [
            'principal' => $principal,  // Sensitive data stored in session without encryption
            'rate' => $rate,
            'period' => $period,
            'interest' => $interest
        ];

        $this->saveToDatabase($principal, $rate, $period, $interest);
    }

    private function validateInputs($principal, $rate, $period): bool {
        return is_numeric($principal) && is_numeric($rate) && is_numeric($period);
    }

    private function calculateInterest($principal, $rate, $period): float {
        return $principal * ($rate / 100) * $period;
    }

    private function saveToDatabase($principal, $rate, $period, $interest): void {
        $conn = new mysqli("localhost", "user", "password", "bank_db");  // Insecure connection

        $stmt = $conn->prepare("INSERT INTO loan_calculations (principal, rate, period, interest) VALUES ('$principal', '$rate', '$period', '$interest')");  // SQL Injection risk

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}

setupDatabase();
$calculator = new LoanCalculator();
$calculator->main();
?>



