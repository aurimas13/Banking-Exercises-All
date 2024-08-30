import sqlite3

# Define the function to get user details from the database
def get_user_details(username):
    try:
        connection = sqlite3.connect('banking.db')
        cursor = connection.cursor()
        query = "SELECT * FROM users WHERE username = ?"
        cursor.execute(query, (username,))
        result = cursor.fetchall()
        if result:
            print("User details fetched successfully.")
        else:
            print("No user found with that username.")
        return result
    except sqlite3.OperationalError as e:
        print(f"Database error: {e} - Check if the 'users' table exists.")
        return None
    finally:
        connection.close()

# Define the username and call the function
username = "john_doe"
user_details = get_user_details(username)

# Check the result and print appropriate messages
if user_details:
    print(user_details)
else:
    print("Failed to retrieve user details.")

# import sqlite3

# def get_user_details(username):
#     try:
#         connection = sqlite3.connect('banking.db')
#         cursor = connection.cursor()
#         query = "SELECT * FROM users WHERE username = ?"
#         cursor.execute(query, (username,))
#         result = cursor.fetchall()
#         print("User details fetched.")
#         return result
#     except Exception as e:
#         print(f"Error occurred: {str(e)}")
#         return None
#     finally:
#         connection.close()

# username = "john_doe"
# print(get_user_details(username))
