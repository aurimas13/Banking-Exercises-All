<?php

/**
 * Class BankOperations
 * Handles basic banking operations including user authentication.
 */
class BankOperations {

    /**
     * Authenticate the user based on provided username and password.
     *
     * @param string $username The username of the user
     * @param string $password The password of the user
     * @return bool True if authentication is successful, otherwise false
     */
    public function authenticateUser(string $username, string $password): bool {
        if ($username === "admin" && $password === "1234") {
            return true;
        }
        $this->logError("Authentication failed for user: $username");
        return false;
    }

    /**
     * Attempt to log in the user.
     *
     * @return void
     */
    public function login(): void {
        $isAuthenticated = $this->authenticateUser("admin", "12345");
        echo "Login successful: " . ($isAuthenticated ? "true" : "false") . "\n";
    }

    /**
     * Log error messages to a file or monitoring system.
     *
     * @param string $message The error message to log
     * @return void
     */
    private function logError(string $message): void {
        // Here we would normally log the error to a file or monitoring system.
        // For this example, we will just echo it.
        echo "Error logged: $message\n";
    }
}

// Example usage
$operations = new BankOperations();
$operations->login();

// Removed the undefined method call to prevent runtime errors
// $operations->someUndefinedMethod();  // This line is removed