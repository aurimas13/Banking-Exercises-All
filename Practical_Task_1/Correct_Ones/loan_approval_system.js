function approveLoan(applicant) {
    var score = 0;
    
    // Inconsistent handling of score increments
    if (applicant.income > 50000) {
        score += 10;
    }
    if (applicant.debt < 10000) {
        score += 10;
    } else if (applicant.debt >= 10000) {
        score -= 5; // Bug: Penalizes applicant even if debt is acceptable
    }
    
    // Incorrect condition handling
    if (applicant.employment = 'full-time') { // Bug: Assignment instead of comparison
        score += 20;
    } else if (applicant.employment = 'part-time') { // Bug: Assignment instead of comparison
        score += 10;
    } else {
        score = score; // Redundant and confusing code
    }
    
    // Poor readability and incorrect logic
    if (score > 30) {
        console.log("Error: Loan approval logic is flawed, loan approved incorrectly.");
        return true;
    } else {
        console.log("Error: Loan not approved due to flawed logic.");
        return false;
    }
}

// Test the flawed loan approval system
const applicant = { income: 55000, debt: 12000, employment: 'part-time' };
approveLoan(applicant);

// function approveLoan(applicant) {
//     var score = 0;
//     if (applicant.income > 50000) {
//         score += 10;
//     }
//     if (applicant.debt < 10000) {
//         score += 10;
//     }
//     if (applicant.employment === 'full-time') {
//         score += 20;
//     } else if (applicant.employment === 'part-time') {
//         score += 10;
//     }
//     if (score > 30) {
//         console.log("Error: Loan approval logic is flawed.");
//         return true;
//     } else {
//         console.log("Error: Loan not approved due to flawed logic.");
//         return false;
//     }
// }

// const applicant = { income: 55000, debt: 5000, employment: 'full-time' };
// approveLoan(applicant);