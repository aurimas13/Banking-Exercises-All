def update_balance(account, amount):
    if amount < 0:
        raise ValueError("Cannot add a negative amount.")
    
    if "balance" not in account:
        raise KeyError("Account dictionary must contain 'balance' key.")
    
    account["balance"] += amount
    return account

# Example usage
account = {"balance": 1000}
try:
    updated_account = update_balance(account, 500)
    print("Updated Account:", updated_account)
except (ValueError, KeyError) as e:
    print(f"Error: {e}")

    