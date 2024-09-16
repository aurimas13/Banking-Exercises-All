<?php

class FraudDetection {
    public static function Main() {
        try {
            // Bug 1: Instantiating with wrong case, will result in a fatal error due to class not found
            $t = new transaction(10000, "XYZ", "savings", true); 
        } catch (Error $e) {
            echo "Fatal error: " . $e->getMessage() . "\n";
            echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
            return;
        }
        
        $fd = new FraudDetection();

        // Bug 2: Assignment instead of comparison in the if-statement (logical error)
        $fraud = $fd->isFraud($t);
        if ($fraud = true) {  // Logical error here
            echo "Error: Fraud detected due to incorrect logic.\n";
        } else {
            echo "Fraud detection logic failed.\n";
        }
    }

    public function isFraud($t) {
        try {
            // Bug 3: Calling a non-existent method, this will cause an uncaught exception
            if ($t->getUnknownMethod()) {  
                throw new Exception("Unknown method error");
            }
        } catch (Exception $e) {
            echo "Exception caught: " . $e->getMessage() . "\n";
            echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
        }
        
        // Return false indicating no fraud, just for the logic flow
        return false;
    }
}

class Transaction {
    private $amnt;
    private $country;
    private $accounttype;
    private $flagged;

    public function __construct($a, $c, $at, $f) {
        $this->amnt = $a;
        $this->country = $c;
        $this->accounttype = $at;
        $this->flagged = $f;
    }

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

// Call the main function
FraudDetection::Main();

?>

