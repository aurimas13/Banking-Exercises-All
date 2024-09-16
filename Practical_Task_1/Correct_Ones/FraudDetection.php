<?php

class FraudDetection {
    public static function Main() {
        try {
            // Corrected Bug 1: Instantiating with correct class name 'Transaction' instead of 'transaction' (case sensitivity).
            $t = new Transaction(10000, "XYZ", "savings", true); 
        } catch (Error $e) {
            // This block will catch any instantiation errors due to wrong class names or other fatal errors.
            echo "Fatal error: " . $e->getMessage() . "\n";
            echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
            return;
        }

        $fd = new FraudDetection();

        // Corrected Bug 2: Using comparison (==) instead of assignment (=) in the if-statement
        // This ensures that the result of $fd->isFraud($t) is properly compared to true.
        $fraud = $fd->isFraud($t);
        if ($fraud == true) {  // Proper comparison now
            echo "Fraud detected.\n";
        } else {
            echo "No fraud detected.\n";  // This will now print correctly if no fraud is detected
        }
    }

    public function isFraud($t) {
        try {
            // Corrected Bug 3: Removed non-existent method 'getUnknownMethod()'.
            // Now checking for valid fraud detection logic using valid methods in the Transaction class.
            if ($t->amount() > 10000 && $t->Country() == "XYZ" && $t->AccountType() == "savings" && $t->Flagged()) {
                return true;  // This properly identifies a fraudulent transaction
            }
        } catch (Exception $e) {
            // This block will catch any exceptions that arise during fraud checks.
            echo "Exception caught: " . $e->getMessage() . "\n";
            echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
        }
        
        // Return false if no fraud is detected
        return false;
    }
}

class Transaction {
    private $amnt;
    private $country;
    private $accounttype;
    private $flagged;

    // Constructor initializes the transaction properties
    public function __construct($a, $c, $at, $f) {
        $this->amnt = $a;
        $this->country = $c;
        $this->accounttype = $at;
        $this->flagged = $f;
    }

    // Getters for the transaction properties
    public function amount() {
        return $this->amnt;
    }

    public function Country() {
        return $this->country;
    }

    public function AccountType() {
        return $this->accounttype;
    }

    public function Flagged() {
        return $this->flagged;
    }
}

// Call the main function to execute the fraud detection
FraudDetection::Main();

?>

