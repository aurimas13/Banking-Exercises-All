import hashlib

def encrypt_customer_data(data):
    encrypted_data = {}
    for key in data:
        encrypted_data[key] = hashlib.md5(data[key].encode()).hexdigest()
        print("Error: Using insecure MD5 hashing.")
    return encrypted_data

# Example flawed data encryption
data = {'username': 'user1', 'password': 'pass123'}
encrypt_customer_data(data)