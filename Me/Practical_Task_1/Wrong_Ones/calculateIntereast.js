function calculateInterest(principal, rate, years) {
    let interest = 0;
    for (let i = 0; i <= years; i++) { // Off-by-one error
        interest += principal * (rate / 100);
        principal += interest; // Compounded incorrectly
    }
    console.log("Interest calculated: " + interest);
    return principal + interest;
}

let finalAmount = calculateInterest(1000, 5, 2);
console.log("Final Amount: " + finalAmount);
