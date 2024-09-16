import sqlite3

def setup_database():
    connection = sqlite3.connect('banking.db')
    cursor = connection.cursor()

    # Create the users table if it doesn't already exist
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            full_name TEXT NOT NULL,
            email TEXT NOT NULL
        )
    ''')

    # Insert some dummy data into the users table
    cursor.execute('''
        INSERT INTO users (username, full_name, email)
        VALUES
        ('john_doe', 'John Doe', 'john@example.com'),
        ('jane_doe', 'Jane Doe', 'jane@example.com')
    ''')

    # Commit the changes and close the connection
    connection.commit()
    connection.close()

setup_database()
print("Database and users table created with dummy data.")


