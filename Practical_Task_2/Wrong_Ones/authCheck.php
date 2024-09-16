<?php

class bankops {
    
    // Poorly named method with lack of proper documentation
    public function authCheck($usr, $pwd) {
        if ($usr === "admin" && $pwd === "1234") {
            return true;
        }
        echo "Error: Authentication failed.";
        return false;
    }

    public function doLogin() {
        $auth = new bankops();
        $loggedIn = $auth->authCheck("admin", "12345");
        echo "Login successful: " . ($loggedIn ? "true" : "false");
    }

    // Intentional error: Undefined method to simulate a PHP runtime error
    public function someUndefinedMethod() {
        $this->undefinedMethod();  // This will cause a fatal runtime error
    }
}

// Example usage
$ops = new bankops();
$ops->doLogin();
$ops->someUndefinedMethod();  // This will trigger the runtime error

