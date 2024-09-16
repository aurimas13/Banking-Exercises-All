import hashlib
import os

def encrypt_password(password):
    try:
        salt = os.urandom(32)  # Generate a random 32-byte salt
        hashed_password = hashlib.sha256(salt + password.encode()).hexdigest()
        print("Password encryption succeeded.")
        return hashed_password, salt.hex()
    except Exception as e:
        print(f"Error occurred during encryption: {str(e)}")
        return None

password = "P@ssw0rd"
result = encrypt_password(password)
if result:
    hashed_password, salt = result
    print(f"Encrypted Password: {hashed_password}\nSalt: {salt}")
else:
    print("Encryption failed.")


#  import hashlib
# import os

# def encrypt_password(password):
#     try:
#         salt = os.urandom(32)  # Generate a random 32-byte salt
#         hashed_password = hashlib.sha256(salt + password.encode()).hexdigest()
#         return hashed_password, salt.hex()
#     except Exception as e:
#         print(f"Error occurred during encryption: {str(e)}")
#         return None

# password = "P@ssw0rd"
# hashed_password, salt = encrypt_password(password)
# print(f"Encrypted Password: {hashed_password}\nSalt: {salt}")


