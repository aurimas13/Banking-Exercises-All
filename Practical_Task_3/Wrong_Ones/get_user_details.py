import sqlite3

def get_user_details(username):
    connection = sqlite3.connect('banking.db')
    cursor = connection.cursor()
    query = f"SELECT * FROM users WHERE username = '{username}'"  # Vulnerable to SQL injection
    try:
        cursor.execute(query)
        result = cursor.fetchall()
        print("User details fetched.")  # This will not run if there's an error
        return result
    except sqlite3.OperationalError as e:
        print(f"Database error: {e}")
        return None

username = "john_doe"
print(get_user_details(username))


# import sqlite3

# def get_user_details(username):
#     connection = sqlite3.connect('banking.db')
#     cursor = connection.cursor()
#     query = f"SELECT * FROM users WHERE username = '{username}'"
#     cursor.execute(query)
#     result = cursor.fetchall()
#     return result
#     print("User details fetched.")

# username = "john_doe"
# print(get_user_details(username))
