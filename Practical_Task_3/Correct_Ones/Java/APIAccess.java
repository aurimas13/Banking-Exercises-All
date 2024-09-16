package Practical_Task_3.Correct_Ones.Java;
// In terminal:

// export API_KEY="1234567890"


import java.util.Scanner;

public class APIAccess {
    public static void main(String[] args) {
        try {
            String apiKey = System.getenv("API_KEY"); // Retrieve API key from environment variable
            if (apiKey == null) {
                throw new RuntimeException("API_KEY environment variable not set.");
            }
            String userApiKey = getUserApiKey();

            if (authenticate(apiKey, userApiKey)) {
                System.out.println("Access granted.");
            } else {
                System.out.println("Access denied.");
            }
        } catch (Exception e) {
            System.err.println("Error occurred: " + e.getMessage());
        }
    }

    private static boolean authenticate(String apiKey, String userApiKey) {
        return apiKey != null && apiKey.equals(userApiKey);
    }

    private static String getUserApiKey() {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Enter your API key: ");
        return scanner.nextLine();
    }
}

