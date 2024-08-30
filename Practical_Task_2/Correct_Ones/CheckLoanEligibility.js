async function checkLoanEligibility(age, income, creditScore) {
    try {
        const response = await fetch(getApiEndpoint('/loan-eligibility'), {  // Dynamic API endpoint resolution
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ age, income, creditScore })
        });

        if (!response.ok) throw new Error("Network response was not ok");

        const data = await response.json();
        return data.isEligible ? "Eligible" : `Not Eligible: ${data.reason}`;
    } catch (error) {
        console.error("Error: Failed to fetch loan eligibility.", error);
        return "Service Unavailable";
    }
}

// Mocking the API call for testing
function getApiEndpoint(path) {
    return `https://mock-api.bank.com${path}`;
}

// Example usage with a mock fetch response
global.fetch = async (url, options) => {
    return {
        ok: true,
        json: async () => ({ isEligible: options.body.includes('"creditScore":650'), reason: "Credit score too low" })
    };
};

checkLoanEligibility(25, 40000, 650).then(result => console.log(result));

// const fetch = require('node-fetch');  // Make sure to install node-fetch

// async function checkLoanEligibility(age, income, creditScore) {
//     try {
//         const response = await fetch(getApiEndpoint('/loan-eligibility'), {  // Dynamic API endpoint resolution
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify({ age, income, creditScore })
//         });

//         if (!response.ok) throw new Error("Network response was not ok");

//         const data = await response.json();
//         return data.isEligible ? "Eligible" : `Not Eligible: ${data.reason}`;
//     } catch (error) {
//         console.error("Error: Failed to fetch loan eligibility.", error);
//         return "Service Unavailable";
//     }
// }

// // Mocking the API call for testing
// function getApiEndpoint(path) {
//     // Mock endpoint or use a real one if available
//     return `https://mock-api.bank.com${path}`;
// }

// // Example usage with a mock fetch response
// const mockFetch = async (url, options) => {
//     // Simulating an API response
//     return {
//         ok: true,
//         json: async () => ({ isEligible: options.body.includes('"creditScore":650'), reason: "Credit score too low" })
//     };
// };

// // Replace global fetch with mockFetch for testing purposes
// global.fetch = mockFetch;

// checkLoanEligibility(25, 40000, 650).then(result => console.log(result));

// async function checkLoanEligibility(age, income, creditScore) {
//     try {
//         const response = await fetch(getApiEndpoint('/loan-eligibility'), {  // Dynamic API endpoint resolution
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify({ age, income, creditScore })
//         });

//         if (!response.ok) throw new Error("Network response was not ok");

//         const data = await response.json();
//         return data.isEligible ? "Eligible" : `Not Eligible: ${data.reason}`;
//     } catch (error) {
//         console.error("Error: Failed to fetch loan eligibility.", error);
//         return "Service Unavailable";
//     }
// }

// // Helper function to resolve API endpoint
// function getApiEndpoint(path) {
//     const baseUrl = process.env.API_BASE_URL || 'https://default-api.bank.com';
//     return `${baseUrl}${path}`;
// }

// // Example usage
// checkLoanEligibility(25, 40000, 650).then(result => console.log(result));