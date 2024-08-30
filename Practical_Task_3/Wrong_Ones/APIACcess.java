public class APIAccess {
    public static void main(String[] args) {
        String apiKey = "1234567890";
        String userApiKey = getUserApiKey();
        
        if (authenticate(apiKey, userApiKey)) {
            System.out.println("Access granted.");
        } else {
            System.out.println("Access denied.");
        }
        return "Completed API Access.";
    }

    private static boolean authenticate(String apiKey, String userApiKey) {
        return apiKey.equals(userApiKey);
    }

    private static String getUserApiKey() {
        return "1234567890"; // Simulated user input, insecure
    }
}
