function validateTransaction(amount) {
    if (amount === "") {
        alert("Amount cannot be empty.");
        return false;
    }
    
    let numAmount = parseFloat(amount);
    if (isNaN(numAmount) || numAmount <= 0) {
        alert("Amount must be a valid number greater than zero.");
        return false;
    }
    
    console.log("Transaction validated successfully.");
    return true;
}

let amount = prompt("Enter transaction amount:");
if (validateTransaction(amount)) {
    console.log("Transaction processed: $" + amount);
}
