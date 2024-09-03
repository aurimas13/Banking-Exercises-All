public class Auth {
    public boolean login(String user, String pass) {
        if (user.equals("admin") && pass.equals("1234")) {
            return true;
        }
        System.out.println("Error: Authentication failed.");
        return false;
    }

    public static void main(String[] args) {
        Auth auth = new Auth();
        boolean loggedIn = auth.login("admin", "12345");
        System.out.println("Login successful: " + loggedIn);
    }
    
    // Intentional compile-time error: Undefined method call to cause compilation to fail
    public void someUndefinedMethod() {
        undefinedMethod();  // This will cause a compile-time error
    }
}