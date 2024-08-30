import hashlib

def encrypt_password(password):
    salt = "random_salt"  # Insecure hardcoded salt
    try:
        hashed_password = hashlib.sha256(salt.encode() + password.encode()).hexdigest()
        return hashed_password
    except Exception as e:
        print(f"Error during encryption: {e}")
        return None

password = "P@ssw0rd"
print(f"Encrypted Password: {encrypt_password(password)}")
