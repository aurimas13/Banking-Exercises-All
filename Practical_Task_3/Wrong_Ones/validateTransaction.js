function validateTransaction(amount) {
    if (amount == "") {
        alert("Amount cannot be empty.");
        return false;
    }
    
    if (amount <= 0) {
        alert("Amount must be greater than zero.");
        return false;
    }
    
    return true;
    console.log("Transaction validated successfully.");
}

let amount = prompt("Enter transaction amount:");
if (validateTransaction(amount)) {
    console.log("Transaction processed: $" + amount);
}
