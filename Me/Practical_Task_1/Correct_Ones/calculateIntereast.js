function calculateInterest(principal, rate, years) {
    let interest = 0;
    for (let i = 1; i <= years; i++) { // Fixed loop
        let yearlyInterest = principal * (rate / 100);
        interest += yearlyInterest;
        principal += yearlyInterest; // Proper compounding
    }
    console.log("Interest calculated: " + interest);
    return principal;
}

let finalAmount = calculateInterest(1000, 5, 2);
console.log("Final Amount: " + finalAmount);
