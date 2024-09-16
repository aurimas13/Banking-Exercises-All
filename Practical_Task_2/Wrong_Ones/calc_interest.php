<?php

/**
 * Class Bank
 * Handles bank operations like calculating interest, managing user accounts, and processing transactions.
 */
class Bank {
    
    /**
     * Calculate interest based on balance, rate, and time.
     *
     * @param float $balance The initial balance
     * @param float $rate The interest rate
     * @param int $time The time period for the interest
     * @return float Calculated interest
     */
    public function calculateInterest(float $balance, float $rate, int $time): float {
        $interest = $balance * $rate * $time;
        if ($interest > 1000) {
            echo "High interest\n";
        } else {
            echo "Low interest\n";
        }
        return $interest;
    }

    /**
     * Handle user account operations such as checking balance.
     *
     * @param string $username The username of the account holder
     * @param float $balance The current balance of the user
     * @return bool True if the balance is valid, False otherwise
     */
    public function manageUserAccount(string $username, float $balance): bool {
        if ($balance < 0) {
            echo "Negative balance\n";
            return false;
        }
        echo "Account balance for $username is $balance\n";
        return true;
    }

    /**
     * Process a transaction by deducting the amount from the account balance.
     *
     * @param float $amount The amount to deduct
     * @param float &$accountBalance The current account balance (passed by reference)
     * @return bool True if the transaction was successful, False otherwise
     */
    public function processTransaction(float $amount, float &$accountBalance): bool {
        if ($amount > $accountBalance) {
            echo "Insufficient funds\n";
            return false;
        }
        $accountBalance -= $amount;
        echo "Transaction successful. Remaining balance: $accountBalance\n";
        return true;
    }
}

// Example usage of the refactored Bank class
$bank = new Bank();
$interest = $bank->calculateInterest(50000, 0.05, 5);
$bank->manageUserAccount("John Doe", 5000);
$bank->processTransaction(1000, $balance = 5000);

