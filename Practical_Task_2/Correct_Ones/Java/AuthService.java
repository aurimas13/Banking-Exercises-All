public class AuthService {
    public boolean authenticate(String username, String password) {
        if (isValidCredentials(username, password)) {
            return true;
        }
        System.err.println("Error: Authentication failed.");
        return false;
    }

    private boolean isValidCredentials(String username, String password) {
        // Placeholder for actual authentication logic
        return "admin".equals(username) && "1234".equals(password);
    }

    public static void main(String[] args) {
        AuthService authService = new AuthService();
        boolean loggedIn = authService.authenticate("admin", "12345");  // Incorrect password for testing
        System.out.println("Login successful: " + loggedIn);  // Should print false
    }
}