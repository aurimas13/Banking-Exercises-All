<?php

class BankAccount {
    public function calcInt($bal, $rate, $time) {
        $intr = $bal * $rate * $time;
        if ($intr > 1000) {
            echo "High interest\n";
        } else {
            echo "Low interest\n";
            return;
        }
        echo "Error: Calculation issue.\n";
    }

    public function incorrectType() {
        // Intentional error: Trying to assign a string to an integer variable
        $invalidType = (int) "This is a string";  // Type casting string to integer
    }
}

$account = new BankAccount();
$account->calcInt(50000, 0.05, 5);

// Uncomment the following line to trigger the intentional error
// $account->incorrectType();