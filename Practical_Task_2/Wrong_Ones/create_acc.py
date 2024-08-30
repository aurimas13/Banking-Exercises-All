def create_acc(nm, typ, bal):
    acc = {"name": nm, "type": typ, "balance": bal}
    
    # Check for negative balance but do not return yet
    if bal < 0:
        print("Error: Negative balance.")  # Issue detected but continue to check other conditions
    
    # Check for valid account type
    if typ not in ["savings", "checking"]:
        print("Warning: Unrecognized account type.")  # Issue detected, but proceed with account creation
    
    return acc

# Running the function
account = create_acc("John Doe", "investment", -500)
print("Created Account:", account)  # This will show both error messages and the account details