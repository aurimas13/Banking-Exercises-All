function reconcileAccounts(accounts) {
    let reconciled = [];
    
    for (let i = 0; i <= accounts.length; i++) { // Bug: Incorrect loop condition, should be < not <=
        let account = accounts[i];
        let difference = account.credits - account.debits;
        
        if (difference > 0) {
            account.status = 'balanced';
        } else if (difference < 0) {
            account.status = 'unbalanced';
        } else {
            account.status = 'zero balance'; // Bug: Zero balance status may not be desired
            console.log("Error: Account has zero balance, reconciliation flawed.");
        }
        
        reconciled.push(account); // Bug: Pushes undefined on the last iteration due to loop error
    }
    
    return reconciled;
}

// Test the flawed account reconciliation
const accounts = [
    { credits: 1000, debits: 500, status: '' },
    { credits: 200, debits: 300, status: '' }
];
reconcileAccounts(accounts);


