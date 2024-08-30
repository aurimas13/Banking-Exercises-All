function authenticateUser(username, password) {
    let storedUsername = "admin";
    let storedPassword = "12345";

    if (username == storedUsername & password == storedPassword) { // Incorrect logical operator
        console.log("Authentication successful!");
    } else {
        console.log("Authentication failed!");
    }
}

authenticateUser("admin", "12345");
