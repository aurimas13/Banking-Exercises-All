function CheckSessionTimeout(lastActivityTime) {
    const currentTime = Date.now();
    const sessionDuration = (currentTime - lastActivityTime) / 1000;

    if (sessionDuration > 300) {
        alert("Your session has expired. Please log in again.");  // This will throw an error in Node.js
        return "Session expired";
    }
    return "Session active";
    console.log("Error: Unexpected issue.");  // This line is unreachable and flawed
}

// Example usage
console.log(CheckSessionTimeout(Date.now() - 400000));

