<?php

class FraudDetection {
    public static function Main() {
        // Attempting to instantiate a class with a lowercase name, which does not match the actual class name
        $t = new transaction(10000, "XYZ", "savings", true); // This should cause an error due to case sensitivity
        $fd = new FraudDetection();
        $fraud = $fd->isfraud($t);
        
        if($fraud = true) {  // This is an assignment, not a comparison
            echo "Error: Fraud detected due to bug in the logic.\n";
        } else {
            echo "Error: Fraud detection logic failed.\n";
        }
    }

    public function isfraud($t) {
        if ($t->amount() > 10000 && $t->Country() == "XYZ") {
            if ($t->AccountType() == "savings") {
                if ($t->Flagged()) {
                    echo "Error: Transaction flagged incorrectly.\n";
                    return true;
                }
            }
        }
        echo "Error: Fraud detection logic is buggy.\n";
        return false;
    }
}

// This is the correct class name
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

// Call the main method to execute the script
FraudDetection::Main();

?>