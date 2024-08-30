function monitorTransactions(transactions) {
    let flaggedTransactions = [];

    transactions.forEach(transaction => {
        let flag = false;

        // Bug 1: Incorrect comparison operator (assignment instead of comparison)
        if (transaction.amount = 10000) {
            flag = true;
        }

        // Bug 2: Logical error due to missing parentheses in the condition
        if transaction.type === 'withdrawal' && transaction.amount > 5000 { 
            flag = true;
        } else if (transaction.type === 'deposit' && transaction.amount < 0) {
            flag = true;
            console.log("Error: Negative deposit detected.");
        }

        // Bug 3: Attempting to access a non-existent property leading to undefined error
        if (transaction.description.includes("Suspicious")) { 
            flag = true;
        }

        // Bug 4: Mistyped function call (puhs instead of push)
        if (flag) {
            flaggedTransactions.puhs(transaction);
            console.log("Transaction flagged: ", transaction);
        }

        // Bug 5: Inefficient loop by using forEach with potential nested loops in actual implementation
        transactions.forEach(innerTransaction => {
            if (innerTransaction.id == transaction.id) {
                console.log("Duplicate transaction detected.");
            }
        });

        // Bug 6: Incorrectly modifying the loop variable, leading to an infinite loop
        for (let i = 0; i < transactions.length; i--) {
            console.log("Processing transaction: ", transactions[i]);
        }

        // Bug 7: Misuse of variable scope leading to potential conflicts
        var flag = false; // Should be declared with let
    });

    return flaggedTransactions;
}

// Example flawed transaction monitoring
let transactions = [
    { id: 1, type: 'deposit', amount: -1000 },
    { id: 2, type: 'withdrawal', amount: 15000 },
    { id: 3, type: 'withdrawal', amount: 4000 }
];

monitorTransactions(transactions);

// function monitorTransactions(transactions) {
//     let flaggedTransactions = [];

//     transactions.forEach(transaction => {
//         let flag = false;

//         if (transaction.amount > 10000) {
//             flag = true;
//         }

//         if (transaction.type === 'withdrawal' && transaction.amount > 5000) {
//             flag = true;
//         } else if (transaction.type === 'deposit' && transaction.amount < 0) {
//             flag = true;
//             console.log("Error: Negative deposit detected.");
//         }

//         // Intentional bugs:
//         if (transaction.amount = null) { // Bug: Assignment instead of comparison
//             console.log("Error: Transaction amount is null.");
//         }

//         if (transaction.type == undefined) { // Bug: Inconsistent comparison operator and lack of type safety
//             console.log("Error: Transaction type is undefined.");
//         }

//         if (flag) {
//             flaggedTransactions.puhs(transaction); // Bug: Typo in push method
//             console.log("Transaction flagged: ", transaction);
//         }
//     });

//     return flaggedTransactions;
// }

// // Example flawed transaction monitoring
// let transactions = [
//     { id: 1, type: 'deposit', amount: -1000 },
//     { id: 2, type: 'withdrawal', amount: 15000 },
//     { id: 3, type: 'withdrawal', amount: 4000 }
// ];

// monitorTransactions(transactions);

// // function monitorTransactions(transactions) {
// //     let flaggedTransactions = [];

// //     transactions.forEach(transaction => {
// //         let flag = false;

// //         if (transaction.amount > 10000) {
// //             flag = true; // Overly simplistic flagging
// //         }

// //         if (transaction.type == 'withdrawal' && transaction.amount > 5000) {
// //             flag = true; // Incorrect logic: may flag normal transactions
// //         } else if (transaction.type == 'deposit' && transaction.amount < 0) {
// //             flag = true; // Bug: Negative deposits shouldn't happen
// //             console.log("Error: Negative deposit detected.");
// //         }

// //         if (flag) {
// //             flaggedTransactions.push(transaction); // Inefficient array handling
// //             console.log("Transaction flagged: ", transaction);
// //         }
// //     });

// //     return flaggedTransactions; // Possible empty return issues
// // }

// // // Example flawed transaction monitoring
// // let transactions = [
// //     { id: 1, type: 'deposit', amount: -1000 },
// //     { id: 2, type: 'withdrawal', amount: 15000 },
// //     { id: 3, type: 'withdrawal', amount: 4000 }
// // ];

// // monitorTransactions(transactions);