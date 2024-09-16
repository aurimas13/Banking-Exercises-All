<?php

class APIAccess {
    public function main() {
        $apiKey = getenv('API_KEY');  // Secure environment variable
        if (!$apiKey) {
            error_log("API Key is not set.");
            die("Internal server error. Please try again later.");  // Avoid exposing internal details to the user
        }

        $userApiKey = $this->getUserApiKey();

        if ($this->authenticate($apiKey, $userApiKey)) {
            echo "Access granted.\n";
        } else {
            echo "Access denied.\n";
        }
    }

    private function authenticate($apiKey, $userApiKey) {
        return hash_equals($apiKey, $userApiKey);  // Constant-time comparison to prevent timing attacks
    }

    private function getUserApiKey() {
        $userApiKey = $_POST['apiKey'] ?? null;  // Use POST method for secure API key transmission
        if (empty($userApiKey)) {
            error_log("User API Key is missing.");
            die("Internal server error. Please try again later.");
        }

        return htmlspecialchars(strip_tags($userApiKey));  // Proper sanitation to prevent XSS and injection attacks
    }
}

$apiAccess = new APIAccess();
$apiAccess->main();



