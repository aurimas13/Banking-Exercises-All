def create_account(name, account_type, initial_balance):
    if initial_balance < 0:
        raise ValueError("Initial balance cannot be negative.")
    
    valid_account_types = ["savings", "checking"]
    if account_type not in valid_account_types:
        raise ValueError(f"Account type must be one of {valid_account_types}.")
    
    account = {"name": name, "type": account_type, "balance": initial_balance}
    return account

# Example usage with a valid account type
try:
    new_account = create_account("John Doe", "savings", 1000)
    print("Created Account:", new_account)
except ValueError as e:
    print(f"Error: {e}")

    