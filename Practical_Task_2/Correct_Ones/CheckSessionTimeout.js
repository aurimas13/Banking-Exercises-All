function checkSessionTimeout(lastActivityTime) {
    const currentTime = Date.now();
    const sessionDuration = (currentTime - lastActivityTime) / 1000;

    if (sessionDuration > 300) {
        notifyUserSessionExpired();  // Notify the user about the expired session
        manageSessionExpiry();  // Handle session expiration (e.g., log out user, redirect to login)
        return "Session expired";
    }
    return "Session active";
}

// Helper function to notify the user
function notifyUserSessionExpired() {
    console.log("________________________________________ \n\nSession expired. Please log in again.");  // Logging for Node.js environment
}

// Helper function to manage session expiry
function manageSessionExpiry() {
    console.log("Managing session expiry...");
    clearSessionTokens();
    console.log("User redirected to login.");  // Simulate redirection in Node.js environment
}

// Mock function to clear session tokens
function clearSessionTokens() {
    console.log("Session tokens cleared.");
}

// Example usage
console.log(checkSessionTimeout(Date.now() - 200000));  // Should print "Session active"
console.log(checkSessionTimeout(Date.now() - 400000));  // Should print the sequence for session expiration

// function checkSessionTimeout(lastActivityTime) {
//     const currentTime = Date.now();
//     const sessionDuration = (currentTime - lastActivityTime) / 1000;

//     if (sessionDuration > 300) {
//         notifyUserSessionExpired();  // Notify the user about the expired session
//         manageSessionExpiry();  // Handle session expiration (e.g., log out user, redirect to login)
//         return "Session expired";
//     }
//     return "Session active";
// }

// // Helper function to notify the user
// function notifyUserSessionExpired() {
//     if (typeof window !== 'undefined' && typeof window.alert === 'function') {
//         window.alert("Your session has expired. Please log in again.");  // Use this for browsers
//     } else {
//         console.log("Session expired - cannot alert user directly in this environment.");
//     }
// }

// // Helper function to manage session expiry
// function manageSessionExpiry() {
//     console.log("Managing session expiry...");
//     clearSessionTokens();
//     if (typeof window !== 'undefined' && typeof window.location !== 'undefined') {
//         window.location.href = '/login';  // Use this for browsers
//     } else {
//         console.log("Redirecting to login not supported in this environment.");
//     }
// }

// // Mock function to clear session tokens
// function clearSessionTokens() {
//     console.log("Session tokens cleared.");
// }

// // Example usage
// console.log(checkSessionTimeout(Date.now() - 400000));

