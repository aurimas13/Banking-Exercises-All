<?php

class FraudDetection {
    public function main() {
        $t = new Transaction(10000, "XYZ", "savings", true);
        $fd = new FraudDetection();
        $fraud = $fd->isFraud($t);

        if ($fraud) {
            echo "Fraud detected successfully.\n";
        } else {
            echo "No fraud detected.\n";
        }
    }

    public function isFraud($t) {
        return $t->getAmount() > 10000 && 
               $t->getCountry() === "XYZ" && 
               $t->getAccountType() === "savings" && 
               $t->isFlagged();
    }
}

class Transaction {
    private $amount;
    private $country;
    private $accountType;
    private $flagged;

    public function __construct($amount, $country, $accountType, $flagged) {
        $this->amount = $amount;
        $this->country = $country;
        $this->accountType = $accountType;
        $this->flagged = $flagged;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getAccountType() {
        return $this->accountType;
    }

    public function isFlagged() {
        return $this->flagged;
    }
}

// To run the PHP version of the main method
$fd = new FraudDetection();
$fd->main();

?>